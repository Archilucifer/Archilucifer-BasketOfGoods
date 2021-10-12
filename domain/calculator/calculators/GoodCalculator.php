<?php


namespace app\domain\calculator\calculators;


use app\common\good\Good;
use app\domain\calculator\interfaces\CalculationProcess;
use app\domain\calculator\interfaces\GoodCalculator as GoodCalculatorInterface;

class GoodCalculator implements GoodCalculatorInterface
{
    public int $id;
    public string $price;
    public int $count;

    public function calculate(): void
    {
        $this->price = bcmul(Good::getPriceById($this->id), $this->count, CalculationProcess::BC_SCALE);
    }
}