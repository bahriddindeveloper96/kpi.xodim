<?php
use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var common\models\Company $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'company_name')->textInput() ?>
        </div>
        <div class="col-sm-4">
        <?= $form->field($model, 'company_inn')->widget(MaskedInput::className(), [
                'mask' => '999-999-999'
            ]) ?>
        </div>
       
        <div class="col-sm-4">
                <?= $form->field($model, 'created_by')->dropdownList([                           
                User::findOne(Yii::$app->user->id)->id => User::findOne(Yii::$app->user->id)->name . ' ' . User::findOne(Yii::$app->user->id)->surname
                ]);?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
