<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Kpi $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kpis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kpi-view">
   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'id',
            'old_result',
            'end_result',
            'percent',
            'summa',
        ],
    ]) ?>

</div>
