<?php

class Master_data_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    function get_all_service_providers(){
  		$sql = "SELECT * FROM tbl_service_provider WHERE sp_status =1";
  		$data_result = $this->db->query($sql);
  		return $data_result->result_array();
  	}

  	function chk_sp($sp_name,$sp_code)
  	{
  		// validate user name and password of user...
  		$sql = "SELECT * FROM tbl_service_provider WHERE service_provider_name = '".$sp_name."' OR sp_code = '".$sp_code."'";
  		$data_result = $this->db->query($sql);
  		return $data_result->num_rows();

  	}

  	function insert_new_sp($data){

  		$result = $this->db->insert('tbl_service_provider', $data);
  		$last_id = $this->db->insert_id();
      	return $last_id;

   	}

  	function updatesp($id,$updatedata){

  		$this->db->where('service_provider_id', $id);
          $this->db->update('tbl_service_provider', $updatedata);
          return $this->db->get('tbl_service_provider')->row()->service_provider_id;


      }


      /* **************************************************************************************/
      function get_all_fund_allocation_types(){
    		$sql = "SELECT * FROM tbl_fund_allocation_types WHERE act =1";
    		$data_result = $this->db->query($sql);
    		return $data_result->result_array();
    	}

    	function chk_fund_allocation_types($sp_name)
    	{
    		// validate user name and password of user...
    		$sql = "SELECT * FROM tbl_fund_allocation_types WHERE fund_allocation_type_name = '".$sp_name."'";
    		$data_result = $this->db->query($sql);
    		return $data_result->num_rows();

    	}

    	function insert_new_fund_allocation_types($data){

    		$result = $this->db->insert('tbl_fund_allocation_types', $data);
    		$last_id = $this->db->insert_id();
        	return $last_id;

     	}

    	function update_fund_allocation_types($id,$updatedata){

    		$this->db->where('fund_allocation_type_id', $id);
            $this->db->update('tbl_fund_allocation_types', $updatedata);
            return $this->db->get('tbl_fund_allocation_types')->row()->fund_allocation_type_id;


        }



	function get_districts(){
		$sql = "SELECT * FROM tbl_district";
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}

	/*function insert_ddc($data){

		$result = $this->db->insert('tbl_ddc_details', $data);
		$last_id = $this->db->insert_id();
    	return $last_id;

 	}

	function get_all_ddc(){
		$sql = "SELECT tbl_ddc_details.*,tbl_district.name AS district_name FROM tbl_ddc_details INNER JOIN tbl_district ON tbl_ddc_details.ddc_district = tbl_district.disid";
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}

	function get_ddc_by_id($ddcid){
		$sql = "SELECT * FROM tbl_ddc_details WHERE ddc_id = $ddcid";
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}

	function updateddc($id,$updatedata){

		$this->db->where('ddc_id', $id);
        $this->db->update('tbl_ddc_details', $updatedata);
        return $this->db->get('tbl_ddc_details')->row()->ddc_id;


    }

	function get_ddcs(){
		$sql = "SELECT * FROM tbl_ddc_details WHERE ddc_status =1";
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}
	*/
/**************************************************************** */



	function get_all_aga_divisions(){
		$sql = "SELECT
					tbl_aga_division.agaid,
					tbl_aga_division.aga_name,
					tbl_aga_division.agacode,
					tbl_aga_division.act,
					tbl_district.name AS district_name,
					tbl_district.discode
								FROM
									tbl_aga_division
								INNER JOIN tbl_district ON tbl_aga_division.disid = tbl_district.disid";
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}

	function chk_aga($aga_name,$aga_code,$disid)
	{
		// validate user name and password of user...
		$sql = "SELECT * FROM tbl_aga_division WHERE disid = $disid AND (aga_name = '".$aga_name."' OR agacode = '".$aga_code."')";
		$data_result_user_validation = $this->db->query($sql);
		return $data_result_user_validation->num_rows();

	}

	function insert_new_aga($data){

		$result = $this->db->insert('tbl_aga_division', $data);
		$last_id = $this->db->insert_id();
    	return $last_id;

 	}

	function updateaga($id,$updatedata){

		$this->db->where('agaid', $id);
        $this->db->update('tbl_aga_division', $updatedata);
        return $this->db->get('tbl_aga_division')->row()->agaid;


    }

	function get_all_gn_divisions(){
		$sql = "SELECT	tbl_gn_division.gnid,
					tbl_gn_division.gn_name,
					tbl_gn_division.gncode,
					tbl_aga_division.aga_name,
					tbl_aga_division.agacode,
					tbl_gn_division.act,
					tbl_district.name AS district_name,
					tbl_district.discode
								FROM
									tbl_gn_division
								INNER JOIN tbl_aga_division ON tbl_gn_division.agaid = tbl_aga_division.agaid
								INNER JOIN tbl_district ON tbl_aga_division.disid = tbl_district.disid";
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}

	function chk_gn($gn_name,$gn_code,$aga)
	{
		// validate user name and password of user...
		$sql = "SELECT * FROM tbl_gn_division WHERE agaid = $aga AND (gn_name = '".$gn_name."' OR gncode = '".$gn_code."')";
		$data_result_user_validation = $this->db->query($sql);
		return $data_result_user_validation->num_rows();

	}

	function insert_new_gn($data){

		$result = $this->db->insert('tbl_gn_division', $data);
		$last_id = $this->db->insert_id();
    	return $last_id;

 	}

	function updategn($id,$updatedata){

		$this->db->where('gnid', $id);
        $this->db->update('tbl_gn_division', $updatedata);
        return $this->db->get('tbl_gn_division')->row()->gnid;


    }




	function updatesr($id,$updatedata){

		$this->db->where('suspention_id', $id);
        $this->db->update('tbl_suspention_reason', $updatedata);
        return $this->db->get('tbl_suspention_reason')->row()->suspention_id;


    }



	//
	function get_all_agrarian_service_centre(){
		$sql = "SELECT * FROM tbl_asc WHERE asc_status =1";
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}


	function chk_asc($asc_name)
	{
		// validate user name and password of user...
		$sql = "SELECT * FROM tbl_asc WHERE asc_name = '".$asc_name."'";
		$data_result_user_validation = $this->db->query($sql);
		return $data_result_user_validation->num_rows();

	}

	function insert_new_asc($data){

		$result = $this->db->insert('tbl_asc', $data);
		$last_id = $this->db->insert_id();
    	return $last_id;

 	}

	function updateasc($id,$updatedata){

		$this->db->where('asc_id', $id);
        $this->db->update('tbl_asc', $updatedata);
        return $this->db->get('tbl_asc')->row()->asc_id;


    }


	//
	function get_all_agri_div(){
		$sql = "SELECT * FROM tbl_agri_div WHERE agri_div_status =1";
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}


	function chk_agri_div($asc_name)
	{
		// validate user name and password of user...
		$sql = "SELECT * FROM tbl_agri_div WHERE agri_div_name = '".$asc_name."'";
		$data_result_user_validation = $this->db->query($sql);
		return $data_result_user_validation->num_rows();

	}

	function insert_new_agri_div($data){

		$result = $this->db->insert('tbl_agri_div', $data);
		$last_id = $this->db->insert_id();
    	return $last_id;

 	}

	function updateagri_div($id,$updatedata){

		$this->db->where('agri_div_id', $id);
        $this->db->update('tbl_agri_div', $updatedata);
        return $this->db->get('tbl_agri_div')->row()->agri_div_id;


    }


	//
	function get_all_vehicle_types(){
		$sql = "SELECT * FROM tbl_vehicle_types WHERE status =1";
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}


	function chk_vehicle_type($asc_name)
	{
		// validate user name and password of user...
		$sql = "SELECT * FROM tbl_vehicle_types WHERE veh_type_name = '".$asc_name."'";
		$data_result_user_validation = $this->db->query($sql);
		return $data_result_user_validation->num_rows();

	}

	function insert_new_vehicle_type($data){

		$result = $this->db->insert('tbl_vehicle_types', $data);
		$last_id = $this->db->insert_id();
    	return $last_id;

 	}

	function updatevehicle_type($id,$updatedata){

		$this->db->where('veh_type_id', $id);
        $this->db->update('tbl_vehicle_types', $updatedata);
        return $this->db->get('tbl_vehicle_types')->row()->veh_type_id;


    }


	//vehicle modal

	function get_all_vehicle_models(){
		$sql = "SELECT * FROM tbl_vehicle_model WHERE vehicle_model_status =1";
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}


	function chk_vehicle_model($asc_name)
	{
		// validate user name and password of user...
		$sql = "SELECT * FROM tbl_vehicle_model WHERE vehicle_model_name = '".$asc_name."'";
		$data_result_user_validation = $this->db->query($sql);
		return $data_result_user_validation->num_rows();

	}

	function insert_new_vehicle_model($data){

		$result = $this->db->insert('tbl_vehicle_model', $data);
		$last_id = $this->db->insert_id();
    	return $last_id;

 	}

	function updatevehicle_model($id,$updatedata){

		$this->db->where('vehicle_model_id', $id);
        $this->db->update('tbl_vehicle_model', $updatedata);
        return $this->db->get('tbl_vehicle_model')->row()->vehicle_model_id;


    }





}// end class

?>
