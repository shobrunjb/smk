<?php
namespace backend\controllers;

use common\models\ChangePassword;
use backend\models\HrmPegawai;
use backend\models\HrmPegawaiSearch;
use backend\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class ApiController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            /*
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['login', 'logout', 'something'],
                'rules' => [
                    [
                        'actions' => ['register-company','join-company'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['login', 'logout', 'something'],
                'rules' => [
                    [
                        'actions' => ['register-project','join-project'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            */
            //TIdak boleh dipisah-pisah
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['login', 'logout', 'something'],
                'rules' => [
                    [
                        'actions' => ['submit-daily','register-company','join-company', 'register-project','join-project', 'submit-daily-first-step', 'submit-daily-second-step', 'submit-daily-third-step' , 'submit-sprint-review'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionRegisterCompany()
    {
        //$_POST['msg'] = '2l3-baf3';
        if(isset($_POST['msg'])){
            $kode = $_POST['msg'];
            //echo Yii::$app->user->identity->id;

            $perusahaan = \backend\models\Perusahaan::find()
                        ->where([
                            'kode' => $kode,
                        ])->one();
            if($perusahaan != null){
                
                echo '<div class="alert alert-info">Perusahaan dengan kode tersebut ['.$kode.'] adalah <B>'.$perusahaan->perusahaan.'</b><br>Silakan klik tombol berikut ini untuk bergabung!<Br>
                    <button class="btn btn-success" onClick="joinCompany(\''.$kode.'\')">Bergabung</button>
                </div>';
            }else{
                echo '<div class="alert alert-danger">Perusahaan dengan kode tersebut ['.$kode.'] tidak ditemukan!</div>';
            }
        }
    }


    /*
    Tahap 2 : Join ke perusahaan
    Update tabel hrm_pegawai dimana yang awalanya id_perusahaan kosong, diisi dengan id perusahaan
    */
    public function actionJoinCompany()
    {
        //$_POST['msg'] = '2l3-baf3';
        if(isset($_POST['msg'])){
            $kode = $_POST['msg'];
            //echo Yii::$app->user->identity->id;

            $perusahaan = \backend\models\Perusahaan::find()
                        ->where([
                            'kode' => $kode,
                        ])->one();
            if($perusahaan != null){
                $pegawai = \backend\models\HrmPegawai::find()
                        ->where(['id_user' => Yii::$app->user->identity->id])
                        ->one();
                if($pegawai != null) {
                    $pegawai->id_perusahaan = $perusahaan->id_perusahaan;
                    Yii::$app->session->setFlash('success', "Selamat anda telah bergabung dengan sebuah perusahan / organisasi!.");
                    $pegawai->save(false);
                }
            }else{
                echo '<div class="alert alert-danger">Perusahaan dengan kode tersebut ['.$kode.'] tidak ditemukan!</div>';
            }
        }
    }


    /*
    Handle Proyek
    */
    public function actionRegisterProject()
    {
        //$_POST['msg'] = '2l3-baf3';
        if(isset($_POST['msg'])){
            $kode = $_POST['msg'];
            //echo Yii::$app->user->identity->id;

            $project = \backend\models\Project::find()
                        ->where([
                            'kode_proyek' => $kode,
                        ])->one();
            if($project != null){
                //echo $project->id_project." = ".\backend\models\HrmPegawai::getIdPegawaiFromUserId(); exit();

                //Cek Apakah sudah masuk atau belum
                $modelmember = \backend\models\ProjectMember::find()
                    ->where([
                        'id_project' => $project->id_project,
                        'id_pegawai' => \backend\models\HrmPegawai::getIdPegawaiFromUserId(),
                    ])->one();
                if($modelmember == null){
                    echo '<div class="alert alert-info">Proyek dengan kode tersebut ['.$kode.'] adalah <B>'.$project->nama_proyek.'</b><br>Silakan klik tombol berikut ini untuk bergabung!<Br>
                        <button class="btn btn-success" onClick="joinProject(\''.$kode.'\')">Bergabung</button>
                    </div>';
                }else{
                    echo '<div class="alert alert-danger">Anda telah bergabung dengan proyek tersebut ['.$project->nama_proyek.']! Jika ingin bergabung dengan proyek yang lain, silakan masukan kode yang lain</div>';
                }

            }else{
                echo '<div class="alert alert-danger">Proyek dengan kode tersebut ['.$kode.'] tidak ditemukan!</div>';
            }
        }
    }


    /*
    Tahap 2 : Join ke Proyek
    
    */
    public function actionJoinProject()
    {
        try{
            //$_POST['msg'] = '2l3-baf3';
            if(isset($_POST['msg'])){
                $kode = $_POST['msg'];
                //echo Yii::$app->user->identity->id;

                $project = \backend\models\Project::find()
                            ->where([
                                'kode_proyek' => $kode,
                            ])->one();
                if($project != null){
                    $pegawai = \backend\models\HrmPegawai::find()
                            ->where(['id_user' => Yii::$app->user->identity->id])
                            ->one();

                    if($pegawai != null) {                  
                        ////Masukkan dalam Project MEmber;

                        $modelmember = new \backend\models\ProjectMember();
                        $modelmember->id_project = $project->id_project;
                        
                        $modelmember->id_pegawai = \backend\models\HrmPegawai::getIdPegawaiFromUserId();
                        $modelmember->id_project_mst_role = \backend\models\AppSettingSearch::getValueByKey("ID-PROJECT-ROLE-DEFAULT-JOIN");

                        $modelmember->start_date = $project->plan_start_date;
                        $modelmember->end_date = $project->plan_end_date;
                        $modelmember->save(false);
                        Yii::$app->session->setFlash('success', "Selamat anda telah bergabung dalam proyek ".$project->nama_proyek);
                    }
                }else{
                    echo '<div class="alert alert-danger">Proyek dengan kode tersebut ['.$kode.'] tidak ditemukan!</div>';
                }
            }
        }catch (Exception $e) {
          echo "Error API :".$e->getMessage();
        }  
    }


    /*Terkait dengan Daily Standup*/
    public function actionSubmitDaily()
    {
        /*
        foreach ($_POST as $key => $value) {
            echo $key."<===";
        }
        */
        if(isset($_POST['prev'])){
            $previous = $_POST['prev'];
            $today = isset($_POST['today'])  ? $_POST['today'] : "-";
            $obstacle = isset($_POST['obstacle'])  ? $_POST['obstacle'] : "-";
            $id_sprint = isset($_POST['is'])  ? $_POST['is'] : 0;
            $id_project = isset($_POST['ip'])  ? $_POST['ip'] : 0;
            //echo $previous." ".$today." ".$obstacle." ".$id_sprint." ".$id_project."<==="; exit();
            $id_pegawai = \backend\models\HrmPegawai::getIdPegawaiFromUserId();
            $standup_date = \common\helpers\Timeanddate::getCurrentDate();

            //echo Yii::$app->user->identity->id;

            $daily = \backend\models\ScrumDaily::find()
                        ->where([
                            'id_project' => $id_project,
                            'id_sprint' => $id_sprint,
                            'id_pegawai' => $id_pegawai,
                            'standup_date' => $standup_date,
                        ])->one();
            if($daily == null){
                $daily = new \backend\models\ScrumDaily();
                $daily->id_project = $id_project;
                $daily->id_sprint = $id_sprint;
                $daily->id_pegawai = $id_pegawai;
                $daily->standup_date = $standup_date;
            }else{
                echo '<div class="alert alert-danger">Daily Report sudah dibuat untuk hari ini. Anda tidak bisa submit lagi kecuali ingin mengubah terhadap submit data sebelumnya!</div>';
                exit();
            }

            $daily->yesterday_todo = $previous;
            $daily->today_todo = $today;
            $daily->obstacle = $obstacle;
            $daily->save(false);
        }
    }

    public function actionSubmitDailyFirstStep()
    {
        /*
        foreach ($_POST as $key => $value) {
            echo $key."".$value."<===";
        }
        */
        if(isset($_POST['prev'])){
            $previous = $_POST['prev'];
            $rowsdata = isset($_POST['rowsdata'])  ? $_POST['rowsdata'] : "-";
            $id_project = isset($_POST['ip'])  ? $_POST['ip'] : 0;
            $id_sprint = isset($_POST['is'])  ? $_POST['is'] : 0;

            //echo $previous." ".$rowsdata." "; exit();
            $id_pegawai = \backend\models\HrmPegawai::getIdPegawaiFromUserId();
            $standup_date = \common\helpers\Timeanddate::getCurrentDate();

            //echo Yii::$app->user->identity->id;

            $daily = \backend\models\ScrumDaily::find()
                        ->where([
                            'id_project' => $id_project,
                            'id_sprint' => $id_sprint,
                            'id_pegawai' => $id_pegawai,
                            'standup_date' => $standup_date,
                        ])->one();
            if($daily == null){
                $daily = new \backend\models\ScrumDaily();
                $daily->id_project = $id_project;
                $daily->id_sprint = $id_sprint;
                $daily->id_pegawai = $id_pegawai;
                $daily->standup_date = $standup_date;
            }else{
                
            }

            /*
            if($daily->status == 2){
                echo '<div class="alert alert-danger">Daily Report sudah dibuat untuk hari ini. Anda tidak bisa submit lagi kecuali ingin mengubah terhadap submit data sebelumnya!</div>';
                exit();
            }
            */

            $daily->yesterday_todo = $previous;
            $daily->save(false);


            //2. Simpan di Yesterday SCRUM
            $splitted = explode(";", $rowsdata);
            $LIST_CHECKED = array();
            for($i=0;$i<count($splitted); $i++){
                //echo $splitted[$i]." <br>";
                $thedata = explode("=", $splitted[$i]);
                if(count($thedata) >= 4){
                    $id_product_backlog = $thedata[0];
                    $progres = $thedata[1];
                    $progres_previous = $thedata[2];
                    $contrix = $thedata[3];
                    //echo $id_product_backlog." == ".$progres." == ".$contrix."<br>";
                    $LIST_CHECKED[] = $id_product_backlog;
                    $todos = \backend\models\ScrumDailyForYesterday::find()
                    ->where([
                        'id_project' => $id_project,
                        'id_sprint' => $id_sprint,
                        'id_pegawai' => $id_pegawai,
                        'id_product_backlog' => $id_product_backlog,
                        'id_scrum_daily' => $daily->id_scrum_daily,
                    ])->one();
                    if($todos == null){
                        $todos = new \backend\models\ScrumDailyForYesterday();
                        $todos->id_project = $id_project;
                        $todos->id_sprint = $id_sprint;
                        $todos->id_pegawai = $id_pegawai;
                        $todos->id_scrum_daily = $daily->id_scrum_daily;
                        $todos->id_product_backlog = $id_product_backlog;
                        //echo 'Entry';
                    }
                    $todos->progres = $progres;
                    $todos->progres_previous = $progres_previous;
                    //$todos->kontribusi = $progres - $progres_previous;
                    $todos->kontribusi = $contrix;
                    $todos->save(false);

                    //Ambil Product Backlog
                    $pb = \backend\models\ProductBacklog::find()
                        ->where([
                            'id_product_backlog' => $id_product_backlog,
                        ])->one();
                    if($pb != null){
                        $pb->progres_by_team = $progres;
                        $pb->save(false);
                    }

                    //Ambil Sprint Backlog
                    $sb = \backend\models\SprintBacklog::find()
                    ->where([
                        'id_project' => $id_project,
                        'id_sprint' => $id_sprint,
                        'id_product_backlog' => $id_product_backlog,
                    ])->one();
                    if($sb != null){
                        if(strtotime($sb->start_work <= 0)){
                            $sb->start_work = \common\helpers\Timeanddate::getCurrentDate();
                        }
                        if(is_null($sb->start_work)){
                            $sb->start_work = \common\helpers\Timeanddate::getCurrentDate();
                        }
                        $sb->end_work = \common\helpers\Timeanddate::getCurrentDate();
                        $sb->last_contribute_user = \backend\models\HrmPegawai::getIdPegawaiFromUserId();
                        $sb->last_progres_by_team = $progres;
                        $sb->save(false);
                    }
                }
                
            }


            //3. Yang diuncheck harus direset progresnya dan dihapus
            //echo 'Ini deleted';
            $alltodos = \backend\models\ScrumDailyForYesterday::find()
                    ->where([
                        'id_project' => $id_project,
                        'id_sprint' => $id_sprint,
                        'id_pegawai' => $id_pegawai,
                        //'id_product_backlog' => $id_product_backlog,
                        'id_scrum_daily' => $daily->id_scrum_daily,
                    ])->all();
            foreach($alltodos as $alltodo){
                
                if(!in_array($alltodo->id_product_backlog, $LIST_CHECKED)){
                    //echo $alltodo->id_product_backlog."<Br>";
                    //echo 'ini tidak ada';

                    //Kembalikan nilai progres ke nilai yang awal
                    $pb = \backend\models\ProductBacklog::find()
                        ->where([
                            'id_product_backlog' => $alltodo->id_product_backlog,
                        ])->one();
                    if($pb != null){
                        $pb->progres_by_team = $alltodo->progres - $alltodo->kontribusi;
                        $pb->save(false);
                    }

                    //Hapus
                    $alltodo->delete();
                }
            }

        }
    }


    public function actionSubmitDailySecondStep()
    {
        /*
        foreach ($_POST as $key => $value) {
            echo $key."".$value."<===";
        }
        */
        if(isset($_POST['today'])){
            $today = $_POST['today'];
            $rowsdata = isset($_POST['rowsdata'])  ? $_POST['rowsdata'] : "-";
            $id_project = isset($_POST['ip'])  ? $_POST['ip'] : 0;
            $id_sprint = isset($_POST['is'])  ? $_POST['is'] : 0;

            //echo $today." ".$rowsdata." "; exit();
            $id_pegawai = \backend\models\HrmPegawai::getIdPegawaiFromUserId();
            $standup_date = \common\helpers\Timeanddate::getCurrentDate();

            //echo Yii::$app->user->identity->id;

            $daily = \backend\models\ScrumDaily::find()
                        ->where([
                            'id_project' => $id_project,
                            'id_sprint' => $id_sprint,
                            'id_pegawai' => $id_pegawai,
                            'standup_date' => $standup_date,
                        ])->one();
            if($daily == null){
                $daily = new \backend\models\ScrumDaily();
                $daily->id_project = $id_project;
                $daily->id_sprint = $id_sprint;
                $daily->id_pegawai = $id_pegawai;
                $daily->standup_date = $standup_date;
            }else{
                
            }

            /*
            if($daily->status == 2){
                echo '<div class="alert alert-danger">Daily Report sudah dibuat untuk hari ini. Anda tidak bisa submit lagi kecuali ingin mengubah terhadap submit data sebelumnya!</div>';
                exit();
            }
            */

            $daily->today_todo = $today;
            $daily->save(false);


            //2. Simpan di Yesterday SCRUM
            $splitted = explode(";", $rowsdata);
            $LIST_CHECKED = array();
            for($i=0;$i<count($splitted); $i++){
                //echo $splitted[$i]." <br>";
                $thedata = explode("=", $splitted[$i]);
                if(count($thedata) >= 4){
                    $id_product_backlog = $thedata[0];
                    $progres = $thedata[1];
                    $progres_previous = $thedata[2];
                    $contrix = $thedata[3];
                    //echo $id_product_backlog." == ".$progres." == ".$contrix."<br>";
                    $LIST_CHECKED[] = $id_product_backlog;
                    $todos = \backend\models\ScrumDailyForNow::find()
                    ->where([
                        'id_project' => $id_project,
                        'id_sprint' => $id_sprint,
                        'id_pegawai' => $id_pegawai,
                        'id_product_backlog' => $id_product_backlog,
                        'id_scrum_daily' => $daily->id_scrum_daily,
                    ])->one();
                    if($todos == null){
                        $todos = new \backend\models\ScrumDailyForNow();
                        $todos->id_project = $id_project;
                        $todos->id_sprint = $id_sprint;
                        $todos->id_pegawai = $id_pegawai;
                        $todos->id_scrum_daily = $daily->id_scrum_daily;
                        $todos->id_product_backlog = $id_product_backlog;
                        //echo 'Entry';
                    }
                    $todos->target = $progres;
                    $todos->kontribusi = $contrix;
                    $todos->save(false);
                }
                
            }


            //3. Yang diuncheck harus direset progresnya dan dihapus
            //echo 'Ini deleted';
            $alltodos = \backend\models\ScrumDailyForNow::find()
                    ->where([
                        'id_project' => $id_project,
                        'id_sprint' => $id_sprint,
                        'id_pegawai' => $id_pegawai,
                        //'id_product_backlog' => $id_product_backlog,
                        'id_scrum_daily' => $daily->id_scrum_daily,
                    ])->all();
            foreach($alltodos as $alltodo){
                
                if(!in_array($alltodo->id_product_backlog, $LIST_CHECKED)){
                    //echo $alltodo->id_product_backlog."<Br>";
                    //echo 'ini tidak ada';

                    //Hapus
                    $alltodo->delete();
                }
            }

        }
    }

    public function actionSubmitDailyThirdStep()
    {
        /*
        foreach ($_POST as $key => $value) {
            echo $key."".$value."<===";
        }
        */
        if(isset($_POST['obstacle'])){
            $obstacle = $_POST['obstacle'];
            $id_project = isset($_POST['ip'])  ? $_POST['ip'] : 0;
            $id_sprint = isset($_POST['is'])  ? $_POST['is'] : 0;

            //echo $today." ".$rowsdata." "; exit();
            $id_pegawai = \backend\models\HrmPegawai::getIdPegawaiFromUserId();
            $standup_date = \common\helpers\Timeanddate::getCurrentDate();

            //echo Yii::$app->user->identity->id;

            $daily = \backend\models\ScrumDaily::find()
                        ->where([
                            'id_project' => $id_project,
                            'id_sprint' => $id_sprint,
                            'id_pegawai' => $id_pegawai,
                            'standup_date' => $standup_date,
                        ])->one();
            if($daily == null){
                $daily = new \backend\models\ScrumDaily();
                $daily->id_project = $id_project;
                $daily->id_sprint = $id_sprint;
                $daily->id_pegawai = $id_pegawai;
                $daily->standup_date = $standup_date;
            }else{
                
            }
            /*
            if($daily->status == 2){
                echo '<div class="alert alert-danger">Daily Report sudah dibuat untuk hari ini. Anda tidak bisa submit lagi kecuali ingin mengubah terhadap submit data sebelumnya!</div>';
                exit();
            }
            */
            $daily->status = 2;
            $daily->obstacle = $obstacle;
            $daily->save(false);
        }
    }
    /*End of Daily Standup */


    /*Start of Sprint Review */
    public function actionSubmitSprintReview()
    {
        /*
        foreach ($_POST as $key => $value) {
            echo $key."".$value."<===";
        }
        */
        if(isset($_POST['noted'])){
            $noted = $_POST['noted'];
            $rowsdata = isset($_POST['rowsdata'])  ? $_POST['rowsdata'] : "-";
            $id_project = isset($_POST['ip'])  ? $_POST['ip'] : 0;
            $id_sprint = isset($_POST['is'])  ? $_POST['is'] : 0;

            //echo $noted." ".$rowsdata." "; exit();
            $id_pegawai = \backend\models\HrmPegawai::getIdPegawaiFromUserId();
            $standup_date = \common\helpers\Timeanddate::getCurrentDate();

            //echo Yii::$app->user->identity->id;

            //1. Simpan di SprintBacklog
            $splitted = explode(";", $rowsdata);
            $LIST_CHECKED = array();
            for($i=0;$i<count($splitted); $i++){
                //echo $splitted[$i]." <br>";
                $thedata = explode("=", $splitted[$i]);
                if(count($thedata) >= 4){
                    $id_product_backlog = $thedata[0];
                    $progres = $thedata[1];
                    $progres_backlog = $thedata[2];
                    $contrix = $thedata[3];
                    //echo $id_product_backlog." == ".$progres." == ".$contrix."<br>";
                    $LIST_CHECKED[] = $id_product_backlog;
                    $sb = \backend\models\SprintBacklog::find()
                    ->where([
                        'id_project' => $id_project,
                        'id_sprint' => $id_sprint,
                        'id_product_backlog' => $id_product_backlog,
                    ])->one();
                    if($sb != null){
                        
                        $sb->last_progres_by_team = $progres_backlog;
                        $sb->last_progres_by_owner = $contrix;
                        $sb->save(false);
                    }

                    //2. Ambil Product Backlog
                    $pb = \backend\models\ProductBacklog::find()
                        ->where([
                            'id_product_backlog' => $id_product_backlog,
                        ])->one();
                    if($pb != null){
                        $pb->progres_by_owner = $contrix;
                        $pb->save(false);
                    }
                }
                
            }

            //3. Simpan catatannya
            $sprintceremony = \backend\models\SprintCeremony::find()
                ->where([
                    'id_sprint' => $id_sprint,
                    'id_project' => $id_project,
                    'ceremony' => 'REVIEW',
                ])->one();
            if($sprintceremony == null){
                //Buat Baru
                $sprintceremony = new \backend\models\SprintCeremony();
                $sprintceremony->id_sprint = $id_sprint;
                $sprintceremony->id_project = $id_project;
                $sprintceremony->ceremony = 'REVIEW';
                
            }
            $sprintceremony->noted = $_POST['noted'];
            $noted = $sprintceremony->noted;
            $sprintceremony->save(false);
            \common\helpers\LogHelper::setPublicSubmitted($sprintceremony);
        }
    }

    /* End of Sprint Review */
}
