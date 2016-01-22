<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['id' => 'form-register']);

echo $form->field($model, 'username');
echo $form->field($model, 'email');
echo $form->field($model, 'password')->passwordInput();
echo Html::submitButton('Register', ['name' => 'register-button']);

ActiveForm::end();