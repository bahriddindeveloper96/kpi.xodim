<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Davomat $model */

$this->title = Yii::t('app', 'Update Davomat: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Davomats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="davomat-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
