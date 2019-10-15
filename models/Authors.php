<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string $name_or_pseudo
 * @property int $birth_year
 * @property double $rating
 */
class Authors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['birth_year'], 'integer'],
            [['rating'], 'number'],
            [['name_or_pseudo'], 'string', 'max' => 255],
        ];
    }

    public function getBooks()
    {
        return $this->hasMany(Books::className(),['author_id' => 'id']);
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_or_pseudo' => 'Name Or Pseudo',
            'birth_year' => 'Birth Year',
            'rating' => 'Rating',
        ];
    }
}
