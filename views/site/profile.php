<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

/* @var $model app\models\Profile */

///* @var $model */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'My Profile';
?>
<div class="container-fluid">
    <div class="site-profile">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                Hello, <b><?= Yii::$app->user->identity->username ?></b>!
            </li>
        </ol>
    </div>
    <div class="col-md-6 offset-md-3">
        <div class="row">
            <div class="col-lg-6 offset-md-3">
                <div class="mb-0 mt-4">
                    <i class="fa fa-user-circle-o"></i> Please tell us about yourself!
                </div>
                <hr class="mt-2">
            </div>
        </div>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            ],
        ]); ?>
        <?= $form->field($model, 'name')->textInput() ?>

        <?= $form->field($model, 'about')->textInput() ?>

        <div class="form-group">
            <div class="col-lg-offset-4 col-lg-4">
                <?= Html::submitButton('Save', ['class' => 'btn btn-primary custom-btn', 'name' => 'login-button']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
