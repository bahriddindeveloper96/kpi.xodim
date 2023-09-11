<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;

/** @var yii\web\View $this */
/** @var common\models\Davomat $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="davomat-form">

    <?php $form = ActiveForm::begin(['options'=> ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'user_id')->dropdownList([                           
        User::findOne(Yii::$app->user->id)->id => User::findOne(Yii::$app->user->id)->name . ' ' . User::findOne(Yii::$app->user->id)->surname
        ]);?>

   

    <?= $form->field($model, 'izox')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput()?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
