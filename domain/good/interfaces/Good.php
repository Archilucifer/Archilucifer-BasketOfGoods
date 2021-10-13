<?php

namespace app\domain\good\interfaces;

interface Good
{
    public const BASIC_GOOD_CALCULATION = 'basic-good-calculation';

    /**
     * @param int $id
     */
    public function setId(int $id): void;
    public function getId(): int;

    /**
     * @param string $price
     */
    public function setPrice(string $price): void;
    public function getPrice(): string;

    /**
     * @param string $brand
     */
    public function setBrand(string $brand): void;
    public function getBrand(): string;

    /**
     * @param array $specifications
     */
    public function setSpecifications(array $specifications): void;
    public function getSpecifications(): array;


    /**
     * @param string $calculationType
     */
    public function setCalculationType(string $calculationType): void;
    public function getCalculationType(): string;
}