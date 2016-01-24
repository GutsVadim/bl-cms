<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\form\LoginForm;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class AuthController extends Controller
{
    public $layout = 'blank';

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $loginFormModel = new LoginForm();

        if(Yii::$app->request->isPost) {
            $loginFormModel->load(Yii::$app->request->post());
            if ($loginFormModel->login()) {
                return $this->goBack();
            }
        }

        return $this->renderPartial('login', [
            'loginFormModel' => $loginFormModel,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect([Yii::$app->user->loginUrl]);
    }
}