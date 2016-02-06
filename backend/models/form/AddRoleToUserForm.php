<?php
namespace backend\models\form;
use Yii;
use yii\base\Model;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class AddRoleToUserForm extends Model
{
    public $userId;
    public $roleName;

    public function rules()
    {
        return [
            ['userId', 'required'],
            ['roleName', 'required']
        ];
    }

    public function add() {
        $auth = Yii::$app->authManager;
        $role = $auth->getRole($this->roleName);
        $auth->assign($role, $this->userId);

        return true;
    }
}