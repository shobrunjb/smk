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
class SalesInvoiceController extends Controller
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

    public function actionGenerateInvoice($i, $mode="")
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $searchModel = new MaterialSalesSearch();
        $searchModel->sales_id_sales_order = $id;
        $dataProvider = $searchModel->searchGroupByLevel1(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;
        
        $dataProvider->sort->defaultOrder = ['sales_created_date' => SORT_DESC];
        
        $models = $dataProvider->getModels();
        $total = 0;
        foreach ($models as $model) {
            $total += $model->sales_harga_jual*$model->yard;
        }

        //return $this->render('/sales-invoice/invoice/generate-invoice', [
        //Versi 2 - Revisi Tampilan kedua
        return $this->renderPartial('/sales-invoice/invoice/generate-invoice_ver3', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'i' =>$i,
            'model' => $this->findModel($id),
            'total' => $total,
            'mode' =>$mode
        ]);
    }

    /**
     * Lists all SalesOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SalesOrderSearch();
        $searchModel->id_outlet_penjualan = \backend\models\User::getOutletPenjualan()->id_outlet_penjualan;
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
    public function actionView($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $searchModel = new MaterialSalesSearch();
        $searchModel->sales_id_sales_order = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;
        //$pagination = 10;

        //$dataProvider->sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        $dataProvider->sort->defaultOrder = ['sales_created_date' => SORT_DESC];

        $models = $dataProvider->getModels();
        $total = 0;
        foreach ($models as $model) {
            $total += $model->sales_harga_jual*$model->yard;
        }

        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'i' =>$i,
            'model' => $this->findModel($id),
            'total' => $total,
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
        $models = $dataProvider->getModels();
        $total = 0;
        foreach ($models as $model) {
            $total += $model->sales_harga_jual*$model->yard;
        }

        if(isset($_POST['invoice'])){
            //Cek dulu untuk harga..apakah masih ada yang kosong?
            $foundZero = false;
            foreach ($models as $model) {
                if($model->sales_harga_jual <= 0){
                    $foundZero = true;
                    break;
                }
            }

            if($foundZero){
                Yii::$app->session->setFlash('danger', 'Invoice belum dapat tercreate karena masih ada harga jual yang masih kosong atau bernilai zero! <br>
                    Silakan isi dan lengkapi terlebih dahulu!'); 
            }else{
                $modelSales = $this->findModel($id);
                //Ubah status invoice jadi INVOICE
                $modelSales->status_invoice = 'INVOICE';
                $modelSales->invoice_total = $total;
                $modelSales->save(false);
                return $this->redirect(['view', 'i' => $i]);
            }
           
        }

        return $this->render('update-invoice', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'model' => $this->findModel($id),
            'i' =>$i,
            'total' => $total
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
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_sales_order]);
        }

        return $this->render('update', [
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

    public function actionPostHargaJual(){

        if(isset($_POST['msg'])){
            //echo $_POST['msg'];
            //echo "data sudah diterima";
            $id_sales_order = 0;
            $i = "";
            if(isset($_POST['iso'])){
                $id_sales_order = $_POST['iso']*1;
            }
             if(isset($_POST['i'])){
                $i = $_POST['i'];
            }
            $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);
            $value = $_POST['msg'];
            //echo $value.'<-->'

            $materialsales = \backend\models\MaterialSales::find()->where([
                    'id_material_sales' => $id,
                ])
                ->one();
            if($materialsales != null){
                $materialsales->sales_harga_jual = $value;
                $materialsales->save(false);
                $total = $materialsales->sales_harga_jual*$materialsales->yard;
                $totalRp = number_format($total, 0, ',', '.');
                echo $totalRp;

                //Get Total 
                $searchModel = new MaterialSalesSearch();
                $searchModel->sales_id_sales_order = $materialsales->sales_id_sales_order;
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->pagination = false;
                $models = $dataProvider->getModels();
                $total = 0;
                foreach ($models as $model) {
                    $total += $model->sales_harga_jual*$model->yard;
                }
                echo "#".\common\helpers\ContentStringManipulator::formatRp($total);
            }else{
                echo 'X-X';
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
