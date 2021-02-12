<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
class Testunit2 extends CI_Controller  
{ 

  function __construct()  
  {  
   parent::__construct();  
   $this->load->library("unit_test");
 }  

 private function tambah_data_request($id,$noticket,$nama,$dari,$e_mail,$untuk,$date,$kasus,$duty,$dateoec,$systemint,$urgency,$description){
 	return array($id,$noticket,$nama,$dari,$e_mail,$untuk,$date,$kasus,$duty,$dateoec,$systemint,$urgency,$description);
 }

 public function  test_tambah_request_jalur_1(){
 	$test = $this->tambah_data_request('1','KRF000002','Anggit CR','HRD','anggitcr20@gmail.com','ICT','2019-11-30','Order Catridge / Toner','Additional / Change / Delete','2019-12-02','No','Normal','tinta habis');
 	$expected_result = array('1','KRF000002','Anggit CR','HRD','anggitcr20@gmail.com','ICT','2019-11-30','Order Catridge / Toner','Additional / Change / Delete','2019-12-02','No','Normal','tinta habis');
 	$test_name = "test tambah request";
 	echo $this->unit->run($test,$expected_result,$test_name);
 } 

 public function  test_tambah_request_jalur_2(){
 	$test = $this->tambah_data_request('1','KRF000002','Anggit CR','HRD','anggitcr20@gmail.com','ICT','2019-11-30','Order Catridge / Toner','Additional / Change / Delete','2019-12-02','No','Normal','');
 	$expected_result = array('1','KRF000002','Anggit CR','HRD','anggitcr20@gmail.com','ICT','2019-11-30','Order Catridge / Toner','Additional / Change / Delete','2019-12-02','No','Normal','tinta habis');
 	$test_name = "test tambah request";
 	echo $this->unit->run($test,$expected_result,$test_name);
 } 

}?> 
<!-- scrum == bottom up -->