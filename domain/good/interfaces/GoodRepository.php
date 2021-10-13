<?php

namespace app\domain\good\interfaces;

interface GoodRepository
{

    /**
     * @param int $id
     * @return string
     */
    public function getCalculationTypeById(int $id): string;

    /**
     * @param int $id
     * @return string|null
     */
    public static function getPriceById(int $id): ?string;

    /**
     * @param int $id
     * @return Good
     */
    public static function getById(int $id): Good;
}