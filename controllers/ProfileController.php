<?php

namespace app\controllers;

use app\models\Profile;
use Yii;
use yii\web\Controller;

/**
 * Профиль пользователя
 * Class ProfileController
 * @package app\controllers
 */
class ProfileController extends Controller
{
    /**
     * Просмотр профиля
     * @return string
     */
    public function actionIndex()
    {
        $username = Yii::$app->user->identity->username;
        $profile = Profile::findAll(['username' => $username]);

        return $this->render('index', [
            'profile' => $profile,
        ]);
    }

    /**
     * Изменение профиля
     * @return string
     */
    public function actionChange()
    {
        $model = Profile::find()->where(['username' => Yii::$app->user->identity->username])->one();

        if (!$model) {
            $model = new Profile();
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Данные успешно сохранены');
                $this->goBack();
            } else
                Yii::$app->session->setFlash('error', 'Что-то пошло не так');
        }
        return $this->render('change', ['model' => $model]);
    }
}