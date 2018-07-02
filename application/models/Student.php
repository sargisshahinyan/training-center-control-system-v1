<?php
/**
 * Created by IntelliJ IDEA.
 * User: shahi
 * Date: 2/1/2018
 * Time: 3:50 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Model
{
	private $keys = [
		'name', 'surname', 'middlename',
		'birthDate', 'registrationDate', 'passport',
		'passportDate', 'passportFrom', 'address',
		'firstPhone', 'secondPhone', 
		'active', 'complete', 'branch', 'cash'
	];

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_student($id = NULL) {
		if(!$id) {
			return $id;
		}

		$this->db->select('
		`students`.`id`, `students`.`name`, `surname`, `middlename`, 
		`birthDate`, `registrationDate`, `passport`, 
		`passportDate`, `passportFrom`, `students`.`address`, 
		`students`.`cash`, 
		`firstPhone`, `secondPhone`, `active`, `complete`, 
		`branch`, `branches`.`name` as branchName, 
		`HVHH`, `branches`.`address` as branchAddress, `bank`, 
		`account`, `phone`, `head`, `headPassport`, `headPassportDate`, 
		`headPassportFrom`, addressInfo');
		$this->db->join('branches', 'branches.id = students.branch');
		$response = $this->db->get_where('students', array('`students`.id' => $id));

		$student = $response->num_rows() ? $response->row_array() : [];

		if(!empty($student)) {
			$student['payments'] = $this->db->get_where('payments', ['studentId' => $student['id']])->result_array();
		}

		return $student;
	}

	public function get_active_students(array $config) {
		$limit = isset($config['limit']) && (int)$config['limit'] ? $config['limit'] : 50;
		$offset = isset($config['offset']) && (int)$config['offset'] ? $config['offset'] : 0;

		$this->db->where(['active' => '1', 'complete' => '0']);
		
		if(!empty($config['branch']) && (int)$config['branch']) {
			$this->db->where(['branch' => $config['branch']]);
		}
		
		$response = $this->db->get('students', $limit, $offset);

		$students = $response->result_array();

		if(!empty($students)) {
			foreach ($students as &$student) {
				$this->db->order_by('paymentDate', 'asc');
				$payments = $this->db->get_where('payments', ['studentId' => $student['id']])->result_array();

				$student['payments'] = empty($payments) ? [] : $payments;
			}
		}

		return isset($students[0]) ? $students : [];
	}

	public function get_archived_students(array $config) {
		$limit = isset($config["limit"]) && (int)$config["limit"] ? $config["limit"] : 50;
		$offset = isset($config["offset"]) && (int)$config["offset"] ? $config["offset"] : 0;

		$this->db->where('(active = 0 OR complete = 1)');
		if(!empty($config['branch']) && (int)$config['branch']) {
			$this->db->where('branch', $config['branch']);
		}

		$response = $this->db->get('students', $limit, $offset);

		$students = $response->result_array();

		foreach ($students as &$student) {
			$payments = $this->db->get_where('payments', ['studentId' => $student['id']])->result_array();
			$student['payments'] = empty($payments) ? [] : $payments;
		}

		return isset($students[0]) ? $students : null;
	}

	public function add_student(array $data) {
		$student = [];

		foreach($this->keys as $key) {
			if(!empty($data[$key]) || $data[$key] == "0") {
				$student[$key] = $data[$key];
			}
		}

		$res = $this->db->insert("students", $student);

		if(!$res) {
			return null;
		}

		$id = $this->db->insert_id();

		return $this->get_student($id);
	}

	public function edit_student($id, array $data) {
		$student = [];

		foreach($this->keys as $key) {
			if(!empty($data[$key]) || $data[$key] == "0") {
				$student[$key] = $data[$key];
			}
		}

		$this->db->where(["id" => $id]);
		$res = $this->db->update("students", $student);

		if(!$res) {
			return null;
		}

		return $this->get_student($id);
	}
}
