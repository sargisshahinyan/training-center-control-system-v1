<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->model("user");

        if ($this->user->check_user()) {
            header("Location:/home");
        }
    }

    public function index() {
        $this->load->view("header");
        $this->load->view("login");
        $this->load->view("footer");
    }
}