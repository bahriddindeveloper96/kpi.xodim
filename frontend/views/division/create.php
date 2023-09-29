<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Division $model */

$this->title = 'Добавит Отдель';
$this->params['breadcrumbs'][] = ['label' => 'Divisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="division-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
