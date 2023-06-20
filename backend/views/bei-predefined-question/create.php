<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiPredefinedQuestion */

$this->title = 'Tambah Daftar Pertanyaan Kompetensi';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Pertanyaan Kompetensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bei-predefined-question-create">

   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
