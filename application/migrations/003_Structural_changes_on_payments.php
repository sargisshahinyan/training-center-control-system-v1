<?php
/**
 * Created by IntelliJ IDEA.
 * User: shahi
 * Date: 2/16/2018
 * Time: 1:05 AM
 */

class Migration_Structural_changes_on_payments extends CI_Migration {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function up()
	{
		$this->db->query('DROP TABLE payment_days');
		$this->db->query('ALTER TABLE `payments` CHANGE `cash` `cash` INT(11) NULL');
		$this->db->query('ALTER TABLE `payments` ADD `payedDate` DATE NULL AFTER `paymentDate`, ADD `payed` TINYINT(1) NOT NULL DEFAULT \'0\' AFTER `payedDate`');
	}

	public function down()
	{
		$this->db->query('
			CREATE TABLE `payment_days` (
			  `id` int(11) NOT NULL,
			  `studentId` int(11) NOT NULL,
			  `date` date NOT NULL,
			  `payed` tinyint(1) NOT NULL DEFAULT \'0\',
			  `comment` tinytext
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		');
		$this->db->query('ALTER TABLE `payments` CHANGE `cash` `cash` INT(11) NOT NULL');
		$this->db->query('ALTER TABLE `payments` DROP COLUMN `payedDate`, DROP COLUMN `payed`');
	}
}
