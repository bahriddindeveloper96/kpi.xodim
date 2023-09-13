<?php

use common\models\Salary;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\SalarySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Salaries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salary-index">

   
    <p>
        <?= Html::a('Create Salary', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'company_id',
            'user_id',
            'money',
            'money_date',
            //'comment',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Salary $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
