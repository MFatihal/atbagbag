<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_login');
        $this->load->library('form_validation');
        // $this->load->helper(array('url'));
        // if($this->session->userdata('kostumer') == "111"){
		// 	redirect('Landing','refresh');
		// }else if ($this->session->userdata('owner') == "333") {
		// 	redirect('Owner_controller/Beranda','refresh');
		// }
    }
    public function index() {

        $this->load->view('landing/loginuser');

    }
    

    // Register user
    public function register(){

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('telp', 'noTelp', 'required');  
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run() === FALSE){
            $this->load->view('landing/loginuser');
        } else {
            $data = [
                'nama_kostumer'     => htmlspecialchars($this->input->post('nama', true)),
                'email'             => htmlspecialchars($this->input->post('email', true)),
                'no_telp'           => $this->input->post('telp'),
                'password'          => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                'date_created'      => time(),
                'id_level_id'       => 111
            ];

            $this->db->insert('kostumer', $data);

            echo "<script>alert('Register Berhasil!');</script>";
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You are now registered. you can log in</div>');
            redirect('Landing_controller/Login');
        }
    }

    // Login User
    public function login(){
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');


        if($this->form_validation->run() == FALSE) {
            $this->load->view('landing/loginuser');
        } else {
            $this->_login();
        }
    }

    private function _login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $kostumer = $this->db->get_where('kostumer', ['email' => $email])->row_array();

        // cek user

        // foreach($this->M_login->idkostumer($kostumer) as $row){
		// 	$iduser=$row->id_kostumer;
		// 	$namauser = $row->nama_kostumer;
		// 	$level = $row->id_level_id;
		// }
		// $where = array(
		// 	'email' => $kostumer,
		// 	'password' => $password,
		// 	'level_id_level' => 111
        //     );
        // $cek = $this->M_login->cek_login("kostumer",$where)->num_rows();

        // if($cek > 0){
		// 	$data_session = array(
		// 		'emailkostumer' => $kostumer,
		// 		'iduser' => $iduser,
		// 		'namakostumer' => $namauser,
		// 		'kostumer' => $level,
		// 		);
 
		// 	$this->session->set_userdata($data_session);
 
        //     redirect('Landing');
        // }
        if($kostumer) {


            if(password_verify($password, $kostumer['password'])) {
                $data = [
                    'email' => $kostumer['email'], $user['email'],
                    'id_level' => $kostumer['id_level_id']
                ];
                $this->session->set_userdata($data);
                if($kostumer['id_level_id'] == 111) {
                     redirect('Landing');
                } else {
                    redirect('Landing_controller/Login');
                }
                
            } else {
                echo "<script>
                alert('Password salah');
                window.location.href = '".base_url('Landing_controller/Login')."';
            </script>";//Url tujuan
            }
        }else {
            echo "<script>
                alert('Username salah');
                window.location.href = '".base_url('Landing_controller/Login')."';
            </script>";//Url tujuan
        }
    }

    public function logout() {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_level');

        echo "<script>
                alert('Berhasil logged out!');
                window.location.href = '".base_url('Landing_controller/Login')."';
            </script>";//Url tujuan

    }

}
?>