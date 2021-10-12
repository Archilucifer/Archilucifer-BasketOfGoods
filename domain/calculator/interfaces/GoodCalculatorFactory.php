<?php

namespace app\domain\calculator\interfaces;

use app\domain\good\interfaces\Good as GoodInterface;

interface GoodCalculatorFactory
{
    /**
     * @param GoodInterface $good
     * @return GoodCalculator
     */
    public function create(GoodInterface $good): GoodCalculator;
}