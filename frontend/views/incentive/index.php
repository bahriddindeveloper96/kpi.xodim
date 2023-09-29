<?php

use common\models\Incentive;
use common\models\WorkedSearch;
use common\models\Worked;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\IncentiveSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'КПИ Бонус';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="incentive-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=> 'Сотрудник ФИШ',
                'headerOptions' => ['style' => 'color: #007bff'],
                'value' => function ($data) {
                   // return $data ? $data->worked->user->name .' '.$data->worked->user->name: '';
                   return $data ? $data->user->user->name .' '.$data->user->user->surname: '';
                }
            ],
            'percent',
            'summa',
            'date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Incentive $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
