<?php
class Cetakkwitansi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_proses');
	}

	function cetak($noregistrasiop = "")
	{
		if ($this->session->userdata("sess_endoskopi")) {
			$sess_data = $this->session->userdata("sess_endoskopi");
			$data["id"] = $sess_data["id"];
			$data["nama"] = $sess_data["nama"];
			$noregop = isset($_POST['hidden_noregop']) ? $_POST['hidden_noregop'] : ',' . $noregistrasiop;
			$ex_noregop = explode(",", $noregop);
			$in_noregop = substr(join("','", $ex_noregop), 2) . "'";
			$data['pasien'] = $this->m_proses->get("noregistrasiop,tglregistrasiop,norm,namapasien,jk,tgllahir,unitasal,dokterpengirim,carabayar,notinop,total,penjamin", "vw_cetakkwitansiendoskopi", "noregistrasiop IN(" . $in_noregop . ")")->result();
			$this->load->view("v_cetakkwitansi", $data);
		} else {
			redirect("login", "refresh");
		}
	}
}
