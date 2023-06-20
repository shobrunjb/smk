<?php

namespace backend\controllers;

use Yii;
use backend\models\BeiCompentecyQuestion;
use backend\models\BeiCompentecyQuestionSearch;
use backend\models\BeiKarAssesJawaban;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\BeiPegawaiChat;
use common\helpers\Timeanddate;
use common\helpers\IPAddressFunction;
use common\helpers\AuthHelper;
use common\helpers\LogHelper;
use backend\models\BeiInterviewSession;
use backend\models\BeiInterviewSessionSearch;
use common\utils\EncryptionUtil;
/**
 * BeiCompentecyQuestionController implements the CRUD actions for BeiCompentecyQuestion model.
 */
class ChatInterviewController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all BeiCompentecyQuestion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BeiCompentecyQuestionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(isset($_POST['message'])){
            $chat = new BeiPegawaiChat();
            $id_user = Yii::$app->getUser()->getId();
            $chat->id_pegawai = $id_user;
            $chat->from_user_id = $id_user;
            $chat->to_user_id = -1 ; //Kirim ke chatbot
            $chat->message = $_POST['message'];
            $chat->time_log = Timeanddate::getCurrentDateTime();
            $chat->ipaddress_log = IPAddressFunction::getUserIPAddress();
            $chat->save(false);
        }

        return $this->render('chat-jax', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPostMessage(){
        if(isset($_POST['msg'])){
            //echo $_POST['msg'];

            $chat = new BeiPegawaiChat();
            $id_user = Yii::$app->getUser()->getId();
            $chat->id_pegawai = $id_user;
            $chat->from_user_id = $id_user;
            $chat->to_user_id = -1 ; //Kirim ke chatbot
            $chat->message = $_POST['msg'];
            $chat->time_log = Timeanddate::getCurrentDateTime();
            $chat->ipaddress_log = IPAddressFunction::getUserIPAddress();
            $chat->save(false);

            echo '
                <div class="direct-chat-msg">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Saya</span>
                        <span class="direct-chat-timestamp pull-right">'.$chat->time_log.'</span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img class="direct-chat-img" src="'.Yii::$app->urlManager->baseUrl.'/images/chatbot/user-account.png'.'" alt="User"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        '.$chat->message.'
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
            ';
            exit();
        }

    }

    public function actionPostMessageSession(){
        if(isset($_POST['msg'])){
            //echo $_POST['msg'];

            $is = isset($_POST['is']) ? $_POST['is'] : "";
            $id_session = EncryptionUtil::staticEncryptor('decrypt',$is);

            $ipe = isset($_POST['ipe']) ? $_POST['ipe'] : "";
            $id_pegawai = EncryptionUtil::staticEncryptor('decrypt',$ipe);
            //echo $id_session." ".$id_pegawai;


            $lastchat = \backend\models\BeiPegawaiChatSearch::getLastChat($id_session, $id_pegawai);


            //Update dengan session baru
            \backend\models\BeiInterviewSessionSearch::updateWithNewPosition($id_session, $lastchat);

            $chat = new BeiPegawaiChat();
            $id_user = Yii::$app->getUser()->getId();
            $chat->id_pegawai = $id_pegawai;
            $chat->from_user_id = $id_user;
            $chat->to_user_id = -1 ; //Kirim ke chatbot
            $chat->message = $_POST['msg'];
            $chat->time_log = Timeanddate::getCurrentDateTime();
            $chat->ipaddress_log = IPAddressFunction::getUserIPAddress();
            $chat->id_bei_interview_session = $id_session*1;
            $chat->save(false);

            //Simpan hasilnya ke KAR Result (bei_kar_asses_jawaban)
            if($lastchat != null && $lastchat->id_bei_sequence == 2 ){ //Di hardcode dulu = 2( Berarti yang bagian kompetensinya)
               
                $question = \backend\models\BeiCompentecyQuestion::find()->where([
                    'id_bei_compentecy_question' => $lastchat->id_reference,
                ])
                ->one();
                if($question != null){
                    $kar = new BeiKarAssesJawaban();
                    $kar->id_bei_compentecy_question = $question->id_bei_compentecy_question;
                    $kar->id_hrm_competency_dimension =$question->id_hrm_competency_dimension;
                    $kar->soal = $question->question_ind;
                    $kar->id_bei_interview_session = $chat->id_bei_interview_session;
                    $kar->id_pegawai = $id_pegawai;
                    $kar->jawaban = $_POST['msg'];
                    $kar->save(false);
                    $kar = LogHelper::setModified($kar);
                    //echo $lastchat->id_reference;
                }
            }


            echo '
                <div class="direct-chat-msg">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Saya</span>
                        <span class="direct-chat-timestamp pull-right">'.$chat->time_log.'</span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img class="direct-chat-img" src="'.Yii::$app->urlManager->baseUrl.'/images/chatbot/user-account.png'.'" alt="User"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        '.$chat->message.'
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
            ';
            exit();
        }

    }

    public function actionOpenInterview(){
        $searchModel = new BeiInterviewSessionSearch();

        $datapegawai = AuthHelper::getIDPegawaByUserID();
        $id_pegawai = $datapegawai->id_pegawai;

        if($id_pegawai <= 0){
            throw new NotFoundHttpException('Akun ini belum terasosiasi dengan data biodata tertentu. Silakan kontak admin kami!');
        }

        $searchModel->id_pegawai = $id_pegawai;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('bei-interview-session/open-interview', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionStartInterview()
    {
        $searchModel = new BeiCompentecyQuestionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $session = new BeiInterviewSession();

        $datapegawai = AuthHelper::getIDPegawaByUserID();
        $id_pegawai = $datapegawai->id_pegawai;
        
        if($id_pegawai <= 0){
            throw new NotFoundHttpException('Akun ini belum terasosiasi dengan data biodata tertentu. Silakan kontak admin kami!');
        }

        $id_user = Yii::$app->getUser()->getId();
        $session->id_pegawai = $id_pegawai;
        $session->session_date = Timeanddate::getCurrentDate();
        $session->actual_start = Timeanddate::getCurrentDateTime();

        $session->created_date = Timeanddate::getCurrentDateTime();
        //$session->created_user = IPAddressFunction::getUserIPAddress();
        $session->created_ip_address = IPAddressFunction::getUserIPAddress();
        $session->save(false);

        $id_session = EncryptionUtil::staticEncryptor('encrypt',$session->id_bei_interview_session);

        return $this->redirect(['interview', 'i' => $id_session]);

        /*
        return $this->render('chat-jax', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        */
    }

    public function actionInterview($i)
    {
        $id_session = EncryptionUtil::staticEncryptor('decrypt',$i);
        //echo $id_session; exit();
        $session = BeiInterviewSession::findOne($id_session);

        if($session == null){
            throw new NotFoundHttpException('Sesi ini tidak dikenali. Jika anda merasa benar dengan sesi ini, silakan kontak admin kami!');
        }

        //Chat-jax : Tanpa session (hanya jalan di admin)
        //chat-jax-session : sudah menggunakan session (Masuk via member)
        //chat-jax-session-bot : sudah menerapkan fitur robot (memberikan pertanyaan)
        return $this->render('chat-jax-session-bot', [
            'id_session' => $id_session,
            'session' => $session,
            'is' =>$i
            
        ]);
    }


    public function actionGetRobotResponse(){
        if(isset($_POST['msg'])){
            //echo $_POST['msg'];

            $chat = new BeiPegawaiChat();
            $id_user = Yii::$app->getUser()->getId();
            $chat->id_pegawai = $id_user;
            $chat->from_user_id = -1;
            $chat->to_user_id = $id_user ; //Kirim ke chatbot
            $chat->message = "Terimakasih atas pertanyaan anda. Saya akan memberikan pertanyaan selanjutnya";
            $chat->time_log = Timeanddate::getCurrentDateTime();
            $chat->ipaddress_log = IPAddressFunction::getUserIPAddress();
            $chat->save(false);

            echo '
                <div class="direct-chat-msg right">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">Admin</span>
                        <span class="direct-chat-timestamp pull-left">'.$chat->time_log.'</span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img class="direct-chat-img" src="'.Yii::$app->urlManager->baseUrl.'/images/chatbot/interviewer.png'.'" alt="User"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        '.$chat->message.'
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
            ';
            exit();
        }

    }

    public function actionGetFirstBotResponse(){
        //echo $id_bei_interview_batch = \backend\models\BeiInterviewBacthSearch::getActiveBatch();

        if(isset($_POST['msg'])){
            //echo $_POST['msg'];

            //Get ID Batch
            //Untuk mendapatkan batch aktif dari sebuah sesi chatbot
            $id_bei_interview_batch = \backend\models\BeiInterviewBacthSearch::getActiveBatch();

            $is = isset($_POST['is']) ? $_POST['is'] : "";
            $id_session = EncryptionUtil::staticEncryptor('decrypt',$is);

            $ipe = isset($_POST['ipe']) ? $_POST['ipe'] : "";
            $id_pegawai = EncryptionUtil::staticEncryptor('decrypt',$ipe);

            //echo "data".$id_pegawai." ".$id_session;
            echo $id_bei_interview_batch; 

            //Get Qeustion - response with message
            //$respon = new \backend\models\ObjBeiResponChat();
            $respon = \backend\models\BeiInterviewSessionSearch::getCurrentSequence($id_session, $id_bei_interview_batch, $id_pegawai);
            

            $chat = new BeiPegawaiChat();
            $id_user = Yii::$app->getUser()->getId();
            $chat->id_pegawai = $id_pegawai;
            $chat->id_bei_interview_session = $id_session;
            $chat->from_user_id = -1;
            $chat->to_user_id = $id_user ; //Kirim ke chatbot
            $chat->message = $respon->message;
            $chat->time_log = Timeanddate::getCurrentDateTime();
            $chat->ipaddress_log = IPAddressFunction::getUserIPAddress();
            $chat->id_bei_sequence = $respon->id_bei_sequence;
            $chat->id_bei_interview_sequence = $respon->id_bei_interview_sequence;
            $chat->id_reference = $respon->id_reference;
            $chat->save(false);

            echo '
                <div class="direct-chat-msg right">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">Admin</span>
                        <span class="direct-chat-timestamp pull-left">'.$chat->time_log.'</span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img class="direct-chat-img" src="'.Yii::$app->urlManager->baseUrl.'/images/chatbot/interviewer.png'.'" alt="User"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        '.$chat->message.'
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
            ';
            exit();
        }

    }

    public function actionGetRobotResponseSession(){
        if(isset($_POST['msg'])){
            //echo $_POST['msg'];

             //Get ID Batch
            $id_bei_interview_batch = \backend\models\BeiInterviewBacthSearch::getActiveBatch();

            $is = isset($_POST['is']) ? $_POST['is'] : "";
            $id_session = EncryptionUtil::staticEncryptor('decrypt',$is);

            $ipe = isset($_POST['ipe']) ? $_POST['ipe'] : "";
            $id_pegawai = EncryptionUtil::staticEncryptor('decrypt',$ipe);


            $lastchat = \backend\models\BeiPegawaiChatSearch::getLastChat($id_session, $id_pegawai);
            //echo $lastchat->id_bei_interview_sequence."last";

            $respon = \backend\models\BeiInterviewSessionSearch::getCurrentSequence($id_session, $id_bei_interview_batch, $id_pegawai);
            //$respon = new \backend\models\ObjBeiResponChat();

            $chat = new BeiPegawaiChat();
            $id_user = Yii::$app->getUser()->getId();
            $chat->id_pegawai = $id_pegawai;
            $chat->from_user_id = -1;
            $chat->to_user_id = $id_user ; //Kirim ke chatbot
            $chat->message = "Terimakasih atas pertanyaan anda. Saya akan memberikan pertanyaan selanjutnya";
            $chat->message = $respon->message;
            $chat->time_log = Timeanddate::getCurrentDateTime();
            $chat->ipaddress_log = IPAddressFunction::getUserIPAddress();
            $chat->id_bei_interview_session = $id_session;
            $chat->id_bei_sequence = $respon->id_bei_sequence;
            $chat->id_bei_interview_sequence = $respon->id_bei_interview_sequence;
            $chat->id_reference = $respon->id_reference;
            $chat->number_order = $respon->number_order;
            $chat->is_finish_sequence = $respon->is_finish_sequence;

            $chat->save(false);

            echo '
                <div class="direct-chat-msg right">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">Admin</span>
                        <span class="direct-chat-timestamp pull-left">'.$chat->time_log.'</span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img class="direct-chat-img" src="'.Yii::$app->urlManager->baseUrl.'/images/chatbot/interviewer.png'.'" alt="User"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        '.$chat->message.'
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
            ';
            exit();
        }

    }

    public function actionTest(){
        $number = 1;
        $respon = new \backend\models\ObjBeiResponChat();    

        $quests = \backend\models\BeiCompentecyQuestion::find()
         ->where(['>', 'number', 0])
        ->orderBy(['number' => SORT_ASC])
        ->limit(1)
        ->all();

        $count = \backend\models\BeiCompentecyQuestion::find()
         ->where(['>', 'number', 0])
        ->orderBy(['number' => SORT_ASC])
        ->count();
        echo $count;

        foreach($quests as $quest){                        
            $respon->message = $quest->question_ind;
            //$respon->id_bei_sequence = $data->id_bei_sequence;
            //$respon->id_bei_interview_sequence = $id_bei_interview_sequence;
            $respon->id_reference = $quest->number;

            var_dump($respon);  
        }
    }


}
