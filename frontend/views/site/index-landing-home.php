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
        echo '<link href="landing_asset/'.$asset->file.'" rel="stylesheet">'."\n";
        break;
      
      default:
        // code...
        break;
    }
  }
?>

<?php
  $codes = LandingHome::find()
    ->where(['is_active' => 1])
    ->orderBy(['page_number'=>SORT_ASC])->all();
  foreach($codes as $code){
    echo $code->source_html;
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
        echo '<script  src="landing_asset/'.$asset->file.'"> </script>'."\n";
        break;
      
      default:
        // code...
        break;
    }
  }
?>