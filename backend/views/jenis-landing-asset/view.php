<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\JenisLaporan */

//$this->title = $model->id_jenis_laporan;
$this->title = 'Detail '.'Jenis Laporan';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Laporan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body jenis-Laporan-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_jenis_laporan], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_jenis_laporan], [
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
                'jenis_laporan',
                'deskripsi',
                //'is_active',
                [
                    'attribute' => 'is_active',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return $data->getStatusAktif();
                    }
                ],
                [
                    'label' => 'Icon',
                    'format' => 'raw',
                    'value' => function ($data) {
                        $imgpath = $data->icon;
                        if ($data->icon != "") {
                            //return '<img class="img-responsive" width="100px" src="' . $basepath . '/uploads/galery/' . $imgpath . '" alt="Foto"/>';
                            return '<img src="'.'../..'.'/frontend/web/file/jenislaporan/'.$imgpath.'" class="img-responsive" alt="Foto"> ';
                        } else {
                            return "No Icon";
                        }
                    }
                ],
            ],

        ]) ?>

        <?php 
        /*
        $imgpath = $model->icon;
        if ($model->icon != "") {
            //echo '<img class="img-responsive"  src="' . $basepath . '/uploads/galery/' . $imgpath . '" alt="Foto"/>';
            echo '<img src="'.'../..'.'/frontend/web/file/jenislaporan/'.$imgpath.'" class="img-responsive" alt="Foto"> ';
        } else {
            echo "No Icon";
        }
        */
        ?>

    </div>
</div>
