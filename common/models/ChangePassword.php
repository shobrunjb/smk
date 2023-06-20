<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class ChangePassword extends Model
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
            // oldPassword, newPassword and validationPassword are required
            [['oldPassword', 'newPassword', 'validationPassword'], 'required'],
            // oldPassword is validated by validatePassword()
            ['oldPassword', 'validatePassword'],
            ['newPassword', 'validateNewPassword'],
        ];
    }

    public function changePassword()
    {
        if ($this->validate()) {
            $user = $this->getUser();
            $user->setPassword($this->newPassword);
            $user->update();
            
            return true;
        } else{
            return false;
        }
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->oldPassword)) {
                $this->addError($attribute, 'Incorrect password.');
            }
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

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername(Yii::$app->user->identity->username);
        }

        return $this->_user;
    }
}
