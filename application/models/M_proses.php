<?php
class M_proses extends CI_Model{
	public function ins($table,$data_insert){
		$this->db->insert($table,$data_insert);
		return true;
	}
	public function upd($table,$data_update,$where){
		$this->db->where($where);
		$this->db->update($table,$data_update);
	}
	public function get($select,$table,$where){
		$q = $this->db->query("select $select from $table where $where");
		return $q;
	}
	public function del($table,$where){
		$this->db->where($where);
		$this->db->delete($table);
		return true;
	}
}
?>
