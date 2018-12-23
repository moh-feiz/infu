<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

use yii\helpers\Url;

Yii::$app->log->targets['debug'] = null;
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <!-- link for css----->
    <link type="text/css" rel="stylesheet" href="<?=Yii::getAlias('@web').'/css/bootstrap.min.css' ?>"/>
    <link rel="stylesheet" href="<?= Yii::getAlias('@web').'/css/fontawesome-free-5.3.1-web/css/all.min.css' ?>" />
    <link type="text/css" rel="stylesheet" href="<?=Yii::getAlias('@web').'/css/layout/layout.css' ?>"/>
    <!-- link for js----->

    <script type="text/javascript" src="<?=  Yii::getAlias('@web').'/js/jquery-1.11.0.min.js'?>"> </script>
    <script type="text/javascript" src="<?=  Yii::getAlias('@web').'/js/jquery-migrate-1.2.1.min.js'?>"> </script>
    <script type="text/javascript" src="<?= Yii::getAlias('@web').'/js/bootstrap.min.js'?>"> </script>
    <script type="text/javascript" src="<?=  Yii::getAlias('@web').'/js/layout/layout.js'?>"> </script>

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="container-fluid size-header" > <!--------header----->
  <div class="row">
      <header class="container">
          <div class=" col-sm-3 logo"> <!---logo----->
              <a class="nav navbar-brand" id="logo-fix" href="#">
                  <img class="img-responsive logo-size" src="<?= Yii::getAlias('@web').'/img/logo.png' ?>" />
              </a>
          </div>


          <div class=" col-sm-9 menu">  <!---menu----->
              <ul class="nav navbar-nav navbar-right ">
                  <?php
                  if(!Yii::$app->user->isGuest) {
                  ?>
                      <li>
                          <form id="logout-form" action="<?= Url::toRoute('site/logout') ?>" method="post">
                              <a class="logout-btn height" href="#"> (<?= Yii::$app->user->identity->username ?>)  خروج</a>
                          </form>
                      </li>
                      <li><a class="height" href="<?=URL::toRoute('website/index') ?>">لیست پیمانکاران</a></li>
                      <li><a class="height" href="<?=URL::toRoute('website/create') ?>">ایجاد پیمانکار</a></li>

                  <?php    } else { ?>
                      <li><a class="height" href="<?=URL::toRoute('site/login') ?>">ورود</a></li>
                  <li><a class="height" href="<?=URL::toRoute('site/signup') ?>">ثبت نام</a></li>
              <?php    }
                  ?>


              </ul>
          </div>

      </header>
  </div>
</div>     <!--------header----->


<div class="container"><!-- views folder -->
  <div class="row">
        <?= $content ?>
  </div>
</div>           <!-- views folder -->

<div class="container-fluid size-footer"> <!-- Footer -->


    <footer class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row margin text-center"><!--- step1 input search --->

                     <!-- Search form -->
                      <form class="form-inline active-cyan-3 active-cyan-4">
                      <i class="fa fa-search" aria-hidden="true"></i>
                      <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                      </form>

                </div>
                 <div class="row">
            <div class="col-sm-4 text-center">
                <ul class="list-unstyled">
                    <li><a href="#"> درباره ما</a></li> <li><a href="#"> محصولات ما</a></li><li><a href="#"> خدمات ما</a></li>
                </ul>
            </div>
            <div class="col-sm-4 text-center">
                <div class="wrapper">
                    <a href="#"><i class="fab fa-3x fa-google-plus"></i></a>
                    <a href="#"><i class="fab fa-3x fa-facebook-square"></i></a>
                    <a href="#"><i class="fab fa-3x fa-twitter-square"></i></a>
                </div>


            </div>
            <div class="col-sm-4 text-center">
                <ul class="list-unstyled">
                    <li><a href="#"> آدرس</a></li> <li><a href="#"> ایمیل</a></li><li><a href="#"> تلفن</a></li>
                </ul>
            </div>
        </div> <!--- step2 link & icon --->
            </div>
            <div class="row">
                <div class="col-xs-12 text-center margin"><!--- @@@@ --->
                    © 2018 Copyright:
                    <a href="#"> www.ARTETA.com</a>
                </div>
            </div>
       </div>

    </footer>
</div> <!-- Footer -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
