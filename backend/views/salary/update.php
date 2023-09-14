<?php
use common\models\User;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Salary $model */
 
$this->title =  $model->user->name .' '.$model->user->surname;
$this->params['breadcrumbs'][] = ['label' => 'Daromad', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user->name .' '.$model->user->surname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Tahrirlash';
?>
<div class="salary-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
