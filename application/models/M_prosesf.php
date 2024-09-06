<?php
class M_prosesf extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->db2=$this->load->database('farmasi',TRUE);
	}

	public function ins($table,$data_insert){
		$this->db2->insert($table,$data_insert);
		return true;
	}	
	public function upd($table,$data_update,$where){
		$this->db2->where($where);
		$this->db2->update($table,$data_update);
	}
	public function get($select,$table,$where){
		return $this->db2->query("select $select from $table where $where");
	}
	public function del($table,$where){
		$this->db2->where($where);
		$this->db2->delete($table);
		return true;
	}
	public function get_sp($query){
		return $this->db2->query($query);
	}
}
?>
