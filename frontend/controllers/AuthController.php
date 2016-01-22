<?php
namespace frontend\controllers;

use frontend\models\RegisterForm;
use Yii;
use yii\web\Controller;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class AuthController extends Controller
{

    public function actionRegister()
    {
        $model = new RegisterForm();
        if($model->load(Yii::$app->request->post())) {
            if($user = $model->register()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('register', [
            'model' => $model
        ]);
    }

}