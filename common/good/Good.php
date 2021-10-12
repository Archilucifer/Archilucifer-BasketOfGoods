<?php

namespace app\common\good;

use app\domain\good\interfaces\Good as GoodInterface;
use Yii;

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
    private string $calculationType;

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /* @return string */
    public function getId(): string
    {
        return $this->id;
    }

    /* @param string $price */
    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    /**
     * @param string $brand
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @param array $specifications
     */
    public function setSpecifications(array $specifications): void
    {
        $this->specifications = $specifications;
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

    /**
     * @param int $id
     * @return string
     */
    public static function getPriceById(int $id): string
    {
        return Yii::$app->session['Goods'][$id]['price'];
    }

    /**
     * @param int $id
     * @return string
     */
    public static function getCalculationTypeById(int $id): string
    {
        return Yii::$app->session['Goods'][$id]['calculation'];
    }
}