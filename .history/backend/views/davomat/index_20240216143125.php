<?php

use common\models\Davomat;
use common\models\User;

//use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
//use kartik\grid\GridView;
use yii\grid\GridView;
/** @var yii\web\View $this */
/** @var common\models\DavomatSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Давомад');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="davomat-index">

    
    <p>
        <!--?= Html::a(Yii::t('app', 'Davomat qo\'shish'), ['create'], ['class' => 'btn btn-success']) ?-->
    </p>
   

   
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'user_id',
            [
                'attribute'=> 'user_id',
                'value'=> function($model){
                    $user = User::findOne($model->user_id);
                          
                    return $user ? $user->name .' '.$user->surname :'';
                  
                }
            ],
            'date',
            'izox',
            //'file',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Davomat $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
