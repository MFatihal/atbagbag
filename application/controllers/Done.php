<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Done extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_bukti');
		$this->load->library('upload');
		
	} 

	function index(){
		
        $this->session->userdata("id");
		$this->load->view('landing/done');

	}

	

} 
?>