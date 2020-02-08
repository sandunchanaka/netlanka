<?php

class Site_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    function insert_tower($data){

      $result = $this->db->insert('tbl_towers', $data);
      $last_id = $this->db->insert_id();
        return $last_id;

    }

    function get_all_towers(){
      $sql = "SELECT * FROM tbl_towers";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_tower_details($tower_id){
      $sql = "SELECT * FROM tbl_towers WHERE tower_id =$tower_id";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function update_tower_details($id,$updatedata){

          $this->db->where('tower_id', $id);
              $this->db->update('tbl_towers', $updatedata);
              return $this->db->get('tbl_towers')->row()->tower_id;


    }

    function get_active_towers(){
      $sql = "SELECT * FROM tbl_towers WHERE tower_status =1";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_active_service_providers(){
      $sql = "SELECT * FROM tbl_service_provider WHERE sp_status =1";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function insert_tower_data($data){

      $result = $this->db->insert('tbl_tower_data', $data);
      $last_id = $this->db->insert_id();
        return $last_id;

    }


    function get_all_tower_details(){
      $sql = "SELECT t1.*,t2.tower_name,t3.service_provider_name FROM tbl_tower_data AS t1 INNER JOIN  tbl_towers AS t2 ON t1.tower_id = t2.tower_id
                INNER JOIN tbl_service_provider AS t3 ON t1.sp_id = t3.service_provider_id";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }

    function get_tower_data_byID($id){
      $sql = "SELECT * FROM tbl_tower_data WHERE tower_data_id =$id";
      $data_result = $this->db->query($sql);
      return $data_result->result_array();
    }


    function update_tower_data($id,$updatedata){

        $this->db->where('tower_data_id', $id);
        $this->db->update('tbl_tower_data', $updatedata);
        return $this->db->get('tbl_tower_data')->row()->tower_data_id;


    }


}// end class

?>
