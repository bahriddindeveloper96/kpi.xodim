<?php
use common\models\User;
use common\models\UserPosition;
use common\models\Company;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Salary $model */

$this->title = $model->user->name. ' '.$model->user->surname ;
$this->params['breadcrumbs'][] = ['label' => 'Daromad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="salary-view">

   

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
                'attribute'=> 'Korxona nomi',
                'headerOptions' => ['style' => 'color: #007bff'],
                'value' => function ($data) {
                    return $data ? $data->company->company_name : '';
                }
            ],
            ['attribute'=> 'user_id',
            'value'=> function($model){
                $user = User::findOne($model->user_id);
                      
                return $user ? $user->name .' '.$user->surname :'';
              
            }
            ],
            'money',
            ['attribute'=> 'Lavozimi',
            'value'=> function($model){
                $position = UserPosition::findOne(['xodim_id' => $model->user_id]);
                return $position ? $position->division->name  :'';
            }
            ],
            'comment',
        ],
    ]) ?>

</div>
