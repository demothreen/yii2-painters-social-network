<?php

/* @var $this yii\web\View */

use app\widgets\Alert;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);

$this->title = 'Painters Social Network';
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<?php $this->beginBody() ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php"><?= $this->title ?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip">
                <a class="nav-link" href="<?= Url::to(['site/index']) ?>">
                    <i class="fa fa-fw fa-home"></i>
                    <span class="nav-link-text">Home</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip">
                <a class="nav-link" href="<?= Url::to(['site/profile']) ?>">
                    <i class="fa fa-fw fa-user-circle-o"></i>
                    <span class="nav-link-text">My profile</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents"
                   data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">Just do it</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents">
                    <li>
                        <a href="<?= Url::to(['site/own-pictures']) ?>">
                            <i class="fa fa-picture-o"></i>
                            <span class="nav-link-text">See own pictures</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['site/load-pictures']) ?>">
                            <i class="fa fa-download"></i>
                            <span class="nav-link-text">Load new picture</span>
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>

        <?php if (!Yii::$app->user->isGuest): ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Logout
                        (<?= Yii::$app->user->identity->username ?>) </a>
                </li>
            </ul>
        <?php else : ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $this->render('@app/views/site/modals/modal') ?>" data-method="post">
                        <i class="fa fa-fw fa-sign-in"></i>Sign up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::to(['site/login']) ?>" data-method="post">
                        <i class="fa fa-fw fa-sign-in"></i>Login</a>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</nav>




<div class="content-wrapper">

    <?= $content; ?>

    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>© Demothreen 2018</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">You make me sad :(</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= Url::to(['site/logout']) ?>" data-method="post">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<?php $this->endBody() ?>
</html>

<?php $this->endPage() ?>


<?php
//todo: создать модалку для login
Modal::begin([
    'header' => '<h4>Destination</h4>',
    'id'     => 'model',
    'size'   => 'model-lg',
]);

echo "<div id='modelContent'></div>";

Modal::end();