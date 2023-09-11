<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Davomat $model */

$this->title = Yii::t('app', 'Davomat qo\'shish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Davomat'), 'url' => ['index']];

?>
<div class="davomat-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
