<?php

namespace common\models;
use yii\Helpers\FileHelper;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

use Yii;

/**
 * This is the model class for table "{{%videos}}".
 *
 * @property string $videoId
 * @property string|null $videoName
 * @property string $title
 * @property string|null $description
 * @property string|null $tags
 * @property int|null $hasThumbnail
 * @property int|null $status
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $createdBy
 */
class Videos extends \yii\db\ActiveRecord
{
    const STATUS_UNLISTED=0;
    const STATUS_PUBLISHED=1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%videos}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['videoId', 'title'], 'required'],
            [['description'], 'string'],
            [['hasThumbnail', 'status', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['videoId'], 'string', 'max' => 16],
            [['videoName', 'title', 'tags'], 'string', 'max' => 512],
            [['videoId'], 'unique'],
            ['status','default','value'=>self::STATUS_UNLISTED],
            ['hasThumbnail','default','value'=>0],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    public function behaviors(){
        return[
            TimestampBehavior::class,
            [
                'class'=>BlameableBehavior::class,
                'updatedByAttribute'=>false
            ]
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'videoId' => 'Video ID',
            'videoName' => 'Video Name',
            'title' => 'Title',
            'description' => 'Description',
            'tags' => 'Tags',
            'hasThumbnail' => 'Has Thumbnail',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */

    public $video;

    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * {@inheritdoc}
     * @return VideosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VideosQuery(get_called_class());
    }
    public function save($runValidation=true, $attributeNames=null){
        $isInsert=$this->isNewRecord;
        if($isInsert){
            $this->videoId=Yii::$app->security->generateRandomString(8);
            $this->title=$this->video->name;
            $this->videoName=$this->video->name;
        }
        $saved=parent::save($runValidation, $attributeNames);
        if (!$saved){
            return false;
        }
        if ($isInsert){
            $videoPath=Yii::getAlias('@frontend/web/storage/videos/'. $this->videoId . '.mp4');
        
        if(!is_dir(dirname($videoPath))){
            FileHelper::createDirectory(dirname($videoPath));
        }
        $this->video->saveAs($videoPath);    
    
}
return true;
}
public function getVideoLink(){
    
}
}
