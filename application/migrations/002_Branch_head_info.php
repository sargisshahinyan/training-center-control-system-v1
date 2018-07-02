<?php
/**
 * Created by IntelliJ IDEA.
 * User: shahi
 * Date: 2/8/2018
 * Time: 1:26 AM
 */

class Migration_Branch_head_info extends CI_Migration {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function up() {
		$this->db->query("ALTER TABLE `branches` ADD `headPassport` VARCHAR(25) NOT NULL");
		$this->db->query("ALTER TABLE `branches` ADD `headPassportDate` DATE NOT NULL");
		$this->db->query("ALTER TABLE `branches` ADD `headPassportFrom` VARCHAR(3) NOT NULL");
		$this->db->query("ALTER TABLE `branches` ADD `addressInfo` VARCHAR(50) NOT NULL");

		$this->db->query("UPDATE `branches` SET headPassport='անձ. AP0616124', headPassportDate='2016-11-03', headPassportFrom='009', addressInfo='3-րդ հարկ' WHERE id=1");
		$this->db->query("UPDATE `branches` SET headPassport='նույն. ք. 006407845', headPassportDate='2017-04-18', headPassportFrom='003', addressInfo='4-րդ հարկ, 6 սեն.' WHERE id=2");
	}

	public function down() {
		$this->db->query("ALTER TABLE `students` DROP COLUMN `headPassport`");
		$this->db->query("ALTER TABLE `students` DROP COLUMN `headPassportDate`");
		$this->db->query("ALTER TABLE `students` DROP COLUMN `headPassportFrom`");
		$this->db->query("ALTER TABLE `students` DROP COLUMN `addressInfo`");
	}
}
