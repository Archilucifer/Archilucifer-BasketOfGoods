<?php


namespace app\domain\calculator;


use app\domain\calculator\calculators\GoodCalculator;
use app\domain\calculator\interfaces\GoodCalculatorBuilder as GoodCalculatorBuilderInterface;
use app\domain\good\interfaces\Good as GoodInterface;

class GoodCalculatorBuilder implements GoodCalculatorBuilderInterface
{
    public function build(GoodInterface $originalGood, GoodCalculator $goodToCalculate, int $goodCount): void
    {
        $goodToCalculate->id = $originalGood->getId();
        $goodToCalculate->count = $goodCount;
    }
}