<?php

namespace app\common\good;

use app\domain\good\interfaces\Good;
use app\domain\good\interfaces\GoodRepository as GoodRepositoryInterface;
use Yii;

class GoodRepository implements GoodRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function getCalculationTypeById(int $id): string
    {
        $session = Yii::$app->session;
        return $session['Goods'][$id]->getCalculationType();
    }

    /**
     * @inheritDoc
     */
    public static function getPriceById(int $id): ?string
    {
        $session = Yii::$app->session;
        return $session['Goods'][$id]->getPrice();
    }

    /**
     * @inheritDoc
     */
    public static function getById(int $id): Good
    {
        $session = Yii::$app->session;
        return $session['Goods'][$id];
    }
}