<?php
namespace backend\controllers;

use backend\models\form\CreateRoleForm;
use backend\models\form\CreateUserForm;
use common\models\User;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class UsersController extends Controller
{
    public function actionIndex() {
        $userList = User::find()->all();
        $createUserFormModel = new CreateUserForm();
        $roleList = Yii::$app->authManager->getRoles();
        $createRoleFormModel = new CreateRoleForm();

        return $this->render('index', [
            'userList' => $userList,
            'createUserFormModel' => $createUserFormModel,
            'roleList' => $roleList,
            'createRoleFormModel' => $createRoleFormModel,
        ]);
    }

    public function actionCreateRole() {
        $model = new CreateRoleForm();
        if($model->load(Yii::$app->request->post())) {
            if($model->create()) {
                return $this->redirect(Url::toRoute('index'));
            }
        }
        // TODO: role creation error
        return $this->renderContent('role creation error');
    }

    public function actionCreateUser() {
        $model = new CreateUserForm();
        if($model->load(Yii::$app->request->post())) {
            if($model->create()) {
                return $this->redirect(Url::toRoute('index'));
            }
        }
        // TODO: user creation error
        return $this->renderContent('1user creation error');
    }
}