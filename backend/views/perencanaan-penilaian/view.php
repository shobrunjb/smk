<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkAspekRencana */

//$this->title = $model->id_smk_aspek_rencana;
$this->title = 'Detail '.'Rencana Penilaian';
$this->params['breadcrumbs'][] = ['label' => 'Rencana Penilaian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body smk-aspek-rencana-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_smk_aspek_rencana], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_smk_aspek_rencana], [
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
                'type',
            'tahun',
            'sasaran',
            'plan_sasaran',
            'no',
            'rev',
            'rev_pre_sasaran',
            'target',
            'ukuran_pencapaian',
            'sub_bobot',
            'plan_target',
            'plan_ukuran_pencapaian',
            'plan_sub_bobot',
            'plan_a_rentang_1_i',
            'plan_a_rentang_1_ii',
            'plan_a_rentang_2_i',
            'plan_a_rentang_2_ii',
            'plan_b_rentang_1_i',
            'plan_b_rentang_1_ii',
            'plan_b_rentang_2_i',
            'plan_b_rentang_2_ii',
            'plan_c_rentang_1_i',
            'plan_c_rentang_1_ii',
            'plan_c_rentang_2_i',
            'plan_c_rentang_2_ii',
            'plan_d_rentang_1_i',
            'plan_d_rentang_1_ii',
            'plan_d_rentang_2_i',
            'plan_d_rentang_2_ii',
            'plan_e_rentang_1_i',
            'plan_e_rentang_1_ii',
            'plan_e_rentang_2_i',
            'plan_e_rentang_2_ii',
            'plan_f_rentang_1_i',
            'plan_f_rentang_1_ii',
            'plan_f_rentang_2_i',
            'plan_f_rentang_2_ii',
            'bc_sub_bobot',
            ],
        ]) ?>

    </div>
</div>
