<?php 

class Pimpinan extends CI_Controller {

    function __construct(){
        parent::__construct();

            // ------Authentication-------
            if(!$this->session->userdata('username')){
                redirect ('Auth/');
            }
            // ----------------------------
        
        }

    public function index()
    {
        $id = $this->session->userdata('id');
        $data = [
            'title' => 'Daftar Kelas',
            'kelas' => $this->db->join('auth', 'auth.id=kelas.walas')
                                ->get('kelas')->result(),
            'sekolah' => $this->db->get('sekolah')->row(),
            'semester' => $this->db->get('semester')->row(),
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('pimpinan/index', $data);
        $this->load->view('adminTemplate/footer');
    }

    public function kelas ($idKelas)
    {
        $idUser = $this->session->userdata('id');
        $Querymapel = $this->db->where('mapel.kelas', $idKelas)
                                ->join('auth', 'auth.id=mapel.guru_mapel')
                                ->join('kelas', 'kelas.id_kelas=mapel.kelas')
                                ->get('mapel')
                                ->row();
        $data = [
            'title' => 'Nilai',
            'nilai' => $this->db->order_by('kelas', 'ASC')
                                ->where('kelas', $idKelas)
                                ->where('mapel', $Querymapel->id_mapel)
                                ->get('nilai')
                                ->result(),
            'semester' => $this->db->get('semester')->row(),
            'kelas' => $Querymapel->kelas,
            'id_kelas' => $idKelas,
            'mapel' => $Querymapel->nama_mapel,
            'idmapel' => $Querymapel->id_mapel,
            'iduser' => $idUser,
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('pimpinan/kelas', $data);
        $this->load->view('adminTemplate/footer');
    }

    public function mapel ($idKelas, $idMapel)
    {
        $idUser = $this->session->userdata('id');
        $Querymapel = $this->db->where('mapel.kelas', $idKelas)
                                ->join('auth', 'auth.id=mapel.guru_mapel')
                                ->join('kelas', 'kelas.id_kelas=mapel.kelas')
                                ->get('mapel')
                                ->row();
        $data = [
            'title' => 'Nilai Siswa',
            'nilai' => $this->db->order_by('kelas', 'ASC')
                                ->where('kelas', $idKelas)
                                ->where('mapel', $idMapel)
                                ->get('nilai')
                                ->result(),
            'semester' => $this->db->get('semester')->row(),
            'kelas' => $Querymapel->kelas,
            'idkelas' => $idKelas,
            'mapel' => $Querymapel->nama_mapel,
            'idmapel' => $Querymapel->id_mapel,
            'iduser' => $idUser,
        ];

        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('pimpinan/mapel', $data);
        $this->load->view('adminTemplate/footer');
    }

    
    
}
?>