<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Tambah User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <?= $this->render('view', [
    'model' => $modelPegawai,
    ]) ?>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
