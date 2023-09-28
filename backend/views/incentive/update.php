<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Incentive $model */

$this->title = 'Update Incentive: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'КПИ Бонус', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="incentive-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
