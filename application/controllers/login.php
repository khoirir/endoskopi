<?php
class Login extends CI_Controller{

	function __construct(){
		Parent::__construct();
		$this->load->model("m_login");
	}

	public function index(){
		if($this->session->userdata("sess_endoskopi")){
			redirect('dashboard','refresh');
		}
		else if($this->session->userdata("sess_endoskopi_salah")){
			$sess_data = $this->session->userdata("sess_endoskopi_salah");
			$data["pesan_salah"] = $sess_data["teks"];
			$this->load->view('v_login',$data);
			$this->session->unset_userdata("sess_endoskopi_salah");
		}
		else{
			$this->load->view("v_login");
		}
	}
	public function cekLogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = $this->m_login->userLogin($username,$password)->num_rows();
		if($data>0){
			$data_user = $this->m_login->userLogin($username,$password)->result();
			$sess_data = array(
				"id" => $data_user[0]->ID,
				"nama" => $data_user[0]->NAMA,
				"unit" => $data_user[0]->UNIT,
			);
			$this->session->set_userdata("sess_endoskopi",$sess_data);
			redirect('dashboard','refresh');
		}
		else{
			$sess_data = array(
				"teks" => "Username atau Password Salah"
			);
			$this->session->set_userdata("sess_endoskopi_salah",$sess_data);
			redirect("login","refresh");
		}
	}
	public function keluar(){
		if($this->session->has_userdata("sess_endoskopi")){
			$this->session->unset_userdata("sess_endoskopi");
			redirect("login","refresh");
		}
	}
}
