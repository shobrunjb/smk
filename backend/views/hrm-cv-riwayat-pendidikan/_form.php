<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvRiwayatPendidikan */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    div.required label.control-label:after {
        content: " *";
        color: red;
    }
</style>

<?php
//CSS Ini digunakan untuk overide jarak antar form biar tidak terlalu jauh
?>
<style>
    .form-group {
        margin-bottom: 0px;
    }
</style>

<div class="callout callout-success">
    <h4>Petunjuk</h4>

    <p>Silakan isi dengan riwayat pendidikan anda.
    </p>

</div>

<div class="hrm-cv-riwayat-pendidikan-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-2',
                'offset' => 'col-lg-offset-2',
                'wrapper' => 'col-lg-10',
            ],
        ],
    ]); ?>

    <?php
    if ($model->hasErrors()) {
    ?>
        <div class="alert alert-danger">
            <?php echo $form->errorSummary($model); ?>
        </div>
    <?php
    }
    ?>

    <?php //= $form->field($model, 'code_id')->textInput() ?>

    <?php //= $form->field($model, 'id_pegawai')->textInput() ?>

    <?php //= $form->field($model, 'id_mst_tingkat_pendidikan')->textInput() ?>

    <?php
    //Mengambil list dari tabel sebelah (tingkat pendidikan)
    $listTingkatPendidikan = \yii\helpers\ArrayHelper::map(
        \backend\models\MstTingkatPendidikan::find()
            ->orderBy([
                'id_mst_tingkat_pendidikan' => SORT_ASC
            ])
            ->asArray()->all(),
        'id_mst_tingkat_pendidikan',
        'tingkat_pendidikan'
    );
    ?>

    <?php
    //Mengambil list dari tabel sebelah (data sekolah)
    $listSekolah = \yii\helpers\ArrayHelper::map(
        \backend\models\DataSekolah::find()
            ->orderBy([
                'id_sekolah' => SORT_ASC
            ])
            ->asArray()->all(),
        'id_sekolah',
        'nama_sekolah'
    );
    ?>

    <?php
    //Mengambil list dari tabel sebelah (data sekolah)
    $listJurusan = \yii\helpers\ArrayHelper::map(
        \backend\models\DataJurusan::find()
            ->orderBy([
                'id_jurusan' => SORT_ASC
            ])
            ->asArray()->all(),
        'id_jurusan',
        'nama_jurusan_id'
    );
    ?>

    <?= $form->field($model, 'id_mst_tingkat_pendidikan')->dropDownList(
        $listTingkatPendidikan,
        ['prompt' => 'Pilih Tingkat Pendidikan']
    ); ?>

    <?= $form->field($model, 'id_sekolah')->dropDownList(
        $listSekolah,
        ['prompt' => 'Pilih Data Sekolah']
    ); ?>

    <?= $form->field($model, 'dari')->textInput() ?>

    <?= $form->field($model, 'sampai')->textInput() ?>

    <?= $form->field($model, 'id_jurusan')->dropDownList(
        $listJurusan,
        ['prompt' => 'Pilih Data Jurusan']
    ); ?>

    <?= $form->field($model, 'grade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto_ijazah')->fileInput(['maxlength' => true]) ?>

        <div class="form-group field-content-keyname required">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-10">
                <div class="alert alert-info">FOrmat gambar adalah JPEG, dst .<br>
                Untuk mengurangi load yang besar di server, disarankan ukuran file yang diupload juga tidak melebihi 1 MB.
                </div>
            </div>
        </div>

    <?= $form->field($model, 'foto_transkrip')->fileInput(['maxlength' => true]) ?>

        <div class="form-group field-content-keyname required">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-10">
                <div class="alert alert-info">FOrmat gambar adalah jpeg, dst .<br>
                Untuk mengurangi load yang besar di server, disarankan ukuran file yang diupload juga tidak melebihi 1 MB.
                </div>
            </div>
        </div>

    <?php //= $form->field($model, 'file_img')->fileInput()->label('Foto Ijazah');?>

    <?php //= $form->field($model, 'file_img2')->fileInput()->label('Foto Transkrip');?>

 

    <?php /*

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_date')->textInput() ?>

    <?= $form->field($model, 'modified_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_ip_address')->textInput(['maxlength' => true]) ?>
    */ ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
