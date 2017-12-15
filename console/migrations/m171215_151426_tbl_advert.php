<?php

use yii\db\Migration;

/**
 * Class m171215_151426_tbl_advert
 */
class m171215_151426_tbl_advert extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
//        $this->execute('create table if exists');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171215_151426_tbl_advert cannot be reverted.\n";
        $this->dropTable('advert');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171215_151426_tbl_advert cannot be reverted.\n";

        return false;
    }
    */
}
