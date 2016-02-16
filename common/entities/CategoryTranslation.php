<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 15.02.2016
 * Time: 17:33
 */

namespace common\entities;

use yii\db\ActiveRecord;

class CategoryTranslation extends ActiveRecord
{

    public static function tableName() {
        return 'article_category_translation';
    }

    public function getCategory() {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getLanguage() {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

}