<?php

namespace app\domain\bag\interfaces;

use app\common\good\Good;

interface BagRepository
{
    /**
     * @param int $id
     * @return bool
     */
    public function checkGoodAddedToBagById(int $id): bool;

    /* @param Good $good */
    public function addGood(Good $good): void;

    /* @param string $id */
    public function addGoodCountById(string $id): void;

    /* @param string $id */
    public function removeGoodById(string $id): void;
}