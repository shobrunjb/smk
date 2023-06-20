<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PublikUser */

?>
<?php

use backend\models\Product;
use backend\models\ProductSearch;
use common\utils\EncryptionDB;
use frontend\assets\AppAsset;
use backend\models\LandingHome;
use backend\models\LandingAsset;
use backend\models\WebVocabularySearch;
use backend\models\ContentSearch;
use common\helpers\ContentStringManipulator;
use yii\helpers\Url;

use backend\models\AppSettingSearch;


$appName = AppSettingSearch::getValueByKey("APP-NAME-SINGKAT");
$appNameSingkat = AppSettingSearch::getValueByKey("APP-NAME-SINGKATAN");


AppAsset::register($this);
?>


<?php
  //Display Asset
  $assets = LandingAsset::find()
    ->where(['is_active' => 1])
    ->all();
  foreach($assets as $asset){
    //echo $asset->jenisLandingAsset->jenis_landing_asset;
    switch ($asset->jenisLandingAsset->jenis_landing_asset) {
      case 'css':
        echo '<link href="'.Yii::$app->request->baseUrl.'/landing_asset/'.$asset->file.'" rel="stylesheet">'."\n";
        break;
      
      default:
        // code...
        break;
    }
  }
?>

<?php
  //Display Asset
  $assets = LandingAsset::find()
    ->where(['is_active' => 1])
    ->all();
  foreach($assets as $asset){
    //echo $asset->jenisLandingAsset->jenis_landing_asset;
    switch ($asset->jenisLandingAsset->jenis_landing_asset) {
      case 'js':
        echo '<script  src="'.Yii::$app->request->baseUrl.'/landing_asset/'.$asset->file.'"> </script>'."\n";
        break;
      
      default:
        // code...
        break;
    }
  }
?>

<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/front_form.css" rel="stylesheet">
<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/front_layout.css" rel="stylesheet">

<?php
  $codes = LandingHome::find()
    ->where(['is_active' => 1, 'type_landing' => 'HEADER'])
    ->orderBy(['page_number'=>SORT_ASC])->all();
  foreach($codes as $code){
    echo $code->source_html;
  }
?>

<div class="box">
	<div class="box-body publik-user-create">
		<h1>Register Baru</h1>
		<hr class="hr_label_h1_short text-left" align="left">
		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

<?php
  $codes = LandingHome::find()
    ->where(['is_active' => 1, 'type_landing' => 'FOOTER'])
    ->orderBy(['page_number'=>SORT_ASC])->all();
  foreach($codes as $code){
    echo $code->source_html;
  }
?>

