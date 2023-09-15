<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Mission $model */

$this->title = 'Добавит задача';
$this->params['breadcrumbs'][] = ['label' => 'Задача', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mission-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
