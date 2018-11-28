<?php

namespace app\controllers;

use app\models\Picture;
use app\models\PictureUpload;
use DateTimeZone;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

/**
 * Для вывода и записи картин пользователя
 * Class PictureController
 * @package app\controllers
 */
class PictureController extends Controller
{
    /**
     * Просмотр собственных картин
     * @return string
     */
    public function actionIndex()
    {
        $pictures = Picture::findAll(['author' => Yii::$app->user->identity->username]);

        return $this->render('index', [
            'pictures' => $pictures,
        ]);
    }

    public function actionUpload()
    {
        $model = new PictureUpload();

        if (Yii::$app->request->isPost) {
            $model->pictureFile = UploadedFile::getInstance($model, 'pictureFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }
        return $this->render('upload', [
            'model' => $model
        ]);
    }

}