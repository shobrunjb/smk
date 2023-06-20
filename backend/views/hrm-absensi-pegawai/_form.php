<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmAbsensiPegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    div.required label.control-label:after {
        content: ' *';
        color: red;
    }
</style>

<style>
    .form-group {
        margin-bottom: 0px;
    }
</style>

<div class="hrm-absensi-pegawai-form box-primary">
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
        <div class="col-md-11">
            <?php
            $listPegawai = \yii\helpers\ArrayHelper::map(\backend\models\HrmPegawai::find()->asArray()->all(), 'id_pegawai', 'nama_lengkap');
            ?>

            <?php
            $listJenisAbsensi = \yii\helpers\ArrayHelper::map(\backend\models\HrmMstJenisAbsensi::find()->asArray()->all(), 'id_mst_jenis_absensi', 'jenis_absensi');
            ?>
            
            <?= $form->field($model, 'id_pegawai')->dropDownList(
                $listPegawai,
                ['prompt' => 'Pilih Pegawai ...']
            ); ?>

            <?php //= $form->field($model, 'tanggal_absen')->textInput() ?>

            <?php
            echo $form->field($model, 'tanggal_absen')->widget(\dosamigos\datepicker\datepicker::className(),[
                                    'model' => $model,
                                    'attribute' => 'date',
                                    'template' => '{addon}{input}',
                                    //'options'=>['readonly'=>'readonly'],
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' => 'yyyy-mm-dd',
                                        'endDate' =>date('Y-m-d'),
                                    ]
                                ]);
            ?>

            <?php // $form->field($model, 'id_mst_jenis_absensi')->textInput() ?>

            <?= $form->field($model, 'id_mst_jenis_absensi')->dropDownList(
                $listJenisAbsensi,
                ['prompt' => 'Pilih Jenis Absen ...']
            ); ?>

            <?php // $form->field($model, 'waktu_login')->textInput() ?>

            <?php
            echo $form->field($model, 'waktu_login')->widget(\dosamigos\datetimepicker\DateTimePicker::className(), [
                
            
                'language' => 'eng',
                //'size' => 'ms',
                'template' => '{input}',
                'pickButtonIcon' => 'glyphicon glyphicon-time',
                'inline' => true,
                'clientOptions' => [
                'startView' => 1,
                // 'minView' => 0,
                // 'maxView' => 1,
                'autoclose' => true,
                'linkFormat' => 'HH:ii P', // if inline = true
                // 'format' => 'HH:ii P', // if inline = false
                'todayBtn' => true
            ]
            ]);?>

                

            <?= $form->field($model, 'waktu_logout')->widget(\dosamigos\datetimepicker\DateTimePicker::className(), [
                'language' => 'eng',
                //'size' => 'ms',
                'template' => '{input}',
                'pickButtonIcon' => 'glyphicon glyphicon-time',
                'inline' => true,
                'clientOptions' => [
                'startView' => 1,
                // 'minView' => 0,
                // 'maxView' => 1,
                'autoclose' => true,
                'linkFormat' => 'HH:ii P', // if inline = true
                // 'format' => 'HH:ii P', // if inline = false
                'todayBtn' => true
            ]
            ]); ?>
        </div>
    </div>

    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
