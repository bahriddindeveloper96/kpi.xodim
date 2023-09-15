<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Division $model */

$this->title = 'Изменить: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Отдель', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="division-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
