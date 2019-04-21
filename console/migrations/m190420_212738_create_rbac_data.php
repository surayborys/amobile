<?php

use yii\db\Migration;
use backend\models\SignupForm;

/**
 * Class m190420_212738_create_rbac_data
 */
class m190420_212738_create_rbac_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;    
        // Define permissions
        
        // Define roles with permissions
        $moderatorRole = $auth->createRole('moderator');
        $auth->add($moderatorRole);
        
        $adminRole = $auth->createRole('admin');
        $auth->add($adminRole);
        
        // Create admin user
        // After creating admin create new admin user with secure password and delete or change role for this user     
        $model = new SignupForm();
        $model->username = 'admin';
        $model->email = 'admin@mail.ua';
        $model->password = '111111';

        if($user = $model->save()){
            // Assign admin role to 
            $auth->assign($adminRole, $user->getId());
        }
    }
    public function safeDown()
    {
        echo "m171015_143334_create_rbac_data cannot be reverted.\n";
        return false;
    }
}
