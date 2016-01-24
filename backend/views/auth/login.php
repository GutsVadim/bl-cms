<?php

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $loginFormModel \backend\models\form\LoginForm */

use yii\helpers\Html;
use backend\assets\AppAsset;
use yii\widgets\ActiveForm;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/admin/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition login-page">
    <?php $this->beginBody() ?>
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b> панель</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Введите данные для входа</p>
            <? $loginForm = ActiveForm::begin() ?>
            <div class="form-group has-feedback">
                <?= $loginForm->field($loginFormModel, 'username', [
                    'inputOptions' => [
                        'placeholder' => "Имя пользователя",
                        'class' => 'form-control'
                    ]
                ])->label(false)
                ?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <?= $loginForm->field($loginFormModel, 'password', [
                    'inputOptions' => [
                        'type' => 'password',
                        'placeholder' => "Пароль",
                        'class' => 'form-control'
                    ]
                ])->label(false)
                ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <?= Html::activeCheckbox($loginFormModel, 'rememberMe') ?>
                        </label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Войти</button>
                </div>
            </div>
            <? ActiveForm::end() ?>

        </div>
    </div>


    <?php $this->endBody() ?>
    <script src="/admin/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>
</html>
<?php $this->endPage() ?>