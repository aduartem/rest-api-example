<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 * @author  Andres Duarte M.
 *
 */
class Migration_initial_schema extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type'           => 'BIGINT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type'          => 'VARCHAR',
                'constraint'    => 40,
            ),
            'body' => array(
                'type'          => 'TEXT'
            ),
            'created' => array(
                'type'          => 'DATETIME'
            ),
            'last_update' => array(
                'type'          => 'DATETIME',
                'null'          => TRUE
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('notes');

        // $this->dbforge->add_field(array(
        //     'id' => array(
        //         'type'           => 'BIGINT',
        //         'unsigned'       => TRUE,
        //         'unique'         => TRUE,
        //         'auto_increment' => TRUE
        //     ),
        //     'user' => array(
        //         'type'          => 'VARCHAR',
        //         'constraint'    => 40,
        //     ),
        //     'password' => array(
        //         'type'          => 'VARCHAR',
        //         'constraint'    => 30,
        //     )
        // ));
        // $this->dbforge->add_key('user', TRUE);
        // $this->dbforge->create_table('ws_users');
    }

    public function down()
    {
        $this->dbforge->drop_table('notes');
        // $this->dbforge->drop_table('ws_users');
    }
}