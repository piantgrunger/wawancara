<?php
namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginWawancara extends Model
{
    public $username;
    public $tanggal_lahir;
    public $id_sekolah;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'tanggal_lahir','id_sekolah'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            [['id_sekolah'], 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user) {
               $user = new User;
               $user->username = $this->username;
               $user->setPassword($this->tanggal_lahir);
               $user->tanggal_lahir = $this->tanggal_lahir;
               $user->id_sekolah = $this->id_sekolah;
               $user->status =10;
               $user->generateAuthKey();
               $user->save(false);
               $authAssignment = new AuthAssignment;
               $authAssignment->user_id=$user->id;
               $authAssignment->item_name='pewawancara';
               $authAssignment->save(false);

               $this->_user=$user;
            } else {
                if(($user->tanggal_lahir!=$this->tanggal_lahir) || ($user->id_sekolah != $this->id_sekolah))
                {
                    $this->addError($attribute,'Nama,Madrasah dan Tanggal Lahir Tidak Sesuai');

                }
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
