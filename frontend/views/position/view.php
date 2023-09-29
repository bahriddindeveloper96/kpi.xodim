<?php
use common\models\User;

use common\models\Company;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\UserPosition $model */

$this->title = $model->user->name .' '.$model->user->surname;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудник', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-position-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            [
                'attribute'=> 'Сотрудник ФИШ',
                'headerOptions' => ['style' => 'color: #007bff'],
                'value' => function ($data) {
                    return $data ? $data->user->name .' '.$data->user->surname: '';
                }
            ],
            [
                'attribute'=> 'Корхона',
                'headerOptions' => ['style' => 'color: #007bff'],
                'value' => function ($data) {
                    return $data ? $data->company->company_name : '';
                }
            ],
            [
                'attribute'=> 'Должность',
                'headerOptions' => ['style' => 'color: #007bff'],
                'value' => function ($data) {
                    return $data ? $data->division->name : '';
                }
            ],
            'begin_date',
            'buyruq_file',
            ['attribute'=> 'Владелец',
            'value'=> function($model){
                $user = User::findOne($model->created_by);
                      
                return $user ? $user->name .' '.$user->surname :'';
              
            }
            ],
            
            
        ],
    ]) ?>

</div>
