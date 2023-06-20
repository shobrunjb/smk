<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiMstCategoryPredefQuest */

$this->title = 'View Kategori Pertanyaan : '.$model->category_predef_quest;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Kategori Pertanyaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bei-mst-category-predef-quest-view  box box-primary">

   <div class="box-header">
        <?= Html::a('Update', ['update', 'id' => $model->id_bei_mst_category_predef_quest], ['class' => 'btn btn-primary btn-flat']) ?>
        <?php /* Html::a('Delete', ['delete', 'id' => $model->id_bei_mst_category_predef_quest], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */ ?>
    </div>

<div class="box-body table-responsive no-padding">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id_bei_mst_category_predef_quest',
            'category_predef_quest',
            'is_active',
        ],
    ]) ?>

</div>
</div>
