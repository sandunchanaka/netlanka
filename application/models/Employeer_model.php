<?php

class Employeer_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    function get_all_appoinment(){
      $sql = "SELECT * FROM tbl_appointment WHERE appointment_status =1";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_all_user_levels(){
      $sql = "SELECT * FROM sup_tbl_user_levels WHERE status =1";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_user_levels_notin($val){
      $sql = "SELECT * FROM sup_tbl_user_levels WHERE status =1 AND id NOT IN($val)";
      //echo $sql; die;
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function insert_employeer($data){

      $result = $this->db->insert('tbl_employeer', $data);
      $last_id = $this->db->insert_id();
        return $last_id;

    }

    function get_all_employeers(){
      $sql = "SELECT t1.*,t2.appointment_name,t3.org_name,t4.user_level FROM tbl_employeer AS t1
              INNER JOIN  tbl_appointment AS t2 ON t1.appointment = t2.appointment_id
              INNER JOIN  sup_tbl_user_levels AS t4 ON t1.user_type = t4.id
              INNER JOIN  tbl_organization AS t3 ON t1.org_id = t3.org_id";

      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_all_employeers_by_org($org){
      $sql = "SELECT t1.*,t2.appointment_name,t3.org_name,t4.user_level FROM tbl_employeer AS t1
              INNER JOIN  tbl_appointment AS t2 ON t1.appointment = t2.appointment_id
              INNER JOIN  sup_tbl_user_levels AS t4 ON t1.user_type = t4.id
              INNER JOIN  tbl_organization AS t3 ON t1.org_id = t3.org_id
              WHERE t1.org_id = $org AND t1.emp_status =1 AND t1.user_type !=1";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_all_employeers_by_office($office){
      $sql = "SELECT t1.*,t2.appointment_name,t3.org_name,t4.user_level FROM tbl_employeer AS t1
              INNER JOIN  tbl_appointment AS t2 ON t1.appointment = t2.appointment_id
              INNER JOIN  tbl_organization AS t3 ON t1.org_id = t3.org_id
              INNER JOIN  sup_tbl_user_levels AS t4 ON t1.user_type = t4.id
              WHERE t1.branch_id = $office AND t1.emp_status =1 AND t1.user_type !=1";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_all_employeers_deport($deport){
      $sql = "SELECT t1.*,t2.appointment_name,t3.org_name,t4.user_level FROM tbl_employeer AS t1
              INNER JOIN  tbl_appointment AS t2 ON t1.appointment = t2.appointment_id
              INNER JOIN  tbl_organization AS t3 ON t1.org_id = t3.org_id
              INNER JOIN  sup_tbl_user_levels AS t4 ON t1.user_type = t4.id
              WHERE t1.depot_id = $deport AND t1.emp_status =1 AND t1.user_type !=1";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_my_details($userid){
      $sql = "SELECT t1.*,t2.appointment_name,t3.org_name,t4.user_level FROM tbl_employeer AS t1
              INNER JOIN  tbl_appointment AS t2 ON t1.appointment = t2.appointment_id
              INNER JOIN  tbl_organization AS t3 ON t1.org_id = t3.org_id
              INNER JOIN  sup_tbl_user_levels AS t4 ON t1.user_type = t4.id
              WHERE t1.emp_id = $userid AND t1.emp_status =1 AND t1.user_type !=1";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_employeer_details($emp_id){
      $sql = "SELECT * FROM tbl_employeer WHERE emp_id =$emp_id";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function update_employer($id,$updatedata){

          $this->db->where('emp_id', $id);
              $this->db->update('tbl_employeer', $updatedata);
              return $this->db->get('tbl_employeer')->row()->emp_id;


    }

    function get_active_employeers($officeid){
      $sql = "SELECT * FROM tbl_employeer WHERE emp_status =1 AND user_type != 1 AND branch_id =$officeid";
      $data_result = $this->db->query($sql);

      return $data_result->result_array();
    }

    function get_active_employeers_office($userid,$officeid){
      $sql = "SELECT * FROM tbl_employeer WHERE emp_status =1 AND user_type != 1 AND emp_id != $userid AND branch_id =$officeid";
      $data_result = $this->db->query($sql);

      return $data_result->result_array();
    }

    function get_employeer_name($emp_id){
      $sql = "SELECT * FROM tbl_employeer WHERE emp_id =$emp_id";
      $data_result = $this->db->query($sql);
      $get_name = $data_result->result_array();
      return $get_name[0]['emp_name'];
    }

    function get_active_employeers_by_org($orgid){
      $sql = "SELECT * FROM tbl_employeer WHERE emp_status =1 AND user_type != 1 AND org_id =$orgid";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_active_employeers_by_org_by_app($orgid){
      $sql = "SELECT * FROM tbl_employeer WHERE emp_status =1 AND user_type != 1 AND 	appointment = 2 AND org_id =$orgid";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_employeer_names(){
      $sql = "SELECT * FROM tbl_employeer WHERE emp_status =1 AND user_type != 1";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_active_employeers_by_deport($deportid){
      $sql = "SELECT * FROM tbl_employeer WHERE emp_status =1 AND user_type != 1 AND depot_id =$deportid";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_appoinment_name($appid){
      $sql = "SELECT * FROM tbl_appointment WHERE appointment_id = $appid";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_branch_name($brid){
      $sql = "SELECT office_short_name FROM tbl_office WHERE office_id =$brid";
      $data_result = $this->db->query($sql);
      $get_name = $data_result->result_array();
      return $get_name[0]['office_short_name'];
    }


}// end class

?>
