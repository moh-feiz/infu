<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;
use common\models\Website;
use common\models\Image;


/* @var $this yii\web\View */
/* @var $model common\models\Website */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="website-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>



    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList([  '0' => 'نفت و گاز', '1' => 'نیروگاهی' , '2' =>'راهسازی' , '3' => 'ایرلاین']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput(['name'=>'image']) ?>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


