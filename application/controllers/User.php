<?php 

class User extends CI_Controller {

    function __construct(){
        parent::__construct();

            // ------Authentication-------
            if(!$this->session->userdata('username')){
                redirect (base_url().'Auth/');
            }
            // ----------------------------
        
        }

    public function index ()
    {
        $data = [
            'title' => 'Pengguna',
            'user' => $this->db->order_by('role', 'ASC')->get('auth')->result(),
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/user/index', $data);
        $this->load->view('adminTemplate/footer');
    }

    public function add ()
    {
        $data = [
            'title' => 'Pengguna',
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/user/add', $data);
        $this->load->view('adminTemplate/footer');
    }

    public function add_action ()
    {

        //pengaturan upload foto
        $config['encrypt_name']        = TRUE;
        $config['allowed_types'] = 'svg|jpg|png|jpeg';
        $config['max_size']     = '2048';
        $config['upload_path'] = './assets/img/';

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
            $foto = $this->upload->data('file_name');   
            $data = [
                'nama' => $this->input->post('nama'),
                'nip' => $this->input->post('nip'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => $this->input->post('role'),
                'foto' => $foto,
            ];
    
            $this->db->insert('auth', $data);
            redirect(base_url().'User');
        } else {
            echo $this->upload->display_errors();
        }
        
    }

    public function update_view ($id)
    {
        $data = [
            'title' => 'Profil',
            'user' => $this->db->where('id', $id)->get('auth')->row(),
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/user/update_view', $data);
        $this->load->view('adminTemplate/footer');
    }
    
    public function update ($id)
    {
        //pengaturan upload foto
        $config['encrypt_name']        = TRUE;
        $config['allowed_types'] = 'svg|jpg|png|jpeg';
        $config['max_size']     = '2048';
        $config['upload_path'] = './assets/img/';

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
            @unlink('./assets/img/'.$this->input->post('fotolama'));
            $foto = $this->upload->data('file_name');   
            $data = [
                'nama' => $this->input->post('nama'),
                'nip' => $this->input->post('nip'),
                'role' => $this->input->post('role'),
                'foto' => $foto,
            ];
    
            $this->db->where('id', $id);
            $this->db->update('auth', $data);
            redirect(base_url().'User');
        }else{
            $data = [
                'nama' => $this->input->post('nama'),
                'nip' => $this->input->post('nip'),
            ];
    
            $this->db->where('id', $id);
            $this->db->update('auth', $data);
            redirect(base_url().'User/update_view/'.$id);
        }
        
    }
    
    
    public function delete ($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('auth');
        redirect(base_url().'User');
    }

    public function changePass($id)
    {
        $data = [
            'title' => 'Password',
            'user' => $this->db->where('id', $id)->get('auth')->row(),
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/user/changePass', $data);
        $this->load->view('adminTemplate/footer');
    }

    public function changePass_act ($id)
    {
        $oldPass = $this->input->post('oldPass');
        $password1 = $this->input->post('password1');
        $password2 = $this->input->post('password2');

        $user = $this->db->get_where('auth', ['id' => $id])->row_array();

        $this->form_validation->set_rules('password1', 'Password1', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('password2', 'Password2', 'trim|required|matches[password1]');
        if ($this->form_validation->run() == FALSE)
        {
            $data = [
                'title' => 'Password',
                'user' => $this->db->where('id', $id)->get('auth')->row(),
            ];
            $this->load->view('adminTemplate/header');
            $this->load->view('adminTemplate/topbar');
            $this->load->view('adminTemplate/sidebar');
            $this->load->view('admin/user/changePass', $data);
            $this->load->view('adminTemplate/footer');
        }
        else
        {
            // die();
            //cek passwordnya
            if (password_verify($oldPass, $user['password'])) {
                $data = [
                    'password' => password_hash($password2, PASSWORD_DEFAULT),
                ];
                $this->db->where('id', $id);
                $this->db->update('auth', $data);
                $this->session->set_flashdata('pass', '<div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                  </button>
                  Password Berhasil diubah
                </div>
              </div>');
                
                redirect(base_url().'User/changePass/'.$id);

            } else {
                $this->session->set_flashdata('pass', '<div class="alert alert-warning alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                  </button>
                  Password Lama Salah
                </div>
              </div>');
                redirect(base_url().'User/changePass/'.$id);
            }
        }
    }
    
}
?>