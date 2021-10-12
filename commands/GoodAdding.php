<?php

namespace app\commands;

use app\commands\interfaces\Command;
use app\domain\bag\interfaces\BagRepository;
use app\domain\calculator\CalculationProcess;
use app\common\good\Good;
use app\domain\good\interfaces\GoodBuilder;
use app\domain\good\interfaces\GoodFactory;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\di\NotInstantiableException;

class GoodAdding extends Component implements Command
{
    /**
     * @param $context
     * @throws InvalidConfigException
     * @throws NotInstantiableException
     */
    public function execute($context): void
    {
        $good = $this->createGood($context);
        $bagRepository = \Yii::$container->get(BagRepository::class);

        $goodId = $good->getId();
        $bagRepository->checkGoodAddedToBagById($goodId)
            ? $bagRepository->addGoodCountById($goodId)
            : $bagRepository->addGood($good);

//        print_r($bagRepository->getBagModel()->getGoods()); exit;
        /*@todo вынести получение объектов в фабрику, зависимости в контейнер*/

        \Yii::$container->get(CalculationProcess::class)->calculate($bagRepository->getBagModel());
    }

    /**
     * @param array $params
     * @return Good
     * @throws InvalidConfigException
     * @throws NotInstantiableException
     */
    private function createGood(array $params): Good
    {
        $good = \Yii::$container->get(GoodFactory::class)->create();
        \Yii::$container->get(GoodBuilder::class)->build($good, $params);
        return $good;
    }

}