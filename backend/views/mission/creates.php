<?php

use yii\helpers\Html;
use common\models\User;
use common\models\Company;
use common\models\Position;
use common\models\Division;
use common\models\Mission;
use common\models\MissionSearch;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Worked $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="worked-form">
    <?php $division = MissionSearch::findOne(Yii::$app->request->get('id')); ?>           
    
    <?php $form = ActiveForm::begin(); ?>
   
    <?= $form->field($model, 'user_id')->dropDownList(User::find()->select(['name'])->indexBy('id')->column(), ['prompt'=>'Xodim FISH'])->label('Xodim FISH') ?>

    <?= $form->field($model, 'mission_id')->dropDownList([$division->id =>$division->division->name])->label('Lavozimi') ?>
    <?= $form->field($model, 'company_id')->dropDownList([$division->company_id =>$division->company->company_name])->label('Korxona nomi') ?>

    <?= $form->field($model, 'date')->textInput(['type'=>'date']) ?>
    
    <?= $form->field($model, 'mission_one')->textInput(['maxlength' => true])->label(Mission::findOne(Yii::$app->request->get('id'))->mission_one)?>

    <?= $form->field($model, 'mission_two')->textInput(['maxlength' => true])->label(Mission::findOne(Yii::$app->request->get('id'))->mission_two)?>

    <?= $form->field($model, 'mission_three')->textInput(['maxlength' => true])->label(Mission::findOne(Yii::$app->request->get('id'))->mission_three)?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
