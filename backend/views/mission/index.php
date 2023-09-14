<?php

use common\models\Mission;
use yii\helpers\Html;
use common\models\Division;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Company;

/** @var yii\web\View $this */
/** @var common\models\MissionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Missions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mission-index">

    
    <p>
        <?= Html::a('Create Mission', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=> 'Lavozimi',
                'value'=> function($data){
                   // $mission = Mission::findOne($model->division_id);
                          
                    return $data ? $data->division->name  :'';
                  
                }
            ],
            [
                'attribute'=> 'Korxona nomi',
                'value'=> function($data){
                   // $mission = Mission::findOne($model->division_id);
                          
                    return $data ? $data->company->company_name  :'';
                  
                }
            ],
            'mission_one',
            'mission_two',
            'mission_three',
            //'company_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Mission $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
