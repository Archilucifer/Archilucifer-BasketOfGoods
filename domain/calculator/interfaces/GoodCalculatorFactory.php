<?php

namespace app\domain\calculator\interfaces;

use app\domain\calculator\interfaces\GoodCalculator;
use app\domain\good\interfaces\Good;

interface GoodCalculatorFactory
{
    /**
     * @param Good $good
     * @return GoodCalculator
     */
    public function create(Good $good): GoodCalculator;
}