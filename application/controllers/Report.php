<?php
/**
 * Created by IntelliJ IDEA.
 * User: shahi
 * Date: 2/1/2018
 * Time: 4:42 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model("user");

		if (!$this->user->check_user() || !$this->user->is_admin()) {
			header("Location:/main");
			exit();
		}

		$this->load->model('excel');
		$this->load->model('student');
	}

	public function index() {
		$this->load->view("header");
		$this->load->view("admin_navbar", [
			"target" => 4
		]);
		$this->load->view("report");
		$this->load->view("footer");
	}

	public function generate() {
		$year = (int)$this->input->post('year', TRUE);

		if(empty($year)) {
			header("Invalid year", true,403);
			exit("Invalid year");
		}

		$students = $this->student->get_active_students([
			"limit" => 200
		]);

		$data = [
			'A1' => '', 'B1' => 'հունվար', 'C1' => 'փետրվար',
			'D1' => 'մարտ', 'E1' => 'ապրիլ', 'F1' => 'մայիս',
			'G1' => 'հունիս', 'H1' => 'հուլիս', 'I1' => 'օգօստոս',
			'J1' => 'սեպտեմբեր', 'K1' => 'հոկտեմբեր',
			'L1' => 'նոյեմբեր', 'M1' => 'դեկտեմբեր'
		];
		$letters = ['B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M'];

		$month = (int)date('m');
		$currentYear = (int)date('Y');

		if($year > $currentYear) {
			header("Location:/main");
			return;
		} elseif($year < $currentYear) {
			$month = 12;
		}

		$data = array_slice($data, 0, $month + 1);

		foreach ($students as $i => $student) {
			$row['A' . ($i + 2)] = $student['name'] . ' ' . $student['surname'] . ' ' . $student['middlename'];

			for($j = 0; $j < $month; $j++) {
				$row[$letters[$j] . ($i + 2)] = 0;
			}

			foreach ($student['payments'] as $payment) {
				if(empty($payment['payed'])) {
					continue;
				}

				if(explode('-', $payment['payedDate'])[0] == $year) {
					$row[$letters[(int)explode('-', $payment['payedDate'])[1] - 1] . ($i + 2)] += (int)$payment['cash'];
				}
			}

			$data += $row;
		}

		$this->excel->create_file($data, 'report', APPPATH . 'files/');
	}
}
