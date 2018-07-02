<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_users($id = null) {
        $user = $this->session->userdata("anci-48");
        $is_super = $this->db->get_where('super_admin', ['id' => $user])->num_rows();

		$this->db->select('users.id AS id, login, password, admin');

		if(empty($is_super)) {
			$this->db->where('users.id NOT IN (SELECT super_admin.id FROM super_admin)');
		}

		if($id) {
			$this->db->where('id', $id);
		}

        $users = $this->db->get('users')->result_array();

        return isset($users[0]) ? ($id ? $users[0] : $users) : null;
    }
    
    public function get_user($login, $password) {
        $password = md5($password);
        
        $response = $this->db->get_where('users', [
        	'login' => $login,
			'password' => $password
		]);
        
        return $response->num_rows() ? $response->row_array() : null;
    }

    public function set_user($user) {
        $this->session->set_userdata('anci-48', $user["id"]);
        $this->session->set_userdata("pilindo", $user["admin"]);
    }

    public function check_user() {
        return !empty($this->session->userdata("anci-48"));
    }

    public function is_admin() {
        return !empty($this->session->userdata("pilindo"));
    }

    public function forget_user() {
        $this->session->sess_destroy();
    }

    public function add_user($data) {
        $login = $data["login"];
        $password= md5($data["password"]);
        $type= $data["type"];

        $res = $this->db->insert('users', [
        	'login' => $login,
			'password' => $password,
			'admin' => $type
		]);

        if(!$res) {
            return null;
        }

        $id = $this->db->insert_id();

        return $this->get_users($id);
    }

    public function edit_user($data) {
        $id = $data["id"];
        $login = $data["login"];
        $password= md5($data["password"]);
        $type= $data["type"];


        $res = $this->db->where('id', $id)->update('users', [
			'login' => $login,
			'password' => $password,
			'admin' => $type
		]);

        if(!$res) {
            return null;
        }

        $id = $this->db->insert_id();

        return $this->get_users($id);
    }

    public function delete_user($id) {
        $allow = true;

        $result = $this->db->get_where('users', ['admin' => 1], 5, 0);

        switch ($result->num_rows()) {
            case 0:
                $allow = false;
                break;
            case 1:
                $admin = $result->row_array();
                if($admin["id"] == $id) {
                    $allow = false;
                }
                break;
            default:
                $admin = $this->db->get_where('super_admin', ['id' => $id]);
                if(!empty($admin->num_rows())) {
                    $allow = false;
                }
                break;
        }

        return $allow ? $this->db->delete('users', ['id' => $id]) : false;
    }
}
