<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkPegawai */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
//CSS Ini digunakan untuk menampilkan required field (field wajib isi)
?>
<style>
    div.required label.control-label:after {
        content: ' *';
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
<div class="smk-pegawai-form">

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

    <?= $form->field($model, 'id_smk_pegawai_tahunan')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun')->textInput() ?>

    <?= $form->field($model, 'id_smk_periode')->textInput() ?>

    <?= $form->field($model, 'sasaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plan_sasaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'real_sasaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_smk_sasaran_position')->textInput() ?>

    <?= $form->field($model, 'no')->textInput() ?>

    <?= $form->field($model, 'rev')->textInput() ?>

    <?= $form->field($model, 'rev_pre_sasaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_smk_mst_jenis_penilaian')->textInput() ?>

    <?= $form->field($model, 'id_aspek_penilaian')->textInput() ?>

    <?= $form->field($model, 'target')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ukuran_pencapaian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_bobot')->textInput() ?>

    <?= $form->field($model, 'plan_id_smk_mst_jenis_penilaian')->textInput() ?>

    <?php //= $form->field($model, 'plan_id_aspek_penilaian')->textInput() ?>

    <?php //= $form->field($model, 'plan_target')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_ukuran_pencapaian')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_sub_bobot')->textInput() ?>

    <?php //= $form->field($model, 'real_id_smk_mst_jenis_penilaian')->textInput() ?>

    <?php //= $form->field($model, 'real_id_aspek_penilaian')->textInput() ?>

    <?php //= $form->field($model, 'real_target')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_ukuran_pencapaian')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_sub_bobot')->textInput() ?>

    <?php //= $form->field($model, 'plan_a_rentang_1_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_a_rentang_1_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_a_rentang_2_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_a_rentang_2_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_b_rentang_1_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_b_rentang_1_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_b_rentang_2_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_b_rentang_2_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_c_rentang_1_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_c_rentang_1_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_c_rentang_2_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_c_rentang_2_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_d_rentang_1_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_d_rentang_1_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_d_rentang_2_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_d_rentang_2_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_e_rentang_1_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_e_rentang_1_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_e_rentang_2_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_e_rentang_2_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_f_rentang_1_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_f_rentang_1_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_f_rentang_2_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_f_rentang_2_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_a_rentang_1_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_a_rentang_1_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_a_rentang_2_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_a_rentang_2_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_b_rentang_1_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_b_rentang_1_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_b_rentang_2_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_b_rentang_2_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_c_rentang_1_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_c_rentang_1_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_c_rentang_2_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_c_rentang_2_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_d_rentang_1_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_d_rentang_1_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_d_rentang_2_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_d_rentang_2_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_e_rentang_1_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_e_rentang_1_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_e_rentang_2_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_e_rentang_2_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_f_rentang_1_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_f_rentang_1_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_f_rentang_2_i')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'real_f_rentang_2_ii')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'bc_sub_bobot')->textInput() ?>

    <?php //= $form->field($model, 'bmb_capaian')->textInput(['maxlength' => true]) ?>

    <?php// = $form->field($model, 'bmb_nilai_sementara')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'bmb_total_poin_sementara')->textInput() ?>

    <?= $form->field($model, 'bmb_catatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'final_capaian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'final_nilai_sementara')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'final_total_poin_sementara')->textInput() ?>

    <?= $form->field($model, 'final_catatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
