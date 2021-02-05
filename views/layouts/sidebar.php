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
 
          ];


  if (!Yii::$app->user->isGuest) {
      if (Yii::$app->user->identity->username !== 'admin') {
          $menuItems = Mimin::filterMenu($menuItems);
      }
  }

    ?>
<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="<?=Url::to(["/"])?>">Applikasi Wawancara</a>
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

</aside>