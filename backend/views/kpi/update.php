<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Kpi $model */

$this->title = 'Изменить Kpi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kpis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="kpi-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
