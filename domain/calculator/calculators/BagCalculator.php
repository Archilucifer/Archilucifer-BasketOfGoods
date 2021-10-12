<?php

namespace app\domain\calculator\calculators;

use app\domain\bag\interfaces\Bag;
use app\domain\calculator\interfaces\CalculationProcess;
use app\domain\calculator\interfaces\GoodCalculatorBuilder;
use app\domain\calculator\interfaces\GoodCalculatorFactory;

class BagCalculator
{
    public array $calculatedGoods = [];
    public string $totalAmount = '0';

    private GoodCalculatorFactory $goodCalculatorFactory;
    private GoodCalculatorBuilder $goodCalculatorBuilder;

    /**
     * @param GoodCalculatorBuilder $goodCalculatorBuilder
     * @param GoodCalculatorFactory $goodCalculatorFactory
     */
    public function __construct(GoodCalculatorBuilder $goodCalculatorBuilder, GoodCalculatorFactory $goodCalculatorFactory)
    {
        $this->goodCalculatorFactory = $goodCalculatorFactory;
        $this->goodCalculatorBuilder = $goodCalculatorBuilder;
    }

    /**
     * @param Bag $bag
     * @return BagCalculator
     */
    public function calculate(Bag $bag): BagCalculator
    {
        $this->calculateGoods($bag->getGoods(), $bag->goodsCount);
        foreach ($this->calculatedGoods as $calculatedGood) {
            $this->totalAmount = bcadd($calculatedGood->price, $this->totalAmount, CalculationProcess::BC_SCALE);
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