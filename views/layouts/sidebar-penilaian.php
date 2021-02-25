<?php
  use yii\helpers\Url;

  use hscstudio\mimin\components\Mimin;
use app\models\Nilai;
$id_penilai = Yii::$app->user->identity->id;



  $peserta = $this->params['peserta'];

$indikator = $this->params['indikator'];
  


    ?>
<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="<?=Url::to(["/"])?>">Applikasi Wawancara</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="<?=Url::to(["/"])?>"><i class="fa fa-microscope"></i></a>
  </div>
  <ul class="sidebar-menu">
  <li class="menu-header">Peserta</li>
  </ul>
  <div class="user-item">
                          <img alt="image" src="<?=Url::to('https://drive.google.com/uc?export=view&id=' . $peserta->foto)?>" class="img-round" height="150px" width="150px">
                          <div class="user-details">
                            <div class="user-name"><?=$peserta->nama?></div>
                            <div class="text-job text-muted"><?=$peserta->nopeserta?></div>
                            <div class="user-cta">
                           
                            </div>
                          </div>  
   </div>

  <div class="card">
  <div class="card-body">
  <div class="row">
  <?php
    $i=0;
    $elemen='';
     foreach ($indikator as $item) {

     
  ?>
  <?php

   if($elemen != $item->id_elemen)
   {
     ?>
         <p class="card-text"><?=$item->elemen->nama?></p>
        <div class="form-group">
  
     <?php
   }

  ?>

        <a id=btn-<?=$item->id?> class="btn btn-icon <?=Nilai::getNilaiPeserta($id_penilai, $peserta->id, $item->id)==null?"btn-secondary":"btn-success" ?> btn-navigation" data-destination="<?=$i+1?>" data-id="<?=$item->id?>" title="<?=$item->nama?>" > <?=$i+1?> </a>

  <?php
   $i++;
   $elemen=$item->id_elemen;

   
   if($elemen != $item->id_elemen)
   {
     ?>
    </div>
  
     <?php
   }

     }
  ?>
  </div>
  </div></div>
</aside>