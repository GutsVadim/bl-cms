<?php

namespace common\entities;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{

    public static function tableName() {
        return 'article_category';
    }

    public function getCategoryTranslation() {
        return $this->hasOne(CategoryTranslation::className(), ['category_id' => 'id']);
    }

}