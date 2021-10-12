<?php

namespace app\domain\bag;

use app\domain\bag\interfaces\Bag as BagInterface;
use app\domain\good\interfaces\Good;

class Bag implements BagInterface
{
    /* @var Good[] */
    public array $goods = [];

    /**
     * @var array
     */
    public array $goodsCount = [];

    private string $totalAmount = '0';

    /* @inheritDoc */
    public function setTotalAmount(string $totalAmount): void
    {
        $this->totalAmount = $totalAmount;
    }

    /* @inheritDoc */
    public function getTotalAmount(): string
    {
        return $this->totalAmount;
    }

    /**
     * @return Good[]
     */
    public function getGoods(): array
    {
        return $this->goods;
    }

    public function getGoodsCount(): array
    {
        return $this->goodsCount;
    }
}