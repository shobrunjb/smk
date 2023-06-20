<?php

namespace backend\controllers;

use Yii;
use backend\models\MutasiStock;
use backend\models\MutasiStockSearch;
use backend\models\MutasiStockItem;
use backend\models\MutasiStockItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MutasiStockController implements the CRUD actions for MutasiStock model.
 */
class MutasiStockController extends Controller
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
     * Lists all MutasiStock models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MutasiStockSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MutasiStock model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $opt="bc")
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'opt' => $opt,
        ]);
    }

    public function actionCetakSuratJalan($ip){
        $modelParent = $this->findModel($ip);

        $searchModel = new MutasiStockItemSearch();
        $searchModel->id_mutasi_stock = $modelParent->id_mutasi_stock;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;

        return $this->renderPartial('cetak-surat-jalan/cetak-surat-jalan_ver3', [
            'modelParent' => $modelParent,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new MutasiStock model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MutasiStock();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_mutasi_stock]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MutasiStock model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_mutasi_stock]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MutasiStock model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionCreateItem($ip)
    {
        $model = new MutasiStockItem();
        $modelParent = $this->findModel($ip);
        $model->id_mutasi_stock = $ip;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $ip]);
        }

        $request = Yii::$app->request;
        if ($request->isAjax) {
            return $this->renderAjax('/mutasi-stock/item/create', [
                'model' => $model,
                'modelParent' => $modelParent,
            ]);
        } else {
            return $this->render('/mutasi-stock/item/create', [
                'model' => $model,
                'modelParent' => $modelParent,
            ]);
        }
    }

    public function actionDeleteItem($id_item, $id_parent)
    {
        $modelParent = $this->findModel($id_parent);
        $model = $this->findModelItem($id_item);
        
        $materialfinish = \backend\models\MaterialFinish::find()->where(['id_material_finish' => $model->id_material_finish])->one();

        $materialfinish->id_gudang = $modelParent->id_gudang_asal;
        $materialfinish->save(false);
        
        $model->delete();

        return $this->redirect(['view', 'id' => $id_parent]);
    }

    /**
     * Finds the MutasiStock model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return MutasiStock the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MutasiStock::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelItem($id)
    {
        if (($model = MutasiStockItem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPostMessageOri(){

        if(isset($_POST['msg'])){
            //echo $_POST['msg'];
            //echo "data sudah diterima";
            $id_mutasi_stock = 0;
            if(isset($_POST['iso'])){
                $id_mutasi_stock = $_POST['iso']*1;
            }
            echo '<br>';

            if($id_mutasi_stock <= 0){
                echo '<div class="alert alert-danger">Tidak ada mutasi stock yang digunakan</div>';
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
                //$model = new MutasiStockItem();
                $desc = $materialfinish->getDetailBarang();
                $model = \backend\models\MutasiStockItem::find()->where([
                    'id_mutasi_stock' => $id_mutasi_stock,
                    'id_material_finish' => $materialfinish->id_material_finish
                ])
                ->one();
                if($model != null){
                    echo '<div class="alert alert-warning">Data produk ini <b>['.$desc.']</b> sudah masuk ke dalam list.</div>';
                }else{
                    $model = new MutasiStockItem();
                    $modelParent = $this->findModel($id_mutasi_stock);
                    $model->id_mutasi_stock = $id_mutasi_stock;
                    $model->id_material_finish = $materialfinish->id_material_finish;
                    $model->keterangan = "";
                    $model->save();

                    $desc = $materialfinish->getDetailBarang();
                    $materialfinish->id_gudang = $modelParent->id_gudang_tujuan;
                    $materialfinish->save(false);

                    echo '<div class="alert alert-info">Data <b>['.$desc.']</b> berhasil ditambahkan.</div>';
                }
                // if ($model->load(Yii::$app->request->post()) && $model->save()) {
                //     return $this->redirect(['view', 'id' => $id_mutasi_stock]);
                // }
                
                
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

    public function actionPostMessage(){
        //Untuk debuging lokal
        //Contoh : http://localhost/minierp/administrator/sales-order/post-message-session?msg=2003000000009&iso=48
        //$_POST['msg'] = $_GET['msg'];
        //$_POST['iso'] = $_GET['iso'];

        if(isset($_POST['msg'])){
            //echo $_POST['msg'];
            //echo "data sudah diterima";
            $id_mutasi_stock = 0;
            if(isset($_POST['iso'])){
                $id_mutasi_stock = $_POST['iso']*1;
            }
            echo '<br>';

            if($id_mutasi_stock <= 0){
                echo '<div class="alert alert-danger">Tidak ada sales order yang digunakan</div>';
                exit();
            }

            $barcode = strip_tags($_POST['msg']);
            if($barcode == ""){
                echo '<div class="alert alert-danger">Silakan isi barcode terlebih dahulu</div>';
                exit();
            }

            $materialfinishs = \backend\models\MaterialFinish::find()->where([
                    'barcode_kode' => $barcode,
                ])
                ->all();
            $materialfinishscount = \backend\models\MaterialFinish::find()->where([
                    'barcode_kode' => $barcode,
                ])
                ->count();
            if($materialfinishscount > 0){
                if($materialfinishscount > 1){
                    echo '<div class="alert alert-warning">Mohon maaf, ada banyak data yang duplicate dengan kode barcode ini. Silakan pilih yang mana dari antara barcode tersebut:<br><br> ';
                    $no=0;
                    foreach($materialfinishs as $materialfinish){
                        $no++;
                        echo $no.".";

                        /*
                        echo \yii\helpers\Html::a(
                            '<i class="fa fa-fw fa-check"></i> PILIH',
                            ['material-in/update-packing', 'id_item' => $materialfinish->id_material_finish],
                            ['class' => 'btn btn-success btn-xs', 'style'=>'margin-bottom:4px']
                        );
                        */
                        echo '<button class="btn btn-success btn-xs" style="margin-bottom:4px" onclick="sendMessagePostById(\''.$materialfinish->kode.'\')"><i class="fa fa-fw fa-check"></i> PILIH</button>';
                        echo " ".$materialfinish->getDetailBarang();
                        echo "<br>";
                    }

                    echo \yii\helpers\Html::a(
                            '<i class="fa fa-fw fa-question"></i> Mengapa bisa double barcode?',
                            ['info/double-barcode', ],
                            ['class' => 'btn btn-info btn-xs', 'style'=>'margin-bottom:4px', 'target'=>'_blank']
                        );
                    echo '</div>';
                }
                else{
                    $materialfinish = \backend\models\MaterialFinish::find()->where([
                        'barcode_kode' => $barcode,
                    ])
                    ->one();

                    //duplication checking
                    $mutasiStockItemCount = MutasiStockItem::find()->where([
                        'id_material_finish' => $materialfinish->id_material_finish,
                        'id_mutasi_stock' => $id_mutasi_stock,
                    ])
                    ->count();

                    if($mutasiStockItemCount > 0){
                        echo '<div class="alert alert-danger">Mohon maaf produk ini sudah masuk sebelumnya';
                        exit();
                    }

                    $model = new MutasiStockItem();
                    $modelParent = $this->findModel($id_mutasi_stock);
                    $model->id_mutasi_stock = $id_mutasi_stock;
                    $model->id_material_finish = $materialfinish->id_material_finish;
                    $model->keterangan = "";
                    $model->save();

                    $desc = $materialfinish->getDetailBarang();
                    $materialfinish->id_gudang = $modelParent->id_gudang_tujuan;
                    $materialfinish->save(false);

                    echo '<div class="alert alert-info">Data <b>['.$desc.']</b> berhasil ditambahkan.</div>';
                }
            }else{
                 $materialfinish = \backend\models\MaterialFinish::find()->where([
                        'barcode_kode' => $barcode,
                    ])
                    ->one();
                if($materialfinish != null){
                    echo '<div class="alert alert-warning">Data produk ini sudah masuk ke data.</div>';
                }else{
                    echo '<div class="alert alert-danger">Kode Barcode <b>['.$barcode.']</b> tidak dikenali/belum   terdaftar.</div>';
                }
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

    public function actionPostMessageKodeBarang(){

        if(isset($_POST['msg'])){
            //echo $_POST['msg'];
            //echo "data sudah diterima";
            $id_mutasi_stock = 0;
            if(isset($_POST['iso'])){
                $id_mutasi_stock = $_POST['iso']*1;
            }
            echo '<br>';

            if($id_mutasi_stock <= 0){
                echo '<div class="alert alert-danger">Tidak ada mutasi stock yang digunakan</div>';
                exit();
            }

            $kode = strip_tags($_POST['msg']);
            if($kode == ""){
                echo '<div class="alert alert-danger">Silakan isi barcode terlebih dahulu</div>';
                exit();
            }

            $materialfinish = \backend\models\MaterialFinish::find()->where([
                    'kode' => $kode,
                ])
                ->one();
            if($materialfinish != null){
                $desc = $materialfinish->getDetailBarang();
                $model = \backend\models\MutasiStockItem::find()->where([
                    'id_mutasi_stock' => $id_mutasi_stock,
                    'id_material_finish' => $materialfinish->id_material_finish
                ])
                ->one();
                if($model != null){
                    echo '<div class="alert alert-warning">Data produk ini <b>['.$desc.']</b> sudah masuk ke dalam list.</div>';
                }else{
                    $model = new MutasiStockItem();
                    $modelParent = $this->findModel($id_mutasi_stock);
                    $model->id_mutasi_stock = $id_mutasi_stock;
                    $model->id_material_finish = $materialfinish->id_material_finish;
                    $model->keterangan = "";
                    $model->save();

                    $desc = $materialfinish->getDetailBarang();
                    $materialfinish->id_gudang = $modelParent->id_gudang_tujuan;
                    $materialfinish->save(false);
                    // if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    //     return $this->redirect(['view', 'id' => $id_mutasi_stock]);
                    // }
                    
                    echo '<div class="alert alert-info">Data <b>['.$desc.']</b> berhasil ditambahkan.</div>';
                }
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
}
