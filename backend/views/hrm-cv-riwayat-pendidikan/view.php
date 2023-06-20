<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvRiwayatPendidikan */

//$this->title = $model->id_riwayat_pendidikan;
$this->title = 'Detail '.'Riwayat Pendidikan';
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Pendidikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$basepath = Yii::$app->request->baseUrl;
?>
<div class="box">
    <div class="box-body hrm-cv-riwayat-pendidikan-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_riwayat_pendidikan], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_riwayat_pendidikan], [
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
                //'code_id',
                [
                    'attribute' => 'id_sekolah',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->dataSekolah)) {
                            return $data->dataSekolah->nama_sekolah;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori1', $dataListMaterialKategori1, ['class' => 'form-control']),
                ],
                'dari',
                'sampai',
                'grade',
                /*
                [
                    'label' => 'Foto',
                    'format' => 'raw',

                    'value' => function ($data) use ($basepath) {
                        $imgpath = $data->foto_ijazah;
                        if ($data->foto_ijazah != "") {
                            return '<img class="img-responsive"  src="' . $basepath . '/uploads/foto-ijazah/' . $imgpath . '" alt="Foto Ijazah"/>';
                        } else {
                            return "No Image";
                        }
                    }
                ],
                */
                /*
                'foto_ijazah',
                'foto_transkrip',
                'created_date',
                'created_user',
                'created_ip_address',
                'modified_date',
                'modified_user',
                'modified_ip_address',
                */
            ],
        ]) ?>
        <?php 
        echo "<h4>Foto Ijazah</h4>";
        $imgpath = $model->foto_ijazah;
        if ($model->foto_ijazah != "") {
            //echo '<img src="../../backend/web/uploads/foto-ijazah/'.$imgpath.'" class="img-responsive" alt="Foto"> ';
            echo '<img class="img-responsive"  src="' . $basepath . '/uploads/foto-ijazah/' . $imgpath . '" alt="Foto Ijazah"/>';
           
        } else {
            echo "No Image";
        }
        ?>

        <?php 
        echo "<h4>Foto Transkrip Nilai</h4>";
        $imgpath = $model->foto_transkrip;
        if ($model->foto_transkrip != "") {
            //echo '<img src="../../backend/web/uploads/foto-transkrip/'.$imgpath.'" class="img-responsive" alt="Foto"> ';
             echo '<img class="img-responsive"  src="' . $basepath . '/uploads/foto-transkrip/' . $imgpath . '" alt="Foto Transkrip Nilai"/>';
        } else {
            echo "No Image";
        }
        ?>
    </div>
</div>
