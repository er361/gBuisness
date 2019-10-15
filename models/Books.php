<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property int $author_id
 * @property string $author_name
 * @property int $publish_year
 * @property string $titles
 * @property double $rating
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'publish_year'], 'integer'],
            [['rating'], 'number'],
            [['author_name', 'titles'], 'string', 'max' => 255],
        ];
    }

    public function getAuthor()
    {
        return $this->hasOne(Authors::className(),['id' => 'author_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'author_name' => 'Author Name',
            'publish_year' => 'Publish Year',
            'titles' => 'Titles',
            'rating' => 'Rating',
        ];
    }
}
