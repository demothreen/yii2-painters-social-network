<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


Modal::begin([
    'header' => '<h4>Job Created</h4>',
    'id' => 'signup-modal',
    'size' => 'modal-lg',
]);

echo "<div id='modalContent'></div>";
Modal::end();
