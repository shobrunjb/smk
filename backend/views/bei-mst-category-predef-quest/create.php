<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiMstCategoryPredefQuest */

$this->title = 'Tambah Jenis Kategori Petanyaan ';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Kategori Pertanyaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bei-mst-category-predef-quest-create">

   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
