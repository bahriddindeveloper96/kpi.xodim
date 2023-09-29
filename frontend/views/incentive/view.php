<?php
use yii\helpers\Html;
use common\models\WorkedSearch;
use common\models\Worked;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Incentive $model */

$this->title = '№' .' '. $model->id;
$this->params['breadcrumbs'][] = ['label' => 'КПИ Бонус', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="incentive-view">

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=> 'Сотрудник ФИШ',
                'headerOptions' => ['style' => 'color: #007bff'],
                'value' => function ($data) {
                   // return $data ? $data->worked->user->name .' '.$data->worked->user->name: '';
                   return $data ? $data->user->user->name .' '.$data->user->user->surname: '';
                }
            ],
            'percent',
            'summa',
            'date',
        ],
    ]) ?>

</div>
