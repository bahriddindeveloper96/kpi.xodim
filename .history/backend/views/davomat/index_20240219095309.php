<?php

use common\models\Davomat;
use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
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
   

   <div class="davomat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-sm-2">
            <?= $form->field($searchModel, 'date_start')->textInput(['type' => 'date']) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($searchModel, 'date_end')->textInput(['type' => 'date']) ?>
        </div>
        <div class="col-sm-2">
            <div class="form-group" style="margin-top:5px;">
                <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
            </div>
        </div>
        
    </div>

    

    <?php ActiveForm::end(); ?>

</div>
    
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
