<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmMstJenisAsuransi */

//$this->title = $model->id_hrm_mst_jenis_asuransi;
$this->title = 'Detail '.'Jenis Asuransi';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Asuransi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body hrm-mst-jenis-asuransi-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_hrm_mst_jenis_asuransi], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_hrm_mst_jenis_asuransi], [
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
                'jenis_asuransi',
            'active_status',
            ],
        ]) ?>

    </div>
</div>
