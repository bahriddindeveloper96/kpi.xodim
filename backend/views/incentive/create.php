<?php

use yii\helpers\Html;
use common\models\User;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Incentive $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="incentive-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropdownList([                           
        $worked->user_id => User::findOne($worked->user_id)->name . ' ' . User::findOne($worked->user_id)->surname
        ]);?>
     <?= $form->field($model, 'percent')->dropdownList([                           
        $all_bonus => $all_bonus .'%'
        ]);?>
        
    <?= $form->field($model, 'summa')->dropdownList([                           
        $summas => $summas
        ]);?>
    <?= $form->field($model, 'date')->dropdownList([                           
        $worked->date => $worked->date
        ]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
