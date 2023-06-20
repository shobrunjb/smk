<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>

<div class="callout callout-warning">
<h4>Belum Terasosiasi dengan Perusahaan / Organisasi</h4>
<p>Anda saat ini belum tergabung dalam perusahaan / organisasi tertentu. Silakan join terlebih dahulu ke perusahaan / organisasi yang sudah dibuat oleh pimpinan atau manajer anda.
</p>
<p>
    Untuk bergabung dengan perusahaan, silakan masukkan kode perusahaan dalam bentuk kode (angka dan huruf) yang diinformasikan dari pimpinan atau manajer anda. Contoh kode adalah : mx3-4dfgh


</p>
</div>

    


    <div class="row">
        <?php //$form = ActiveForm::begin(); ?>
         <?php /* $form = ActiveForm::begin([
                'action' => [Url::current().'#url'],
                
            ]); */ ?>
        <div class="col-md-8 col-sm-8 col-xs-12">
        <input type="text" name="kode-perusahaan" id="kode-perusahaan" class="form-control" value="" placeholder="Silakan masukkan kode unik perusahaan" maxlength="30" >
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
        <input type="submit" value="GABUNG PERUSAHAAN" class="btn btn-success btn-block" onClick="registerCompany()">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:10px">
            <div id="msginfo"></div>
        </div>
    </div>
        <?php //ActiveForm::end(); ?>

    <?php
        if(isset($_POST['kode-perusahaan'])){

            $kode = $_POST['kode-perusahaan'];

            //Cek Perusahaan ada atau tidak
            $perusahaan = \backend\models\Perusahaan::find()
            ->where(['kode' => $kode])
            ->one();
            if($perusahaan != null){
                echo 'Ada';

            }else{
                echo 'Gak ada Bos';
            }
        }
    ?>

<script>
function registerCompany(){
  $( "#msginfo" ).html( "<br>Sedang dikirim...tunggu respon..." );
  var msgText = $( "#kode-perusahaan" ).val();
  //alert(msgText);
  if(msgText != ""){
      var newval = msgText.replace("/", "****");

      $.post("<?= Yii::$app->request->baseUrl ?>/api/register-company/", {msg: newval, iso: 1}, function(data, status){
        //alert("Saving : " + data + "\nStatus: " + status);
        //$( "#msginfo").text( data);
        $( "#msginfo").html( data);

        //Clear message
        $( "#kode-perusahaan" ).val("");
        //..$.pjax.reload({container: '#pjax_id_1', async: false});
      });
    }else{
        $( "#msginfo" ).html( "<div class='alert alert-danger'>Silakan masukan kode terlebih dahulu!</div>" );
    }
}

function joinCompany(kode){
  $( "#msginfo" ).html( "<br>Sedang dikirim...tunggu respon..." );
  var msgText = kode;
  //alert(msgText);
  if(msgText != ""){
      var newval = msgText.replace("/", "****");

      $.post("<?= Yii::$app->request->baseUrl ?>/api/join-company/", {msg: newval, iso: 1}, function(data, status){
        //alert("Saving : " + data + "\nStatus: " + status);
        //$( "#msginfo").text( data);
        $( "#msginfo").html( data);
        window.location.href = "<?= Yii::$app->request->baseUrl ?>";
        //Clear message
        $( "#kode-perusahaan" ).val("");
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