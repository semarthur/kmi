<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('m_data');
	}

	public function index()
	{
		$this->load->view('view_login');
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->load->view('view_login');
	}

	public function check_login(){
		if(isset($_POST['Login'])){
			$email = $this->input->post('email',true);
			$password = $this->input->post('password',true);
			$check = $this->m_data->check_login($email,$password);
			if($check > 0){
				$data_session = array(
					'email' => $email
				);
				$this->session->set_userdata($data_session);
			}
			$result = count($check);
			if($result > 0){
				$pelogin = $this->db->get_where('account',array('email' => $email, 'password' => $password))->row();
				if($pelogin->Jabatan == 'Staff' && $pelogin->Departemen == 'Information System'){
					redirect('web/home');
				}elseif($pelogin->Jabatan == 'Assistant Manager' && $pelogin->Departemen == 'Information System'){
					redirect('web/home');
				}elseif($pelogin->Jabatan == 'Dept Head' && $pelogin->Departemen == 'Information System'){
					redirect('web/home');
				}elseif($pelogin->Jabatan == 'Staff'){
					session_start();
					redirect('web/home_requester');
				}elseif($pelogin->Jabatan == 'Assistant Manager'){
					session_start();
					redirect('web/home_asm');
				}elseif($pelogin->Jabatan == 'Dept Head'){
					session_start();
					redirect('web/home_dh');
				}
			}else{
				?>
				<script type="text/javascript">
					alert("kamu tidak terdaftar");
					window.location.href = "index";
				</script>
				<?php
			}
		}else{
			echo "404";
		}
	}

	public function profile(){
		$akun['akun'] = $this->db->get_where('account',array('email' => $this->session->userdata('email')))->row();
		$this->load->view('view_profile',$akun);
	}

	public function profile_req(){
		$akun['akun'] = $this->db->get_where('account',array('email' => $this->session->userdata('email')))->row();
		$this->load->view('view_profile_req',$akun);
	}

	public function profile_asm(){
		$akun['akun'] = $this->db->get_where('account',array('email' => $this->session->userdata('email')))->row();
		$this->load->view('view_profile_asm',$akun);
	}

	public function profile_dh(){
		$akun['akun'] = $this->db->get_where('account',array('email' => $this->session->userdata('email')))->row();
		$this->load->view('view_profile_dh',$akun);
	}

	public function form(){
		$this->load->view('view_form');
	}

	public function form_req(){
		$this->load->view('view_form_req');
	}

	public function form_asm(){
		$this->load->view('view_form_asm');
	}

	public function form_dh(){
		$this->load->view('view_form_dh');
	}

	public function home(){
		$data['form'] = $this->m_data->tampil_data()->result();
		$this->load->view('home',$data);
	}

	public function home_requester(){
		$data['form'] = $this->m_data->tampil_data_user()->result();
		$this->load->view('home_req',$data);
	}

	public function home_asm(){
		$data['form'] = $this->m_data->tampil_data_user()->result();
		$this->load->view('home_asm',$data);
	}

	public function home_dh(){
		$userdata = $this->session->userdata('email');
		$get_departemen_dh = $this->m_data->get_jabatan_sekarang($userdata)->result();
		$departemen_sekarang_dh = $get_departemen_dh[0]->Departemen;
		$data['form'] = $this->m_data->tampil_data_user_dh($departemen_sekarang_dh)->result();
		$this->load->view('home_dh',$data);
	}

	public function see_details(){
		if ( isset($_GET['noticket']) ) {
			$noticket = $_GET['noticket'];
		}
		$where = array('noticket'=>$noticket);
		$data['details'] = $this->m_data->tampil_details('form',$where)->result();
		$this->load->view('view_details',$data);
	}

	public function see_details_req(){
		if ( isset($_GET['noticket']) ) {
			$noticket = $_GET['noticket'];
		}
		$where = array('noticket'=>$noticket);
		$data['details'] = $this->m_data->tampil_details('form',$where)->result();
		$this->load->view('view_details_req',$data);
	}

	public function see_details_approval_asm(){
		if ( isset($_GET['noticket']) ) {
			$noticket = $_GET['noticket'];
		}
		$where = array('noticket'=>$noticket);
		$data['details'] = $this->m_data->tampil_details('form',$where)->result();
		$this->load->view('view_details_approval_asm',$data);
	}

	public function see_details_approval_dh(){
		if ( isset($_GET['noticket']) ) {
			$noticket = $_GET['noticket'];
		}
		$where = array('noticket'=>$noticket);
		$data['details'] = $this->m_data->tampil_details('form',$where)->result();
		$this->load->view('view_details_approval_dh',$data);
	}

	public function see_details_asm(){
		if ( isset($_GET['noticket']) ) {
			$noticket = $_GET['noticket'];
		}
		$where = array('noticket'=>$noticket);
		$data['details'] = $this->m_data->tampil_details('form',$where)->result();
		$this->load->view('view_details_asm',$data);
	}

	public function see_details_dh(){
		if ( isset($_GET['noticket']) ) {
			$noticket = $_GET['noticket'];
		}
		$where = array('noticket'=>$noticket);
		$data['details'] = $this->m_data->tampil_details('form',$where)->result();
		$this->load->view('view_details_dh',$data);
	}

	public function change_status(){
		$noticket = $this->input->get('search');
		if(is_null($noticket)){
			$data['form'] = $this->m_data->search_ticket("kosong")->result();
		} else {
			$data['form'] = $this->m_data->search_ticket($noticket)->result();
		}
		$this->load->view('view_changestatus',$data);
	}

	public function search_change(){
		$search = $this->input->get('search');
		$data['form'] = $this->m_data->search_ticket($search)->result();
		$this->load->view('view_changestatus',$data);
	}

	public function approval_asm(){
		$userdata = $this->session->userdata('email');
		$get_departemen_asm = $this->m_data->get_jabatan_sekarang($userdata)->result();
		$departemen_sekarang_asm = $get_departemen_asm[0]->Departemen;
		$data['form'] = $this->m_data->tampil_data_approval_asm($departemen_sekarang_asm)->result();
		$this->load->view('view_approval_asm',$data);
	}

	public function approval_dh(){
		$userdata = $this->session->userdata('email');
		$get_departemen_dh = $this->m_data->get_jabatan_sekarang($userdata)->result();
		$departemen_sekarang_dh = $get_departemen_dh[0]->Departemen;
		$data['form'] = $this->m_data->tampil_data_approval_asm($departemen_sekarang_dh)->result();
		$this->load->view('view_approval_dh',$data);
	}

	public function inventory(){
		$data['inventory'] = $this->m_data->tampil_data_inventory()->result();
		$this->load->view('view_inventory',$data);
	}

	public function form_barang_masuk(){
		$this->load->view('view_form_barang_masuk');
	}

	public function form_barang_edit(){
		$search_inventaris_edit = $this->input->get('search_inventaris_edit');
		if(is_null($search_inventaris_edit)){
			$data['inventaris'] = $this->m_data->search_inventaris_edit("kosong")->result();
		} else {
			$data['inventaris'] = $this->m_data->search_inventaris_edit($search_inventaris_edit)->result();
		}
		$this->load->view('view_form_barang_edit',$data);
	}

	public function form_barang_masuk_overview(){
		$data['inventaris'] = $this->m_data->tampil_data_inventaris_terakhir()->result();
		$this->load->view('view_form_barang_masuk_overview',$data);
	}

	public function search_inventaris_edit(){ 
		$search_inventaris_edit = $this->input->get('search_inventaris_edit');
		$data['inventaris'] = $this->m_data->search_inventaris_edit($search_inventaris_edit)->result();
		$this->load->view('view_form_barang_edit',$data);
	}

	public function statistics(){
		$this->load->view('view_statistics');
	}

	public function statistics_dh(){
		$this->load->view('view_statistics_dh');
	}

	public function history(){
		$data['form_done'] = $this->m_data->tampil_data_done()->result();
		$this->load->view('view_history',$data);
	}

	public function history_req(){
		$data['form_done'] = $this->m_data->tampil_data_done_user()->result();
		$this->load->view('view_history_req',$data);
	}

	public function history_asm(){
		$data['form_done'] = $this->m_data->tampil_data_done_user()->result();
		$this->load->view('view_history_asm',$data);
	}

	public function history_dh(){
		$userdata = $this->session->userdata('email');
		$get_departemen_dh_done = $this->m_data->get_jabatan_sekarang($userdata)->result();
		$departemen_sekarang_dh_done = $get_departemen_dh_done[0]->Departemen;
		$data['form_done'] = $this->m_data->tampil_data_done_dh($departemen_sekarang_dh_done)->result();
		$this->load->view('view_history_dh',$data);
	}

	/*udah jadi Web sama M_data broo*/

}
