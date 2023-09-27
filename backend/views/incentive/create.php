<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Incentive $model */

$this->title = 'Create Incentive';
$this->params['breadcrumbs'][] = ['label' => 'Incentives', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="incentive-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
