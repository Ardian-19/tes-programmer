<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index() {
        $this->load->view('login');
    }

    public function auth() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->Login_model->login($username, $password);

        if ($user) {
            $this->session->set_userdata('user_id', $user->id);
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Username atau password salah']);
        }
    }
}
?>
