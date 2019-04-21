<?php

use yii\db\Migration;

class m181116_085909_comments extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%comments}}', [
            'id' => $this->primaryKey(),
			'text'=>$this->text()->notNull(),
			'name' => $this->string()->notNull(),
			'email' => $this->string()->notNull(),
			'site' => $this->string()->notNull(),
			'user_id' => $this->integer()->notNull(),
			'parent_id' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%comments}}');
    }
}
