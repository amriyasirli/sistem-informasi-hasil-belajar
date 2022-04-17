<?php 

class Kelas extends CI_Controller {

    function __construct(){
        parent::__construct();

            // ------Authentication-------
            if(!$this->session->userdata('username')){
                redirect ('Auth/');
            }
            // ----------------------------
        
        }

    public function index ()
    {
        $data = [
            'title' => 'Kelas',
            'kelas' => $this->db->join('auth', 'auth.id=kelas.walas')->order_by('kelas.kelas', 'ASC')->get('kelas')->result(),
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/kelas/index', $data);
        $this->load->view('adminTemplate/footer');
    }

    public function add ()
    {
        $data = [
            'title' => 'Kelas',
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/kelas/add', $data);
        $this->load->view('adminTemplate/footer');
    }

    public function add_action ()
    {
        $data = [
            'kelas' => $this->input->post('kelas'),
            'walas' => $this->input->post('walas'),
        ];

        $this->db->insert('kelas', $data);
        redirect('Kelas');
    }

    public function update_view ($id)
    {
        $data = [
            'title' => 'Kelas',
            'kelas' => $this->db->join('auth', 'auth.id=kelas.walas')->where('kelas.id_kelas', $id)->get('kelas')->row(),
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/kelas/update_view', $data);
        $this->load->view('adminTemplate/footer');
    }
    
    public function update ($id)
    {
        $data = [
            'kelas' => $this->input->post('kelas'),
            'walas' => $this->input->post('walas'),
        ];

        $this->db->where('id_kelas', $id);
        $this->db->update('kelas', $data);
        redirect('Kelas');
    }
    
    
    public function delete ($id)
    {
        $this->db->where('id_kelas', $id);
        $this->db->delete('kelas');
        redirect('Kelas');
    }
    
}
?>