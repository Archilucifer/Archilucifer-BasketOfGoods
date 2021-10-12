<?php

namespace app\domain\calculator\interfaces;

use app\domain\good\interfaces\Good;
use app\domain\calculator\interfaces\GoodCalculator;

interface GoodCalculatorBuilder
{
    /**
     * @param Good $originalGood
     * @param GoodCalculator $goodToCalculate
     * @param int $goodCount
     */
    public function build(Good $originalGood, GoodCalculator $goodToCalculate,  int $goodCount): void;
}