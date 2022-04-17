<?php 

class Mapel extends CI_Controller {

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
            'title' => 'Mata Pelajaran',
            'mapel' => $this->db->join('kelas', 'kelas.id_kelas=mapel.kelas')->join('auth', 'auth.id=mapel.guru_mapel')->order_by('mapel.kelas', 'ASC')->order_by('mapel.nama_mapel', 'ASC')->get('mapel')->result(),
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/mapel/index', $data);
        $this->load->view('adminTemplate/footer');
    }

    public function add ()
    {
        $data = [
            'title' => 'Mata Pelajaran',
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/mapel/add', $data);
        $this->load->view('adminTemplate/footer');
    }

    public function add_action ()
    {
        $data = [
            'nama_mapel' => $this->input->post('nama_mapel'),
            'guru_mapel' => $this->input->post('guru_mapel'),
            'kelas' => $this->input->post('kelas'),
            'kelompok' => $this->input->post('kelompok'),
        ];

        $this->db->insert('mapel', $data);
        redirect('Mapel');
    }

    public function update_view ($id)
    {
        $data = [
            'title' => 'Mata Pelajaran',
            'mapel' => $this->db->join('auth', 'auth.id=mapel.guru_mapel')->where('mapel.id_mapel', $id)->get('mapel')->row(),
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/mapel/update_view', $data);
        $this->load->view('adminTemplate/footer');
    }
    
    public function update ($id)
    {
        $data = [
            'nama_mapel' => $this->input->post('nama_mapel'),
            'guru_mapel' => $this->input->post('guru_mapel'),
            'kelas' => $this->input->post('kelas'),
            'kelompok' => $this->input->post('kelompok'),
        ];

        $this->db->where('id_mapel', $id);
        $this->db->update('mapel', $data);
        redirect('Mapel');
    }
    
    
    public function delete ($id)
    {
        $this->db->where('id_mapel', $id);
        $this->db->delete('mapel');
        redirect('Mapel');
    }
    
}
?>