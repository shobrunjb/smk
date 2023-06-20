<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkPegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="smk-pegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'POST',
    ]); ?>

    <?php //= $form->field($model, 'id_smk_pegawai') ?>

    <?php //= $form->field($model, 'id_smk_pegawai_tahunan') ?>

    <?php //= $form->field($model, 'type') ?>

    <?php 
        $listTahun = [];
        for($i=2015;$i<=date("Y");$i++){
            $listTahun[$i] = $i;
        }
        echo $form->field($model, 'year')->dropDownList($listTahun); 
    ?>

    <?php // = $form->field($model, 'year') ?>

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
            ['prompt' => 'Pilih Periode ...']
        ); ?>

    <?= $form->field($model, 'id_smk_aspek_rencana') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'tahun') ?>

    <?= $form->field($model, 'id_smk_periode') ?>

    <?= $form->field($model, 'sasaran') ?>

    <?php // echo $form->field($model, 'plan_sasaran') ?>

    <?php // echo $form->field($model, 'id_smk_sasaran_position') ?>

    <?php // echo $form->field($model, 'no') ?>

    <?php // echo $form->field($model, 'rev') ?>

    <?php // echo $form->field($model, 'rev_pre_sasaran') ?>

    <?php // echo $form->field($model, 'id_smk_mst_jenis_penilaian') ?>

    <?php // echo $form->field($model, 'id_aspek_penilaian') ?>

    <?php // echo $form->field($model, 'target') ?>

    <?php // echo $form->field($model, 'ukuran_pencapaian') ?>

    <?php // echo $form->field($model, 'sub_bobot') ?>

    <?php // echo $form->field($model, 'plan_id_smk_mst_jenis_penilaian') ?>

    <?php // echo $form->field($model, 'plan_id_aspek_penilaian') ?>

    <?php // echo $form->field($model, 'plan_target') ?>

    <?php // echo $form->field($model, 'plan_ukuran_pencapaian') ?>

    <?php // echo $form->field($model, 'plan_sub_bobot') ?>

    <?php // echo $form->field($model, 'plan_a_rentang_1_i') ?>

    <?php // echo $form->field($model, 'plan_a_rentang_1_ii') ?>

    <?php // echo $form->field($model, 'plan_a_rentang_2_i') ?>

    <?php // echo $form->field($model, 'plan_a_rentang_2_ii') ?>

    <?php // echo $form->field($model, 'plan_b_rentang_1_i') ?>

    <?php // echo $form->field($model, 'plan_b_rentang_1_ii') ?>

    <?php // echo $form->field($model, 'plan_b_rentang_2_i') ?>

    <?php // echo $form->field($model, 'plan_b_rentang_2_ii') ?>

    <?php // echo $form->field($model, 'plan_c_rentang_1_i') ?>

    <?php // echo $form->field($model, 'plan_c_rentang_1_ii') ?>

    <?php // echo $form->field($model, 'plan_c_rentang_2_i') ?>

    <?php // echo $form->field($model, 'plan_c_rentang_2_ii') ?>

    <?php // echo $form->field($model, 'plan_d_rentang_1_i') ?>

    <?php // echo $form->field($model, 'plan_d_rentang_1_ii') ?>

    <?php // echo $form->field($model, 'plan_d_rentang_2_i') ?>

    <?php // echo $form->field($model, 'plan_d_rentang_2_ii') ?>

    <?php // echo $form->field($model, 'plan_e_rentang_1_i') ?>

    <?php // echo $form->field($model, 'plan_e_rentang_1_ii') ?>

    <?php // echo $form->field($model, 'plan_e_rentang_2_i') ?>

    <?php // echo $form->field($model, 'plan_e_rentang_2_ii') ?>

    <?php // echo $form->field($model, 'plan_f_rentang_1_i') ?>

    <?php // echo $form->field($model, 'plan_f_rentang_1_ii') ?>

    <?php // echo $form->field($model, 'plan_f_rentang_2_i') ?>

    <?php // echo $form->field($model, 'plan_f_rentang_2_ii') ?>

    <?php // echo $form->field($model, 'bc_sub_bobot') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
