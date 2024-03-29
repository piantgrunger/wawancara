<?php
  use yii\helpers\Url;

  use hscstudio\mimin\components\Mimin;

  $menuItems =
  [
               [
                  'visible' => !Yii::$app->user->isGuest,
                  'label' => 'User / Group',
                  'icon' => 'users',
                  'url' => '#',
                  'items' => [
              ['label' => 'App. Route', 'icon' => 'user', 'url' => ['/mimin/route/'], 'visible' => !Yii::$app->user->isGuest],
              ['label' => 'Role', 'icon' => 'users', 'url' => ['/mimin/role/'], 'visible' => !Yii::$app->user->isGuest],
              ['label' => 'User', 'icon' => 'user', 'url' => ['/user/index'], 'visible' => !Yii::$app->user->isGuest],
                  ], ],
                  [
                    'visible' => !Yii::$app->user->isGuest,
                    'label' => 'Master',
                    'url' => '#',
                    'items' => [
                ['label' => 'Peserta', 'icon' =>  'user-circle', 'url' => ['/peserta/index'],'visible' => !Yii::$app->user->isGuest],
                ['label' => 'Sekolah', 'icon' =>  'university', 'url' => ['/sekolah/index'],'visible' => !Yii::$app->user->isGuest],
               ['label' => 'Elemen', 'icon' =>  'list', 'url' => ['/elemen/index'],'visible' => !Yii::$app->user->isGuest],
               ['label' => 'Indikator', 'icon' =>  'check', 'url' => ['/indikator/index'],'visible' => !Yii::$app->user->isGuest],
                
                ]]
 
          ];


  if (!Yii::$app->user->isGuest) {
      if (Yii::$app->user->identity->username !== 'admin') {
          $menuItems = Mimin::filterMenu($menuItems);
      }
  }

    ?>
<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="<?=Url::to(["/"])?>">Wawancara SNPDB</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="<?=Url::to(["/"])?>"><i class="fa fa-record"></i></a>
  </div>
  <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="active"><a class="nav-link" href="<?=Url::to(["/"])?>"><i class="fa fa-columns"></i> <span>Dashboard</span></a></li>

      <li class="menu-header">Menu</li>

<?php echo app\widgets\Menu::widget(
        [
        'items' => $menuItems,
    ]
    //Menus::menuItems()
    ); ?>
    </ul>
  
      
                
         <div class="sidebar-brand">
        <img src="https://emadrasah.kemenag.go.id/cbtsnpdb/adm/web/image/default/logo-uinsa.png" class="text-center" width="55.88px" height="58.88px" style="margin: 9px 11px">

  <p class="text-center"><small>Aplikasi Wawancara v1.0<br>Copyright © 2021 Aplikasi Wawancara <br> UIN Sunan Ampel Surabaya</small></p>
    </div>

       

</aside>