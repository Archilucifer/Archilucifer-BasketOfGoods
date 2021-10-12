<?php

namespace app\assets\components;

use yii\grid\DataColumn;
use yii\helpers\Html;

class AdditionalAttributesColumn extends DataColumn
{
    /**
     * @inheritdoc
     */
    protected function renderDataCellContent($model, $key, $index): string
    {
        if (($cellValue = $this->getDataCellValue($model, $key, $index)) === null) {
            return $this->grid->emptyCell;
        }

        $specifications = '';
        foreach ($cellValue as $attribute => $value) {
            $specifications .= Html::tag('span', Html::encode($attribute . ' - ' . $value)) . Html::tag('br');
        }

        return $specifications;
    }
}