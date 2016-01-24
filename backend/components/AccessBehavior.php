<?php
namespace backend\components;
use Yii;
use yii\base\Behavior;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class AccessBehavior extends Behavior
{
    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => 'beforeAction'
        ];
    }

    public function beforeAction()
    {
        if (Yii::$app->getUser()->isGuest &&
            Yii::$app->getRequest()->url !== Url::to([Yii::$app->getUser()->loginUrl])
        ) {
            Yii::$app->getResponse()->redirect([Yii::$app->getUser()->loginUrl]);
        }
    }
}