<?php

namespace app\domain\good;

use app\domain\good\interfaces\Good;
use app\domain\good\interfaces\GoodBuilder as GoodBuilderInterface;

class GoodBuilder implements GoodBuilderInterface
{
    /**
     * @inheritDoc
     */
    public function build(Good $good, array $params): void
    {
        $id = $params['id'];

        $good->setId($id);
        $good->setBrand($params['brand']);
        $good->setSpecifications($params['specifications']);
        $good->setCalculationType(\app\common\good\Good::getCalculationTypeById($id));
    }
}