<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m171214_142452_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'surname'=>$this->string(),
            'name'=>$this->string(),
            'patronymic'=>$this->string(),
            'email'=>$this->string()->defaultValue(null),
            'password'=>$this->string(),
            'photo'=>$this->string()->defaultValue(null),
            'isAdmin'=>$this->integer()->defaultValue(0)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
