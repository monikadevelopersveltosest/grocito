<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model
{
	function getwheretransaction($whr,$orderby)
	{
		$sql = "SELECT t.*,
				pr.remark as payment_remark,
				if(t.user_type = 'user',(SELECT users.membership_id FROM users WHERE users.id = t.userid),'admin') as tousermembership_id,
				if(t.from_type = 'user',(SELECT users.membership_id FROM users WHERE users.id = t.fromid),'admin') as fromusermembership_id 
				FROM txn as t
				LEFT JOIN payment_remark as pr on pr.id = t.payment_remark_id
				$whr
				$orderby
				";
		$result = $this->db->query($sql)->result_array();
		//echo $this->db->last_query(); die();
		return $result;

	}
}