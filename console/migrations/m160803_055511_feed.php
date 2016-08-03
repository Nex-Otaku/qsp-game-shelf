<?php

use yii\db\Schema;
use yii\db\Migration;

class m160803_055511_feed extends Migration {
    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
                '{{%feed}}', [
                    'id' => "BINARY(16) NOT NULL",
                    'slug' => Schema::TYPE_STRING . "(255) NOT NULL",
                    'description' => Schema::TYPE_TEXT . " NOT NULL",
                    'type' => "enum('default','sandbox')" . " NOT NULL",
                    'api_version_min' => Schema::TYPE_STRING . "(255) NOT NULL",
                    'api_version_max' => Schema::TYPE_STRING . "(255) NOT NULL",
                    'enabled' => Schema::TYPE_BOOLEAN . "(1) NOT NULL DEFAULT '0'",
                    'deleted' => Schema::TYPE_BOOLEAN . "(1) NOT NULL DEFAULT '0'",
                    'created_at' => Schema::TYPE_TIMESTAMP . " NULL DEFAULT NULL",
                    'created_by' => Schema::TYPE_INTEGER . "(11)",
                    'updated_at' => Schema::TYPE_TIMESTAMP . " NULL DEFAULT NULL",
                    'updated_by' => Schema::TYPE_INTEGER . "(11)",
                    'deleted_at' => Schema::TYPE_TIMESTAMP . " NULL DEFAULT NULL",
                    'deleted_by' => Schema::TYPE_INTEGER . "(11)",
                    'PRIMARY KEY(id)',
                ], $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%feed}}');
    }
}
