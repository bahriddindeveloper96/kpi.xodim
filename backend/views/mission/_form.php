<?php
use common\models\User;
use common\models\Position;
use common\models\Division;
use common\models\Company;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Mission $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="mission-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'company_id')->dropDownList(Company::find()->select(['company_name'])->indexBy('id')->column(), ['prompt'=>'Корхона'])->label('Корхона') ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'division_id')->dropDownList(Division::find()->select(['name'])->indexBy('id')->column(), ['prompt'=>'Должность'])->label('Должность') ?>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'mission_one')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'one_ball')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'plan_a')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">   
        <div class="col-sm-4">
            <?= $form->field($model, 'mission_two')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'two_ball')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'plan_b')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">   
        <div class="col-sm-4">
            <?= $form->field($model, 'mission_three')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'three_ball')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'plan_c')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

   

    
    

    

    <div class="form-group">
        <?= Html::submitButton('Сохранит', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
