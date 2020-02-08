<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_data extends CI_Controller {


    public function __construct()
    {
       parent::__construct();
	   $this->load->model('Master_data_model');

    }

	public function index()
	{
			redirect("Dashboard");
	}


  public function Service_providers()
  {
    $get_all_sp = $this->Master_data_model->get_all_service_providers();

    $data = array(
      'get_all_sp' => $get_all_sp
    );

    $this->load->view('template/header');
    $this->load->view('template/menu');
    $this->load->view('template/top');
    $this->load->view('service_providers',$data);
    $this->load->view('template/footer');
    $this->load->view('template/support');
  }

public function add_new_service_provider()
{

  $sp_name = $this->security->xss_clean($this->input->post('sp_name'));
  $sp_code = $this->security->xss_clean($this->input->post('sp_code'));

  // add main persons data
  $sp_data = array(
  'service_provider_name	' => $sp_name,
  'sp_code' => $sp_code,
  'sp_status' => 1
  );

  $chkexists = $this->Master_data_model->chk_sp($sp_name,$sp_code);
  //echo $chkexists; die;
  if($chkexists > 0){
    $this->session->set_flashdata('flsh_msg_add_new_e', 'Service Provider Name Already exists');
      redirect("Master_data/Service_providers");
  }else{

    $data_result1 = $this->Master_data_model->insert_new_sp($sp_data);

    if($data_result1 > 0){

      $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful');
      redirect("Master_data/Service_providers");
    }
    else{
      $this->session->set_flashdata('flsh_msg_add_new_e', 'Cannot Insert Service Provider ');
        redirect("Master_data/Service_providers");
    }

  }

}


public function Deletesp()
  {
  $id = $this->uri->segment(3);
  $updatedata = array(
    'sp_status' => 0
    );
  $delete = $this->Master_data_model->updatesp($id,$updatedata);

  $this->session->set_flashdata('flsh_msg_add_new_s', 'Deactivate Records');
  redirect("Master_data/Service_providers");
  }

  public function Activatesp()
  {
  $id = $this->uri->segment(3);
  $updatedata = array(
    'sp_status' => 1
    );
  $delete = $this->Master_data_model->updatesp($id,$updatedata);

  $this->session->set_flashdata('flsh_msg_add_new_s', 'Activate Records');
  redirect("Master_data/Service_providers");
  }

	public function service_status()
	{
		$get_service_status = $this->Master_data_model->get_service_status();


		$data = array(
			'get_service_status' => $get_service_status

		);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('template/top');
		$this->load->view('service_status',$data);
		$this->load->view('template/footer');
		$this->load->view('template/support');
	}


	public function add_new_service_status()
	{

		$service_st_name = $this->security->xss_clean($this->input->post('branch_name'));


		// add main persons data
		$gn_data = array(
		'status_name' => $service_st_name,
		'act' => 1
		);

		$chkexists = $this->Master_data_model->chk_aservice_sta($service_st_name);
		//echo $chkexists; die;
		if($chkexists > 0){
			$this->session->set_flashdata('flsh_msg_add_new_e', 'Service Status Name Already exists');
				redirect("Master_data/service_status");
		}else{

			$data_result1 = $this->Master_data_model->insert_new_service_st($gn_data);

			if($data_result1 > 0){

				$this->session->set_flashdata('flsh_msg_add_new_s', 'Successful');
				redirect("Master_data/service_status");
			}
			else{
				$this->session->set_flashdata('flsh_msg_add_new_e', 'Cannot Insert Service Status');
					redirect("Master_data/service_status");
			}

		}

	}


	public function Deleteservice_st()
	  {
		$id = $this->uri->segment(3);
		$updatedata = array(
			'act' => 0
			);
		$delete = $this->Master_data_model->updateservice_st($id,$updatedata);

		$this->session->set_flashdata('flsh_msg_add_new_s', 'Deactivate Records');
		redirect("Master_data/service_status");
	  }

    public function Activateservice_st()
	  {
		$id = $this->uri->segment(3);
		$updatedata = array(
			'act' => 1
			);
		$delete = $this->Master_data_model->updateservice_st($id,$updatedata);

		$this->session->set_flashdata('flsh_msg_add_new_s', 'Activate Records');
		redirect("Master_data/service_status");
	  }


    /*****************************************************************************************/

    public function fund_allocation_types()
    {
      $get_all_fat = $this->Master_data_model->get_all_fund_allocation_types();

      $data = array(
        'get_all_fat' => $get_all_fat
      );

      $this->load->view('template/header');
      $this->load->view('template/menu');
      $this->load->view('template/top');
      $this->load->view('fund_allocation_types',$data);
      $this->load->view('template/footer');
      $this->load->view('template/support');
    }

  public function add_new_fund_allocation_types()
  {

    $fat_name = $this->security->xss_clean($this->input->post('fat_name'));
    //$sp_code = $this->security->xss_clean($this->input->post('sp_code'));

    // add main persons data
    $fat_data = array(
    'fund_allocation_type_name	' => $fat_name,
    'act' => 1
    );

    $chkexists = $this->Master_data_model->chk_fund_allocation_types($fat_name);
    //echo $chkexists; die;
    if($chkexists > 0){
      $this->session->set_flashdata('flsh_msg_add_new_e', 'Fund Allocation Type Name Already exists');
        redirect("Master_data/fund_allocation_types");
    }else{

      $data_result1 = $this->Master_data_model->insert_new_fund_allocation_types($fat_data);

      if($data_result1 > 0){

        $this->session->set_flashdata('flsh_msg_add_new_s', 'Successful');
        redirect("Master_data/fund_allocation_types");
      }
      else{
        $this->session->set_flashdata('flsh_msg_add_new_e', 'Cannot Insert Fund Allocation Type ');
          redirect("Master_data/fund_allocation_types");
      }

    }

  }


  public function Delete_fund_allocation_types()
    {
    $id = $this->uri->segment(3);
    $updatedata = array(
      'act' => 0
      );
    $delete = $this->Master_data_model->update_fund_allocation_types($id,$updatedata);

    $this->session->set_flashdata('flsh_msg_add_new_s', 'Deactivate Records');
    redirect("Master_data/fund_allocation_types");
    }

    public function Activate_fund_allocation_types()
    {
    $id = $this->uri->segment(3);
    $updatedata = array(
      'act' => 1
      );
    $delete = $this->Master_data_model->update_fund_allocation_types($id,$updatedata);

    $this->session->set_flashdata('flsh_msg_add_new_s', 'Activate Records');
    redirect("Master_data/fund_allocation_types");
    }


}
