<?php
class Tindakan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_tindakan');
		$this->load->model('m_proses');
	}

	public function index()
	{
		if ($this->session->userdata("sess_endoskopi")) {
			redirect("dashboard", "refresh");
		} else {
			redirect("login", "refresh");
		}
	}

	function hitungumur($tgllahir)
	{
		date_default_timezone_set("Asia/Jakarta");
		$today = date("Y-m-d");
		$today_y = date('Y', strtotime($today));
		$today_m = date('m', strtotime($today));
		$today_d = date('d', strtotime($today));

		$bd = date('Y-m-d', strtotime($tgllahir));
		$bd_y = date('Y', strtotime($bd));
		$bd_m = date('m', strtotime($bd));
		$bd_d = date('d', strtotime($bd));

		$y = $today_y - $bd_y;
		$m = $today_m - $bd_m;
		$d = $today_d - $bd_d;

		if ($d < 0) {
			$d = 30 - abs($d);
			$m -= 1;
		}
		if ($m < 0) {
			$m = 12 - abs($m);
			$y -= 1;
		}
		return $y . "TH " . $m . "BL " . $d . "HR";
	}

	function isitindakan($noregop = null)
	{
		if ($this->session->userdata("sess_endoskopi")) {
			if ($noregop == null) {
				redirect("dashboard", "refresh");
			} else {
				$sess_data = $this->session->userdata("sess_endoskopi");
				$data["id"] = $sess_data["id"];
				$data["nama"] = $sess_data["nama"];
				$jmldata = $this->m_tindakan->getDetailPemesananOperasi($noregop)->num_rows();
				if ($jmldata > 0) {
					$data["pemesananop"] = $this->m_tindakan->getDetailPemesananOperasi($noregop)->row();
					$norm = $data["pemesananop"]->norm;
					$noregistrasipasien = $data["pemesananop"]->noregistrasi;
					$data["asalpasien"] = $this->m_tindakan->getDetailAsalPasien($noregistrasipasien);
					$data["pasien"] = $this->m_tindakan->getDetailPasien($norm)->row();
					$data["umur"] = $this->hitungumur($data["pasien"]->tgllahir);
					$data["jenisanestesi"] = $this->m_tindakan->getJenisAnestesi();
					$data["kelastindakanop"] = $this->m_tindakan->getKelasTindakanOP();
					$data["dokter"] = $this->m_tindakan->getDokter();
					$this->load->view("includes/v_header", $data);
					$this->load->view("v_tindakanpasien");
					$this->load->view("includes/v_footer");
				} else {
					redirect("dashboard", "refresh");
				}
			}
		} else {
			redirect("login", "refresh");
		}
	}

	function edittindakan($noregop = null)
	{
		if ($this->session->userdata("sess_endoskopi")) {
			if ($noregop == null) {
				redirect("dashboard", "refresh");
			} else {
				$sess_data = $this->session->userdata("sess_endoskopi");
				$data["id"] = $sess_data["id"];
				$data["nama"] = $sess_data["nama"];
				$jmldata = $this->m_tindakan->getDetailPemesananOperasi($noregop)->num_rows();
				if ($jmldata > 0) {
					$data["pemesananop"] = $this->m_tindakan->getDetailPemesananOperasi($noregop)->row();
					$norm = $data["pemesananop"]->norm;
					$noregistrasipasien = $data["pemesananop"]->noregistrasi;
					$data["asalpasien"] = $this->m_tindakan->getDetailAsalPasien($noregistrasipasien);
					$data["pasien"] = $this->m_tindakan->getDetailPasien($norm)->row();
					$data["umur"] = $this->hitungumur($data["pasien"]->tgllahir);
					$data["jenisanestesi"] = $this->m_tindakan->getJenisAnestesi();
					$data["kelastindakanop"] = $this->m_tindakan->getKelasTindakanOP();
					$data["dokter"] = $this->m_tindakan->getDokter();
					$this->load->view("includes/v_header", $data);
					$this->load->view("v_tindakanpasien");
					$this->load->view("includes/v_footer");
				} else {
					redirect("dashboard", "refresh");
				}
			}
		} else {
			redirect("login", "refresh");
		}
	}

	//TODO BEGIN DIAGNOSA
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
	function getDiagnosaPasien()
	{
		$noregop = $_POST["noregop"];
		$data["prapost"] = $this->m_tindakan->getDiagnosaPraPost($noregop)->row();
		echo json_encode($data);
	}

	function getDiagnosaICD()
	{
		$norm = $_POST["norm"];
		$data = $this->m_tindakan->getDiagnosaPasien($norm)->result();
		echo json_encode($data);
	}

	function updateDiagnosaPrapost()
	{
		if ($this->session->userdata("sess_endoskopi")) {
			$sess_data = $this->session->userdata("sess_endoskopi");
			$iduser = $sess_data["id"];
			$data = $_POST["arr_data"];
			$iddiagnosa = $data["iddiagnosa"];
			$diagnosapra = ";" . implode(";", $data["diagnosapra"]);
			$diagnosapost = empty($data["diagnosapost"]) ? null : ";" . implode(";", $data["diagnosapost"]);
			$dokterdiagnosapra = $data["dokterdiagnosapra"];
			$dokterdiagnosapost = $data["dokterdiagnosapost"] != "-" ? $data["dokterdiagnosapost"] : null;
			$sarscovid = $data["sarscovid"];
			date_default_timezone_set("Asia/Jakarta");
			$tglsekarang = date("Y-m-d H:i:s");
			$tgldiagnosapost = $diagnosapost != null && $dokterdiagnosapost != null ? $tglsekarang : null;

			$data_return = $this->m_tindakan->updateDiagnosaPrapost($diagnosapra, $diagnosapost, $tgldiagnosapost, $dokterdiagnosapra, $dokterdiagnosapost, $sarscovid, $iduser, $iddiagnosa);
			echo json_encode($data_return);
		} else {
			redirect("login", "refresh");
		}
	}
	//TODO END DIAGNOSA

	//TODO BEGIN ANESTESI
	function getDokterAnestesi()
	{
		$data = $this->m_tindakan->getDokterAnestesi()->result();
		echo json_encode($data);
	}

	function getPerawatAnestesi()
	{
		$data = $this->m_tindakan->getPerawatAnestesi()->result();
		echo json_encode($data);
	}

	function getTindakanAnestesi()
	{
		$noregop = $_POST["noregop"];
		$data = $this->m_tindakan->getTindakanAnestesi($noregop)->row();
		echo json_encode($data);
	}

	function getDetailTindakanAnestesi()
	{
		$notindakananestesi = $_POST["notindakananestesi"];
		$data = $this->m_tindakan->getDetailTindakanAnestesi($notindakananestesi)->result();
		echo json_encode($data);
	}

	function insupTindakanAnestesi()
	{
		if ($this->session->userdata("sess_endoskopi")) {
			$sess_data = $this->session->userdata("sess_endoskopi");
			$idUser = $sess_data["id"];
			$arr_data = $_POST['arr_data'];
			$noTindakanAnestesi = $arr_data["notindakananestesi"];
			$tglTindakanAnestesi = $arr_data["tgltindakananestesi"];
			$data_return['tindakan'] = $this->m_tindakan->updateTindakanAnestesi($noTindakanAnestesi, $tglTindakanAnestesi, $idUser);
			if ($data_return["tindakan"] != null) {
				if ($arr_data["datahapus"] != "") {
					$data_detail_hapus = implode("','", explode(";", substr($arr_data["datahapus"], 1)));
					$data_return['deletedetailtindakan'] = $this->m_tindakan->deleteDetailTindakanAnestesi("'" . $data_detail_hapus . "'", $idUser);
				}
				if (isset($arr_data["datadetailtindakan"])) {
					foreach ($arr_data["datadetailtindakan"] as $value) {
						$iddetail = $value['iddetail'];
						$jenisanestesi = $value['jenis'];
						$dokter = $value['dokter'];
						$asisten = $value['asisten'];
						$tindakan = $value['tindakan'];
						$dataedit = $value['dataedit'];

						if ($dataedit == 'Y' && $iddetail != '') {
							$data_return['updatedetailtindakan'] = $this->m_tindakan->updateDetailTindakanAnestesi($iddetail, $dokter, $asisten, $tindakan, $idUser);
						} else if ($dataedit == 'T' && $iddetail == '') {
							$data_return['insertdetailtindakan'] = $this->m_tindakan->insertDetailTindakanAnestesi($noTindakanAnestesi, $jenisanestesi, $dokter, $asisten, $tindakan, $idUser);
						}
					}
				}
			}
			echo json_encode($data_return);
		} else {
			redirect("login", "refresh");
		}
	}
	//TODO END ANESTESI

	//TODO BEGIN TINDAKAN OPERASI
	function getListTindakanOP()
	{
		$kdkelas = $_POST["kdkelas"];
		$data = $this->m_tindakan->getTindakanOP($kdkelas)->result();
		echo json_encode($data);
	}

	function getTindakanOperasi()
	{
		$noregop = $_POST["noregop"];
		$data = $this->m_tindakan->getTindakanOperasi($noregop)->row();
		echo json_encode($data);
	}

	function getDokterOperator()
	{
		$data = $this->m_tindakan->getDokterOperator()->result();
		echo json_encode($data);
	}

	function getPerawatOP()
	{
		$data = $this->m_tindakan->getPerawatOP()->result();
		echo json_encode($data);
	}

	function getDetailTindakanOperasi()
	{
		$notinop = $_POST["notinop"];
		$data = $this->m_tindakan->getDetailTindakanOperasi($notinop)->result();
		echo json_encode($data);
	}

	function insupTindakanOperasi()
	{
		if ($this->session->userdata("sess_endoskopi")) {
			$sess_data = $this->session->userdata("sess_endoskopi");
			$iduser = $sess_data["id"];
			$arr_data = $_POST['arr_data'];
			$notindakanop = $arr_data["notindakanop"];
			$tgltindakanop = $arr_data["tgltindakanop"];
			$totaltarifop = $arr_data["totaltarifop"];
			$data_return['tindakan'] = $this->m_tindakan->updateTindakanOperasi($tgltindakanop, $totaltarifop, $iduser, $notindakanop);
			if ($data_return["tindakan"] != null) {
				if ($arr_data["datahapus"] != "") {
					$data_detail_hapus = implode("','", explode(";", substr($arr_data["datahapus"], 1)));
					$data_return['deletedetailtindakan'] = $this->m_tindakan->deleteDetailTindakanOperasi("'" . $data_detail_hapus . "'", $iduser);
				}
				if (isset($arr_data["datadetailtindakan"])) {
					foreach ($arr_data["datadetailtindakan"] as $v) {
						$iddetail = $v['iddetail'];
						$operator = ";" . implode(";", $v['operator']);
						$asistenop = ";" . implode(";", $v['asistenop']);
						$tindakan = $v['tindakan'];
						$jmltindakan = $v['jmltindakan'];
						$tarif = $v['tarif'];
						$subtotaltindakan = $v['subtotaltindakan'];
						$kodetarif = $v['kodetarif'];
						$kodetindakan = $v['kodetindakan'];
						$jenistindakan = $v['jenistindakan'];
						$joinok = $v['joinok'];
						$dataedit = $v['dataedit'];

						if ($dataedit == 'Y' && $iddetail != '') {
							$data_return['updatedetailtindakan'] = $this->m_tindakan->updateDetailTindakanOperasi($operator, $asistenop, $jmltindakan, $subtotaltindakan, $joinok, $iduser, $iddetail);
						} else if ($dataedit == 'T' && $iddetail == '') {
							$data_return['insertdetailtindakan'] = $this->m_tindakan->insertDetailTindakanOperasi($notindakanop, $operator, $asistenop, $kodetindakan, $tindakan, $jmltindakan, $kodetarif, $tarif, $subtotaltindakan, $jenistindakan, $joinok, $iduser);
						}
					}
				}
			}
			echo json_encode($data_return);
		} else {
			redirect("login", "refresh");
		}
	}
	//TODO END TINDAKAN OPERASI

	//TODO BEGIN KONFIRMASI
	function konfirmasiSelesaiTindakan()
	{
		if ($this->session->userdata("sess_endoskopi")) {
			$sess_data = $this->session->userdata("sess_endoskopi");
			$iduser = $sess_data["id"];
			$noregop = $_POST["noregop"];
			$data_return = $this->m_tindakan->konfirmasiSelesaiTindakan($noregop, $iduser);
			echo json_encode($data_return);
		} else {
			redirect("login", "refresh");
		}
	}
	//TODO END KONFIRMASI


	function getPasienTindakan()
	{
		$noregop = $_POST["noregop"];
		$get_data = $this->m_tindakan->getPasienTindakan($noregop)->row();
		echo json_encode($get_data);
	}

	function getEditTindakanPasien()
	{
		$noregop = $_POST["noregop"];
		$get_data = $this->m_tindakan->getEditPasienTindakan($noregop)->row();
		echo json_encode($get_data);
	}



	function getNoTindakanOP()
	{
		$noregop = $this->input->post('noregop');
		$get_data = $this->m_tindakan->getNoTindakanOP($noregop)->row();
		echo json_encode($get_data);
	}

	function getDetailTindakanPasien()
	{
		$noregop = $this->input->post('noregop');
		$notinop = $this->input->post('notinop');
		$get_data = $this->m_tindakan->getDetailTindakanPasien($noregop, $notinop)->result();
		echo json_encode($get_data);
	}





	function updateTindakan()
	{
		$gettgltindakan = $this->input->post('tgltindakan');
		$tgltindakan = date("Y-m-d H:i:s", strtotime($gettgltindakan));
		$totaltarif = $this->input->post('totaltarif');
		$statustindakan = $this->input->post('statustindakan');
		$dokterop = null;
		if (!empty($_POST['dokterop'])) {
			foreach ($_POST['dokterop'] as $value) {
				$dokterop .= ';' . $value;
			}
		}
		$timop = null;
		if (!empty($_POST['timop'])) {
			foreach ($_POST['timop'] as $value) {
				$timop .= ';' . $value;
			}
		}
		$dokteranestesi = null;
		if (!empty($_POST['dokteranestesi'])) {
			foreach ($_POST['dokteranestesi'] as $value) {
				$dokteranestesi .= ';' . $value;
			}
		}
		$asistenanestesi = null;
		if (!empty($_POST['asistenanestesi'])) {
			foreach ($_POST['asistenanestesi'] as $value) {
				$asistenanestesi .= ';' . $value;
			}
		}
		$perawatinstrument = null;
		if (!empty($_POST['perawatinstrument'])) {
			foreach ($_POST['perawatinstrument'] as $value) {
				$perawatinstrument .= ';' . $value;
			}
		}
		$perawatsirkuler = null;
		if (!empty($_POST['perawatsirkuler'])) {
			foreach ($_POST['perawatsirkuler'] as $value) {
				$perawatsirkuler .= ';' . $value;
			}
		}
		$radiografer = null;
		if (!empty($_POST['radiografer'])) {
			foreach ($_POST['radiografer'] as $value) {
				$radiografer .= ';' . $value;
			}
		}
		$jenisanestesi = null;
		if (!empty($_POST['jenisanestesi'])) {
			foreach ($_POST['jenisanestesi'] as $value) {
				$jenisanestesi .= ';' . $value;
			}
		}
		$sess_data = $this->session->userdata("sess_endoskopi");
		$user["id"] = $sess_data["id"];
		$notinop = $this->input->post('notinop');
		$noregop = $this->input->post('noregop');
		$kdtindakan = $this->input->post('kdtindakan');
		$kdtarif = $this->input->post('kdtarif');
		$jenistindakan = strtolower($this->input->post('jenistindakan'));
		$get_data['detail_pasien'] = $this->m_tindakan->updateTindakan($tgltindakan, $totaltarif, $statustindakan, $dokterop, $timop, $dokteranestesi, $asistenanestesi, $perawatinstrument, $perawatsirkuler, $radiografer, $jenisanestesi, $user, $notinop, $noregop);
		$get_data['detail_tindakan_hapus'] = '';
		if ((!empty($kdtindakan)) && (!empty($kdtarif)) && (!empty($jenistindakan))) {
			$get_data['detail_tindakan_hapus'] = $this->m_tindakan->hapusTindakan("'" . $notinop . "'", $kdtindakan, $kdtarif, strtolower($jenistindakan));
		}
		$get_data['detail_tindakan_insert'] = '';
		if (!empty($_POST['datatablevalue'])) {
			foreach ($_POST['datatablevalue'] as $value) {
				$get_data['detail_tindakan_insert'] = $this->m_tindakan->insertTindakan($notinop, $value['operator'], $value['kodetindakan'], $value['tindakan'], $value['jmltindakan'], $value['kodetarif'], $value['tarif'], $value['subtotaltindakan'], strtolower($value['jenistindakan']), '0');
			}
		}
		$get_data['detail_tindakan_edit'] = '';
		if (!empty($_POST['editdatatablevalue'])) {
			foreach ($_POST['editdatatablevalue'] as $value) {
				$get_data['detail_tindakan_edit'] = $this->m_tindakan->updateDetailTindakan($value['operator'], $value['tindakan'], $value['jmltindakan'], $value['tarif'], $value['subtotaltindakan'], $notinop, $value['kodetarif'], $value['kodetindakan'], strtolower($value['jenistindakan']));
			}
		}
		echo json_encode($get_data);
	}

	function dataTableDiagnosapra()
	{
		$icd = $_POST["icd"];

		$search = $_POST['search']['value'];
		$limit = $_POST['length'];
		$start = $_POST['start'];
		$order_index = $_POST['order'][0]['column'];
		$order_field = $_POST['columns'][$order_index]['data'];
		$order_ascdesc = $_POST['order'][0]['dir'];

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

	function dataTableDiagnosapost()
	{
		$icd = $_POST["icd"];

		$search = $_POST['search']['value'];
		$limit = $_POST['length'];
		$start = $_POST['start'];
		$order_index = $_POST['order'][0]['column'];
		$order_field = $_POST['columns'][$order_index]['data'];
		$order_ascdesc = $_POST['order'][0]['dir'];

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

	function insertICD()
	{
		foreach ($_POST['data'] as $data) {
			if ($data["icd"] == "ICD 10") {
				$data_insert = array(
					"noDaftar" => $data["nodaftar"],
					"noRekamedis" => $data["norm"],
					"kdIcd10" => $data["kdicd"],
					"icd10" => $data["diagnosa"],
					"kdJenisDiagnosa" => $data["jenisdiagnosa"],
					"kdJenisKasus" => $data["jeniskasus"],
					"kdTenagaMedis" => $data["dokter"],
					"keterangan" => $data["jenisdiagnosaoperasi"],
					"tglDiagnosa" => $data["tgldiagnosa"]
				);
				$data_sql['icd10'] = $this->m_proses->ins("t_diagnosaicd10", $data_insert);
			} else if ($data["icd"] == "ICD 9") {
				$data_insert = array(
					"noDaftar" => $data["nodaftar"],
					"noRekamedis" => $data["norm"],
					"kdIcd9" => $data["kdicd"],
					"icd" => $data["diagnosa"],
					"kdJenisDiagnosa" => $data["jenisdiagnosa"],
					"kdJenisKasus" => $data["jeniskasus"],
					"kdPetugasMedis" => $data["dokter"],
					"keterangan" => $data["jenisdiagnosaoperasi"],
					"tglDiagnosa" => $data["tgldiagnosa"]
				);
				$data_sql['icd9'] = $this->m_proses->ins("t_transaksiicd9", $data_insert);
			}
		}
		echo json_encode($data_sql);
	}
}
