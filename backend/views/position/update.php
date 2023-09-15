<?php

use yii\helpers\Html;
use common\models\User;

/** @var yii\web\View $this */
/** @var common\models\UserPosition $model */

$this->title = 'Изменить: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Должность', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="user-position-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
