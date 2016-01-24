<?
/* @var $this \yii\web\View */
/* @var $createUserFormModel \backend\models\form\CreateUserForm */
/* @var $userList \common\models\User[] */
/* @var $createRoleFormModel \backend\models\form\CreateRoleForm */
/* @var $roleList \yii\rbac\Role[] */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "Пользователи";
?>

<div class="row">

    <!-- Users -->
    <div class="col-md-8">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-user"></i>
                    Список пользователей
                </h3>
            </div>
            <div class="box-body no-padding">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Имя пользователя</th>
                            <th>Адрес электронной почты</th>
                            <th>Роли</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? foreach ($userList as $user) { ?>
                            <? $userRoles = Yii::$app->authManager->getRolesByUser($user->id) ?>
                            <tr>
                                <td><?= $user->username ?></td>
                                <td><?= $user->email ?></td>
                                <td>
                                    <? foreach($userRoles as $role) {
                                        echo $role->description . '; ';
                                    } ?>
                                </td>
                            </tr>
                        <? } ?>
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#createUserFormModel">
                    <i class="fa fa-user-plus"></i> Добавить
                </a>
            </div>
        </div>
    </div>

    <!-- Roles -->
    <div class="col-md-4">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-users"></i>
                    Список ролей
                </h3>
            </div>
            <div class="box-body no-padding">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Описание</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach ($roleList as $role) { ?>
                        <tr>
                            <td><?= $role->name ?></td>
                            <td><?= $role->description ?></td>
                        </tr>
                    <? } ?>
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#createRoleFormModel">
                    <i class="fa fa-plus"></i> Добавить
                </a>
            </div>
        </div>
    </div>

</div>

<!-- Create User Modal Dialog -->
<div class="modal fade" id="createUserFormModel" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <? $createUserForm = ActiveForm::begin(['action' => Url::to(['create-user'])]) ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><i class="fa fa-user-plus"></i> Добавить пользователя</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?= $createUserForm->field($createUserFormModel, 'username', [
                            'inputOptions' => [
                                'placeholder' => "Имя пользователя",
                                'class' => 'form-control'
                            ]
                        ])->label('Имя пользователя')
                        ?>
                    </div>
                    <div class="form-group">
                        <?= $createUserForm->field($createUserFormModel, 'email', [
                            'inputOptions' => [
                                'placeholder' => "Адрес электронной почты",
                                'class' => 'form-control'
                            ]
                        ])->label('Адрес электронной почты')
                        ?>
                    </div>
                    <div class="form-group">
                        <?= $createUserForm->field($createUserFormModel, 'password', [
                            'inputOptions' => [
                                'placeholder' => "Пароль",
                                'class' => 'form-control',
                                'type' => 'password'
                            ]
                        ])->label('Пароль')
                        ?>
                    </div>
                    <div class="form-group">
                        <?= Html::activeDropDownList($createUserFormModel, 'roleName',
                            ArrayHelper::map($roleList, 'name', 'description')) ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary pull-right" value="Добавить">
                </div>
            <? ActiveForm::end(); ?>
        </div>
    </div>
</div>

<!-- Create Role Modal Dialog -->
<div class="modal fade" id="createRoleFormModel" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <? $createRoleForm = ActiveForm::begin(['action' => Url::to(['create-role'])]) ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Добавить роль</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?= $createRoleForm->field($createRoleFormModel, 'name', [
                            'inputOptions' => [
                                'placeholder' => "Название",
                                'class' => 'form-control'
                            ]
                        ])->label('Название')
                        ?>
                    </div>
                    <div class="form-group">
                        <?= $createRoleForm->field($createRoleFormModel, 'description', [
                            'inputOptions' => [
                                'placeholder' => "Описание",
                                'class' => 'form-control'
                            ]
                        ])->label('Описание')
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary pull-right" value="Добавить">
                </div>
            <? ActiveForm::end(); ?>
        </div>
    </div>
</div>