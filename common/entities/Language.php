<?php
namespace common\entities;
use yii\db\ActiveRecord;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class Language extends ActiveRecord
{
    public static function tableName()
    {
        return 'language';
    }
}