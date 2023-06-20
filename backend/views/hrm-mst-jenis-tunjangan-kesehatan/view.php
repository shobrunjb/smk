<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmMstJenisTunjanganKesehatan */

//$this->title = $model->id_mst_jenis_tunjangan_kesehatan;
$this->title = 'Detail '.'Jenis Tunjangan Kesehatan';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Tunjangan Kesehatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body hrm-mst-jenis-tunjangan-kesehatan-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_mst_jenis_tunjangan_kesehatan], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_mst_jenis_tunjangan_kesehatan], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'jenis_tunjangan_kesehatan',
            'is_used',
            ],
        ]) ?>

    </div>
</div>
