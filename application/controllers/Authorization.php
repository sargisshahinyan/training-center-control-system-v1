<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorization extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user");
    }
    
    public function login() {
        $login = $this->input->post("login");
        $password = $this->input->post("password");
        
        $user = $this->user->get_user($login, $password);

        if(empty($user)) {
            header("Location:/main");
            return;
        }

        $this->user->set_user($user);
        header('Location:/home');
    }

    public function logout () {
        $this->user->forget_user();
        header('Location:/main');
    }
}