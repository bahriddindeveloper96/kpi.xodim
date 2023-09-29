<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Davomat $model */

$this->title = Yii::t('app', 'Добавит давомад');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Давомад'), 'url' => ['index']];

?>
<div class="davomat-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
