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
			} else {
				echo "404";
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

	public function edit_profile(){
		$akun['akun'] = $this->db->get_where('account',array('email' => $this->session->userdata('email')))->row();
		$this->load->view('edit_profile',$akun);
	}

	public function notif(){
		$notif['notif'] = $this->m_data->tampil_notif_admin()->result();
		$this->load->view('notification',$notif);
	}

	public function read_notif(){
		if ( isset($_GET['id']) ) {
			$id = $_GET['id'];
		}
		$data = array(
			'status' => 'read'
		);
		$where = array('id'=>$id);
		$this->m_data->update_status($where,$data,'notifikasi');
		$notif['notif'] = $this->m_data->tampil_notif_admin()->result();
		$this->load->view('notification',$notif);
	}

	public function profile_req(){
		$akun['akun'] = $this->db->get_where('account',array('email' => $this->session->userdata('email')))->row();
		$this->load->view('view_profile_req',$akun);
	}

	public function edit_profile_req(){
		$akun['akun'] = $this->db->get_where('account',array('email' => $this->session->userdata('email')))->row();
		$this->load->view('edit_profile_req',$akun);
	}

	public function notif_req(){
		$notif['notif'] = $this->m_data->tampil_notif()->result();
		$this->load->view('notification_req',$notif);
	}

	public function read_notif_req(){
		if ( isset($_GET['id']) ) {
			$id = $_GET['id'];
		}
		$data = array(
			'status' => 'read'
		);
		$where = array('id'=>$id);
		$this->m_data->update_status($where,$data,'notifikasi');
		$notif['notif'] = $this->m_data->tampil_notif()->result();
		$this->load->view('notification_req',$notif);
	}

	public function profile_asm(){
		$akun['akun'] = $this->db->get_where('account',array('email' => $this->session->userdata('email')))->row();
		$this->load->view('view_profile_asm',$akun);
	}

	public function edit_profile_asm(){
		$akun['akun'] = $this->db->get_where('account',array('email' => $this->session->userdata('email')))->row();
		$this->load->view('edit_profile_asm',$akun);
	}

	public function notif_asm(){
		$notif['notif'] = $this->m_data->tampil_notif()->result();
		$this->load->view('notification_asm',$notif);
	}

	public function read_notif_asm(){
		if ( isset($_GET['id']) ) {
			$id = $_GET['id'];
		}
		$data = array(
			'status' => 'read'
		);
		$where = array('id'=>$id);
		$this->m_data->update_status($where,$data,'notifikasi');
		$notif['notif'] = $this->m_data->tampil_notif()->result();
		$this->load->view('notification_asm',$notif);
	}

	public function profile_dh(){
		$akun['akun'] = $this->db->get_where('account',array('email' => $this->session->userdata('email')))->row();
		$this->load->view('view_profile_dh',$akun);
	}

	public function edit_profile_dh(){
		$akun['akun'] = $this->db->get_where('account',array('email' => $this->session->userdata('email')))->row();
		$this->load->view('edit_profile_dh',$akun);
	}

	public function notif_dh(){
		$notif['notif'] = $this->m_data->tampil_notif()->result();
		$this->load->view('notification_dh',$notif);
	}

	public function read_notif_dh(){
		if ( isset($_GET['id']) ) {
			$id = $_GET['id'];
		}
		$data = array(
			'status' => 'read'
		);
		$where = array('id'=>$id);
		$this->m_data->update_status($where,$data,'notifikasi');
		$notif['notif'] = $this->m_data->tampil_notif()->result();
		$this->load->view('notification_dh',$notif);
	}

	public function manage_account(){
		$akun['akun'] = $this->m_data->tampil_data_akun()->result();
		$this->load->view('manage_account',$akun);
	}

	public function create_new_account(){
		$this->load->view('view_create_new_account');
	}

	public function delete_account(){
		$search_account = $this->input->get('search_account');
		if(is_null($search_account)){
			$data['account'] = $this->m_data->search_account("kosong")->result();
		} else {
			$data['account'] = $this->m_data->search_account($search_account)->result();
		}
		$this->load->view('delete_account',$data);
	}

	public function search_account(){
		$search_account = $this->input->get('search_account');
		$data['account'] = $this->m_data->search_account($search_account)->result();
		$this->load->view('delete_account',$data);
	}

	public function see_details_account(){
		if ( isset($_GET['id_account']) ) {
			$id_account = $_GET['id_account'];
		}
		$where = array('id_account'=>$id_account);
		$akun['akun'] = $this->db->get_where('account',$where)->row();
		$this->load->view('view_account_details',$akun);
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

	public function form_revision(){
		if ( isset($_GET['noticket']) ) {
			$noticket = $_GET['noticket'];
		}
		$where = array('noticket'=>$noticket);
		$noticket = $this->input->get('noticket');
		$data['details'] = $this->m_data->tampil_details('form',$where)->result();
		$this->load->view('view_form_revision',$data);
	}

	public function form_revision_req(){
		if ( isset($_GET['noticket']) ) {
			$noticket = $_GET['noticket'];
		}
		$where = array('noticket'=>$noticket);
		$noticket = $this->input->get('noticket');
		$data['details'] = $this->m_data->tampil_details('form',$where)->result();
		$this->load->view('view_form_revision_req',$data);
	}

	public function form_revision_asm(){
		if ( isset($_GET['noticket']) ) {
			$noticket = $_GET['noticket'];
		}
		$where = array('noticket'=>$noticket);
		$noticket = $this->input->get('noticket');
		$data['details'] = $this->m_data->tampil_details('form',$where)->result();
		$this->load->view('view_form_revision_asm',$data);
	}

	public function form_revision_dh(){
		if ( isset($_GET['noticket']) ) {
			$noticket = $_GET['noticket'];
		}
		$where = array('noticket'=>$noticket);
		$noticket = $this->input->get('noticket');
		$data['details'] = $this->m_data->tampil_details('form',$where)->result();
		$this->load->view('view_form_revision_dh',$data);
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
		$noticket = $this->input->get('noticket');
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
		$data['form'] = $this->m_data->tampil_data_approval_dh($departemen_sekarang_dh)->result();
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

	public function see_details_history(){
		if ( isset($_GET['noticket']) ) {
			$noticket = $_GET['noticket'];
		}
		$where = array('noticket'=>$noticket);
		$noticket = $this->input->get('noticket');
		$data['details'] = $this->m_data->tampil_details_history($noticket)->result();
		$this->load->view('view_history_details',$data);
	}

	public function history_req(){
		$data['form_done'] = $this->m_data->tampil_data_done_user()->result();
		$this->load->view('view_history_req',$data);
	}

	public function see_details_history_req(){
		if ( isset($_GET['noticket']) ) {
			$noticket = $_GET['noticket'];
		}
		$where = array('noticket'=>$noticket);
		$noticket = $this->input->get('noticket');
		$data['details'] = $this->m_data->tampil_details_history($noticket)->result();
		$this->load->view('view_history_details_req',$data);
	}

	public function history_asm(){
		$data['form_done'] = $this->m_data->tampil_data_done_user()->result();
		$this->load->view('view_history_asm',$data);
	}

	public function see_details_history_asm(){
		if ( isset($_GET['noticket']) ) {
			$noticket = $_GET['noticket'];
		}
		$where = array('noticket'=>$noticket);
		$noticket = $this->input->get('noticket');
		$data['details'] = $this->m_data->tampil_details_history($noticket)->result();
		$this->load->view('view_history_details_asm',$data);
	}

	public function history_dh(){
		$userdata = $this->session->userdata('email');
		$get_departemen_dh_done = $this->m_data->get_jabatan_sekarang($userdata)->result();
		$departemen_sekarang_dh_done = $get_departemen_dh_done[0]->Departemen;
		$data['form_done'] = $this->m_data->tampil_data_done_dh($departemen_sekarang_dh_done)->result();
		$this->load->view('view_history_dh',$data);
	}

	public function see_details_history_dh(){
		if ( isset($_GET['noticket']) ) {
			$noticket = $_GET['noticket'];
		}
		$where = array('noticket'=>$noticket);
		$noticket = $this->input->get('noticket');
		$data['details'] = $this->m_data->tampil_details_history($noticket)->result();
		$this->load->view('view_history_details_dh',$data);
	}

	public function home_sorted_by_ahp()
	{
		$this->load->helper('user');
		$data['input_datediff_urgency'] = $this->input->get('datediff_urgency');
		$data['input_datediff_duty'] = $this->input->get('datediff_duty');
		$data['input_duty_urgency'] = $this->input->get('duty_urgency');
		$datediff_urgency = changeValueCriterion($data['input_datediff_urgency']);
		$datediff_duty = changeValueCriterion($data['input_datediff_duty']);
		$duty_urgency = changeValueCriterion($data['input_duty_urgency']);

		$dataset = $this->m_data->get_by_date_duty_urgent()->result();
		$this->load->library('ahp', $dataset);
		$this->ahp->init_criterion($datediff_urgency, $datediff_duty, $duty_urgency);
		$this->ahp->normalize_criterion();
		$this->ahp->build_criterion_weight();
		$dataset = $this->m_data->tampil_data()->result();
		$rank = $this->ahp->get_ranked_data();
		$ranked_data = sort_by_id($dataset, $rank);
		$data['form'] = $dataset;
		$data['ranked_data'] = array_slice($ranked_data, 0, 3, true);

		$this->ahp->calculate_eigen_max();
		$data['consistency'] = $this->ahp->AHPconsistency();

		$this->load->view('home_ahp', $data);

	}

	function export(){
		$noticket = $this->input->get('noticket');
		$data = $this->m_data->get_data_download($noticket)->result();

		include APPPATH.'third_party\PHPExcel.php';

		$excel = new PHPExcel();

		$excel->getProperties()->setCreator('Samuel Arthur')
		->setLastModifiedBy('Samuel Arthur')
		->setTitle("Requisition Form")
		->setSubject("Requisition Form");

		$style_col = array(
			'font' => array('bold' => true), 
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
			)
		);

		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
			)
		);
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "REQUISITION FORM"); 
		$excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(TRUE); 
		$excel->getActiveSheet()->getStyle('B1')->getFont()->setSize(15); 
		$excel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$excel->setActiveSheetIndex(0)->setCellValue('A3', "No");
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "No. Ticket");
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Name"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "From");
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "To");
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Case"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Duty"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "Date of Expectancy Completion"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "System Integrated"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "Urgency"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "Description"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M3', "Approval Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('N3', "Status");
		$excel->setActiveSheetIndex(0)->setCellValue('O3', "Start Date");
		$excel->setActiveSheetIndex(0)->setCellValue('P3', "Finished Date");


		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);

			//$data = $this->data;//$this->db->query("select * from form")->result();
		$no = 1; 
		$numrow = 4;
		foreach($data as $row){ 
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $row->noticket);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $row->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $row->dari);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $row->untuk);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $row->date);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $row->kasus);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $row->duty);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $row->dateoec);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $row->systemint);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $row->urgency);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $row->description);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $row->approvalstatus);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $row->process);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $row->startdate);
			$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $row->finisheddate);

			$excel->getActiveSheet()->getStyle('A'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);

			$no++;
			$numrow++;
		}

		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);

		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$excel->getActiveSheet(0)->setTitle("Requisition Form");
		$excel->setActiveSheetIndex(0);

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="REQUISTION FORM.xlsx"');
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	function export_history(){
		$noticket = $this->input->get('noticket');
		$data = $this->m_data->get_data_download_history($noticket)->result();

		include APPPATH.'third_party\PHPExcel.php';

		$excel = new PHPExcel();

		$excel->getProperties()->setCreator('Samuel Arthur')
		->setLastModifiedBy('Samuel Arthur')
		->setTitle("Requisition Form")
		->setSubject("Requisition Form");

		$style_col = array(
			'font' => array('bold' => true), 
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
			)
		);

		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
			)
		);
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "REQUISITION FORM"); 
		$excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(TRUE); 
		$excel->getActiveSheet()->getStyle('B1')->getFont()->setSize(15); 
		$excel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$excel->setActiveSheetIndex(0)->setCellValue('A3', "No");
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "No. Ticket");
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Name"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "From");
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "To");
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Case"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Duty"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "Date of Expectancy Completion"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "System Integrated"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "Urgency"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "Description"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M3', "Approval Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('N3', "Status");
		$excel->setActiveSheetIndex(0)->setCellValue('O3', "Start Date");
		$excel->setActiveSheetIndex(0)->setCellValue('P3', "Finished Date");


		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);

			//$data = $this->data;//$this->db->query("select * from form")->result();
		$no = 1; 
		$numrow = 4;
		foreach($data as $row){ 
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $row->noticket);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $row->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $row->dari);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $row->untuk);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $row->date);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $row->kasus);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $row->duty);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $row->dateoec);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $row->systemint);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $row->urgency);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $row->description);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $row->approvalstatus);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $row->process);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $row->startdate);
			$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $row->finisheddate);

			$excel->getActiveSheet()->getStyle('A'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);

			$no++;
			$numrow++;
		}

		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);

		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$excel->getActiveSheet(0)->setTitle("Requisition Form");
		$excel->setActiveSheetIndex(0);

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="REQUISTION FORM.xlsx"');
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	function export_stiker(){
		include APPPATH.'third_party\PHPExcel.php';

		$excel = new PHPExcel();

		$excel->getProperties()->setCreator('Samuel Arthur')
		->setLastModifiedBy('Samuel Arthur')
		->setTitle("Data")
		->setSubject("Barang");

		$style_col = array(
			'font' => array('bold' => true), 
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
			)
		);

		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
			)
		);
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "DATA BARANG"); 
		$excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(TRUE); 
		$excel->getActiveSheet()->getStyle('B1')->getFont()->setSize(15); 
		$excel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$excel->setActiveSheetIndex(0)->setCellValue('A3', "No");
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "No. Inventaris");
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "No. Seri Barang");
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "Nama"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Merk");
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Tanggal Beli");

		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);

			$data = $this->db->query("select * from inventaris ORDER BY id_barang DESC LIMIT 1")->result();
		$no = 1; 
		$numrow = 4;
		foreach($data as $row){ 
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $row->noinventaris);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $row->noseribarang);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $row->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $row->merk);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $row->tgl_beli);
			$excel->getActiveSheet()->getStyle('A'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);

			$no++;
			$numrow++;
		}

		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);

		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$excel->getActiveSheet(0)->setTitle("STIKER");
		$excel->setActiveSheetIndex(0);

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="STIKER.xlsx"');
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	function export_history_all(){
		$data = $this->m_data->get_all_data_download_history()->result();

		include APPPATH.'third_party\PHPExcel.php';

		$excel = new PHPExcel();

		$excel->getProperties()->setCreator('Samuel Arthur')
		->setLastModifiedBy('Samuel Arthur')
		->setTitle("Requisition Form")
		->setSubject("Requisition Form");

		$style_col = array(
			'font' => array('bold' => true), 
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
			)
		);

		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
			)
		);
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "REQUISITION FORM"); 
		$excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(TRUE); 
		$excel->getActiveSheet()->getStyle('B1')->getFont()->setSize(15); 
		$excel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$excel->setActiveSheetIndex(0)->setCellValue('A3', "No");
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "No. Ticket");
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Name"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "From");
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "To");
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Case"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Duty"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "Date of Expectancy Completion"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "System Integrated"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "Urgency"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "Description"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M3', "Approval Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('N3', "Status");
		$excel->setActiveSheetIndex(0)->setCellValue('O3', "Start Date");
		$excel->setActiveSheetIndex(0)->setCellValue('P3', "Finished Date");


		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);

			//$data = $this->data;//$this->db->query("select * from form")->result();
		$no = 1; 
		$numrow = 4;
		foreach($data as $row){ 
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $row->noticket);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $row->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $row->dari);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $row->untuk);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $row->date);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $row->kasus);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $row->duty);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $row->dateoec);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $row->systemint);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $row->urgency);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $row->description);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $row->approvalstatus);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $row->process);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $row->startdate);
			$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $row->finisheddate);

			$excel->getActiveSheet()->getStyle('A'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);

			$no++;
			$numrow++;
		}

		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
		$excel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);

		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$excel->getActiveSheet(0)->setTitle("Requisition Form");
		$excel->setActiveSheetIndex(0);

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="REQUISTION FORM.xlsx"');
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

}
