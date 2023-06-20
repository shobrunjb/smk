<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiInterviewPeserta */

$this->title = 'Create bei-interview-peserta';
$this->params['breadcrumbs'][] = ['label' => 'bei-interview-pesertas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bei-interview-peserta-create">

   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
