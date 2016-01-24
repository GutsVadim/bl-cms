<?
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "Пользователи";
//$this->description = "Управление пользователями и их ролями";
?>

<div class="row">
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-users"></i> Список ролей</h3>

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

<!-- Create Role Modal Dialog -->
<div class="modal fade" id="createRoleFormModel" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <? $createRoleForm = ActiveForm::begin(['action' => Url::toRoute('create-role')]) ?>
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