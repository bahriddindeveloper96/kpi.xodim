<?php
use common\models\Company;
use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var common\models\Salary $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="salary-form col-sm-9">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-6">
             <?= $form->field($model, 'company_id')->dropDownList(Company::find()->select(['company_name'])->indexBy('id')->column(), ['prompt'=>'Корхона'])->label('Корхона') ?>
        </div>
        <div class="col-sm-6">
        <?= $form->field($model, 'user_id')->dropDownList(User::find()->select(['name'])->indexBy('id')->column(), ['prompt'=>'Сотрудник'])->label('Сотрудник') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
        <?= $form->field($model, 'money')->widget(MaskedInput::class, [
                'mask' => '9999999.99'
            ])?>
        </div>
        <div class="col-sm-6">
             <?= $form->field($model, 'money_date')->textInput(['type'=>'date']) ?>
        </div>
    </div>  

    <?= $form->field($model, 'comment')->textarea(['rows'=> '6']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранит', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
