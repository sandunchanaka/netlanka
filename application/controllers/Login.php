<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


    public function __construct()
    {
       parent::__construct();
	   $this->load->model('User_model');

    }

	public function index()
	{

		$this->load->view('login');
	}

	public function login_validation()
	{

		$username = $this->security->xss_clean($this->input->post('uname'));
		$password = $this->security->xss_clean($this->input->post('password'));
		//password encription
		$password = hash('ripemd160', $password);

		//echo $password; die;

		$user_login_data = array(
        'username' => $username,
        'pass' => $password
		);

		//send data to model
		$data_set = $this->User_model->validate_user_login($user_login_data);
		//print_r($data_set); die;

		if($data_set){
			$user_log_data = array(
									'log_id' => NULL,
									'user_id' => $data_set,
									'log_time' => date("Y-m-d H:i:s"),
									'log_out_time' => ''

									);
			
			$user_log_id = $this->User_model->create_user_log($user_log_data);
			$this->session->set_userdata('user_log_data',$user_log_id);
			redirect('/Dashboard');
			print_r($this->session->all_userdata());
		}
		else{
			redirect('/Login');
		}

	}

	public function user_logout() {
		$user_logout_data = array('log_out_time' => date("Y-m-d H:i:s") );
		$log_id = $this->session->all_userdata();
		//echo $log_id['user_log_data']; die;

		$user_log_id = $this->User_model->update_user_log($user_logout_data,$log_id['user_log_data']);
		$this->session->sess_destroy();
		redirect('Login','refresh');

	}

}// end main class
