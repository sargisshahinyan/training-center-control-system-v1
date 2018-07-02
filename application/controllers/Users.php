<?php

/**
 * Created by IntelliJ IDEA.
 * User: shahi
 * Date: 12.04.2017
 * Time: 23:53
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
    private $keys = ["login", "password", "type"];

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
        $users = $this->user->get_users();

        $this->load->view("header");
        $this->load->view("admin_navbar", [
            "target" => 2
        ]);
        $this->load->view("users", [
            "users" => $users
        ]);
        $this->load->view("footer");
    }

    public function get_user($id) {
        echo json_encode($this->user->get_users($id));
    }

    public function add_user() {
        $data = $this->input->post(NULL, TRUE);
        $keys = ["login", "password", "type"];

        $this->data_analysis($data, $this->keys);

        $user = $this->user->add_user($data);

        if(!$user) {
            header("User is not added", true, 403);
            echo json_encode("User is not added");
            return;
        }

        echo json_encode($user);
    }

    public function edit_user($id) {
        $data = $this->input->post(NULL, TRUE);

        $this->data_analysis($data, $this->keys);
        $data["id"] = $id;

        $user = $this->user->edit_user($data);

        if(!$user) {
            header("User is not edited", true, 403);
            echo json_encode("User is not edited");
            return;
        }

        echo json_encode($user);
    }

    public function delete_user($id) {
        $result = $this->user->delete_user($id);

        if(!$result) {
            header("User is not deleted", true, 400);
            echo "User is not deleted";
        } else {
            echo "User deleted successfully";
        }
    }

    private function data_analysis($data, $keys) {
        foreach ($keys as $key) {
            if(!array_key_exists($key, $data)) {
                header("$key is not defined", true, 403);
                echo json_encode("$key is not defined");
                exit();
            }

            if(empty($data[$key]) && $data[$key] != 0) {
                header("$key is empty", true, 403);
                echo json_encode("$key is empty");
                exit();
            }
        }
    }
}
