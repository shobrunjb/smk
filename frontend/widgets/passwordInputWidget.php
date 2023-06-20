<?php

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class passwordInputWidget extends Widget
{
    public $message;
    public $name = 'password';

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('passwordInput',[
            'name'=>$this->name,
        ]);
		
		//Yang versi lama (html original)
		//return $this->render('topnav_ori');
    }
}

?>
