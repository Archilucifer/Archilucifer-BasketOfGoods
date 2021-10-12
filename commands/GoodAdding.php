<?php

namespace app\commands;

use app\commands\interfaces\Command;
use app\domain\good\GoodBuilder;
use app\domain\good\GoodFactory;
use app\common\bag\BagRepository;
use app\domain\calculator\CalculationProcess;
use app\common\good\Good;
use yii\base\Component;

class GoodAdding extends Component implements Command
{
    public function execute($context): void
    {
        $good = $this->createGood($context);
        $bagRepository = new BagRepository();

        $goodId = $good->getId();
        $bagRepository->checkGoodAddedToBagById($goodId)
            ? $bagRepository->addGoodCountById($goodId)
            : $bagRepository->addGood($good);

//        print_r($bagRepository->getBagModel()->getGoods()); exit;
        /*@todo вынести получение объектов в фабрику, зависимости в контейнер*/
        (new CalculationProcess())->calculate($bagRepository->getBagModel());
    }

    /**
     * @param array $params
     * @return Good
     */
    private function createGood(array $params): Good
    {
        $good = (new GoodFactory())->create();
        (new GoodBuilder())->build($good, $params);
        return $good;
    }

}