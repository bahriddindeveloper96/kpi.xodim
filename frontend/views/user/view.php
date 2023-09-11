<?php

use common\models\User;
use common\models\UserPosition;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Xodim', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <p>
        <?= Html::a('Yangilash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
           // 'username',
            'name',
            'surname',
            'fathers_name',
            'phone',
            [
                'attribute' => 'role',
                'value' => function (User $model) {
                    return $model->role ? User::rolesList()[$model->role] : '';
                },
            ],
            // [
            //     'attribute' => 'position_id',
            //     'value' => function (User $model) {
            //         return $model->position_id ? 
            //         UserPosition::findOne(['id' =>$model->position_id])->position 
            //         : '';
            //     },
            // ],
        ],
    ]) ?>

</div>
