<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$urld = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t]);

$url_member = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t, 'v'=>'self']);
$url_all = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t, 'v' => 'all']);

$url_add = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t, 'm' => 'add', 's'=>2]);
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
    $today = "";
    if($daily != null){
      $today = $daily->today_todo;
    }else{
      $daily = new \backend\models\ScrumDaily();
    }
?>


	<div class="alert alert-success">
	<p>
	    <b>#2.</b> Langkah 2 - Laporkan apa yang akan dikerjakan di hari ini.<Br>
      Kaitkan pekerjaan anda hari ini dengan backlog yang mana beserta rencana target kerja anda.
	</p>
	</div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="form-group">
            2. Tuliskan apa yang akan anda lakukan hari ini. 
          </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="form-group">

            <textarea id="todo-today" class="form-control" name="todo-today" rows="3" placeholder="Rencana kerja anda hari ini" maxlength="400" onchange=""><?= $today ?></textarea>
          </div>
          <div id="dr">
              <?php
              
                  echo $this->render('_add_list_today', [
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