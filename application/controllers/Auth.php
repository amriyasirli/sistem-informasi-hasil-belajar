<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        }

    public function index()
    {
        $data['title'] = 'Login';
        
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('admin/auth/login', $data);

        } else {
            $this->_login();
        }
        
    }
    
	private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('auth', ['username' => $username])->row_array();

        //user ada
        if ($user) {
                //cek passwordnya
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id' => $user['id'],
                        'nama' => $user['nama'],
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'foto' => $user['foto'],
                    ];
                    $this->session->set_userdata($data);
                    // $this->session->set_flashdata('pesan', '<div  class="alert alert-info">Selamat Datang, '.$this->session->userdata('nama').' !</div>');
                    if($user['role'] == 1):
                        redirect('Dashboard');
                    elseif($user['role'] == 2):
                        redirect('Dashboard');
                    elseif($user['role'] == 3):
                        redirect('Dashboard');
                    elseif($user['role'] == 4):
                        redirect('Dashboard');
                    elseif($user['role'] == 5):
                        redirect('Dashboard');
                    else:
                        redirect('Dashboard');
                    endif;


                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                      </button>
                      Password Salah
                    </div>
                  </div>');
                    redirect('Auth');
                }

        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">
                <span>&times;</span>
              </button>
              Username Tidak Terdaftar !
            </div>
          </div>');
            redirect('Auth');
        }
    }
    

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('foto');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">
                <span>&times;</span>
              </button>
              You has been Logout Success !
            </div>
          </div>');
        redirect('Auth');
    }


    public function blocked()
    {
        $data['title'] = 'Akses Di Tolak !';
        $this->load->view('template/header', $data);
        $this->load->view('blocked');
    }
}
