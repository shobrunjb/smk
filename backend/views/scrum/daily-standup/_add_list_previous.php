<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>

<div class="panel panel-primary"><div class="panel-heading">    
    <div class="pull-right"><div class="summary">&nbsp;</div></div>
    <h3 class="panel-title"><span class="fa fa-check"></span> Silakan isikan di bagian mana backlog yang terkait beserta kontribusi progres</h3>
    <div class="clearfix"></div></div>


<table class="table table-hover">
<tr>

    
    <th>Pilih</th>
    <th>No</th>
    <th>Product Backlog</th>
    <th>Progres Sebelumnya</th>
    <th>Progres Saat ini</th>
    <th>Kontribusi Anda</th>
</tr>

<?php
/*
$searchModel = new \backend\models\ProductBacklogSearch();
$searchModel->id_project = $sprint->id_project;
$searchModel->id_sprint = $sprint->id_sprint;
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
$dataProvider->pagination = false;
*/

$searchModel = new \backend\models\SprintBacklogSearch();
$searchModel->id_project = $sprint->id_project;
$searchModel->id_sprint = $sprint->id_sprint;
$dataProvider = $searchModel->searchWithProductBacklog(Yii::$app->request->queryParams);
$dataProvider->pagination = false;

echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item_progres_backlog',
        'options' => [
                    //'tag' => 'ul',
                    'class' => 'list-view'
        ],
        'itemOptions' => [
            //'tag' => 'li',
            'class' => 'item',
        ],
        'viewParams' => [

                't' => $t,
                'i' =>$i,
                //'idi'=>$idi,
                'sprint' =>$sprint,
                'readonly' => true,
                'id_pegawai' => $id_pegawai,
                'daily' => $daily,
        ],
        'summary'=>'',
    ]);
?>

</table>
</div>
<?php
$urld = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t,  'm'=>"add", 's'=>2]);
?>
<script>

function submitDaily(){
  $( "#msginfo" ).html( "<br>Sedang dikirim...tunggu respon..." );
  var prev = $( "#todo-previous" ).val();
  //var today = $( "#todo-today" ).val();
  //var obstacle = $( "#todo-obstacle" ).val();
  //alert(prev);
  if(prev != ""){
        var totalchecked = 0;
      <?php
        $mods = $dataProvider->getModels();
        foreach($mods as $mod){
            $id = $mod->id_product_backlog;
            //echo 'var x = $( "#checked_prev_'.$id.'" );';
            echo 'var x = document.getElementById("checked_prev_'.$id.'");';
            echo '
              if (x.checked == true) {
                //alert("cek'.$id.'");
                totalchecked++;
              }
            ';
        }
      ?>
      <?php
      /*
        $mods = $dataProvider->getModels();
        foreach($mods as $mod){
            $id = $mod->id_product_backlog;
            echo 'var progress = $( "#my_progress_'.$id.'" ).val();';
            //echo 'alert(progress);';
        }
      */
      ?>
      //alert('Total' + totalchecked);
      if(totalchecked > 0){
        var rowsdata = '';
        <?php
            $mods = $dataProvider->getModels();
            foreach($mods as $mod){
                if(isset($mod->productBacklog)){
                    $model_pb = $mod->productBacklog;
                    $id = $mod->id_product_backlog;
                    echo 'var progress = $( "#my_progress_'.$id.'" ).val();';
                    echo 'var x = document.getElementById("checked_prev_'.$id.'");';
                    echo 'var contrix = document.getElementById("txt_contribute_'.$id.'").value;';
                    echo '
                      if (x.checked == true) {
                        //alert("cek'.$id.'");
                        rowsdata = rowsdata + '.$id.' + "=" + progress +  "=" +'.$model_pb->progres_by_team.' +  "=" + contrix + ";";
                      }
                    ';
                    //echo 'alert(progress);';
                }
            }
        ?>
        //alert(rowsdata);

        $.post("<?= Yii::$app->request->baseUrl ?>/api/submit-daily-first-step/", {prev: prev, rowsdata: rowsdata, is : <?= $sprint->id_sprint;?>, ip : <?= $sprint->id_project;?>}, function(data, status){
            //alert("Saving : " + data + "\nStatus: " + status);
            //$( "#msginfo").text( data);
            $( "#msginfo").html( data);
            if(data.includes("alert-danger")){

            }else{
              window.location.href = "<?= $urld ?>";
              //Clear message
              //$( "#todo-previous" ).val("");
              //$( "#todo-today" ).val("");
              //$( "#todo-obstacle" ).val("");
            }
            //..$.pjax.reload({container: '#pjax_id_1', async: false});
          }).fail(function(xhr, status, error) {
           //$('#msginfo"').html('Terjadi kesalahan saat mengirim data.');
            console.log(xhr.responseText);
            });
      }else{
        $( "#msginfo" ).html( "<div class='alert alert-danger'>Silakan isikan minimal 1 backlog yang terkait dengan pekerjaan anda beserta kontribusi yang anda berikan (dalam persen) !</div>" );
      }
    }else{
        $( "#msginfo" ).html( "<div class='alert alert-danger'>Silakan isikan terlebih dahulu data di hari sebelumnya!</div>" );
    }
}
</script>