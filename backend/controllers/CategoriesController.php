<?php

namespace backend\controllers;

use common\entities\Category;
use yii\web\Controller;
use backend\models\form\CreateCategoryForm;
use yii\base\InvalidParamException;
use RuntimeException;
use Yii;

class CategoriesController extends Controller
{

    public function actionIndex() {
        $categories = Category::find()
            ->with(
                'categoryTranslation',
                'categoryTranslation.language'
            )
            ->orderBy(['id' => SORT_ASC])
            ->all();

        return $this->render('index', [
            'categories' => $categories
        ]);
    }

    public function actionDelete() {
        $id = \Yii::$app->request->get('id');
        if(Category::deleteAll(['id' => $id])) {
            $this->redirect(['/categories']);
        }
        else {
            return $this->render('/site/error', [
                'message' => 'Internal Server Error'
            ]);
        }
    }

    public function actionCreate() {

        $formModel = new CreateCategoryForm();

        if($formModel->load(\Yii::$app->request->post())) {
            try {
                $formModel->create();
                $this->redirect(['/categories']);
                return true;
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

        $categories = Category::find()
            ->with(
                'categoryTranslation'
            )
            ->orderBy(['id' => SORT_ASC])
            ->all();

        return $this->render('create', [
            'formModel' => $formModel,
            'categories' => $categories
        ]);
    }

}