<?php

namespace app\domain\bag\interfaces;

interface Bag
{
    public const BAG_TOTAL_AMOUNT_CALCULATION = 'bag-total-amount-calculation';

    /* @param string $totalAmount */
    public function setTotalAmount(string $totalAmount): void;

    /* @return string */
    public function getTotalAmount(): string;

    public function getGoods(): array;

    public function getGoodsCount(): array;
}