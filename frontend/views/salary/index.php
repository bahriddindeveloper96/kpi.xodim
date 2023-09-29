<?php
use common\models\User;
use common\models\Company;
use common\models\UserPosition;
use common\models\Salary;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\SalarySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Месяц доход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salary-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute'=> 'Корхона',
                'headerOptions' => ['style' => 'color: #007bff'],
                'value' => function ($data) {
                    return $data ? $data->company->company_name : '';
                }
            ],
            ['attribute'=> 'Сотрудник ФИШ',
            'value'=> function($model){
                $user = User::findOne($model->user_id);
                      
                return $user ? $user->name .' '.$user->surname :'';
              
            }
            ],
            'money',
            'money_date',
            //'comment',
            ['attribute'=> 'Должность',
            'value'=> function($model){
                $position = UserPosition::findOne(['xodim_id' => $model->user_id]);
                return $position ? $position->division->name  :'';
            }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Salary $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
