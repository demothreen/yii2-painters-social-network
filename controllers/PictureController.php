<?php

namespace app\controllers;

use app\models\Picture;
use Yii;
use yii\web\Controller;

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

}