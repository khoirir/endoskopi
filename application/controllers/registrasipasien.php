<?php
class Registrasipasien extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_registrasipasien');
		$this->load->model('m_proses');
	}

	public function index()
	{
		if ($this->session->userdata("sess_endoskopi")) {
			$sess_data = $this->session->userdata("sess_endoskopi");
			$data["id"] = $sess_data["id"];
			$data['nama'] = $sess_data["nama"];
			$data['jenisoperasi'] = $this->m_registrasipasien->getJenisOP();
			$data["dokter"] = $this->m_registrasipasien->getDokter();
			$this->load->view("includes/v_header", $data);
			$this->load->view("v_registrasipasien");
			$this->load->view("includes/v_footer");
		} else {
			redirect("login", "refresh");
		}
	}

	// function getICD()
	// {
	// 	$jenisicd = $_POST["jenisicd"];
	// 	$sql = "";
	// 	if ($jenisicd == "10") {
	// 		$sql = $this->m_proses->get("kdIcd10 AS kdicd,icd10 AS icd", "t_icd10", "kdIcd10!='aselole' ORDER BY kdIcd10 ASC")->result();
	// 	} else if ($jenisicd == "9") {
	// 		$sql = $this->m_proses->get("kdIcd9 AS kdicd,icd9 AS icd", "t_icd9", "kdIcd9!='aselole' ORDER BY kdIcd9 ASC")->result();
	// 	}
	// 	echo json_encode($sql);
	// }

	function dataTableDiagnosa()
	{
		$icd = $_POST["icd"];

		$search = $_POST['search']['value'];
		$limit = $_POST['length'];
		$start = $_POST['start'];
		$order_index = $_POST['order'][0]['column'];

		$total_data = $icd == "ICD 10" ? $this->m_proses->get("null", "t_icd10", "kdIcd10!='aselole'")->num_rows() : $this->m_proses->get("null", "t_icd9", "kdIcd9!='aselole'")->num_rows();
		$record = $icd == "ICD 10" ? $this->m_proses->get("kdIcd10 AS kdicd,icd10 AS icd,keterangan", "t_icd10", "kdIcd10 LIKE '%$search%' OR icd10 LIKE '%$search%' OR keterangan LIKE '%$search%' ORDER BY kdIcd10 ASC LIMIT $start,$limit")->result() : $this->m_proses->get("kdIcd9 AS kdicd,icd9 AS icd,' - ' AS keterangan", "t_icd9", "kdIcd9 LIKE '%$search%' OR icd9 LIKE '%$search%' ORDER BY kdIcd9 ASC LIMIT $start,$limit")->result();
		$total_data_filter = $icd == "ICD 10" ? $this->m_proses->get("null", "t_icd10", "kdIcd10 LIKE '%$search%' OR icd10 LIKE '%$search%' OR keterangan LIKE '%$search%'")->num_rows() : $this->m_proses->get("null", "t_icd9", "kdIcd9 LIKE '%$search%' OR icd9 LIKE '%$search%'")->num_rows();;
		$json_data = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $total_data,
			'recordsFiltered' => $total_data_filter,
			'data' => $record
		);
		echo json_encode($json_data);
	}

	function getPasien()
	{
		$instalasi = $this->input->post('instalasi');
		$norm = $this->input->post('norm');
		$data["cek"] = $this->m_registrasipasien->cekPasien($norm)->row();
		$data["pasien"] = $this->m_registrasipasien->getPasien($instalasi, $norm)->row();

		echo json_encode($data);
	}

	function getDiagnosaPasien()
	{
		$norm = $_POST["norm"];
		$data = $this->m_registrasipasien->getDiagnosaPasien($norm)->result();
		echo json_encode($data);
	}

	function getLastNoRegistrasiOperasi()
	{
		$data = $this->m_registrasipasien->getLastNoRegistrasiOperasi()->row();
		echo json_encode($data);
	}

	function insertRegistrasi()
	{
		$noregop = $_POST['noregop'];
		$tglregop = $_POST['tglregop'];
		$norm = $_POST['norm'];
		$noreg = $_POST['noreg'];
		$nodaftar = $_POST['nodaftar'];
		$instalasi = $_POST['instalasi'];
		$dokterpengirim = $_POST['dokterpengirim'];
		$jenisop = $_POST['jenisop'];
		$tglpesan = $_POST['tglpesan'];
		$keterangan = $_POST['keterangan'];
		$sarscovid = $_POST['sarscovid'];
		$diagnosapre = null;
		if (!empty($_POST['diagnosapre'])) {
			foreach ($_POST['diagnosapre'] as $value) {
				$diagnosapre .= ';' . $value;
			}
		}
		$statusop = "1";
		$statusbaca = "0";
		$sess_data = $this->session->userdata("sess_endoskopi");
		$user = $sess_data["id"];
		$createdate = $_POST["today"];
		$notinop = $_POST["notinop"];
		$statuspembayaran = "BELUM LUNAS";
		$dokterdiagnosapra = $_POST["dokterdiagnosapra"];
		$noanestesi = $_POST["noanestesi"];


		$data["registrasi"] = $this->m_registrasipasien->insertRegistrasi($noregop, $tglregop, $norm, $noreg, $nodaftar, $instalasi, $dokterpengirim, $jenisop, $tglpesan, $keterangan, $statusop, $statusbaca, ";" . $user, ";" . $createdate);
		if ($data["registrasi"] != null) {
			$data["tindakan"] = $this->m_registrasipasien->insertTindakan($notinop, $noregop, $statuspembayaran, ";" . $user, ";" . $createdate);
			$data["anestesi"] = $this->m_registrasipasien->insertAnestesi($noanestesi, $noregop, ";" . $user, ";" . $createdate);
			$data["diagnosapra"] = $this->m_registrasipasien->insertDiagnosa($noregop, $diagnosapre, $createdate, $dokterdiagnosapra, $sarscovid, ";" . $user, ";" . $createdate);
		}

		echo json_encode($data);
	}
}
