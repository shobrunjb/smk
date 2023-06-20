<?php

namespace backend\controllers;

use Yii;
use backend\models\SalesOrder;
use backend\models\MaterialSales;
use backend\models\MaterialSalesSearch;
use backend\models\SalesOrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SalesOrderController implements the CRUD actions for SalesOrder model.
 */
class SalesSuratJalanController extends Controller
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
     * Lists all SalesOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SalesOrderSearch();
        $searchModel->id_outlet_penjualan = \backend\models\User::getOutletPenjualan()->id_outlet_penjualan;
        $searchModel->status_invoice = 'INVOICE';
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SalesOrder model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionSuratJalan($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $searchModel = new MaterialSalesSearch();
        $searchModel->sales_id_sales_order = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;
        //$pagination = 10;

        //$dataProvider->sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        $dataProvider->sort->defaultOrder = ['sales_created_date' => SORT_DESC];

        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCetakSuratJalan($ip){
        //$id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $modelParent = $this->findModel($ip);
        $searchModel = new MaterialSalesSearch();
        $searchModel->sales_id_sales_order = $ip;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;


        //return $this->renderPartial('cetak-surat-jalan/cetak-surat-jalan', [
         return $this->renderPartial('cetak-surat-jalan/cetak-surat-jalan_ver3', [
            'modelParent' => $modelParent,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdateInvoice($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $searchModel = new MaterialSalesSearch();
        $searchModel->sales_id_sales_order = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;
        //$pagination = 10;

        //$dataProvider->sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        $dataProvider->sort->defaultOrder = ['sales_created_date' => SORT_DESC];

        return $this->render('update-invoice', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SalesOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SalesOrder();
        
        //Diberikan default value tanggal hari ini
        $model->tanggal_order = \common\helpers\Timeanddate::getCurrentDate();

        if ($model->load(Yii::$app->request->post())) {
            $model->month = \common\helpers\Timeanddate::getMonthOnly($model->tanggal_order);
            $model->year = \common\helpers\Timeanddate::getYearOnly($model->tanggal_order);
            $model->id_outlet_penjualan = \backend\models\User::getOutletPenjualan()->id_outlet_penjualan;
            $model->generateNomorSalesOrder();
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id_sales_order]);
            }
        }

        return $this->render('create_sales_order', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SalesOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdatePembayaran($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_sales_order]);
        }

        return $this->render('update-pembayaran', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SalesOrder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SalesOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SalesOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SalesOrder::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelItem($id)
    {
        if (($model = MaterialSales::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionTest()
    {
        echo 'test'; exit();
    }

    public function actionPostMessageSession(){

        if(isset($_POST['msg'])){
            //echo $_POST['msg'];
            //echo "data sudah diterima";
            $id_sales_order = 0;
            if(isset($_POST['iso'])){
                $id_sales_order = $_POST['iso']*1;
            }
            echo '<br>';

            if($id_sales_order <= 0){
                echo '<div class="alert alert-danger">Tidak ada sales order yang digunakan</div>';
                exit();
            }

            $barcode = strip_tags($_POST['msg']);
            if($barcode == ""){
                echo '<div class="alert alert-danger">Silakan isi barcode terlebih dahulu</div>';
                exit();
            }

            $materialfinish = \backend\models\MaterialFinish::find()->where([
                    'barcode_kode' => $barcode,
                ])
                ->one();
            if($materialfinish != null){
                $this->saveProductOrder($materialfinish, $id_sales_order);
                echo '<div class="alert alert-info">Data berhasil ditambahkan.</div>';
            }else{
                echo '<div class="alert alert-danger">Kode Barcode <b>['.$barcode.']</b> tidak dikenali/belum terdaftar.</div>';
            }

            exit();

            /*
            $is = isset($_POST['is']) ? $_POST['is'] : "";
            $id_session = EncryptionUtil::staticEncryptor('decrypt',$is);

            $ipe = isset($_POST['ipe']) ? $_POST['ipe'] : "";
            $id_pegawai = EncryptionUtil::staticEncryptor('decrypt',$ipe);
            //echo $id_session." ".$id_pegawai;

            exit();
            */
        }

    }

    private function saveProductOrder($materialfinish, $id_sales_order){

        //Simpan ke Material Sales
        //1. Untuk tahap awal (sbelum dipindahkan maka data di material_finish masih ada /belum dihapus)
        //2. Nanti ketika sudah digenerate invoice/tagihan maka baru dipindahkan data di material_finish akan dihapus untuk menunjukkan bahwa stok sudah berkurang
        $materialsales = \backend\models\MaterialSales::find()->where([
                'id_material_finish' => $materialfinish->id_material_finish,
                'sales_id_sales_order' => $id_sales_order,
            ])
            ->one();
        if($materialsales == null){
            $materialsales = new \backend\models\MaterialSales();
        }else{
            //echo $materialfinish->id_material_finish;
            echo '<div class="alert alert-warning">Data produk ini sudah masuk ke data.</div>';
            exit();
        }
        $materialsales->sales_id_sales_order = $id_sales_order;

        //Pindahkan atau copy data-data dari material_finish ke material sales
        $materialsales->id_material_finish = $materialfinish->id_material_finish;
        $materialsales->id_material = $materialfinish->id_material;
        $materialsales->id_material_kategori1 = $materialfinish->id_material_kategori1;
        $materialsales->id_material_kategori2 = $materialfinish->id_material_kategori2;
        $materialsales->id_material_kategori3 = $materialfinish->id_material_kategori3;
        $materialsales->yard = $materialfinish->yard;
        $materialsales->kode = $materialfinish->kode;
        $materialsales->year = $materialfinish->year;
        $materialsales->no_urut = $materialfinish->no_urut;
        $materialsales->no_urut_kode = $materialfinish->no_urut_kode;
        $materialsales->no_splitting = $materialfinish->no_splitting;
        $materialsales->barcode_kode = $materialfinish->barcode_kode;
        $materialsales->deskripsi = $materialfinish->deskripsi;
        $materialsales->is_packing = $materialfinish->is_packing;
        $materialsales->id_basic_packing = $materialfinish->id_basic_packing;
        $materialsales->id_material_in_item_proc = $materialfinish->id_material_in_item_proc;
        $materialsales->id_material_in = $materialfinish->id_material_in;
        $materialsales->is_join_packing = $materialfinish->is_join_packing;
        $materialsales->join_info = $materialfinish->join_info;
        $materialsales->id_gudang = $materialfinish->id_gudang;
        $materialsales->created_id_user = $materialfinish->created_id_user;
        $materialsales->created_date = $materialfinish->created_date;
        $materialsales->created_ip_address = $materialfinish->created_ip_address;

        //Log Created
        $materialsales->sales_created_id_user = Yii::$app->user->identity->id;
        $materialsales->sales_created_ip_address = \common\helpers\IPAddressFunction::getUserIPAddress();
        $materialsales->sales_created_date = \common\helpers\Timeanddate::getCurrentDateTime();

        $materialsales->save(false);
    }

    public function actionDeleteItem($id_item, $id_parent)
    {
        //$model = $this->findModelItem($id_item);       

        $this->findModelItem($id_item)->delete();

        return $this->redirect(['view', 'id' => $id_parent]);
    }
}
