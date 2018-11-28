<?php

use yii\helpers\Html;

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
            <div class="col-lg-offset-4 col-lg-4" style="text-align: center">
                <div class="mb-0 mt-0">
                    <h1>My pictures</h1>
                </div>
                <hr class="mt-2">
            </div>
        </div>
        <?php if (!empty($pictures)) : ?>
            <?php foreach ($pictures as $picture): ?>
                <b>Name: </b> <?= Html::encode("{$picture->picture_name}") ?>
                <br>
                <?php Html::img($picture->file_path);?>
                <br>
                <b>Date:</b> <?= Html::encode("{$picture->insert_date}") ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="form-group">
            <div class="col-lg-offset-4 col-lg-4">
                <?= Html::a('Add new picture', ["/picture/upload"], ['class' => 'btn custom-btn btn-primary', 'style' => 'width:100%']) ?>
            </div>
        </div>
    </div>
</div>