<?php

class Job_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    function insert_job($data){

      $result = $this->db->insert('tbl_jobs', $data);
      $last_id = $this->db->insert_id();
        return $last_id;

    }

    function get_all_job_types(){
      $sql = "SELECT * FROM tbl_job_types WHERE status = 1";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_active_jobs($officeid){
      $sql = "SELECT t1.*,t2.tower_name,t3.job_type_name,t4.emp_name FROM tbl_jobs AS t1
                INNER JOIN tbl_towers AS t2 ON t1.site_id = t2.tower_id
                INNER JOIN tbl_job_types AS t3 ON t1.job_type = t3.job_type_id
                INNER JOIN tbl_employeer AS t4 ON t1.service_person = t4.emp_id
                WHERE t1.job_status IN(1,2) AND t1.office_id = $officeid";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_job_details($job_id){
      $sql = "SELECT * FROM tbl_jobs WHERE job_id =$job_id";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function update_job_details($id,$updatedata){

          $this->db->where('job_id', $id);
          $this->db->update('tbl_jobs', $updatedata);
          return $this->db->get('tbl_jobs')->row()->job_id;


    }

    function get_pending_jobs($servicep){
      $sql = "SELECT t1.*,t2.tower_name,t3.job_type_name,t4.emp_name FROM tbl_jobs AS t1
                INNER JOIN tbl_towers AS t2 ON t1.site_id = t2.tower_id
                INNER JOIN tbl_job_types AS t3 ON t1.job_type = t3.job_type_id
                INNER JOIN tbl_employeer AS t4 ON t1.service_person = t4.emp_id
                WHERE t1.job_status IN (1) AND t1.service_person = $servicep";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_accepted_jobs($servicep){
      $sql = "SELECT t1.*,t2.tower_name,t3.job_type_name,t4.emp_name FROM tbl_jobs AS t1
                INNER JOIN tbl_towers AS t2 ON t1.site_id = t2.tower_id
                INNER JOIN tbl_job_types AS t3 ON t1.job_type = t3.job_type_id
                INNER JOIN tbl_employeer AS t4 ON t1.service_person = t4.emp_id
                WHERE t1.job_status IN (2,3) AND t1.service_person = $servicep";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }


    function insert_bills($data){

      $result = $this->db->insert('tbl_bill', $data);
      $last_id = $this->db->insert_id();
        return $last_id;

    }

    function get_bills($memberid){
      $sql = "SELECT t1.*,t2.job_number FROM tbl_bill AS t1
                INNER JOIN tbl_jobs AS t2 ON t1.job_id = t2.job_id
                WHERE t1.bill_status =1 AND t1.create_user = $memberid";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_bill_details($bill_id){
      $sql = "SELECT t1.*,t2.job_number FROM tbl_bill AS t1
                INNER JOIN tbl_jobs AS t2 ON t1.job_id = t2.job_id WHERE t1.bill_id = $bill_id";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_bills_by_office($officeid){
      $sql = "SELECT t1.*,t2.job_number FROM tbl_bill AS t1
                INNER JOIN tbl_jobs AS t2 ON t1.job_id = t2.job_id
                WHERE t1.bill_status IN(1,2) AND t1.office_id = $officeid";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function update_Bill_details($id,$updatedata){

          $this->db->where('bill_id', $id);
          $this->db->update('tbl_bill', $updatedata);
          return $this->db->get('tbl_bill')->row()->bill_id;


    }

    function get_all_bills($userid){
      $sql = "SELECT t1.*,t2.job_number FROM tbl_bill AS t1
                INNER JOIN tbl_jobs AS t2 ON t1.job_id = t2.job_id
                WHERE t1.bill_status IN(1,2) AND t1.create_user = $userid";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_all_bills_amount($userid,$status){
      $sql = "SELECT SUM(t1.bill_amount) as totamount FROM tbl_bill AS t1
                WHERE t1.bill_status = $status AND t1.create_user = $userid";
      $data_result = $this->db->query($sql);
      $get_data = $data_result->result_array();
      return $get_data[0]['totamount'];
    }

    function get_accepted_bills($userid,$status){
      $sql = "SELECT t1.*,t2.job_number FROM tbl_bill AS t1
                INNER JOIN tbl_jobs AS t2 ON t1.job_id = t2.job_id
                WHERE t1.bill_status = $status AND t1.create_user = $userid";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_accepted_jobnos($servicep){
      $sql = "SELECT t1.* FROM tbl_jobs AS t1
                WHERE t1.job_status IN (2) AND t1.service_person = $servicep";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

}// end class

?>
