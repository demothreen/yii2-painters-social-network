<?php

namespace app\controllers;

use app\models\Picture;
use app\models\PictureUpload;
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

    /**
     * Загрузка файла
     * @return string
     */
    public function actionUpload()
    {
        $model = new PictureUpload();

        if ($model->load(Yii::$app->request->post())) {
            $model->pictureFile = UploadedFile::getInstance($model, 'pictureFile');
            if ($model->upload()) {
                $this->redirect('index');
            }
        }
        return $this->render('upload', [
            'model' => $model
        ]);
    }

}