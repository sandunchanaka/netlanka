<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_manager extends CI_Controller {


    public function __construct()
    {
       parent::__construct();
	   $this->load->model('User_model');

    }

	public function index()
	{
		$data = $this->session->userdata('user_login_data');
		$create_user = $data['login_use_id'];
		$user_level = $data['user_level'];

    if($user_level == 1){
     $all_users = $this->User_model->get_all_users();
    }else{
      $all_users = $this->User_model->get_all_users_by_userid($create_user);
    }


		$data = array(
			'all_users' => $all_users,
			'user_level' => $user_level
		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('user_manager',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}



	public function create_new_user()
	{
		$all_user_levels = $this->User_model->get_all_userlevels();


		$data = array(
			'all_user_levels' => $all_user_levels
		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('new_user',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}

	public function add_new_user()
	{

		$reg_number = $this->security->xss_clean($this->input->post('reg_number'));
		$fullname = $this->security->xss_clean($this->input->post('txtname'));
		$username = $this->security->xss_clean($this->input->post('txt_user_name'));
		$password = $this->security->xss_clean($this->input->post('txt_passward'));
		$re_password = $this->security->xss_clean($this->input->post('retype_password'));
		$userlevel = strtoupper($this->security->xss_clean($this->input->post('user_level')));

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $date = date('Y-m-d H:i:s');

		if($password != $re_password){
			$this->session->set_flashdata('flsh_msg_add_new_e', 'Re Entered Password mismatch');
				redirect("user_manager/create_new_user");
		}

		$encrypassword = hash('ripemd160', $password);


		// add main persons data
		$person_data = array(
      'emp_code' => $reg_number,
      'emp_name' => $fullname,
      'user_name' => $username,
      'pass' => $encrypassword,
      'user_type' => $userlevel,
      'emp_status' => 1,
      'create_date' => $date,
      'create_user' => $user_id
		);

		$chkexists = $this->User_model->chk_user($username,$encrypassword);
		//echo $chkexists; die;
		if($chkexists > 0){
			$this->session->set_flashdata('flsh_msg_add_new_e', 'user name or password Already exists');
				redirect("user_manager/create_new_user");
		}

		$data_result1 = $this->User_model->insert_user_data($person_data);

		if($data_result1 > 0){
			redirect("user_manager");
		}
		else{
			$this->session->set_flashdata('flsh_msg_add_new_e', 'error in your code');
				redirect("user_manager/create_new_user");
		}

	} // end add function....



	public function update_user_view()
	{
		$id = $this->uri->segment(3);
		$all_user_data = $this->User_model->get_userdetails($id);

		$all_user_levels = $this->User_model->get_all_userlevels();

		//print_r($all_user_data); die;

		$data = array(

			'all_user_levels' => $all_user_levels,
			'all_user_data' => $all_user_data

		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('edit_user',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}

	public function update_user()
	{
		$id = $this->security->xss_clean($this->input->post('emp_id'));
		$reg_number = $this->security->xss_clean($this->input->post('reg_number'));
		$fullname = $this->security->xss_clean($this->input->post('txtname'));
		$username = $this->security->xss_clean($this->input->post('txt_user_name'));
		$userlevel = strtoupper($this->security->xss_clean($this->input->post('user_level')));
		$userstatus = 1;
    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $date = date('Y-m-d H:i:s');

		// add main persons data
    $person_data = array(
      'emp_id' => $id,
      'emp_code' => $reg_number,
      'emp_name' => $fullname,
      'user_name' => $username,
      'user_type' => $userlevel,
      'emp_status' => 1,
      'update_date' => $date,
      'update_user' => $user_id
		);
		/*echo "<pre>";
		print_r($person_data);
		echo "</pre>";
		die;*/
		//send data to model


		$data_result1 = $this->User_model->update_user_data($person_data);

		if($data_result1 > 0){
			redirect("User_manager");
		}
		else{
			$this->session->set_flashdata('flsh_msg_add_new_e', 'error in your code');
				redirect("user_manager/update_user_view/$id");
		}

	} // end add function...

	public function update_password_view()
	{
		$id = $this->uri->segment(3);
		$all_user_data = $this->User_model->get_userdetails($id);


		$data = array(
			'all_user_data' => $all_user_data

		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('change_password',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}


	public function change_password()
	{
		$id = $this->security->xss_clean($this->input->post('id'));
		$oldpassword = $this->security->xss_clean($this->input->post('oldpassword'));
		$txtoldpassword = $this->security->xss_clean($this->input->post('txt_oldpassward'));
		$password = $this->security->xss_clean($this->input->post('txt_passward'));
		$retypepassword = $this->security->xss_clean($this->input->post('retype_password'));

		$encryoldpassword = hash('ripemd160', $txtoldpassword);

		/*echo $txtoldpassword;
		echo "<br/>";
		echo $oldpassword;
		echo "<br/>";
		echo $encryoldpassword; die;*/

		if($oldpassword != $encryoldpassword){
			$this->session->set_flashdata('flsh_msg_add_new_e', 'Old Password mismatch');
				redirect("user_manager/update_password_view/".$id."");
		}


		if($password != $retypepassword){
			$this->session->set_flashdata('flsh_msg_add_new_e', 'Re Entered Password mismatch');
				redirect("user_manager/update_password_view/".$id."");
		}

		$encrypassword = hash('ripemd160', $password);

		// add main persons data
		$person_data = array(
		'emp_id' => $id,
		'pass' => $encrypassword
		);
		/*echo "<pre>";
		print_r($person_data);
		echo "</pre>";
		die;*/
		//send data to model
		$data_result1 = $this->User_model->update_user_data($person_data);

		if($data_result1 > 0){
			redirect("User_manager");
		}
		else{
			$this->session->set_flashdata('flsh_msg_add_new_e', 'error in your code');
				redirect("user_manager/update_password_view/".$id."");
		}

	} // end add function...


	public function inactive_user()
	{
		$id = $this->uri->segment(3);

		$person_data = array(
		'id' => $id,
		'active_status' => 0
		);

		//print_r($person_data); die;
		$data_result1 = $this->User_model->update_user_data($person_data);

		if($data_result1 > 0){
			$this->session->set_flashdata('flsh_msg_add_new_s', 'successful Inactivate User');
			redirect("User_manager/");
		}
		else{
			$this->session->set_flashdata('flsh_msg_add_new_e', 'error in your code');
				redirect("user_manager/");
		}

	}


	public function activate_user()
		{
		$id = $this->uri->segment(3);

		$person_data = array(
		'id' => $id,
		'active_status' => 1
		);

		//print_r($person_data); die;
		$data_result1 = $this->User_model->update_user_data($person_data);

		if($data_result1 > 0){
			$this->session->set_flashdata('flsh_msg_add_new_s', 'successful Activate User');
			redirect("User_manager/");
		}
		else{
			$this->session->set_flashdata('flsh_msg_add_new_e', 'error in your code');
				redirect("user_manager/");
		}

	} // end add function...


}
