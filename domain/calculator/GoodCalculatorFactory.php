<?php

namespace app\domain\calculator;

use app\domain\calculator\calculators\GoodCalculator;
use app\domain\calculator\interfaces\GoodCalculatorFactory as GoodCalculatorFactoryInterface;
use app\domain\good\interfaces\Good;
use app\domain\good\interfaces\GoodRepository;

class GoodCalculatorFactory implements GoodCalculatorFactoryInterface
{
    public function create(Good $good): GoodCalculator
    {
        $calculationType = \Yii::$container->get(GoodRepository::class)->getCalculationTypeById($good->getId());
        switch ($calculationType){
            case Good::BASIC_GOOD_CALCULATION :
                return new GoodCalculator($good->originalGood->getPrice());
            default :
                throw new \InvalidArgumentException('Undefined type - ' . $calculationType);
        }
    }
}