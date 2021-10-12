<?php

namespace app\domain\calculator\calculators;

use app\domain\bag\Bag;
use app\domain\calculator\GoodCalculatorBuilder;
use app\domain\calculator\GoodCalculatorFactory;
use app\domain\calculator\interfaces\Calculable;
use app\domain\calculator\interfaces\GoodCalculatorBuilder as GoodCalculatorBuilderInterface;
use app\domain\calculator\interfaces\GoodCalculatorFactory as GoodCalculatorFactoryInterface;

class BagCalculator
{
    public array $calculatedGoods = [];
    public string $totalAmount = '0';

    private GoodCalculatorFactoryInterface $goodCalculatorFactory;
    private GoodCalculatorBuilderInterface $goodCalculatorBuilder;

    /**
     * @todo вынести все зависимости в котейнер
     */
    public function __construct()
    {
        $this->goodCalculatorFactory = new GoodCalculatorFactory();
        $this->goodCalculatorBuilder = new GoodCalculatorBuilder();
    }

    /**
     * @param Bag $bag
     * @return BagCalculator
     */
    public function calculate(Bag $bag): BagCalculator
    {
        $this->calculateGoods($bag->getGoods(), $bag->goodsCount);
        foreach ($this->calculatedGoods as $calculatedGood) {
            $this->totalAmount = bcadd($calculatedGood->price, $this->totalAmount, Calculable::BC_SCALE);
        }

        return $this;
    }

    /**
     * @param array $originalGood
     * @param array $goodsCount
     */
    private function calculateGoods(array $originalGood, array $goodsCount): void
    {
        foreach ($originalGood as $good) {
            $goodToCalculate = $this->goodCalculatorFactory->create($good);
            $this->goodCalculatorBuilder->build($good, $goodToCalculate, $goodsCount[$good->getId()]['count']);
            $goodToCalculate->calculate();
            $this->calculatedGoods[] = $goodToCalculate;
        }
    }


}