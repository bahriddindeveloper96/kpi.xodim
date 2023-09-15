<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Salary $model */

$this->title = 'Добавит доход';
$this->params['breadcrumbs'][] = ['label' => 'Доход', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salary-create">

  
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
