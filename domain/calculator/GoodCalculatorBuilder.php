<?php


namespace app\domain\calculator;


use app\domain\calculator\interfaces\GoodCalculator;
use app\domain\calculator\interfaces\GoodCalculatorBuilder as GoodCalculatorBuilderInterface;
use app\domain\good\interfaces\Good;

class GoodCalculatorBuilder implements GoodCalculatorBuilderInterface
{
    public function build(Good $originalGood, GoodCalculator $goodToCalculate, int $goodCount): void
    {
        $goodToCalculate->id = $originalGood->getId();
        $goodToCalculate->count = $goodCount;
    }
}