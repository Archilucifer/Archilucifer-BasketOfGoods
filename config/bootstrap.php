<?php

Yii::setAlias('@common', dirname(__DIR__) . '/common');
Yii::setAlias('@domain', dirname(__DIR__) . '/domain');

/**
 * Goods
 */

Yii::$container->set(
    \app\domain\good\interfaces\Good::class,
    \app\common\good\Good::class
);

Yii::$container->set(
    \app\domain\good\interfaces\GoodFactory::class,
    \app\domain\good\GoodFactory::class
);

Yii::$container->set(
    \app\domain\good\interfaces\GoodBuilder::class,
    \app\domain\good\GoodBuilder::class
);

/**
 * Bag
 */
Yii::$container->set(
    \app\domain\bag\interfaces\Bag::class,
    \app\domain\bag\Bag::class
);

Yii::$container->set(
    \app\domain\bag\interfaces\BagRepository::class,
    \app\common\bag\BagRepository::class
);

/**
 * Calculators
 */
Yii::$container->set(
    \app\domain\calculator\interfaces\GoodCalculatorBuilder::class,
        \app\domain\calculator\GoodCalculatorBuilder::class
);

Yii::$container->set(
    \app\domain\calculator\interfaces\GoodCalculatorFactory::class,
    \app\domain\calculator\GoodCalculatorFactory::class
);

Yii::$container->set(
    \app\domain\calculator\interfaces\CalculationProcess::class,
    \app\domain\calculator\CalculationProcess::class
);


