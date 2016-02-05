<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 04.02.2016
 * Time: 0:29
 */

namespace backend\controllers;


use backend\models\form\CreateLanguageForm;
use common\entities\Language;
use yii\web\Controller;
use Yii;

class SettingsController extends Controller
{

    public function actionIndex() {
        $langs = Language::find()->all();
        $createLanguageForm = new CreateLanguageForm();

        return $this->render('index', [
            'langs' => $langs,
            'createLanguageForm' => $createLanguageForm
        ]);
    }

    public function actionCreateLanguage() {

    }

}