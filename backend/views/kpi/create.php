<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Kpi $model */

$this->title = 'Добавит резултать';
$this->params['breadcrumbs'][] = ['label' => 'Kpis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
