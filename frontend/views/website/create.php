<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Website */

$this->title = Yii::t('app', 'Create Website');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Websites'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="website-create">

    <h1 class="text-center">معرفی حوزه فعالیت</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
