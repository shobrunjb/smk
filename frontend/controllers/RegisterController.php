<?php

namespace frontend\controllers;

use common\models\LoginForm;
use common\models\MemberLoginForm;
use backend\models\ContactUs;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;

use backend\models\User;
use backend\models\UserSearch;
use common\modules\auth\models\AuthAssignment;

use backend\models\PublikUser;
use backend\models\PublikUserSearch;
use backend\models\HrmPegawai;

use common\utils\EncryptionDB;
use common\helpers\Timeanddate;
use common\helpers\IPAddressFunction;
use Exception;
use Yii;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
/**
 * Site controller
 */
class RegisterController extends Controller
{
    //var $layout = "main_deep";

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup', 'index', 'list-kabupaten'],
                'rules' => [
                    [
                        'actions' => ['signup', 'index', 'list-kabupaten'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex(){
        return $this->redirect(['signup']);
    }


    public function actionSignup($jenis="PERORANGAN")
    {
        $this->layout = "main_default"; //main_deep
        $model = new PublikUser();
        $model->jenis_user = $jenis;
        if($model->jenis_user == "BADAN PUBLIK"){
            $model->scenario = PublikUser::BADAN;
        }

        if ($model->load(Yii::$app->request->post())) {
            $exception = $this->checkPassword($model->password1);
            if ($exception != "valid"){
                $model->addError('password', $exception);
                return $this->render('signup', [
                    'model' => $model,
                ]);
            }

            $model->id_user = -1; //Default sblm dimapping
            //$model->file_identitas = UploadedFile::getInstance($model, 'file_identitas');
            //$model->file_akta_pendirian = UploadedFile::getInstance($model, 'file_akta_pendirian');
            $model->file_identitas = "--";
            $model->file_akta_pendirian = "--";

            if($model->save()){
                //Upload File
                /*
                if ($model->uploadFileIdentitas()) {

                }else{
                    //throw new NotFoundHttpException('Upload file identitas gagal!.');
                }

                if ($model->uploadFileAktaPendirian()) {

                }else{
                    //throw new NotFoundHttpException('Upload file akta pendirian gagal!.');
                }
                */



                //Create User dan Auth Assigment
                $model1 = new User();
                $model2 = new AuthAssignment();

                //$model1->load(Yii::$app->request->post());
                
                $password = $model->password1;
                $model1->password = $password;
                /*
                echo "==>".$password."<==password<br>"; 

                $hasme = Yii::$app->security->generatePasswordHash($password);
                 echo $hasme."<br>";

                $compare = Yii::$app->security->validatePassword($password, $hasme);
                echo $compare."Hasil<br>";
                exit();
                */

                $hash = $model1->setPassword($model1->password);
                $model1->username = $model->email;
                $model1->full_name = $model->nama;
                $model1->generateAuthKey();
                $model1->generatePasswordResetToken();
                $model1->setUserLevel();
                $model1->user_level = 'member';
                $model1->email = $model->email;
                //statusnya valuenya harus 10 --> agar active
                $model1->status = 10;
                if ($model1->save(false)) {
                    //echo 'berhasil';
                    //exit();
                    $model2->user_id = $model1->id;
                    $model2->item_name = $model1->user_level;
                    $model2->created_at = $model1->created_at;

                    //Update ke data model
                    $model->id_user = $model1->id;
                    $model->save(false);


                    //Create Data Pegawai
                    $model3 = new HrmPegawai();
                    $model3->nama_lengkap = $model->nama;
                    $model3->no_identitas_pribadi = $model->nik;
                    $model3->NIP = $model->nik;
                    $model3->jbt_jabatan = $model->pekerjaan;
                    $model3->alamat_termutakhir = $model->alamat;
                    $model3->alamat_sesuai_identitas = $model->alamat;
                    $model3->id_propinsi = $model->id_propinsi;
                    $model3->id_kabupaten = $model->id_kabupaten;
                    $model3->mobilephone1 = $model->nomor_telepon;
                    $model3->email1 = $model->email;
                    $model3->id_hrm_status_pegawai = 2; //Hardcoded : Bekerja
                    $model3->id_user = $model->id_user;
                    if ($model3->save(false)) {
                        \common\helpers\LogHelper::setPublicSubmittedGuest($model3);
                    }


                    if ($model2->save(false)) {
                        Yii::$app->session->setFlash('success', "Registrasi user telah berhasil!.");
                        $i = EncryptionDB::encryptor('encrypt',$model->id_publik_user);
                        return $this->redirect(['signup-success', 'i' => $i]);
                    }
                }

                //return $this->redirect(['signup-success', 'i' => $model->id_publik_user]);
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    function checkPassword($password) {
        $errors = [];

        // Check if password length is at least 8 characters
        if (strlen($password) < 8) {
          array_push($errors, "Password harus terdiri dari minimal 8 karakter");
        }
        
        // Check if password contains uppercase letters
        if (!preg_match("/[A-Z]/", $password)) {
          array_push($errors, "Password harus terdiri dari huruf besar");
        }
      
        // Check if password contains lowercase letters
        if (!preg_match("/[a-z]/", $password)) {
          array_push($errors, "Password harus terdiri dari huruf kecil");
        }
      
        // Check if password contains all unique characters like @#$ and numbers
        if (!preg_match("/[@#$^&*?()!]/", $password) || !preg_match("/[0-9]/", $password)) {
            array_push($errors, "Password harus terdiri dari unique karakter seperti @#$^&*?()! dan juga angka");
        }

        if (count($errors) > 0){
            return $errors;
        }

        return "valid";
    }

    public function actionKirim()
    {
        /*
        Yii::$app->mailer->compose()
            ->setFrom('ssjrama@gmail.com')
            ->setTo('sinung@email.com')
            ->setSubject('Message subject')
            ->setTextBody('Plain text content')
            ->setHtmlBody('<b>HTML content</b>')
            ->send();
        */

        /*
        Yii::$app->mailer->compose()
            ->setFrom('ppid@pom.go.id')
            ->setTo('sinung@email.com')
            ->setSubject('Reset Password PPID BPOM')
            ->setTextBody('Plain text content')
            ->setHtmlBody('<b>Berikut ini untuk link Password.</b>')
            ->send();

        echo "data telah terkirim";
        */
        //return $this->redirect(['index']);
    }


    public function actionResetPassword(){
        $messageError = '';
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $user = \backend\models\User::find()
                ->where(['email' => $email])
                ->one();
            if($user != null){
                //echo 'ada';
                $addressServer = 'https://ppid.pom.go.id';
                $addressBaseUrl = \backend\models\AppSettingSearch::getValueByKey("ADDRES-BASE-URL");
                if($addressBaseUrl!= '--'){
                    $addressServer = $addressBaseUrl;
                }
                $i = EncryptionDB::encryptor('encrypt',$user->id);
                $urlReset = $addressServer."/register/reset-password-entry?a=".$i."&b=".$user->auth_key;
                
                //echo $urlReset; exit();

                //Ini untuk fitur mengirimkan email
                $this->sendEmail($user->email, $user, $urlReset);

                $message = 'Untuk keperluan reset password telah dikirmkan ke email anda ['.$email.']. Silakan cek email dan ikuti petunjuk yang ada dalam email tersebut!<br>';
                //$message .= $urlReset;
                return $this->render('success', [
                    'message' => $message,
                ]);
            }else{
                $messageError = 'Maaf email ['.$email.'] tidak ada atau tidak dikenali dalam database';
            }
        }

        return $this->render('reset-password', [
            'messageError' => $messageError,
        ]);
    }

    public function actionResetPasswordEntry($a, $b){

        $id = EncryptionDB::encryptor('decrypt',$a);
        //echo $a;
        //echo $id;
        $user = \backend\models\User::find()
                ->where(['id' => $id, 'auth_key'=>$b])
                ->one();
        if($user != null){

            if(isset($_POST['password'])){
                $password = $_POST['password'];
                //echo 'password'.$password;

                $exception = $this->checkPassword($password);
                if ($exception != "valid"){
                    return $this->render('reset-password-entry', [
                        'user' => $user,
                        'errMsg' => $exception,
                    ]);
                }

                $user->setPassword($password);
                $user->generateAuthKey();
                $user->generatePasswordResetToken();
                $message = '';
                if ($user->save(false)) {
                    $message = 'Selamat, password anda telah direset. Silakan masuk kembali ke sistem melalui Login yang telah diberikan<br>';
                    $message .= '<a href="'.\yii\helpers\Url::toRoute(['/login']).'" class="btn btn-sm btn-success">LOGIN</a>';
                }

                return $this->render('success', [
                    'message' => $message,
                ]);
            }

            return $this->render('reset-password-entry', [
                'user' => $user,
            ]);
        }else{
            $message = 'Maaf link reset password anda salah atau sudah kadaluarsa. Silakan lakukan reset password kembali!';
            return $this->render('error', [
                'message' => $message,
            ]);
        }
    }


    private function sendEmail($emailTarget, $user, $urlReset)
    {
        /*
        Yii::$app->mailer->compose()
            ->setFrom('ssjrama@gmail.com')
            ->setTo('sinung@email.com')
            ->setSubject('Message subject')
            ->setTextBody('Plain text content')
            ->setHtmlBody('<b>HTML content</b>')
            ->send();
        */

        $addressServer = 'https://ppid.pom.go.id';
        $i = EncryptionDB::encryptor('encrypt',$user->id);
        //$urlReset = $addressServer."/register/reset-password-entry?a=".$i."&b=".$user->auth_key;

        $html = '
        Terdapat permintaan untuk reset password untuk akun anda yang ada di Website PPID POM (ppid.pom.go.id)<br>
        Jika itu memang permintaan dari anda, silakan klik link ini :<br>

        <a href="'.$urlReset.'">Ubah Password</a>

        <br><br>
        Jika ini bukan permintaan ada, abaikan saja dan laporkan kepada kami terhadap penyalahgunaan ini kepada kami di email : ppid@pom.go.id
        ';

        Yii::$app->mailer->compose()
            ->setFrom('ppid@pom.go.id')
            ->setTo($emailTarget)
            ->setSubject('Reset Password User Website PPID BPOM')
            //->setTextBody('Plain text content')
            //->setHtmlBody('<b>Berikut ini untuk link Password.</b>')
            ->setHtmlBody($html)
            ->send();

        //echo "data telah terkirim";
        
        //return $this->redirect(['index']);
    }

    /*
    public function actionSignup()
    {
        $model = new PublikUser();

        if ($model->load(Yii::$app->request->post())) {
            $model->id_user = -1; //Default sblm dimapping
            $model->file_identitas = UploadedFile::getInstance($model, 'file_identitas');
            $model->file_akta_pendirian = UploadedFile::getInstance($model, 'file_akta_pendirian');

            if($model->save()){
                //Upload File
                if ($model->uploadFileIdentitas()) {
                    
                }

                if ($model->uploadFileAktaPendirian()) {

                }

                //Create User dan Auth Assigment
                $model1 = new User();
                $model2 = new AuthAssignment();

                //$model1->load(Yii::$app->request->post());
                
                $password = $model->password1;
                $model1->password = $password;
                $hash = $model1->setPassword($model1->password);
                $model1->username = $model->email;
                $model1->full_name = $model->nama;
                $model1->generateAuthKey();
                $model1->generatePasswordResetToken();
                $model1->setUserLevel();
                $model1->user_level = 'member';
                $model1->email = $model->email;
                //statusnya valuenya harus 10 --> agar active
                $model1->status = 10;
                if ($model1->save(false)) {
                    //echo 'berhasil';
                    //exit();
                    $model2->user_id = $model1->id;
                    $model2->item_name = $model1->user_level;
                    $model2->created_at = $model1->created_at;

                    //Update ke data model
                    $model->id_user = $model1->id;
                    $model->save(false);

                    if ($model2->save(false)) {
                        Yii::$app->session->setFlash('success', "Registrasi user telah berhasil!.");
                        $i = EncryptionDB::encryptor('encrypt',$model->id_publik_user);
                        return $this->redirect(['signup-success', 'i' => $i]);
                    }
                }

                return $this->redirect(['signup-success', 'id' => $model->id_publik_user]);
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
*/


/*
    public function actionSignup()
    {
        $model = new PublikUser();

        if ($model->load(Yii::$app->request->post())) {
            $model->id_user = -1;
            $model->file_identitas = "--";

            //Cek Encrypt - decrypt
            if($model->save()){
                //Upload File
                $model->attachFile = \yii\web\UploadedFile::getInstance($model, 'file_identitas');
                if ($model->uploadFile()) {
                    Yii::$app->session->setFlash('success', "Penambahan file identitas berhasil");
                }

                $model->attachFile = \yii\web\UploadedFile::getInstance($model, 'file_akta_pendirian');
                if ($model->uploadFileAkta()) {
                    Yii::$app->session->setFlash('success', "Penambahan file akta pendirian berhasil");
                }
                //Create User dan Auth Assigment
                $model1 = new User();
                $model2 = new AuthAssignment();

                //$model1->load(Yii::$app->request->post());
                
                $password = $_POST['password1'];
                $model1->password = $password;
                $hash = $model1->setPassword($model1->password);
                $model1->username = $model->email;
                $model1->full_name = $model->nama;
                $model1->generateAuthKey();
                $model1->generatePasswordResetToken();
                $model1->setUserLevel();
                $model1->user_level = 'member';
                $model1->email = $model->email;
                //statusnya valuenya harus 10 --> agar active
                $model1->status = 10;
                if ($model1->save(false)) {
                    //echo 'berhasil';
                    //exit();
                    $model2->user_id = $model1->id;
                    $model2->item_name = $model1->user_level;
                    $model2->created_at = $model1->created_at;

                    //Update ke data model
                    $model->id_user = $model1->id;
                    $model->save(false);

                    if ($model2->save(false)) {
                        Yii::$app->session->setFlash('success', "Registrasi user telah berhasil!.");
                        $i = EncryptionDB::encryptor('encrypt',$model->id_publik_user);
                        return $this->redirect(['signup-success', 'i' => $i]);
                    }
                }

                return $this->redirect(['signup-success', 'id' => $model->id_publik_user]);
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
*/

/*
    public function actionTest($id){
        $lists = \backend\models\Kabupaten::find()
                ->where(['id_propinsi' => $id])
                ->orderBy('nama_kabupaten ASC')
                ->all();

        if (!empty($lists)) {
            foreach($lists as $list) {
                echo "<option value='".$list->id_kabupaten."'>".$list->nama_kabupaten."</option>";
            }
        } else {
            echo "<option>-</option>";
        }
    }
*/
    
    public function actionListKabupaten($id)
    {               
        $lists = \backend\models\Kabupaten::find()
                ->where(['id_propinsi' => $id])
                ->orderBy('nama_kabupaten ASC')
                ->all();

        if (!empty($lists)) {
            foreach($lists as $list) {
                echo "<option value='".$list->id_kabupaten."'>".$list->nama_kabupaten."</option>";
            }
        } else {
            echo "<option>-</option>";
        }
        
    }

    public function actionSignupSuccess($i){
        $this->layout = "main_default";
        $id_publik_user = EncryptionDB::encryptor('decrypt',$i);
        
        return $this->render('signup-success', [
            'model' => $this->findModel($id_publik_user),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = PublikUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
