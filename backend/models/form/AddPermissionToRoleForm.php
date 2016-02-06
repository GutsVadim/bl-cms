<?php
namespace backend\models\form;
use Yii;
use yii\base\Model;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class AddPermissionToRoleForm extends Model
{
    public $roleName;
    public $permissionName;

    public function rules()
    {
        return [
            ['roleName', 'required'],
            ['permissionName', 'required']
        ];
    }

    public function add() {
        $auth = Yii::$app->authManager;
        $role = $auth->getRole($this->roleName);
        $permission = $auth->getPermission($this->permissionName);
        $auth->addChild($role, $permission);

        return true;
    }
}