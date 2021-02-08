<?php
  use yii\helpers\Url;

  use hscstudio\mimin\components\Mimin;


  $peserta = $this->params['peserta'];

$elemen = $this->params['elemen'];
  


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
  <div class="card-header">
   <h7 class="card-title">Elemen Pertanyaan</h7>
  </div>
  <div class="card-body">
  <?php
    $i=1;
     foreach ($elemen as $item) {

     
  ?>
        <a class="btn btn-icon btn-primary btn-elemen" data-id="<?=$item->id?>" title="<?=$item->nama?>" > <?=$i?> </a>
     
  <?php
   $i++;
     }
  ?>
  </div></div>
</aside>