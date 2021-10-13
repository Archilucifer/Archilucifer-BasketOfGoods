<?php

namespace domain\calculator;

use app\domain\calculator\calculators\GoodCalculator;
use PHPUnit\Framework\TestCase;

class GoodCalculatorTest extends TestCase
{
    public function testCalculate(): void
    {
        $goodId = 1;
        $originalPrice = '500.12';
        $calculatedPrice = '1500.36';

        $goodCalculator = (new GoodCalculator($originalPrice));

        $goodCalculator->id = $goodId;
        $goodCalculator->count = 3;

        $goodCalculator->calculate();

        self::assertEquals($calculatedPrice, $goodCalculator->price);
    }
}