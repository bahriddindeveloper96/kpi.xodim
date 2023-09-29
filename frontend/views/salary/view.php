<?php
use common\models\User;
use common\models\UserPosition;
use common\models\Company;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Salary $model */

$this->title = $model->user->name. ' '.$model->user->surname ;
$this->params['breadcrumbs'][] = ['label' => 'Доход', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="salary-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            [
                'attribute'=> 'Корхона',
                'headerOptions' => ['style' => 'color: #007bff'],
                'value' => function ($data) {
                    return $data ? $data->company->company_name : '';
                }
            ],
            ['attribute'=> 'Сотрудник',
            'value'=> function($model){
                $user = User::findOne($model->user_id);
                      
                return $user ? $user->name .' '.$user->surname :'';
              
            }
            ],
            'money',
            ['attribute'=> 'Должност',
            'value'=> function($model){
                $position = UserPosition::findOne(['xodim_id' => $model->user_id]);
                return $position ? $position->division->name  :'';
            }
            ],
            'comment',
        ],
    ]) ?>

</div>
