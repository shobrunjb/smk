<?php

namespace common\helpers;

use Yii;
use yii\base\Component;

class CommonMessageHelper extends Component
{

    public static function ajaxInputMessageOnSave()
    {
        $msg = '
        <div class="callout callout-info">
        Setelah data tersimpan maka induk akan terload otomatis. Beberapa isian yang sudah anda isi di form sebelumnya (induk) akan direset kembali!
            </div>
          ';
        return $msg;
    }

    public static function addErrorMessage($newerror){
        $session = Yii::$app->session;
        $errorcek = isset($session['error-summary']) ? $session['error-summary'] : array();
        $errorcek[] = $newerror;
        $session->set('error-summary', $errorcek);
    }

    public static function addSuccesMessage($newmessage){
        $session = Yii::$app->session;
        $success = isset($session['success-summary']) ? $session['success-summary'] : array();
        $success[] = $newmessage;
        $session->set('success-summary', $success);
    }

    public static function displayMessageError(){
        $session = Yii::$app->session;                             
        $res = "";
        if(isset($session['error-summary'])){
            $errors =$session['error-summary'];
            if(count($errors) > 0){
                $res .= '<div class="alert alert-danger">';
                foreach($errors as $key=>$value){
                    $res .= $value."<br>";
                }
                $res .= '</div>';
            }

            //Remove setelah didisplay
            $error = array();
            $session->set('error-summary', $error);
        }

        if(isset($session['success-summary'])){
            $success =$session['success-summary'];
            if(count($success) > 0){
                $res .= '<div class="alert alert-success">';
                foreach($success as $key=>$value){
                    $res .= $value."<br>";
                }
                $res .= '</div>';
            }
            echo $res."<====";
            //exit();

            //Remove setelah didisplay
            $success = array();
            $session->set('success-summary', $success);
        }

        return $res;
    }

}
