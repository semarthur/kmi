<?php 

class M_data extends CI_Model{

	function check_login($email,$password){		
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		return $this->db->get('account')->row();
	}
	
	function tampil_data(){
		return $this->db->query("SELECT * FROM form WHERE process NOT IN ( SELECT process FROM form WHERE process LIKE 'Done' )");
	}

	function get_data_download($noticket){
		return $this->db->query("select * from form WHERE noticket LIKE \"%$noticket%\"");
	}

	function get_data_download_history($noticket){
		return $this->db->query("select * from form_done JOIN form on form_done.noticket = form.noticket where form_done.noticket LIKE \"%$noticket%\"");
	}

	function get_all_data_download_history(){
		return $this->db->query("SELECT * FROM form_done JOIN form on form_done.noticket = form.noticket WHERE form_done.process = 'Done'");
	}

	function tampil_data_akun(){
		return $this->db->query("select * from account");
	}

	function tampil_data_user(){
		$userdata = $this->session->userdata('email');
		return $this->db->query("select * from form where e_mail LIKE \"%$userdata%\" and process not in ( select process from form where process like 'Done' )");
	}

	function tampil_data_user_dh($departemen_sekarang_dh){
		return $this->db->query("select * from form where dari LIKE \"%$departemen_sekarang_dh%\" and process not in ( select process from form where process like 'Done' )");
	}

	function tampil_details($table,$where){
		return $this->db->get_where($table,$where);
	}

	function tampil_details_history($noticket){
		/*return $this->db->get_where($table,$where);*/
		return $this->db->query("select * from form_done JOIN form on form_done.noticket = form.noticket where form_done.noticket LIKE \"%$noticket%\"");
		/*return $this->db->query("SELECT * FROM form_done JOIN form on form_done.noticket = form.noticket WHERE form_done.noticket LIKE \"%$departemen_sekarang_dh%\"");*/
	}

	function tampil_data_inventory(){
		return $this->db->query("select * from inventaris");
	}

	function tampil_data_done(){
		return $this->db->query("SELECT * FROM form_done JOIN form on form_done.noticket = form.noticket WHERE form_done.process = 'Done'");
	}

	function tampil_data_done_dh($departemen_sekarang_dh_done){
		return $this->db->query("SELECT * FROM form_done JOIN form on form_done.noticket = form.noticket WHERE form_done.process = 'Done' AND form_done.dari LIKE \"%$departemen_sekarang_dh_done%\"");
	}

	function tampil_data_done_user(){
		$userdata = $this->session->userdata('email');
		return $this->db->query("SELECT * FROM form_done JOIN form on form_done.noticket = form.noticket WHERE form_done.process = 'Done' AND form_done.e_mail LIKE \"%$userdata%\"");
	}
	
	function tampil_data_inventaris_terakhir(){
		return $this->db->query("select * from inventaris ORDER BY id_barang DESC LIMIT 1");
	}

	function tampil_data_approval_asm($departemen_sekarang_asm){
		return $this->db->query("select * from form where dari LIKE \"%$departemen_sekarang_asm%\" AND approvalstatus LIKE 'Pending'");
	}

	function tampil_data_approval_dh($departemen_sekarang_dh){
		return $this->db->query("select * from form where dari LIKE \"%$departemen_sekarang_dh%\" AND (approvalstatus = 'Approved by A. Manager' OR approvalstatus = 'Pending')");
	}

	function tampil_notif(){
		$userdata = $this->session->userdata('email');
		return $this->db->query("select * from notifikasi where email_track_1 LIKE \"%$userdata%\" ORDER BY \"%$userdata%\" ASC");
	}

	function tampil_notif_admin(){
		$userdata = $this->session->userdata('email');
		return $this->db->query("select * from notifikasi where email_track_2 LIKE \"%$userdata%\"");
	}

	function search_ticket($search){
		return $this->db->query("select * from form where noticket LIKE \"%$search%\"");
	}

	function search_account($search_account){
		return $this->db->query("select * from account where email LIKE \"%$search_account%\"");
	}

	function search_inventaris_edit($search_inventaris_edit){
		return $this->db->query("select * from inventaris where noinventaris LIKE \"%$search_inventaris_edit%\"");
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function update_status($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function update_profile($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function get_noticket($where){		
		return $this->db->get_where('form',$where);
	}

	function get_e_mail($where){		
		return $this->db->get_where('form',$where);
	} 

	function get($table){
		return $this->db->get($table);
	}

	function get_jabatan_sekarang($email){
		return $this->db->query("select id_jabatan,Departemen from account where email LIKE \"%$email%\"");
	}

	function get_higher_jabatan($id_jabatan, $departemen){
		return $this->db->query("select * from account where id_jabatan LIKE \"%$id_jabatan%\" AND Departemen LIKE \"%$departemen%\"");
	}

	function pindah_table($data,$table){
		$this->db->insert($data,$table);
		/*$this->db->where($where);
		$q = $this->db->get('form')->result();
		foreach ($q as $r) { 
        	$this->db->insert('form_done', $r); 
    	}
    	$this->db->where($where);
    	$this->db->delete('form');*/
	}

	/*function pindah_table_na($where,$data,$table){
		$this->db->where($where);
		$q = $this->db->get('form')->result();
		foreach ($q as $r) { 
        	$this->db->insert('form_na', $r);
    	}
    	$this->db->where($where);
    	$this->db->delete('form');
	}*/

	function get_by_date_duty_urgent()
	{
		return $this->db->query("SELECT tform.id,  
			IF(DATEDIFF(tform.dateoec, tform.date) <= 3, 1, 
			IF(DATEDIFF(tform.dateoec, tform.date) <= 7, 0.75,
			IF(DATEDIFF(tform.dateoec, tform.date) <= 14, 0.5,
			IF(DATEDIFF(tform.dateoec, tform.date) <= 21, 0.25, 0
				)))) as datediff
			,
			case 
					when tform.duty = 'Problem Solving' then '1'
					when tform.duty = 'Service / Repair' then '0.75'
					when tform.duty = 'Installation' then '0.5'
					when tform.duty = 'Training' then '0.25'
					when tform.duty = 'Additional / Change / Delete' then '0'
				 end as duty
			,
			case 
					when tform.urgency = 'immedietly' 	then '1'
					when tform.urgency = 'normal' 		then '0'
				 end as urgency
			
			FROM `form` as tform");
	}

	function delete_account($data,$table){
		$this->db->delete($table,$data);
	}
}