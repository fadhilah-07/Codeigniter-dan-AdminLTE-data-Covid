<?php 
 
class Auth extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_project');
 
	}
 
	function index(){
		$this->load->view('form_login');
	}
	
	public function do_login() {
		$u = $this->security->xss_clean($this->input->post('username'));
        $p = $this->security->xss_clean($this->input->post('password'));
         
		$q_cek	= $this->db->query("SELECT * FROM tb_admin WHERE username = '".$u."' AND password = '".$p."'");//menampilkan keseluruhan tabel admin 
		//$u dan $p adalah nama alias dari username dan password
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		
		
        if($j_cek == 1) {
            $data = array(
                    'username' => $d_cek->u,
                    'password' => $d_cek->p,
					'validated' => true
                    );
            $this->session->set_userdata($data);//memanggil nama serta nilai parameter session yang ingin di tampilkan
            redirect('Covid/index');//setelah berhasil login maka akan menuju ke halaman awal
        } else {	
			$this->session->set_flashdata("k", "<div class=\"alert alert-error\">username atau password yang Anda masukkan salah</div>");//digunakan untuk mengirimkan data yang bersifat sementara, jadi data digunakan sekali pakai, setelah data ditampilkan maka data itu otomatis akan dihapus.
			redirect('Auth');
		}
	}
}