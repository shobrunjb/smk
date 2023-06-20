<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\HrmKantorKategori */

$this->title = $model->id_hrm_kantor_kategori;
$this->params['breadcrumbs'][] = ['label' => 'hrm-kantor-kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="hrm-kantor-kategori-view  box box-primary">

   <div class="box-header">
        <?= Html::a('Update', ['update', 'id' => $model->id_hrm_kantor_kategori], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_hrm_kantor_kategori], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>

<div class="box-body table-responsive no-padding">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_hrm_kantor_kategori',
            'kategori',
            'keterangan',
            'id_parent_kategori',
            'is_used',
        ],
    ]) ?>

</div>
</div>
