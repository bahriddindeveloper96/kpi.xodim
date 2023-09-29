<?php

use common\models\Kpi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\KpiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'КПИ резултать';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'old_result',
            'end_result',
            'percent',
            'summa',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Kpi $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
