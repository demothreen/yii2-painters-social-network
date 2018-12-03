<?php

use yii\helpers\Html;
use yii\helpers\Url;

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
    </div>
    <div class="form-group">
        <div class="col-lg-offset-5 col-lg-2">
            <?= Html::a('Add new picture', ["/picture/upload"], ['class' => 'btn custom-btn btn-primary', 'style' => 'width:100%']) ?>
        </div>
    </div>
    <div class="col-md-10 offset-md-1">
        <div class="picture-grid">
            <?php if (!empty($pictures)) : ?>
                <?php foreach ($pictures as $picture): ?>
                    <div>
                        <b>Name: </b> <?= Html::encode("{$picture->picture_name}") ?>
                        <?= Html::img(Url::to('/uploads/' . $picture->picture_name) . '.jpg', ['class' => 'image']); ?>
                        <b>Date:</b> <?= Html::encode("{$picture->insert_date}") ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>