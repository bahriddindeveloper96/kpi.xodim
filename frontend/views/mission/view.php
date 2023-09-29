<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Mission $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Задача', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mission-view">
   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
           // 'position_id',
            'mission_one',
            'one_ball',
            'plan_a',
            'mission_two',
            'two_ball',
            'plan_b',
            'mission_three',
            'three_ball',
            'plan_c',
            [
                'attribute'=> 'Корхона',
                'headerOptions' => ['style' => 'color: #007bff'],
                'value' => function ($data) {
                    return $data ? $data->company->company_name : '';
                }
            ],
        ],
    ]) ?>

</div>
