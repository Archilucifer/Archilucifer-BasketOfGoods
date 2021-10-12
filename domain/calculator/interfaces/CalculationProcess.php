<?php

namespace app\domain\calculator\interfaces;

use app\domain\bag\interfaces\Bag;

interface CalculationProcess
{
    public const BC_SCALE = 2;

    public function calculate(Bag $bag): void;
}