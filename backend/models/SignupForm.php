<?php
namespace backend\models;

use backend\models\User;
use yii\base\Model;

/**
 * Description of SignupForm
 *
 * @author suray
 */
class SignupForm extends Model{

    public $username;
    public $password;
    public $email;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            
            ['email', 'required'],
            ['email', 'email']
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function save()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->status = User::STATUS_ACTIVE;
        
        return $user->save() ? $user : null;
    }
}


