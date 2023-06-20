<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;


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
    $obstacle = "";
    if($daily != null){
      $obstacle = $daily->obstacle;
    }else{
      $daily = new \backend\models\ScrumDaily();
    }
?>


	<div class="alert alert-warning">
	<p>
	    <b>#3.</b> Langkah 3 -Laporkan apakah ada kendala di kegiatan sebelumnya.<Br>
      Jika tidak ada bisa anda biarkan kosong atau tuliskan "-".
	</p>
	</div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="form-group">
            3. Tuliskan apa yang menjadi kendala anda melakukan tugas sebelumnya (jika ada)
          </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="form-group">

            <textarea id="todo-obstacle" class="form-control" name="todo-obstacle" rows="3" placeholder="Kendala dalam menjalankan tugas" maxlength="400" onchange=""><?= $obstacle ?></textarea>
          </div>
          
        </div>
        

        <div class="col-md-4 col-sm-4 col-xs-12">
          <button  class="btn btn-success btn-block" onClick="submitDaily()">SIMPAN & SELESAIKAN</button>
        </div>
    </div>


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:10px">
        <div id="msginfo"></div>
    </div>
</div>

<?php
$urld = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t, 'm' => 'add', 's'=>4]);
?>
<script>

function submitDaily(){
  $( "#msginfo" ).html( "<br>Sedang dikirim...tunggu respon..." );
  var obstacle = $( "#todo-obstacle" ).val();

        $.post("<?= Yii::$app->request->baseUrl ?>/api/submit-daily-third-step/", {obstacle: obstacle, is : <?= $sprint->id_sprint;?>, ip : <?= $sprint->id_project;?>}, function(data, status){
            //alert("Saving : " + data + "\nStatus: " + status);
            //$( "#msginfo").text( data);
            $( "#msginfo").html( data);
            if(data.includes("alert-danger")){

            }else{
              window.location.href = "<?= $urld ?>";
            }
            //..$.pjax.reload({container: '#pjax_id_1', async: false});
          }).fail(function(xhr, status, error) {
           //$('#msginfo"').html('Terjadi kesalahan saat mengirim data.');
            console.log(xhr.responseText);
          });

}
</script>