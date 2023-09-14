<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Salary $model */

$this->title = 'Daromad qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Daromad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salary-create">

  
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
