<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Perusahaan */

//$this->title = $model->id_perusahaan;
$this->title = 'Detail '.'Perusahaan';
$this->params['breadcrumbs'][] = ['label' => 'Perusahaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body perusahaan-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_perusahaan], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_perusahaan], [
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
                'perusahaan',
            'deskripsi',
            'alamat_kontak',
            'telepon_kontak',
            'email_kontak:email',
            'active_status',
            'created_date',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
