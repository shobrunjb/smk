<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkAspekRencana */
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

<div class="perencanaan-penilaian-form">

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


    <?php //= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun')->textInput(['readonly'=>true]) ?>

    <?php //= $form->field($model, 'id_smk_periode')->textInput() ?>
    
    <?php
        //Mengambil list dari tabel sebelah (material)
        $listStatus = \yii\helpers\ArrayHelper::map(
            \backend\models\SmkPeriode::find()->orderBy([
                'id_smk_periode' => SORT_ASC
            ])->asArray()->all(),
            'id_smk_periode',
            'nama_periode'
        );
        ?>
    <?= $form->field($model, 'id_smk_periode')->dropDownList(
            $listStatus,
            ['disabled' => 'disabled']) ?>

    <?php //= $form->field($model, 'no')->textInput() ?>

   

    <?php //= $form->field($model, 'plan_sasaran')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'id_smk_sasaran_position')->textInput() ?>


    <?php //= $form->field($model, 'rev')->textInput() ?>

    <?php //= $form->field($model, 'rev_pre_sasaran')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'id_smk_mst_jenis_penilaian')->textInput() ?>

    <?= $form->field($model, 'id_aspek_penilaian')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'sasaran')->textInput(['maxlength' => true]) ?>

    <?php
        //Mengambil list dari tabel sebelah (material)
        $listStatus = \yii\helpers\ArrayHelper::map(
            \backend\models\SmkJenisPenilaian::find()->orderBy([
                'id_smk_jenis_penilaian' => SORT_ASC
            ])->asArray()->all(),
            'id_smk_jenis_penilaian',
            'jenis_penilaian'
        );
        ?>
    <?= $form->field($model, 'id_smk_jenis_penilaian')->dropDownList(
            $listStatus,
            ['prompt' => 'Pilih jenis isian penilaian ...']) ?>



    <?= $form->field($model, 'target')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'ukuran_pencapaian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_bobot')->textInput() ?>

    <?php //= $form->field($model, 'plan_id_smk_mst_jenis_penilaian')->textInput() ?>

    <?php //= $form->field($model, 'plan_id_aspek_penilaian')->textInput() ?>

    <?php //= $form->field($model, 'plan_target')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_ukuran_pencapaian')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'plan_sub_bobot')->textInput() ?>

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

    <?php //= $form->field($model, 'bc_sub_bobot')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
