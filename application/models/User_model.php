<?php

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

	function validate_user_login($data)
	{
		// validate user name and password of user...
		$sql = "SELECT * FROM tbl_employeer WHERE user_name = '".$data['username']."' AND pass = '".$data['pass']."' AND emp_status = 1";
		$data_result_user_validation = $this->db->query($sql);


		if ($data_result_user_validation->num_rows() == 1)//if0
		{
			$dataset = $data_result_user_validation->result_array();

				foreach ($dataset as $row)
				{
					$login_user_details = array(
						'login_use_id'  => $row['emp_id'],
						'login_username' => $row['user_name'],
						'user_level'	=> $row['user_type'],
            'org_id'	=> $row['org_id'],
            'office_id'	=> $row['branch_id'],
            'depot_id'	=> $row['depot_id']
					);

				}

				$this->session->set_userdata('user_login_data',$login_user_details);
				return $login_user_details['login_use_id'];

		}//if0
		else{
			return false;
		}

    }// end validate_user_login Function



	function create_user_log($user_log_data){

		$result = $this->db->insert('sup_tbl_user_log', $user_log_data);
		$last_log_id = $this->db->insert_id();

		return $last_log_id;

	}

	function update_user_log($user_log_data,$log_id){

		$this->db->where('log_id', $log_id);
		$this->db->update('sup_tbl_user_log',$user_log_data);

	}


	function get_all_users(){
		$sql = "SELECT
				tbl_employeer.emp_id,
				tbl_employeer.emp_name,
				tbl_employeer.emp_code,
				tbl_employeer.user_name,
				tbl_employeer.emp_status,
				sup_tbl_user_levels.user_level
					FROM
						tbl_employeer,
						sup_tbl_user_levels
					WHERE
					tbl_employeer.user_type = sup_tbl_user_levels.id";
		$data_result_regiments = $this->db->query($sql);
		return $data_result_regiments->result_array();
 	}


		function get_all_users_by_userid($userid){
		$sql = "SELECT
				tbl_employeer.emp_id,
				tbl_employeer.emp_name,
				tbl_employeer.emp_code,
				tbl_employeer.user_name,
				tbl_employeer.emp_status,
				sup_tbl_user_levels.user_level
					FROM
						tbl_employeer,
						sup_tbl_user_levels
					WHERE
					tbl_employeer.user_type = sup_tbl_user_levels.id AND tbl_employeer.emp_id = $userid";
		$data_result_regiments = $this->db->query($sql);
		return $data_result_regiments->result_array();
 	}

	function get_all_userlevels(){
		$sql = "SELECT * FROM sup_tbl_user_levels WHERE status=1";
		$data_result_regiments = $this->db->query($sql);
		return $data_result_regiments->result_array();
 	}

	function get_userdetails($id){
		$sql = "SELECT * FROM tbl_employeer WHERE emp_id=".$id."";
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
 	}

	function insert_user_data($data){
		$result = $this->db->insert('tbl_employeer', $data);
		$last_id = $this->db->insert_id();
    	return $last_id;

 	}

	function update_user_data($data){
		$this->db->where('emp_id', $data['emp_id']);
		$this->db->update('tbl_employeer', $data);
    	return $data['emp_id'];

 	}

	function chk_user($username,$password)
	{
		// validate user name and password of user...
		$sql = "SELECT * FROM tbl_employeer WHERE user_name = '".$username."' OR pass = '".$password."'";
		$data_result_user_validation = $this->db->query($sql);
		return $data_result_user_validation->num_rows();

	}


}// end class

?>
