<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property int $website_id
 * @property string $image
 *
 * @property Website $website
 */
class Image extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['website_id', 'image'], 'required'],
            [['website_id'], 'integer'],
            [['image'], 'string', 'max' => 256],
            [['website_id'], 'exist', 'skipOnError' => true, 'targetClass' => Website::className(), 'targetAttribute' => ['website_id' => 'id']],
            [['image'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'website_id' => Yii::t('app', 'Website ID'),
            'image' => Yii::t('app', 'Image'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWebsite()
    {
        return $this->hasOne(Website::className(), ['id' => 'website_id']);
    }

    public static function resizeImage($resourceType,$image_width,$image_height,$resizeWidth,$resizeHeight) {
        $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
        imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
        return $imageLayer;
    }

    public static function uploadImage($name,$resizeWidth,$resizeHeight,$folder) {
        if(!empty($_FILES[$name]['tmp_name'])){
            $fileName = $_FILES[$name]['tmp_name'];
            $sourceProperties = getimagesize($fileName);
            $resizeFileName = time();
            $uploadPath = Yii::getAlias('@common').'/web/images/'.$folder.'/';
            $fileExt = pathinfo($_FILES[$name]['name'], PATHINFO_EXTENSION);
            $uploadImageType = $sourceProperties[2];
            $sourceImageWidth = $sourceProperties[0];
            $sourceImageHeight = $sourceProperties[1];
            switch ($uploadImageType) {
                case IMAGETYPE_JPEG:
                    $resourceType = imagecreatefromjpeg($fileName);
                    $imageLayer = self::resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$resizeWidth,$resizeHeight);
                    imagejpeg($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
                    break;

                case IMAGETYPE_GIF:
                    $resourceType = imagecreatefromgif($fileName);
                    $imageLayer = self::resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$resizeWidth,$resizeHeight);
                    imagegif($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
                    break;

                case IMAGETYPE_PNG:
                    $resourceType = imagecreatefrompng($fileName);
                    $imageLayer = self::resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$resizeWidth,$resizeHeight);
                    imagepng($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
                    break;

                default:
                    $imageProcess = 0;
                    break;
            }
            if(move_uploaded_file($fileName, $uploadPath. $resizeFileName. ".". $fileExt)){

                return 'thump_'.$resizeFileName.'.'.$fileExt;
            }else{
                return false;
            }
        }
        return false;
    }
}
