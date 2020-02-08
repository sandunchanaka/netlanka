<?php

class Ddc_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

	function get_districts(){
		$sql = "SELECT * FROM tbl_district";
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}
	
	function insert_ddc($data){
		
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
	
	
	function insert_ddc_staff($data){
		
		$result = $this->db->insert('tbl_ddc_staff', $data);
		$last_id = $this->db->insert_id();
    	return $last_id;

 	}
	
	function get_all_ddc_staff(){
		$sql = "SELECT
					tbl_ddc_staff.*, 
					tbl_ddc_details.ddc_name,
					sup_tbl_user_levels.user_level
				FROM
					tbl_ddc_staff
				INNER JOIN tbl_ddc_details ON tbl_ddc_staff.ddc = tbl_ddc_details.ddc_id
				INNER JOIN sup_tbl_user_levels ON tbl_ddc_staff.appoinment = sup_tbl_user_levels.id WHERE sup_tbl_user_levels.status !=0";
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}
	
	
	function get_ddc_staff_by_id($ddcstaffid){
		$sql = "SELECT * FROM tbl_ddc_staff WHERE ddc_staff_id = $ddcstaffid";
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}
	
	function update_ddc_staff($id,$updatedata){
		
		$this->db->where('ddc_staff_id', $id);
        $this->db->update('tbl_ddc_staff', $updatedata);
        return $this->db->get('tbl_ddc_staff')->row()->ddc_staff_id;


    }
	
	
	function chk_staff_avalable($nic){
		$sql = "SELECT * FROM tbl_ddc_staff WHERE nic_no = '".$nic."'";
		//echo $sql; //die;
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}

	function chk_staff_data($nic){
		$sql = "SELECT * FROM tbl_ddc_staff WHERE nic_no = '".$nic."'";
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}
	
	function chk_staff_avalable_by_emp_no($emp_no){
		$sql = "SELECT * FROM tbl_ddc_staff WHERE emp_no = '".$emp_no."'";
		//echo $sql; //die;
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}

	function chk_staff_data_by_emp_no($emp_no){
		$sql = "SELECT * FROM tbl_ddc_staff WHERE emp_no = '".$emp_no."'";
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}
	
	function chk_staff_avalable_for_update($nic,$staff_id){
		$sql = "SELECT * FROM tbl_ddc_staff WHERE nic_no = '".$nic."' AND ddc_staff_id != $staff_id";
		//echo $sql; //die;
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	function chk_staff_avalable_by_emp_no_for_update($emp_no,$staff_id){
		$sql = "SELECT * FROM tbl_ddc_staff WHERE emp_no = '".$emp_no."' AND ddc_staff_id != $staff_id";
		//echo $sql; //die;
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	
}// end class

?>
