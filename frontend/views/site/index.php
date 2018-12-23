<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

?>
<link type="text/css" rel="stylesheet" href="<?=Yii::getAlias('@web').'/css/site/index.css' ?>"/>

<div class="container default-margin">
    <div class="row text-center">
        <div class="col-lg-12">
            <div class="row"> <!-- for slider row-->
                <div class="col-lg-12 "> <!--slide-->
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="<?= Yii::getAlias('@web').'/img/slide5.jpg' ?>" alt="...">
                                <div class="carousel-caption">
                                   <h2>header</h2>
                                    <p>paragraph and introduce</p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="<?= Yii::getAlias('@web').'/img/slide2.jpg' ?>" alt="...">
                                <div class="carousel-caption">
                                    <h2>header</h2>
                                    <p>paragraph and introduce</p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="<?= Yii::getAlias('@web').'/img/slide3.jpg' ?>" alt="...">
                                <div class="carousel-caption">
                                    <h2>header</h2>
                                    <p>paragraph and introduce</p>
                                </div>
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                </div> <!--slide-->
            </div>
            </div>
            <div class="row default-margin"> <!--panel introduce-->
                <div class="col-sm-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">هدف ما</h3>
                        </div>
                        <div class="panel-body">
                            پل ارتباطی بین کارفرما و پیمانکار
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">خدمات </h3>
                        </div>
                        <div class="panel-body">
                            ثبت رزومه ی مصور پیمانکاران
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                     <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">معرفی سایت</h3>
                        </div>
                        <div class="panel-body">
                            اولین سایت تخصصی کسب و کار مهندسی
                        </div>
                    </div>
                </div>
            </div> <!--panel introduce-->

        </div>
    </div>
</div>

<script type="text/javascript" src="<?= Yii::getAlias('@web').'/js/site/index.js'?>"> </script>


