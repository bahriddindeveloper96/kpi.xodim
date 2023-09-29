<?php

use yii\helpers\Html;
use common\models\User;
use common\models\Company;
use common\models\Position;
use common\models\Division;
use common\models\Mission;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Worked $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="worked-form">
    
    <?php $form = ActiveForm::begin(); ?>
   
    <?= $form->field($model, 'user_id')->dropDownList([$model->user_id => $model->user->name])->label('Сотрудник') ?>
    <?= $form->field($model, 'mission_id')->dropDownList([$model->mission_id => $model->mission->division->name])->label('Должность') ?>

    <?= $form->field($model, 'date')->textInput(['type'=>'date']) ?>
    
    <?= $form->field($model, 'mission_one')->textInput(['maxlength' => true])->label($model->mission->mission_one)?>

    <?= $form->field($model, 'mission_two')->textInput(['maxlength' => true])->label($model->mission->mission_two)?>

    <?= $form->field($model, 'mission_three')->textInput(['maxlength' => true])->label($model->mission->mission_three)?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
