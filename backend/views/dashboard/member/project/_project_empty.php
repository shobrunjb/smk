<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>

<div class="callout callout-warning">
<h4>Belum Ada Proyek</h4>
<p>Saat ini anda belum tergabung dalam proyek.<br>
Silakan bergabung terhadap proyek yang sudah ada (dibuat sebelumnya) atau membuat proyek baru.<p>
	<a href="" class="btn btn-success"><i class="fa fa-check"></i> Gabung Proyek</a> &nbsp;
	<a href="<?= Yii::$app->request->baseUrl ?>/member-project/create" class="btn btn-primary"><i class="fa fa-plus"></i> Buat Proyek Baru</a>
</p>
</div>

<script>
function registerProject(){
  $( "#msginfo" ).html( "<br>Sedang dikirim...tunggu respon..." );
  var msgText = $( "#kode-project" ).val();
  //alert(msgText);
  if(msgText != ""){
      var newval = msgText.replace("/", "****");

      $.post("<?= Yii::$app->request->baseUrl ?>/site/register-project/", {msg: newval, iso: 1}, function(data, status){
        //alert("Saving : " + data + "\nStatus: " + status);
        //$( "#msginfo").text( data);
        $( "#msginfo").html( data);

        //Clear message
        $( "#kode-project" ).val("");
        //..$.pjax.reload({container: '#pjax_id_1', async: false});
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

      $.post("<?= Yii::$app->request->baseUrl ?>/site/join-project/", {msg: newval, iso: 1}, function(data, status){
        //alert("Saving : " + data + "\nStatus: " + status);
        //$( "#msginfo").text( data);
        $( "#msginfo").html( data);
        window.location.href = "<?= Yii::$app->request->baseUrl ?>";
        //Clear message
        $( "#kode-project" ).val("");
        //..$.pjax.reload({container: '#pjax_id_1', async: false});
      });
    }else{
        $( "#msginfo" ).html( "<div class='alert alert-danger'>Silakan masukan kode terlebih dahulu!</div>" );
    }
}

function changeOption(){
    var opt = $( "#optEntry" ).val();
    //alert('as' + opt);
    window.location.replace("<?php echo Url::toRoute(['sales-order/view-order', 'i'=>1]); ?>&opt="+opt);
}
</script>