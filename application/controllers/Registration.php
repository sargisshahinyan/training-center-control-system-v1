<?php
/**
 * Created by IntelliJ IDEA.
 * User: shahi
 * Date: 2/1/2018
 * Time: 4:42 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model("user");

		if (!$this->user->check_user() || !$this->user->is_admin()) {
			header("Location:/main");
			exit();
		}
	}

	public function index() {
		$this->load->view("header");
		$this->load->view("admin_navbar", [
			"target" => 1
		]);
		$this->load->view("student_form");
		$this->load->view("footer");
	}
}
