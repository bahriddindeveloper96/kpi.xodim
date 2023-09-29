<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Kpi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="kpi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'old_result')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'end_result')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'percent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'summa')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
