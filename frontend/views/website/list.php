<?php
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use hoomanMirghasemi\jdf\Jdf;
use yii\widgets\Pjax;


?>
<?php
echo ListView::widget([
    'dataProvider'=>$dataProvider,
    'itemView'=>'show_list',
]);

?>


<?php
$com =  "select * from comment";
$co = Yii::$app->db->createCommand($com)->queryOne();
$comment=new \common\models\Comment;

Pjax::begin();
$form=\yii\widgets\ActiveForm::begin([
    'action' => ['website/comm'],
    'enableClientValidation' => false,
    'options' => ['data-pjax'=>''],
]);
echo $form->field($comment , 'text');

echo $form->field($comment , 'user_id');
?>
<input type="hidden" name="Comment[website_id]" value="<?= $co['website_id'] ?>">
<?= \yii\helpers\Html::submitButton('submit',['class'=>'btn btn-primary'])?>
<?php \yii\widgets\ActiveForm::end(); ?>

<?php Pjax::end();
?>