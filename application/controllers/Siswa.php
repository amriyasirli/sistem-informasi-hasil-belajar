<?php 

class Siswa extends CI_Controller {

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
            'title' => 'Siswa',
            'siswa' => $this->db->order_by('kelas', 'ASC')->order_by('nama_siswa', 'ASC')->get('siswa')->result(),
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/siswa/index', $data);
        $this->load->view('adminTemplate/footer');
    }

    public function add ()
    {
        $data = [
            'title' => 'Siswa',
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/siswa/add', $data);
        $this->load->view('adminTemplate/footer');
    }

    public function add_action ()
    {
        $semester = $this->db->get('semester')->row();
        $data = [
            'id' => $this->input->post('id'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'kelas' => $this->input->post('kelas'),
            'alamat' => $this->input->post('alamat'),
        ];

        $this->db->insert('siswa', $data);

        $user = [
            'nama' => $this->input->post('nama_siswa'),
            'username' => $this->input->post('id'),
            'password' => password_hash($this->input->post('id'), PASSWORD_DEFAULT),
            'role' => 6,
            'foto' => 'avatar-4.png',
        ];

        $this->db->insert('auth', $user);

        $QueryMapel = $this->db->get('mapel')->result();

            
        foreach ($QueryMapel as $row) :
            $data = [
                'id_siswa' => $this->input->post('id'),
                'kelas' => $this->input->post('kelas'),
                'mapel' => $row->id_mapel,
                'semester' => $semester->smt,
                'harian' => 0,
                'uts' => 0,
                'uas' => 0,
                'status' => 0,
            ];
    
            $this->db->insert('nilai', $data);
            
        endforeach;
        
        redirect('Siswa');
    }

    public function update_view ($id)
    {
        $data = [
            'title' => 'Siswa',
            'siswa' => $this->db->where('id', $id)->get('siswa')->row(),
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/siswa/update_view', $data);
        $this->load->view('adminTemplate/footer');
    }
    
    public function update ($id)
    {
        $data = [
            'id' => $this->input->post('id'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'kelas' => $this->input->post('kelas'),
            'alamat' => $this->input->post('alamat'),
        ];

        $this->db->where('id', $id);
        $this->db->update('siswa', $data);

        $user = [
            'nama' => $this->input->post('nama_siswa'),
        ];

        $this->db->where('username', $id);
        $this->db->update('auth', $user);
        redirect('Siswa');
    }
    
    
    public function delete ($id)
    {
        $nilai = $this->db->where('id_siswa', $id)->get('nilai')->result();

            
        foreach ($nilai as $row) :
            $this->db->where('id', $row->id);
            $this->db->delete('nilai');
        endforeach;

        $this->db->where('id', $id);
        $this->db->delete('siswa');

        $this->db->where('username', $id);
        $this->db->delete('auth');

        redirect('Siswa');
    }

    public function siswaDetail($id)
    {
        $idUser = $this->session->userdata('id');
        $data = [
            'title' => 'Detail Siswa',
            'siswa' => $this->db->where('id', $id)
                                ->join('kelas', 'kelas.id_kelas=siswa.kelas')
                                ->get('siswa')->row(),
            'nilai' => $this->db->join('kelas', 'kelas.id_kelas=nilai.kelas')
                                ->join('mapel', 'mapel.id_mapel=nilai.mapel')
                                ->where('nilai.id_siswa', $id)
                                ->where('nilai.status', 1)
                                ->order_by('mapel.kelompok', 'ASC')
                                ->get('nilai')
                                ->result(),
            'sekolah' => $this->db->get('sekolah')->row(),
            'user' => $this->db->where('id', $idUser)->get('auth')->row(),
            'semester' => $this->db->get('semester')->row(),
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/siswa/detail', $data);
        $this->load->view('adminTemplate/footer');
    }
    
}
?>