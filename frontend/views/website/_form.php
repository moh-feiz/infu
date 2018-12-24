<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;
use common\models\Website;
use common\models\Image;


/* @var $this yii\web\View */
/* @var $model common\models\Website */
/* @var $form yii\widgets\ActiveForm */
?>
<link href="<?= Yii::getAlias('@web').'/css/website/form.css'?>" type="text/css" rel="stylesheet">

<div class="website-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>



    <?= $form->field($model, 'title')->textInput(['maxlength' => true ]) ?>

    <?= $form->field($model, 'type')->dropDownList([  '0' => 'نفت و گاز', '1' => 'نیروگاهی' , '2' =>'راهسازی' , '3' => 'ایرلاین']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput(['name'=>'image[]'])->label('images') ?>
    <?= $form->field($model, 'image')->fileInput(['name'=>'image[]', 'class'=>'display-img-2'])->label(false) ?>
    <?= $form->field($model, 'image')->fileInput(['name'=>'image[]', 'class'=>'display-img-3'])->label(false) ?>
    <?= $form->field($model, 'image')->fileInput(['name'=>'image[]', 'class'=>'display-img-4'])->label(false) ?>

    <a href="#" class="show-next display-btn-2 btn btn-info">Add next image</a>
    <a href="#" class="display-btn-3 btn btn-primary" id="show-next">Add Next image</a>
    <a href="#" class="display-btn-4 btn btn-danger">Add Next image</a>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>


<script src="<?= Yii::getAlias('@web').'/js/website/form.js'?>"></script>


