<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
//use kartik\date\DatePicker;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\HrmPegawai */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
//CSS Ini digunakan untuk menampilkan required field (field wajib isi)
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
<div class="hrm-pegawai-form box box-primary">
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'class' => 'form-horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-3',
                'wrapper' => 'col-sm-10',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>
    <div class="box-body table-responsive">


        <?= $form->field($model, 'NIP')->textInput(['maxlength' => 16]) ?>

        <?php // $form->field($model, 'userid')->textInput(['maxlength' => true]) 
        ?>

        <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => 30]) ?>

        <?= $form->field($model, 'jenis_kelamin')->dropDownList(
            ['PRIA' => 'PRIA', 'WANITA' => 'WANITA'],
            ['prompt' => '--PIlih--']
        ) ?>

        <?php
        echo $form->field($model, 'tanggal_lahir')->widget(datepicker::className(), [
            'model' => $model,
            'attribute' => 'date',
            'template' => '{addon}{input}',
            //'options'=>['readonly'=>'readonly'],
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'endDate' => date('Y-m-d'),
            ]
        ]);
        ?>

        <?php /* echo '<label>Tanggal Lahir</label>';
        echo DatePicker::widget([
            'name' => 'tanggal_lahir', 
            'value' => date('d-M-Y', strtotime('+2 days')),
            'options' => ['placeholder' => 'Select issue date ...'],
            'pluginOptions' => [
                'format' => 'dd-M-yyyy',
                'todayHighlight' => true
            ]
        ]);
        */ ?>

        <?= $form->field($model, 'alamat_sesuai_identitas')->textarea(['rows' => 3]) ?>

        <?= $form->field($model, 'mobilephone1')->textInput(['maxlength' => 15]) ?>

        <?= $form->field($model, 'email1')->textInput(['maxlength' => 30]) ?>

        <div class='row' style='display:none'>
            <?php $model->jbt_jabatan = 'Anggota';
            echo $form->field($model, 'jbt_jabatan')->textInput(['maxlength' => true])
            ?>
        </div>

        <?php
        //Mengambil list dari tabel sebelah (material)
        $listKantor = \yii\helpers\ArrayHelper::map(
            \backend\models\Perusahaan::find()->orderBy([
                'perusahaan' => SORT_ASC
            ])->asArray()->all(),
            'id_kantor',
            'perusahaan'
        );
        ?>

        <?= $form->field($model, 'id_perusahaan')->dropDownList(
            $listKantor,
            ['prompt' => 'Pilih Organisasi ...']
        ); ?>

        <?php //= $form->field($model, 'pdk_id_tingkatpendidikan')->textInput() ?>

        <?php
        //Mengambil list dari tabel sebelah (material)
        $listStatus = \yii\helpers\ArrayHelper::map(
            \backend\models\HrmStatusPegawai::find()->orderBy([
                'id_hrm_status_pegawai' => SORT_ASC
            ])->asArray()->all(),
            'id_hrm_status_pegawai',
            'status_pegawai'
        );
        ?>

        <?= $form->field($model, 'id_hrm_status_pegawai')->dropDownList(
            $listStatus,
            ['prompt' => 'Pilih Status ...']
        ); ?>

         <?= $form->field($model, 'no_bpjs')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>