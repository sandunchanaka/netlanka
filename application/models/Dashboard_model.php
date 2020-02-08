<?php

class Dashboard_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

	function get_allEvents(){
		$sql = "SELECT * FROM tbl_events WHERE status = 1 ORDER BY ord ASC";
		$data_result_location_all = $this->db->query($sql);
		return $data_result_location_all->result_array();
	}


		function get_no_of_parents(){
		$sql = "SELECT
					soldier.initials_name AS soldier_name,
					soldier.fid,
					soldier.sno,
					relation.rid,
					relation.initials_name AS parent_name,
					relation.nic,
					relationship.relationship_type,
					tbl_banks.bank_name,
					tbl_banks.bank_abbr,
					tbl_branch.branch_name,
					tbl_branch.branch_no,
					mapiya_account.account_no,
					relation.create_date,
					relation.update_date,
					service_type.service_type
				FROM
					relation
				INNER JOIN relationship ON relation.rid = relationship.rid AND relationship.act =1
				INNER JOIN mapiya_account ON relation.rid = mapiya_account.rid
				INNER JOIN tbl_banks ON mapiya_account.bank_account = tbl_banks.bank_id
				INNER JOIN tbl_branch ON mapiya_account.brid = tbl_branch.brid
				INNER JOIN soldier ON relationship.sid = soldier.sid
				INNER JOIN service_type ON soldier.fid = service_type.service_type_id
				WHERE
					relation.act = 1
				AND relation.app_status = 3
				AND relation.parents_live = 1
				AND mapiya_account.act = 1
				AND mapiya_account.acc_type = 1
				AND mapiya_account.act = 1
				AND relation.rid IN (
					SELECT
						relationship.rid
					FROM
						relationship
					WHERE relationship.act =1 AND
						relationship.relationship_type IN ('MOTHER', 'FATHER')
				)
				AND relation.rid IN (
					SELECT
						mapiya_account.rid
					FROM
						mapiya_account
					WHERE
						mapiya_account.act = 1
					AND mapiya_account.acc_type = 1
				)
				GROUP BY
					relation.rid";
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	function get_all_parents(){
		$sql = "SELECT 
					relation.rid,
					relation.initials_name,
					relation.nic,
					relation.bday
				FROM
					relation				
				WHERE
					relation.rid IN (SELECT
					relationship.rid
				FROM
					relationship
				WHERE relationship.act =1 AND
					relationship.relationship_type IN ('MOTHER', 'FATHER'))";
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}


	function get_no_of_soldiers(){
		$sql = "SELECT DISTINCT
						soldier.nic,
						soldier.sid,
						soldier.fid,
						soldier.sno,
						soldier.initials_name,
						soldier.district_id,
						soldier.rank,
						soldier.application_date,
						service_type.service_type
					FROM
						soldier
					INNER JOIN service_type ON service_type.service_type_id = soldier.fid
					";
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	
	
		function get_no_of_beneficiary_accounts(){
	
				$sql = "SELECT
					soldier.initials_name AS soldier_name,
					soldier.fid,
					soldier.sno,
					soldier.nic,
					service_type.service_type,
					tbl_ranks.rank_abbr,
					sup_tbl_regiments.regiment_name
				FROM
					soldier
				INNER JOIN service_type ON soldier.fid = service_type.service_type_id
				INNER JOIN tbl_ranks ON soldier.rank = tbl_ranks.rank_id
				LEFT JOIN sup_tbl_regiments ON soldier.regiment = sup_tbl_regiments.id
				WHERE
					soldier.approve = 3
				AND soldier.act = 1
				AND soldier.sid IN (
					SELECT
						relationship.sid
					FROM
						relationship
						INNER JOIN relation ON relationship.rid = relation.rid
					WHERE
						relationship.relationship_type IN ('MOTHER', 'FATHER')
					AND relationship.rid IN (
						SELECT
							mapiya_account.rid
						FROM
							mapiya_account
						WHERE
							mapiya_account.act = 1
					)
				AND relationship.act =1
				AND relation.act =1
				AND relation.data_aval =1
				AND relation.app_status =3
				AND relation.parents_live =1
				)";
			$data_result = $this->db->query($sql);
			return $data_result->num_rows();
		}
		
	
	function get_total_paid_amount_by_bank($slip_id){
            $sql = "SELECT  SUM(amount) AS totamount FROM parent_payment WHERE slip_id IN (SELECT max(tbl_slip_gen.slip_gen_id) FROM tbl_slip_gen WHERE tbl_slip_gen.approval_status =4) AND act_status =1";
             //echo $sql;
            $data_result = $this->db->query($sql);
			$totamount = $data_result->result_array();
            return $totamount[0]['totamount'];

      }
	  
			function get_no_of_suspendedAccounts(){
		$sql = "SELECT DISTINCT
					tbl_suspension_details.suspend_detail_id,
					tbl_suspension_details.parent_id,
					tbl_suspension_details.soldier_id,
					tbl_suspension_details.suspend_reason,
					tbl_suspension_details.remarks,
					tbl_suspension_details.suspension_date,
					tbl_suspension_details.app_status,
					tbl_suspension_details.active_status
				FROM
					tbl_suspension_details
				WHERE
					tbl_suspension_details.app_status IN (3) AND tbl_suspension_details.active_status = 1";
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	
		function get_all_pending_registration_details(){
		$sql = "SELECT
					soldier.sid,
					soldier.fid,
					soldier.sno,
					soldier.initials_name,
					soldier.district_id,
					soldier.rank,
					service_type.service_type
					FROM
					soldier
					INNER JOIN service_type ON service_type.service_type_id = soldier.fid
					WHERE soldier.approve IN (0,1,2)";

		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	
	function to_be_approval_slips(){
          $sql = "SELECT * FROM tbl_slip_gen WHERE approval_status IN (0,1,2,3)";
          //echo $sql; die;
          $data_result = $this->db->query($sql);
          return $data_result->num_rows();
        }
		
	function get_no_of_pending_suspendedAccounts(){
		$sql = "SELECT DISTINCT
					tbl_suspension_details.suspend_detail_id,
					tbl_suspension_details.parent_id,
					tbl_suspension_details.soldier_id,
					tbl_suspension_details.suspend_reason,
					tbl_suspension_details.remarks,
					tbl_suspension_details.suspension_date,
					tbl_suspension_details.app_status,
					tbl_suspension_details.app_status
				FROM
					tbl_suspension_details
				WHERE
					tbl_suspension_details.app_status IN (0,1,2) AND tbl_suspension_details.active_status = 1";
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	
	function get_no_of_soldiers_by_service_type($fid){
          $sql = "SELECT
					count(soldier.sid) AS countsoldier
				FROM
					soldier
				INNER JOIN service_type ON soldier.fid = service_type.service_type_id
				INNER JOIN tbl_ranks ON soldier.rank = tbl_ranks.rank_id
				LEFT JOIN sup_tbl_regiments ON soldier.regiment = sup_tbl_regiments.id
				WHERE
					soldier.approve = 3
				AND soldier.act = 1
				AND soldier.fid = $fid
				AND soldier.sid IN (
					SELECT
						relationship.sid
					FROM
						relationship
						INNER JOIN relation ON relationship.rid = relation.rid
					WHERE
						relationship.relationship_type IN ('MOTHER', 'FATHER')
					AND relationship.rid IN (
						SELECT
							mapiya_account.rid
						FROM
							mapiya_account
						WHERE
							mapiya_account.act = 1
					)
				AND relationship.act =1
				AND relation.act =1
				AND relation.data_aval =1
				AND relation.app_status =3
				AND relation.parents_live =1
				)";
          //echo $sql; die;
          $data_result = $this->db->query($sql);
          $getsoldier = $data_result->result_array();
		  return $getsoldier[0]['countsoldier'];
        }
		
		
		function get_no_of_acc_by_bank($bid){
          $sql = "SELECT
					relation.rid
				FROM
					relation
				INNER JOIN relationship ON relation.rid = relationship.rid AND relationship.act =1
				INNER JOIN mapiya_account ON relation.rid = mapiya_account.rid
				INNER JOIN tbl_banks ON mapiya_account.bank_account = tbl_banks.bank_id
				INNER JOIN tbl_branch ON mapiya_account.brid = tbl_branch.brid
				INNER JOIN soldier ON relationship.sid = soldier.sid
				INNER JOIN service_type ON soldier.fid = service_type.service_type_id
				WHERE
					relation.act = 1
				AND relation.app_status = 3
				AND relation.parents_live = 1
				AND mapiya_account.bank_account = $bid
				AND mapiya_account.act = 1
				AND mapiya_account.acc_type = 1
				AND mapiya_account.act = 1
				AND relation.rid IN (
					SELECT
						relationship.rid
					FROM
						relationship
					WHERE relationship.act =1 AND
						relationship.relationship_type IN ('MOTHER', 'FATHER')
				)
				AND relation.rid IN (
					SELECT
						mapiya_account.rid
					FROM
						mapiya_account
					WHERE
						mapiya_account.act = 1
					AND mapiya_account.acc_type = 1
				)
				GROUP BY
					relation.rid";
          //echo $sql; die;
          $data_result = $this->db->query($sql);
          return $data_result->num_rows();
        }
		
		
	function get_registerd_soldiers_by_date(){
		$sql = "SELECT soldier.create_date, MONTH(create_date) as cmonth, YEAR(create_date) as cyear FROM soldier WHERE soldier.create_date <= NOW() GROUP BY MONTH(create_date), YEAR(create_date) ORDER BY soldier.create_date DESC";
		$data_result_location_all = $this->db->query($sql);
		return $data_result_location_all->result_array();
	}
	
	function getcountnewsoldier_accounts($slip_date1,$slip_date2){
		$sql = "select sid,create_date from soldier where approve = 3 AND act = 1 AND create_date BETWEEN '$slip_date1' AND '$slip_date2'";
		//echo $sql;
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	function getcountupdatesoldier_accounts($slip_date1,$slip_date2){
		$sql = "select sid from soldier where approve = 3	AND act = 1 AND update_date BETWEEN '$slip_date1' AND '$slip_date2' AND create_date NOT BETWEEN '$slip_date1' AND '$slip_date2'";
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	function getcountsuspended_soldier_accounts($slip_date1,$slip_date2){
		$sql = "select suspend_detail_id from tbl_suspension_details where app_status = 3 AND active_status =1 AND create_date BETWEEN '$slip_date1' AND '$slip_date2' AND suspension_type = 'S' GROUP BY soldier_id";
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	function getcountpendingsoldier_accounts($slip_date1,$slip_date2){
		$sql = "select sid from soldier where update_date BETWEEN '$slip_date1' AND '$slip_date2' AND approve IN (0,1,2)";
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	function getallpendingsoldier_accounts(){
		$sql = "select sid from soldier where approve IN (0,1,2)";
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	function getcountpendingsuspended_soldier_accounts($slip_date1,$slip_date2){
		$sql = "select suspend_detail_id from tbl_suspension_details where create_date BETWEEN '$slip_date1' AND '$slip_date2' AND app_status IN (0,1,2) AND suspension_type = 'S' GROUP BY soldier_id";
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	function get_currentslip_date($slip_gen_id){
		$sql = "SELECT slip_date FROM tbl_slip_gen WHERE slip_gen_id = '$slip_gen_id'";
		$data_result_location_all = $this->db->query($sql);
		$getslip_date = $data_result_location_all->result_array();
		if(!empty($getslip_date)){
		return $getslip_date[0]['slip_date']; }
	}
	
	function to_totalslipmonths(){
          $sql = "SELECT * FROM tbl_slip_gen ORDER BY slip_date DESC";
          //echo $sql; die;
          $data_result = $this->db->query($sql);
          $retuenarr = $data_result->result_array();
		 
		  return $retuenarr;
        }
		
	function get_maxslip_gen_id(){
		$sql = "SELECT max(slip_date) as maxdate FROM tbl_slip_gen";
		$data_result_location_all = $this->db->query($sql);
		$getslip_date = $data_result_location_all->result_array();
		return $getslip_date[0]['maxdate'];
	}
	
		function get_no_of_soldiersby_month($tilldate){
		$sql = "SELECT DISTINCT
						soldier.nic,
						soldier.sid,
						soldier.fid,
						soldier.sno,
						soldier.initials_name,
						soldier.district_id,
						soldier.rank,
						soldier.application_date,
						service_type.service_type
					FROM
						soldier
					INNER JOIN service_type ON service_type.service_type_id = soldier.fid
					WHERE
						soldier.approve = 3
					AND soldier.act = 1 AND soldier.create_date <= '$tilldate'";
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	
			function get_no_of_beneficiary_accounts_by_date($tilldate){
	
				$sql = "SELECT DISTINCT
							soldier.nic,
							soldier.sid,
							soldier.fid,
							soldier.sno,
							soldier.initials_name,
							soldier.district_id,
							soldier.rank,
							soldier.application_date
						FROM
							soldier
						WHERE
							soldier.approve = 3
						AND soldier.act = 1
						AND soldier.create_date <= '$tilldate'
						AND soldier.sid IN (
							SELECT
								relationship.sid
							FROM
								relationship
							WHERE
								relationship.act =1 AND
								relationship.relationship_type IN ('MOTHER', 'FATHER')
								AND relationship.rid IN(SELECT mapiya_account.rid FROM mapiya_account)
						)";
						//echo $sql;
			$data_result = $this->db->query($sql);
			return $data_result->num_rows();
		}
		
		
		function getcountnewparents_accounts($slip_date1,$slip_date2){
	/*	$sql = "SELECT
	soldier.sno,
	soldier.initials_name AS soldier_name,
	soldier.fid,	
	relation.rid,
	relation.initials_name AS parent_name,
	relation.nic,
	relationship.relationship_type,
	tbl_banks.bank_name,
	tbl_branch.branch_name,
	tbl_banks.bank_abbr,
	tbl_branch.branch_no,
	mapiya_account.account_no,
	relation.create_date,
	relation.update_date,
	service_type.service_type
FROM
	relation
INNER JOIN relationship ON relation.rid = relationship.rid AND relationship.act =1
INNER JOIN mapiya_account ON relation.rid = mapiya_account.rid AND mapiya_account.act =1
INNER JOIN tbl_banks ON mapiya_account.bank_account = tbl_banks.bank_id
INNER JOIN tbl_branch ON mapiya_account.brid = tbl_branch.brid
INNER JOIN soldier ON relationship.sid = soldier.sid
INNER JOIN service_type ON soldier.fid =service_type.service_type_id
WHERE
	relation.app_status = 3
AND relation.act =1	
AND relation.parents_live = 1
AND relation.update_type = 1
AND relation.data_aval = 1
AND relation.update_date BETWEEN '$slip_date1'
AND '$slip_date2' GROUP BY relation.rid";*/

		$sql = "SELECT
					soldier.sno,
					soldier.initials_name AS soldier_name,
					soldier.fid,
					relation.rid,
					relation.initials_name AS parent_name,
					relation.nic,
					relationship.relationship_type,
					tbl_banks.bank_name,
					tbl_branch.branch_name,
					tbl_banks.bank_abbr,
					tbl_branch.branch_no,
					mapiya_account.account_no,
					relation.create_date,
					relation.update_date,
					service_type.service_type
				FROM
					relation
				INNER JOIN relationship ON relation.rid = relationship.rid
				AND relationship.act = 1
				INNER JOIN mapiya_account ON relation.rid = mapiya_account.rid
				AND mapiya_account.act = 1
				INNER JOIN tbl_banks ON mapiya_account.bank_account = tbl_banks.bank_id
				INNER JOIN tbl_branch ON mapiya_account.brid = tbl_branch.brid
				INNER JOIN soldier ON relationship.sid = soldier.sid
				INNER JOIN service_type ON soldier.fid = service_type.service_type_id
				WHERE
					relation.app_status = 3
				AND relation.act = 1
				AND relation.parents_live = 1
				AND relation.rid NOT IN (
					SELECT
						parent_payment.parent_id
					FROM
						parent_payment
					WHERE
						parent_payment.act_status = 1
					AND parent_payment.app_status = 4
				)
				AND relation.data_aval = 1
				GROUP BY
					relation.rid";
		//echo $sql; //die;
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}
		
	function getcountupdateparents_accounts($slip_date1,$slip_date2,$last_slip_id){
		/*$sql = "SELECT
soldier.sno,
	soldier.initials_name AS soldier_name,
	soldier.fid,	
	relation.rid,
	relation.initials_name AS parent_name,
	relation.nic,
	relationship.relationship_type,
	tbl_banks.bank_name,
	tbl_branch.branch_name,
	tbl_banks.bank_abbr,
	tbl_branch.branch_no,
	mapiya_account.account_no,
	relation.create_date,
relation.update_date,
service_type.service_type
FROM
	relation
INNER JOIN relationship ON relation.rid = relationship.rid AND relationship.act =1
INNER JOIN mapiya_account ON relation.rid = mapiya_account.rid
INNER JOIN tbl_banks ON mapiya_account.bank_account = tbl_banks.bank_id
INNER JOIN tbl_branch ON mapiya_account.brid = tbl_branch.brid
INNER JOIN soldier ON relationship.sid = soldier.sid
INNER JOIN service_type ON soldier.fid =service_type.service_type_id
WHERE
	relation.app_status = 3
AND relation.act =1	
AND relation.parents_live = 1
AND relation.update_type = 3
AND relation.data_aval = 1
AND relation.update_date BETWEEN '$slip_date1'
AND '$slip_date2' GROUP BY relation.rid";*/

$sql = "SELECT
				soldier.sno,
				soldier.initials_name AS soldier_name,
				soldier.fid,
				relation.rid,
				relation.initials_name AS parent_name,
				relation.nic,
				relationship.relationship_type,
				tbl_banks.bank_name,
				tbl_branch.branch_name,
				tbl_banks.bank_abbr,
				tbl_branch.branch_no,
				mapiya_account.account_no,
				relation.create_date,
				relation.update_date,
				service_type.service_type
			FROM
				relation
			INNER JOIN relationship ON relation.rid = relationship.rid
			AND relationship.act = 1
			INNER JOIN mapiya_account ON relation.rid = mapiya_account.rid
			AND mapiya_account.act = 1
			INNER JOIN tbl_banks ON mapiya_account.bank_account = tbl_banks.bank_id
			INNER JOIN tbl_branch ON mapiya_account.brid = tbl_branch.brid
			INNER JOIN soldier ON relationship.sid = soldier.sid
			INNER JOIN service_type ON soldier.fid = service_type.service_type_id
			WHERE
				relation.app_status = 3
			AND relation.act = 1
			AND relation.parents_live = 1
			AND relation.rid NOT IN (
										SELECT
											parent_payment.parent_id
											FROM
											parent_payment
											WHERE
											parent_payment.act_status = 1
											AND parent_payment.app_status = 4
											AND parent_payment.slip_id = $last_slip_id
									)
			AND relation.rid IN (
										SELECT
											parent_payment.parent_id
										FROM
											parent_payment
										WHERE
											parent_payment.act_status = 1
											AND parent_payment.app_status = 4
								)
			AND relation.data_aval = 1
			GROUP BY
				relation.rid";
//echo $sql; //die;
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}
	
	function getcountupdate_applications($slip_date1,$slip_date2,$last_slip_id){
		$sql = "SELECT
				soldier.sno,
				soldier.initials_name AS soldier_name,
				soldier.fid,
				relation.rid,
				relation.initials_name AS parent_name,
				relation.nic,
				relationship.relationship_type,
				tbl_banks.bank_name,
				tbl_branch.branch_name,
				tbl_banks.bank_abbr,
				tbl_branch.branch_no,
				mapiya_account.account_no,
				relation.create_date,
				relation.update_date,
				service_type.service_type
			FROM
				relation
			INNER JOIN relationship ON relation.rid = relationship.rid
			AND relationship.act = 1
			INNER JOIN mapiya_account ON relation.rid = mapiya_account.rid
			AND mapiya_account.act = 1
			INNER JOIN tbl_banks ON mapiya_account.bank_account = tbl_banks.bank_id
			INNER JOIN tbl_branch ON mapiya_account.brid = tbl_branch.brid
			INNER JOIN soldier ON relationship.sid = soldier.sid AND soldier.act = 1
			INNER JOIN service_type ON soldier.fid = service_type.service_type_id
			WHERE
				relation.app_status = 3
			AND relation.act = 1
			AND relation.parents_live = 1
			AND relation.rid NOT IN (
										SELECT
											parent_payment.parent_id
											FROM
											parent_payment
											WHERE
											parent_payment.act_status = 1
											AND parent_payment.app_status = 4
											AND parent_payment.slip_id = $last_slip_id
									)
			AND relation.rid IN (
										SELECT
											parent_payment.parent_id
										FROM
											parent_payment
										WHERE
											parent_payment.act_status = 1
											AND parent_payment.app_status = 4
								)
			AND relation.data_aval = 1
			GROUP BY
				soldier.sid";
//echo $sql; die;
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	function get_new_parents_accounts($slip_date1,$slip_date2){
		$sql = "SELECT
					soldier.initials_name AS soldier_name,
					soldier.fid,
					soldier.sno,
					relation.rid,
					relation.initials_name AS parent_name,
					relation.nic,
					relationship.relationship_type,
					tbl_banks.bank_name,
					tbl_banks.bank_abbr,
					tbl_branch.branch_name,
					tbl_branch.branch_no,
					mapiya_account.account_no,
					relation.create_date,
					relation.update_date,
					service_type.service_type
				FROM
					relation
				INNER JOIN relationship ON relation.rid = relationship.rid AND relationship.act =1
				INNER JOIN mapiya_account ON relation.rid = mapiya_account.rid
				INNER JOIN tbl_banks ON mapiya_account.bank_account = tbl_banks.bank_id
				INNER JOIN tbl_branch ON mapiya_account.brid = tbl_branch.brid
				INNER JOIN soldier ON relationship.sid = soldier.sid
				INNER JOIN service_type ON soldier.fid = service_type.service_type_id
				WHERE
					relation.app_status = 3
				AND relation.parents_live = 1
				AND relation.update_type = 1
				AND relation.data_aval = 1
				AND relation.update_date BETWEEN '$slip_date1' AND '$slip_date2'";
		//echo $sql; die;
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}
	
		function getallpendingparents_accounts(){
		$sql = "select rid from relation where app_status IN (0,1,2) AND parents_live =1";
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	
	function getcountpendingparents_accounts($slip_date1,$slip_date2){
		$sql = "select rid from relation where update_date BETWEEN '$slip_date1' AND '$slip_date2' AND app_status IN (0,1,2) AND parents_live =1";
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	
	function getcountsuspended_parents_accounts($slip_date1,$slip_date2){
		$sql = "SELECT
				tbl_suspension_details.suspend_detail_id
					FROM
						tbl_suspension_details
					INNER JOIN relation ON tbl_suspension_details.parent_id = relation.rid
					INNER JOIN relationship ON relation.rid = relationship.rid AND relationship.act =1
					INNER JOIN mapiya_account ON relation.rid = mapiya_account.rid AND mapiya_account.act =1
					INNER JOIN tbl_banks ON mapiya_account.bank_account = tbl_banks.bank_id 
					INNER JOIN tbl_branch ON mapiya_account.brid = tbl_branch.brid
					INNER JOIN soldier ON relationship.sid = soldier.sid
					INNER JOIN service_type ON soldier.fid = service_type.service_type_id
					WHERE
						tbl_suspension_details.app_status = 3
					AND tbl_suspension_details.active_status = 1
					
					AND tbl_suspension_details.create_date BETWEEN '$slip_date1' AND '$slip_date2'";
		//echo $sql; die;
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	function get_suspended_parents_accounts($slip_date1,$slip_date2){
		$sql = "SELECT
					tbl_suspension_details.suspend_detail_id,
					soldier.initials_name AS soldier_name,
					soldier.sno,
					soldier.fid,	
					relation.rid,
					relation.initials_name AS parent_name,
					relation.nic,
					relationship.relationship_type,
					tbl_banks.bank_name,
					tbl_banks.bank_abbr,
					tbl_branch.branch_name,
					tbl_branch.branch_no,
					mapiya_account.account_no,
					relation.create_date,
					relation.update_date,
					service_type.service_type
				FROM
					tbl_suspension_details
				INNER JOIN relation ON tbl_suspension_details.parent_id = relation.rid
				INNER JOIN relationship ON relation.rid = relationship.rid AND relationship.act =1
				INNER JOIN mapiya_account ON relation.rid = mapiya_account.rid AND mapiya_account.act =1
				INNER JOIN tbl_banks ON mapiya_account.bank_account = tbl_banks.bank_id
				INNER JOIN tbl_branch ON mapiya_account.brid = tbl_branch.brid
				INNER JOIN soldier ON relationship.sid = soldier.sid
				INNER JOIN service_type ON soldier.fid = service_type.service_type_id
				WHERE
					tbl_suspension_details.app_status = 3
				AND tbl_suspension_details.active_status = 1
				AND tbl_suspension_details.create_date BETWEEN '$slip_date1' AND '$slip_date2'";
		//echo $sql; die;
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}
	
	function getcountpendingsuspended_parent_accounts($slip_date1,$slip_date2){
		$sql = "select suspend_detail_id from tbl_suspension_details where create_date BETWEEN '$slip_date1' AND '$slip_date2' AND app_status IN (0,1,2)";
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	function get_no_of_parentsby_month($tilldate){
		$sql = "SELECT
	relation.rid,
	relation.initials_name,
	relation.nic,
	relation.bday
FROM
	relation
WHERE
	relation.act = 1
AND relation.app_status = 3
AND relation.parents_live = 1
AND relation.rid IN (
	SELECT
		relationship.rid
	FROM
		relationship
	WHERE
		relationship.act =1 AND
		relationship.relationship_type IN ('MOTHER', 'FATHER')
		AND relationship.rid IN(SELECT mapiya_account.rid FROM mapiya_account)
		)
					AND relation.create_date <= '$tilldate'";
					//echo $sql;
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	function get_no_of_beneficiary_parents_by_date($tilldate){
	
				$sql = "SELECT
							relation.rid,
							relation.initials_name,
							relation.nic,
							relation.bday
						FROM
							relation
						WHERE
							relation.act = 1
						AND relation.app_status = 3
						AND relation.parents_live = 1
						AND relation.rid IN (
							SELECT
								relationship.rid
							FROM
								relationship
							WHERE
								relationship.act =1 AND
								relationship.relationship_type IN ('MOTHER', 'FATHER')
								AND relationship.rid IN(SELECT mapiya_account.rid FROM mapiya_account)
						)
						AND relation.rid IN (
							SELECT
								mapiya_account.rid
							FROM
								mapiya_account
						)
						AND relation.create_date <= '$tilldate'";
						//echo $sql;
			$data_result = $this->db->query($sql);
			return $data_result->num_rows();
		}
		
		
	function getc_suspended_accounts_by_month($slip_date1,$slip_date2){
		$sql = "select suspend_detail_id from tbl_suspension_details where app_status = 3 AND active_status =1 AND create_date BETWEEN '$slip_date1' AND '$slip_date2'";
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	function getpending_suspension_accounts($slip_date1,$slip_date2){
		$sql = "select suspend_detail_id from tbl_suspension_details where create_date BETWEEN '$slip_date1' AND '$slip_date2' AND app_status IN (0,1,2)";
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	
function get_no_of_suspendedAccountsBy_month($tilldate){
		$sql = "SELECT DISTINCT
					tbl_suspension_details.suspend_detail_id,
					tbl_suspension_details.parent_id,
					tbl_suspension_details.soldier_id,
					tbl_suspension_details.suspend_reason,
					tbl_suspension_details.remarks,
					tbl_suspension_details.suspension_date,
					tbl_suspension_details.app_status,
					tbl_suspension_details.app_status
				FROM
					tbl_suspension_details
				WHERE
					tbl_suspension_details.app_status IN (3) AND tbl_suspension_details.active_status = 1 AND tbl_suspension_details.create_date <= '$tilldate'";
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	
	function getcountsuspended_parents_accounts_by_reason($slip_date1,$slip_date2,$reason){
		$sql = "SELECT
					tbl_suspension_details.suspend_detail_id
				FROM
					tbl_suspension_details
				INNER JOIN relation ON tbl_suspension_details.parent_id = relation.rid
				INNER JOIN relationship ON relation.rid = relationship.rid AND relationship.act =1
				INNER JOIN mapiya_account ON relation.rid = mapiya_account.rid AND mapiya_account.act =1
				INNER JOIN tbl_banks ON mapiya_account.bank_account = tbl_banks.bank_id
				INNER JOIN tbl_branch ON mapiya_account.brid = tbl_branch.brid
				INNER JOIN soldier ON relationship.sid = soldier.sid
				INNER JOIN service_type ON soldier.fid = service_type.service_type_id
				WHERE
					tbl_suspension_details.app_status = 3
				AND tbl_suspension_details.active_status = 1
				AND tbl_suspension_details.suspend_reason IN ($reason)
				AND tbl_suspension_details.create_date BETWEEN '$slip_date1' AND '$slip_date2'";
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	function getcountsuspended_parents_accounts_by_otherreason($slip_date1,$slip_date2){
		$sql = "SELECT
					tbl_suspension_details.suspend_detail_id
				FROM
					tbl_suspension_details
				INNER JOIN relation ON tbl_suspension_details.parent_id = relation.rid
				INNER JOIN relationship ON relation.rid = relationship.rid AND relationship.act =1
				INNER JOIN mapiya_account ON relation.rid = mapiya_account.rid AND mapiya_account.act =1
				INNER JOIN tbl_banks ON mapiya_account.bank_account = tbl_banks.bank_id
				INNER JOIN tbl_branch ON mapiya_account.brid = tbl_branch.brid
				INNER JOIN soldier ON relationship.sid = soldier.sid
				INNER JOIN service_type ON soldier.fid = service_type.service_type_id
				WHERE
					tbl_suspension_details.app_status = 3
				AND tbl_suspension_details.active_status = 1
				AND tbl_suspension_details.suspend_reason != 1
				AND tbl_suspension_details.create_date BETWEEN '$slip_date1' AND '$slip_date2'";
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
	function get_updateparents_accounts($slip_date1,$slip_date2){
		$sql = "SELECT
					soldier.initials_name AS soldier_name,
					soldier.sno,
					soldier.fid,	
					relation.rid,
					relation.initials_name AS parent_name,
					relation.nic,
					relationship.relationship_type,
					tbl_banks.bank_name,
					tbl_banks.bank_abbr,
					tbl_branch.branch_name,
					tbl_branch.branch_no,
					mapiya_account.account_no,
					relation.create_date,
					relation.update_date,
					service_type.service_type
				FROM
					relation
				INNER JOIN relationship ON relation.rid = relationship.rid AND relationship.act =1
				INNER JOIN mapiya_account ON relation.rid = mapiya_account.rid
				INNER JOIN tbl_banks ON mapiya_account.bank_account = tbl_banks.bank_id
				INNER JOIN tbl_branch ON mapiya_account.brid = tbl_branch.brid
				INNER JOIN soldier ON relationship.sid = soldier.sid
				INNER JOIN service_type ON soldier.fid = service_type.service_type_id
				WHERE
					relation.app_status = 3
				AND relation.act =1	
				AND relation.parents_live = 1
				AND relation.update_type = 3
				AND relation.data_aval = 1
				AND relation.update_date BETWEEN '$slip_date1'
				AND '$slip_date2'";
//echo $sql; die;
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}
	
	function get_suspended_parents_account_by_reason($slip_date1,$slip_date2,$sus_reason){
		$sql = "SELECT
					tbl_suspension_details.suspend_detail_id,
					soldier.initials_name AS soldier_name,
					soldier.sno,
					soldier.fid,	
					relation.rid,
					relation.initials_name AS parent_name,
					relation.nic,
					relationship.relationship_type,
					tbl_banks.bank_name,
					tbl_banks.bank_abbr,
					tbl_branch.branch_name,
					tbl_branch.branch_no,
					mapiya_account.account_no,
					relation.create_date,
					relation.update_date,
					service_type.service_type
				FROM
					tbl_suspension_details
				INNER JOIN relation ON tbl_suspension_details.parent_id = relation.rid
				INNER JOIN relationship ON relation.rid = relationship.rid AND relationship.act =1
				INNER JOIN mapiya_account ON relation.rid = mapiya_account.rid AND mapiya_account.act =1
				INNER JOIN tbl_banks ON mapiya_account.bank_account = tbl_banks.bank_id
				INNER JOIN tbl_branch ON mapiya_account.brid = tbl_branch.brid
				INNER JOIN soldier ON relationship.sid = soldier.sid
				INNER JOIN service_type ON soldier.fid = service_type.service_type_id
				WHERE
					tbl_suspension_details.app_status = 3
				AND tbl_suspension_details.active_status = 1
				AND tbl_suspension_details.suspend_reason IN ($sus_reason)
				AND tbl_suspension_details.create_date BETWEEN '$slip_date1' AND '$slip_date2'";
		//echo $sql; die;
		$data_result = $this->db->query($sql);
		return $data_result->result_array();
	}
	
			function getcountnew_applications($slip_date1,$slip_date2,$up_type){
		/*$sql = "SELECT
					soldier.sno,
						soldier.initials_name AS soldier_name,
						soldier.fid,	
						relation.rid,
						relation.initials_name,
						relation.nic,
						relationship.relationship_type,
						tbl_banks.bank_name,
						tbl_branch.branch_name,
						tbl_banks.bank_abbr,
						tbl_branch.branch_no,
						mapiya_account.account_no,
						relation.create_date,
					relation.update_date
					FROM
						relation
					INNER JOIN relationship ON relation.rid = relationship.rid AND relationship.act =1
					INNER JOIN mapiya_account ON relation.rid = mapiya_account.rid
					INNER JOIN tbl_banks ON mapiya_account.bank_account = tbl_banks.bank_id
					INNER JOIN tbl_branch ON mapiya_account.brid = tbl_branch.brid
					INNER JOIN soldier ON relationship.sid = soldier.sid
					WHERE
						relation.app_status = 3
					AND relation.act =1	
					AND relation.parents_live = 1
					AND relation.update_type = $up_type
					AND relation.data_aval = 1
					AND relation.update_date BETWEEN '$slip_date1'
					AND '$slip_date2' GROUP BY soldier.sid";*/
					
					$sql = "SELECT
					soldier.sno,
					soldier.initials_name AS soldier_name,
					soldier.fid,
					relation.rid,
					relation.initials_name AS parent_name,
					relation.nic,
					relationship.relationship_type,
					tbl_banks.bank_name,
					tbl_branch.branch_name,
					tbl_banks.bank_abbr,
					tbl_branch.branch_no,
					mapiya_account.account_no,
					relation.create_date,
					relation.update_date,
					service_type.service_type
				FROM
					relation
				INNER JOIN relationship ON relation.rid = relationship.rid
				AND relationship.act = 1
				INNER JOIN mapiya_account ON relation.rid = mapiya_account.rid
				AND mapiya_account.act = 1
				INNER JOIN tbl_banks ON mapiya_account.bank_account = tbl_banks.bank_id
				INNER JOIN tbl_branch ON mapiya_account.brid = tbl_branch.brid
				INNER JOIN soldier ON relationship.sid = soldier.sid
				INNER JOIN service_type ON soldier.fid = service_type.service_type_id
				WHERE
					relation.app_status = 3
				AND relation.act = 1
				AND relation.parents_live = 1
				AND relation.rid NOT IN (
					SELECT
						parent_payment.parent_id
					FROM
						parent_payment
					WHERE
						parent_payment.act_status = 1
					AND parent_payment.app_status = 4
				)
				AND relation.data_aval = 1
				GROUP BY
						soldier.sid";
					
		//echo $sql; //die;
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
	
		function getcountsuspended_applications($slip_date1,$slip_date2){
		$sql = "SELECT
				tbl_suspension_details.suspend_detail_id
					FROM
						tbl_suspension_details
					INNER JOIN relation ON tbl_suspension_details.parent_id = relation.rid
					INNER JOIN relationship ON relation.rid = relationship.rid AND relationship.act =1
					INNER JOIN mapiya_account ON relation.rid = mapiya_account.rid AND mapiya_account.act =1
					INNER JOIN tbl_banks ON mapiya_account.bank_account = tbl_banks.bank_id
					INNER JOIN tbl_branch ON mapiya_account.brid = tbl_branch.brid
					INNER JOIN soldier ON relationship.sid = soldier.sid
					INNER JOIN service_type ON soldier.fid = service_type.service_type_id
					WHERE
						tbl_suspension_details.app_status = 3
					AND tbl_suspension_details.active_status = 1
					
					AND tbl_suspension_details.create_date BETWEEN '$slip_date1' AND '$slip_date2'";
		//echo $sql; die;
		$data_result = $this->db->query($sql);
		return $data_result->num_rows();
	}
		
}// end class



?>
