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
    <p>
        <?= Html::a('Изменит', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалит', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
