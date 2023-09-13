<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Davomat $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Davomats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="davomat-view">

   
  

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'date',
            'izox',
            [
                'attribute' => 'file',
                'value' => Yii::getAlias('@fileUrl').'/'.$model->file,
                'format' => ['image',['width'=>'200','height'=>'200']],
            ],
            
        ],
    ]) ?>

</div>
