<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LaporanKinerjaPegawai */

$this->title = 'Update Laporan Kinerja Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Laporan Kinerja Pegawai', 'url' => ['view-laporan', 'i'=>$i]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body laporan-kinerja-pegawai-update">
		<?php

        echo $this->render('/order-pegawai/_view_detail_order', [
            'model' => $modelOrderPegawai,
        ]);
        ?>
		<?php

        echo $this->render('/order-pegawai-list/_view_pegawai', [
            'model' => $modelList,
        ]);
        ?>
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
