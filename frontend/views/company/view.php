<?php
use common\models\User;
use common\models\Company;
use yii\helpers\Html;
use yii\widgets\DetailView;
$this->title = $model->company_name ;
/** @var yii\web\View $this */
/** @var common\models\Company $model */


$this->params['breadcrumbs'][] = ['label' => 'Korxonalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="company-view">

   

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалит', ['delete', 'id' => $model->id], [
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
            'id',
            'company_name',
            'company_inn',
            'address',
            

            ['attribute'=> 'created_by',
            'value'=> function($model){
                $user = User::findOne($model->created_by);
                      
                return $user ? $user->name .' '.$user->surname :'';
              
            }
            ],

        ],
    ]) ?>

</div>
