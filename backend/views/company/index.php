<?php

use common\models\Company;
use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\CompanySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title = 'Предприятие';

$this->params['breadcrumbs'][] = 'Korxona';
?>
<div class="company-index">

    

    <p>
        <?= Html::a('Добавит предприятие', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'company_name',
            'company_inn',
            'address',
            [
                'attribute'=> 'Владелец',
                'value'=> function($model){
                    $user = User::findOne($model->created_by);
                          
                    return $user ? $user->name .' '.$user->surname :'';
                  
                }
            ],
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Company $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
