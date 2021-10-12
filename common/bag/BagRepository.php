<?php

namespace app\common\bag;

use app\domain\good\interfaces\Good;
use app\domain\bag\interfaces\Bag;
use Yii;
use app\domain\bag\interfaces\BagRepository as BagRepositoryInterface;

class BagRepository implements BagRepositoryInterface
{
    private Bag $bag;

    public function __construct()
    {
        $session = Yii::$app->session;
        $this->bag = $session['bag'];
    }

    public function getBagModel(): Bag
    {
        return $this->bag;
    }

    public function checkGoodAddedToBagById(int $id): bool
    {
        return isset($this->bag->goods[$id]);
    }

    /* @inheritDoc */
    public function addGood(Good $good): void
    {
        $this->bag->goods[$good->getId()] = $good;
        $this->bag->goodsCount[$good->getId()] = ['count' => 1];
    }

    /* @inheritDoc */
    public function addGoodCountById(string $id): void
    {
        ++$this->bag->goodsCount[$id]['count'];
    }

    /* @inheritDoc */
    public function removeGoodById(string $id): void
    {
        $count = $this->bag->goodsCount[$id];
        if ($count['count'] === 1){
            unset($this->bag->goods[$id]);
        }
        --$this->bag->goodsCount[$id]['count'];
    }

    public function setPriceById(string $price, int $id): void
    {
        $this->bag->goods[$id]->setPrice($price);
    }
}