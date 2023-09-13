<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\UserPosition $model */

$this->title = 'Xodim qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Xodimlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-position-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
