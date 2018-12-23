
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="<?=Yii::getAlias('@web').'/css/site/login.css'?>">

<div class="site-login container">

<div class="col-lg-4 col-lg-offset-4 text-center">
    <div id="wrapper">
            <?php $form = ActiveForm::begin(['id' => 'login-form','class'=>'login-form']); ?>
        <div class="header text-left">
            <h1><?= Html::encode($this->title) ?></h1>
            <p>Please fill out the following fields to login:</p>
        </div>
        <div class="content ">

            <?= $form->field($model, 'username')->
            textInput(['class'=>'input username ','autofocus' => true,'placeholder' => 'username'])->label(false) ?>

            <?= $form->field($model, 'password')->
            passwordInput(['class'=>'input password','placeholder' => 'password'])->label(false) ?>

            <?= $form->field($model, 'rememberMe')->checkbox(['class'=>'']) ?>
        </div>
            <div style="color:#999;margin:1em 0">
                If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
            </div>

                <?= Html::submitButton('Login', ['class' => 'btn btn-primary button test', 'name' => 'login-button']) ?>
            <?php ActiveForm::end(); ?>
        <div class="gradient"></div>

    </div>
    </div>
</div>




<script rel="script" type="text/javascript" src="<?=Yii::getAlias('@web').'/js/site/login.js' ?>" ></script>