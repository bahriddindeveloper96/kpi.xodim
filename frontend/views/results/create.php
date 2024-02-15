<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Results $model */

$this->title = Yii::t('app', 'Create Results');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Results'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="results-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
