<?php

namespace common\models;

use Yii;
use common\models\Image;
use yii\web\Uploadedfile;

/**
 * This is the model class for table "website".
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property int $type
 * @property string $description
 * @property string $url
 *
 * @property Comment[] $comments
 * @property Image[] $images
 * @property Likee[] $likees
 * @property User $user
 */
class Website extends \yii\db\ActiveRecord
{

    const OIL= 0;
    const POWER = 1;
    const ROADING = 2;
    const AIRLINE = 3;



    public $image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'website';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'title', 'type', 'description', 'url'], 'required'],
            [['url'], 'url' ,'defaultScheme' => 'http' ],
            [['user_id', 'type'], 'integer'],
            [['description'], 'string'],
            [['title', 'url'], 'string', 'max' => 256],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],

        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'title' => Yii::t('app', 'Title'),
            'type' => Yii::t('app', 'Type'),
            'description' => Yii::t('app', 'Description'),
            'url' => Yii::t('app', 'Url'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['website_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['website_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikees()
    {
        return $this->hasMany(Likee::className(), ['website_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    static function repeated_comment($website_id,$text){
        $user_id=Yii::$app->user->id;
        $sql=" SELECT * FROM comment where website_id='$website_id' and text='$text' and user_id='$user_id'" ;
        $comment=Yii::$app->db->createCommand($sql)->queryOne();
        if ($comment){
            return true;
        }else{
            return false;
        }
    }

    static function add_comment($website_id,$text){
        $user_id= Yii::$app->user->id;
        $sql="INSERT INTo comment (user_id, website_id, text) values ($user_id, $website_id, '$text')";
        $insert=Yii::$app->db->createCommand($sql)->execute();
        if ($insert){
            return true;
        }else{
            return false;
        }
    }

    static function get_comments($website_id){
        $sql="SELECT * FROM comment where website_id='$website_id' LIMIT 5";
        $comments=Yii::$app->db->createCommand($sql)->queryAll();
        return $comments;
    }

    static function repeated_like($user_id,$website_id){
        $user_id=Yii::$app->user->id;
        $sql=" SELECT * FROM likee where user_id='$user_id' and website_id='$website_id'" ;
        $like=Yii::$app->db->createCommand($sql)->queryOne();
        if ($like){
            return true;
        }else{
            return false;
        }
    }
    static function add_like($user_id,$website_id){
        $user_id= Yii::$app->user->id;
        $sql = "INSERT INTO likee (user_id, website_id) VALUES ($user_id, $website_id) ";
        $insert = Yii::$app->db->createCommand($sql)->execute();
        if ($insert){
            return true;
        }else{
            return false;
        }
    }


    static function get_likes($website_id){
        $sql="SELECT * FROM likee where website_id='$website_id'";
        $likes=Yii::$app->db->createCommand($sql)->queryAll();
        return $likes;
    }

    static function get_website_image($website_id){
        return Image::find()->where(['website_id'=>$website_id])->one();
    }
    static function get_number_like($website_id){
        return Likee::find()->where(['website_id'=>$website_id])->count();
    }

}
