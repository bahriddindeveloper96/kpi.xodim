<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\UserPosition $model */

$this->title = 'Добавит сотрудник';
$this->params['breadcrumbs'][] = ['label' => 'Должность', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-position-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
