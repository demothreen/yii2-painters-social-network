<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "picture".
 *
 * @property int $id
 * @property string $author
 * @property string $picture_name
 * @property string $insert_date
 * @property string $file_path
 */
class Picture extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'picture';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author'], 'required'],
            [['author', 'picture_name', 'insert_date', 'file_path'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author' => 'Author',
            'picture_name' => 'Picture Name',
            'insert_date' => 'Insert Date',
            'file_path' => 'File path'
        ];
    }
}
