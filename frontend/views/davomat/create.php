<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Davomat $model */

$this->title = 'Kelgan vaqti';
$this->params['breadcrumbs'][] = ['label' => 'Davomats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="davomat-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
