<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sites extends CI_Controller {


    public function __construct()
    {
       parent::__construct();
	    $this->load->model('Site_model');

    }

	public function index()
	{
			redirect("Dashboard");
	}

	public function Create_site()
	{
		$data = $this->session->userdata('user_login_data');
    $org_id = $data['org_id'];


		$data = array(
			'org_id' => $org_id

		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('create_site',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}

  public function save_tower()
  {

    $tower_code = $this->security->xss_clean($this->input->post('tower_code'));
    $tower_name = $this->security->xss_clean($this->input->post('tower_name'));
    $tower_location = $this->security->xss_clean($this->input->post('tower_location'));
    $remarks = $this->security->xss_clean($this->input->post('remarks'));

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $date = date('Y-m-d H:i:s');

    // add main persons data
    $tower_data = array(
    'tower_code' => $tower_code,
    'tower_name' => $tower_name,
    'tower_location' => $tower_location,
    'remarks' => $remarks,
    'tower_status' => 1,
    'create_date' => $date,
    'create_user' => $user_id
    );


    $data_result1 = $this->Site_model->insert_tower($tower_data);

    if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Insert New Tower');
      redirect("Sites/tower_manager");
    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
        redirect("Sites/Create_tower");
    }

  } // end add function....tower_manager.php

  public function tower_manager()
  {

    $all_towers = $this->Site_model->get_all_towers();

    $data = array(
      'get_all_towers' => $all_towers
    );

    $this->load->view('template/header');
    $this->load->view('template/menu');
    $this->load->view('template/top');
    $this->load->view('tower_manager',$data);
    $this->load->view('template/footer');
    $this->load->view('template/support');
  }


  public function edit_tower()
  {
    $tower_id = $this->uri->segment(3);
    $get_tower_details = $this->Site_model->get_tower_details($tower_id);

    $data = array(
      'get_tower_details' => $get_tower_details
    );

    $this->load->view('template/header');
    $this->load->view('template/menu');
    $this->load->view('template/top');
    $this->load->view('update_tower',$data);
    $this->load->view('template/footer');
    $this->load->view('template/support');
  }


  public function update_tower_details()
  {

    $tower_id = $this->security->xss_clean($this->input->post('tower_id'));
    $tower_code = $this->security->xss_clean($this->input->post('tower_code'));
    $tower_name = $this->security->xss_clean($this->input->post('tower_name'));
    $tower_location = $this->security->xss_clean($this->input->post('tower_location'));
    $remarks = $this->security->xss_clean($this->input->post('remarks'));

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $date = date('Y-m-d H:i:s');

    // add main persons data
    $tower_data = array(
    'tower_code' => $tower_code,
    'tower_name' => $tower_name,
    'tower_location' => $tower_location,
    'remarks' => $remarks,
    'tower_status' => 1,
    'update_date' => $date,
    'update_user' => $user_id
    );


    $data_result1 = $this->Site_model->update_tower_details($tower_id,$tower_data);

    if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Updated Tower Details');
      redirect("Sites/tower_manager");
    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
        redirect("Sites/edit_tower/$tower_id");
    }

  } // end add function....tower_manager.php



  function delete_tower(){


    $tower_id = $this->uri->segment(3);

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $create_date = date("Y-m-d H:i:s");


    $tower_data = array(
      'tower_status' => 0,
      'update_date' => $date,
      'update_user' => $user_id
    );


    $data_result1 = $this->Site_model->update_tower_details($tower_id,$tower_data);

    if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', ' Tower Details Deleted');
      redirect("Sites/tower_manager");
    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
        redirect("Sites/edit_tower/$tower_id");
    }

  }


  public function add_services_providers()
	{
      $get_tower_details = $this->Site_model->get_active_towers();
      $get_sp = $this->Site_model->get_active_service_providers();

		$data = array(
      'get_tower_details' => $get_tower_details,
      'get_sp' => $get_sp
		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('add_service_provider',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}



  public function save_tower_data()
  {

    $tower_id = $this->security->xss_clean($this->input->post('tower_id'));
    $sp = $this->security->xss_clean($this->input->post('sp'));
    $ref_code = $this->security->xss_clean($this->input->post('ref_code'));
    $contact_p_name = $this->security->xss_clean($this->input->post('contact_p_name'));
    $contact_number_land = $this->security->xss_clean($this->input->post('contact_number_land'));
    $contact_number_mobile = $this->security->xss_clean($this->input->post('contact_number_mobile'));
    $contact_number_any = $this->security->xss_clean($this->input->post('contact_number_any'));
    $email = $this->security->xss_clean($this->input->post('email'));

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $date = date('Y-m-d H:i:s');

    // add main persons data
    $tower_data = array(
    'tower_id' => $tower_id,
    'sp_id' => $sp,
    'ref_code' => $ref_code,
    'contact_person' => $contact_p_name,
    'tel_no1' => $contact_number_land,
    'tel_no2' => $contact_number_mobile,
    'tel_no3' => $contact_number_any,
    'email' => $email,
    'sp_data_status' => 1,
    'create_date' => $date,
    'create_user' => $user_id
    );


    $data_result1 = $this->Site_model->insert_tower_data($tower_data);

    if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Insert Tower Data');
      redirect("Sites/tower_data_manager");
    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
        redirect("Sites/add_services_providers");
    }

  } // end add function....tower_manager.php


  public function tower_data_manager()
  {

    $all_towers_data = $this->Site_model->get_all_tower_details();

    $data = array(
      'all_towers_data' => $all_towers_data
    );

    $this->load->view('template/header');
    $this->load->view('template/menu');
    $this->load->view('template/top');
    $this->load->view('tower_data_manager',$data);
    $this->load->view('template/footer');
    $this->load->view('template/support');
  }


    public function update_tower_data()
  	{
        $tower_data_id = $this->uri->segment(3);
        $get_tower_details = $this->Site_model->get_active_towers();
        $get_sp = $this->Site_model->get_active_service_providers();

        $get_tower_data = $this->Site_model->get_tower_data_byID($tower_data_id);

  		$data = array(
        'get_tower_details' => $get_tower_details,
        'get_sp' => $get_sp,
        'get_tower_data' => $get_tower_data
  		);

  		$this->load->view('template/header');
  		$this->load->view('template/menu');
  		$this->load->view('template/top');
  		$this->load->view('update_service_provider',$data);
  		$this->load->view('template/footer');
  		$this->load->view('template/support');
  	}


      public function save_update_tower_data()
      {
        $tower_data_id = $this->security->xss_clean($this->input->post('tower_data_id'));
        $tower_id = $this->security->xss_clean($this->input->post('tower_id'));
        $sp = $this->security->xss_clean($this->input->post('sp'));
        $ref_code = $this->security->xss_clean($this->input->post('ref_code'));
        $contact_p_name = $this->security->xss_clean($this->input->post('contact_p_name'));
        $contact_number_land = $this->security->xss_clean($this->input->post('contact_number_land'));
        $contact_number_mobile = $this->security->xss_clean($this->input->post('contact_number_mobile'));
        $contact_number_any = $this->security->xss_clean($this->input->post('contact_number_any'));
        $email = $this->security->xss_clean($this->input->post('email'));

        $data = $this->session->userdata('user_login_data');
        $user_id = $data['login_use_id'];
        $date = date('Y-m-d H:i:s');

        // add main persons data
        $tower_data = array(
        'tower_id' => $tower_id,
        'sp_id' => $sp,
        'ref_code' => $ref_code,
        'contact_person' => $contact_p_name,
        'tel_no1' => $contact_number_land,
        'tel_no2' => $contact_number_mobile,
        'tel_no3' => $contact_number_any,
        'email' => $email,
        'sp_data_status' => 1,
        'update_date' => $date,
        'update_user' => $user_id
        );


        $data_result1 = $this->Site_model->update_tower_data($tower_data_id,$tower_data);

        if($data_result1 > 0){
          $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Update Tower Data');
          redirect("Sites/tower_data_manager");
        }
        else{
          $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
            redirect("Sites/update_tower_data/$tower_data_id");
        }

      } // end add function....tower_manager.php


      function delete_tower_data(){


          $tower_data_id = $this->uri->segment(3);

          $data = $this->session->userdata('user_login_data');
          $user_id = $data['login_use_id'];
          $create_date = date("Y-m-d H:i:s");


          $tower_data = array(
            'sp_data_status' => 0,
            'update_date' => $date,
            'update_user' => $user_id
            );


            $data_result1 = $this->Site_model->update_tower_data($tower_data_id,$tower_data);

            if($data_result1 > 0){
              $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Delete Tower Data');
              redirect("Sites/tower_data_manager");
            }
            else{
              $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
               redirect("Sites/tower_data_manager");
            }

          }


}
