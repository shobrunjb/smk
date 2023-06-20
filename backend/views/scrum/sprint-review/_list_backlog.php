<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<?php
    //$form = ActiveForm::begin();
    $noted="";
    $sprintceremony = \backend\models\SprintCeremony::find()
        ->where([
            'id_sprint' => $sprint->id_sprint,
            'id_project' => $sprint->id_project,
            'ceremony' => 'REVIEW',
        ])->one();
    if($sprintceremony != null){
        $noted = $sprintceremony->noted;
    }
    /*
    $form = ActiveForm::begin([
        //'action' => [Url::current().'#url']
        'method' => 'POST'
    ]);
    */
?>
<div class="alert alert-info">
<?php
    echo 'Sprint Review diisi bersama dengan Product Owner di akhir dari SPRINT #'.$sprint->sprint_number.".";

?>
</div>
<div class="panel panel-primary"><div class="panel-heading">    
    <div class="pull-right"><div class="summary">&nbsp;</div></div>
    <h3 class="panel-title"><span class="fa fa-line-chart"></span> Update Progres Backlog Semua Tim Bersama Product Owner</h3>
    <div class="clearfix"></div></div>


<table class="table table-hover">
<tr>

    

    <th>No</th>
    <th>Product Backlog</th>
    <th>Progres (Versi Tim)</th>
    <th>Konfirmasi oleh PO</th>
    <th>Progres (Versi PO)</th>
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

$id_pegawai = \backend\models\HrmPegawai::getIdPegawaiFromUserId();

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
                
        ],
        'summary'=>'',
    ]);
?>

</table>
</div>
<?php
    $readonly = false;
    if($sprint->is_closed == 2){
        $readonly = true;
    }
    $yourrole = \backend\models\ProjectMember::getYourRole($sprint->id_project, 2); 
    $po_role = \backend\models\AppSettingSearch::getValueByKey("ROLE PRODUCT OWNER");
    if($yourrole != $po_role){
        $readonly = true;
    }
    if(!$readonly){
?>
    <div class="form-group">
    <label>Catatan Untuk Sprint Review</label>
    <textarea name="noted" id="noted" class="form-control" rows="3" placeholder="Silakan berikan catatan untuk sprint review ..."><?= $noted ?></textarea>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:10px">
            <div id="msginfo"></div>
        </div>
    </div>
    <div class="row">
        <?php /*
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="submit" value="SIMPAN" name="saveall" class="btn btn-success btn-block">
        </div>
        */ ?>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <button  class="btn btn-success btn-block" onClick="submitDaily()">SIMPAN</button>
        </div>
    </div>
<?php
}else {
    echo '<label>Catatan Untuk Sprint Review</label>';
    echo '<div class="box-footer box-comments border border-primary">'.$noted.'</div>';
    //$yourrole = \backend\models\ProjectMember::getYourRole($sprint->id_project, 2); 
    //$po_role = \backend\models\AppSettingSearch::getValueByKey("ROLE PRODUCT OWNER");
    //if($yourrole == $po_role){
    /*
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <!-- <input type="submit" value="BUKA KUNCI SPRINT BACKLOG" name="unlock" class="btn btn-danger btn-block"> -->
        <button type="submit" name="unlock" class="btn btn-danger btn-block"><i class="fa fa-fw fa-unlock"></i>BUKA KUNCI SPRINT BACKLOG</button>
    </div>
</div>
    */
?>

<?php
    //}
}
?>


<?php //ActiveForm::end(); ?>
<?php
$urld = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t]);
?>
<script>

function submitDaily(){
  $( "#msginfo" ).html( "<br>Sedang dikirim...tunggu respon..." );
  var noted = $( "#noted" ).val();
  //var today = $( "#todo-today" ).val();
  //var obstacle = $( "#todo-obstacle" ).val();
  //alert(prev);
  if(noted != ""){

        var rowsdata = '';
        <?php
            $mods = $dataProvider->getModels();
            foreach($mods as $mod){
                if(isset($mod->productBacklog)){
                    $model_pb = $mod->productBacklog;
                    $id = $model_pb->id_product_backlog;
                    echo 'var progress = $( "#my_progress_'.$id.'" ).val();';
                    echo 'var contrix = document.getElementById("txt_contribute_'.$id.'").value;';
                    echo '
                        rowsdata = rowsdata + '.$id.' + "=" + progress +  "=" +'.$model_pb->progres_by_team.' +  "=" + contrix + ";";
                ';
                }
                //echo 'alert(progress);';
            }
        ?>
        //alert(rowsdata);

        $.post("<?= Yii::$app->request->baseUrl ?>/api/submit-sprint-review/", {noted: noted, rowsdata: rowsdata, is : <?= $sprint->id_sprint;?>, ip : <?= $sprint->id_project;?>}, function(data, status){
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
        $( "#msginfo" ).html( "<div class='alert alert-danger'>Silakan isikan terlebih dahulu catatan sprint review!</div>" );
    }
}
</script>