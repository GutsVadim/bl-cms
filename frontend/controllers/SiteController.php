<?php
namespace frontend\controllers;
use yii\web\Controller;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class SiteController extends Controller {
    public function actionIndex() {
        return $this->renderCOntent("hi from main page");
    }
}