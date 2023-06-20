<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiCompentecyQuestion */

$this->title = 'Tambah Pertanyaan Kompetensi';
$this->params['breadcrumbs'][] = ['label' => 'Pertanyaan Kompetensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bei-compentecy-question-create">

   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
