<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Worked $model */

$this->title = 'Изменит: '.'№ ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Задача', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' =>'№ ' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменит';
?>
<div class="worked-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
