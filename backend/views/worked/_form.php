<?php

use yii\helpers\Html;
use common\models\User;
use common\models\Company;
use common\models\Position;
use common\models\Mission;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Worked $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="worked-form">
    
    <?php $form = ActiveForm::begin(); ?>
   
    <?= $form->field($model, 'user_id')->dropDownList(User::find()->select(['name'])->indexBy('id')->column(), ['prompt'=>'Xodim FISH'])->label('Xodim FISH') ?>
    <?= $form->field($model, 'mission_id')->dropDownList(Mission::find()->select(['id'])->indexBy('id')->column(), ['prompt'=>'Lavozimi'])->label('Lavozimi') ?>

    <?= $form->field($model, 'date')->textInput(['type'=>'date']) ?>
    
    <?= $form->field($model, 'mission_one')->textInput(['maxlength' => true])->label('birinchi topshiriq')?>

    <?= $form->field($model, 'mission_two')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mission_three')->textInput(['maxlength' => true]) ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
