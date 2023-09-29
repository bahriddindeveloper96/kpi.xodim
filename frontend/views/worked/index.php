<?php

use common\models\Mission;
use common\models\User;
use common\models\Worked;
use yii\helpers\Html;
use common\models\Division;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Company;

/** @var yii\web\View $this */
/** @var common\models\MissionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Работа выполнена';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mission-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Задача выполнена', ['mission/index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=> 'Сотрудник',
                'value'=> function($data){
                   // $mission = Mission::findOne($model->division_id);
                          
                    return $data ? $data->user->name . ' '. $data->user->surname  :'';
                  
                }
            ],
            [
                'attribute'=> 'Корхона',
                'value'=> function($data){
                   // $mission = Mission::findOne($model->division_id);
                          
                    return $data ? $data->company->company_name  :'';
                  
                }
            ],
            [
                'attribute'=> 'Главный задача',
                'value'=> function($data){
                   // $mission = Mission::findOne($model->division_id);
                          
                    return $data ? $data->mission_one  :'';
                  
                }
            ],
            [
                'attribute'=> 'Спец задача',
                'value'=> function($data){
                   // $mission = Mission::findOne($model->division_id);
                          
                    return $data ? $data->mission_two  :'';
                  
                }
            ],
            [
                'attribute'=> 'Другой задача',
                'value'=> function($data){
                   // $mission = Mission::findOne($model->division_id);
                          
                    return $data ? $data->mission_three  :'';
                  
                }
            ],
            
            //'company_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Worked $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
            
        ],
    ]); ?>


</div>
