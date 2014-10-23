<?php class m_rian extends CI_Model{
	
	function getAll($table,$fieldkey){
		$res = $this->db->query("SELECT * FROM `".$table."` order by `".$fieldkey."` = 'asc' ");
			if($res->num_rows > 0)
			return $res->result('array');
	}
	function getOne($table,$fieldkey,$id){
		$res = $this->db->query("SELECT * FROM `".$table."` WHERE `".$fieldkey."` = '$id' ");
			if($res->num_rows > 0)
			return $res->result('array');
	}
	function getNewId($table,$fieldkey){
		$res = $this->db->query("SELECT max(`".$fieldkey."`) as maxId from ".$table." ");
		if($res->num_rows > 0)
			$newId = $res->result('array');
			return $newId[0]['maxId'] + 1;
	}
	function checkBaru($table,$field,$value,$fieldkey, $id = NULL){
		$sql = "SELECT * FROM ".$table." WHERE `".$field."` = '$value'";
		if(isset($id)){
			 $sql .= " AND `".$fieldkey."` != '$id'";
		}
		$res = $this->db->query($sql);
		if($res->num_rows() > 0) 
		return TRUE;
		return FALSE;
	}
	function checkLama($table,$field,$value,$fieldkey,$valuefieldKey){
		$res = $this->db->query("SELECT count(`".$fieldkey."`) as `jumlah` from  `".$table."` WHERE 
			`".$field."` 	= '".$value."' and 
			`".$fieldkey."` != '".$valuefieldKey."'
		");
		$result = $res->result('array');
		if($result[0]['jumlah'] > 0){
			return TRUE;
			ECHO "ADA";
		}else{
			return FALSE;
			ECHO "KOSONG";
		}
	}
	function delete($table,$field,$id){
		$sql = "DELETE FROM ".$table." WHERE `".$field."` = '$id'";
		$res = $this->db->query($sql);
		return $res;
	}
	
	function getMultipleIn($table,$field,$value){
	$res = $this->db->query("SELECT * FROM `".$table."` WHERE `".$field."` IN (".$value.") ");
			// pre($res);exit;
			if($res->num_rows > 0)
			return $res->result('array');
	}
	
	
}
?>