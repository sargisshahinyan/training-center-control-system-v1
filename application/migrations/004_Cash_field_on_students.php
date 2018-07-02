<?php
/**
 * Created by IntelliJ IDEA.
 * User: shahi
 * Date: 3/12/2018
 * Time: 1:30 AM
 */

class Migration_Cash_field_on_students extends CI_Migration
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function up()
	{
		$this->db->query("ALTER TABLE `students` ADD `cash` INT NOT NULL");
	}

	public function down()
	{
		$this->db->query("ALTER TABLE `students` DROP COLUMN `cash`");
	}
}
