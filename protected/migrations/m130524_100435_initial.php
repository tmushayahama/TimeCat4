<?php

class m130524_100435_initial extends CDbMigration
{
	public function up()
	{
	}

	public function down()
	{
		echo "m130524_100435_initial does not support migration down.\n";
		return false;
	}

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            $this->createTable('tc_name_title', array(
            'id'=>'pk',
            'title'=>'varchar(20) NOT NULL',
            'description'=>'varchar(125) DEFAULT NULL',
        ), 'ENGINE=InnoDB');

        $this->createTable('tc_time_zone', array(
            'id'=>'pk',
            'location'=>'varchar(50) NOT NULL',
            'gmt_time_offset'=>'int(11) NOT NULL',
            'description'=>'varchar(128) DEFAULT NULL',
        ), 'ENGINE=InnoDB');

        $this->createTable('tc_user', array(
            'id'=>'pk',
            'username'=>'varchar(128) NOT NULL',
            'password'=>'varchar(128) NOT NULL',
            'name_title_id'=>'int(11) NOT NULL',
            'first_name'=>'varchar(128) NOT NULL',
            'last_name'=>'varchar(128) NOT NULL',
            'institution'=>'varchar(128) NOT NULL',
            'create_date'=>'datetime DEFAULT NULL',
            'joined_time'=>'datetime DEFAULT NULL',
            'last_login_time'=>'datetime DEFAULT NULL',
            'status'=>'int(11) NOT NULL',
        ), 'ENGINE=InnoDB');

        $this->createIndex('idx_name_title_id', 'tc_user', 'name_title_id', FALSE);

        $this->createTable('tc_user_invites', array(
            'id'=>'pk',
            'inviter_id'=>'int(11) NOT NULL',
            'invitee_id'=>'int(11) NOT NULL',
        ), '');

        $this->createIndex("idx_user_email", "tc_user", "username", true);
        $this->createIndex("idx_name_title", "tc_name_title", "title", true);
        $this->createIndex('idx_inviter_id', 'tc_user_invites', 'inviter_id', FALSE);
        $this->createIndex('idx_invitee_id', 'tc_user_invites', 'invitee_id', FALSE);
        $this->addForeignKey('fk_tc_user_tc_name_title_name_title_id', 'tc_user', 'name_title_id',
                    'tc_name_title', 'id', "cascade", "restrict");
        $this->addForeignKey('fk_tc_user_invites_tc_user_inviter_id', 'tc_user_invites', 'inviter_id', 
                    'tc_user', 'id', "cascade", "restrict");

        $this->addForeignKey('fk_tc_user_invites_tc_user_invitee_id', 'tc_user_invites', 'invitee_id', 
                    'tc_user', 'id', "cascade", "restrict");


	}

	public function safeDown()
	{
            $this->dropForeignKey('fk_tc_user_tc_name_title_name_title_id', 'tc_user');
            $this->dropForeignKey('fk_tc_user_invites_tc_user_inviter_id', 'tc_user_invites');
            $this->dropForeignKey('fk_tc_user_invites_tc_user_invitee_id', 'tc_user_invites');

            $this->dropTable('tc_name_title');
            $this->dropTable('tc_time_zone');
            $this->dropTable('tc_user');
            $this->dropTable('tc_user_invites');
	}
}