<?php

use yii\db\Migration;

/**
 * Class m171215_182220_tbl_subscribe
 */
class m171215_182220_tbl_subscribe extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->execute("
            CREATE TABLE IF NOT EXISTS `subscribe` (
            `idsubscribe` int(11) NOT NULL AUTO_INCREMENT,
            `email` varchar(50) DEFAULT NULL,
            `date_subscribe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`idsubscribe`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
      ");
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171215_182220_tbl_subscribe cannot be reverted.\n";
        $this->dropTable("subscribe");
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171215_182220_tbl_subscribe cannot be reverted.\n";

        return false;
    }
    */
}
