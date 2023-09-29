<?php

use common\models\Davomat;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\User;

/** @var yii\web\View $this */
/** @var common\models\DavomatSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Давомат';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="davomat-index">

    <p>
        <?= Html::a('Приходите время', ['create'], ['class' => 'btn btn-success']) ?>
        <h4><?php
        echo  date("Y-m-d H:i") . "<br>";?></h4>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
                [
                'attribute'=> 'user_id',
                'value'=> function($model){
                    $user = User::findOne($model->user_id);
                    return $user ? $user->name .' '.$user->surname :'';
                }
                ],
                
           // 'user_id',
            'date',
            'izox',
            
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, Davomat $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //      }
            // ],
        ],
    ]); ?>


</div>
