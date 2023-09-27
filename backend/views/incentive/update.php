<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Incentive $model */

$this->title = 'Update Incentive: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Incentives', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="incentive-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
