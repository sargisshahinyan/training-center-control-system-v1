<?php
/**
 * Created by IntelliJ IDEA.
 * User: shahi
 * Date: 2/1/2018
 * Time: 4:54 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller
{
	private	$keys = ['name', 'surname', 'middlename', 'birthDate', 'registrationDate', 'address', 'firstPhone', 'branch', 'cash'];

	public function __construct()
	{
		parent::__construct();

		$this->load->model("user");

		if (!$this->user->check_user()) {
			header("Location:/main");
			exit();
		}

		$this->load->model("student");
		$this->load->model("payment");
	}

	public function add() {
		$data = $this->input->post(NULL, TRUE);

		foreach ($this->keys as $key) {
			if(empty($data[$key]) && $data[$key] !== "0") {
				header("$key is missing", true,403);
				exit("$key is missing");
			}
		}

		$student = $this->student->add_student($data);

		if($student) {
			$this->payment->generate_payment_days($student, 6);
		}

		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function edit($id) {
		$data = $this->input->post(NULL, TRUE);

		if(empty((int)$id)) {
			header("Invalid id", true,403);
			exit("Invalid id");
		}

		foreach ($this->keys as $key) {
			if(empty($data[$key]) && $data[$key] !== '0') {
				header("$key is missing", true,403);
				exit("$key is missing");
			}
		}

		$student = $this->student->edit_student($id, $data);
		$paymentDays = $this->payment->get_payment_days($student['id']);

		if(isset($data['active']) && $data['active'] === '0' || isset($data['complete']) && $data['complete'] === '1') {
			if(!empty($paymentDays)) {
				foreach($paymentDays as $paymentDay) {
					if(empty($paymentDay['payed'])) {
						$this->payment->delete_payment($paymentDay['id']);
					}
				}
			}
		} else {
			if(count($paymentDays) < 6) {
				$this->payment->generate_payment_days($student, 6 - count($paymentDays), date('Y-m-d'));
			}
		}

		header('Location: /home');
	}

	public function generate($id) {
		if(empty((int)$id)) {
			header("Invalid id", true,403);
			exit("Invalid id");
		}

		$student = $this->student->get_student($id);

		if($student) {
			$this->load->view("header");
			$this->load->view("contract", [
				'student' => $student
			]);
			$this->load->view("footer");
		}
	}
}
