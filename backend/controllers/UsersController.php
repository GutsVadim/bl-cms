<?php
namespace backend\controllers;

use backend\models\form\AddPermissionToRoleForm;
use backend\models\form\AddRoleToUserForm;
use backend\models\form\CreateRoleForm;
use backend\models\form\CreatePermissionForm;
use backend\models\form\CreateUserForm;
use backend\models\form\RemovePermissionFromRole;
use backend\models\form\RemoveRoleFromUser;
use common\models\User;
use Yii;
use yii\db\IntegrityException;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class UsersController extends Controller
{
    /*public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create-permission'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create-permission'],
                        'roles' => ['createPermission']
                    ]
                ],
            ],
        ];
    }*/

    public function actionIndex() {
        return $this->render('index', [
            'userList' => User::find()->all(),
            'createUserFormModel' => new CreateUserForm(),
            'roleList' => Yii::$app->authManager->getRoles(),
            'createRoleFormModel' => new CreateRoleForm(),
            'permissionList' => Yii::$app->authManager->getPermissions(),
            'createPermissionFormModel' => new CreatePermissionForm(),
            'addPermissionToRoleFormModel' => new AddPermissionToRoleForm(),
            'addRoleToUserFormModel' => new AddRoleToUserForm(),
        ]);
    }

    public function actionCreateUser() {
        $model = new CreateUserForm();
        if($model->load(Yii::$app->request->post())) {
            if($model->create()) {
                return $this->redirect(Url::to(['index']));
            }
        }
        // TODO: error
        return $this->renderContent('user creation error');
    }

    public function actionAddRoleToUser() {
        $model = new AddRoleToUserForm();
        if($model->load(Yii::$app->request->post())) {
            try {
                $model->add();
                return $this->redirect(Url::to(['index']));
            }
            catch(IntegrityException $ex) {
            }

        }
        // TODO: error
        return $this->renderContent('add child error');
    }

    public function actionRemoveRoleFromUser() {
        $model = new RemoveRoleFromUser();
        $model->roleName = Yii::$app->request->get('roleName');
        $model->userId = Yii::$app->request->get('userId');

        if($model->validate()) {
            try {
                $model->remove();
                return $this->redirect(Url::to(['index']));
            }
            catch(IntegrityException $ex) {
            }

        }
        // TODO: error
        return $this->renderContent('remove child error');
    }

    public function actionCreateRole() {
        $model = new CreateRoleForm();
        if($model->load(Yii::$app->request->post())) {
            if($model->create()) {
                return $this->redirect(Url::to(['index']));
            }
        }
        // TODO: error
        return $this->renderContent('role creation error');
    }

    public function actionCreatePermission() {
        $model = new CreatePermissionForm();
        if($model->load(Yii::$app->request->post())) {
            if($model->create()) {
                return $this->redirect(Url::to(['index']));
            }
        }
        // TODO: error
        return $this->renderContent('permission creation error');
    }

    public function actionAddPermissionToRole() {
        $model = new AddPermissionToRoleForm();
        if($model->load(Yii::$app->request->post())) {
            try {
                $model->add();
                return $this->redirect(Url::to(['index']));
            }
            catch(IntegrityException $ex) {
            }

        }
        // TODO: error
        return $this->renderContent('add child error');
    }

    public function actionRemovePermissionFromRole() {
        $model = new RemovePermissionFromRole();
        $model->roleName = Yii::$app->request->get('roleName');
        $model->permissionName = Yii::$app->request->get('permissionName');

        if($model->validate()) {
            try {
                $model->remove();
                return $this->redirect(Url::to(['index']));
            }
            catch(IntegrityException $ex) {
            }

        }
        // TODO: error
        return $this->renderContent('remove child error');
    }
}