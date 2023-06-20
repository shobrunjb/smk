<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiMstCategoryPredefQuest */

$this->title = 'Update Kategori Pertanyaan: ' . $model->category_predef_quest;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Kategori Pertanyaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bei_mst_category_predef_quest, 'url' => ['view', 'id' => $model->id_bei_mst_category_predef_quest]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bei-mst-category-predef-quest-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
