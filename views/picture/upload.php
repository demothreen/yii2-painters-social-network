<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<div class="container-fluid">
    <div class="col-md-6 offset-md-3">
        <div class="row">
            <div class="col-lg-offset-4 col-lg-4" style="text-align: center">
                <div class="mb-0 mt-0">
                    <h1>Upload picture</h1>
                </div>
                <hr class="mt-2">
            </div>
        </div>
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <?= $form->field($model, 'author', ['template' => '{input}'])->hiddenInput(['value' => Yii::$app->user->identity->username]) ?>
        <?= $form->field($model, 'picture_name')->textInput() ?>
        <?= $form->field($model, 'pictureFile')->fileInput() ?>

        <div class="form-group">
            <div class="col-lg-offset-4 col-lg-4">
                <?= Html::submitButton('Upload', ['class' => 'btn btn-primary custom-btn', 'name' => '']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>