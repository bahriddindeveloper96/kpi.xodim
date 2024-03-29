<?php
use common\models\User;
use common\models\Division;
use common\models\Company;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\date\DatePicker;


/** @var yii\web\View $this */
/** @var common\models\UserPosition $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-position-form">

    <?php $form = ActiveForm::begin(); ?>  
    <div class="row">
        <div class="col-sm-6">
        <?= $form->field($model, 'company_id')->dropDownList(Company::find()->select(['company_name'])->indexBy('id')->column(), ['prompt'=>'Корхона'])->label('Корхона') ?>
        </div> 
        <div class="col-sm-6">
        <?= $form->field($model, 'xodim_id')->dropDownList(User::find()->select(['surname'])->indexBy('id')->column(), ['prompt'=>'Сотрудник ФИШ'])->label('Сотрудник ФИШ') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
        <?= $form->field($model, 'division_id')->dropDownList(Division::find()->select(['name'])->indexBy('id')->column(), ['prompt'=>'Должност'])->label('Должност') ?>
        </div>
        <div class="col-sm-4">
        <?= $form->field($model, 'begin_date')->textInput(['type'=>'date'])?>
        </div>
        <div class="col-sm-4">
        <?= $form->field($model, 'buyruq_file')->textInput(['maxlength' => true]) ?>            
        </div>
    </div>

    <?= $form->field($model, 'created_by')->dropdownList([                           
        User::findOne(Yii::$app->user->id)->id => User::findOne(Yii::$app->user->id)->name . ' ' . User::findOne(Yii::$app->user->id)->surname
        ]);?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
