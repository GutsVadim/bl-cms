<?php
namespace backend\models\form;
use Yii;
use yii\base\Model;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class RemovePermissionFromRole extends Model
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

    public function remove() {
        $auth = Yii::$app->authManager;
        $role = $auth->getRole($this->roleName);
        $permission = $auth->getPermission($this->permissionName);
        $auth->removeChild($role, $permission);

        return true;
    }
}