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
			$this->email->message('You are from Information System. You just need to change the status at http://localhost/belajar/
				Your ticket number : '.$nouniq);

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
			$this->email->message('You have submitted a new Requisition Form
				Check the status of your Requisition Form frequently in http://localhost/belajar/
				Your ticket number : '.$noticket);

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
				$this->email->message('You need to approve new Requisition Form in http://localhost/belajar/ with ticket number : '.$noticket);

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
		$startdate = $this->input->post('start_date');
		$starttime = $this->input->post('start_time');
		$finisheddate = $this->input->post('finished_date');

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
			$this->email->message('Your Requisition Form is on process.
				You are from Information System.
				Check the status at http://localhost/belajar/
				Your ticket number : '.$noticket);

			if($this->email->send()){
				redirect('web/home');
			} else {
				show_error($this->email->print_debugger());
			}
		} else if ($this->input->post('status') == "On Process"){
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
			$this->email->message('Your Requisition Form is on process.
				Check the status at http://localhost/belajar/
				Your ticket number : '.$noticket);

			if($this->email->send()){
				redirect('web/home');
			} else {
				show_error($this->email->print_debugger());
			}
		} else if ($this->input->post('status') == "Done" && $this->session->userdata('email') == $e_mail){
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
			$this->email->message('Your Requisition Form process is done.
				Check the status here http://localhost/belajar/
				Your ticket number : '.$noticket);

			if($this->email->send()){
				$this->m_data->pindah_table($where,$data,'form');
				redirect('web/home');
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
			$this->email->subject('Requisition Form Done');
			$this->email->message('Your Requisition Form process is done.
				Check the status here http://localhost/belajar/
				Your ticket number : '.$noticket);

			if($this->email->send()){
				$this->m_data->pindah_table($where,$data,'form');
				redirect('web/home');
			} else {
				show_error($this->email->print_debugger());
			}
		}
		redirect('web/home');
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
}