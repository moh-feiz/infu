<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\validators\UrlValidator;
use yii\widgets\ActiveField;

/* @var $this yii\web\View */
/* @var $model common\models\Website */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="website-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
