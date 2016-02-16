<?php

namespace backend\models\form;

use common\entities\Category;
use common\entities\CategoryTranslation;
use yii\base\InvalidParamException;
use yii\base\Model;
use RuntimeException;
use Yii;

class CreateCategoryForm extends Model
{

    public $parent_id;
    public $title;

    public function rules() {
        return [
            ['parent_id','filter', 'filter' => 'trim'],
            ['parent_id', 'required'],

            ['title', 'filter', 'filter' => 'trim'],
            ['title', 'required'],
            ['title', 'unique', 'targetClass' => '\common\entities\CategoryTranslation', 'message' => 'This title has already been taken.'],
        ];
    }

    public function create() {
        if($this->validate()) {
            $category = new Category();
            $category_translation = new CategoryTranslation();
            $category->parent_id = $this->parent_id;

            if($category->save()) {
                $category_id = Yii::$app->db->getLastInsertID();
                $category_translation->category_id = $category_id;
                $category_translation->title = $this->title;
                if($category_translation->save()) {
                    return true;
                }
                else {
                    throw new RuntimeException('Database Exception');
                }
            }
            else {
                throw new RuntimeException('Database Exception');
            }
        }
        else {
            throw new InvalidParamException('Invalid CategoryParams');
        }
    }

}