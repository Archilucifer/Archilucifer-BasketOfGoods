<?php

namespace app\controllers;

use app\commands\GoodAdding;
use app\common\bag\BagRepository;
use app\domain\calculator\CalculationProcess;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\Response;

class BagController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex(): string
    {
        $bagRepository = new BagRepository();

        $options = $this->createRenderOptions($bagRepository);
        return $this->render('index', [
            'goodsDataProvider' => $options['dataProvider'],
            'totalAmount' => $options['totalAmount'],
            'goodsCount' => $options['goodsCount'],
        ]);
    }

    /**
     * @return Response
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
     */
    public function actionDeleteGood(string $id): Response
    {
        $bagRepository = new BagRepository();
        $bagRepository->removeGoodById($id);

        (new CalculationProcess())->calculate($bagRepository->getBagModel());

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