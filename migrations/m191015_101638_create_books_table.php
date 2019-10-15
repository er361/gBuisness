<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%books}}`.
 */
class m191015_101638_create_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer(),
            'author_name' => $this->string(),
            'publish_year' => $this->integer(),
            'titles' => $this->string(),
            'rating' => $this->float()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%books}}');
    }
}
