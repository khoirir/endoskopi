<?php
class M_login extends CI_Model{
	function userLogin($username,$password){
		$sql = $this->db->query("SELECT tam.username AS ID, tam.namaUser AS NAMA, tam.loket_unit AS UNIT FROM t_aksesmenu tam INNER JOIN t_pemakai tp ON tam.username = tp.username WHERE tam.username=? AND tp.password=? AND tam.loket_unit = 'ENDOSKOPI'",array($username,$password));
		return $sql;
	}
}
