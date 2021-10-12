<?php

namespace app\domain\calculator\interfaces;

use app\domain\good\interfaces\Good as GoodInterface;
use app\domain\calculator\calculators\GoodCalculator;

interface GoodCalculatorBuilder
{
    /**
     * @param GoodInterface $originalGood
     * @param GoodCalculator $goodToCalculate
     * @param int $goodCount
     */
    public function build(GoodInterface $originalGood, GoodCalculator $goodToCalculate,  int $goodCount): void;
}