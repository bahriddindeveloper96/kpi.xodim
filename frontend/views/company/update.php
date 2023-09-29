<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Company $model */


$this->params['breadcrumbs'][] = ['label' => 'Korxonalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->company_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Tahrirlash';
?>
<div class="company-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
