<?php 

class Admin extends CI_Controller {

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
        $walas = $this->db->where('role', 2)->get('auth')->num_rows();
        $guru_mapel = $this->db->where('role', 3)->get('auth')->num_rows();
        $data = [
            'title' => 'Dashboard',
            'siswa' => $this->db->get('siswa')->num_rows(),
            'kelas' => $this->db->get('kelas')->num_rows(),
            'sekolah' => $this->db->get('sekolah')->row(),
            'semester' => $this->db->get('semester')->row(),
            'walas' => $walas,
            'guru' => $guru_mapel,
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/index', $data);
        $this->load->view('adminTemplate/footer');
    }
    
    
}
?>