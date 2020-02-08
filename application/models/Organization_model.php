<?php

class Organization_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

	function get_all_organizations(){
		$sql = "SELECT * FROM tbl_organization";
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}

  function get_active_organizations(){
		$sql = "SELECT * FROM tbl_organization WHERE org_status =1";
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}

	function insert_organization($data){

		$result = $this->db->insert('tbl_organization', $data);
		$last_id = $this->db->insert_id();
    	return $last_id;

 	}


  function get_organizations_byid($orgid){
  		$sql = "SELECT * FROM tbl_organization WHERE org_id =$orgid";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
  	}

  function update_organization($id,$updatedata){

  		$this->db->where('org_id', $id);
          $this->db->update('tbl_organization', $updatedata);
          return $this->db->get('tbl_organization')->row()->org_id;


      }


      function insert_office($data){

    		$result = $this->db->insert('tbl_office', $data);
    		$last_id = $this->db->insert_id();
        	return $last_id;

     	}

      function get_all_offices(){
    		$sql = "SELECT * FROM tbl_office";
    		$data_result = $this->db->query($sql);
    		return $data_result->result_array();
    	}

      function get_office_byid($officeid){
          $sql = "SELECT * FROM tbl_office WHERE office_id =$officeid";
          $data_result = $this->db->query($sql);
          return $data_result->result_array();
        }

      function update_office($id,$updatedata){

        		$this->db->where('office_id', $id);
                $this->db->update('tbl_office', $updatedata);
                return $this->db->get('tbl_office')->row()->office_id;


      }

      function get_active_offices($orgid){
    		$sql = "SELECT * FROM tbl_office WHERE office_status =1 AND org_id = $orgid";
    		$data_result = $this->db->query($sql);
    		return $data_result->result_array();
    	}

      function insert_depot($data){

    		$result = $this->db->insert('tbl_depot', $data);
    		$last_id = $this->db->insert_id();
        	return $last_id;

     	}

      function get_all_depot(){
        $sql = "SELECT * FROM tbl_depot";
        $data_result = $this->db->query($sql);
        return $data_result->result_array();
      }

      function get_depot_byid($depotid){
          $sql = "SELECT * FROM tbl_depot WHERE depot_id =$depotid";
          $data_result = $this->db->query($sql);
          return $data_result->result_array();
        }

      function update_depot($id,$updatedata){

            $this->db->where('depot_id', $id);
                $this->db->update('tbl_depot', $updatedata);
                return $this->db->get('tbl_depot')->row()->depot_id;


      }

      function get_active_depot($branchid){
    		$sql = "SELECT * FROM tbl_depot WHERE depot_status =1 AND branch_id = $branchid";
        $data_result = $this->db->query($sql);
    		return $data_result->result_array();
    	}

      function get_active_depot_by_org($orgid){
        $sql = "SELECT * FROM tbl_depot WHERE depot_status =1 AND org_id = $orgid";
        $data_result = $this->db->query($sql);
        return $data_result->result_array();
      }


}// end class

?>
