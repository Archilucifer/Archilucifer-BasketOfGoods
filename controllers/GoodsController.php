<?php

namespace app\controllers;

use app\domain\good\interfaces\Good;
use Yii;
use yii\web\Controller;

class GoodsController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex(): string
    {
        $this->createGoods();
        return $this->render('index');
    }

    /**
     * Замена бд, чтобы не тратить время сделал так
     */
    private function createGoods(): void
    {
        $session = Yii::$app->session;
        if (!isset($session['Goods'])) {
            $session['Goods'] =
                [
                    1 => [
                        'id' => 1,
                        'brand' => 'Samsung',
                        'price' => '40000.30',
                        'specifications' => ['Diagonal' => 50],
                        'calculation' => Good::BASIC_GOOD_CALCULATION
                    ],
                    2 => [
                        'id' => 2,
                        'brand' => 'Apple',
                        'price' => '98000',
                        'specifications' => ['Diagonal' => 12, 'Memory' => '128gb'],
                        'calculation' => Good::BASIC_GOOD_CALCULATION
                    ],
                    3 => [
                        'id' => 3,
                        'brand' => 'Tefal',
                        'price' => '4350',
                        'specifications' => ['Diameter' => 6],
                        'calculation' => Good::BASIC_GOOD_CALCULATION
                    ],
                ];
        }
    }
}