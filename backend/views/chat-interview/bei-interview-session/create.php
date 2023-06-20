<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiInterviewSession */

$this->title = 'Tambah Sesi Interview';
$this->params['breadcrumbs'][] = ['label' => 'Sesi Interview', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bei-interview-session-create">

   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
