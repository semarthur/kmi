<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
class Testunit3 extends CI_Controller  
{ 

  function __construct()  
  {  
   parent::__construct();  
   $this->load->library("unit_test");
 }  

 private function tambah_data_akun($id,$nama,$e_mail,$password,$jabatan,$departemen,$telephonenumber){
 	return array($id,$nama,$e_mail,$password,$jabatan,$departemen,$telephonenumber);
 }

 public function  test_tambah_akun_jalur_1(){
 	$test = $this->tambah_data_akun('1','Aji','aji@gmail.com','qwepoi','Staff','HRD','081212227529');
 	$expected_result = array('1','Aji','aji@gmail.com','qwepoi','Staff','HRD','081212227529');
 	$test_name = "test tambah akun";
 	echo $this->unit->run($test,$expected_result,$test_name);
 } 

 public function  test_tambah_akun_jalur_2(){
 	$test = $this->tambah_data_akun('1','Aji','aji@gmail.com','qwepoi','Staff','HRD','');
 	$expected_result = array('1','Aji','aji@gmail.com','qwepoi','Staff','HRD','081212227529');
 	$test_name = "test tambah akun";
 	echo $this->unit->run($test,$expected_result,$test_name);
 } 

}?> 
<!-- scrum == bottom up -->