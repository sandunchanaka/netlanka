<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization extends CI_Controller {


    public function __construct()
    {
       parent::__construct();
	    $this->load->model('Master_data_model');
	    $this->load->model('Organization_model');
	    $this->load->model('User_model');

    }

	public function index()
	{
			redirect("Dashboard");
	}

	public function Create_Organization()
	{
		$all_districts = $this->Master_data_model->get_districts();

		$data = array(
			'all_districts' => $all_districts
		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('create_organization',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}


  public function save_Organization()
	{

		$org_code = $this->security->xss_clean($this->input->post('org_code'));
		$org_name = $this->security->xss_clean($this->input->post('org_name'));
		$org_short_name = $this->security->xss_clean($this->input->post('org_short_name'));
		$org_addr = $this->security->xss_clean($this->input->post('org_addr'));
		$contact_number_land = $this->security->xss_clean($this->input->post('contact_number_land'));
		$contact_number_mobile = $this->security->xss_clean($this->input->post('contact_number_mobile'));
		$contact_number_any = $this->security->xss_clean($this->input->post('contact_number_any'));
		$fax_number = $this->security->xss_clean($this->input->post('fax_number'));
		$email = $this->security->xss_clean($this->input->post('email'));
    $web = $this->security->xss_clean($this->input->post('web'));

    $data = $this->session->userdata('user_login_data');
		$user_id = $data['login_use_id'];
		$date = date('Y-m-d H:i:s');

		// add main persons data
		$org_data = array(
		'org_code' => $org_code,
		'org_name' => $org_name,
		'org_short_name' => $org_short_name,
		'org_address' => $org_addr,
		'org_tel1' => $contact_number_land,
		'org_tel2' => $contact_number_mobile,
		'org_tel3' => $contact_number_any,
		'org_fax' => $fax_number,
		'org_email' => $email,
    'org_web' => $web,
		'org_status' => 1,
		'create_date' => $date,
		'create_user' => $user_id
		);


		$data_result1 = $this->Organization_model->insert_organization($org_data);

		if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Insert New Organization');
			redirect("Organization/organization_manager");
		}
		else{
			$this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
				redirect("Organization/Create_Organization");
		}

	} // end add function....


  public function organization_manager()
	{

		$all_organizations = $this->Organization_model->get_all_organizations();

		$data = array(
			'get_all_organizations' => $all_organizations
		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('organization_manager',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}


  public function update_Organization()
	{

    $orgid = $this->uri->segment(3);

		$get_org_details = $this->Organization_model->get_organizations_byid($orgid);
		//print_r($get_ddc_details); die;

		if(empty($get_org_details)){
			redirect("Organization/organization_manager");

		}

		$data = array(
			'get_org_details' => $get_org_details
		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('update_organization',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}


  public function update_Org()
  {
    $org_id = $this->security->xss_clean($this->input->post('org_id'));
    $org_code = $this->security->xss_clean($this->input->post('org_code'));
    $org_name = $this->security->xss_clean($this->input->post('org_name'));
    $org_short_name = $this->security->xss_clean($this->input->post('org_short_name'));
    $org_addr = $this->security->xss_clean($this->input->post('org_addr'));
    $contact_number_land = $this->security->xss_clean($this->input->post('contact_number_land'));
    $contact_number_mobile = $this->security->xss_clean($this->input->post('contact_number_mobile'));
    $contact_number_any = $this->security->xss_clean($this->input->post('contact_number_any'));
    $fax_number = $this->security->xss_clean($this->input->post('fax_number'));
    $email = $this->security->xss_clean($this->input->post('email'));
    $web = $this->security->xss_clean($this->input->post('web'));

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $date = date('Y-m-d H:i:s');
    $org_id = $data['org_id'];
    $userlevel = $data['user_level'];

    // add main persons data
    $org_data = array(
    'org_code' => $org_code,
    'org_name' => $org_name,
    'org_short_name' => $org_short_name,
    'org_address' => $org_addr,
    'org_tel1' => $contact_number_land,
    'org_tel2' => $contact_number_mobile,
    'org_tel3' => $contact_number_any,
    'org_fax' => $fax_number,
    'org_email' => $email,
    'org_web' => $web,
    'org_status' => 1,
    'update_date' => $date,
    'update_user' => $user_id
    );


    $data_result1 = $this->Organization_model->update_organization($org_id,$org_data);

    if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Update  Details');
      if($userlevel == 1){
        redirect("Organization/organization_manager");
      }else{
        redirect("Organization/update_Organization/$org_id");
      }


    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
        redirect("Organization/Create_Organization");
    }

  } // end add function....


  public function view_Organization_details()
	{

    $orgid = $this->uri->segment(3);

		$get_org_details = $this->Organization_model->get_organizations_byid($orgid);
		//print_r($get_ddc_details); die;

		if(empty($get_org_details)){
			redirect("Organization/organization_manager");

		}

		$data = array(
			'get_org_details' => $get_org_details
		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('update_organization',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}


  function delete_organization(){


		$orgid = $this->uri->segment(3);

		$data = $this->session->userdata('user_login_data');
		$user_id = $data['login_use_id'];
		$create_date = date("Y-m-d H:i:s");


		// add main persons data
		$org_data = array(
      'org_status' => 0,
      'update_date' => $date,
      'update_user' => $user_id
		);

    $data_result1 = $this->Organization_model->update_organization($orgid,$org_data);

    if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Delete  Details');
      redirect("Organization/organization_manager");
    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
        redirect("Organization/organization_manager");
    }

 	}


  public function Create_office()
	{
		$get_all_organizations = $this->Organization_model->get_active_organizations();

		$data = array(
			'get_all_organizations' => $get_all_organizations
		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('create_office',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}


  public function save_office()
	{

		$org_id = $this->security->xss_clean($this->input->post('org'));
		$office_type = $this->security->xss_clean($this->input->post('office'));
    $office_code = $this->security->xss_clean($this->input->post('org_code'));
    $office_name = $this->security->xss_clean($this->input->post('org_name'));
		$office_short_name = $this->security->xss_clean($this->input->post('org_short_name'));
		$office_addr = $this->security->xss_clean($this->input->post('org_addr'));
		$contact_number_land = $this->security->xss_clean($this->input->post('contact_number_land'));
		$contact_number_mobile = $this->security->xss_clean($this->input->post('contact_number_mobile'));
		$contact_number_any = $this->security->xss_clean($this->input->post('contact_number_any'));
		$fax_number = $this->security->xss_clean($this->input->post('fax_number'));
		$email = $this->security->xss_clean($this->input->post('email'));
    $web = $this->security->xss_clean($this->input->post('web'));

    $data = $this->session->userdata('user_login_data');
		$user_id = $data['login_use_id'];
		$date = date('Y-m-d H:i:s');

		// add main persons data
		$org_data = array(
    'org_id' => $org_id,
  	'org_type' => $office_type,
  	'office_code' => $office_code,
		'office_name' => $office_name,
		'office_short_name' => $office_short_name,
		'office_addr' => $office_addr,
		'office_tel1' => $contact_number_land,
		'office_tel2' => $contact_number_mobile,
		'office_tel3' => $contact_number_any,
		'office_fax' => $fax_number,
		'office_email' => $email,
    'office_web' => $web,
		'office_status' => 1,
		'create_date' => $date,
		'create_user' => $user_id
		);


		$data_result1 = $this->Organization_model->insert_office($org_data);

		if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Insert New Office');
			redirect("Organization/office_manager");
		}
		else{
			$this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
				redirect("Organization/Create_office");
		}

	} // end add function....


  public function office_manager()
	{
    $data = $this->session->userdata('user_login_data');
    $org_id = $data['org_id'];
    $userlevel = $data['user_level'];

    if($userlevel == 1){
      	$all_offices = $this->Organization_model->get_all_offices();
    }else{
      	$all_offices = $this->Organization_model->get_active_offices($org_id);
    }



		$data = array(
			'get_all_offices' => $all_offices
		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('office_manager',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}


  public function update_Office()
	{

    $officeid = $this->uri->segment(3);

		$get_office_details = $this->Organization_model->get_office_byid($officeid);
    $get_all_organizations = $this->Organization_model->get_active_organizations();

	//print_r($get_ddc_details); die;

		if(empty($get_office_details)){
			redirect("Organization/office_manager");

		}

		$data = array(
			'get_office_details' => $get_office_details,
      'get_all_organizations' => $get_all_organizations
		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('update_office',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}


  public function update_office_details()
  {
    $office_id = $this->security->xss_clean($this->input->post('office_id'));
    $org_id = $this->security->xss_clean($this->input->post('org'));
    $office_type = $this->security->xss_clean($this->input->post('office'));
    $office_code = $this->security->xss_clean($this->input->post('org_code'));
    $office_name = $this->security->xss_clean($this->input->post('org_name'));
    $office_short_name = $this->security->xss_clean($this->input->post('org_short_name'));
    $office_addr = $this->security->xss_clean($this->input->post('org_addr'));
    $contact_number_land = $this->security->xss_clean($this->input->post('contact_number_land'));
    $contact_number_mobile = $this->security->xss_clean($this->input->post('contact_number_mobile'));
    $contact_number_any = $this->security->xss_clean($this->input->post('contact_number_any'));
    $fax_number = $this->security->xss_clean($this->input->post('fax_number'));
    $email = $this->security->xss_clean($this->input->post('email'));
    $web = $this->security->xss_clean($this->input->post('web'));

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $date = date('Y-m-d H:i:s');

    // add main persons data
    $office_data = array(
    'org_id' => $org_id,
    'org_type' => $office_type,
    'office_code' => $office_code,
    'office_name' => $office_name,
    'office_short_name' => $office_short_name,
    'office_addr' => $office_addr,
    'office_tel1' => $contact_number_land,
    'office_tel2' => $contact_number_mobile,
    'office_tel3' => $contact_number_any,
    'office_fax' => $fax_number,
    'office_email' => $email,
    'office_web' => $web,
    'office_status' => 1,
    'update_date' => $date,
    'update_user' => $user_id
    );


    $data_result1 = $this->Organization_model->update_office($office_id,$office_data);

    if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Update Office Details');
      redirect("Organization/office_manager");
    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
        redirect("Organization/update_Office/$office_id");
    }

  } // end add function....


  function delete_office(){


		$orgid = $this->uri->segment(3);

		$data = $this->session->userdata('user_login_data');
		$user_id = $data['login_use_id'];
		$create_date = date("Y-m-d H:i:s");


		// add main persons data
		$org_data = array(
      'office_status' => 0,
      'update_date' => $create_date,
      'update_user' => $user_id
		);

    $data_result1 = $this->Organization_model->update_office($orgid,$org_data);

    if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Delete  Details');
      redirect("Organization/office_manager");
    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
        redirect("Organization/office_manager");
    }

 	}




  public function Create_depot()
	{
		$get_all_organizations = $this->Organization_model->get_active_organizations();

		$data = array(
			'get_all_organizations' => $get_all_organizations,
		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('Create_depot',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}


  public function get_office()
    {
      $data = json_decode($this->input->post('orgID'));
      //echo $data; die;
      $all_offices = $this->Organization_model->get_active_offices($data);
      //Display states list
      if(sizeof($all_offices) > 0){
        echo '<option value="0">NOT SPECIFIED</option>';
        foreach($all_offices as $row) {
          echo '<option value="'.$row['office_id'].'">'.$row['office_name'].'</option>';
        }
      }else{
        echo '<option value="">Data not available</option>';
      }
    }


  public function save_depot()
  {

    $org_id = $this->security->xss_clean($this->input->post('org'));
    $branch = $this->security->xss_clean($this->input->post('branch'));
    $depot_code = $this->security->xss_clean($this->input->post('org_code'));
    $depot_name = $this->security->xss_clean($this->input->post('org_name'));
    $depot_short_name = $this->security->xss_clean($this->input->post('org_short_name'));
    $depot_addr = $this->security->xss_clean($this->input->post('org_addr'));
    $contact_number_land = $this->security->xss_clean($this->input->post('contact_number_land'));
    $contact_number_mobile = $this->security->xss_clean($this->input->post('contact_number_mobile'));
    $contact_number_any = $this->security->xss_clean($this->input->post('contact_number_any'));
    $fax_number = $this->security->xss_clean($this->input->post('fax_number'));
    $email = $this->security->xss_clean($this->input->post('email'));
    $web = $this->security->xss_clean($this->input->post('web'));

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $date = date('Y-m-d H:i:s');

    // add main persons data
    $depot_data = array(
    'depot_code' => $depot_code,
    'depot_name' => $depot_name,
    'depot_short_name' => $depot_short_name,
    'depot_addr' => $depot_addr,
    'depot_tel1' => $contact_number_land,
    'depot_tel2' => $contact_number_mobile,
    'depot_tel3' => $contact_number_any,
    'depot_fax' => $fax_number,
    'depot_email' => $email,
    'depot_web' => $web,
    'org_id' => $org_id,
    'branch_id' => $branch,
    'depot_status' => 1,
    'create_date' => $date,
    'create_user' => $user_id
    );


    $data_result1 = $this->Organization_model->insert_depot($depot_data);

    if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Insert New Depot');
      redirect("Organization/depot_manager");
    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
        redirect("Organization/Create_depot");
    }

  } // end add function....


    public function depot_manager()
  	{
      $data = $this->session->userdata('user_login_data');
      $org_id = $data['org_id'];
      $userlevel = $data['user_level'];
      $office_id = $data['office_id'];

      if($userlevel == 1){
        	$all_depot = $this->Organization_model->get_all_depot();
      }elseif($userlevel ==2){
        $all_depot = $this->Organization_model->get_active_depot_by_org($org_id);
      }elseif($userlevel ==3){
        $all_depot = $this->Organization_model->get_active_depot($office_id);
      }else{
        $all_depot = $this->Organization_model->get_all_depot();
      }



  		$data = array(
  			'get_all_depot' => $all_depot
  		);

  		$this->load->view('template/header');
  		$this->load->view('template/menu');
  		$this->load->view('template/top');
  		$this->load->view('depot_manager',$data);
  		$this->load->view('template/footer');
  		$this->load->view('template/support');
  	}


    public function update_depot()
  	{

      $depotid = $this->uri->segment(3);

  		$get_depot_details = $this->Organization_model->get_depot_byid($depotid);
      $get_all_organizations = $this->Organization_model->get_active_organizations();
      $get_all_branches = $this->Organization_model->get_active_offices($get_depot_details[0]['org_id']);

    // print_r($get_depot_details); die;

  		if(empty($get_depot_details)){
  			redirect("Organization/depot_manager");

  		}

  		$data = array(
  			'get_depot_details' => $get_depot_details,
        'get_all_organizations' => $get_all_organizations,
        'get_all_branches' => $get_all_branches
  		);

  		$this->load->view('template/header');
  		$this->load->view('template/menu');
  		$this->load->view('template/top');
  		$this->load->view('update_depot',$data);
  		$this->load->view('template/footer');
  		$this->load->view('template/support');
  	}


    public function save_update_depot()
    {

      $depot_id = $this->security->xss_clean($this->input->post('depot_id'));
      $org_id = $this->security->xss_clean($this->input->post('org'));
      $branch = $this->security->xss_clean($this->input->post('branch'));
      $depot_code = $this->security->xss_clean($this->input->post('org_code'));
      $depot_name = $this->security->xss_clean($this->input->post('org_name'));
      $depot_short_name = $this->security->xss_clean($this->input->post('org_short_name'));
      $depot_addr = $this->security->xss_clean($this->input->post('org_addr'));
      $contact_number_land = $this->security->xss_clean($this->input->post('contact_number_land'));
      $contact_number_mobile = $this->security->xss_clean($this->input->post('contact_number_mobile'));
      $contact_number_any = $this->security->xss_clean($this->input->post('contact_number_any'));
      $fax_number = $this->security->xss_clean($this->input->post('fax_number'));
      $email = $this->security->xss_clean($this->input->post('email'));
      $web = $this->security->xss_clean($this->input->post('web'));

      $data = $this->session->userdata('user_login_data');
      $user_id = $data['login_use_id'];
      $date = date('Y-m-d H:i:s');

      // add main persons data
      $depot_data = array(
      'depot_code' => $depot_code,
      'depot_name' => $depot_name,
      'depot_short_name' => $depot_short_name,
      'depot_addr' => $depot_addr,
      'depot_tel1' => $contact_number_land,
      'depot_tel2' => $contact_number_mobile,
      'depot_tel3' => $contact_number_any,
      'depot_fax' => $fax_number,
      'depot_email' => $email,
      'depot_web' => $web,
      'org_id' => $org_id,
      'branch_id' => $branch,
      'depot_status' => 1,
      'update_date' => $date,
      'update_user' => $user_id
      );


      $data_result1 = $this->Organization_model->update_depot($depot_id,$depot_data);

      if($data_result1 > 0){
        $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Update Depot Details');
        redirect("Organization/depot_manager");
      }
      else{
        $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
          redirect("Organization/update_depot/$depot_id");
      }


    } // end add function....

    function delete_depot(){


  		$depot_id = $this->uri->segment(3);

  		$data = $this->session->userdata('user_login_data');
  		$user_id = $data['login_use_id'];
  		$create_date = date("Y-m-d H:i:s");


      $depot_data = array(
      'depot_status' => 0,
      'update_date' => $date,
      'update_user' => $user_id
      );


      $data_result1 = $this->Organization_model->update_depot($depot_id,$depot_data);

      if($data_result1 > 0){
        $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Delete Details');
        redirect("Organization/depot_manager");
      }
      else{
        $this->session->set_flashdata('flsh_msg_add_new_e', 'Cannot Delete Details');
        redirect("Organization/depot_manager");
      }

   	}



      public function get_depot()
        {
          $data = json_decode($this->input->post('branchID'));
          //echo $data; die;
          $all_depot = $this->Organization_model->get_active_depot($data);
          //Display states list
          if(sizeof($all_depot) > 0){
            echo '<option value="0">NOT SPECIFIED</option>';
            foreach($all_depot as $row) {
              echo '<option value="'.$row['depot_id'].'">'.$row['depot_name'].'</option>';
            }
          }else{
            echo '<option value="0">NOT SPECIFIED</option>';
          }
        }

}
