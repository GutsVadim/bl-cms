<?php
namespace backend\models\form;
use common\models\User;
use Yii;
use yii\base\Model;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class RemoveRoleFromUser extends Model
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

    public function remove() {
        $auth = Yii::$app->authManager;
        $role = $auth->getRole($this->roleName);
        $auth->revoke($role, $this->userId);

        return true;
    }
}