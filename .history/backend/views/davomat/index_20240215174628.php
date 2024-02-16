<?php

use common\models\Davomat;
use common\models\User;
//use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

use kartik\export\ExportMenu;


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
    <?php $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute'=> 'message_number',
            'value'=>function($model){
                if($model->status === 1){
                return $model->message_number;
                }else{
                    return '';
                }
            }
            ],
            [
                'attribute'=> 'companies_id',
                'value' => function ($data) {
                    return $data ? $data->company->name : '';
                }
            ],
            [
                'attribute'=> 'instructions_id',
                'value' => function ($data) {
                    return $data ? $data->instruction->command_number : '';
                }
            ],
            [
                'attribute' => 'status',
                //'value' => function($data){return $data->status ? '<span class="text-primary">Tasdiqlangan</span>' : '<span class="text-warning">Jarayonda</span>'?:'<span class="text-alert">Bekor qilingan</span>';},
                'value' => function($model){
                    if($model->status==1){
                    return $model->status==1 ? '<span class="text-primary">Tasdiqlangan</span>':'<span class="text-warning">Jarayonda</span>'?:'<span class="text-alert">Bekor qilingan</span>';
                    }elseif($model->status==2){
                        return $model->status==2 ? '<span class="text-danger">Bekor qilingan</span>':'<span class="text-warning">Jarayonda</span>'?:'<span class="text-alert">Bekor qilingan</span>';  
                    }else{
                        return $model->status==0 ? '<span class="text-warning">Jarayonda</span>':'<span class="text-warning">Jarayonda</span>'?:'<span class="text-alert">Bekor qilingan</span>';   
                    }
                },
                
                'format' => 'raw',
            
            ],
        // 'message_date',
            [
                'attribute'=> 'created_by',
                'value'=> function($data){
                    return $data ? $data->user->name .' '.$data->user->surname :'';
                }
            ],
            [
                'attribute'=> 'updated_by',
                'value'=> function($data){
                    if($data->status==1){
                    return $data ? $data->user->name .' '.$data->user->surname :'';
                    } return '';
                }
            ],
            //'created_at',
            'message_date',
        ['class' => 'yii\grid\ActionColumn'],
    ];

// Renders a export dropdown menu
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'clearBuffers' => true, //optional
]);?>
   



    
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
