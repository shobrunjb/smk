<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="box-header ">
<div class="box-tools pull-right">
    <?php /*
    <button class="btn btn-success btn-sm" onClick="displayFormJoin()"><i class="fa fa-check"></i> Gabung Proyek</button> &nbsp;
    <a href="<?= Yii::$app->request->baseUrl ?>/member-project/detail/" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Backlog</a>
    */ ?>
    <?php
    if($project->backlog_is_locked != 2){
      echo Html::a(
              '<i class="fa fa-fw fa-plus"></i> Tambah Backlog',
              ['member-project/detail/', 'i' => $i, 't' => $t, 'action' => 'create'],
              ['class' => 'btn btn-primary btn-sm']
          );
    }
    ?>

    <?php
    /*
      echo Html::a(
              '<i class="fa fa-fw fa-eye"></i> View',
              ['project-product-backlog/create/', 'id' => 0],
              ['class' => 'btn btn-success btn-xs various fancybox.ajax']
          );
    */
    ?>
</div>
</div>

<?php
$this->registerCssFile("@web/plugins/fancybox/jquery.fancybox.css", ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('@web/plugins/fancybox/jquery.fancybox.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<?php
$this->registerJs(
    '  
    $(".various").fancybox({
        maxWidth    : 1200,
        maxHeight   : 700,
        fitToView   : true,
        width        : 600,
        height        : 300,
        // width        : "70%",
        // height       : "70%",
        autoSize    : false,
        closeClick  : false,
        openEffect  : "none",
        closeEffect : "none"
    });
        '
);
?>

<div id="formJoinProject" style="display:none">
	<div class="alert alert-info">
	<p>
	    Untuk bergabung dengan proyek, silakan masukkan kode proyek dalam bentuk kode (angka dan huruf) yang diinformasikan dari pimpinan atau manajer anda yang membuat proyek. Contoh kode adalah : 212-f234
	</p>
	</div>
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
        <input type="text" name="kode-project" id="kode-project" class="form-control" value="" placeholder="Silakan masukkan kode unik proyek" maxlength="30" >
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
        <input type="submit" value="GABUNG PROYEK" class="btn btn-success btn-block" onClick="registerProject()">
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

function registerProject(){
  $( "#msginfo" ).html( "<br>Sedang dikirim...tunggu respon..." );
  var msgText = $( "#kode-project" ).val();
  //alert(msgText);
  if(msgText != ""){
      var newval = msgText.replace("/", "****");

      $.post("<?= Yii::$app->request->baseUrl ?>/api/register-project/", {msg: newval, iso: 1}, function(data, status){
        //alert("Saving : " + data + "\nStatus: " + status);
        //$( "#msginfo").text( data);
        $( "#msginfo").html( data);

        //Clear message
        $( "#kode-project" ).val("");
        //..$.pjax.reload({container: '#pjax_id_1', async: false});
      }).fail(function(xhr, status, error) {
	    $('#msginfo"').html('Terjadi kesalahan saat mengirim data.');
	    console.log(xhr.responseText);
		});
    }else{
        $( "#msginfo" ).html( "<div class='alert alert-danger'>Silakan masukan kode terlebih dahulu!</div>" );
    }
}

function joinProject(kode){
  $( "#msginfo" ).html( "<br>Sedang dikirim...tunggu respon..." );
  var msgText = kode;
  //alert(msgText);
  if(msgText != ""){
      var newval = msgText.replace("/", "****");

      $.post("<?= Yii::$app->request->baseUrl ?>/api/join-project/", {msg: newval, iso: 1}, function(data, status){
        //alert("Saving : " + data + "\nStatus: " + status);
        //$( "#msginfo").text( data);
        $( "#msginfo").html( data);
        window.location.href = "<?= Yii::$app->request->baseUrl ?>";
        //Clear message
        $( "#kode-project" ).val("");
        //..$.pjax.reload({container: '#pjax_id_1', async: false});
      }).fail(function(xhr, status, error) {
	    
	    console.log(xhr.responseText);
		});
    }else{
        $( "#msginfo" ).html( "<div class='alert alert-danger'>Silakan masukan kode terlebih dahulu!</div>" );
    }
}


</script>