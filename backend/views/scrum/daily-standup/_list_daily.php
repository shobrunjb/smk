
<?php
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
?>
<?php
    //Untuk yang mode serderhana pakai yang _add_daily
    /*
    echo $this->render('_add_daily', [
        'sprint' => $sprint,
        'i' =>$i,
        't' =>$t,
    ]);
    */
?>
<?php
    //Ini untuk mode advancend dengan memasukkan progres
    echo $this->render('_add_daily_button', [
        'sprint' => $sprint,
        'i' =>$i,
        't' =>$t,
    ]);
    
?>

<?php /*
<div class="slidecontainer">
  <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
  <p>Value: <span id="demo"></span></p>
</div>
<Script>
    var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = this.value;
}
</Script>
*/ ?>
<?php
        $m = isset($_GET['m']) ? $_GET['m'] : "";
        $s = isset($_GET['s']) ? $_GET['s'] : 0;

        switch ($m) {
            case "add":
                //Cek dulu apakah sudah pernah membuat daily atau belum
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
                    if($daily->status == 2 && $s != 4){
                    echo '
                        <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Mode Edit!</h4>
                        Anda telah mengisi daily report untuk hari ini ('.$standup_date.')! <Br>
                        Jika ingin melakukan edit/modifikasi maka silakan dilanjutkan terhadap apa yang sudah anda submit di hari ini!
                        </div>
                        ';
                    }
                }

                switch ($s) {
                    case 1:
                        echo $this->render('/scrum/daily-standup/_add_daily_step1', [
                            'action'=>$action,
                            't' => $t,
                            'i' =>$i,
                            'idi'=>$idi,
                            'sprint' =>$sprint
                        ]);
                        break;

                    case 2:
                        echo $this->render('/scrum/daily-standup/_add_daily_step2', [
                            'action'=>$action,
                            't' => $t,
                            'i' =>$i,
                            'idi'=>$idi,
                            'sprint' =>$sprint
                        ]);
                        break;

                    case 3:
                        echo $this->render('/scrum/daily-standup/_add_daily_step3', [
                            'action'=>$action,
                            't' => $t,
                            'i' =>$i,
                            'idi'=>$idi,
                            'sprint' =>$sprint
                        ]);
                        break;

                    case 4:
                        echo '
                        <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        Anda telah mengisi daily report untuk hari ini!
                        </div>
                        ';
                        $urld = \yii\helpers\Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t]);
                        echo '<a href="'.$urld.'" class="btn btn-info">Lihat Daily Report</a>';
                        break;
                }
                
                break; 

            case "backlog-progress":
                //echo $this->render('/scrum/daily-progress/backlog-progress-example-7', [
                echo $this->render('/scrum/daily-progress/backlog-progress-pbi', [
                //echo $this->render('/scrum/daily-progress/backlog-progress', [
                //echo $this->render('/scrum/daily-progress/konva-example', [
                            'action'=>$action,
                            't' => $t,
                            'i' =>$i,
                            'idi'=>$idi,
                            'sprint' =>$sprint
                        ]);
                break;


            default : 
                echo $this->render('/scrum/daily-standup/_list_daily_grid', [
                            'action'=>$action,
                            't' => $t,
                            'i' =>$i,
                            'idi'=>$idi,
                            'sprint' =>$sprint
                        ]);
                break;
        }
?>



<?php /*
<div class="box-body  no-padding">
<table class="table table-hover">
    <?php

    $searchModel = new \backend\models\ScrumDailySearch();
    $modeview = isset($_GET['v']) ? $_GET['v'] : "self";
    if($modeview == "all"){

    }else{
        $searchModel->id_pegawai = \backend\models\HrmPegawai::getIdPegawaiFromUserId();
    }
    //$searchModel->id_pegawai = \backend\models\HrmPegawai::getIdPegawaiFromUserId();
    $searchModel->id_sprint = $sprint->id_sprint;
    $searchModel->id_project = $sprint->id_project;

    //echo $searchModel->id_pegawai." ".$searchModel->id_sprint." ".$searchModel->id_project; 
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item_daily',
        'options' => [
                    //'tag' => 'ul',
                    'class' => 'list-view'
        ],
        'itemOptions' => [
            //'tag' => 'li',
            'class' => 'item',
        ],
        'summary'=>'',
    ]);
    ?>
</table>
</div>
*/ ?>