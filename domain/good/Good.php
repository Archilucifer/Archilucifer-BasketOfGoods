<?php

namespace app\domain\good;

use app\domain\good\interfaces\Good as GoodInterface;

class Good implements GoodInterface
{
    /* @var string */
    public string $price;

    /* @var string */
    public string $brand;

    /* @var string */
    public string $id;

    /* @var array */
    public array $specifications;

    /* @var string */
    public string $calculationType;

    /**
     * @var Good $this
     */
    public self $originalGood;

    public function getPrototype(): self
    {
        $this->originalGood = $this;
        return clone $this;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /* @return int */
    public function getId(): int
    {
        return $this->id;
    }

    /* @param string $price */
    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @param string $brand
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param array $specifications
     */
    public function setSpecifications(array $specifications): void
    {
        $this->specifications = $specifications;
    }

    /**
     * @return array
     */
    public function getSpecifications(): array
    {
        return $this->specifications;
    }

    /**
     * @return string
     */
    public function getCalculationType(): string
    {
        return $this->calculationType;
    }

    /**
     * @param string $calculationType
     */
    public function setCalculationType(string $calculationType): void
    {
        $this->calculationType = $calculationType;
    }
}