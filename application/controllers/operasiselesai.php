<?php
class Operasiselesai extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_operasiselesai');
	}

	//TODO BEGIN FORM INDEX
	function index()
	{
		if ($this->session->userdata("sess_endoskopi")) {
			$sess_data = $this->session->userdata("sess_endoskopi");
			$data["id"] = $sess_data["id"];
			$data['nama'] = $sess_data["nama"];
			$data["jenisoperasi"] = $this->m_operasiselesai->getJenisOperasi();
			$data["operator"] = $this->m_operasiselesai->getDokter();
			$this->load->view("includes/v_header", $data);
			$this->load->view("v_operasiselesai", $data);
			$this->load->view("includes/v_footer");
		} else {
			redirect("login", "refresh");
		}
	}

	function permintaanList()
	{
		$tglawal = date("Y-m-d", strtotime($_POST['tglawal'])) . " 00:00:00";
		$tglakhir = date("Y-m-d", strtotime($_POST['tglakhir'])) . " 23:59:59";
		$jenisop = $_POST['jenisop'];
		$operator = $_POST["operator"];
		$sql_data = $this->m_operasiselesai->dataOperasiSelesai($tglawal, $tglakhir, $jenisop, $operator)->result_array();
		$data = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => 0,
			'recordsFiltered' => 0,
			'data' => $sql_data
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	//TODO END FORM INDEX

	function eksporexcel()
	{
		if ($this->session->userdata("sess_endoskopi")) {
			$tglawal = date("Y-m-d", strtotime($_POST['tglawal'])) . " 00:00:00";
			$tglakhir = date("Y-m-d", strtotime($_POST['tglakhir'])) . " 23:59:59";
			$jenisop = $_POST['jenisop'];
			$operator = $_POST["operator"];
			$data['tgl_awal'] = $_POST['tglawal'];
			$data['tgl_akhir'] = $_POST['tglakhir'];
			$data['operasi_selesai'] = $this->m_operasiselesai->getDataOperasi($tglawal, $tglakhir, $jenisop, $operator);
			$this->load->view("v_tableoperasiselesai", $data);
		} else {
			redirect("login", "refresh");
		}
	}

	function getDetail()
	{
		$noregop = $this->input->post('noregop');
		$data['detail_pasien'] = $this->m_operasiselesai->getDetailPasien($noregop)->row();
		$notinop = !empty($data['detail_pasien']) ? $data['detail_pasien']->notindakanop : '';
		$data['operator'] = $this->m_operasiselesai->getDetailPelaksanaOperasi($notinop)->row();
		$data['tindakan'] = $this->m_operasiselesai->getTindakan($notinop)->result();
		$data['hasiloperasi'] = $this->m_operasiselesai->getLaporanHasilOperasi($noregop)->row();
		echo json_encode($data);
	}

	function getDiagnosaPasien()
	{
		$norm = $_POST["norm"];
		$data = $this->m_operasiselesai->getDiagnosaPasien($norm)->result();
		echo json_encode($data);
	}
}
