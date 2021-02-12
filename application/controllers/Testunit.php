<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
class Testunit extends CI_Controller  
{ 

  function __construct()  
  {  
   parent::__construct();  
   $this->load->library("unit_test");
 }  

 private function tambah_data_barang($id_barang,$namabarang,$merk,$nsb,$noinventaris,$datebeli,$kondisibeli,$kondisibarang,$serialfoto,$image_path){
 	return array($id_barang,$namabarang,$merk,$nsb,$noinventaris,$datebeli,$kondisibeli,$kondisibarang,$serialfoto,$image_path);
 }

 public function test_tambah_barang_jalur_1(){
 	$test = $this->tambah_data_barang('19','Monitor 22 inci','BENQ','quwb1212','KIS000018','2019-11-30','baru','baik','IP000018.jpg','C:\xampp\htdocs\kmi\uploads');
 	$expected_result = array('19','Monitor 22 inci','BENQ','quwb1212','KIS000018','2019-11-30','baru','baik','IP000018.jpg','C:\xampp\htdocs\kmi\uploads');
 	$test_name = "test tambah barang";
 	echo $this->unit->run($test,$expected_result,$test_name);
 }

 public function  test_tambah_barang_jalur_2(){
 	$test = $this->tambah_data_barang('19','Monitor 22 inci','','quwb1212','KIS000018','2019-11-30','baru','baik','IP000018.jpg','C:\xampp\htdocs\kmi\uploads');
 	$expected_result = array('19','Monitor 22 inci','BENQ','quwb1212','KIS000018','2019-11-30','baru','baik','IP000018.jpg','C:\xampp\htdocs\kmi\uploads');
 	$test_name = "test tambah barang";
 	echo $this->unit->run($test,$expected_result,$test_name);
 }

}?> 
<!-- scrum == bottom up -->