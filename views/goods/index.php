<?php

use yii\helpers\Html;

$this->title = 'Goods';
//$session = Yii::$app->session;
//$session->destroy();
//$session = Yii::$app->session;
//var_dump($session['bag']); exit;
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p><img src="/assets/img/tv.jpg" width="200" alt=""></p>

                <div class="form-group">
                    <?= Html::a(
                        'Add to bag',
                        [
                            'bag/add-good',
                            'id' => 1,
                            'brand' => 'Samsung',
                            'price' => '40000.30',
                            'specifications' => ['Diagonal' => 50]
                        ],
                        [
                            'brand' => 'noticesBtn',
                            'class' => 'btn btn-success',
                            'title' => 'Add to bag'
                        ]
                    ) ?>
                </div>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p><img src="/assets/img/phone.jpg" width="115" alt=""></p>

                <div class="form-group">
                    <?= Html::a(
                        'Add to cart',
                        [
                            'bag/add-good',
                            'id' => 2,
                            'brand' => 'Apple',
                            'price' => '98000',
                            'specifications' => ['Diagonal' => 12, 'Memory' => '128gb']
                        ],
                        [
                            'id' => 'noticesBtn',
                            'class' => 'btn btn-success',
                            'title' => 'Add to cart'
                        ]
                    ) ?>
                </div>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p><img src="/assets/img/pan.jpg" width="200" alt=""></p>

                <div class="form-group">
                    <?= Html::a(
                        'Add to cart',
                        [
                            'bag/add-good',
                            'id' => 3,
                            'brand' => 'Tefal',
                            'price' => '4350',
                            'specifications' => ['Diameter' => 6]
                        ],
                        [
                            'id' => 'noticesBtn',
                            'class' => 'btn btn-success',
                            'title' => 'Add to cart'
                        ]
                    ) ?>
                </div>
            </div>
        </div>

    </div>
</div>
