<?php 

class Semester extends CI_Controller {

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
            'title' => 'Semester',
            'semester' => $this->db->get('semester')->row(),
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/semester/index', $data);
        $this->load->view('adminTemplate/footer');
    }

    public function add ()
    {
        $data = [
            'title' => 'Semester',
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/semester/add', $data);
        $this->load->view('adminTemplate/footer');
    }

    public function add_action ()
    {
        $data = [
            'smt' => $this->input->post('smt'),
            'tahun_ajaran' => $this->input->post('tahun_ajaran'),
        ];

        $this->db->insert('semester', $data);
        redirect('Semester');
    }

    public function update_view ($id)
    {
        $data = [
            'title' => 'Semester',
            'semester' => $this->db->where('id', $id)->get('semester')->row(),
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/semester/update_view', $data);
        $this->load->view('adminTemplate/footer');
    }
    
    public function update ($id)
    {
        $data = [
            'smt' => $this->input->post('smt'),
            'tahun_ajaran' => $this->input->post('tahun_ajaran'),
        ];

        $this->db->where('id', $id);
        $this->db->update('semester', $data);
        redirect('Semester');
    }
    
    
    public function delete ($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('semester');
        redirect('Semester');
    }
    
}
?>