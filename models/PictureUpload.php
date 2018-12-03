<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * Загрузка файла
 * Class PictureUpload
 * @package app\models
 */
class PictureUpload extends Model
{
    /** @var string Автор */
    public $author;
    /** @var string Имя изображения */
    public $picture_name;
    /** @var string Дата втавки */
    public $insert_date;
    /** @var UploadedFile */
    public $pictureFile;

    /** @inheritdoc */
    public function rules()
    {
        return [
            [['picture_name'], 'required'],
            [['author', 'insert_date'], 'string', 'max' => 255],
            [['pictureFile'], 'file', 'extensions' => 'jpg, jpeg, png', 'skipOnEmpty' => false],
        ];
    }

    /** @inheritdoc */
    public function attributeLabels()
    {
        return [
            'author' => 'Автор',
            'picture_name' => 'Название',
            'pictureFile' => 'Файл'
        ];
    }

    /**
     * Загрузка файла
     * @return bool
     * @throws \yii\base\Exception
     */
    public function upload()
    {
        if ($this->validate()) {
            $this->insert_date = (new \DateTime())->format('d.m.Y H:i:s');

            if (!empty($this->pictureFile)) {
                $this->pictureFile->saveAs("uploads/{$this->picture_name}.{$this->pictureFile->extension}");
                $attachment = new Picture();
                $attachment->load($this->attributes, '');
                if ($attachment->save()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
}