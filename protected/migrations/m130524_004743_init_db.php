<?php

class m130524_004743_init_db extends CDbMigration
{
	public function up()
	{
	}

	public function down()
	{
		echo "m130524_004743_init_db does not support migration down.\n";
		return false;
	}

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            $this->createTable('tc_name_title', array(
                'id' => 'pk',
                'title' => 'string not null',
                'description' => 'text'
                ), 'ENGINE=InnoDB');
            
            $this->createTable('tc_user', array(
                'id' => 'pk',
                'username' => 'string not null',
                'password' => 'string not null',
                'name_title_id'=>'int(11) not null',
                'first_name' => 'string not null',
                'last_name' => 'string not null',
                'institution' => 'string not null',
                'create_time' => 'datetime default null',
                'join_time' => 'datetime default null',
                'last_login_time' => 'datetime default null',
                'status' => 'int not null'
                ), 'ENGINE=InnoDB');
            
             $this->createTable('tc_user_invite', array(
                'id' => 'pk',
                'invitee_id' => 'int(11) not null',
                'inviter_id' => 'int(11) not null',
                ), 'ENGINE=InnoDB'
            );
            
            $this->addForeignKey("fk_name_title_user", "tc_user", "name_title_id",
                    "tc_name_title", "id", "cascade", "restrict");
            $this->addForeignKey("fk_user_invitee_user", "tc_user_invites", "invitee_id",
                    "tc_user", "id", "cascade", "restrict");
            $this->addForeignKey("fk_user_inviter_user", "tc_user_invites", "inviter_id",
                    "tc_user", "id", "cascade", "restrict");
             
            $this->createIndex("user_email", "tc_user", "username", true);
            $this->createIndex("name_title", "tc_name_title", "title", true);
	}

	public function safeDown()
	{
            $this->truncateTable("tc_user");
            $this->truncateTable("tc_name_title");
            $this->truncateTable("tc_user_invites");
            
            $this->dropTable("tc_user");
            $this->dropTable("tc_name_title");
            $this->dropTable("tc_user_invites");
	}
}