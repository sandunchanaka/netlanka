<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employeer extends CI_Controller {


    public function __construct()
    {
       parent::__construct();
	     $this->load->model('Organization_model');
       $this->load->model('Employeer_model');

    }

	public function index()
	{
			redirect("Dashboard");
	}

	public function Create_employeer()
	{
    $data = $this->session->userdata('user_login_data');
    $user_level = $data['user_level'];

    $get_all_organizations = $this->Organization_model->get_active_organizations();
    $get_all_appoinment = $this->Employeer_model->get_all_appoinment();
    if($user_level == 1){
      $get_all_user_levels = $this->Employeer_model->get_all_user_levels();
    }elseif($user_level == 2){
      $get_all_user_levels = $this->Employeer_model->get_user_levels_notin(1);
    }elseif($user_level == 3){
      $get_all_user_levels = $this->Employeer_model->get_user_levels_notin('1,2');
    }else{
      $get_all_user_levels = $this->Employeer_model->get_user_levels_notin('1,2,3');
    }

    $data = array(
			'get_all_organizations' => $get_all_organizations,
      'get_all_appoinment' => $get_all_appoinment,
      'get_all_user_levels' => $get_all_user_levels
		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('add_new_employeer',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}


  public function save_employeer()
  {

    $org_id = $this->security->xss_clean($this->input->post('org'));
    $branch = $this->security->xss_clean($this->input->post('branch'));
    $depot = $this->security->xss_clean($this->input->post('depot'));
    $emp_no = $this->security->xss_clean($this->input->post('emp_no'));
    $name_with_initial = $this->security->xss_clean($this->input->post('name_with_initial'));
    $full_name = $this->security->xss_clean($this->input->post('full_name'));
    $emp_addr = $this->security->xss_clean($this->input->post('emp_addr'));
    $nic = $this->security->xss_clean($this->input->post('nic'));
    $dob = $this->security->xss_clean($this->input->post('dob'));
    $contact_number_home = $this->security->xss_clean($this->input->post('contact_number_home'));
    $contact_number_mobile = $this->security->xss_clean($this->input->post('contact_number_mobile'));
    $email= $this->security->xss_clean($this->input->post('email'));
    $spouse_name = $this->security->xss_clean($this->input->post('spouse_name'));
    $spouse_nic = $this->security->xss_clean($this->input->post('spouse_nic'));
    $txt_user_name = $this->security->xss_clean($this->input->post('txt_user_name'));
    $txt_passward= $this->security->xss_clean($this->input->post('txt_passward'));
    $retype_password= $this->security->xss_clean($this->input->post('retype_password'));
    $appoinment= $this->security->xss_clean($this->input->post('appoinment'));
    $userlevel= $this->security->xss_clean($this->input->post('userlevel'));

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $date = date('Y-m-d H:i:s');

    if($txt_passward != $retype_password){
      $this->session->set_flashdata('flsh_msg_add_new_e', 'Password Mismatch');
      redirect("Employeer/Create_employeer");
    }

    	$encrypassword = hash('ripemd160', $txt_passward);

    // add main persons data
    $emp_data = array(
    'org_id' => $org_id,
    'branch_id' => $branch,
    'depot_id' => $depot,
    'emp_code' => $emp_no,
    'emp_name' => $name_with_initial,
    'emp_full_name' => $full_name,
    'emp_address' => $emp_addr,
    'emp_nic' => $nic,
    'emp_birth' => $dob,
    'emp_contact1' => $contact_number_home,
    'emp_contact2' => $contact_number_mobile,
    'emp_email' => $email,
    'spouse_name' => $spouse_name,
    'spouse_nic' => $spouse_nic,
    'appointment' => $appoinment,
    'user_name' => $txt_user_name,
    'pass' => $encrypassword,
    'user_type' => $userlevel,
    'emp_status' => 1,
    'create_date' => $date,
    'create_user' => $user_id
    );


    $data_result1 = $this->Employeer_model->insert_employeer($emp_data);

    if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Insert Employeer');
      redirect("Employeer/employeer_manager");
    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
        redirect("Employeer/Create_employeer");
    }

  } // end add function....


  public function employeer_manager()
  {
    $data = $this->session->userdata('user_login_data');
    $org_id = $data['org_id'];
    $userlevel = $data['user_level'];
    $office_id = $data['office_id'];
    $depot_id = $data['depot_id'];
    $userid = $data['login_use_id'];

    if($userlevel == 1){
      $all_employeers = $this->Employeer_model->get_all_employeers();
    }elseif($userlevel ==2){
      $all_employeers = $this->Employeer_model->get_all_employeers_by_org($org_id);
    }elseif($userlevel ==3){
      $all_employeers = $this->Employeer_model->get_all_employeers_by_office($office_id);
    }elseif($userlevel ==4){
      //$all_employeers = $this->Employeer_model->get_all_employeers_deport($depot_id);
      $all_employeers = $this->Employeer_model->get_my_details($userid);
    }else{
      $all_employeers = $this->Employeer_model->get_all_employeers();
    }



    $data = array(
      'get_all_employeers' => $all_employeers,
      'user_level' => $userlevel
    );

    $this->load->view('template/header');
    $this->load->view('template/menu');
    $this->load->view('template/top');
    $this->load->view('employeer_manager',$data);
    $this->load->view('template/footer');
    $this->load->view('template/support');
  }


  public function update_employeer()
  {
    $emp_id = $this->uri->segment(3);
    $get_all_organizations = $this->Organization_model->get_active_organizations();
    $get_all_appoinment = $this->Employeer_model->get_all_appoinment();
    $get_all_employeers = $this->Employeer_model->get_employeer_details($emp_id);
    $get_all_branches = $this->Organization_model->get_active_offices($get_all_employeers[0]['org_id']);
    $get_all_depot = $this->Organization_model->get_active_depot($get_all_employeers[0]['branch_id']);

    $data = $this->session->userdata('user_login_data');
    $user_level = $data['user_level'];

    //echo $user_level;

    if($user_level == 1){
      $get_all_user_levels = $this->Employeer_model->get_all_user_levels();
    }elseif($user_level == 2){
      $get_all_user_levels = $this->Employeer_model->get_user_levels_notin(1);
    }elseif($user_level == 3){
      $get_all_user_levels = $this->Employeer_model->get_user_levels_notin('1,2');
    }else{
      $get_all_user_levels = $this->Employeer_model->get_user_levels_notin('1,2,3');
    }

    $data = array(
      'get_all_organizations' => $get_all_organizations,
      'get_all_appoinment' => $get_all_appoinment,
      'get_all_employeers' => $get_all_employeers,
      'get_all_branches' => $get_all_branches,
      'get_all_depot' => $get_all_depot,
      'get_all_user_levels' => $get_all_user_levels
    );

    $this->load->view('template/header');
    $this->load->view('template/menu');
    $this->load->view('template/top');
    $this->load->view('update_employeer',$data);
    $this->load->view('template/footer');
    $this->load->view('template/support');
  }



  public function save_update_data()
  {
    $emp_id = $this->security->xss_clean($this->input->post('emp_id'));
    $org_id = $this->security->xss_clean($this->input->post('org'));
    $branch = $this->security->xss_clean($this->input->post('branch'));
    $depot = $this->security->xss_clean($this->input->post('depot'));
    $emp_no = $this->security->xss_clean($this->input->post('emp_no'));
    $name_with_initial = $this->security->xss_clean($this->input->post('name_with_initial'));
    $full_name = $this->security->xss_clean($this->input->post('full_name'));
    $emp_addr = $this->security->xss_clean($this->input->post('emp_addr'));
    $nic = $this->security->xss_clean($this->input->post('nic'));
    $dob = $this->security->xss_clean($this->input->post('dob'));
    $contact_number_home = $this->security->xss_clean($this->input->post('contact_number_home'));
    $contact_number_mobile = $this->security->xss_clean($this->input->post('contact_number_mobile'));
    $email= $this->security->xss_clean($this->input->post('email'));
    $spouse_name = $this->security->xss_clean($this->input->post('spouse_name'));
    $spouse_nic = $this->security->xss_clean($this->input->post('spouse_nic'));
    $txt_user_name = $this->security->xss_clean($this->input->post('txt_user_name'));
    $appoinment= $this->security->xss_clean($this->input->post('appoinment'));
    $userlevel= $this->security->xss_clean($this->input->post('userlevel'));

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $date = date('Y-m-d H:i:s');
    $org_id = $data['org_id'];

  /*  if($txt_passward != $retype_password){
      $this->session->set_flashdata('flsh_msg_add_new_e', 'Password Mismatch');
      redirect("Employeer/Create_employeer");
    } */

    // add main persons data
    $emp_data = array(
    'org_id' => $org_id,
    'branch_id' => $branch,
    'depot_id' => $depot,
    'emp_code' => $emp_no,
    'emp_name' => $name_with_initial,
    'emp_full_name' => $full_name,
    'emp_address' => $emp_addr,
    'emp_nic' => $nic,
    'emp_birth' => $dob,
    'emp_contact1' => $contact_number_home,
    'emp_contact2' => $contact_number_mobile,
    'emp_email' => $email,
    'spouse_name' => $spouse_name,
    'spouse_nic' => $spouse_nic,
    'appointment' => $appoinment,
    'user_name' => $txt_user_name,
    'user_type' => $userlevel,
    'emp_status' => 1,
    'update_date' => $date,
    'update_user' => $user_id
    );


    $data_result1 = $this->Employeer_model->update_employer($emp_id,$emp_data);

    if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Update Employeer Details');

        redirect("Employeer/employeer_manager");


    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
        redirect("Employeer/update_employeer/$emp_id");
    }

  } // end add function....

  function delete_employeer(){


    $emp_id = $this->uri->segment(3);

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $create_date = date("Y-m-d H:i:s");


    $emp_data = array(
      'emp_status' => 0,
      'update_date' => $date,
      'update_user' => $user_id
    );


    $data_result1 = $this->Employeer_model->update_employer($emp_id,$emp_data);

    if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Update Employeer Details');
      redirect("Employeer/employeer_manager");
    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
        redirect("Employeer/update_employeer/$emp_id");
    }

  }



}
