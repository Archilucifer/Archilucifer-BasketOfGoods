<?php

namespace app\domain\calculator;

use app\domain\bag\Bag;
use app\domain\calculator\calculators\BagCalculator;
use app\common\bag\BagRepository;
use app\domain\bag\interfaces\BagRepository as BagRepositoryInterface;

class CalculationProcess
{

    private BagCalculator $bagCalculator;
    private BagRepositoryInterface $bagRepository;

    /* @todo вынести все зависимости в котейнер */
    public function __construct()
    {
      $this->bagCalculator = new BagCalculator();
      $this->bagRepository = new BagRepository();
    }

    /**
     * @param Bag $bag
     */
    public function calculate(Bag $bag): void {

        $calculatedBag = $this->bagCalculator->calculate($bag);

        foreach ($calculatedBag->calculatedGoods as $good) {
            $this->bagRepository->setPriceById($good->price, $good->id);
        }

        $bag->setTotalAmount($calculatedBag->totalAmount);
    }
}