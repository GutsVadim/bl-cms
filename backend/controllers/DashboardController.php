<?php
namespace backend\controllers;

use \yii\web\Controller;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class DashboardController extends Controller
{
    public function actionIndex() {
        return $this->render('dashboard');
    }
}