<?php

namespace app\commands;

use app\commands\interfaces\Command;
use app\common\good\GoodRepository;
use app\domain\bag\interfaces\BagRepository;
use app\domain\calculator\CalculationProcess;
use app\domain\good\interfaces\Good;
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
        $goodForBag = $this->createGood($context);
        $bagRepository = \Yii::$container->get(BagRepository::class);

        $goodId = $goodForBag->getId();
        $bagRepository->checkGoodAddedToBagById($goodId)
            ? $bagRepository->addGoodCountById($goodId)
            : $bagRepository->addGood($goodForBag);

//        print_r($bagRepository->getBagModel()->getGoods()); exit;
        /*@todo вынести получение объектов в фабрику, зависимости в контейнер*/

        \Yii::$container->get(CalculationProcess::class)->calculate($bagRepository->getBagModel());
    }

    /**
     * @param int $id
     * @return Good
     */
    private function createGood(int $id): Good
    {
        $good = GoodRepository::getById($id);
        return $good->getPrototype();
    }

}