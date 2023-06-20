<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiInterviewBacth */

$this->title = 'Tambah Interview Bacth';
$this->params['breadcrumbs'][] = ['label' => 'interview-bacth', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bei-interview-bacth-create">

   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
