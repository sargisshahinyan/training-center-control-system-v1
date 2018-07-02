<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	private $branchId;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('user');

        if (!$this->user->check_user()) {
            header('Location:/main');
            exit();
        }

		$this->load->model('student');
		$this->load->model('payment');
		$this->load->model('branch');

		$this->branchId = $this->input->get('branch', TRUE);
    }

	public function index()
	{
		$page = $this->input->get("page", TRUE);
		$page = !empty($page) && (int)$page ? $page : 0;

		$students = $this->student->get_active_students([
			'limit' => 50,
			'offset' => 50 * $page,
			'branch' => $this->branchId
		]);

		foreach ($students as &$student) {
			$student['payed'] = '1';
			$paymentDays = $this->payment->get_payment_days($student['id']);

			if(empty($paymentDays)) {
				continue;
			}

			foreach ($paymentDays as $paymentDay) {
				if(empty($paymentDay['payed']) && strtotime('now') - strtotime($paymentDay['paymentDate']) > 0) {
					$student['payed'] = '0';
					break;
				}
			}
		}

		$this->show_students($students, 0);
	}

	public function archive()
	{
		$page = $this->input->get('page', TRUE);
		$page = !empty($page) && (int)$page ? $page : 0;

		$students = $this->student->get_archived_students([
			'limit' => 50,
			"offset" => 50 * $page,
			'branch' => $this->branchId
		]);

		$this->show_students($students, 3);
	}

    public function edit_student($id) {
    	if(empty((int)$id)) {
    		exit('Invalid id');
		}

		$student = $this->student->get_student($id);
    	$paymentDays = $this->payment->get_payment_days($id);

		if($this->user->is_admin()) {
			$this->load->view('header');
			$this->load->view('admin_navbar', []);
			$this->load->view('student_form', [
				'student' => $student,
				'paymentDays' => $paymentDays
			]);
			$this->load->view('footer');
		} else {
			echo 'Development';
		}
	}

	private function show_students($students, $nav) {
		$branches = $this->branch->get_branches();

		$this->load->view('header');

		if($this->user->is_admin()) {
			$this->load->view('admin_navbar', [
				'target' => $nav
			]);
		}
		$this->load->view('home', [
			'students' => $students,
			'branches' => $branches,
			'branchId' => $this->branchId
		]);
		$this->load->view('footer');
	}
}
