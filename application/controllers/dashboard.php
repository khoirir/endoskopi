<?php
class Dashboard extends CI_Controller{

	public function index(){
		if($this->session->userdata("sess_endoskopi")){
			$sess_data = $this->session->userdata("sess_endoskopi");
			$data["id"] = $sess_data["id"];
			$data["nama"]=$sess_data["nama"];
			$this->load->view("includes/v_header",$data);
			$this->load->view("v_dashboard");
			$this->load->view("includes/v_footer");
		}
		else{
			redirect("login","refresh");
		}
	}
}
?>