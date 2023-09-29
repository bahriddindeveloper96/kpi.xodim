<?php

use yii\helpers\Html;
use common\models\User;
use common\models\Company;
use common\models\Position;
use common\models\Division;
use common\models\Mission;
use common\models\MissionSearch;
use yii\widgets\ActiveForm;
$this->title = 'Добавит задача';

/** @var yii\web\View $this */
/** @var common\models\Worked $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="worked-form">
    <?php $division = MissionSearch::findOne(Yii::$app->request->get('id')); ?>           
    
    <?php $form = ActiveForm::begin(); ?>
   
    <?= $form->field($model, 'user_id')->dropdownList([                           
        User::findOne(Yii::$app->user->id)->id => User::findOne(Yii::$app->user->id)->name . ' ' . User::findOne(Yii::$app->user->id)->surname
        ]);?>
       
     <?= $form->field($model, 'mission_id')->dropDownList([$division->id =>$division->division->name])->label('Должность') ?>

     <?= $form->field($model, 'company_id')->dropDownList([$division->company_id =>$division->company->company_name])->label('Корхона') ?>

    <?= $form->field($model, 'date')->textInput(['type'=>'date']) ?>
    
    <?= $form->field($model, 'mission_one')->textInput(['maxlength' => true])->label(Mission::findOne(Yii::$app->request->get('id'))->mission_one.' - '.Mission::findOne(Yii::$app->request->get('id'))->one_ball.'%')?>

    <?= $form->field($model, 'mission_two')->textInput(['maxlength' => true])->label(Mission::findOne(Yii::$app->request->get('id'))->mission_two.' - '.Mission::findOne(Yii::$app->request->get('id'))->two_ball.'%')?>

    <?= $form->field($model, 'mission_three')->textInput(['maxlength' => true])->label(Mission::findOne(Yii::$app->request->get('id'))->mission_three.' - '.Mission::findOne(Yii::$app->request->get('id'))->three_ball.'%')?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
