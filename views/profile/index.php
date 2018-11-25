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
                <div class="mb-0 mt-4">
                    <h1>My profile</h1>
                </div>
            </div>
        </div>
        <hr class="mt-2">
        <?php if (!empty($profile)) : ?>
            <?php foreach ($profile as $user): ?>
                <b>Name: </b> <?= Html::encode("{$user->name}") ?>
                <br>
                <b>About me:</b> <?= Html::encode("{$user->about}") ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="form-group">
            <div class="col-lg-offset-4 col-lg-4">
                <?= Html::a('Change', ["/profile/change"], ['class' => 'btn custom-btn btn-primary', 'style' => 'width:100%']) ?>
            </div>
        </div>
    </div>
</div>