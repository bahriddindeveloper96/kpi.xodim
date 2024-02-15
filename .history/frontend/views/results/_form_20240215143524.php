<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
/** @var yii\web\View $this */
/** @var common\models\Results $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="results-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList([$model->user_id => $model->user->name])->label('Сотрудник') ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

     <?= $form->field($model, 'date')->textInput(['type'=>'date']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
