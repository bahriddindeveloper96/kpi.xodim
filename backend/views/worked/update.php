<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Worked $model */

$this->title = 'Update Worked: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Workeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="worked-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
