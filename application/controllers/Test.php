<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Test extends CI_Controller
{
	//functions  
	function index()
	{
		echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 7 days'));
	}
	
}
