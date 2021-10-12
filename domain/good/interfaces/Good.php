<?php

namespace app\domain\good\interfaces;

interface Good
{
    public const BASIC_GOOD_CALCULATION = 'basic-good-calculation';

    /**
     * @param string $id
     */
    public function setId(string $id): void;

    public function getId(): string;

    /**
     * @param string $price
     */
    public function setPrice(string $price): void;

    /**
     * @param string $brand
     */
    public function setBrand(string $brand): void;

    /**
     * @param array $specifications
     */
    public function setSpecifications(array $specifications): void;

    public function getCalculationType(): string;

    /**
     * @param string $calculationType
     */
    public function setCalculationType(string $calculationType): void;

    /**
     * @param int $id
     * @return string
     */
    public static function getPriceById(int $id): string;

    /**
     * @param int $id
     * @return string
     */
    public static function getCalculationTypeById(int $id): string;
}