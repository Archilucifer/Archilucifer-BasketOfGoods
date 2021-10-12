<?php

namespace app\domain\calculator;

use app\domain\bag\interfaces\Bag;
use app\domain\bag\interfaces\BagRepository;
use app\domain\calculator\calculators\BagCalculator;
use app\domain\calculator\interfaces\CalculationProcess as CalculationProcessInterface;


class CalculationProcess implements CalculationProcessInterface
{
    private BagCalculator $bagCalculator;
    private BagRepository $bagRepository;

    /* @param BagCalculator $bagCalculator
     * @param BagRepository $bagRepository
     */
    public function __construct(BagCalculator $bagCalculator, BagRepository $bagRepository)
    {
      $this->bagCalculator = $bagCalculator;
      $this->bagRepository = $bagRepository;
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