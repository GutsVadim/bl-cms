<?php
namespace backend\controllers;

use backend\models\form\CreateRoleForm;
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
        $users = User::find()->all();
        $createRoleFormModel = new CreateRoleForm();
        $roleList = Yii::$app->authManager->getRoles();

        return $this->render('index', [
            'createRoleFormModel' => $createRoleFormModel,
            'roleList' => $roleList,
            'users' => $users
        ]);
    }

    public function actionCreateRole() {
        $model = new CreateRoleForm();
        if($model->load(Yii::$app->request->post())) {
            if($model->create()) {
                return $this->redirect(Url::toRoute('index'));
            }
        }

        return $this->renderContent(var_dump(Yii::$app->request->post()));
    }
}