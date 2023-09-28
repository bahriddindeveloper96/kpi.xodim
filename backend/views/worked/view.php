<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Worked $model */

$this->title = '№ '. $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Задача выполнена', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="worked-view">
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
            'id',
            [
                'attribute'=> 'Сотрудник ФИШ',
                'headerOptions' => ['style' => 'color: #007bff'],
                'value' => function ($data) {
                    return $data ? $data->user->name .' '.$data->user->surname: '';
                }
            ],
            'date',
            'mission_one',
            'mission_two',
            'mission_three',
          //  'mission_id',
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
