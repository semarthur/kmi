<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
class CI_My_driver extends CI_Driver_Library  
{  
	function __construct()  
	{  
		$this->valid_drivers = array('first_driver');  
	}  
	function index()  
	{  
		echo "<h1>This is Parent Driver</h1>";  
	}  
}  