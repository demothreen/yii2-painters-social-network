<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
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

<body class="fixed-nav sticky-footer bg-dark sidenav-toggled" id="page-top">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="/"><?= $this->title ?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip">
                <a class="nav-link" href="/">
                    <i class="fa fa-fw fa-home"></i>
                    <span class="nav-link-text">Home</span>
                </a>
            </li>
            <?php if (!Yii::$app->user->isGuest): ?>
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
                        <span class="nav-link-text">My pictures</span>
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
            <?php endif; ?>
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
                    <a class="nav-link" data-toggle="modal" data-target="#logout">
                        <i class="fa fa-fw fa-sign-out"></i>Logout
                        ( <?= Yii::$app->user->identity->username ?> ) </a>
                </li>
            </ul>
        <?php else : ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#signupModal">
                        <i class="fa fa-fw fa-sign-in"></i>Sign up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#loginModal">
                        <i class="fa fa-fw fa-sign-in"></i>Login</a>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</nav>

<div class="content-wrapper">
    <?= $content; ?>
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>© Demothreen 2018</small>
            </div>
        </div>
    </footer>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
</div>

</body>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>

<div class="modal fade" id="loginModal" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content animate" action="site/login" method="post">
            <div class="container-form">
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>
                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
                <button type="submit">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="rememberMe"> Remember me
                </label>
            </div>
            <div class="container-form-footer">
                <button class="cancelbtn" type="button" data-dismiss="modal">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="signupModal" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content animate">
            Sign Up Modal in progress...
        </div>
    </div>
</div>

<div class="modal fade" id="logout" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            </div>
            <div class="modal-body">You make me sad :(</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" href="<?= Url::to(['site/logout']) ?>" data-method="post">Logout
                </button>
            </div>
        </div>
    </div>
</div>