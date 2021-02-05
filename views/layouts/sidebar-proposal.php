<?php
  use yii\helpers\Url;

  use hscstudio\mimin\components\Mimin;

  $menuItems =
  [
              ['label' => '1. Isian Penelitian', 'icon' => '', 'url' => ['/proposal/isian','id'=>yii::$app->params['id_proposal']], 'visible' => !Yii::$app->user->isGuest],
                ['label' => '2. Data Peneliti', 'icon' => '', 'url' => ['/proposal/peneliti','id'=>yii::$app->params['id_proposal']], 'visible' => !Yii::$app->user->isGuest],
                ['label' => '3. Upload Kelengkapan', 'icon' => '', 'url' => ['/proposal/upload','id'=>yii::$app->params['id_proposal']], 'visible' => !Yii::$app->user->isGuest],
                ['label' => '4. Ajukan Proposal', 'icon' => '', 'url' => ['/proposal/pengajuan','id'=>yii::$app->params['id_proposal']], 'visible' => !Yii::$app->user->isGuest],


  ];



    ?>
<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="<?=Url::to(["/"])?>">SITASA</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="<?=Url::to(["/"])?>"><i class="fa fa-microscope"></i></a>
  </div>
  <ul class="sidebar-menu">
      <li class="menu-header">Daftar Proposal</li>
      <li class="active"><a class="nav-link" href="<?=Url::to(["/proposal"])?>"><i class="fa fa-columns"></i> <span>Proposal yang Masuk</span></a></li>

      <li class="menu-header">Menu</li>

<?php echo app\widgets\Menu::widget(
        [
        'items' => $menuItems,
    ]
    //Menus::menuItems()
    ); ?>
    </ul>

</aside>