<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\widgets\Alert;

$this->title = 'SITASA';
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?>
  </title>
  <?php $this->head() ?>
</head>

<body>
  <?php $this->beginBody() ?>

  <body <?=Yii::$app->user->isGuest?"class='layout-3'":""?>
    >
    <div id="app">
      <div
        class="main-wrapper main-wrapper-1 <?=Yii::$app->user->isGuest?'container':""?>">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
          <?=$this->render("topnav")?>
        </nav>

        <?php if (Yii::$app->user->isGuest) { ?>
        <nav class="navbar navbar-secondary navbar-expand-lg">
          <div class="container">
            <ul class="navbar-nav">
              <li class="nav-item ">
                <a href="<?=Url::to(['/'])?>"
                  class="nav-link"><i class="fa fa-home"></i><span>Beranda</span></a>
              </li>

            </ul>
          </div>
        </nav>
        <?php } ?>

        <?php if (!Yii::$app->user->isGuest) { ?>
        <div class="main-sidebar">
          <?=$this->render("sidebar-proposal")?>
        </div>
        <?php }  ?>

        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <?php if (isset($this->blocks['content-header'])) { ?>
              <h1><?= $this->blocks['content-header'] ?>
              </h1>
              <?php } else { ?>
              <h1>
                <?php
                if ($this->title !== null) {
                    echo \yii\helpers\Html::encode($this->title);
                } else {
                    echo \yii\helpers\Inflector::camel2words(
                        \yii\helpers\Inflector::id2camel($this->context->module->id)
                    );
                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                } ?>
              </h1>
              <?php } ?>

              <?=
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>
            </div>
            <div class="section-body">
              <?=Alert::widget()?>
              <?=$content?>
            </div>
          </section>


        </div>
        <footer class="main-footer">

        </footer>
      </div>
    </div>

    <?php $this->endBody() ?>
  </body>

</html>
<?php
 $this->endPage() ; ?>
