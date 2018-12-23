<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Website;
use common\models\User;
use yii\helpers\Url;
use hoomanMirghasemi\jdf\Jdf;


/* @var $this yii\web\View */
/* @var $searchModel common\models\WebsiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */



?>
<link rel="stylesheet" href="<?= Yii::getAlias('@web') . '/css/website/index.css' ?>"/>
<input type="hidden" id="val-delete-url" value="<?= Url::toRoute('website/delete-website') ?>">
<input type="hidden" id="val-comment-url" value="<?= Url::toRoute('website/add-comment') ?>">
<input type="hidden" id="val-like-url" value="<?= Url::toRoute('website/like') ?>">
<input type="hidden" id="val-delete-comment" value="<?= Url::toRoute('website/delete-comment') ?>">

<div style="margin-top: 15px"><?php $x=date("Y-m-d h:i:s"); ?></div>

<time class="right"><?= \common\helpers\public_functions::date_to_view($x , '/') ?></time>
<?php foreach ($websites as $web) { ?>
   <?php $num = Website::get_number_like($web['id']) ; ?>

    <?php $user_info = User::get_user_info($web['user_id']) ?>
    <!-- section for see website data -->
    <div class=" col-lg-12 distance">
        <!-- section for contain orginal -->
        <div class="row">
            <div class="col-lg-12">
                <div class="col-md-7"> <!-- img right-->
                <?php
                $image=Website::get_website_image($web['id']);
                if($image){ ?>
                    <img src="http://<?= Yii::getAlias('@shared').'/images/websites/'.$image['image'] ?>"
                         class="thumbnail img-responsive "/>
                <?php  }else{ ?>
                    <img src="<?= Yii::getAlias('@web') . '/img/struburry.jpeg' ?>"
                         class="thumbnail img-responsive "/>
                <?php  } ?>
                </div>  <!-- img right-->

                <div class="col-md-5">
                    <div class="font-name"> <!-- name of website -->
                        <h2 class="text-center"> <?= $web['title'] ?></h2>
                    </div> <!-- img right-->
                    <div class="title"> <!-- other input website -->
                        <p style="direction: rtl"> <?= substr($web['description'],0,500) ?> ...
                            <a href="<?= $web['url'] ?>" target="_blank" class="btn">ادامه مطلب</a></p>
                        <a href="<?= $web['url'] ?>" target="_blank">Website: <?= $web['url'] ?></a>
                    </div> <!-- other input website -->
                    <div class="text-center like-img"><!-- img like website pic-->
                        <a href="#" id="like-<?= $web['id'] ?>">
                            <img class="like-website img-circle" id="like-<?= $web['id'] ?>"
                                 src="<?= Yii::getAlias('@web') . '/img/like.png' ?>"/>
                        </a>
                    </div>  <!-- img like website -->
                </div>

            </div>  <!-- section for contain orginal -->
        </div>

        <!-- for like website -->
        <div class="row like-panel">
            <div class=" col-lg-12"> <!-- loop like website -->
                <?php $likes = Website::get_likes($web['id']) ?>
                <div id="like-container-<?= $web['id'] ?>"></div>
                <?php foreach ($likes as $like) { ?>
                    <?php $user_info = User::get_user_info($like['user_id']) ?>
                    <span class="bold-name"> <?= $user_info['username'] ?> - </span>

                <?php } ?>
            </div> <!-- loop like website -->
        </div> <!-- for like website -->


        <!-- section for add comment -->
        <div class="row put-comment">
            <div class="col-lg-12">
                <textarea class="form-control" id="comment-<?= $web['id'] ?>"></textarea>
                <a href="#" class="btn add-comment-website" id="website-<?= $web['id'] ?>">Add Comment</a>
            </div>
            <!-- foreach for list comments-->
            <div class="row">
                <div id="comment-container-<?= $web['id'] ?>"></div>
                <?php $comments = Website::get_comments($web['id']) ?>

                <?php foreach ($comments as $comment) { ?>
                    <div class="col-lg-11 put-border ">
                        <p><?= $comment['text'] ?></p>
                        <time class="right-time"><?= $comment['created_at'] ?></time>
                        <!--   <span>user_id:<?= $comment['user_id'] ?></span>-->
                        <!--  <span>id:<?= $comment['id'] ?></span>-->

                    <!--    <span>user:<?= Yii::$app->user->id ?></span> -->

                        <!-- for delete comment -->
                        <?php if ($comment['user_id'] == Yii::$app->user->id) { ?>
                            <a class="btn btn-default delete-comment" href="#" id="delete-comment-<?= $comment['id'] ?>">delete</a>
                            <time class="right"><?= \common\helpers\public_functions::date_to_view($comment['created_at'] , '/') ?></time>
                        <?php } ?>
                    </div>
                <?php } ?>

            </div>
        </div>  <!-- section for add comment -->

        <!-- section for delete website -->
        <div class="row location-delete">
            <?php if ($web['user_id'] == Yii::$app->user->id) { ?>
                <div class="col-lg-2 col-lg-offset-10">
                    <a href="#" class="btn-info btn-lg delete-website-click" id="delete-<?= $web['id'] ?>">DELETE</a>
                    <img src="<?= Yii::getAlias('@web') . '/img/loader.gif' ?>" id="loader-<?= $web['id'] ?>"
                         class="img-loader"/>
                </div>
            <?php } ?>
        </div><!-- section for delete website -->


    </div>   <!-- section for see website data -->


<?php } ?>
<script rel="script" type="text/javascript" src="<?= Yii::getAlias('@web') . '/js/website/index.js' ?>"></script>








