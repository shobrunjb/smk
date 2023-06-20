<?php
namespace api\modules\v1\controllers;

//use yii\rest\ActiveController;
use api\modules\v1\models\Pelanggaran;
use api\modules\v1\models\LaporanMasyarakat;
use api\modules\v1\models\ResponMessage;
use api\modules\v1\models\AppSettingSearch;
use api\modules\v1\models\AppSetting;
use api\modules\v1\models\AppFieldConfig;
use api\modules\v1\models\BiayaRetribusi;
use api\modules\v1\models\JenisKendaraan;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use api\modules\v1\helpers\Timeanddate;
use api\modules\v1\helpers\IPAddressFunction;
use api\modules\v1\helpers\ImageManipulation;

use app\common\helpers\CoordinateCalculation;
use Yii;


class PelanggaranController extends Controller
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

    protected function verbs(){
        return [
            'post-pelanggaran' => ['POST'],
            'new' => ['POST'],
            'update' => ['PUT', 'PATCH','POST'],
            'delete' => ['DELETE'],
            'view' => ['GET'],
            //'index'=>['GET'],
        ];
    }

    public function actionIndex() {
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        return array('info' => 'Hello World Pelanggaran');
    }

    public function actionHello()
    {

        return 'hello';

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

    public function actionPostPeringatan(){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

        $this->actionCheckAccessRequest(yii::$app->request->headers);
        $params = Yii::$app->request->queryParams;

        $no_polisi = isset($_POST['no_polisi']) ? $_POST['no_polisi'] : "";
        $id_jenis_kendaraan = isset($_POST['id_jenis_kendaraan']) ? $_POST['id_jenis_kendaraan'] : 1;
        $id_jenis_pelanggaran = isset($_POST['id_jenis_pelanggaran']) ? $_POST['id_jenis_pelanggaran'] : 0;
        $lat = isset($_POST['lat']) ? $_POST['lat'] : "";
        $long = isset($_POST['long']) ? $_POST['long'] : "";
        $long = isset($_POST['long']) ? $_POST['long'] : "";
        $catatan = isset($_POST['catatan']) ? $_POST['catatan'] : "";
        $gambar = isset($_POST['catatan']) ? $_POST['catatan'] : "";
        $foto_jauh1 = isset($_POST['foto_jauh1']) ? $_POST['foto_jauh1'] : "";
        $reportby_user_id = isset($_POST['reportby_user_id']) ? $_POST['reportby_user_id'] : 0;

        $data = new Pelanggaran();
        
        $data->tanggal_pelanggaran = Timeanddate::getGMTPlus7Date(Timeanddate::getCurrentDateTime());
        $data->waktu_pelanggaran = Timeanddate::getGMTPlus7Time(Timeanddate::getCurrentDateTime());
        $data->reportby_ip_address = IPAddressFunction::getUserIPAddress();
        $data->reportby_datetime = Timeanddate::getCurrentDateTime();
        $data->reportby_user_id = $reportby_user_id;
        $data->no_polisi = $no_polisi;
        $data->id_jenis_kendaraan = $id_jenis_kendaraan;
        $data->id_jenis_pelanggaran = $id_jenis_pelanggaran;
        $data->latitude = $lat;
        $data->longitude = $long;
        $data->no_polisi = $no_polisi;
        //$data->id_kendaraan = $id_kendaraan;
        $data->catatan_pelanggaran = $catatan;
        //$data->foto_jauh1 = $foto_jauh1;
        $data->status_penindakan = "PERINGATAN";

        if($data->save(false)){

            $foto_jauh1_filename = ImageManipulation::uploadFilePelanggaranToFolder($foto_jauh1, $data, "peringatan_foto1_");
            $data->foto_jauh1 = $foto_jauh1_filename;
            $data->save(false);

            $jsonFormat = [
                [
                    "status" => true,
                    "msg" => "Informasi peringatan yang anda kirimkan sudah tersimpan!",
                    "result" => $data->id_pelanggaran 
                ]
            ];
        }
        else{
            $jsonFormat = [
            [
                "status" => false,
                "msg" => "Mohon maaf terdapat kesalahan. Silakan cek kembali!",
                "result" => 0
            ]
        ];
        }

        return $jsonFormat;
    }

    public function actionPostPelanggaran(){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

        $this->actionCheckAccessRequest(yii::$app->request->headers);
        $params = Yii::$app->request->queryParams;

        

        $no_polisi = isset($_POST['no_polisi']) ? $_POST['no_polisi'] : "";
        $id_jenis_kendaraan = isset($_POST['id_jenis_kendaraan']) ? $_POST['id_jenis_kendaraan'] : 1;
        $id_jenis_pelanggaran = isset($_POST['id_jenis_pelanggaran']) ? $_POST['id_jenis_pelanggaran'] : 0;
        $lat = isset($_POST['lat']) ? $_POST['lat'] : "";
        $long = isset($_POST['long']) ? $_POST['long'] : "";
        $long = isset($_POST['long']) ? $_POST['long'] : "";
        $catatan = isset($_POST['catatan']) ? $_POST['catatan'] : "";
        $gambar = isset($_POST['catatan']) ? $_POST['catatan'] : "";
        $foto_jauh1 = isset($_POST['foto_jauh1']) ? $_POST['foto_jauh1'] : "";
        $foto_depan = isset($_POST['foto_depan']) ? $_POST['foto_depan'] : "";
        $foto_samping_kanan = isset($_POST['foto_samping_kanan']) ? $_POST['foto_samping_kanan'] : "";
        $foto_samping_kiri = isset($_POST['foto_samping_kiri']) ? $_POST['foto_samping_kiri'] : "";
        $foto_belakang = isset($_POST['foto_belakang']) ? $_POST['foto_belakang'] : "";
        $reportby_user_id = isset($_POST['reportby_user_id']) ? $_POST['reportby_user_id'] : 0;
        $derek_id_kendaraan_derek = isset($_POST['derek_id_kendaraan_derek']) ? $_POST['derek_id_kendaraan_derek'] : 0;
        $derek_id_lokasi_inap_kendaraan = isset($_POST['derek_id_lokasi_inap_kendaraan']) ? $_POST['derek_id_lokasi_inap_kendaraan'] : 0;



        $data = new Pelanggaran();
        
        $data->tanggal_pelanggaran = Timeanddate::getGMTPlus7Date(Timeanddate::getCurrentDateTime());
        $data->waktu_pelanggaran = Timeanddate::getGMTPlus7Time(Timeanddate::getCurrentDateTime());
        $data->reportby_ip_address = IPAddressFunction::getUserIPAddress();
        $data->reportby_datetime = Timeanddate::getCurrentDateTime();
        $data->reportby_user_id = $reportby_user_id;
        $data->no_polisi = $no_polisi;
        $data->id_jenis_kendaraan = $id_jenis_kendaraan;
        $data->id_jenis_pelanggaran = $id_jenis_pelanggaran;
        $data->no_polisi = $no_polisi;
        $data->latitude = $lat;
        $data->longitude = $long;
        //$data->id_kendaraan = $id_kendaraan;
        $data->catatan_pelanggaran = $catatan;
        //$data->foto_jauh1 = $foto_jauh1;
        //$data->foto_depan = $foto_depan;
        //$data->foto_samping_kanan = $foto_samping_kanan;
        //$data->foto_samping_kiri = $foto_samping_kiri;
        //$data->foto_belakang = $foto_belakang;
        $data->status_penindakan = "PENDEREKAN";
        $data->derek_id_kendaraan_derek = $derek_id_kendaraan_derek;
        $data->derek_id_lokasi_inap_kendaraan = $derek_id_lokasi_inap_kendaraan;

        if($data->save(false)){


            $foto_jauh1_filename = ImageManipulation::uploadFilePelanggaranToFolder($foto_jauh1, $data, "derek_foto1_");
            $data->foto_jauh1 = $foto_jauh1_filename;
            $foto_depan_filename = ImageManipulation::uploadFilePelanggaranToFolder($foto_depan, $data, "derek_foto_depan_");
            $data->foto_depan = $foto_depan_filename;
            $foto_samping_kanan_filename = ImageManipulation::uploadFilePelanggaranToFolder($foto_samping_kanan, $data, "derek_foto_samping_kanan_");
            $data->foto_samping_kanan = $foto_samping_kanan_filename;
            $foto_samping_kiri_filename = ImageManipulation::uploadFilePelanggaranToFolder($foto_samping_kiri, $data, "derek_foto_samping_kiri_");
            $data->foto_samping_kiri = $foto_samping_kiri_filename;
            $foto_belakang_filename = ImageManipulation::uploadFilePelanggaranToFolder($foto_belakang, $data, "derek_foto_belakang_");
            $data->foto_belakang = $foto_belakang_filename;

            $data->save(false);

            /*
            //Simpan Gambar (sementara diletakkan di folder)
            if(isset($_POST['foto_jauh1'])){
                $datapost = $_POST["foto_jauh1"];
                $repo = "uploads/pelanggaran/";
                if (preg_match('/^data:image\/(\w+);base64,/', $datapost, $type)) {
                    $datapost = substr($datapost, strpos($datapost, ',') + 1);
                    $type = strtolower($type[1]); // jpg, png, gif

                    if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
                        throw new \Exception('invalid image type');
                    }

                    $datapost = base64_decode($datapost);

                    if ($datapost === false) {
                        throw new \Exception('base64_decode failed');
                    }
                } else {
                    throw new \Exception('did not match data URI with image data');
                }
                if(file_exists($repo."imgresult.{$type}")){
                    unlink($repo."imgresult.{$type}");
                }
                $data->foto_jauh1 = $datapost;
                $data->save(false);
                //file_put_contents($repo."imgresult.{$type}", $data);
                //echo "PUT PIC BERHASIL. Cek di : ".$repo."imgresult.{$type}";
            }
            */


            $jsonFormat = [
                [
                    "status" => true,
                    "msg" => "Informasi pelanggaran yang anda kirimkan sudah tersimpan!",
                    "result" => $data->id_pelanggaran 
                ]
            ];
        }
        else{
            $jsonFormat = [
            [
                "status" => false,
                "msg" => "Mohon maaf terdapat kesalahan. Silakan cek kembali!",
                "result" => 0
            ]
        ];
        }

        return $jsonFormat;
    }

    public function actionUpdatePeringatan($id_pelanggaran){
        return $this->actionUpdatePelanggaran($id_pelanggaran);
    }

    public function actionUpdatePelanggaran($id_pelanggaran){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

        $this->actionCheckAccessRequest(yii::$app->request->headers);
        $params = Yii::$app->request->queryParams;

        $data = Pelanggaran::find()
        ->where(['id_pelanggaran'=>$id_pelanggaran])
        ->one();

        $no_polisi = isset($_POST['no_polisi']) ? $_POST['no_polisi'] : "";
        $id_jenis_kendaraan = isset($_POST['id_jenis_kendaraan']) ? $_POST['id_jenis_kendaraan'] : 1;
        $id_jenis_pelanggaran = isset($_POST['id_jenis_pelanggaran']) ? $_POST['id_jenis_pelanggaran'] : 0;
        $lat = isset($_POST['lat']) ? $_POST['lat'] : "";
        $long = isset($_POST['long']) ? $_POST['long'] : "";
        $long = isset($_POST['long']) ? $_POST['long'] : "";
        $catatan = isset($_POST['catatan']) ? $_POST['catatan'] : "";
        $gambar = isset($_POST['catatan']) ? $_POST['catatan'] : "";
        $foto_jauh1 = isset($_POST['foto_jauh1']) ? $_POST['foto_jauh1'] : "";
        $foto_depan = isset($_POST['foto_depan']) ? $_POST['foto_depan'] : "";
        $foto_samping_kanan = isset($_POST['foto_samping_kanan']) ? $_POST['foto_samping_kanan'] : "";
        $foto_samping_kiri = isset($_POST['foto_samping_kiri']) ? $_POST['foto_samping_kiri'] : "";
        $foto_belakang = isset($_POST['foto_belakang']) ? $_POST['foto_belakang'] : "";
        $reportby_user_id = isset($_POST['reportby_user_id']) ? $_POST['reportby_user_id'] : 0;
        $derek_id_kendaraan_derek = isset($_POST['derek_id_kendaraan_derek']) ? $_POST['derek_id_kendaraan_derek'] : 0;
        $derek_id_lokasi_inap_kendaraan = isset($_POST['derek_id_lokasi_inap_kendaraan']) ? $_POST['derek_id_lokasi_inap_kendaraan'] : 0;

        $myobj = new ResponMessage();


        if($data != null){
            if(isset($_POST['no_polisi'])) { $data->no_polisi = $no_polisi; }
            if(isset($_POST['id_jenis_kendaraan'])) { $data->id_jenis_kendaraan = $id_jenis_kendaraan; }
            if(isset($_POST['id_jenis_pelanggaran'])) { $data->id_jenis_pelanggaran = $id_jenis_pelanggaran; }
            if(isset($_POST['catatan'])) { $data->catatan_pelanggaran = $catatan; }
            if(isset($_POST['derek_id_kendaraan_derek'])) { $data->derek_id_kendaraan_derek = $derek_id_kendaraan_derek; }
            if(isset($_POST['derek_id_lokasi_inap_kendaraan'])) { $data->derek_id_lokasi_inap_kendaraan = $derek_id_lokasi_inap_kendaraan; }

            if($data->save(false)){
                if(isset($_POST['foto_jauh1']) && $foto_jauh1 != ""){
                    $foto_jauh1_filename = ImageManipulation::uploadFilePelanggaranToFolder($foto_jauh1, $data, "derek_foto1_");
                    $data->foto_jauh1 = $foto_jauh1_filename;
                }
                if(isset($_POST['foto_depan']) && $foto_depan != ""){
                    $foto_depan_filename = ImageManipulation::uploadFilePelanggaranToFolder($foto_depan, $data, "derek_foto_depan_");
                    $data->foto_depan = $foto_depan_filename;
                }
                if(isset($_POST['foto_samping_kanan']) && $foto_samping_kanan != ""){
                    $foto_samping_kanan_filename = ImageManipulation::uploadFilePelanggaranToFolder($foto_samping_kanan, $data, "derek_foto_samping_kanan_");
                    $data->foto_samping_kanan = $foto_samping_kanan_filename;
                }
                if(isset($_POST['foto_samping_kiri']) && $foto_samping_kiri != ""){
                    $foto_samping_kiri_filename = ImageManipulation::uploadFilePelanggaranToFolder($foto_samping_kiri, $data, "derek_foto_samping_kiri_");
                    $data->foto_samping_kiri = $foto_samping_kiri_filename;
                }
                if(isset($_POST['foto_belakang']) && $foto_belakang != ""){
                    $foto_belakang_filename = ImageManipulation::uploadFilePelanggaranToFolder($foto_belakang, $data, "derek_foto_belakang_");
                    $data->foto_belakang = $foto_belakang_filename;
                }

                $data->save(false);

                $myobj->status = 'ok';
                $myobj->items = $data->id_pelanggaran;
                $myobj->message = "Update data ".strtolower($data->status_penindakan)." telah berhasil!";
            }
            else{
                $jsonFormat = [
                    [
                        "status" => false,
                        "msg" => "Mohon maaf terdapat kesalahan. Silakan cek kembali!",
                        "result" => 0
                    ]
                ];

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


    public function actionPostLaporanMasyarakat(){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

        $this->actionCheckAccessRequest(yii::$app->request->headers);
        $params = Yii::$app->request->queryParams;


        $lat = isset($_POST['lat']) ? $_POST['lat'] : "";
        $long = isset($_POST['long']) ? $_POST['long'] : "";
        $nama_pelapor = isset($_POST['nama_pelapor']) ? $_POST['nama_pelapor'] : "";
        $nomor_telepon = isset($_POST['nomor_telepon']) ? $_POST['nomor_telepon'] : "";
        $lokasi_pelanggaran = isset($_POST['lokasi_pelanggaran']) ? $_POST['lokasi_pelanggaran'] : "";
        $keterangan_pelanggaran = isset($_POST['keterangan_pelanggaran']) ? $_POST['keterangan_pelanggaran'] : "";
        $foto1 = isset($_POST['foto1']) ? $_POST['foto1'] : "";

        $data = new LaporanMasyarakat();
        
        $data->tanggal_laporan_masyarakat = Timeanddate::getGMTPlus7Date(Timeanddate::getCurrentDateTime());
        $data->waktu_laporan_masyarakat = Timeanddate::getGMTPlus7Time(Timeanddate::getCurrentDateTime());
        $data->reportby_ip_address = IPAddressFunction::getUserIPAddress();
        $data->reportby_datetime = Timeanddate::getCurrentDateTime();
        $data->nama_pelapor = $nama_pelapor;
        $data->nomor_telepon = $nomor_telepon;
        $data->lokasi_pelanggaran = $lokasi_pelanggaran;
        $data->keterangan_pelanggaran = $keterangan_pelanggaran;
        $data->latitude = $lat;
        $data->longitude = $long;
        //$data->foto1 = $foto1;

        if($data->save(false)){
            $foto1_filename = ImageManipulation::uploadFileLaporanMasyrakatToFolder($foto1, $data, "lapmas_foto1_", $data->id_laporan_masyarakat);
            $data->foto1 = $foto1_filename;
            $data->save(false);

            $jsonFormat = [
                [
                    "status" => true,
                    "msg" => "Laporan pelanggaran yang anda kirimkan sudah tersimpan. Terima kasih atas partisipasi anda!",
                    "result" => $data->id_laporan_masyarakat,
                ]
            ];
        }
        else{
            $jsonFormat = [
            [
                "status" => false,
                "msg" => "Mohon maaf terdapat kesalahan. Silakan cek kembali!",

            ]
        ];
        }

        return $jsonFormat;
    }

    public function actionGetListLaporanMasyarakat(){
        //Difilter hanya hari ini saja yang muncul
        $pelanggarans = LaporanMasyarakat::find()
        ->where(['tanggal_laporan_masyarakat'=>Timeanddate::getGMTPlus7Date(Timeanddate::getCurrentDateTime())])
        ->orderBy(["waktu_laporan_masyarakat" => SORT_DESC])
        ->all();
        $rows = array();
        foreach($pelanggarans as $pelanggaran){
            $datas = array();
            $datas["id_laporan_masyarakat"] = $pelanggaran->id_laporan_masyarakat;
            $datas["tanggal_laporan_masyarakat"] = $pelanggaran->tanggal_laporan_masyarakat;
            $datas["waktu_laporan_masyarakat"] = $pelanggaran->waktu_laporan_masyarakat;
            $datas["nama_pelapor"] = $pelanggaran->nama_pelapor;
            $datas["nomor_telepon"] = $pelanggaran->nomor_telepon;
            $datas["lokasi_pelanggaran"] = $pelanggaran->lokasi_pelanggaran;
            $datas["keterangan_pelanggaran"] = $pelanggaran->keterangan_pelanggaran;
            $datas["latitude"] = $pelanggaran->latitude;
            $datas["longitude"] = $pelanggaran->longitude;
            //$datas["foto1"] = ImageManipulation::getImageURL($pelanggaran, "foto1");
            $datas["foto1"] = ImageManipulation::getImageURLGeneric($pelanggaran, "foto1", "laporan");

            $rows[] = $datas;
        }

        $myobj = new ResponMessage();
        $myobj->items = $rows;
        return json_encode($myobj);
    }

    public function actionCekPelanggaran($no_polisi){
        $pelanggarans = Pelanggaran::find()
        ->where(['no_polisi'=>$no_polisi, 'status_penindakan'=>'PENDEREKAN', 'byr_status_pembayaran' => 'BELUM'])
        ->orderBy(["waktu_pelanggaran" => SORT_DESC])
        ->all();
        $rows = array();
        $count=0;
        foreach($pelanggarans as $pelanggaran){
            $datas = array();
            $datas["tanggal_pelanggaran"] = $pelanggaran->tanggal_pelanggaran;
            $datas["waktu_pelanggaran"] = $pelanggaran->waktu_pelanggaran;
            $datas["no_polisi"] = $pelanggaran->no_polisi;
            //$datas["no_polisi"] = $pelanggaran->no_polisi;
            $datas["id_jenis_kendaraan"] = $pelanggaran->id_jenis_kendaraan;
            $datas["catatan_pelanggaran"] = $pelanggaran->catatan_pelanggaran;
            //$datas["no_polisi"] = $pelanggaran->no_polisi;
            $datas["status_penindakan"] = $pelanggaran->status_penindakan;
            $datas["foto_jauh1"] = ImageManipulation::getImageURL($pelanggaran, "foto_jauh1");
            $datas["foto_depan"] = ImageManipulation::getImageURL($pelanggaran, "foto_depan");
            $datas["foto_samping_kanan"] = ImageManipulation::getImageURL($pelanggaran, "foto_samping_kanan");
            $datas["foto_samping_kiri"] = ImageManipulation::getImageURL($pelanggaran, "foto_samping_kiri");
            $datas["foto_belakang"] = ImageManipulation::getImageURL($pelanggaran, "foto_belakang");
            if(isset($pelanggaran->kendaraanDerek)){
                $datas["kendaraan_derek"] = $pelanggaran->kendaraanDerek->no_polisi;
            }else{
                $datas["kendaraan_derek"] = "-- [".$pelanggaran->derek_id_kendaraan_derek."]";
            }

            if(isset($pelanggaran->lokasiInap)){
                $datas["lokasi_inap"] = $pelanggaran->lokasiInap->nama_lokasi;
            }else{
                $datas["lokasi_inap"] = "-- [".$pelanggaran->derek_id_lokasi_inap_kendaraan."]";
            }

            if(isset($pelanggaran->jenisKendaraan)){
                $datas["jenis_kendaraan"] = $pelanggaran->jenisKendaraan->jenis_kendaraan;
            }else{
                $datas["jenis_kendaraan"] = "--";
            }
            //$datas["no_polisi"] = $pelanggaran->no_polisi;
            //$datas["no_polisi"] = $pelanggaran->no_polisi;

            //Informasi Biaya Pelanggaran dan Pengambilan
            $BiayaRetribusi = BiayaRetribusi::find()
            ->where(['id_jenis_kendaraan'=>$pelanggaran->id_jenis_kendaraan])
            ->one();
            $informarsiBiayaRetribusi = "-- (tidak ada informasi biaya retribusi untuk jenis kendaraan ini ".$pelanggaran->id_jenis_kendaraan.")";
            if($informarsiBiayaRetribusi != null){
                $jk = "";
                //if(isset($BiayaRetribusi->jenisKendaraan)){
                    $jk = "(".$BiayaRetribusi->jenisKendaraan->jenis_kendaraan.")"; 
                //}
                $informarsiBiayaRetribusi = "Biaya retribusi untuk pelenggaran dengan jenis kendaraan ini ".$jk." adalah biaya pemindahan sebesar Rp ".number_format($BiayaRetribusi->biaya_pemindahan, 0, ',', '.')." untuk 1x pemindahan serta biaya inap sebesar Rp ".number_format($BiayaRetribusi->biaya_inap, 0, ',', '.')." per hari";
            }
            $datas["biaya_retribusi"] = $informarsiBiayaRetribusi;
            $address = AppSettingSearch::getValueByKey("ADDRESS");
            $datas["alamat_pengurusan"] = "Kendaraan dapat diurus di ".$address;

            $rows[] = $datas;
            $count++;
            break;
        }

        $myobj = new ResponMessage();
        if($count>0){
            $myobj->items = $datas;
        }else{
             $myobj->status = "not found";
            $myobj->message = "Tidak ada informasi pelanggaran terkait dengan nomor polisi tersebut!";  
        }
        return json_encode($myobj, JSON_UNESCAPED_SLASHES);
    }

    public function actionGetListPelanggaran(){
        $pelanggarans = Pelanggaran::find()
        ->where(['status_penindakan'=>'PENDEREKAN'])
        ->all();
        $rows = array();
        foreach($pelanggarans as $pelanggaran){
            $datas = array();
            $datas["tanggal_pelanggaran"] = $pelanggaran->tanggal_pelanggaran;
            $datas["waktu_pelanggaran"] = $pelanggaran->waktu_pelanggaran;
            $datas["no_polisi"] = $pelanggaran->no_polisi;
            $datas["no_polisi"] = $pelanggaran->no_polisi;
            $datas["id_jenis_kendaraan"] = $pelanggaran->id_jenis_kendaraan;
            $datas["catatan_pelanggaran"] = $pelanggaran->catatan_pelanggaran;
            $datas["no_polisi"] = $pelanggaran->no_polisi;

            //$datas["no_polisi"] = $pelanggaran->no_polisi;
            //$datas["no_polisi"] = $pelanggaran->no_polisi;

            $rows[] = $datas;
        }

        $myobj = new ResponMessage();
        $myobj->items = $rows;
        return json_encode($myobj);
    }

    public function actionGetDashboardCountByPetugas($id_petugas){

        $id_petugas = isset($_GET['id_petugas']) ? $_GET['id_petugas'] : 0;
        $id_petugas = $id_petugas*1;

        if($id_petugas > 0){
            $derek_total = Pelanggaran::find()
            ->where(['status_penindakan'=>'PENDEREKAN', 
                'reportby_user_id'=>$id_petugas,
                'tanggal_pelanggaran'=>Timeanddate::getGMTPlus7Date(Timeanddate::getCurrentDateTime())
                ])
            //->orderBy(["waktu_pelanggaran" => SORT_DESC])
            ->count();

            $peringatan_total = Pelanggaran::find()
            ->where(['status_penindakan'=>'PERINGATAN', 
                'reportby_user_id'=>$id_petugas,
                'tanggal_pelanggaran'=>Timeanddate::getGMTPlus7Date(Timeanddate::getCurrentDateTime())
                ])
            //->orderBy(["waktu_pelanggaran" => SORT_DESC])
            ->count();

            $laporan_masyarakat_total = LaporanMasyarakat::find()
            ->where([
                'tanggal_laporan_masyarakat'=>Timeanddate::getGMTPlus7Date(Timeanddate::getCurrentDateTime())
            ])
            //->orderBy(["waktu_laporan_masyarakat" => SORT_DESC])
            ->count();
            
            $datas = array();
            $datas["derek_total"] = $derek_total;
            $datas["peringatan_total"] = $peringatan_total;
            $datas["laporan_masyarakat_total"] = $laporan_masyarakat_total;

            $myobj = new ResponMessage();
            $myobj->items = $datas;
        }else{
            $myobj = new ResponMessage();
            $myobj->status = "error";
            $myobj->message = "Petugas tidak diketahui.";    
        }
        
        return json_encode($myobj, JSON_UNESCAPED_SLASHES);
    }

    public function actionGetListPelanggaranByPetugas($id_petugas){

        $id_petugas = isset($_GET['id_petugas']) ? $_GET['id_petugas'] : 0;
        $id_petugas = $id_petugas*1;

        if($id_petugas > 0){
            $pelanggarans = Pelanggaran::find()
            ->where(['status_penindakan'=>'PENDEREKAN', 'reportby_user_id'=>$id_petugas])
            ->orderBy(["waktu_pelanggaran" => SORT_DESC])
            ->all();
            $rows = array();
            foreach($pelanggarans as $pelanggaran){
                $datas = array();
                $datas["id_pelanggaran"] = $pelanggaran->id_pelanggaran;
                $datas["tanggal_pelanggaran"] = $pelanggaran->tanggal_pelanggaran;
                $datas["waktu_pelanggaran"] = $pelanggaran->waktu_pelanggaran;
                $datas["no_polisi"] = $pelanggaran->no_polisi;
                $datas["no_polisi"] = $pelanggaran->no_polisi;
                $datas["id_jenis_kendaraan"] = $pelanggaran->id_jenis_kendaraan;
                $datas["id_jenis_pelanggaran"] = $pelanggaran->id_jenis_pelanggaran;
                $datas["catatan_pelanggaran"] = $pelanggaran->catatan_pelanggaran;
                $datas["no_polisi"] = $pelanggaran->no_polisi;
                $datas["foto_jauh1"] = ImageManipulation::getImageURL($pelanggaran, "foto_jauh1");
                $datas["foto_depan"] = ImageManipulation::getImageURL($pelanggaran, "foto_depan");
                $datas["foto_samping_kanan"] = ImageManipulation::getImageURL($pelanggaran, "foto_samping_kanan");
                $datas["foto_samping_kiri"] = ImageManipulation::getImageURL($pelanggaran, "foto_samping_kiri");
                $datas["foto_belakang"] = ImageManipulation::getImageURL($pelanggaran, "foto_belakang");
                if(isset($pelanggaran->kendaraanDerek)){
                    $datas["kendaraan_derek"] = $pelanggaran->kendaraanDerek->no_polisi;
                }else{
                    $datas["kendaraan_derek"] = "-- [".$pelanggaran->derek_id_kendaraan_derek."]";
                }

                if(isset($pelanggaran->jenisPelanggaran)){
                    $datas["jenis_pelanggaran"] = $pelanggaran->jenisPelanggaran->jenis_pelanggaran;
                }else{
                    $datas["jenis_pelanggaran"] = "-- [".$pelanggaran->id_jenis_pelanggaran."]";
                }

                if(isset($pelanggaran->lokasiInap)){
                    $datas["lokasi_inap"] = $pelanggaran->lokasiInap->nama_lokasi;
                }else{
                    $datas["lokasi_inap"] = "-- [".$pelanggaran->derek_id_lokasi_inap_kendaraan."]";
                }

                if(isset($pelanggaran->jenisKendaraan)){
                    $datas["jenis_kendaraan"] = $pelanggaran->jenisKendaraan->jenis_kendaraan;
                }else{
                    $datas["jenis_kendaraan"] = "--";
                }

                //$datas["no_polisi"] = $pelanggaran->no_polisi;
                //$datas["no_polisi"] = $pelanggaran->no_polisi;

                $rows[] = $datas;
            }

            $myobj = new ResponMessage();
            $myobj->items = $rows;
        }else{
            $myobj = new ResponMessage();
            $myobj->status = "error";
            $myobj->message = "Petugas tidak diketahui.";    
        }
        
        return json_encode($myobj, JSON_UNESCAPED_SLASHES);
    }

    public function actionGetPelanggaranById($id){

        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $id = $id*1;

        if($id > 0){
            $pelanggarans = Pelanggaran::find()
            ->where(['id_pelanggaran'=>$id])
            //->orderBy(["waktu_pelanggaran" => SORT_DESC])
            ->all();
            $rows = array();
            foreach($pelanggarans as $pelanggaran){
                $datas = array();
                $datas["tanggal_pelanggaran"] = $pelanggaran->tanggal_pelanggaran;
                $datas["waktu_pelanggaran"] = $pelanggaran->waktu_pelanggaran;
                $datas["no_polisi"] = $pelanggaran->no_polisi;
                $datas["no_polisi"] = $pelanggaran->no_polisi;
                $datas["id_jenis_kendaraan"] = $pelanggaran->id_jenis_kendaraan;
                $datas["catatan_pelanggaran"] = $pelanggaran->catatan_pelanggaran;
                $datas["no_polisi"] = $pelanggaran->no_polisi;
                $datas["status_penindakan"] = $pelanggaran->status_penindakan;
                $datas["foto_jauh1"] = ImageManipulation::getImageURL($pelanggaran, "foto_jauh1");
                $datas["foto_depan"] = ImageManipulation::getImageURL($pelanggaran, "foto_depan");
                $datas["foto_samping_kanan"] = ImageManipulation::getImageURL($pelanggaran, "foto_samping_kanan");
                $datas["foto_samping_kiri"] = ImageManipulation::getImageURL($pelanggaran, "foto_samping_kiri");
                $datas["foto_belakang"] = ImageManipulation::getImageURL($pelanggaran, "foto_belakang");

                //$datas["no_polisi"] = $pelanggaran->no_polisi;
                //$datas["no_polisi"] = $pelanggaran->no_polisi;

                $rows[] = $datas;
            }

            $myobj = new ResponMessage();
            $myobj->items = $rows;
        }else{
            $myobj = new ResponMessage();
            $myobj->status = "error";
            $myobj->message = "Data tidak diketahui.";    
        }
        
        return json_encode($myobj, JSON_UNESCAPED_SLASHES);
    }

    public function actionGetListPeringatan(){
        $pelanggarans = Pelanggaran::find()
        ->where(['status_penindakan'=>'PERINGATAN'])
        ->all();
        $rows = array();
        foreach($pelanggarans as $pelanggaran){
            $datas = array();
            $datas["tanggal_pelanggaran"] = $pelanggaran->tanggal_pelanggaran;

            $datas["waktu_pelanggaran"] = $pelanggaran->waktu_pelanggaran;
            $datas["no_polisi"] = $pelanggaran->no_polisi;
            $datas["no_polisi"] = $pelanggaran->no_polisi;
            $datas["id_jenis_kendaraan"] = $pelanggaran->id_jenis_kendaraan;
            $datas["catatan_pelanggaran"] = $pelanggaran->catatan_pelanggaran;
            $datas["no_polisi"] = $pelanggaran->no_polisi;
            //$datas["no_polisi"] = $pelanggaran->no_polisi;
            //$datas["no_polisi"] = $pelanggaran->no_polisi;

            $rows[] = $datas;
        }

        $myobj = new ResponMessage();
        $myobj->items = $rows;
        return json_encode($myobj);
    }


    public function actionGetListPeringatanByPetugas($id_petugas){

        $id_petugas = isset($_GET['id_petugas']) ? $_GET['id_petugas'] : 0;
        $id_petugas = $id_petugas*1;

        if($id_petugas > 0){
            $pelanggarans = Pelanggaran::find()
            ->where(['status_penindakan'=>'PERINGATAN', 'reportby_user_id'=>$id_petugas])
            ->orderBy(["waktu_pelanggaran" => SORT_DESC])
            ->all();
            $rows = array();
            foreach($pelanggarans as $pelanggaran){
                $datas = array();
                $datas["id_pelanggaran"] = $pelanggaran->id_pelanggaran;
                $datas["tanggal_pelanggaran"] = $pelanggaran->tanggal_pelanggaran;
                $datas["waktu_pelanggaran"] = $pelanggaran->waktu_pelanggaran;
                $datas["no_polisi"] = $pelanggaran->no_polisi;
                $datas["no_polisi"] = $pelanggaran->no_polisi;
                $datas["id_jenis_kendaraan"] = $pelanggaran->id_jenis_kendaraan;
                $datas["id_jenis_pelanggaran"] = $pelanggaran->id_jenis_pelanggaran;
                $datas["catatan_pelanggaran"] = $pelanggaran->catatan_pelanggaran;
                $datas["no_polisi"] = $pelanggaran->no_polisi;
                $datas["foto_jauh1"] = ImageManipulation::getImageURL($pelanggaran, "foto_jauh1");
                //$datas["no_polisi"] = $pelanggaran->no_polisi;
                //$datas["no_polisi"] = $pelanggaran->no_polisi;

                if(isset($pelanggaran->jenisPelanggaran)){
                    $datas["jenis_pelanggaran"] = $pelanggaran->jenisPelanggaran->jenis_pelanggaran;
                }else{
                    $datas["jenis_pelanggaran"] = "-- [".$pelanggaran->id_jenis_pelanggaran."]";
                }

                $rows[] = $datas;
            }

            $myobj = new ResponMessage();
            $myobj->items = $rows;
        }else{
            $myobj = new ResponMessage();
            $myobj->status = "error";
            $myobj->message = "Petugas tidak diketahui.";    
        }
        
        return json_encode($myobj, JSON_UNESCAPED_SLASHES);
    }

    public function actionGetValueFromKodepos(){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

        $this->actionCheckAccessRequest(yii::$app->request->headers);
        $params = Yii::$app->request->queryParams;

        $today = date("Y-m-d");

        /*
        $end = DeviceLog::find()
        ->select(['log_date', 'last_value15', 'last_value16'])
        ->andFilterwhere(['like', 'log_date', $today])
        ->andFilterWhere(['id_device' => 5])
        ->orderBy(["id_device_log" => SORT_DESC])
        ->limit(1)
        ->all();
        */

        $kodepos = isset($_POST['kodepos']) ? $_POST['kodepos'] : "0";

        $kodeposnum = $kodepos*1;

        if($kodeposnum > 9999 && $kodeposnum <= 99999){

            /*
            $jsonFormat = [
                [
                    "status" => true,                
                    "kodepos" => $kodepos,
                    "STATUS" => "WASPADA",
                    "display_detail_ukuran" => false,
                    "curah_hujan" => rand(100,1000),
                    "diameter" => rand(1,10),
                    "jumlah_butir" => rand(50,100),
                ]
            ];
            */


            $a=array(0=>"AMAN",1=>"SIAGA",2=>"WASPADA",3=>"BAHAYA");
            $status=rand(0,3);

            $labeldaerah=array("UNMONITORED", "LOKASI A", "LOKASI B", "LOKASI C");
            $namadaerah=$labeldaerah[rand(0,3)];

            if($namadaerah != "UNMONITORED"){
                $jsonFormat = [
                    [
                        "status" => true,                
                        "kodepos" => $kodepos,
                        "display_detail_ukuran" => false,
                        "location" => $namadaerah,
                        "STATUS" => $a[$status], 
                        'level_status' => $status,
                        "curah_hujan" => rand(100,1000),
                        "diameter" => rand(1,10),
                        "jumlah_butir" => rand(50,100),
                    ]
                ];
            }else{
                $jsonFormat = [
                    [
                        "status" => true,                
                        "kodepos" => $kodepos,
                        "location" => "UNMONITORED",
                        "display_detail_ukuran" => false,
                        "STATUS" => "", 
                        'level_status' => 0,
                        "curah_hujan" => 0,
                        "diameter" => 0,
                        "jumlah_butir" => 0,
                    ]
                ];
            }
        }else{
            $jsonFormat = [
                [
                    "status" => false,                
                    "kodepos" => $kodepos,
                    "display_detail_ukuran" => false,
                    "msg" => "Kode Pos tidak dikenali",
                    "STATUS" => "-",
                    "curah_hujan" => 0,
                    "diameter" => 0,
                    "jumlah_butir" => 0,
                ]
            ];
        }

        return $jsonFormat;

        if($end!=null){
            return $end;
        }
        else{
            return $jsonFormat;
        }
    }

    public function actionGetAboutApp(){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

        $this->actionCheckAccessRequest(yii::$app->request->headers);
        $params = Yii::$app->request->queryParams;

        $app_about = AppSettingSearch::getValueByKey("ABOUT-APP");
        $app_name_singkat = AppSettingSearch::getValueByKey("APP-NAME-SINGKAT");
        $app_version = AppSettingSearch::getValueByKey("APP-VERSION");
        $app_release_date = AppSettingSearch::getValueByKey("APP-RELEASE-DATE");
        $app_contact = AppSettingSearch::getValueByKey("APP-CONTACT");
        $wa = AppSettingSearch::getValueByKey("WA-1");
        $ig = AppSettingSearch::getValueByKey("IG");
        $website = AppSettingSearch::getValueByKey("WEBSITE");
        $email = AppSettingSearch::getValueByKey("EMAIL");

        $datas = 
            [
                "app_name" => $app_name_singkat,
                "version" => $app_version,
                "release_date" => $app_release_date,
                "description" => $app_about,
                "contact" => $app_contact ,
                "wa" => $wa ,
                "ig" => $ig ,
                "website" => $website ,
                "email" => $email ,
            ]
        ;

        $myobj = new ResponMessage();
        $myobj->items = $datas;

        return $myobj;


    }

    public function actionGetPelanggaranField(){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

        $this->actionCheckAccessRequest(yii::$app->request->headers);
        $params = Yii::$app->request->queryParams;

        $records = AppFieldConfig::find()
        ->where(['classname'=>'pelanggaran'])
        ->all();
        $rows = array();
        foreach($records as $record){
            $datas = array();
            $datas["group"] = $record->varian_group;
            $datas["fieldname"] = $record->fieldname;
            $datas["label"] = $record->label;
            $datas["is_required"] = $record->is_required;

            $rows[] = $datas;
        }

        $myobj = new ResponMessage();
        $myobj->items = $rows;

        return $myobj;
        //return json_encode($myobj, JSON_UNESCAPED_SLASHES);
    }

    public function actionCreateSensor()
    {
        \Yii::$app->getResponse()->format= \yii\web\Response::FORMAT_JSON;
//        return array('status'=> true);
        $assetitem = new Sensor();

        $assetitem->scenario=Sensor::SCENARIO_CREATE;
        $assetitem->attributes = \Yii::$app->request->post();

        if ($assetitem->validate()){
            $assetitem->save();
            return array('status' => true, 'data'=>'Sensor Created successfully');
        }else {
            return array('status' => false,'data' => $assetitem->getErrors());
        }


    }

    public function actionListSensor()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $assetItemList = Sensor::find()->all();
        if (count($assetItemList) > 0){
            return array('status'=> true,'data'=> $assetItemList);
        }else{
            return array('status'=> false, 'data'=> 'No AssetItem Found.');
        }
    }

    public function actionGetData(){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        return array('info' => 'Test GEt Data');
    }
	
	public function actionSetValue(){
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

		$postData = \yii::$app->request->post();
		if(isset($postData['im'])){
			$imei = $postData['im'];
		}else{
			$imei = "==";
		}
		
		if(isset($postData['c'])){
			$cid = $postData['c'];
		}else{
			$cid = "==";
		}

		$sa = Sensor::find()
			->where(['imei' => $imei, 'cid'=>$cid])
			->one();
		if($sa != null){
			$x=10;
			for($i=1;$i<=$x;$i++){
				if(isset($postData['A'.$i])){
					$field  = "sensor_analog".$i;
					
					$val = $postData['A'.$i];
					$sa->$field= $val;
				}
			}
			
			$sa->save(false);
			return array('status'=>true,
				'name' => $sa->sensor_name, 

			);
		}else{
			return array('status' => false, 'name' => 'Unknown device');
		}
	}

}
