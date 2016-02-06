<?php
namespace backend\models\form;
use Yii;
use yii\base\Model;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class CreatePermissionForm extends Model
{
    public $name;
    public $description;

    public function rules()
    {
        return [
            ['name', 'filter', 'filter' => 'trim'],
            ['name', 'required', 'message' => 'Поле названия разрешения обязательно для заполнения.'],
            ['name', 'string', 'min' => 2, 'message' => 'Поле названия разрешения должно состоять не менее чем из 2-х символов.'],
            ['name', 'string', 'max' => 64, 'message' => 'Поле названия разрешения должно состоять не более чем из 64-х символов.'],
            // ['name', 'unique', 'targetClass' => '', 'message' => 'Роль с таким названием уже существует'],

            ['description', 'filter', 'filter' => 'trim']
        ];
    }

    public function create() {
        if($this->validate()) {
            $auth = Yii::$app->authManager;
            $permission = $auth->createPermission($this->name);
            $permission->description = $this->description;
            $auth->add($permission);
            return true;
        }
        return false;
    }
}