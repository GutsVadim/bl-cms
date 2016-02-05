<?php
namespace backend\controllers;
use backend\models\form\CreateLanguageForm;
use common\entities\Language;
use RuntimeException;
use yii\base\InvalidParamException;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class LanguageController extends Controller
{
    public function actionCreate() {
        $formModel = new CreateLanguageForm();

        if($formModel->load(\Yii::$app->request->post())) {
            try {
                $formModel->create();
                $this->redirect(['settings/index']);
            }
            catch(RuntimeException $ex) {
                return $this->render('/site/error', [
                    'message' => 'Internal Server Error'
                ]);
            }
            catch(InvalidParamException $ex) {
                return $this->render('/site/error', [
                    'message' => 'Error',
                    'errors' => $formModel->getErrors()
                ]);
            }
        }
    }

    public function actionDelete() {
        $id = \Yii::$app->request->get('id');
        if(Language::deleteAll(['id' => $id])) {
            $this->redirect(['/settings']);
        }
        else {
            return $this->render('/site/error', [
                'message' => 'Internal Server Error'
            ]);
        }
    }
}