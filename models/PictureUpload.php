<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class PictureUpload extends Model
{
    public $author;
    public $picture_name;
    public $insert_date;
    /** @var UploadedFile */
    public $pictureFile;

    public function rules()
    {
        return [
            [['picture_name'], 'required'],
            [['author', 'insert_date'], 'string', 'max' => 255],
            [['pictureFile'], 'file', 'extensions' => 'jpg, jpeg, png', 'skipOnEmpty' => false],
        ];
    }

    public function attributeLabels()
    {
        return [
            'author' => 'Автор',
            'picture_name' => 'Название',
            'pictureFile' => 'Файл'
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->insert_date = (new \DateTime())->format('d.m.Y H:i:s'); //todo: исправить таймзону и сделать загрузку в бд
            $this->pictureFile->saveAs('uploads/' . $this->pictureFile->baseName . '.' . $this->pictureFile->extension);
            return true;
        } else {
            return false;
        }
    }
}