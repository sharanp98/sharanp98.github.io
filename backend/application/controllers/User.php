<?php
class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
    }

    public function index(){
        echo "Cult-A-Way Dashboard, Please Login.";
    }

    public function login(){
        $this->load->view('login_view');
    }

    public function login_user(){
        if(null==$this->input->post()){
            die('No POST data');
        }

        $user_login = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        );

        $user_data = $this->user_model->login($user_login);

        if($user_data){
            $this->session->set_userdata('user', $user_data);
            echo "Login Successful for user ".$this->session->userdata('user')['username'];
            echo "<br><h1>Dashboard</h1>";
            echo '<br><a href="'.site_url('workshop/add_workshop').'">Add New Event</a>';
        } else {
            die('Login Failed');
        }
    }
}
?>