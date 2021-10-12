<?php

namespace app\controllers;

use app\commands\GoodAdding;
use app\domain\bag\interfaces\BagRepository;
use app\domain\calculator\interfaces\CalculationProcess;
use yii\base\InvalidConfigException;
use yii\data\ArrayDataProvider;
use yii\di\NotInstantiableException;
use yii\web\Controller;
use yii\web\Response;

class BagController extends Controller
{
    /**
     * @return string
     * @throws InvalidConfigException
     * @throws NotInstantiableException
     */
    public function actionIndex(): string
    {
        $bagRepository = \Yii::$container->get(BagRepository::class);

        $options = $this->createRenderOptions($bagRepository);
        return $this->render('index', [
            'goodsDataProvider' => $options['dataProvider'],
            'totalAmount' => $options['totalAmount'],
            'goodsCount' => $options['goodsCount'],
        ]);
    }

    /**
     * @return Response
     * @throws InvalidConfigException
     * @throws NotInstantiableException
     */
    public function actionAddGood(): Response
    {
        $command = new GoodAdding();
        $command->execute(\Yii::$app->getRequest()->queryParams);

        return $this->redirect(['goods/index']);
    }

    /**
     * @param string $id
     * @return Response
     * @throws InvalidConfigException
     * @throws NotInstantiableException
     */
    public function actionDeleteGood(string $id): Response
    {
        $bagRepository = \Yii::$container->get(BagRepository::class);
        $bagRepository->removeGoodById($id);

        \Yii::$container->get(CalculationProcess::class)->calculate($bagRepository->getBagModel());

        return $this->redirect(['index']);
    }

    private function createRenderOptions(BagRepository $bagRepository): array
    {
        $dataProvider = new ArrayDataProvider(['allModels' => []]);
        $totalAmount = 0;
        $goodsCount = [];

        $bag = $bagRepository->getBagModel();
        if (!empty($bag->goods)){
            $dataProvider->allModels = $bag->goods;
            $totalAmount = $bagRepository->getBagModel()->getTotalAmount();
            $goodsCount = $bag->getGoodsCount();
        }
        return ['dataProvider' => $dataProvider, 'totalAmount' => $totalAmount, 'goodsCount' => $goodsCount];
    }
}