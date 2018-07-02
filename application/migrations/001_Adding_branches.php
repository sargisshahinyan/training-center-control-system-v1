<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Adding_branches extends CI_Migration {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

    public function up() {
        $this->db->query("
            CREATE TABLE `branches` (
              id INT NOT NULL PRIMARY KEY,
              name VARCHAR(50) NOT NULL,
              HVHH varchar(8) NOT NULL,
              address TINYTEXT NOT NULL,
              bank TINYTEXT NOT NULL,
              account VARCHAR(12) NOT NULL,
              phone VARCHAR(12) NOT NULL,
              head VARCHAR(30) NOT NULL
            )
        ");
        $this->db->query("
            INSERT INTO `branches` (`id`, `name`, `HVHH`, `address`, `bank`, `account`, `phone`, `head`) VALUES 
            (1, '«Կոլիբրիլաբ» ՍՊԸ', '00117641', 'ք.Երևան, Տիգրան Մեծ 49', '«Հայէկոնոմբանկ» ԲԲԸ', '163288041714', '010 57 39 26', 'Ռաֆայել Հարությունյան'),
            (2, '«Կոլիբրի ուսումնական կենտրոն» ՍՊԸ', '00472174', 'ք.Երևան, Կողբացի 42', '«Հայէկոնոմբանկ» ԲԲԸ', '163288051473', '010 53 72 59', 'Անի Բերբերյան')
        ");

		$this->db->query("ALTER TABLE `students` ADD `branch` INT NOT NULL AFTER `complete`");
	}

    public function down() {
        $this->db->query("DROP TABLE `branches`");
		$this->db->query("ALTER TABLE `students` DROP COLUMN `branch`");
    }
}
