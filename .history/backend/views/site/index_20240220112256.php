<?php
use common\models\User;
use common\models\Company;
use common\models\Mission;
use common\models\Division;
use common\models\Salary;
use common\models\Davomat;
use common\models\Results;

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
                'body' => "<h3>Admin $full_name <br>
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
        <?php $company = Company::find()->all();
            $com = count($company);
        ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => "$com",
                'text' => 'Предприятие',
                'icon' => 'fas fa-university',
                'linkUrl'=>Url::to("/admin/company/index"),
                //'linkLabel' => 'More Info',
            ]) ?>
        </div>
        <?php $division = Division::find()->all();
            $div = count($division);
        ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => "$div",
                'text' => 'Отделы',
                'icon' => 'fas fa-briefcase fa-fade',
                'linkUrl'=>Url::to("/admin/division/index"),
            ]) ?>
        </div>
        <?php 
            $today = date("Y-m-d"); // Bugungi sana olish
            //$positions = Davomat::find()->where(['id'=>75])->all(); 
            $pos = Davomat::find()->where(['izox' => 'fvfvfvfv'])->count();
            //$pos = count($positions);
        ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => "$pos",
                'text' => 'Давомат',
                'icon' => 'fas fa-user',
                'linkUrl'=>Url::to("/admin/davomat/index"),
            ]) ?>
        </div>
    </div>
    <?php $salary = Salary::find()->all();
            $sal = count($salary);
        ?>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => "$sal",
                'text' => 'Месяц доход',
                'icon' => 'fas fa-wallet',
                'theme' => 'gradient-secondary',
                'linkUrl'=>Url::to("/admin/salary/index"),
            ]) ?>
        </div>
        <?php $mission = Mission::find()->all();
            $mis = count($mission);
        ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => "$mis",
                'text' => 'Задания',
                'icon' => 'fas fa-paste',
                'theme' => 'gradient-success',
                'linkUrl'=>Url::to("/admin/mission/index"),
            ]) ?>
        </div>
        <?php $worked = Results::find()->all();
            $work = count($worked);
        ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => "$work",
                'text' => 'Отчеть',
                'theme' => 'gradient-warning',
                'icon' => 'fas fa-print',
                'linkUrl'=>Url::to("/admin/results/index"),
            ]) ?>
        </div>
    </div>
</div>