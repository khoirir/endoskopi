<?php
class Permintaanselesaitindakan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_permintaanselesaitindakan');
	}

	//TODO BEGIN DATA TABLE
	function index()
	{
		if ($this->session->userdata("sess_endoskopi")) {
			$sess_data = $this->session->userdata("sess_endoskopi");
			$data["id"] = $sess_data["id"];
			$data['nama'] = $sess_data["nama"];
			$this->load->view("includes/v_header", $data);
			$this->load->view("v_permintaanselesaitindakan");
			$this->load->view("includes/v_footer");
		} else {
			redirect("login", "refresh");
		}
	}

	function permintaanList()
	{
		$search = $_POST['search']['value'];
		$limit = $_POST['length'];
		$start = $_POST['start'];
		$order_index = $_POST['order'][0]['column'];
		$order_field = $_POST['columns'][$order_index]['data'];
		$order_ascdesc = $_POST['order'][0]['dir'];
		$sql_total = $this->m_permintaanselesaitindakan->countAll();
		$sql_data = $this->m_permintaanselesaitindakan->dataPermintaanSelesai($search, $limit, $start, $order_field, $order_ascdesc);
		$sql_filter = $this->m_permintaanselesaitindakan->countFilter($search);
		$data = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $sql_total,
			'recordsFiltered' => $sql_filter,
			'data' => $sql_data
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	//TODO END DATA TABLE

	//TODO BEGIN DETAIL PASIEN
	function getDetailPemesananOperasi()
	{
		$noregop = $_POST["noregop"];
		$data = $this->m_permintaanselesaitindakan->getDetailPemesananOperasi($noregop)->row();
		echo json_encode($data);
	}

	function getDetailPasien()
	{
		$norm = $_POST["norm"];
		$data = $this->m_permintaanselesaitindakan->getDetailPasien($norm)->row();
		echo json_encode($data);
	}

	function getDetailAsalPasien()
	{
		$noregistrasi = $_POST["noregistrasi"];
		$data = $this->m_permintaanselesaitindakan->getDetailAsalPasien($noregistrasi)->row();
		echo json_encode($data);
	}

	function getDiagnosaPasien()
	{
		$noregop = $_POST["noregop"];
		$data["prapost"] = $this->m_permintaanselesaitindakan->getDiagnosaPraPost($noregop)->row();
		echo json_encode($data);
	}

	function getDiagnosaICD()
	{
		$norm = $_POST["norm"];
		$data["icd"] = $this->m_permintaanselesaitindakan->getDiagnosaPasien($norm)->result();
		echo json_encode($data);
	}

	function getTindakanAnestesi()
	{
		$noregop = $_POST["noregop"];
		$data = $this->m_permintaanselesaitindakan->getTindakanAnestesi($noregop)->result();
		echo json_encode($data);
	}

	function getTindakanOperasi()
	{
		$noregop = $_POST["noregop"];
		$data = $this->m_permintaanselesaitindakan->getTindakanOperasi($noregop)->row();
		echo json_encode($data);
	}

	function getDetailTindakanOperasi()
	{
		$notinop = $_POST["notinop"];
		$data = $this->m_permintaanselesaitindakan->getDetailTindakanOperasi($notinop)->result();
		echo json_encode($data);
	}

	function insertHasilOperasi()
	{
		$noregop = $_POST["noregistrasiop"];
		$sess_data = $this->session->userdata("sess_endoskopi");
		$iduser = $sess_data["id"];
		date_default_timezone_set("Asia/Jakarta");
		$tgluser = date("Y-m-d H:i:s");

		$number_of_files = count($_FILES['file_upload']['name']);
		$config['upload_path'] = "./template/file_upload/";
		$config['allowed_types'] = 'jpeg|jpg|png|pdf';
		$config['encrypt_name'] = TRUE;
		$max_size = 2000000;
		$valid = 0;
		for ($i = 0; $i < $number_of_files; $i++) {
			if ($_FILES['file_upload']['size'][$i] <= $max_size) {
				$valid += 1;
			}
		}

		if ($valid == $number_of_files) {
			$this->load->library('upload', $config);
			for ($i = 0; $i < $number_of_files; $i++) {
				$_FILES['file']['name']       = $_FILES['file_upload']['name'][$i];
				$_FILES['file']['type']       = $_FILES['file_upload']['type'][$i];
				$_FILES['file']['tmp_name']   = $_FILES['file_upload']['tmp_name'][$i];
				$_FILES['file']['error']      = $_FILES['file_upload']['error'][$i];
				$_FILES['file']['size']       = $_FILES['file_upload']['size'][$i];

				if ($this->upload->do_upload('file')) {
					$data_upload = array('upload_data' => $this->upload->data());
					$image	= $data_upload['upload_data']['file_name'];
					$data_insert = array(
						"noRegistrasiOP" => $noregop,
						"hasilOP" => $image,
						"statusHapus" => "0",
						"idUser" => ";" . $iduser,
						"tglUser" => ";" . $tgluser
					);
					$data_return["sql"] = $this->m_permintaanselesaitindakan->insertHasilOperasi($data_insert);
					$data_return["upload"] = true;
				} else {
					$data_return["upload"] = false;
				}
			}
		} else {
			$data_return["upload"] = ">";
		}
		echo json_encode($data_return);
	}

	function getHasilOperasi()
	{
		$noregop = $_POST["noregop"];
		$data = $this->m_permintaanselesaitindakan->getHasilOperasi($noregop)->result();
		echo json_encode($data);
	}

	function hapusHasilOperasi()
	{
		$sess_data = $this->session->userdata("sess_endoskopi");
		$id_user = $sess_data["id"];
		date_default_timezone_set("Asia/Jakarta");
		$tgl_user = date("Y-m-d H:i:s");

		$id = $_POST["id"];
		$iduser = $_POST["iduser"] . ";" . $id_user;
		$tgluser = $_POST["tgluser"] . ";" . $tgl_user;
		$file = $_POST["file"];
		$data["hapus_sql"] = $this->m_permintaanselesaitindakan->hapusHasilOperasi($id, $iduser, $tgluser);
		$data['hapus'] = rename('./template/file_upload/' . $file, './template/file_upload/hapus/' . $file);
		echo json_encode($data);
	}
	//TODO END DETAIL PASIEN


	//TODO BEGIN EDIT TINDAKAN
	function getStatusBayar()
	{
		$noregop = $_POST["noregop"];
		$data = $this->m_permintaanselesaitindakan->getStatusBayar($noregop)->row();
		echo json_encode($data);
	}
	//TODO END EDIT TINDAKAN


	//TODO BEGIN KONFIRMASI SELESAI OP
	function konfirmasiSelesai()
	{
		$noregop = $_POST["noregop"];
		$sess_data = $this->session->userdata("sess_endoskopi");
		$iduser = $sess_data["id"];

		$data = $this->m_permintaanselesaitindakan->konfirmasiSelesai($iduser, $noregop);

		echo json_encode($data);
	}
	//TODO end KONFIRMASI SELESAI OP

}
