<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>

<div class="callout callout-warning">
<h4>Belum Ada Proyek</h4>
<p>Saat ini anda belum tergabung dalam proyek.<br>
Silakan bergabung terhadap proyek yang sudah ada (dibuat sebelumnya) atau membuat proyek baru.<p>
</p>
</div>
<?php
    echo $this->render('_add_join_project', [
        't' => "",
    ]);
?>