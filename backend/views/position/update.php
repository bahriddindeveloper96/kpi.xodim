<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\UserPosition $model */

$this->title = 'Tahrirlash: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Xodimlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Tahrirlash';
?>
<div class="user-position-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
