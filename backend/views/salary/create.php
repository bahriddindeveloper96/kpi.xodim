<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Salary $model */

$this->title = 'Create Salary';
$this->params['breadcrumbs'][] = ['label' => 'Salaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salary-create">

  
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
