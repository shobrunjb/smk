<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$urld = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t]);

$url_member = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t, 'v'=>'self']);
$url_all = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t, 'v' => 'all']);
$url_backlog_progress = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t, 'm' => 'backlog-progress']);

$url_add = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t, 'm' => 'add', 's'=>1]);
?>

<div class="box-header ">
<?php
  $modeview = isset($_GET['v']) ? $_GET['v'] : "self";
  if($modeview == "all"){
    echo '<B>[Daily Report Tim]</B>';
  }else{
    echo '<B>[Daily Report Anda]</B>';
  }

  $m = isset($_GET['m']) ? $_GET['m'] : "";
?>

<div class="box-tools pull-right">

  <?php
  if($sprint->is_closed != 2){
    if($m == "add"){
      echo  '<a href="'.$urld.'" class="btn btn-danger btn-sm"><i class="fa fa-close"></i> Cancel</a>';
    }else{
      echo  '<a href="'.$url_add.'" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Daily Report</a>';
    }
  }else{
    if($m == "add"){
      Yii::$app->response->redirect(['member-sprint/detail/', 'i' => $i, 't' => $t]);
    }
  }
  ?>
 
  <div class="btn-group">
  <button type="button" class="btn btn-info btn-sm">View Mode</button>
  <button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown">
  <span class="caret"></span>
  <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="<?= $url_member ?>">Punya Sendiri</a></li>
    <li><a href="<?= $url_all ?>">Semua Tim</a></li>
    <li><a href="<?= $url_backlog_progress ?>">Backlog Progres</a></li>
  </ul>
  </div>


    <?php /*
    &nbsp;
    <a href="<?= Yii::$app->request->baseUrl ?>/member-project/create" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Buat Proyek Baru</a>
    */ ?>
</div>
</div>
