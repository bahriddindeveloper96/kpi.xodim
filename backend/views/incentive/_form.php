<?php

use yii\helpers\Html;
use common\models\Worked;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Incentive $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="incentive-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--?= $form->field($model, 'user_id')->dropdownList([                           
        $worked->user_id => User::findOne($worked->user_id)->name . ' ' . User::findOne(Yii::$app->user->id)->surname
        ]);?-->


    <?= $form->field($model, 'percent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'summa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
