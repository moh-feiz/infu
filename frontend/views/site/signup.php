<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="<?=Yii::getAlias('@web').'/css/site/signup.css'?>">
<!-- <div class="row">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
</div> -->

<div class="row">

    <div class="content-wrapper" id="margin-both">
        <div class="content">
            <div class="signup-wrapper shadow-box">
                <div class="company-details ">

                    <div class="shadow"></div>
                    <div class="wrapper-1">
                        <div class="logo">
                            <div class="icon-food">

                            </div>
                        </div>
                        <h1 class="title">Well come guys!</h1>
                        <div class="slogan">We want to introduce your website.</div>
                    </div>

                </div>
                <div class="signup-form ">
                    <div class="wrapper-2">
                        <div class="form-title">Sign up </div>
                        <p>Please fill out the following fields to signup:</p>
                        <div class="form">
                            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                            <form>
                                <p class="content-item">

                                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                                </p>

                                <p class="content-item">
                                        <?= $form->field($model, 'email') ?>
                                </p>

                                <p class="content-item">

                                        <?= $form->field($model, 'password')->passwordInput() ?>
                                </p>


                                <div class="form-group">
                                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                                </div>

                            </form>
                            <?php ActiveForm::end(); ?>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


</div>
<script rel="script" type="text/javascript" src="<?=Yii::getAlias('@web').'/js/site/signup.js' ?>" ></script>


