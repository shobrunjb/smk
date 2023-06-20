<?php
namespace api\modules\v1\controllers;

//use yii\rest\ActiveController;
use api\modules\v1\models\JenisKendaraan;
use api\modules\v1\models\KendaraanDerek;
use api\modules\v1\models\LokasiInapKendaraan;
use api\modules\v1\models\ResponMessage;
use api\modules\v1\models\ResponMessageDefault;
use api\modules\v1\models\User;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use api\modules\v1\helpers\ImageManipulation;
use app\common\helpers\CoordinateCalculation;
use api\modules\v1\helpers\Timeanddate;
use Yii;


class DefaultController extends Controller
{
    public $enableCsrfValidation=false;

//    public $modelClass = 'app\models\AssetItem';

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                ],
            ],
        ];
    }


    public function actionIndex() {
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        return array('info' => 'Hello World Pelanggaran');
    }

    //http://localhost/aihrm/api/web/v1/defaults/hello/
    public function actionHello()
    {
        return 'hello default';

    }

    public function actionCheck()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $assetItemList = Pelanggaran::find()->all();
        if (count($assetItemList) > 0){
            return array('status'=> true,'data'=> $assetItemList);
        }else{
            return array('status'=> false, 'data'=> 'No AssetItem Found.');
        }
    }

    public function actionCheckAccessRequest($headers) {
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $this->actionCheckAccessMain($headers);

        /*
        $user_mobile_token = $headers['user_mobile_token'];
        $session = MobileSession::find()->select([
                    "auth_key"
                ])
                ->where("auth_key = '" . $user_mobile_token . "' AND status = 1 AND valid_date_time >= NOW()")
                ->asArray()
                ->one();

        if (!$session) {
            throw new ForbiddenHttpException('User Mobile Token Not Valid, maybe is expired, please login again');
        }
        */
    }

    public function actionCheckAccessMain($headers) {
        if ($headers['app_mobile_token'] != $this->getApplicationMobileToken()) {
            throw new ForbiddenHttpException('Application Mobile Token Not Valid');
        }
    }

    private function getApplicationMobileToken() {
        return '51MD3KK';
    }

    public function actionLoginget()
    {
        return 'hello get';

    }

    //http://localhost/aihrm/api/web/v1/defaults/login/
    public function actionLogin(){
        $header = header('Access-Control-Allow-Origin: *');
        //\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

        //$this->actionCheckAccessRequest(yii::$app->request->headers);
        $params = Yii::$app->request->queryParams;

        $username = isset($_POST['username']) ? $_POST['username'] : "";
        $password = isset($_POST['password']) ? $_POST['password'] : "";

        $user = User::find()
        ->where(['username'=>$username])
        ->one();

        $myobj = new ResponMessageDefault();
        if($user != null and $user->validatePassword($password)){
            $myobj->success = true;
            $datas['id'] = $user->id;
            $datas['name'] = $user->full_name;
            $datas['email'] = $user->email;
            $datas['email_verified_at'] = null;
            $datas['created_at'] = Timeanddate::getCurrentDateTime();
            $datas['updated_at'] = Timeanddate::getCurrentDateTime();
            //$datas['user_level'] = $user->user_level;
            $datas['token'] = md5($user->id);
            $datas['token_type'] = "Bearer";
            $myobj->data = $datas;
            $myobj->message = "Hi ".$user->user_level.", selamat datang di aplikasi!";
        }else{
            $myobj->success = false;
            $myobj->message = "Salah username atau password!";
            Yii::$app->response->statusCode = 401;
        }
        return json_encode($myobj,JSON_UNESCAPED_SLASHES);
    }

    public function actionSignIn(){
        $header = header('Access-Control-Allow-Origin: *');
        //\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

        //$this->actionCheckAccessRequest(yii::$app->request->headers);
        $params = Yii::$app->request->queryParams;

        $id_pegawai = isset($_POST['id_pegawai']) ? $_POST['id_pegawai'] : "";
        $latitude = isset($_POST['latitude']) ? $_POST['latitude'] : "";
        $longitude = isset($_POST['longitude']) ? $_POST['longitude'] : "";
        $check_date = isset($_POST['check_date']) ? $_POST['check_date'] : "";
        $check_time = isset($_POST['check_time']) ? $_POST['check_time'] : "";
        $type = isset($_POST['type']) ? $_POST['type'] : "";
        $photo = isset($_POST['photo']) ? $_POST['photo'] : "";



        $myobj = new ResponMessageDefault();
        $myobj->success = true;
        $myobj->message = "Sign-in";
        $datas['id_pegawai'] = $id_pegawai;
        $datas['latitude'] = $latitude;
        $datas['longitude'] = $longitude;
        $datas['check_date'] = $check_date;
        $datas['check_time'] = $check_time;
        $datas['type'] = $type;
        $datas['photo'] = $photo;
        
        $myobj->data = $datas;
        return json_encode($myobj,JSON_UNESCAPED_SLASHES);

        $myobj = new ResponMessageDefault();
        if($user != null and $user->validatePassword($password)){
            $myobj->success = true;
            $datas['id'] = $user->id;
            $datas['name'] = $user->full_name;
            $datas['email'] = $user->email;
            $datas['email_verified_at'] = null;
            $datas['created_at'] = Timeanddate::getCurrentDateTime();
            $datas['updated_at'] = Timeanddate::getCurrentDateTime();
            //$datas['user_level'] = $user->user_level;
            $datas['token'] = md5($user->id);
            $datas['token_type'] = "Bearer";
            $myobj->data = $datas;
            $myobj->message = "Hi ".$user->user_level.", selamat datang di aplikasi!";
        }else{
            $myobj->success = false;
            $myobj->message = "Salah username atau password!";
            Yii::$app->response->statusCode = 401;
        }
        return json_encode($myobj,JSON_UNESCAPED_SLASHES);
    }

    public function actionLoginPetugas(){
        //\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

        //$this->actionCheckAccessRequest(yii::$app->request->headers);
        $params = Yii::$app->request->queryParams;

        $username = isset($_POST['username']) ? $_POST['username'] : "";
        $password = isset($_POST['password']) ? $_POST['password'] : "";

        $user = User::find()
        ->where(['username'=>$username])
        ->one();

        $myobj = new ResponMessage();
        if($user != null and $user->validatePassword($password)){
            if($user->user_level == "petugas"){
                $myobj->status = "ok";
                $datas['id'] = $user->id;
                $datas['full_name'] = $user->full_name;
                $datas['username'] = $user->username;
                $datas['email'] = $user->email;
                $datas['user_level'] = $user->user_level;
                $datas['alamat'] = $user->alamat;
                $datas['nomor_telepon'] = $user->nomor_telepon;
                $datas['jabatan'] = $user->jabatan;
                $datas["foto_profil"] = ImageManipulation::getImageURLGeneric($user, "foto1", "profil");

                $myobj->items = $datas;
            }else{
                $myobj->status = "invalid";
                $myobj->message = "User ini bukan user petugas, tidak berhak mengakses aplikasi ini!";
            }
        }else{
            $myobj->status = "invalid";
            $myobj->message = "Salah username atau password!";
        }
        return json_encode($myobj,JSON_UNESCAPED_SLASHES);
    }

    public function actionChangePasswordUser($id_user){
        //\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

        //$this->actionCheckAccessRequest(yii::$app->request->headers);
        $params = Yii::$app->request->queryParams;

        $username = isset($_POST['username']) ? $_POST['username'] : "";
        $password_old = isset($_POST['password_old']) ? $_POST['password_old'] : "";
        $password_new = isset($_POST['password_new']) ? $_POST['password_new'] : "";

        $user = User::find()
        ->where(['id'=>$id_user])
        ->one();

        if($user != null){
            $myobj = new ResponMessage();
            if($password_old != ""){
                if($user != null and $user->validatePassword($password_old)){
                    $user->setPassword($password_new);
                    $user->save(false);
                    $myobj->status = "ok";
                    $myobj->message = "Ubah password berhasil!";
                }else{
                    $myobj->status = "invalid";
                    $myobj->message = "Password yang lama salah!";
                }
            }else{
                $myobj->status = "invalid";
                $myobj->message = "Password yang lama tidak boleh kosong!";
            }
        }else{
            $myobj->status = "invalid";
            $myobj->message = "user ini tidak dikenali!";
        }
        return json_encode($myobj,JSON_UNESCAPED_SLASHES);
    }

    public function actionUpdateProfilUser($id_user){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

        $this->actionCheckAccessRequest(yii::$app->request->headers);
        $params = Yii::$app->request->queryParams;

        $data = User::find()
        ->where(['id'=>$id_user])
        ->one();

        $full_name = isset($_POST['full_name']) ? $_POST['full_name'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : "";
        $nomor_telepon = isset($_POST['nomor_telepon']) ? $_POST['nomor_telepon'] : "";
        $jabatan = isset($_POST['jabatan']) ? $_POST['jabatan'] : "";

        $myobj = new ResponMessage();

        if($data != null){
            if(isset($_POST['full_name'])) { $data->full_name = $full_name; }
            if(isset($_POST['email'])) { $data->email = $email; }
            if(isset($_POST['alamat'])) { $data->alamat = $alamat; }
            if(isset($_POST['nomor_telepon'])) { $data->nomor_telepon = $nomor_telepon; }
            if(isset($_POST['jabatan'])) { $data->jabatan = $jabatan; }

            if($data->save(false)){
                $data->save(false);


                if(isset($_POST['foto_profil'])){
                    $foto1 = isset($_POST['foto_profil']) ? $_POST['foto_profil'] : "";
                    if($foto1 != ""){
                        $foto1_filename = ImageManipulation::uploadFileGeneric($foto1, "foto_profile_", $data->id, "profil");
                        $data->foto1 = $foto1_filename;
                        $data->save(false);
                    }
                }


                $datas = array();
                $datas['id'] = $data->id;
                $datas['full_name'] = $data->full_name;
                $datas['username'] = $data->username;
                $datas['email'] = $data->email;
                $datas['user_level'] = $data->user_level;
                $datas['alamat'] = $data->alamat;
                $datas['nomor_telepon'] = $data->nomor_telepon;
                $datas['jabatan'] = $data->jabatan;
                $datas["foto_profil"] = ImageManipulation::getImageURLGeneric($data, "foto1", "profil");

                $myobj->items = $datas;

                $myobj->status = 'ok';
                //$myobj->items = $data->id;
                $myobj->message = "Update profil pengguna telah berhasil!";
            }
            else{
                $myobj->status = 'error';
                $myobj->message = "Mohon maaf terdapat kesalahan. Silakan cek kembali!";
            }
        }else{
            $myobj->status = 'error';
            $myobj->message = "Tidak ada data dengan ID tersebut!";
        }

        //return $jsonFormat;
        return $myobj; //Kalau tanpa json encode selama response FORMAT_JSON diubah otomatis menjadi json
    }


    public function actionGetMobileMasterPelanggaran(){
        $records = JenisKendaraan::find()
        ->all();
        $rows = array();
        foreach($records as $record){
            $datas = array();
            $datas["id_jenis_kendaraan"] = $record->id_jenis_kendaraan;
            $datas["jenis_kendaraan"] = $record->jenis_kendaraan;

            $rows[] = $datas;
        }

        $myobj = new ResponMessageMobileMaster();
        $myobj->jenis_kendaraan = $rows;


        //Kendaraan Derek
        $records = KendaraanDerek::find()
        ->all();
        $rows = array();
        foreach($records as $record){
            $datas = array();
            $datas["id_kendaraan_derek"] = $record->id_kendaraan_derek;
            $datas["no_polisi"] = $record->no_polisi;
            $datas["pemilik"] = $record->pemilik;

            $rows[] = $datas;
        }
        $myobj->kendaraan_derek = $rows;

        //Tujuan Derek
        $records = LokasiInapKendaraan::find()
        ->all();
        $rows = array();
        foreach($records as $record){
            $datas = array();
            $datas["id_lokasi_inap_kendaraan"] = $record->id_lokasi_inap_kendaraan;
            $datas["nama_lokasi"] = $record->nama_lokasi;
            $datas["alamat"] = $record->alamat;
            $datas["longitude"] = $record->longitude;
            $datas["latitude"] = $record->latitude;

            $rows[] = $datas;
        }

        $myobj->tujuan_derek = $rows;

        return json_encode($myobj, JSON_UNESCAPED_SLASHES);
    }
}

