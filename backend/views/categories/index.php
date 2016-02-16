<?php

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'Категории';

?>

<div class="row">

    <!-- Languages -->
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-list-ul"></i>
                    Список категорий
                </h3>
            </div>
            <div class="box-body no-padding">

                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Parent</th>
                        <th>Title</th>
                        <th>Language</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <? foreach($categories as $category) : ?>

                        <tr>
                            <td>
                                <?= $category->id ?>
                            </td>
                            <td>
                                <? if(empty($category->parent_id)) : ?>
                                    <i class="fa fa-minus text-danger"></i>
                                <? else:  ?>
                                    <?= $category->parent_id ?>
                                <? endif ?>
                            </td>
                            <td>
                                <?= $category->categoryTranslation->title ?>
                            </td>
                            <td>
                                <?= $category->categoryTranslation->language->name ?>
                            </td>
                            <td class="text-center">
                                <a href="<?= Url::to(['categories/delete', 'id' => $category->id]) ?>">
                                    <i class="fa fa-times text-danger"
                                </a>
                            </td>
                        </tr>

                    <? endforeach ?>

                    </tbody>
                </table>

            </div>
            <div class="box-footer">
                <a class="btn btn-primary pull-right" href="<?= Url::to(['categories/create', 'translation' => 'English']) ?>">
                    <i class="fa fa-user-plus"></i> Добавить
                </a>
            </div>
        </div>
    </div>

</div>

