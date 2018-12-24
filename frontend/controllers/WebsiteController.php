<?php

namespace frontend\controllers;

use common\models\User;
use Yii;
use common\models\Website;
use common\models\Image;

use common\models\WebsiteSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Comment;
use common\models\Likee;

/**
 * WebsiteController implements the CRUD actions for Website model.
 */
class WebsiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Website models.
     * @return mixed
     */
    public function actionIndex()
    {
        $sql = "select * from website";
        $websites = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('index', [
            'websites' => $websites
        ]);
    }


    /**
     * Displays a single Website model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Website model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Website the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Website::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Creates a new Website model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    public function actionCreate()
    {
        $user_id = Yii::$app->user->id;
        $model = new Website();

        $model->user_id=$user_id;

        // check if request is post
        if ($model->load(Yii::$app->request->post())) {

            //save website in database
            $website = new Website();
            $website->user_id = $user_id;
            $website->title = $_POST['Website']['title'];
            $website->type = $_POST['Website']['type'];
            $website->description = $_POST['Website']['description'];
            $website->url = $_POST['Website']['url'];

            // save model and if successful, will upload image
            if($website->save()){

                // get the last website id that has been saved to website table
                $website_id = Yii::$app->db->getLastInsertID();

                // upload all images
                foreach ($_POST['image'] as $index => $each_image){
                    $image_name = Image::uploadImage('image','600','400','websites',true,$index);
                    $image = new Image();
                    $image->website_id = $website_id;
                    $image->image = $image_name;
                    $image->save();
                }
            }



            return $this->redirect('index');
        }else{
            return $this->render('create', [
                'model' => $model,
            ]);
        }


    }

    /**
     * Updates an existing Website model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Website model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteWebsite()
    {
        if (isset($_POST['id_for_website'])) {
            $id_for_website = $_POST['id_for_website'];

            // delete comments of website
            $coments = Comment::find()->where(['website_id'=>$id_for_website])->all();
            foreach ($coments as $comment){
                $comment->delete();
            }

            // delete likes of website
            $likes=Likee::find()->where(['website_id'=>$id_for_website])->all();
            foreach ($likes as $like){
                $like->delete();
            }

            //delete image website
            $image=Image::find()->where(['website_id'=>$id_for_website])->all();
            foreach ($image as $img){
                $img->delete();
            }



            // delete website
            $delete_website = Website::find()->where(['id'=>$id_for_website])->one();
            $delete_website->delete();


            if ($delete_website) {
                $result = ['code' => 200, 'id' => $id_for_website, 'message' => 'عملیات با موفقیت انجام شد'];
                return json_encode($result);

            } else {
                $result = ['code' => 400, 'id' => $id_for_website, 'message' => 'عملیات با موفقیت انجام نشدددد'];
                return json_encode($result);

            }
        } else {
            return $this->render('error', [
                'message' => 'شما به این صفحه دسترسی ندارید',
            ]);

        }

    }

    public function actionAddComment(){
        if (isset($_POST['website_id'])){
            $website_id=$_POST['website_id'];
            $comment=$_POST['comment'];

            if (Website::repeated_comment($website_id,$comment)){
                $result=['message'=>'کامنت تکراری می باشد', 'code'=>400];
                return json_encode($result);
            }else{
                if (Website::add_comment($website_id,$comment)){
                $result=['message'=>'کامنت با موفقیت ایجاد گردید','code'=>200];
                return json_encode($result);
                }else{
                    $result=['message'=>'ثبت کامنت با مشکل مواجه گردید', 'code'=>400];
                    return json_encode($result);
                }

            }

        }else{
            return $this->render('error', [
                'message' => 'شما به این صفحه دسترسی ندارید',
            ]);
        }
    }
    public function actionDeleteComment()
    {
        if (isset($_POST['comment_id'])) {
            $comment_id = $_POST['comment_id'];
            $sql = "DELETE FROM comment where id= $comment_id";
            $delete = Yii::$app->db->createCommand($sql)->execute();
            if ($delete) {
                $result = ['code' => 200,  'message' => 'کامنت با موفقیت حذف گردید'];
                return json_encode($result);

            } else {
                $result = ['code' => 400,  'message' => 'حذف کامنت ناموفق'];
                return json_encode($result);

            }
        } else {
            return $this->render('error', [
                'message' => 'شما به این صفحه دسترسی ندارید',
            ]);

        }

    }

    public function actionLike(){
        if (isset($_POST['website_id'])){
            $website_id=$_POST['website_id'];
            $user_id=Yii::$app->user->id;
            if (Website::repeated_like($user_id,$website_id)){
                $result=['message'=>'ثبت لایک تکراری می باشد', 'code'=>400];
                return json_encode($result);
            }else{
                if (Website::add_like($user_id,$website_id)){
                $result=['message'=>'لایک با موفقیت ایجاد گردید','code'=>200];
                return json_encode($result);
                }else{
                $result=['message'=>'ثبت لایک با مشکل مواجه گردید', 'code'=>400];
                return json_encode($result);
                }
            }
        }else{
            return $this->render('error', [
                'message' => 'شما به این صفحه دسترسی ندارید',
            ]);
        }

    }
    public function actionList(){
      $q=Website::find();
        $dataProvider = new ActiveDataProvider(
            [
                'query'=>$q,
            ]

        );
        return $this->render('list',['dataProvider'=>$dataProvider]);
    }
    public function actionComm(){
        print_r($_POST);
    }

}
