<?php 

class M_data extends CI_Model{

	function check_login($email,$password){		
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		return $this->db->get('account')->row();
	}
	
	function tampil_data(){
		return $this->db->query("select * from form UNION select * from form_na");
	}

	function tampil_data_user(){
		$userdata = $this->session->userdata('email');
		return $this->db->query("select * from form where e_mail LIKE \"%$userdata%\" UNION select * from form_na where e_mail LIKE \"%$userdata%\" ");
	}

	function tampil_details($table,$where){
		return $this->db->get_where($table,$where);
	}

	function tampil_data_inventory(){
		return $this->db->query("select * from inventaris");
	}

	function tampil_data_done(){
		return $this->db->query("select * from form_done");
	}

	function tampil_data_done_user(){
		$userdata = $this->session->userdata('email');
		return $this->db->query("select * from form_done where e_mail LIKE \"%$userdata%\"");
	}
	
	function tampil_data_inventaris_terakhir(){
		return $this->db->query("select * from inventaris ORDER BY id_barang DESC LIMIT 1");
	}

	function tampil_data_approval_asm($departemen_sekarang_asm){
		return $this->db->query("select * from form where dari LIKE \"%$departemen_sekarang_asm%\" AND approvalstatus LIKE 'Pending'");
	}

	function search_ticket($search){
		return $this->db->query("select * from form where noticket LIKE \"%$search%\"");
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

	function pindah_table($where,$data,$table){
		$this->db->where($where);
		$q = $this->db->get('form')->result();
		foreach ($q as $r) { 
        	$this->db->insert('form_done', $r); 
    	}
    	$this->db->where($where);
    	$this->db->delete('form');
	}

	function pindah_table_na($where,$data,$table){
		$this->db->where($where);
		$q = $this->db->get('form')->result();
		foreach ($q as $r) { 
        	$this->db->insert('form_na', $r);
    	}
    	$this->db->where($where);
    	$this->db->delete('form');
	}
}