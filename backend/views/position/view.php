<?php
use common\models\User;

use common\models\Company;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\UserPosition $model */

$this->title = $model->user->name .' '.$model->user->surname;
$this->params['breadcrumbs'][] = ['label' => 'Xodimlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-position-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            [
                'attribute'=> 'Xodim FISH',
                'headerOptions' => ['style' => 'color: #007bff'],
                'value' => function ($data) {
                    return $data ? $data->user->name .' '.$data->user->surname: '';
                }
            ],
            [
                'attribute'=> 'Korxona nomi',
                'headerOptions' => ['style' => 'color: #007bff'],
                'value' => function ($data) {
                    return $data ? $data->company->company_name : '';
                }
            ],
            [
                'attribute'=> 'Lavozimi',
                'headerOptions' => ['style' => 'color: #007bff'],
                'value' => function ($data) {
                    return $data ? $data->division->name : '';
                }
            ],
            'begin_date',
            'buyruq_file',
            ['attribute'=> 'created_by',
            'value'=> function($model){
                $user = User::findOne($model->created_by);
                      
                return $user ? $user->name .' '.$user->surname :'';
              
            }
            ],
            
            
        ],
    ]) ?>

</div>
