<?php

namespace common\modules\blog\models;

use common\components\behaviors\StatusBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $url
 * @property int $status_id
 * @property int $sort
 * @property int $date_create *
 * @property int $date_update*
 *
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * {@inheritdoc}
     */


    public function behaviors()
    {
        return [
            'timestampBehavior' => [

                    'class' => TimestampBehavior::className(),
                    'createdAtAttribute' => 'date_create',
                    'updatedAtAttribute' => 'date_update',
                    'value' => new Expression('NOW()'),
            ],
            'statusBehavior' => [
                'class' => StatusBehavior::className(),
            ],

        ];
    }

    public function rules()
    {
        return [
            [['title', 'url'], 'required'],
            [['url'], 'unique'],
            [['text'], 'string'],
            [['status_id'], 'integer'],
            [['sort'], 'integer', 'max' => 99, 'min' => 0],
            [['title', 'url'], 'string', 'max' => 255],
            [['date_update', 'date_create'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'url' => 'Url',
            'status_id' => 'Status ID',
            'sort' => 'Sort',
            'date_update' => 'DateUpdate',
            'date_create' => 'DateCreate'
        ];
    }

    public function getBlogTag()
    {
        return $this->hasMany(BlogTag::className(), ['blog_id' => 'id']);
    }
}
