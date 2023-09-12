<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\UserPosition $model */

$this->title = 'Update User Position: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-position-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
