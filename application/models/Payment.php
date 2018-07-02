<?php
/**
 * Created by IntelliJ IDEA.
 * User: shahi
 * Date: 2/1/2018
 * Time: 11:14 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Model
{
	private $keys = ['paymentDate', 'cash', 'studentId', 'comment', 'payedDate', 'payed'];

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_payment($id = NULL) {
		if(!$id) {
			return $id;
		}

		$response = $this->db->get_where('payments', array('id' => $id));

		return $response->num_rows() ? $response->row_array() : null;
	}

	public function get_payments(array $config) {
		$limit = isset($config["limit"]) && (int)$config["limit"] ? $config["limit"] : 10;
		$offset = isset($config["offset"]) && (int)$config["offset"] ? $config["offset"] : 0;

		$response = $this->db->get('payments', $limit, $offset);

		$payments = $response->result_array();

		return isset($payments[0]) ? $payments : null;
	}

	public function add_payment(array $data) {
		$payment = [];

		foreach($this->keys as $key) {
			if(isset($data[$key]) && (!empty($data[$key]) || $data[$key] == "0")) {
				$payment[$key] = $data[$key];
			}
		}

		$res = $this->db->insert("payments", $payment);

		if(!$res) {
			return null;
		}

		$id = $this->db->insert_id();

		return $this->get_payment($id);
	}

	public function edit_payment($id, array $data) {
		$payment = [];

		foreach($this->keys as $key) {
			if(isset($data[$key]) && (!empty($data[$key]) || $data[$key] == "0")) {
				$payment[$key] = $data[$key];
			}
		}

		$this->db->where(["id" => $id]);
		$res = $this->db->update("payments", $payment);

		if(!$res) {
			return null;
		}

		return $this->get_payment($id);
	}

	public function delete_payment($id) {
		$this->db->where(["id" => $id]);
		return $this->db->delete("payments");
	}

	public function get_payment_days($studentId) {
		$result = $this->db->get_where('payments', ['studentId' => $studentId]);

		return $result->num_rows() ? $result->result_array() : null;
	}

	public function generate_payment_days($student, $days = 6, $date = NULL) {
		$date = $date ? $date : $student['registrationDate'];

		for($i = 0; $i < $days; $i++) {
			$this->add_payment_day([
				'studentId' => $student['id'],
				'date' => date('Y-m-d', strtotime("+$i month", strtotime($date)))
			]);
		}
	}

	public function add_payment_day(array $data) {
		$this->db->insert('payments', [
			'studentId' => $data['studentId'],
			'paymentDate' => $data['date']
		]);
	}
}
