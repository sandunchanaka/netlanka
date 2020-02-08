<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bills extends CI_Controller {


    public function __construct()
    {
       parent::__construct();
	    $this->load->model('Job_model');
      $this->load->model('Tower_model');
      $this->load->model('Employeer_model');
      $this->load->model('Organization_model');

    }

	public function index()
	{
			redirect("Dashboard");
	}

	public function Create_bill()
	{

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $date = date('Y-m-d H:i:s');
    $org_id = $data['org_id'];
    $userlevel = $data['user_level'];
    $office_id = $data['office_id'];
    $depot_id = $data['depot_id'];

    $get_jobnos = $this->Job_model->get_accepted_jobnos($user_id);

		$data = array(
      'get_jobnos' => $get_jobnos
		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('create_bill',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}

  public function save_bill()
  {

    $job_id = $this->security->xss_clean($this->input->post('job_id'));
    $job_date = $this->security->xss_clean($this->input->post('job_date'));
    $bill_amount = $this->security->xss_clean($this->input->post('bill_amount'));
    $remarks = $this->security->xss_clean($this->input->post('remarks'));
    $bill_code = $this->security->xss_clean($this->input->post('bill_code'));

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $date = date('Y-m-d H:i:s');
    $org_id = $data['org_id'];
    $userlevel = $data['user_level'];
    $office_id = $data['office_id'];
    $depot_id = $data['depot_id'];

    // add main persons data
    $bill_data = array(
    'job_id' => $job_id,
    'bill_no' => $bill_code,
    'job_date' => $job_date,
    'bill_amount' => $bill_amount,
    'remarks' => $remarks,
    'bill_date' => $date,
    'bill_status' => 1,
    'org_id' => $org_id,
    'office_id' => $office_id,
    'depot_id' => $depot_id,
    'create_user' => $user_id,
    'create_date' => $date
    );


    $data_result1 = $this->Job_model->insert_bills($bill_data);

    if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Insert Bill');
      redirect("Bills/bill_manager");
    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
        redirect("Bills/Create_bill");
    }

  } // end add function....tower_manager.php

  public function bill_manager()
  {

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $org_id = $data['org_id'];
    $userlevel = $data['user_level'];
    $office_id = $data['office_id'];
    $depot_id = $data['depot_id'];


    if($userlevel == 4){
      $all_bills = $this->Job_model->get_all_bills($user_id);
    }else{
      $all_bills = $this->Job_model->get_bills_by_office($office_id);
    }



    $data = array(
      'get_all_bills' => $all_bills,
      'userlevel' => $userlevel
    );

    $this->load->view('template/header');
    $this->load->view('template/menu');
    $this->load->view('template/top');
    $this->load->view('bill_manager',$data);
    $this->load->view('template/footer');
    $this->load->view('template/support');
  }


  public function update_bill()
	{

    $bill_id = $this->uri->segment(3);

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $date = date('Y-m-d H:i:s');
    $org_id = $data['org_id'];
    $userlevel = $data['user_level'];
    $office_id = $data['office_id'];
    $depot_id = $data['depot_id'];

    $get_jobnos = $this->Job_model->get_accepted_jobnos($user_id);

    $get_bill_details = $this->Job_model->get_bill_details($bill_id);

		$data = array(
      'get_jobnos' => $get_jobnos,
      'get_bill_details' => $get_bill_details
		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('update_bill',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}


  public function update_bill_details()
  {
    $job_id = $this->security->xss_clean($this->input->post('job_id'));
    $bill_id = $this->security->xss_clean($this->input->post('bill_id'));
    $job_date = $this->security->xss_clean($this->input->post('job_date'));
    $bill_amount = $this->security->xss_clean($this->input->post('bill_amount'));
    $remarks = $this->security->xss_clean($this->input->post('remarks'));
    $bill_code = $this->security->xss_clean($this->input->post('bill_code'));

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $date = date('Y-m-d H:i:s');
    $org_id = $data['org_id'];
    $userlevel = $data['user_level'];
    $office_id = $data['office_id'];
    $depot_id = $data['depot_id'];

    // add main persons data
    $bill_data = array(
    'bill_no' => $bill_code,
    'job_date' => $job_date,
    'job_id' => $job_id,
    'bill_amount' => $bill_amount,
    'remarks' => $remarks,
    'bill_date' => $date,
    'bill_status' => 1,
    'org_id' => $org_id,
    'office_id' => $office_id,
    'depot_id' => $depot_id,
    'update_user' => $user_id,
    'update_date' => $date
    );


    $data_result1 = $this->Job_model->update_Bill_details($bill_id,$bill_data);

    if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Update Bill');
      redirect("Bills/bill_manager");
    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
        redirect("Bills/update_bill/$bill_id");
    }

  }



  function delete_bill(){


    $bill_id = $this->uri->segment(3);

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $create_date = date("Y-m-d H:i:s");


    $bill_data = array(
    'bill_status' => 0,
    'update_user' => $user_id,
    'update_date' => $create_date
    );


    $data_result1 = $this->Job_model->update_Bill_details($bill_id,$bill_data);

    if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', ' Bill Details Deleted');
      redirect("Bills/bill_manager");
    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
        redirect("Bills/bill_manager");
    }

  }


  public function view_bill_details()
  {

    $bill_id = $this->uri->segment(3);
    $get_bill_details = $this->Job_model->get_bill_details($bill_id);

    $data = array(
      'get_bill_details' => $get_bill_details
    );

    $this->load->view('template/header');
    $this->load->view('template/menu');
    $this->load->view('template/top');
    $this->load->view('view_bill_details',$data);
    $this->load->view('template/footer');
    $this->load->view('template/support');
  }




    function accept_bill(){

      $bill_id = $this->security->xss_clean($this->input->post('bill_id'));


      $data = $this->session->userdata('user_login_data');
      $user_id = $data['login_use_id'];
      $create_date = date("Y-m-d H:i:s");


      $bill_data = array(
      'bill_status' => 2,
      'update_user' => $user_id,
      'update_date' => $create_date
      );

      //echo $bill_id; die;
      $data_result1 = $this->Job_model->update_Bill_details($bill_id,$bill_data);

      if($data_result1 > 0){
        $this->session->set_flashdata('flsh_msg_add_new_s', ' Bill Accepted');
        redirect("Bills/bill_manager");
      }
      else{
        $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
          redirect("Bills/bill_manager");
      }

    }


}
