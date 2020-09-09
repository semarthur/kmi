<?php 

class Crud extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('form_validation');
	}

	function form_tambah(){
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('from', 'From', 'required');
		$this->form_validation->set_rules('e_mail', 'Email address', 'required');
		$this->form_validation->set_rules('to', 'To', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('case', 'Case', 'required');
		$this->form_validation->set_rules('duty', 'Duty', 'required');
		$this->form_validation->set_rules('dateoec', 'Date of Expected Completion', 'required');
		$this->form_validation->set_rules('systemint', 'System Integrated', 'required');
		$this->form_validation->set_rules('urgency', 'Urgency', 'required');
		$this->form_validation->set_rules('desc', 'Description', 'required');
		if($this->form_validation->run() == TRUE){
			$nama = $this->input->post('name');
			$dari = $this->input->post('from');
			$e_mail = $this->input->post('e_mail');
			$untuk = $this->input->post('to');
			$date = $this->input->post('date');
			$kasus = $this->input->post('case');
			$duty = $this->input->post('duty');
			$dateoec = $this->input->post('dateoec');
			$systemint = $this->input->post('systemint');
			$urgency = $this->input->post('urgency');
			$description = $this->input->post('desc');

			$max = 6;
			$temp = $this->m_data->tampil_data()->result();
			$last_id = $temp[count($temp) - 1]->id;
			for($x = 0; $x <= $last_id; $x++){
				$nouniq = 'KRF' .str_pad('', $max - strlen((string) $x), '0', STR_PAD_LEFT) . $x ;
			}

			$data = array(
				'noticket' => $nouniq,
				'nama' => $nama,
				'dari' => $dari,
				'e_mail' => $e_mail,
				'untuk' => $untuk,
				'date' => $date,
				'kasus' => $kasus,
				'duty' => $duty,
				'dateoec' => $dateoec,
				'systemint' => $systemint,
				'urgency' => $urgency,
				'description' => $description
			);

			$isi_notif = "Thank you for submitting your form. You are from IS. noticket: ".$nouniq;

			$akun['akun'] = $this->db->get_where('account',array('email' => $this->session->userdata('email')))->row();
			$telepon = $akun['akun']->telepon;

			$sms = array(
				'DestinationNumber' => $telepon,
				'TextDecoded' => $isi_notif,
				'CreatorID' => 'gammu'
			);

			$notif = array(
				'email_pengirim' => $e_mail,
				'email_track_2' => $e_mail,
				'email_penerima_2' => $e_mail,
				'status' => 'unread',
				'isi_notif' => $isi_notif
			);

			$this->m_data->input_data($sms,'outbox');
			$this->m_data->input_data($notif, 'notifikasi');
			$this->m_data->input_data($data,'form');

			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'catur.hutabarat@gmail.com',
				'smtp_pass' => 'qwepoi123098',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$this->load->library('email',$config);

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from('catur.hutabarat@gmail.com', 'Kawasaki RFS');
			$this->email->to($this->session->userdata('email'));
			$this->email->subject('New Requisition Form Notification');
			$this->email->message($this->load->view('email_admin', $data, true));

			if($this->email->send())
			{
				redirect('web/home');
			}else
			{
				show_error($this->email->print_debugger());
			}

			redirect('web/home');
		}else{
			?>
			<script type="text/javascript">
				alert("ISI SEMUA FIELD!");
				window.location.href = "http://localhost/kmi/web/form";
			</script>
			<?php
		}
		
	}

	function form_tambah_requester(){
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('from', 'From', 'required');
		$this->form_validation->set_rules('e_mail', 'Email address', 'required');
		$this->form_validation->set_rules('to', 'To', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('case', 'Case', 'required');
		$this->form_validation->set_rules('duty', 'Duty', 'required');
		$this->form_validation->set_rules('dateoec', 'Date of Expected Completion', 'required');
		$this->form_validation->set_rules('systemint', 'System Integrated', 'required');
		$this->form_validation->set_rules('urgency', 'Urgency', 'required');
		$this->form_validation->set_rules('desc', 'Description', 'required');
		if($this->form_validation->run() == TRUE){
			$nama = $this->input->post('name');
			$dari = $this->input->post('from');
			$e_mail = $this->input->post('e_mail');
			$untuk = $this->input->post('to');
			$date = $this->input->post('date');
			$kasus = $this->input->post('case');
			$duty = $this->input->post('duty');
			$dateoec = $this->input->post('dateoec');
			$systemint = $this->input->post('systemint');
			$urgency = $this->input->post('urgency');
			$description = $this->input->post('desc');

			$max = 6;
			$temp = $this->m_data->tampil_data()->result();
			$last_id = $temp[count($temp) - 1]->id;
			for($x = 0; $x <= $last_id; $x++){
				$nouniq = 'KRF' .str_pad('', $max - strlen((string) $x), '0', STR_PAD_LEFT) . $x ;
			}

			$data = array(
				'noticket' => $nouniq,
				'nama' => $nama,
				'dari' => $dari,
				'e_mail' => $e_mail,
				'untuk' => $untuk,
				'date' => $date,
				'kasus' => $kasus,
				'duty' => $duty,
				'dateoec' => $dateoec,
				'systemint' => $systemint,
				'urgency' => $urgency,
				'description' => $description
			);

			$email = $this->session->userdata('email');
				$temp = $this->m_data->get_jabatan_sekarang($email)->result();
				$id_jabatan_sekarang = $temp[0]->id_jabatan;
				$departemen_sekarang = $temp[0]->Departemen;

				if($id_jabatan_sekarang < 3){
					$id_jabatan_sekarang += 1;

					$result = $this->m_data->get_higher_jabatan($id_jabatan_sekarang,$departemen_sekarang)->result();

					$jabatan_atasan = $result[0]->Jabatan;
					$email_atasan = $result[0]->email;
					$departemen_atasan = $result[0]->Departemen;
					$telepon_atasan = $result[0]->telepon;

				} else {
					echo "Jabatan Tertinggi";
				}

			$akun['akun'] = $this->db->get_where('account',array('email' => $this->session->userdata('email')))->row();
			$telepon = $akun['akun']->telepon;

			$isi_notif = "Thank you for submitting your form. You need to wait for approval! noticket: ".$nouniq;
			$isi_notif_atasan = "You need to approve this new submitted form! noticket: ".$nouniq;

			$notif = array(
				'email_pengirim' => $e_mail,
				'email_track_1' => $e_mail,
				'email_penerima_1' => $email_atasan,
				'status' => 'unread',
				'isi_notif' => $isi_notif
			);

			$notif_atasan = array(
				'email_pengirim' => $e_mail,
				'email_track_1' => $email_atasan,
				'email_penerima_1' => $email_atasan,
				'status' => 'unread',
				'isi_notif' => $isi_notif_atasan
			);

			$sms = array(
				'DestinationNumber' => $telepon,
				'TextDecoded' => $isi_notif,
				'CreatorID' => 'gammu'
			);

			$sms_atasan = array(
				'DestinationNumber' => $telepon_atasan,
				'TextDecoded' => $isi_notif_atasan,
				'CreatorID' => 'gammu'
			);

			$this->m_data->input_data($data,'form');
			$this->m_data->input_data($notif, 'notifikasi');
			$this->m_data->input_data($notif_atasan, 'notifikasi');
			$this->m_data->input_data($sms,'outbox');
			$this->m_data->input_data($sms_atasan,'outbox');

			$temp = $this->m_data->tampil_data()->result();
			$last_noticket = $temp[count($temp) - 1]->noticket;
			$noticket = $this->m_data->get_noticket($data)->row()->noticket;

			$this->load->library('email');

			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'catur.hutabarat@gmail.com',
				'smtp_pass' => 'qwepoi123098',
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'wordwrap' => TRUE
			);

			$this->email->set_header('Content-Type', 'text/html');

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from('catur.hutabarat@gmail.com', 'Kawasaki RFS');
			$this->email->to($this->session->userdata('email'));
			$this->email->subject('New Requisition Form Notification');
			$this->email->message($this->load->view('email_req', $data, true));

			if($this->email->send())
			{
				$this->email->clear(TRUE);
				$last_noticket = $temp[count($temp) - 1]->noticket;
				$noticket = $this->m_data->get_noticket($data)->row()->noticket;

				$config = array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.gmail.com',
					'smtp_port' => 465,
					'smtp_user' => 'catur.hutabarat@gmail.com',
					'smtp_pass' => 'qwepoi123098',
					'mailtype' => 'html',
					'charset' => 'iso-8859-1',
					'wordwrap' => TRUE
				);

				$email = $this->session->userdata('email');
				$temp = $this->m_data->get_jabatan_sekarang($email)->result();
				$id_jabatan_sekarang = $temp[0]->id_jabatan;
				$departemen_sekarang = $temp[0]->Departemen;

				if($id_jabatan_sekarang < 3){
					$id_jabatan_sekarang += 1;

					$result = $this->m_data->get_higher_jabatan($id_jabatan_sekarang,$departemen_sekarang)->result();

					$jabatan_atasan = $result[0]->Jabatan;
					$email_atasan = $result[0]->email;
					$departemen_atasan = $result[0]->Departemen;

				} else {
					echo "Jabatan Tertinggi";
				}

				$this->load->library('email',$config);

				$this->email->initialize($config);

				$this->email->set_newline("\r\n");
				$this->email->from('catur.hutabarat@gmail.com', 'Kawasaki RFS');
				$this->email->to($email_atasan);
				$this->email->subject('New Requisition Form Notification');
				$this->email->message($this->load->view('email_req_to_asm', $data, true));

				if($this->email->send())
				{
					redirect('web/home_requester');

				}else
				{
					show_error($this->email->print_debugger());
				}
			}else
			{
				show_error($this->email->print_debugger());
			}

			redirect('web/home_requester');
		}else{
			?>
			<script type="text/javascript">
				alert("ISI SEMUA FIELD!");
				window.location.href = "http://localhost/kmi/web/form_req";
			</script>
			<?php
		}
	}

	function form_tambah_req_asm(){
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('from', 'From', 'required');
		$this->form_validation->set_rules('e_mail', 'Email address', 'required');
		$this->form_validation->set_rules('to', 'To', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('case', 'Case', 'required');
		$this->form_validation->set_rules('duty', 'Duty', 'required');
		$this->form_validation->set_rules('dateoec', 'Date of Expected Completion', 'required');
		$this->form_validation->set_rules('systemint', 'System Integrated', 'required');
		$this->form_validation->set_rules('urgency', 'Urgency', 'required');
		$this->form_validation->set_rules('desc', 'Description', 'required');
		if($this->form_validation->run() == TRUE){
			$nama = $this->input->post('name');
			$dari = $this->input->post('from');
			$e_mail = $this->input->post('e_mail');
			$untuk = $this->input->post('to');
			$date = $this->input->post('date');
			$kasus = $this->input->post('case');
			$duty = $this->input->post('duty');
			$dateoec = $this->input->post('dateoec');
			$systemint = $this->input->post('systemint');
			$urgency = $this->input->post('urgency');
			$description = $this->input->post('desc');

			$max = 6;
			$temp = $this->m_data->tampil_data()->result();
			$last_id = $temp[count($temp) - 1]->id;
			for($x = 0; $x <= $last_id; $x++){
				$nouniq = 'KRF' .str_pad('', $max - strlen((string) $x), '0', STR_PAD_LEFT) . $x ;
			}

			$data = array(
				'noticket' => $nouniq,
				'nama' => $nama,
				'dari' => $dari,
				'e_mail' => $e_mail,
				'untuk' => $untuk,
				'date' => $date,
				'kasus' => $kasus,
				'duty' => $duty,
				'dateoec' => $dateoec,
				'systemint' => $systemint,
				'urgency' => $urgency,
				'description' => $description
			);

			$akun['akun'] = $this->db->get_where('account',array('email' => $this->session->userdata('email')))->row();
			$telepon = $akun['akun']->telepon;

			$isi_notif = "Thank you for submitting your form. You just need to approve! noticket: ".$nouniq;

			$notif = array(
				'email_pengirim' => $e_mail,
				'email_track_1' => $e_mail,
				'email_penerima_1' => $e_mail,
				'status' => 'unread',
				'isi_notif' => $isi_notif
			);

			$sms = array(
				'DestinationNumber' => $telepon,
				'TextDecoded' => $isi_notif,
				'CreatorID' => 'gammu'
			);

			$this->m_data->input_data($sms, 'outbox');
			$this->m_data->input_data($notif, 'notifikasi');
			$this->m_data->input_data($data,'form');
			$temp = $this->m_data->tampil_data()->result();
			$last_noticket = $temp[count($temp) - 1]->noticket;
			$noticket = $this->m_data->get_noticket($data)->row()->noticket;

			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'catur.hutabarat@gmail.com',
				'smtp_pass' => 'qwepoi123098',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$this->load->library('email',$config);

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from('catur.hutabarat@gmail.com', 'Kawasaki RFS');
			$this->email->to($this->session->userdata('email'));
			$this->email->subject('New Requisition Form Notification');
			$this->email->message($this->load->view('email_asm', $data, true));

			if($this->email->send())
			{
				redirect('web/home_asm');
			}else
			{
				show_error($this->email->print_debugger());
			}

			redirect('web/home_asm');
		}else{
			?>
			<script type="text/javascript">
				alert("ISI SEMUA FIELD!");
				window.location.href = "http://localhost/kmi/web/form_asm";
			</script>
			<?php
		}
		
	}

	function form_tambah_req_dh(){
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('from', 'From', 'required');
		$this->form_validation->set_rules('e_mail', 'Email address', 'required');
		$this->form_validation->set_rules('to', 'To', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('case', 'Case', 'required');
		$this->form_validation->set_rules('duty', 'Duty', 'required');
		$this->form_validation->set_rules('dateoec', 'Date of Expected Completion', 'required');
		$this->form_validation->set_rules('systemint', 'System Integrated', 'required');
		$this->form_validation->set_rules('urgency', 'Urgency', 'required');
		$this->form_validation->set_rules('desc', 'Description', 'required');
		if($this->form_validation->run() == TRUE){
			$nama = $this->input->post('name');
			$dari = $this->input->post('from');
			$e_mail = $this->input->post('e_mail');
			$untuk = $this->input->post('to');
			$date = $this->input->post('date');
			$kasus = $this->input->post('case');
			$duty = $this->input->post('duty');
			$dateoec = $this->input->post('dateoec');
			$systemint = $this->input->post('systemint');
			$urgency = $this->input->post('urgency');
			$description = $this->input->post('desc');

			$max = 6;
			$temp = $this->m_data->tampil_data()->result();
			$last_id = $temp[count($temp) - 1]->id;
			for($x = 0; $x <= $last_id; $x++){
				$nouniq = 'KRF' .str_pad('', $max - strlen((string) $x), '0', STR_PAD_LEFT) . $x ;
			}

			$data = array(
				'noticket' => $nouniq,
				'nama' => $nama,
				'dari' => $dari,
				'e_mail' => $e_mail,
				'untuk' => $untuk,
				'date' => $date,
				'kasus' => $kasus,
				'duty' => $duty,
				'dateoec' => $dateoec,
				'systemint' => $systemint,
				'urgency' => $urgency,
				'description' => $description
			);

			$akun['akun'] = $this->db->get_where('account',array('email' => $this->session->userdata('email')))->row();
			$telepon = $akun['akun']->telepon;

			$isi_notif = "Thank you for submitting your form. You just need to approve! noticket: ".$nouniq;

			$notif = array(
				'email_pengirim' => $e_mail,
				'email_track_1' => $e_mail,
				'email_penerima_1' => $e_mail,
				'status' => 'unread',
				'isi_notif' => $isi_notif
			);

			$sms = array(
				'DestinationNumber' => $telepon,
				'TextDecoded' => $isi_notif,
				'CreatorID' => 'gammu'
			);

			$this->m_data->input_data($notif, 'notifikasi');
			$this->m_data->input_data($sms,'outbox');
			$this->m_data->input_data($data,'form');
			$temp = $this->m_data->tampil_data()->result();
			$last_noticket = $temp[count($temp) - 1]->noticket;
			$noticket = $this->m_data->get_noticket($data)->row()->noticket;

			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'catur.hutabarat@gmail.com',
				'smtp_pass' => 'qwepoi123098',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$this->load->library('email',$config);

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from('catur.hutabarat@gmail.com', 'Kawasaki RFS');
			$this->email->to($this->session->userdata('email'));
			$this->email->subject('New Requisition Form Notification');
			$this->email->message($this->load->view('email_dh', $data, true));
			
			if($this->email->send())
			{
				redirect('web/home_dh');
			}else
			{
				show_error($this->email->print_debugger());
			}

			redirect('web/home_dh');
		}else{
			?>
			<script type="text/javascript">
				alert("ISI SEMUA FIELD!");
				window.location.href = "http://localhost/kmi/web/form_dh";
			</script>
			<?php
		}
	}

	function form_update_process(){
		$noticket = $this->input->post('noticket');
		$nama = $this->input->post('name');
		$dari = $this->input->post('from');
		$e_mail = $this->input->post('e_mail');
		$untuk = $this->input->post('to');
		$date = $this->input->post('date');
		$kasus = $this->input->post('case');
		$duty = $this->input->post('duty');
		$dateoec = $this->input->post('dec');
		$systemint = $this->input->post('si');
		$urgency = $this->input->post('urgency');
		$description = $this->input->post('description');
		$process = $this->input->post('status');
		$startdate = $this->input->post('startdate');
		$starttime = $this->input->post('starttime');
		$finisheddate = $this->input->post('finisheddate');

		$data = array(
			'noticket' => $noticket,
			'e_mail' => $e_mail,
			'dari' => $dari,
			'process' => $process,
			'startdate' => $startdate,
			'starttime' => $starttime,
			'finisheddate' => $finisheddate
		);

		$where = array(
			'noticket' => $noticket
		);

		$this->m_data->update_status($where,$data,'form');
		$this->m_data->get_noticket($data,'form');
		$this->m_data->get_e_mail($data, 'form');
		$temp = $this->m_data->tampil_data()->result();
		$noticket['noticket'] = $this->m_data->get_noticket($data)->row();
		$e_mail['e_mail'] = $this->m_data->get_e_mail($data)->row();

		if ($this->input->post('status') == "On Process" && $this->session->userdata('email') == $e_mail){

			$akun['akun'] = $this->db->get_where('account',array('email' => $this->session->userdata('email')))->row();
			$telepon = $akun['akun']->telepon;

			$isi_notif = "Your Requisition Form is on process. You are from IS. noticket: ".$noticket;

			$notif = array(
				'email_pengirim' => $e_mail,
				'email_track_2' => $e_mail,
				'email_penerima_2' => $e_mail,
				'status' => 'unread',
				'isi_notif' => $isi_notif
			);

			$sms = array(
				'DestinationNumber' => $telepon,
				'TextDecoded' => $isi_notif,
				'CreatorID' => 'gammu'
			);

			$this->m_data->input_data($notif, 'notifikasi');
			$this->m_data->input_data($sms, 'outbox');

			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'catur.hutabarat@gmail.com',
				'smtp_pass' => 'qwepoi123098',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$this->load->library('email',$config);

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from('catur.hutabarat@gmail.com', 'Kawasaki RFS');
			$this->email->to($this->session->userdata('email'));
			$this->email->subject('Requisition Form On Process');
			$this->email->message($this->load->view('email_change_admin', $data, true));

			if($this->email->send()){
				redirect('web/home');
			} else {
				show_error($this->email->print_debugger());
			}
		} else if ($this->input->post('status') == "On Process"){

			$akun['akun'] = $this->db->get_where('account',array('email' => $e_mail))->row();
			$telepon = $akun['akun']->telepon;

			$isi_notif = "Your Requisition Form is on process. noticket: ".$noticket;

			$notif = array(
				'email_pengirim' => 'sem.hutabarat@gmail.com',
				'email_track_1' => $e_mail,
				'email_penerima_1' => $e_mail,
				'status' => 'unread',
				'isi_notif' => $isi_notif
			);

			$sms = array(
				'DestinationNumber' => $telepon,
				'TextDecoded' => $isi_notif,
				'CreatorID' => 'gammu'
			);

			$this->m_data->input_data($notif, 'notifikasi');
			$this->m_data->input_data($sms, 'outbox');

			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'catur.hutabarat@gmail.com',
				'smtp_pass' => 'qwepoi123098',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$this->load->library('email',$config);

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from('catur.hutabarat@gmail.com', 'Kawasaki RFS');
			$this->email->to($e_mail);
			$this->email->subject('Requisition Form On Process');
			$this->email->message($this->load->view('email_change_op', $data, true));

			if($this->email->send()){
				redirect('web/home');
			} else {
				show_error($this->email->print_debugger());
			}
		} else if ($this->input->post('status') == "Done" && $this->session->userdata('email') == $e_mail){

			$akun['akun'] = $this->db->get_where('account',array('email' => $this->session->userdata('email')))->row();
			$telepon = $akun['akun']->telepon;

			$isi_notif = "Your Requisition Form is Done. noticket: ".$noticket;

			$notif = array(
				'email_pengirim' => $e_mail,
				'email_track_2' => $e_mail,
				'email_penerima_2' => $e_mail,
				'status' => 'unread',
				'isi_notif' => $isi_notif
			);

			$sms = array(
				'DestinationNumber' => $telepon,
				'TextDecoded' => $isi_notif,
				'CreatorID' => 'gammu'
			);

			$this->m_data->input_data($notif, 'notifikasi');
			$this->m_data->input_data($sms, 'outbox');

			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'catur.hutabarat@gmail.com',
				'smtp_pass' => 'qwepoi123098',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$this->load->library('email',$config);

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from('catur.hutabarat@gmail.com', 'Kawasaki RFS');
			$this->email->to($this->session->userdata('email'));
			$this->email->subject('Requisition Form Done');
			$this->email->message($this->load->view('email_change_done', $data, true));

			if($this->email->send()){
				$this->m_data->pindah_table('form_done',$data);
				redirect('web/home');
			} else {
				show_error($this->email->print_debugger());
			}
		} else {

			$akun['akun'] = $this->db->get_where('account',array('email' => $e_mail))->row();
			$telepon = $akun['akun']->telepon;

			$isi_notif = "Your Requisition Form is Done. noticket: ".$noticket;

			$notif = array(
				'email_pengirim' => 'sem.hutabarat@gmail.com',
				'email_track_1' => $e_mail,
				'email_penerima_1' => $e_mail,
				'status' => 'unread',
				'isi_notif' => $isi_notif
			);

			$sms = array(
				'DestinationNumber' => $telepon,
				'TextDecoded' => $isi_notif,
				'CreatorID' => 'gammu'
			);

			$this->m_data->input_data($notif, 'notifikasi');
			$this->m_data->input_data($sms, 'outbox');

			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'catur.hutabarat@gmail.com',
				'smtp_pass' => 'qwepoi123098',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$this->load->library('email',$config);

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from('catur.hutabarat@gmail.com', 'Kawasaki RFS');
			$this->email->to($e_mail);
			$this->email->subject('Requisition Form Done');
			$this->email->message($this->load->view('email_change_done', $data, true));

			if($this->email->send()){
				$this->m_data->pindah_table('form_done',$data);
				redirect('web/home');
			} else {
				show_error($this->email->print_debugger());
			}
		}
		redirect('web/home');
	}

	function form_update_approval(){
		$noticket = $this->input->post('noticket');
		$nama = $this->input->post('name');
		$dari = $this->input->post('dari');
		$e_mail = $this->input->post('e_mail');
		$untuk = $this->input->post('untuk');
		$date = $this->input->post('date');
		$kasus = $this->input->post('kasus');
		$duty = $this->input->post('duty');
		$dateoec = $this->input->post('dateoec');
		$systemint = $this->input->post('systemint');
		$urgency = $this->input->post('urgency');
		$description = $this->input->post('desc');
		$approvalstatus = $this->input->post('approvalstatus');

		$data = array(
			'noticket' => $noticket,
			'nama' => $nama,
			'dari' => $dari,
			'e_mail' => $e_mail,
			'untuk' => $untuk,
			'date' => $date,
			'kasus' => $kasus,
			'duty' => $duty,
			'dateoec' => $dateoec,
			'systemint' => $systemint,
			'urgency' => $urgency,
			'description' => $description,
			'approvalstatus' => $approvalstatus
		);

		$where = array(
			'noticket' => $noticket,
		);

		$isi_notif = "Requisition Form is approved. Information System will process it. noticket: ".$noticket;
		$isi_notif_atasan = "Requisition Form is approved by Ast Manager. You also need to approve this. noticket: ".$noticket;

		$this->m_data->update_status($where,$data,'form');
		$this->m_data->get_noticket($data,'form');
		$this->m_data->get_e_mail($data, 'form');
		$temp = $this->m_data->tampil_data()->result();
		$noticket = $this->m_data->get_noticket($data)->row()->noticket;
		$e_mail = (string)$this->m_data->get_e_mail($data)->row()->e_mail;

		if ($this->input->post('approvalstatus') == "Approved by A. Manager" && $this->session->userdata('email') == $e_mail){

			$akun['akun'] = $this->db->get_where('account',array('email' => $this->session->userdata('email')))->row();
			$telepon = $akun['akun']->telepon;

			$notif = array(
			'email_pengirim' => $e_mail,
			'email_track_1' => $e_mail,
			'email_track_2' => 'sem.hutabarat@gmail.com',
			'email_penerima_1' => $e_mail,
			'email_penerima_2' => 'sem.hutabarat@gmail.com',
			'status' => 'unread',
			'isi_notif' => $isi_notif
			);

			$sms = array(
				'DestinationNumber' => $telepon,
				'TextDecoded' => $isi_notif,
				'CreatorID' => 'gammu'
			);

			$this->m_data->input_data($sms, 'outbox');
			$this->m_data->input_data($notif, 'notifikasi');

			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'catur.hutabarat@gmail.com',
				'smtp_pass' => 'qwepoi123098',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$this->load->library('email',$config);

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from('catur.hutabarat@gmail.com', 'Kawasaki RFS');
			$list = array($this->session->userdata('email'), 'sem.hutabarat@gmail.com');
			$this->email->to($list);
			$this->email->subject('Requisition Form Approval');
			$this->email->message($this->load->view('email_asm_apr', $data, true));

			if($this->email->send()){
				redirect('web/home_asm');
			} else {
				show_error($this->email->print_debugger());
			}
		} else if ($this->input->post('approvalstatus') == "Approved by A. Manager"){

			$email = $this->session->userdata('email');
			$temp = $this->m_data->get_jabatan_sekarang($email)->result();
			$id_jabatan_sekarang = $temp[0]->id_jabatan;
			$departemen_sekarang = $temp[0]->Departemen;

			if($id_jabatan_sekarang < 3){
				$id_jabatan_sekarang += 1;

				$result = $this->m_data->get_higher_jabatan($id_jabatan_sekarang,$departemen_sekarang)->result();

				$jabatan_atasan = $result[0]->Jabatan;
				$email_atasan = $result[0]->email;
				$departemen_atasan = $result[0]->Departemen;
				$telepon_atasan = $result[0]->telepon;

			} else {
				echo "Jabatan Tertinggi";
			}

			$notif_atasan = array(
			'email_pengirim' => $e_mail,
			'email_track_1' => $email_atasan,
			'email_penerima_1' => $email_atasan,
			'status' => 'unread',
			'isi_notif' => $isi_notif_atasan
			);

			$sms = array(
				'DestinationNumber' => $telepon_atasan,
				'TextDecoded' => $isi_notif_atasan,
				'CreatorID' => 'gammu'
			);

			$this->m_data->input_data($sms, 'outbox');
			$this->m_data->input_data($notif_atasan, 'notifikasi');

			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'catur.hutabarat@gmail.com',
				'smtp_pass' => 'qwepoi123098',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$this->load->library('email',$config);

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from('catur.hutabarat@gmail.com', 'Kawasaki RFS');
			$this->email->to($email_atasan);
			$this->email->subject('Requisition Form Approval');
			$this->email->message($this->load->view('email_asm_to_dh', $data, true));

			if($this->email->send()){
				redirect('web/home_asm');
			} else {
				show_error($this->email->print_debugger());
			}
		} else {
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'catur.hutabarat@gmail.com',
				'smtp_pass' => 'qwepoi123098',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$this->load->library('email',$config);

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from('catur.hutabarat@gmail.com', 'Kawasaki RFS');
			$this->email->to($e_mail);
			$this->email->subject('Requisition Form Not Approved');
			$this->email->message($this->load->view('email_not_apr', $data, true));

			if($this->email->send()){
				$this->m_data->pindah_table_na($where,$data,'form');
				redirect('web/home_asm');
			} else {
				show_error($this->email->print_debugger());
			}
		}
	}

	function form_update_approval_dh(){
		$noticket = $this->input->post('noticket');
		$nama = $this->input->post('name');
		$dari = $this->input->post('dari');
		$e_mail = $this->input->post('e_mail');
		$untuk = $this->input->post('untuk');
		$date = $this->input->post('date');
		$kasus = $this->input->post('kasus');
		$duty = $this->input->post('duty');
		$dateoec = $this->input->post('dateoec');
		$systemint = $this->input->post('systemint');
		$urgency = $this->input->post('urgency');
		$description = $this->input->post('desc');
		$approvalstatus = $this->input->post('approvalstatus');

		$data = array(
			'noticket' => $noticket,
			'nama' => $nama,
			'dari' => $dari,
			'e_mail' => $e_mail,
			'untuk' => $untuk,
			'date' => $date,
			'kasus' => $kasus,
			'duty' => $duty,
			'dateoec' => $dateoec,
			'systemint' => $systemint,
			'urgency' => $urgency,
			'description' => $description,
			'approvalstatus' => $approvalstatus
		);

		$where = array(
			'noticket' => $noticket
		);

		$isi_notif = "Requisition Form is approved. Information System will process it. noticket: ".$noticket;
		$isi_notif_bawahan = "Requisition Form is approved by Dept Head. You also need to approve this. noticket: ".$noticket;

		$this->m_data->update_status($where,$data,'form');
		$this->m_data->get_noticket($data,'form');
		$this->m_data->get_e_mail($data, 'form');
		$temp = $this->m_data->tampil_data()->result();
		$noticket = $this->m_data->get_noticket($data)->row()->noticket;
		$e_mail = (string)$this->m_data->get_e_mail($data)->row()->e_mail;

		if ($this->input->post('approvalstatus') == "Approved by Dept. Head" && $this->session->userdata('email') == $e_mail){

			$akun['akun'] = $this->db->get_where('account',array('email' => $this->session->userdata('email')))->row();
			$telepon = $akun['akun']->telepon;

			$notif = array(
			'email_pengirim' => $e_mail,
			'email_track_1' => $e_mail,
			'email_track_2' => 'sem.hutabarat@gmail.com',
			'email_penerima_1' => $e_mail,
			'email_penerima_2' => 'sem.hutabarat@gmail.com',
			'status' => 'unread',
			'isi_notif' => $isi_notif
			);

			$sms = array(
				'DestinationNumber' => $telepon,
				'TextDecoded' => $isi_notif,
				'CreatorID' => 'gammu'
			);

			$this->m_data->input_data($sms, 'outbox');
			$this->m_data->input_data($notif, 'notifikasi');

			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'catur.hutabarat@gmail.com',
				'smtp_pass' => 'qwepoi123098',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$this->load->library('email',$config);

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from('catur.hutabarat@gmail.com', 'Kawasaki RFS');
			$list = array($this->session->userdata('email'), 'sem.hutabarat@gmail.com');
			$this->email->to($list);
			$this->email->subject('Requisition Form Approved');
			$this->email->message($this->load->view('email_dh_apr', $data, true));

			if($this->email->send()){
				redirect('web/home_dh');
			} else {
				show_error($this->email->print_debugger());
			}
		} else if ($this->input->post('approvalstatus') == "Approved by Dept. Head"){

			$email = $this->session->userdata('email');
			$temp = $this->m_data->get_jabatan_sekarang($email)->result();
			$id_jabatan_sekarang = $temp[0]->id_jabatan;
			$departemen_sekarang = $temp[0]->Departemen;

			if($id_jabatan_sekarang <= 3){
				$id_jabatan_sekarang -= 2;

				$result = $this->m_data->get_higher_jabatan($id_jabatan_sekarang,$departemen_sekarang)->result();

				$jabatan_bawahan = $result[0]->Jabatan;
				$email_bawahan = $result[0]->email;
				$departemen_bawahan = $result[0]->Departemen;
				$telepon_bawahan = $result[0]->telepon;

			} else {
				echo "Jabatan Terendah";
			}

			$notif_bawahan = array(
			'email_pengirim' => $e_mail,
			'email_track_1' => $email_bawahan,
			'email_track_2' => 'sem.hutabarat@gmail.com',
			'email_penerima_1' => $email_bawahan,
			'email_penerima_2' => 'sem.hutabarat@gmail.com',
			'status' => 'unread',
			'isi_notif' => $isi_notif_bawahan
			);

			$sms = array(
				'DestinationNumber' => $telepon_bawahan,
				'TextDecoded' => $isi_notif_bawahan,
				'CreatorID' => 'gammu'
			);

			$this->m_data->input_data($sms, 'outbox');
			$this->m_data->input_data($notif_bawahan, 'notifikasi');

			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'catur.hutabarat@gmail.com',
				'smtp_pass' => 'qwepoi123098',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$this->load->library('email',$config);

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from('catur.hutabarat@gmail.com', 'Kawasaki RFS');
			$list = array($e_mail, 'sem.hutabarat@gmail.com');
			$this->email->to($list);
			$this->email->subject('Requisition Form Approval');
			$this->email->message($this->load->view('email_dh_to_req_admin', $data, true));

			if($this->email->send()){
				redirect('web/home_dh');
			} else {
				show_error($this->email->print_debugger());
			}
		} else {
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'catur.hutabarat@gmail.com',
				'smtp_pass' => 'qwepoi123098',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$this->load->library('email',$config);

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from('catur.hutabarat@gmail.com', 'Kawasaki RFS');
			$this->email->to($e_mail);
			$this->email->subject('Requisition Form Not Approved');
			$this->email->message($this->load->view('email_not_apr', $data, true));

			if($this->email->send()){
				$this->m_data->pindah_table_na($where,$data,'form');
				redirect('web/home_dh');
			} else {
				show_error($this->email->print_debugger());
			}
		}
	}

	function form_tambah_barang(){
		$this->form_validation->set_rules('namabarang', 'Nama', 'required');
		$this->form_validation->set_rules('merk', 'Merk', 'required');
		$this->form_validation->set_rules('nsb', 'No. Seri Barang', 'required');
		$this->form_validation->set_rules('datebeli', 'Tanggal Beli', 'required');
		$this->form_validation->set_rules('kondisibeli', 'Kondisi Beli', 'required');
		$this->form_validation->set_rules('kondisibarang', 'Kondisi Barang', 'required');
		if($this->form_validation->run() == TRUE){
			$max = 6;
			$temp = $this->m_data->tampil_data_inventory()->result();
			$last_id = $temp[count($temp) - 1]->id_barang;
			$file_raw = $_FILES['userfile']['name'];
			$file_type = explode(".", $file_raw);
			for($x = 0; $x <= $last_id; $x++){
				$nouniqinventaris = 'KIS' .str_pad('', $max - strlen((string) $x), '0', STR_PAD_LEFT) . $x ;
			}
			for($x = 0; $x <= $last_id; $x++){
				$serialfoto = 'IP' .str_pad('', $max - strlen((string) $x), '0', STR_PAD_LEFT) . $x.'.'.$file_type[1] ;
			}

			$image_path = realpath(FCPATH.'uploads');

			$config = array(
				'upload_path' => $image_path,
				'allowed_types' => "gif|jpg|png|jpeg|pdf",
				'overwrite' => TRUE,
				'max_size' => "2048000",
				'max_height' => "3000",
				'max_width' => "3000",
				'file_name' => $serialfoto,
			);

			$this->load->library('upload', $config);

			$namabarang = $this->input->post('namabarang');
			$merk = $this->input->post('merk');
			$nsb = $this->input->post('nsb');
			$noin = $this->input->post('noin');
			$datebeli = $this->input->post('datebeli');
			$kondisibeli = $this->input->post('kondisibeli');
			$kondisibarang = $this->input->post('kondisibarang');

			$data = array(
				'nama' => $namabarang,
				'merk' => $merk,
				'noseribarang' => $nsb,
				'noinventaris' => $nouniqinventaris,
				'tgl_beli' => $datebeli,
				'kond_beli' => $kondisibeli,
				'kond_barang' => $kondisibarang,
				'foto' => $serialfoto,
				'pathfoto' => $image_path
			);

			$this->m_data->input_data($data,'inventaris');

			if($this->upload->do_upload('userfile')){
				$data = array('upload_data' =>$this->upload->data($config));
				redirect('web/form_barang_masuk_overview');
			}
			else{
				$error = array('error' => $this->upload->display_errors());
				?>
				<script type="text/javascript">
					alert("harus upload foto");
					window.location.href = "http://localhost/kmi/web/form_barang_masuk";
				</script>
				<?php
			}

		}else{
			?>
			<script type="text/javascript">
				alert("ISI SEMUA FIELD!");
				window.location.href = "http://localhost/kmi/web/form_barang_masuk";
			</script>
			<?php
		}
	}

	function form_update_barang_edit(){
		$noinventaris = $this->input->post('noin');
		$datekeluar = $this->input->post('datekeluar');
		$tmptpasang = $this->input->post('tmptpasang');
		$kondisibarang = $this->input->post('kondisibarang');
		$daterusak =  $this->input->post('daterusak');

		$data = array(
			'tgl_keluar' => $datekeluar,
			'tmpt_pasang' => $tmptpasang,
			'kond_barang' => $kondisibarang,
			'tgl_rusak' => $daterusak
		);

		$where = array(
			'noinventaris' => $noinventaris
		);

		$this->m_data->update_status($where,$data,'inventaris');
		redirect('web/inventory');
	}

	function form_revision(){
		$noticket = $this->input->post('noticket');
		$untuk = $this->input->post('to');
		$date = $this->input->post('date');
		$kasus = $this->input->post('case');
		$duty = $this->input->post('duty');
		$dateoec = $this->input->post('dateoec');
		$systemint = $this->input->post('systemint');
		$urgency = $this->input->post('urgency');
		$description = $this->input->post('desc');

		$data = array(
			'noticket' => $noticket,
			'untuk' => $untuk,
			'date' => $date,
			'kasus' => $kasus,
			'duty' => $duty,
			'dateoec' => $dateoec,
			'systemint' => $systemint,
			'urgency' => $urgency,
			'description' => $description
		);

		$where = array(
			'noticket' => $noticket
		);

		$this->m_data->update_status($where,$data,'form');
		redirect('web/home');
	}

	function form_revision_req(){
		$noticket = $this->input->post('noticket');
		$untuk = $this->input->post('to');
		$date = $this->input->post('date');
		$kasus = $this->input->post('case');
		$duty = $this->input->post('duty');
		$dateoec = $this->input->post('dateoec');
		$systemint = $this->input->post('systemint');
		$urgency = $this->input->post('urgency');
		$description = $this->input->post('desc');

		$data = array(
			'noticket' => $noticket,
			'untuk' => $untuk,
			'date' => $date,
			'kasus' => $kasus,
			'duty' => $duty,
			'dateoec' => $dateoec,
			'systemint' => $systemint,
			'urgency' => $urgency,
			'description' => $description
		);

		$where = array(
			'noticket' => $noticket
		);

		$this->m_data->update_status($where,$data,'form');
		redirect('web/home_requester');
	}

	function form_revision_asm(){
		$noticket = $this->input->post('noticket');
		$untuk = $this->input->post('to');
		$date = $this->input->post('date');
		$kasus = $this->input->post('case');
		$duty = $this->input->post('duty');
		$dateoec = $this->input->post('dateoec');
		$systemint = $this->input->post('systemint');
		$urgency = $this->input->post('urgency');
		$description = $this->input->post('desc');

		$data = array(
			'noticket' => $noticket,
			'untuk' => $untuk,
			'date' => $date,
			'kasus' => $kasus,
			'duty' => $duty,
			'dateoec' => $dateoec,
			'systemint' => $systemint,
			'urgency' => $urgency,
			'description' => $description
		);

		$where = array(
			'noticket' => $noticket
		);

		$this->m_data->update_status($where,$data,'form');
		redirect('web/home_asm');
	}

	function form_revision_dh(){
		$noticket = $this->input->post('noticket');
		$untuk = $this->input->post('to');
		$date = $this->input->post('date');
		$kasus = $this->input->post('case');
		$duty = $this->input->post('duty');
		$dateoec = $this->input->post('dateoec');
		$systemint = $this->input->post('systemint');
		$urgency = $this->input->post('urgency');
		$description = $this->input->post('desc');

		$data = array(
			'noticket' => $noticket,
			'untuk' => $untuk,
			'date' => $date,
			'kasus' => $kasus,
			'duty' => $duty,
			'dateoec' => $dateoec,
			'systemint' => $systemint,
			'urgency' => $urgency,
			'description' => $description
		);

		$where = array(
			'noticket' => $noticket
		);

		$this->m_data->update_status($where,$data,'form');
		redirect('web/home_dh');
	}

	function update_profile_user(){
		$id_account = $this->input->post('id_account');
		$password = $this->input->post('password');
		$jabatan = $this->input->post('jabatan');
		$departemen = $this->input->post('departemen');
		$notlp = $this->input->post('notlp');

		if($jabatan == "Staff"){
			$id_jabatan = 1;
		} else if($jabatan == "Assistant Manager"){
			$id_jabatan = 2;
		} else {
			$id_jabatan = 3;
		}

		$data = array(
			'password' => $password,
			'Jabatan' => $jabatan,
			'Departemen' => $departemen,
			'telepon' => $notlp,
			'id_jabatan' => $id_jabatan
		);

		$where = array(
			'id_account' => $id_account
		);

		$this->m_data->update_profile($where,$data,'account');
		?>
			<script type="text/javascript">
				alert("SUKSES!");
				window.location.href = "http://localhost/kmi/web/profile";
			</script>
		<?php
		
	}

	function update_profile_user_req(){
		$id_account = $this->input->post('id_account');
		$password = $this->input->post('password');
		$jabatan = $this->input->post('jabatan');
		$departemen = $this->input->post('departemen');
		$notlp = $this->input->post('notlp');

		if($jabatan == "Staff"){
			$id_jabatan = 1;
		} else if($jabatan == "Assistant Manager"){
			$id_jabatan = 2;
		} else {
			$id_jabatan = 3;
		}

		$data = array(
			'password' => $password,
			'Jabatan' => $jabatan,
			'Departemen' => $departemen,
			'telepon' => $notlp,
			'id_jabatan' => $id_jabatan
		);

		$where = array(
			'id_account' => $id_account
		);

		$this->m_data->update_profile($where,$data,'account');
		?>
			<script type="text/javascript">
				alert("SUKSES!");
				window.location.href = "http://localhost/kmi/web/profile_req";
			</script>
		<?php
	}

	function update_profile_user_asm(){
		$id_account = $this->input->post('id_account');
		$password = $this->input->post('password');
		$jabatan = $this->input->post('jabatan');
		$departemen = $this->input->post('departemen');
		$notlp = $this->input->post('notlp');

		if($jabatan == "Staff"){
			$id_jabatan = 1;
		} else if($jabatan == "Assistant Manager"){
			$id_jabatan = 2;
		} else {
			$id_jabatan = 3;
		}

		$data = array(
			'password' => $password,
			'Jabatan' => $jabatan,
			'Departemen' => $departemen,
			'telepon' => $notlp,
			'id_jabatan' => $id_jabatan
		);

		$where = array(
			'id_account' => $id_account
		);

		$this->m_data->update_profile($where,$data,'account');
		?>
			<script type="text/javascript">
				alert("SUKSES!");
				window.location.href = "http://localhost/kmi/web/profile_asm";
			</script>
		<?php
	}

	function update_profile_user_dh(){
		$id_account = $this->input->post('id_account');
		$password = $this->input->post('password');
		$jabatan = $this->input->post('jabatan');
		$departemen = $this->input->post('departemen');
		$notlp = $this->input->post('notlp');

		if($jabatan == "Staff"){
			$id_jabatan = 1;
		} else if($jabatan == "Assistant Manager"){
			$id_jabatan = 2;
		} else {
			$id_jabatan = 3;
		}

		$data = array(
			'password' => $password,
			'Jabatan' => $jabatan,
			'Departemen' => $departemen,
			'telepon' => $notlp,
			'id_jabatan' => $id_jabatan
		);

		$where = array(
			'id_account' => $id_account
		);

		$this->m_data->update_profile($where,$data,'account');
		?>
			<script type="text/javascript">
				alert("SUKSES!");
				window.location.href = "http://localhost/kmi/web/profile_dh";
			</script>
		<?php
	}

	function update_profile(){
		$id_account = $this->input->post('id_account');
		$password = $this->input->post('password');
		$jabatan = $this->input->post('jabatan');
		$departemen = $this->input->post('departemen');
		$notlp = $this->input->post('notlp');

		if($jabatan == "Staff"){
			$id_jabatan = 1;
		} else if($jabatan == "Assistant Manager"){
			$id_jabatan = 2;
		} else {
			$id_jabatan = 3;
		}

		$data = array(
			'password' => $password,
			'Jabatan' => $jabatan,
			'Departemen' => $departemen,
			'telepon' => $notlp,
			'id_jabatan' => $id_jabatan
		);

		$where = array(
			'id_account' => $id_account
		);

		$this->m_data->update_profile($where,$data,'account');
		redirect('web/manage_account');
	}

	function create_profile(){
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('e_mail', 'Email Address', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('departemen', 'Departemen', 'required');
		$this->form_validation->set_rules('notlp', 'Telephone Number', 'required');
		if($this->form_validation->run() == TRUE){
		$name = $this->input->post('name');
		$e_mail = $this->input->post('e_mail');
		$password = $this->input->post('password');
		$jabatan = $this->input->post('jabatan');
		$departemen = $this->input->post('departemen');
		$notlp = $this->input->post('notlp');

		if($jabatan == "Staff"){
			$id_jabatan = 1;
		} else if($jabatan == "Assistant Manager"){
			$id_jabatan = 2;
		} else {
			$id_jabatan = 3;
		}

		$data = array(
			'nama' => $name,
			'email' => $e_mail,
			'password' => $password,
			'Jabatan' => $jabatan,
			'Departemen' => $departemen,
			'telepon' => $notlp,
			'id_jabatan' => $id_jabatan
		);

		$this->m_data->input_data($data,'account');
		?>
			<script type="text/javascript">
				alert("CREATED SUCCESFULLY!");
				window.location.href = "http://localhost/kmi/web/manage_account";
			</script>
		<?php

		} else {
			?>
			<script type="text/javascript">
				alert("ISI SEMUA FIELD!");
				window.location.href = "http://localhost/kmi/web/create_new_account";
			</script>
		<?php
		}
	}

	function delete_profile(){
		$id_account = $this->input->post('id_account');

		$data = array(
			'id_account' => $id_account
		);

		$this->m_data->delete_account($data,'account');

		?>
			<script type="text/javascript">
				alert("DELETED SUCCESFULLY!");
				window.location.href = "http://localhost/kmi/web/manage_account";
			</script>
		<?php
	}
}