<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$urld = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t]);

$url_member = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t, 'v'=>'self']);
$url_all = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t, 'v' => 'all']);

$url_add = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t, 'm' => 'add', 's'=>1]);
?>

<?php
    $id_pegawai = \backend\models\HrmPegawai::getIdPegawaiFromUserId();
    $standup_date = \common\helpers\Timeanddate::getCurrentDate();
    $daily = \backend\models\ScrumDaily::find()
                ->where([
                    'id_project' => $sprint->id_project,
                    'id_sprint' => $sprint->id_sprint,
                    'id_pegawai' => $id_pegawai,
                    'standup_date' => $standup_date,
                ])->one();
    $prev = "";
    if($daily != null){
      $prev = $daily->yesterday_todo;
    }else{
      $daily = new \backend\models\ScrumDaily();
    }
?>


	<div class="alert alert-info">
	<p>
	    <b>#1.</b> Langkah 1 - Laporkan apa saja yang telah anda lakukan di hari sebelumnya.<Br>
      Kaitkan pekerjaan anda di hari kemarin dengan backlog dan sebutkan berapa persen kontribusi anda.
	</p>
	</div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="form-group">
            1. Tuliskan apa yang telah anda lakukan di hari sebelumnya. 
          </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="form-group">

            <textarea id="todo-previous" class="form-control" name="todo-previous" rows="3" placeholder="Yang telah dikerjakan di hari sebelumnya" maxlength="400" onchange=""><?= $prev ?></textarea>
          </div>
          <div id="dr">
              <?php
              
                  echo $this->render('_add_list_previous', [
                      'sprint' => $sprint,
                      'i' =>$i,
                      't' =>$t,
                      'id_pegawai' => $id_pegawai,
                      'daily' => $daily,
                  ]);
              
              ?>
           </div>
        </div>
        

        <div class="col-md-4 col-sm-4 col-xs-12">
          <button  class="btn btn-success btn-block" onClick="submitDaily()">SIMPAN & LANJUTKAN</button>
        </div>
    </div>


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:10px">
        <div id="msginfo"></div>
    </div>
</div>

<script>
function displayFormJoin() {
  var x = document.getElementById("formJoinProject");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function displayFormProgresDaily() {
  var x = document.getElementById("formProgresDaily");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}



</script>