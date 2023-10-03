<?php
use common\models\User;
use common\models\Company;
use common\models\Mission;
use common\models\Division;
use common\models\Salary;
use common\models\Position;
use common\models\Incentive;
use common\models\Worked;
use common\models\Kpi;
use yii\helpers\Url;
$this->title = 'КПИ Модули';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
        <?php $full_name = User::findOne(Yii::$app->user->id)->name.' '. User::findOne(Yii::$app->user->id)->surname ?>            
            <?= \hail812\adminlte\widgets\Alert::widget([
                'type' => 'success',
                'body' => "<h3>Xodim: $full_name <br>
                Tizimga muvaffaqiyatli kirildi!</h3>",
            ]) ?>
            
        </div>
    </div>

    <!-- <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <--?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'CPU Traffic',
                'number' => '10 <small>%</small>',
                'icon' => 'fas fa-cog',
            ]) ?>
        </div>
    </div> -->

    <!-- <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <--?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Messages',
                'number' => '1,410',
                'icon' => 'far fa-envelope',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <--?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Bookmarks',
                'number' => '410',
                 'theme' => 'success',
                'icon' => 'far fa-flag',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <--?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Uploads',
                'number' => '13,648',
                'theme' => 'gradient-warning',
                'icon' => 'far fa-copy',
            ]) ?>
        </div>
    </div> -->

    <!-- <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <-?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Bookmarks',
                'number' => '41,410',
                'icon' => 'far fa-bookmark',
                'progress' => [
                    'width' => '90%',
                    'description' => '70% Increase in 30 Days'
                ]
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <-?php $infoBox = \hail812\adminlte\widgets\InfoBox::begin([
                'text' => 'Likes',
                'number' => '41,410',
                'theme' => 'success',
                'icon' => 'far fa-thumbs-up',
                'progress' => [
                    'width' => '70%',
                    'description' => '70% Increase in 30 Days'
                ]
            ]) ?>
            <-?= \hail812\adminlte\widgets\Ribbon::widget([
                'id' => $infoBox->id.'-ribbon',
                'text' => 'Ribbon',
            ]) ?>
            <-?php \hail812\adminlte\widgets\InfoBox::end() ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <-?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Events',
                'number' => '41,410',
                'theme' => 'gradient-warning',
                'icon' => 'far fa-calendar-alt',
                'progress' => [
                    'width' => '70%',
                    'description' => '70% Increase in 30 Days'
                ],
                'loadingStyle' => true
            ]) ?>
        </div>
    </div> -->

    <div class="row">
        <?php $position = Position::find()->where(['xodim_id'=> Yii::$app->user->id])->all();
            $pos = count($position);
        ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => "$pos",
                'text' => 'Сотрудники',
                'icon' => 'fas fa-user',
                'linkUrl'=>Url::to("/position/index"),
            ]) ?>
        </div>
        <?php $salary = Salary::find()->where(['user_id'=>Yii::$app->user->id])->all();
            $sal = count($salary);
        ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => "$sal",
                'text' => "Месяц доход",
                'icon' => 'fas fa-wallet',
                'theme' => 'gradient-secondary',
                'linkUrl'=>Url::to("/salary/index"),
            ]) ?>
        </div>
        <?php $kpi = Kpi::find()->all();
            $kpis = count($kpi);
        ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => "$kpis",
                'text' => 'КПИ Резултать',
                'icon' => 'fas fa-user',
                'linkUrl'=>Url::to("/kpi/index"),
            ]) ?>
        </div>
    </div>
    
    <div class="row">
        
        <?php $mission = Mission::find()->all();
            $mis = count($mission);
        ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => "$mis",
                'text' => 'Задания',
                'icon' => 'fas fa-paste',
                'theme' => 'gradient-success',
                'linkUrl'=>Url::to("/mission/index"),
            ]) ?>
        </div>
        <?php $worked = Worked::find()->where(['user_id'=>Yii::$app->user->id])->all();
            $work = count($worked);
            $bonus = 'summa';
           
        ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => "$work",
                //'header' => "$bonus",
                'text' => 'Работа выполнена',
                'theme' => 'gradient-warning',
                'icon' => 'fas fa-print',
                'linkUrl'=>Url::to("/worked/index"),
            ]) ?>
        </div>
        <?php $incentive = Incentive::find()->where(['user_id'=>Yii::$app->user->id])->all();
            $inc = count($incentive);
        ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => "$inc",
                'text' => 'КПИ Бонуси',
                'icon' => 'fas fa-user',
                'linkUrl'=>Url::to("/incentive/index"),
            ]) ?>
        </div>
    </div>
</div>