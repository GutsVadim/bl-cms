<?
/* @var $this \yii\web\View */
/* @var $createUserFormModel \backend\models\form\CreateUserForm */
/* @var $userList \common\models\User[] */
/* @var $createRoleFormModel \backend\models\form\CreateRoleForm */
/* @var $roleList \yii\rbac\Role[] */
/* @var $createPermissionFormModel \backend\models\form\CreatePermissionForm */
/* @var $permissionList \yii\rbac\Permission[] */
/* @var $addPermissionToRoleFormModel \backend\models\form\AddPermissionToRoleForm */
/* @var $addRoleToUserFormModel \backend\models\form\AddRoleToUserForm */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "Пользователи";
?>

<div class="row">

    <!-- Users -->
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-user"></i>
                    Список пользователей
                </h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Имя пользователя</th>
                            <th>Адрес электронной почты</th>
                            <th>
                                Роли
                                <a href="" class="btn btn-xs btn-success pull-right" data-toggle="modal" data-target="#addRoleToUserFormModel">
                                    <i class="fa fa-plus"></i>
                                    Добавить связь
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <? foreach ($userList as $user) { ?>
                            <? $userRoles = Yii::$app->authManager->getRolesByUser($user->id) ?>
                            <tr>
                                <td><?= $user->username ?></td>
                                <td><?= $user->email ?></td>
                                <td>
                                    <? foreach($userRoles as $role) { ?>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-xs btn-info">
                                                <?=$role->description?>
                                            </button>
                                            <a href="<?=Url::to(['remove-role-from-user', 'userId' => $user->id, 'roleName' => $role->name])?>" type="button" class="btn btn-xs btn-info">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    <? } ?>
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
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-users"></i>
                    Список ролей
                </h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>
                            Разрешения
                            <a href="" class="btn btn-xs btn-success pull-right" data-toggle="modal" data-target="#addPermissionToRoleFormModel">
                                <i class="fa fa-plus"></i>
                                Добавить связь
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach ($roleList as $role) { ?>
                        <tr>
                            <td><?= $role->name ?></td>
                            <td><?= $role->description ?></td>
                            <td>
                                <? foreach (Yii::$app->authManager->getPermissionsByRole($role->name) as $permission) { ?>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-xs btn-info">
                                            <?=$permission->name?>
                                        </button>
                                        <a href="<?=Url::to(['remove-permission-from-role', 'roleName' => $role->name, 'permissionName' => $permission->name])?>" type="button" class="btn btn-xs btn-info">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                <? } ?>
                            </td>
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

    <!-- Permissions -->
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-retweet"></i>
                    Список разрешений
                </h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Описание</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach ($permissionList as $permission) { ?>
                        <tr>
                            <td><?= $permission->name ?></td>
                            <td><?= $permission->description ?></td>
                        </tr>
                    <? } ?>
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#createPermissionFormModel">
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
                            ArrayHelper::map($roleList, 'name', 'description'), [
                                'class' => 'form-control'
                            ])
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

<!-- Create Permission Modal Dialog -->
<div class="modal fade" id="createPermissionFormModel" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <? $createPermissionForm = ActiveForm::begin(['action' => Url::to(['create-permission'])]) ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Добавить разрешение</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?= $createPermissionForm->field($createPermissionFormModel, 'name', [
                            'inputOptions' => [
                                'placeholder' => "Название",
                                'class' => 'form-control'
                            ]
                        ])->label('Название')
                        ?>
                    </div>
                    <div class="form-group">
                        <?= $createPermissionForm->field($createPermissionFormModel, 'description', [
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

<!-- Add Permission to Role Modal Dialog -->
<div class="modal fade" id="addPermissionToRoleFormModel" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <? ActiveForm::begin(['action' => Url::to(['add-permission-to-role'])]) ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Добавить разрешение к роли</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?= Html::activeDropDownList($addPermissionToRoleFormModel, 'roleName',
                            ArrayHelper::map($roleList, 'name', 'description')) ?>
                    </div>
                    <div class="form-group">
                        <?= Html::activeDropDownList($addPermissionToRoleFormModel, 'permissionName',
                            ArrayHelper::map($permissionList, 'name', 'name')) ?>
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

<!-- Add Permission to Role Modal Dialog -->
<div class="modal fade" id="addRoleToUserFormModel" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <? ActiveForm::begin(['action' => Url::to(['add-role-to-user'])]) ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Добавить роль к пользователю</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?= Html::activeDropDownList($addRoleToUserFormModel, 'userId',
                            ArrayHelper::map(\common\models\User::find()->all(), 'id', 'username'),
                            [
                                'class' => 'form-control'
                            ]) ?>
                    </div>
                    <div class="form-group">
                        <?= Html::activeDropDownList($addRoleToUserFormModel, 'roleName',
                            ArrayHelper::map($roleList, 'name', 'description'),
                            [
                                'class' => 'form-control'
                            ]) ?>
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