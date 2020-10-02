<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U_login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('M_login');
		$this->load->helper(array('url'));
		if($this->session->userdata('user') == "111"){
			redirect('Landing','refresh');
		}else if ($this->session->userdata('admin') == "222") {
			redirect('Admin_controller/Beranda','refresh');
		}
 
	}

	function index(){
		$this->load->view('landing/VU_login');
	}

	function aksi_login(){
		$username = $this->input->post('email');
		$password = $this->input->post('password');
		foreach($this->M_login->iduser($username) as $row){
			$iduser=$row->id_user;
			$namauser = $row->nama_user;
			$level = $row->level_id_level;
		}
		$where = array(
			'email' => $username,
			'password' => $password,
			'level_id_level' => 111
			);
		$where2 = array(
			'email' => $username,
			'password' => $password,
			'level_id_level' => 222
			);
		$cek = $this->M_login->cek_login("user",$where)->num_rows();
		$cek2 = $this->M_login->cek_login2("user",$where2)->num_rows();
		if($cek > 0){
			$data_session = array(
				'emailuser' => $username,
				'iduser' => $iduser,
				'namauser' => $namauser,
				'user' => $level,
				);
 
			$this->session->set_userdata($data_session);

			redirect('Landing');
 
		}else if ($cek2 > 0) {
			$data_session = array(
				'emailowner' => $username,
				'iduserowner' => $iduser,
				'namaowner' => $namauser,
				'owner' => $level,
				);
 
			$this->session->set_userdata($data_session);
 
			redirect('Admin_controller/Beranda');
		}else{
			echo "<script>
                alert('Username dan password salah');
                window.location.href = '".base_url('Landing_controller/U_login')."';
            </script>";//Url tujuan
		}
	}
} 
?>