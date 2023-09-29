<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Давомат',
                        'icon' => 'tachometer-alt',
                        'badge' => '<span class="right badge badge-info">2023</span>',
                        'url' => ['davomat/index']
                    ],
                    
                    
                    ['label' => 'Логин', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    
                    [
                        'label' => 'Пользователи',
                        'url' => ['user/view','id'=>Yii::$app->user->id]
                       
                    ],                    
                    ['label' => 'Cписок сотрудники', 'icon' => 'th', 'url' => ['position/index'],],
                    ['label' => 'Месяц доход', 'url' => ['salary/index'], 'iconStyle' => 'far'],
                    ['label' => 'Задания', 'url' => ['mission/index'], 'iconStyle' => 'far'],
                    ['label' => 'Работа выполнена', 'url' => ['worked/index'], 'iconStyle' => 'far'],
                    ['label' => 'КПИ резултать', 'url' => ['kpi/index'], 'iconStyle' => 'far'],
                    ['label' => 'КПИ Бонус', 'url' => ['incentive/index'], 'iconStyle' => 'far'],
                    ['label' => 'LABELS', 'header' => true],
                    ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                    ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                    ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>