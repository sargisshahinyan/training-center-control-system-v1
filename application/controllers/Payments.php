<?php
/**
 * Created by IntelliJ IDEA.
 * User: shahi
 * Date: 2/1/2018
 * Time: 11:00 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller
{
	private $keys = ['paymentDate', 'cash', 'studentId', 'payedDate'];

	public function __construct()
	{
		parent::__construct();

		$this->load->model("user");

		if (!$this->user->check_user()) {
			header("Location:/main");
			exit();
		}

		$this->load->model("payment");
	}

	public function add() {
		$data = $this->input->post(NULL, TRUE);
		$keys = ['paymentDate'];

		foreach ($keys as $key) {
			if(!isset($data[$key]) || empty($data[$key]) && $data[$key] !== "0") {
				header("$key is missing", true,403);
				exit("$key is missing");
			}
		}

		$payment = $this->payment->add_payment($data);

		echo $payment ? json_encode($payment) : null;
	}

	public function edit($id) {
		$data = $this->input->post(NULL, TRUE);
		$keys = ['payed'];

		if(empty((int)$id)) {
			header("Invalid id", true,403);
			exit("Invalid id");
		}

		foreach ($keys as $key) {
			if(!isset($data[$key]) || empty($data[$key]) && $data[$key] !== "0") {
				header("$key is missing", true,403);
				exit("$key is missing");
			}
		}

		$this->payment->edit_payment($id, $data);

		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
	
	public function delete($id) {
		if(empty((int)$id)) {
			header("Invalid id", true,403);
			exit("Invalid id");
		}

		$result = $this->payment->delete_payment($id);

		echo $result ? $id : null;
	}
}
