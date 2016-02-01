<?php
namespace backend\controllers;
use yii\web\Controller;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class ArticlesController extends Controller
{
    public function actionIndex() {
        return $this->render('index');
    }
}