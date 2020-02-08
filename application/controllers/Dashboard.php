<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


  public function __construct(){
		   parent::__construct();
		   $this->load->model('Dashboard_model');
		

		}

	public function index()
	{
		$this->load->view('template/header');
      $this->load->view('template/menu');
      $this->load->view('template/top');
  	  $this->load->view('dashboard2');
	  $this->load->view('template/footer');
      $this->load->view('template/support');
	}


	public function homepage()
	{

		$total_no_of_beni_soldier =  $this->Dashboard_model->get_no_of_beneficiary_accounts();
		$total_no_of_soldier =  $this->Dashboard_model->get_no_of_soldiers();
		$total_no_of_parents = $this->Dashboard_model->get_all_parents();
		$last_pay_amount =  $this->Dashboard_model->get_total_paid_amount_by_bank(1);
		$total_no_of_suspended_acc =  $this->Dashboard_model->get_no_of_suspendedAccounts();
		$total_no_of_pending_registration =  $this->Dashboard_model->get_all_pending_registration_details();
		$pending_suspension =  $this->Dashboard_model->get_no_of_pending_suspendedAccounts();
		$tobe_approval_slip =  $this->Dashboard_model->to_be_approval_slips();
		//$soldier_by_service =  $this->Dashboard_model->get_no_of_soldiers_by_service_type();
		//$acc_by_bank =  $this->Dashboard_model->get_no_of_acc_by_bank();
		$total_no_of_beni_parents =  $this->Dashboard_model->get_no_of_parents();

	 $data = array(
				   'total_beni_soldier'  => $total_no_of_beni_soldier,
				   'total_soldier'  => $total_no_of_soldier,
				   'suspended_acc'  => $total_no_of_suspended_acc,
				   'last_pay_amount'  => $last_pay_amount,
	 			   'pending_registration'  => $total_no_of_pending_registration,
				   'pending_suspension'  => $pending_suspension,
				   'tobe_approval_slip'  => $tobe_approval_slip,
				   'total_active_parents'  => $total_no_of_beni_parents,
				   'total_parents'  => $total_no_of_parents,
				   'suspended_parent_acc'  => $total_no_of_suspended_acc,
				   );


      $this->load->view('template/header');
      $this->load->view('template/menu');
      $this->load->view('template/top');
  	  $this->load->view('dashboard',$data);
	  $this->load->view('template/footer');
      $this->load->view('template/support');
	}





}
