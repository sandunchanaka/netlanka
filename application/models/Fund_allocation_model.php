<?php

class Fund_allocation_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    function get_all_fund_allocation_types(){
      $sql = "SELECT * FROM tbl_fund_allocation_types WHERE act =1";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function insert_allocation($data){

      $result = $this->db->insert('tbl_fund_allocation', $data);
      $last_id = $this->db->insert_id();
        return $last_id;

    }

    function get_all_fund_allocations(){
      $sql = "SELECT t1.*,t2.emp_name,t2.branch_id,t3.fund_allocation_type_name,t4.org_short_name FROM tbl_fund_allocation AS t1
              INNER JOIN  tbl_employeer AS t2 ON t1.emp_id_to = t2.emp_id
              INNER JOIN  tbl_fund_allocation_types AS t3 ON t1.fund_allocation_type = t3.fund_allocation_type_id
              INNER JOIN  tbl_organization AS t4 ON t2.org_id = t4.org_id";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_all_fund_allocations_by_org($org){
      $sql = "SELECT t1.*,t2.emp_name,t2.branch_id,t3.fund_allocation_type_name,t4.org_short_name FROM tbl_fund_allocation AS t1
              INNER JOIN  tbl_employeer AS t2 ON t1.emp_id_to = t2.emp_id
              INNER JOIN  tbl_fund_allocation_types AS t3 ON t1.fund_allocation_type = t3.fund_allocation_type_id
              INNER JOIN  tbl_organization AS t4 ON t2.org_id = t4.org_id
              WHERE t1.org_id = $org AND t1.user_level = 2";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_all_fund_allocations_by_branch($branchid){
      $sql = "SELECT t1.*,t2.emp_name,t2.branch_id,t3.fund_allocation_type_name,t4.org_short_name,t5.office_name FROM tbl_fund_allocation AS t1
              INNER JOIN  tbl_employeer AS t2 ON t1.emp_id_to = t2.emp_id
              INNER JOIN  tbl_fund_allocation_types AS t3 ON t1.fund_allocation_type = t3.fund_allocation_type_id
              INNER JOIN  tbl_organization AS t4 ON t2.org_id = t4.org_id
              INNER JOIN  tbl_office AS t5 ON t2.branch_id = t5.office_id  WHERE t1.office_id = $branchid";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_all_fund_allocations_by_depot($depotid){
      $sql = "SELECT t1.*,t2.emp_name,t2.branch_id,t3.fund_allocation_type_name,t4.org_short_name,t5.office_name FROM tbl_fund_allocation AS t1
              INNER JOIN  tbl_employeer AS t2 ON t1.emp_id_to = t2.emp_id
              INNER JOIN  tbl_fund_allocation_types AS t3 ON t1.fund_allocation_type = t3.fund_allocation_type_id
              INNER JOIN  tbl_organization AS t4 ON t2.org_id = t4.org_id
              INNER JOIN  tbl_office AS t5 ON t2.branch_id = t5.office_id  WHERE t1.depot_id = $depotid";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_fund_allocation_details($fa_id){
      $sql = "SELECT * FROM tbl_fund_allocation WHERE fund_allocation_id =$fa_id";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function update_fund_allocation($id,$updatedata){

          $this->db->where('fund_allocation_id', $id);
              $this->db->update('tbl_fund_allocation', $updatedata);
              return $this->db->get('tbl_fund_allocation')->row()->fund_allocation_id;


    }

    function get_all_pending_fund_allocations($userid){
      $sql = "SELECT t1.*,t2.emp_name,t3.fund_allocation_type_name,t4.org_short_name FROM tbl_fund_allocation AS t1
              INNER JOIN  tbl_employeer AS t2 ON t1.emp_id_to = t2.emp_id
              INNER JOIN  tbl_fund_allocation_types AS t3 ON t1.fund_allocation_type = t3.fund_allocation_type_id
              INNER JOIN  tbl_organization AS t4 ON t2.org_id = t4.org_id
              WHERE t1.fund_allocation_status = 1 AND t1.emp_id_to = $userid";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_total_allocate_funds($userid,$status){
      $sql = "SELECT SUM(t1.allocate_amount) AS total_allocation FROM tbl_fund_allocation AS t1
              WHERE t1.fund_allocation_status = $status AND t1.emp_id_to = $userid";
      $data_result = $this->db->query($sql);
      $get_allocation = $data_result->result_array();
      return $get_allocation[0]['total_allocation'];
    }

    function get_total_transfer_funds($userid,$status){
      $sql = "SELECT SUM(t1.allocate_amount) AS total_allocation FROM tbl_fund_allocation AS t1
              WHERE t1.fund_allocation_status = $status AND t1.emp_id_from = $userid AND t1.emp_id_to != $userid";
      $data_result = $this->db->query($sql);
      $get_allocation = $data_result->result_array();
      return $get_allocation[0]['total_allocation'];
    }

    function get_pending_fund_allocation_byuser($userid,$status){
      $sql = "SELECT SUM(t1.allocate_amount) AS total_allocation FROM tbl_fund_allocation AS t1
              WHERE t1.fund_allocation_status < $status AND t1.emp_id_to = $userid";
      $data_result = $this->db->query($sql);
      $get_allocation = $data_result->result_array();
      return $get_allocation[0]['total_allocation'];
    }

    function get_pending_transfer_funds($userid,$status){
      $sql = "SELECT SUM(t1.allocate_amount) AS total_allocation FROM tbl_fund_allocation AS t1
              WHERE t1.fund_allocation_status < $status AND t1.emp_id_from = $userid AND t1.emp_id_to != $userid";
      $data_result = $this->db->query($sql);
      $get_allocation = $data_result->result_array();
      return $get_allocation[0]['total_allocation'];
    }


    function get_total_allocate_funds_office($officeid,$status){
      $sql = "SELECT SUM(t1.allocate_amount) AS total_allocation FROM tbl_fund_allocation AS t1
              INNER JOIN tbl_employeer AS t2 ON t1.emp_id_to = t2.emp_id
              WHERE t1.fund_allocation_status = $status AND t2.branch_id = $officeid";
      $data_result = $this->db->query($sql);
      $get_allocation = $data_result->result_array();
      return $get_allocation[0]['total_allocation'];
    }

    function get_total_transfer_funds_office($officeid,$status){
      $sql = "SELECT SUM(t1.allocate_amount) AS total_allocation FROM tbl_fund_allocation AS t1
              INNER JOIN tbl_employeer AS t2 ON t1.emp_id_from = t2.emp_id AND t2.branch_id != $officeid
              WHERE t1.fund_allocation_status = $status AND t2.branch_id = $officeid";
      $data_result = $this->db->query($sql);
      $get_allocation = $data_result->result_array();
      return $get_allocation[0]['total_allocation'];
    }


    function get_my_allocations($emp_id){
      $sql = "SELECT t1.*,t2.emp_name,t2.branch_id,t3.fund_allocation_type_name,t4.org_short_name FROM tbl_fund_allocation AS t1
              INNER JOIN  tbl_employeer AS t2 ON t1.emp_id_to = t2.emp_id
              INNER JOIN  tbl_fund_allocation_types AS t3 ON t1.fund_allocation_type = t3.fund_allocation_type_id
              INNER JOIN  tbl_organization AS t4 ON t2.org_id = t4.org_id
              WHERE t1.emp_id_to = $emp_id";
              //echo $sql;
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_fund_allocation_type_name($fat_id){
      $sql = "SELECT * FROM tbl_fund_allocation_types WHERE fund_allocation_type_id =$fat_id";
      $data_result = $this->db->query($sql);
      $fund_allocation_type_name = $data_result->result_array();
      return $fund_allocation_type_name[0]['fund_allocation_type_name'];
    }

    function get_my_fund_transfers($emp_id){
      $sql = "SELECT t1.*,t2.emp_name,t3.fund_allocation_type_name,t4.org_short_name,t5.office_name FROM tbl_fund_allocation AS t1
              INNER JOIN  tbl_employeer AS t2 ON t1.emp_id_to = t2.emp_id
              INNER JOIN  tbl_fund_allocation_types AS t3 ON t1.fund_allocation_type = t3.fund_allocation_type_id
              INNER JOIN  tbl_organization AS t4 ON t2.org_id = t4.org_id
              INNER JOIN  tbl_office AS t5 ON t2.branch_id = t5.office_id
              WHERE t1.emp_id_from = $emp_id AND t1.fund_allocation_status != 4";
              //echo $sql;
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_pending_fund_transfers($emp_id,$status){
      $sql = "SELECT t1.*,t2.emp_name,t3.fund_allocation_type_name,t4.org_short_name,t5.office_name FROM tbl_fund_allocation AS t1
              INNER JOIN  tbl_employeer AS t2 ON t1.emp_id_to = t2.emp_id
              INNER JOIN  tbl_fund_allocation_types AS t3 ON t1.fund_allocation_type = t3.fund_allocation_type_id
              INNER JOIN  tbl_organization AS t4 ON t2.org_id = t4.org_id
              INNER JOIN  tbl_office AS t5 ON t2.branch_id = t5.office_id
              WHERE t1.emp_id_from = $emp_id AND t1.fund_allocation_status < 3";
              //echo $sql;
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }



    function get_accept_fund_transfers($emp_id,$status){
          $sql = "SELECT t1.*,t2.emp_name,t3.fund_allocation_type_name,t4.org_short_name,t5.office_name FROM tbl_fund_allocation AS t1
                  INNER JOIN  tbl_employeer AS t2 ON t1.emp_id_to = t2.emp_id
                  INNER JOIN  tbl_fund_allocation_types AS t3 ON t1.fund_allocation_type = t3.fund_allocation_type_id
                  INNER JOIN  tbl_organization AS t4 ON t2.org_id = t4.org_id
                  INNER JOIN  tbl_office AS t5 ON t2.branch_id = t5.office_id
                  WHERE t1.emp_id_from = $emp_id AND t1.fund_allocation_status = $status";
                  //echo $sql;
          $data_result = $this->db->query($sql);
          return $data_result->result_array();
    }


    function get_rejected_fund_allocations($userid){
      $sql = "SELECT t1.*,t2.emp_name,t3.fund_allocation_type_name,t4.org_short_name FROM tbl_fund_allocation AS t1
              INNER JOIN  tbl_employeer AS t2 ON t1.emp_id_to = t2.emp_id
              INNER JOIN  tbl_fund_allocation_types AS t3 ON t1.fund_allocation_type = t3.fund_allocation_type_id
              INNER JOIN  tbl_organization AS t4 ON t2.org_id = t4.org_id
              WHERE t1.fund_allocation_status = 4 AND t1.emp_id_to = $userid";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_my_transactions($emp_id){
      $sql = "SELECT t1.*,t2.emp_name,t3.fund_allocation_type_name,t4.org_short_name FROM tbl_fund_allocation AS t1
              INNER JOIN  tbl_employeer AS t2 ON t1.emp_id_to = t2.emp_id
              INNER JOIN  tbl_fund_allocation_types AS t3 ON t1.fund_allocation_type = t3.fund_allocation_type_id
              INNER JOIN  tbl_organization AS t4 ON t2.org_id = t4.org_id
              WHERE t1.emp_id_to = $emp_id OR t1.emp_id_from = $emp_id";
              //echo $sql;
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }


    function get_total_allocate_funds_to_depot($depotid,$status){
      $sql = "SELECT SUM(t1.allocate_amount) AS total_allocation FROM tbl_fund_allocation AS t1
              INNER JOIN tbl_employeer AS t2 ON t1.emp_id_to = t2.emp_id AND t2.depot_id = $depotid
              WHERE t1.fund_allocation_status = $status AND t2.depot_id = $depotid";
              //echo $sql; die;
      $data_result = $this->db->query($sql);
      $get_allocation = $data_result->result_array();
      return $get_allocation[0]['total_allocation'];
    }

    function get_total_expencess_by_depot($depotid,$status){
      $sql = "SELECT SUM(t1.bill_amount) AS total_bills FROM tbl_bill AS t1
              WHERE t1.bill_status = $status AND t1.depot_id = $depotid";
              //echo $sql; die;
      $data_result = $this->db->query($sql);
      $get_allocation = $data_result->result_array();
      return $get_allocation[0]['total_bills'];
    }


    function get_pending_fund_allocation_to_team_mem($userid,$status){
      $sql = "SELECT SUM(t1.allocate_amount) AS total_allocation FROM tbl_fund_allocation AS t1
              WHERE t1.fund_allocation_status = $status AND t1.emp_id_to = $userid";
      $data_result = $this->db->query($sql);
      $get_allocation = $data_result->result_array();
      return $get_allocation[0]['total_allocation'];
    }

    function get_pending_fund_transfer_by_team_mem($userid,$status){
      $sql = "SELECT SUM(t1.allocate_amount) AS total_allocation FROM tbl_fund_allocation AS t1
              WHERE t1.fund_allocation_status = $status AND t1.emp_id_from = $userid";
      $data_result = $this->db->query($sql);
      $get_allocation = $data_result->result_array();
      return $get_allocation[0]['total_allocation'];
    }

    function get_total_expencess_by_team_mem($memid,$status){
      $sql = "SELECT SUM(t1.bill_amount) AS total_bills FROM tbl_bill AS t1
              WHERE t1.bill_status = $status AND t1.create_user = $memid";
              //echo $sql; die;
      $data_result = $this->db->query($sql);
      $get_allocation = $data_result->result_array();
      return $get_allocation[0]['total_bills'];
    }


    function get_total_allocate_funds_to_office($officeid,$status){
      $sql = "SELECT SUM(t1.allocate_amount) AS total_allocation FROM tbl_fund_allocation AS t1
              INNER JOIN tbl_employeer AS t2 ON t1.emp_id_from = t2.emp_id AND t2.user_type = 2
              INNER JOIN tbl_employeer AS t3 ON t1.emp_id_to = t3.emp_id AND t3.branch_id = $officeid
              WHERE t1.fund_allocation_status = $status";
              //echo $sql; die;
      $data_result = $this->db->query($sql);
      $get_allocation = $data_result->result_array();
      return $get_allocation[0]['total_allocation'];
    }

    function get_total_expencess_by_office($officeid,$status){
      $sql = "SELECT SUM(t1.bill_amount) AS total_bills FROM tbl_bill AS t1
              WHERE t1.bill_status = $status AND t1.office_id = $officeid";
              //echo $sql; die;
      $data_result = $this->db->query($sql);
      $get_allocation = $data_result->result_array();
      return $get_allocation[0]['total_bills'];
    }


    function get_fund_allocation_data($faid){
              $sql = "SELECT t1.*,t3.fund_allocation_type_name FROM tbl_fund_allocation AS t1
                      INNER JOIN  tbl_fund_allocation_types AS t3 ON t1.fund_allocation_type = t3.fund_allocation_type_id
                      WHERE t1.fund_allocation_id = $faid";
              $data_result = $this->db->query($sql);
              return $data_result->result_array();
      }

}// end class <

?>
