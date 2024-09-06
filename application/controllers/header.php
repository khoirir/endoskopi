<?php
class Header extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_header');
	}

	function getCountPermintaan(){
		$data['belumbaca']=$this->m_header->hitungBelumBaca();
		$data['sudah']=$this->m_header->hitungPermintaanSudah();
		$data['belum']=$this->m_header->hitungPermintaanBelum();
		$data['selesaitindakan']=$this->m_header->hitungPermintaanSelesaiTindakan();
		echo json_encode($data);
	}

}
	
?>