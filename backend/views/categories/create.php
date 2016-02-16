<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

$this->title = 'Категории';

?>

<div class="row">

    <div class="col-md-12">

        <div class="box box-success">

            <? $createCategory = ActiveForm::begin(['action' => Url::to(['categories/create']), 'method' => 'post']) ?>

            <div class="box-header with-border">
                <h3 class="box-title">
                    <i class="fa fa-plus-circle text-success"></i>
                    Добавление категории
                </h3>
            </div>
            <div class="box-body no-padding">
                <div class="col-md-6">

<!--                    <div class="form-group">-->
<!--                        --><?//= Html::activeDropDownList($formModel, 'parent_id',
//                            ArrayHelper::map($categories, 'id', 'categoryTranslation.title'),
//                            [
//                                'class' => 'form-control',
//                                'options' => [
//                                    'label' => 'asfsg'
//                                ]
//                            ])
//                        ?>
<!--                    </div>-->
                    <div class="form-group">
                        <?= $createCategory->field($formModel, 'parent_id')
                            ->dropDownList(ArrayHelper::map($categories, 'id', 'categoryTranslation.title'),
                            [
                                'class' => 'form-control',
                            ])->label('Parent');
                        ?>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="form-group">
                        <?= $createCategory->field($formModel, 'title', [
                            'inputOptions' => [
                                'class' => 'form-control'
                            ]
                        ])->label('Title')
                        ?>
                    </div>

                    <div class="form-group">
                        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary pull-right']) ?>
                    </div>

                </div>
            </div>
            <div class="box-footer">

            </div>

            <? ActiveForm::end() ?>

        </div>

    </div>

</div>
