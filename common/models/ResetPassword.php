<?php
namespace common\models;

use yii\base\Model;

/**
 * Login form
 */
class ResetPassword extends Model
{
    public $oldPassword;
    public $newPassword;
    public $validationPassword;

    private $_user = false;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // newPassword and validationPassword are required
            [['newPassword', 'validationPassword'], 'required'],
            // newPassword is validated by validateNewPassword()
            ['newPassword', 'validateNewPassword'],
        ];
    }

    public function changePassword($user)
    {
        if ($this->validate()) {
            $user = $this->getUser($user);
            $user->setPassword($this->newPassword);
            $user->update();
            
            return true;
        } else{
            return false;
        }
    }

    public function validateNewPassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if ($this->newPassword !== $this->validationPassword) {
                $this->addError($attribute, 'Password Not Match.');
            }
        }
    }

    //mendapatkan user dari model common/models/users
    public function getUser($user)
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($user->username);
        }

        return $this->_user;
    }
}
