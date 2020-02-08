<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fund_allocation extends CI_Controller {


    public function __construct()
    {
       parent::__construct();
	    $this->load->model('Employeer_model');
      $this->load->model('Fund_allocation_model');
      $this->load->model('Organization_model');
      $this->load->model('Job_model');
    }

	public function index()
	{
    $data = $this->session->userdata('user_login_data');
    $org_id = $data['org_id'];
    $userlevel = $data['user_level'];
    $office_id = $data['office_id'];
    $depot_id = $data['depot_id'];

    if($userlevel == 2){
      $all_fund_allocations = $this->Fund_allocation_model->get_all_fund_allocations_by_org($org_id);
    }elseif($userlevel == 3){
      $all_fund_allocations = $this->Fund_allocation_model->get_all_fund_allocations_by_branch($office_id);
    }elseif($userlevel == 4){
      $all_fund_allocations = $this->Fund_allocation_model->get_all_fund_allocations_by_depot($depot_id);
    }else{
      $all_fund_allocations = $this->Fund_allocation_model->get_all_fund_allocations();
    }


    $data = array(
      'get_all_fund_allocations' => $all_fund_allocations
    );

    $this->load->view('template/header');
    $this->load->view('template/menu');
    $this->load->view('template/top');
    $this->load->view('fund_allocation_manager',$data);
    $this->load->view('template/footer');
    $this->load->view('template/support');
	}

  public function my_allocations()
	{
    $data = $this->session->userdata('user_login_data');
    $emp_id = $data['login_use_id'];

    $all_my_allocations = $this->Fund_allocation_model->get_my_allocations($emp_id);

    $data = array(
      'all_my_allocations' => $all_my_allocations
    );

    $this->load->view('template/header');
    $this->load->view('template/menu');
    $this->load->view('template/top');
    $this->load->view('my_fund_allocations',$data);
    $this->load->view('template/footer');
    $this->load->view('template/support');
	}



  public function pending_fund_allocations()
  {
    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];

    $all_fund_allocations = $this->Fund_allocation_model->get_all_pending_fund_allocations($user_id);

    $data = array(
      'get_all_fund_allocations' => $all_fund_allocations
    );

    $this->load->view('template/header');
    $this->load->view('template/menu');
    $this->load->view('template/top');
    $this->load->view('pending_fund_allocation',$data);
    $this->load->view('template/footer');
    $this->load->view('template/support');
  }

	public function allocate_fund()
	{
    $data = $this->session->userdata('user_login_data');
      $user_id = $data['login_use_id'];
    $org_id = $data['org_id'];
    $userlevel = $data['user_level'];
    $office_id = $data['office_id'];
    $depot_id = $data['depot_id'];

    if($userlevel == 2){
      $get_active_employeers = $this->Employeer_model->get_active_employeers_by_org_by_app($org_id);
    }elseif($userlevel == 3){
      $get_active_employeers = $this->Employeer_model->get_active_employeers_office($user_id,$office_id);
    }elseif($userlevel == 4){
      $get_active_employeers = $this->Employeer_model->get_active_employeers_by_deport($depot_id);
    }else{
      $get_active_employeers = $this->Employeer_model->get_employeer_names();
    }


    $get_fund_allocation_types = $this->Fund_allocation_model->get_all_fund_allocation_types();

		$data = array(
			'get_active_employeers' => $get_active_employeers,
      'get_fund_allocation_types' => $get_fund_allocation_types
		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('allocate_funds',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}

  public function save_fund_allocations()
  {
    $emp_id = $this->security->xss_clean($this->input->post('emp_id'));
    $allocation_type = $this->security->xss_clean($this->input->post('allocation_type'));
    $all_amount = $this->security->xss_clean($this->input->post('all_amount'));
    $remarks = $this->security->xss_clean($this->input->post('remarks'));

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $date = date('Y-m-d H:i:s');
    $org_id = $data['org_id'];
    $userlevel = $data['user_level'];
    $office_id = $data['office_id'];
    $depot_id = $data['depot_id'];

    $get_total_allocation = $this->Fund_allocation_model->get_total_allocate_funds($user_id,3);
    $get_total_transfer   = $this->Fund_allocation_model->get_total_transfer_funds($user_id,3);

    $balance_fund = $get_total_allocation - $get_total_transfer;
    $get_emp_app = $this->Employeer_model->get_employeer_details($emp_id);
    if($get_emp_app[0]['appointment'] != 1 && $userlevel > 2){
      if($balance_fund < $all_amount){
        $this->session->set_flashdata('flsh_msg_add_new_e', 'Balance Not Enough');
          redirect("Fund_allocation/allocate_fund");

      }
    }

    // add main persons data
    $allocation_data = array(
    'emp_id_from' => $user_id,
    'emp_id_to' => $emp_id,
    'fund_allocation_type' => $allocation_type,
    'allocate_amount' => $all_amount,
    'remarks' => $remarks,
    'fund_allocation_status' => 1,
    'fund_allocation_cat' => 1,
    'org_id' => $org_id,
    'office_id' => $office_id,
    'depot_id' => $depot_id,
    'user_level' => $userlevel,
    'appointment' => $get_emp_app[0]['appointment'],
    'create_date' => $date,
    'create_user' => $user_id
    );


    $data_result1 = $this->Fund_allocation_model->insert_allocation($allocation_data);

    if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Allocate Fund ');
      redirect("Fund_allocation");
    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
        redirect("Fund_allocation/allocate_fund");
    }

  } // end add function....



  public function update_allocate_fund()
	{
    $fat_id = $this->uri->segment(3);

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $org_id = $data['org_id'];
    $userlevel = $data['user_level'];
    $office_id = $data['office_id'];
    $depot_id = $data['depot_id'];

    $get_fund_allocation_data = $this->Fund_allocation_model->get_fund_allocation_details($fat_id);

    if($userlevel == 2){
      $get_active_employeers = $this->Employeer_model->get_active_employeers_by_org($org_id);
    }elseif($userlevel == 3){
      $get_active_employeers = $this->Employeer_model->get_active_employeers($office_id);
    }elseif($userlevel == 4){
      $get_active_employeers = $this->Employeer_model->get_active_employeers_by_deport($depot_id);
    }else{
      $get_active_employeers = $this->Employeer_model->get_employeer_names();
    }


    $get_fund_allocation_types = $this->Fund_allocation_model->get_all_fund_allocation_types();

		$data = array(
			'get_active_employeers' => $get_active_employeers,
      'get_fund_allocation_types' => $get_fund_allocation_types,
      'get_fund_allocation_data' => $get_fund_allocation_data
		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('update_allocate_funds',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}


  public function save_update_fund_allocations()
  {
    $fund_allocation_id = $this->security->xss_clean($this->input->post('fund_allocation_id'));
    $emp_id = $this->security->xss_clean($this->input->post('emp_id'));
    $allocation_type = $this->security->xss_clean($this->input->post('allocation_type'));
    $all_amount = $this->security->xss_clean($this->input->post('all_amount'));
    $remarks = $this->security->xss_clean($this->input->post('remarks'));

    $data = $this->session->userdata('user_login_data');
    $user_id = $data['login_use_id'];
    $date = date('Y-m-d H:i:s');

    // add main persons data
    $allocation_data = array(
    'emp_id_from' => $user_id,
    'emp_id_to' => $emp_id,
    'fund_allocation_type' => $allocation_type,
    'allocate_amount' => $all_amount,
    'remarks' => $remarks,
    'fund_allocation_status' => 1,
    'update_date' => $date,
    'update_user' => $user_id
    );


    $data_result1 = $this->Fund_allocation_model->update_fund_allocation($fund_allocation_id,$allocation_data);

    if($data_result1 > 0){
      $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Update Fund Allocation');
      redirect("Fund_allocation");
    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
        redirect("Fund_allocation/update_allocate_fund/$fund_allocation_id");
    }

  } // end add function....



    public function delete_fund_allocations()
    {
          $fund_allocation_id = $this->uri->segment(3);

      $data = $this->session->userdata('user_login_data');
      $user_id = $data['login_use_id'];
      $date = date('Y-m-d H:i:s');

      // add main persons data
      $allocation_data = array(
      'fund_allocation_status' => 0,
      'update_date' => $date,
      'update_user' => $user_id
      );


      $data_result1 = $this->Fund_allocation_model->update_fund_allocation($fund_allocation_id,$allocation_data);

      if($data_result1 > 0){
        $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Delete Fund Allocation');
        redirect("Fund_allocation");
      }
      else{
        $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
          redirect("Fund_allocation/update_allocate_fund/$fund_allocation_id");
      }

    } // end add function....


    public function fund_allocation_dashboard()
  	{
      $data = $this->session->userdata('user_login_data');
      $user_id = $data['login_use_id'];
      $office_id = $data['office_id'];
      $userlevel = $data['user_level'];
      $date = date('Y-m-d H:i:s');

      $get_total_allocation = $this->Fund_allocation_model->get_total_allocate_funds($user_id,3);
      $get_total_transfer   = $this->Fund_allocation_model->get_total_transfer_funds($user_id,3);
      $get_pending_fund_allocation = $this->Fund_allocation_model->get_pending_fund_allocation_byuser($user_id,3);
      $get_pending_fund_transfers = $this->Fund_allocation_model->get_pending_transfer_funds($user_id,3);
      $get_total_allocation_off = $this->Fund_allocation_model->get_total_allocate_funds_office($office_id,3);
      $get_total_transfer_off = $this->Fund_allocation_model->get_total_transfer_funds_office($office_id,3);

      $get_total_bill = $this->Job_model->get_all_bills_amount($user_id,2);
      $get_pending_bills = $this->Job_model->get_all_bills_amount($user_id,1);

  		$data = array(
  			'get_total_allocation' => $get_total_allocation,
        'get_total_transfer' => $get_total_transfer,
        'get_pending_fund_allocation' => $get_pending_fund_allocation,
        'get_pending_fund_transfer' => $get_pending_fund_transfers,
        'get_total_allocation_off' => $get_total_allocation_off,
        'get_total_transfer_off' => $get_total_transfer_off,
        'get_total_bill' => $get_total_bill,
        'get_pending_bills' => $get_pending_bills,
        'userlevel' => $userlevel
  		);

  		$this->load->view('template/header');
  		$this->load->view('template/menu');
  		$this->load->view('template/top');
  		$this->load->view('fund_allocation_dashboard',$data);
  		$this->load->view('template/footer');
  		$this->load->view('template/support');
  	}


    public function view_accept_fund_allocation()
    {
      $fat_id = $this->uri->segment(3);
      $get_fund_allocation_data = $this->Fund_allocation_model->get_fund_allocation_details($fat_id);


      $data = array(
        'get_fund_allocation_data' => $get_fund_allocation_data
      );

      $this->load->view('template/header');
      $this->load->view('template/menu');
      $this->load->view('template/top');
      $this->load->view('accept_fund_allocation',$data);
      $this->load->view('template/footer');
      $this->load->view('template/support');
    }



    public function accept_fund_allocations()
    {
      $fund_allocation_id = $this->security->xss_clean($this->input->post('fund_allocation_id'));
      $remarks = $this->security->xss_clean($this->input->post('comment'));

      $data = $this->session->userdata('user_login_data');
      $user_id = $data['login_use_id'];
      $date = date('Y-m-d H:i:s');

      // add main persons data
      $allocation_data = array(
      'fund_allocation_status' => 3,
      'approve_comment' => $remarks,
      'update_date' => $date,
      'update_user' => $user_id
      );


      $data_result1 = $this->Fund_allocation_model->update_fund_allocation($fund_allocation_id,$allocation_data);

      if($data_result1 > 0){
        $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful Accept Fund Allocation ');
        redirect("Fund_allocation/my_allocations");
      }
      else{
        $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
          redirect("Fund_allocation/my_allocations");
      }

    } // end add function....

    public function reject_fund_allocations()
    {
      $fund_allocation_id = $this->uri->segment(3);
      //$fund_allocation_id = $this->security->xss_clean($this->input->post('fund_allocation_id'));
      $remarks = $this->security->xss_clean($this->input->post('comment'));

      $data = $this->session->userdata('user_login_data');
      $user_id = $data['login_use_id'];
      $date = date('Y-m-d H:i:s');

      // add main persons data
      $allocation_data = array(
      'fund_allocation_status' => 4,
      'update_date' => $date,
      'update_user' => $user_id
      );


      $data_result1 = $this->Fund_allocation_model->update_fund_allocation($fund_allocation_id,$allocation_data);

      if($data_result1 > 0){
        $this->session->set_flashdata('flsh_msg_add_new_e', 'Reject Fund Allocation ');
        redirect("Fund_allocation/my_allocations");
      }
      else{
        $this->session->set_flashdata('flsh_msg_add_new_e', 'error occured');
          redirect("Fund_allocation/my_allocations");
      }

    } // end add function....



    public function view_my_fund_transfers()
    {
      $data = $this->session->userdata('user_login_data');
      $emp_id = $data['login_use_id'];

      $all_my_transfers = $this->Fund_allocation_model->get_my_fund_transfers($emp_id);

      $data = array(
        'all_my_transfers' => $all_my_transfers
      );

      $this->load->view('template/header');
      $this->load->view('template/menu');
      $this->load->view('template/top');
      $this->load->view('my_fund_transfers',$data);
      $this->load->view('template/footer');
      $this->load->view('template/support');
    }

    public function view_pending_fund_transfers()
    {
      $data = $this->session->userdata('user_login_data');
      $emp_id = $data['login_use_id'];

      $all_my_transfers = $this->Fund_allocation_model->get_pending_fund_transfers($emp_id,3);

      $data = array(
        'all_my_transfers' => $all_my_transfers
      );

      $this->load->view('template/header');
      $this->load->view('template/menu');
      $this->load->view('template/top');
      $this->load->view('pending_fund_transfers',$data);
      $this->load->view('template/footer');
      $this->load->view('template/support');
    }



    public function view_accept_fund_transfers()
    {
      $data = $this->session->userdata('user_login_data');
      $emp_id = $data['login_use_id'];

      $all_my_transfers = $this->Fund_allocation_model->get_accept_fund_transfers($emp_id,3);

      $data = array(
        'all_my_transfers' => $all_my_transfers
      );

      $this->load->view('template/header');
      $this->load->view('template/menu');
      $this->load->view('template/top');
      $this->load->view('accept_fund_transfers',$data);
      $this->load->view('template/footer');
      $this->load->view('template/support');
    }


      public function allocate_fund_details()
    	{
        $fat_id = $this->uri->segment(3);
        $get_fund_allocation_data = $this->Fund_allocation_model->get_fund_allocation_details($fat_id);


    		$data = array(

          'get_fund_allocation_data' => $get_fund_allocation_data
    		);

    		$this->load->view('template/header');
    		$this->load->view('template/menu');
    		$this->load->view('template/top');
    		$this->load->view('view_allocate_fund_detals',$data);
    		$this->load->view('template/footer');
    		$this->load->view('template/support');
    	}

      public function rejected_fund_allocations()
      {
        $data = $this->session->userdata('user_login_data');
        $user_id = $data['login_use_id'];

        $all_fund_allocations = $this->Fund_allocation_model->get_rejected_fund_allocations($user_id);

        $data = array(
          'get_all_fund_allocations' => $all_fund_allocations
        );

        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('template/top');
        $this->load->view('rejected_fund_allocation',$data);
        $this->load->view('template/footer');
        $this->load->view('template/support');
      }

      public function view_rejected_fund_transfers()
      {
        $data = $this->session->userdata('user_login_data');
        $emp_id = $data['login_use_id'];

        $all_my_transfers = $this->Fund_allocation_model->get_accept_fund_transfers($emp_id,4);

        $data = array(
          'all_my_transfers' => $all_my_transfers
        );

        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('template/top');
        $this->load->view('rejected_fund_transfers',$data);
        $this->load->view('template/footer');
        $this->load->view('template/support');
      }


      public function my_transactions()
      {
        $data = $this->session->userdata('user_login_data');
        $emp_id = $data['login_use_id'];

        $all_my_allocations = $this->Fund_allocation_model->get_my_transactions($emp_id);

        $data = array(
          'all_my_allocations' => $all_my_allocations,
          'emp_id' => $emp_id
        );

        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('template/top');
        $this->load->view('transactions',$data);
        $this->load->view('template/footer');
        $this->load->view('template/support');
      }


      public function view_allocate_fund_by_region()
    	{
        $data = $this->session->userdata('user_login_data');
        $user_id = $data['login_use_id'];
        $org_id = $data['org_id'];
        $userlevel = $data['user_level'];
        $office_id = $data['office_id'];
        $depot_id = $data['depot_id'];

        	$all_offices = $this->Organization_model->get_active_offices($org_id);

    		$data = array(
    			'get_offices' => $all_offices,
          'emp_id' => $user_id
    		);

    		$this->load->view('template/header');
    		$this->load->view('template/menu');
    		$this->load->view('template/top');
    		$this->load->view('get_fund_details_by_offices',$data);
    		$this->load->view('template/footer');
    		$this->load->view('template/support');
    	}


      public function view_allocate_fund_by_office_id()
    	{
        $get_office_id = $this->uri->segment(3);

        $data = $this->session->userdata('user_login_data');
        $user_id = $data['login_use_id'];
        $org_id = $data['org_id'];
        $userlevel = $data['user_level'];
        $office_id = $data['office_id'];
        $depot_id = $data['depot_id'];

          $all_depot = $this->Organization_model->get_active_depot($get_office_id);

    		$data = array(
    			'get_depot' => $all_depot
    		);

    		$this->load->view('template/header');
    		$this->load->view('template/menu');
    		$this->load->view('template/top');
    		$this->load->view('get_fund_details_by_depot',$data);
    		$this->load->view('template/footer');
    		$this->load->view('template/support');
    	}


      public function view_allocate_fund_by_depot()
    	{
        $data = $this->session->userdata('user_login_data');
        $user_id = $data['login_use_id'];
        $org_id = $data['org_id'];
        $userlevel = $data['user_level'];
        $office_id = $data['office_id'];
        $depot_id = $data['depot_id'];

          $all_depot = $this->Organization_model->get_active_depot($office_id);

    		$data = array(
    			'get_depot' => $all_depot
    		);

    		$this->load->view('template/header');
    		$this->load->view('template/menu');
    		$this->load->view('template/top');
    		$this->load->view('get_fund_details_by_depot',$data);
    		$this->load->view('template/footer');
    		$this->load->view('template/support');
    	}

      public function view_allocate_fund_by_team_mem()
    	{
        $get_depot_id = $this->uri->segment(3);

        $data = $this->session->userdata('user_login_data');
        $user_id = $data['login_use_id'];
        $org_id = $data['org_id'];
        $userlevel = $data['user_level'];
        $office_id = $data['office_id'];
        $depot_id = $data['depot_id'];

          $all_members = $this->Employeer_model->get_all_employeers_deport($get_depot_id);

    		$data = array(
    			'get_team_mem' => $all_members
    		);

    		$this->load->view('template/header');
    		$this->load->view('template/menu');
    		$this->load->view('template/top');
    		$this->load->view('get_fund_details_by_team_mem',$data);
    		$this->load->view('template/footer');
    		$this->load->view('template/support');
    	}

      public function member_fund_allocations()
    	{
        $emp_id = $this->uri->segment(3);

        $all_my_allocations = $this->Fund_allocation_model->get_my_allocations($emp_id);

        $data = array(
          'all_my_allocations' => $all_my_allocations
        );

        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('template/top');
        $this->load->view('my_fund_allocations',$data);
        $this->load->view('template/footer');
        $this->load->view('template/support');
    	}

      public function view_team_mem_fund_details()
    	{
        $data = $this->session->userdata('user_login_data');
        $user_id = $data['login_use_id'];
        $org_id = $data['org_id'];
        $userlevel = $data['user_level'];
        $office_id = $data['office_id'];
        $depot_id = $data['depot_id'];

          $all_members = $this->Employeer_model->get_my_details($user_id);

    		$data = array(
    			'get_team_mem' => $all_members
    		);

    		$this->load->view('template/header');
    		$this->load->view('template/menu');
    		$this->load->view('template/top');
    		$this->load->view('get_fund_details_by_team_mem',$data);
    		$this->load->view('template/footer');
    		$this->load->view('template/support');
    	}


      public function view_fund_transfers_by_team_mem()
      {
        $emp_id = $this->uri->segment(3);

        $all_my_transfers = $this->Fund_allocation_model->get_accept_fund_transfers($emp_id,3);

        $data = array(
          'all_my_transfers' => $all_my_transfers
        );

        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('template/top');
        $this->load->view('accept_fund_transfers',$data);
        $this->load->view('template/footer');
        $this->load->view('template/support');
      }


      public function get_bill_details_by_team_mem()
      {
        $emp_id = $this->uri->segment(3);

        $data = $this->session->userdata('user_login_data');
        $user_id = $data['login_use_id'];
        $org_id = $data['org_id'];
        $userlevel = $data['user_level'];
        $office_id = $data['office_id'];
        $depot_id = $data['depot_id'];


          $all_bills = $this->Job_model->get_accepted_bills($emp_id,2);




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


      public function show_fund_allocation_details()
    	{
        $fat_id = $this->uri->segment(3);

        $data = $this->session->userdata('user_login_data');
        $user_id = $data['login_use_id'];
        $org_id = $data['org_id'];
        $userlevel = $data['user_level'];
        $office_id = $data['office_id'];
        $depot_id = $data['depot_id'];

        $get_fund_allocation_data = $this->Fund_allocation_model->get_fund_allocation_data($fat_id);



    		$data = array(
    			'get_fund_allocation_data' => $get_fund_allocation_data,
          'memid' => $user_id
    		);

    		$this->load->view('template/header');
    		$this->load->view('template/menu');
    		$this->load->view('template/top');
    		$this->load->view('view_fund_allocation_details',$data);
    		$this->load->view('template/footer');
    		$this->load->view('template/support');
    	}


}
