<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$urld = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t]);

$url_member = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t, 'v'=>'self']);
$url_all = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t, 'v' => 'all']);

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
?>

<div class="box-tools pull-right">
    <button class="btn btn-success btn-sm" onClick="displayFormJoin()"><i class="fa fa-check"></i> Tambah Daily Report</button>
  <?php /*
  <a href="<?= $url_add ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Daily Report</a>
  */ ?>
  <div class="btn-group">
  <button type="button" class="btn btn-info btn-sm">View Mode</button>
  <button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown">
  <span class="caret"></span>
  <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="<?= $url_member ?>">Punya Sendiri</a></li>
    <li><a href="<?= $url_all ?>">Semua Tim</a></li>
  </ul>
  </div>


    <?php /*
    &nbsp;
    <a href="<?= Yii::$app->request->baseUrl ?>/member-project/create" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Buat Proyek Baru</a>
    */ ?>
</div>
</div>

<div id="formJoinProject" style="display:none">
	<div class="alert alert-info">
	<p>
	    Laporkan apa saja yang telah anda lakukan di hari sebelumnya. Dan rencana apa yang akan dikerjakan di hari ini.<Br>
      Sebutkan juga jika ada kendala selama melakukan pekerjaan.
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
            <?php /*
            <input type="text" name="todo-previous" id="todo-previous" class="form-control" value="" placeholder="Yang telah dikerjakan di hari sebelumnya" maxlength="300" > */ ?>
            <textarea id="todo-previous" class="form-control" name="todo-previous" rows="3" placeholder="Yang telah dikerjakan di hari sebelumnya" maxlength="400" onchange=""></textarea>
          </div>
          <div id="formProgresDaily">
              <?php
                  /*
                  echo $this->render('_add_progres_daily', [
                      'sprint' => $sprint,
                      'i' =>$i,
                      't' =>$t,
                  ]);
                */
              ?>
           </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="form-group">
            2. Tuliskan apa yang akan anda lakukan hari ini. 
          </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="form-group">
            <?php /*
            <input type="text" name="todo-today" id="todo-today" class="form-control" value="" placeholder="Yang akan dilakukan hari ini" maxlength="300" > */ ?>
            <textarea id="todo-today" class="form-control" name="todo-today" rows="3" placeholder="Yang akan dilakukan hari ini" maxlength="400"></textarea>
          </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="form-group">
            3. Tuliskan apa yang menjadi kendala anda melakukan tugas sebelumnya (jika ada)
          </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="form-group">
            <?php /*
            <input type="text" name="todo-obstacle" id="todo-obstacle" class="form-control" value="" placeholder="Kendala dalam menjalankan tugas" maxlength="300" > */ ?>
            <textarea id="todo-obstacle" class="form-control" name="todo-obstacle" rows="3" placeholder="Kendala dalam menjalankan tugas" maxlength="400"></textarea>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
        <button  class="btn btn-success btn-block" onClick="submitDaily()">SIMPAN</button>
        </div>
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

function submitDaily(){
  $( "#msginfo" ).html( "<br>Sedang dikirim...tunggu respon..." );
  var prev = $( "#todo-previous" ).val();
  var today = $( "#todo-today" ).val();
  var obstacle = $( "#todo-obstacle" ).val();
  if(prev != ""){
      //var _prev = prev.replace("/", "****");
      //var _today = today.replace("/", "****");
      //var _obstacle = obstacle.replace("/", "****");

      $.post("<?= Yii::$app->request->baseUrl ?>/api/submit-daily/", {prev: prev, today: today, obstacle: obstacle, is : <?= $sprint->id_sprint;?>, ip : <?= $sprint->id_project;?>}, function(data, status){
        //alert("Saving : " + data + "\nStatus: " + status);
        //$( "#msginfo").text( data);
        $( "#msginfo").html( data);
        if(data.includes("alert-danger")){

        }else{
          window.location.href = "<?= $urld ?>";
          //Clear message
          $( "#todo-previous" ).val("");
          $( "#todo-today" ).val("");
          $( "#todo-obstacle" ).val("");
        }


        //..$.pjax.reload({container: '#pjax_id_1', async: false});
      }).fail(function(xhr, status, error) {
	   //$('#msginfo"').html('Terjadi kesalahan saat mengirim data.');
	    console.log(xhr.responseText);
		});
    }else{
        $( "#msginfo" ).html( "<div class='alert alert-danger'>Silakan isikan terlebih dahulu data di hari sebelumnya!</div>" );
    }
}


</script>