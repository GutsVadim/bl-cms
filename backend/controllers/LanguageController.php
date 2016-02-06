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

    public function actionSwitchActive() {
        $id = \Yii::$app->request->get();
        if(!empty($id) && isset($id)) {
            $item = Language::findOne($id);
            $active = $item->active;
            if($active == 1) {
                $active = 0;
            } else {
                $active = 1;
            }
            $item->active = $active;
            $item->save();
        }
        $this->redirect(['/settings']);
    }

    public function actionSwitchShow() {
        $id = \Yii::$app->request->get();
        if(!empty($id) && isset($id)) {
            $item = Language::findOne($id);
            $show = $item->show;
            if($show == 1) {
                $show = 0;
            } else {
                $show = 1;
            }
            $item->show = $show;
            $item->save();
        }
        $this->redirect(['/settings']);
    }
}