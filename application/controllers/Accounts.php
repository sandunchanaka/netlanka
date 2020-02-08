<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Controller {


    public function __construct()
    {
       parent::__construct();
	    $this->load->model('Job_model');
      $this->load->model('Tower_model');
      $this->load->model('Employeer_model');
      $this->load->model('Organization_model');

      $this->load->model('Master_data_model');

    }

	public function index()
	{
			redirect("Dashboard");
	}

	public function Create_account()
	{

    $all_sites = $this->Tower_model->get_all_towers();
    $all_job_types = $this->Job_model->get_all_job_types();

    $data = $this->session->userdata('user_login_data');
    $org_id = $data['org_id'];
    $userlevel = $data['user_level'];
    $office_id = $data['office_id'];
    $depot_id = $data['depot_id'];


    if($userlevel == 2){
      $get_active_employeers = $this->Employeer_model->get_active_employeers_by_org($org_id);
    }elseif($userlevel == 3){
      $get_active_employeers = $this->Employeer_model->get_active_employeers($office_id);
    }elseif($userlevel == 4){
      $get_active_employeers = $this->Employeer_model->get_active_employeers_by_deport($depot_id);
    }else{
      $get_active_employeers = $this->Employeer_model->get_employeer_names();
    }

		$data = array(
      'get_sites' => $all_sites,
      'get_job_types' => $all_job_types,
      'get_active_employeers' => $get_active_employeers,
		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('create_account',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}

  public function save_job()
  {

    $job_code = $this->security->xss_clean($this->input->post('job_code'));
    $site = $this->security->xss_clean($this->input->post('site'));
    $job_type = $this->security->xss_clean($this->input->post('job_type'));
    $job_details = $this->security->xss_clean($this->input->post('job_details'));
    $service_person = $this->security->xss_clean($this->input->post('emp_id'));

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $date = date('Y-m-d H:i:s');
    $org_id = $data['org_id'];
    $userlevel = $data['user_level'];
    $office_id = $data['office_id'];
    $depot_id = $data['depot_id'];

    // add main persons data
    $job_data = array(
    'job_number' => $job_code,
    'site_id' => $site,
    'job_type' => $job_type,
    'job_details' => $job_details,
    'service_person' => $service_person,
    'job_status' => 1,
    'org_id' => $org_id,
    'office_id' => $office_id,
    'create_user' => $user_id,
    'create_date' => $date
    );


    $data_result1 = $this->Job_model->insert_job($job_data);

    if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Insert Job');
      redirect("Jobs/job_manager");
    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
        redirect("Jobs/Create_job");
    }

  } // end add function....tower_manager.php

  public function job_manager()
  {

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $org_id = $data['org_id'];
    $userlevel = $data['user_level'];
    $office_id = $data['office_id'];
    $depot_id = $data['depot_id'];

    $all_jobs = $this->Job_model->get_active_jobs($office_id);

    $data = array(
      'get_all_jobs' => $all_jobs
    );

    $this->load->view('template/header');
    $this->load->view('template/menu');
    $this->load->view('template/top');
    $this->load->view('jobs_manager',$data);
    $this->load->view('template/footer');
    $this->load->view('template/support');
  }


  public function update_jobs()
  {
    $job_id = $this->uri->segment(3);
    $get_job_details = $this->Job_model->get_job_details($job_id);

    $all_sites = $this->Tower_model->get_all_towers();
    $all_job_types = $this->Job_model->get_all_job_types();

    $data = $this->session->userdata('user_login_data');
    $org_id = $data['org_id'];
    $userlevel = $data['user_level'];
    $office_id = $data['office_id'];
    $depot_id = $data['depot_id'];


    if($userlevel == 2){
      $get_active_employeers = $this->Employeer_model->get_active_employeers_by_org($org_id);
    }elseif($userlevel == 3){
      $get_active_employeers = $this->Employeer_model->get_active_employeers($office_id);
    }elseif($userlevel == 4){
      $get_active_employeers = $this->Employeer_model->get_active_employeers_by_deport($depot_id);
    }else{
      $get_active_employeers = $this->Employeer_model->get_employeer_names();
    }

		$data = array(
      'get_sites' => $all_sites,
      'get_job_types' => $all_job_types,
      'get_active_employeers' => $get_active_employeers,
      'get_job_details' => $get_job_details
		);



    $this->load->view('template/header');
    $this->load->view('template/menu');
    $this->load->view('template/top');
    $this->load->view('update_job',$data);
    $this->load->view('template/footer');
    $this->load->view('template/support');
  }


  public function update_job_details()
  {
      $job_id = $this->security->xss_clean($this->input->post('job_id'));
    $job_code = $this->security->xss_clean($this->input->post('job_code'));
    $site = $this->security->xss_clean($this->input->post('site'));
    $job_type = $this->security->xss_clean($this->input->post('job_type'));
    $job_details = $this->security->xss_clean($this->input->post('job_details'));
    $service_person = $this->security->xss_clean($this->input->post('emp_id'));

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $date = date('Y-m-d H:i:s');

    // add main persons data
    $job_data = array(
    'job_number' => $job_code,
    'site_id' => $site,
    'job_type' => $job_type,
    'job_details' => $job_details,
    'service_person' => $service_person,
    'job_status' => 1,
    'update_user' => $user_id,
    'update_date' => $date
    );


    $data_result1 = $this->Job_model->update_job_details($job_id,$job_data);

    if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Update Job');
      redirect("Jobs/job_manager");
    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
        redirect("Jobs/update_jobs/$job_id");
    }

  }



  function delete_job(){


    $job_id = $this->uri->segment(3);

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $create_date = date("Y-m-d H:i:s");


    $job_data = array(
    'job_status' => 0,
    'update_user' => $user_id,
    'update_date' => $create_date
    );


    $data_result1 = $this->Job_model->update_job_details($job_id,$job_data);

    if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', ' Job Details Deleted');
      redirect("Jobs/job_manager");
    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
        redirect("Jobs/job_manager");
    }

  }


  public function pending_jobs()
  {
    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $org_id = $data['org_id'];
    $userlevel = $data['user_level'];
    $office_id = $data['office_id'];
    $depot_id = $data['depot_id'];

    $all_jobs = $this->Job_model->get_pending_jobs($user_id);

    $data = array(
      'get_all_jobs' => $all_jobs
    );

    $this->load->view('template/header');
    $this->load->view('template/menu');
    $this->load->view('template/top');
    $this->load->view('pending_jobs',$data);
    $this->load->view('template/footer');
    $this->load->view('template/support');
  }


  public function accepted_jobs()
  {
    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $org_id = $data['org_id'];
    $userlevel = $data['user_level'];
    $office_id = $data['office_id'];
    $depot_id = $data['depot_id'];

    $all_jobs = $this->Job_model->get_accepted_jobs($user_id);

    $data = array(
      'get_all_jobs' => $all_jobs
    );

    $this->load->view('template/header');
    $this->load->view('template/menu');
    $this->load->view('template/top');
    $this->load->view('pending_jobs',$data);
    $this->load->view('template/footer');
    $this->load->view('template/support');
  }


//view_job_details.php
public function job_details()
{
  $data = $this->session->userdata('user_login_data');
  $user_id = $data['login_use_id'];
  $org_id = $data['org_id'];
  $userlevel = $data['user_level'];
  $office_id = $data['office_id'];
  $depot_id = $data['depot_id'];

  $all_jobs = $this->Job_model->get_pending_jobs($user_id);

  $data = array(
    'get_all_jobs' => $all_jobs
  );

  $this->load->view('template/header');
  $this->load->view('template/menu');
  $this->load->view('template/top');
  $this->load->view('view_job_details',$data);
  $this->load->view('template/footer');
  $this->load->view('template/support');
}


public function accept_job_details()
{
    $job_id = $this->security->xss_clean($this->input->post('job_id'));
  $accept = $this->security->xss_clean($this->input->post('action'));
  $remarks = $this->security->xss_clean($this->input->post('remarks'));

  $data = $this->session->userdata('user_login_data');
  $user_id = $data['login_use_id'];
  $date = date('Y-m-d H:i:s');

  if($accept ==1){
    $status =2;
  }else{
    $status == 6;
  }

  // add main persons data
  $job_data = array(
  'remarks' => $remarks,
  'job_status' => $status,
  'update_user' => $user_id,
  'update_date' => $date
  );


  $data_result1 = $this->Job_model->update_job_details($job_id,$job_data);

  if($data_result1 > 0){
    $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Update Job');
    redirect("Jobs/pending_jobs");
  }
  else{
    $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
      redirect("Jobs/job_details/$job_id");
  }

}


function job_complete(){


  $job_id = $this->uri->segment(3);

  $data = $this->session->userdata('user_login_data');
  $user_id = $data['login_use_id'];
  $create_date = date("Y-m-d H:i:s");


  $job_data = array(
  'job_status' => 3,
  'update_user' => $user_id,
  'update_date' => $create_date
  );


  $data_result1 = $this->Job_model->update_job_details($job_id,$job_data);

  if($data_result1 > 0){
    $this->session->set_flashdata('flsh_msg_add_new_s', ' Job Completed');
    redirect("Jobs/job_manager");
  }
  else{
    $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
      redirect("Jobs/job_manager");
  }

}

}
