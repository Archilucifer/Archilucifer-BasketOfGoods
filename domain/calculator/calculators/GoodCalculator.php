<?php

namespace app\domain\calculator\calculators;

use app\domain\calculator\interfaces\CalculationProcess;
use app\domain\calculator\interfaces\GoodCalculator as GoodCalculatorInterface;

class GoodCalculator implements GoodCalculatorInterface
{
    public int $id;
    public string $price;
    public int $count;
    public string $originalGoodPrice;

    public function __construct(string $originalGoodPrice)
    {
        $this->originalGoodPrice = $originalGoodPrice;
    }

    public function calculate(): void
    {
        $this->price = bcmul($this->originalGoodPrice, $this->count, CalculationProcess::BC_SCALE);
    }
}