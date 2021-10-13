<?php

use app\assets\components\AdditionalAttributesColumn;
use yii\data\ArrayDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $goodsDataProvider ArrayDataProvider */
/* @var $totalAmount string */
/* @var $goodsCount array */

$this->title = 'Bag';
?>
<div class="site-index">

    <div class="body-content">

        <?= GridView::widget(
            [
                'dataProvider' => $goodsDataProvider,
                'columns' => [
                    [
                        'class' => ActionColumn::class,
                        'template' => '{delete}',
                        'controller' => 'payment-systems',
                        'buttons' => [
                            'delete' => static function ($url, $model) {
                                return Html::a(
                                    'delete',
                                    [
                                        '/bag/delete-good',
                                        'id' => $model->getId(),
                                    ],
                                );
                            }
                        ]
                    ],
                    'brand',
                    [
                        'header' => 'Additional Specifications',
                        'class' => AdditionalAttributesColumn::class,
                        'attribute' => 'specifications'
                    ],
                    'price',
                    [
                            'header' => 'Count',
                        'value' => static function ($good) use ($goodsCount){
                            return $goodsCount[$good->getId()]['count'];
                        }
                    ]
                ]
            ]
        ) ?>
    </div>
    <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>
    <h1>
        <?= Html::tag('span', Html::encode('Total Amount' . ' - ' . $totalAmount)) ?>
    </h1>
</div>
