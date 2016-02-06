<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Настройки';

?>

<div class="row">

    <!-- Languages -->
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-language"></i>
                    Список языков
                </h3>
            </div>
            <div class="box-body no-padding">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Язык</th>
                        <th>Код</th>
                        <th class="text-center">Активный</th>
                        <th class="text-center">Показать</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?
                    if(!empty($langs)) {
                        foreach ($langs as $lang) { ?>
                            <tr>
                                <td><?= $lang->name ?></td>
                                <td><?= $lang->lang_id ?></td>
                                <td class="text-center">
                                    <a href="<?= Url::to(['language/switch-active', 'id' => $lang->id]) ?>">
                                        <? if ($lang->active > 0) { ?>
                                            <i class="fa fa-check text-success"></i>
                                        <? } else { ?>
                                            <i class="fa fa-minus text-danger"></i>
                                        <? } ?>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="<?= Url::to(['language/switch-show', 'id' => $lang->id]) ?>">
                                        <? if ($lang->show > 0) { ?>
                                            <i class="fa fa-check text-success"></i>
                                        <? } else { ?>
                                            <i class="fa fa-minus text-danger"></i>
                                        <? } ?>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="<?=Url::to(['language/delete', 'id' => $lang->id])?>" class="fa fa-times text-danger"></a>
                                </td>
                            </tr>
                        <? }
                    }
                    else {
                    ?>
                        <tr>
                            <td colspan="4">
                                У Вас пока нету языков
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

</div>

<!-- Create Language Modal -->

<div class="modal fade" id="createUserFormModel" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <? $createLangForm = ActiveForm::begin(['action' => Url::to(['language/create']), 'method' => 'post']) ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><i class="fa fa-user-plus"></i> Добавить пользователя</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?= $createLangForm->field($createLanguageForm, 'name', [
                        'inputOptions' => [
                            'class' => 'form-control'
                        ]
                    ])->label('Название языка')
                    ?>
                </div>
                <div class="form-group">
                    <?= $createLangForm->field($createLanguageForm, 'lang_id', [
                        'inputOptions' => [
                            'class' => 'form-control'
                        ]
                    ])->label('Код языка')
                    ?>
                </div>
                <?= Html::activeCheckbox($createLanguageForm, 'active') ?>
                <?= Html::activeCheckbox($createLanguageForm, 'show') ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary pull-right" value="Добавить">
            </div>
            <? ActiveForm::end(); ?>
        </div>
    </div>
</div>
