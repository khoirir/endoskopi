<?php
class Permintaanbelum extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_permintaanbelum');
	}

	public function index()
	{
		if ($this->session->userdata("sess_endoskopi")) {
			$sess_data = $this->session->userdata("sess_endoskopi");
			$data["id"] = $sess_data["id"];
			$data['nama'] = $sess_data["nama"];
			$this->load->view("includes/v_header", $data);
			$this->load->view("v_permintaanbelum");
			$this->load->view("includes/v_footer");
		} else {
			redirect("login", "refresh");
		}
	}

	public function permintaanList()
	{
		$search = $_POST['search']['value'];
		$limit = $_POST['length'];
		$start = $_POST['start'];
		$order_index = $_POST['order'][0]['column'];
		$order_field = $_POST['columns'][$order_index]['data'];
		$order_ascdesc = $_POST['order'][0]['dir'];
		$sql_total = $this->m_permintaanbelum->countAll();
		$sql_data = $this->m_permintaanbelum->filter($search, $limit, $start, $order_field, $order_ascdesc);
		$sql_filter = $this->m_permintaanbelum->countFilter($search);
		$callback = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $sql_total,
			'recordsFiltered' => $sql_filter,
			'data' => $sql_data
		);
		header('Content-Type: application/json');
		echo json_encode($callback);
	}

	function getDataCount()
	{
		$sql_total = $this->m_permintaanbelum->countAll();
		echo json_encode($sql_total);
	}

	function getDetailPemesananOperasi()
	{
		$noregop = $_POST["noregop"];
		$data = $this->m_permintaanbelum->getDetailPemesananOperasi($noregop)->row();
		echo json_encode($data);
	}

	function getDetailPasien()
	{
		$norm = $_POST["norm"];
		$data = $this->m_permintaanbelum->getDetailPasien($norm)->row();
		echo json_encode($data);
	}

	function getDetailAsalPasien()
	{
		$noregistrasi = $_POST["noregistrasi"];
		$data = $this->m_permintaanbelum->getDetailAsalPasien($noregistrasi)->row();
		echo json_encode($data);
	}

	function getDetailTindakanPasien()
	{
		$noregop = $_POST['noregop'];
		$data = $this->m_permintaanbelum->getDetailTindakanPasien($noregop)->result();
		echo json_encode($data);
	}

	function getDiagnosaPrapost()
	{
		$noregop = $_POST["noregop"];
		$data = $this->m_permintaanbelum->getDiagnosaPraPost($noregop)->row();
		echo json_encode($data);
	}

	function getDiagnosaPasien()
	{
		$norm = $_POST["norm"];
		$data = $this->m_permintaanbelum->getDiagnosaPasien($norm)->result();
		echo json_encode($data);
	}

	function updateKonfirmasiOP($jenis)
	{
		$sess_data = $this->session->userdata("sess_endoskopi");
		$idUser = $sess_data["id"];
		$noregop = $_POST['noregop'];
		if ($jenis == "konfirm") {
			$tglpelaksanaanop = $this->input->post("tglpelaksanaanop");
			$jampelaksanaanop = $this->input->post("jampelaksanaanop");
			$tgl_konfirmasi = date("Y-m-d", strtotime($tglpelaksanaanop));
			$jam_konfirmasi = date("H:i:s", strtotime($jampelaksanaanop));
			$tglkonfirmasi = $tgl_konfirmasi . " " . $jam_konfirmasi;
			$statusop = "1";
			$data = $this->m_permintaanbelum->updateTanggalKonfirmasiOP($noregop, $tglkonfirmasi, $statusop, $idUser);
			echo json_encode($data);
		} else if ($jenis == "batal") {
			$statusop = "6";
			$data = $this->m_permintaanbelum->batalRegistrasi($noregop, $statusop, $idUser);
			echo json_encode($data);
		}
	}
}
