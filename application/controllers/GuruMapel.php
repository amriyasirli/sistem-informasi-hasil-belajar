<?php 

class GuruMapel extends CI_Controller {

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
        $data = [
            'title' => 'Daftar Kelas',
            'mapel' => $this->db->order_by('mapel.kelas', 'ASC')
                                ->join('auth', 'auth.id=mapel.guru_mapel')
                                ->join('kelas', 'kelas.id_kelas=mapel.kelas')
                                ->get('mapel')
                                ->result(),
            'semester' => $this->db->get('semester')->row(),
            'iduser' => $this->session->userdata('id'),
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('guruMapel/list', $data);
        $this->load->view('adminTemplate/footer');
    }

    public function nilai ($idMapel)
    {
        $idUser = $this->session->userdata('id');
        $Querymapel = $this->db->where('id_mapel', $idMapel)
                                ->join('auth', 'auth.id=mapel.guru_mapel')
                                ->join('kelas', 'kelas.id_kelas=mapel.kelas')
                                ->get('mapel')
                                ->row();
        $data = [
            'title' => 'Nilai',
            'nilai' => $this->db->order_by('kelas', 'ASC')
                                ->where('kelas', $Querymapel->id_kelas)
                                ->where('mapel', $Querymapel->id_mapel)
                                ->get('nilai')
                                ->result(),
            'semester' => $this->db->get('semester')->row(),
            'kelas' => $Querymapel->kelas,
            'id_kelas' => $Querymapel->id_kelas,
            'mapel' => $Querymapel->nama_mapel,
            'idmapel' => $Querymapel->id_mapel,
            'iduser' => $idUser,
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('guruMapel/index', $data);
        $this->load->view('adminTemplate/footer');
    }

    public function updateNilai($idKelas, $idMapel)
    {

        $semester = $this->db->get('semester')->row();
        $id = $this->input->post('id');
        $harian = $this->input->post('harian');
        $uts = $this->input->post('uts');
        $uas = $this->input->post('uas');
        $query = $this->db->where('kelas', $idKelas)
                          ->where('mapel', $idMapel)
                          ->get('nilai')
                          ->result();
        $i = 0;
        foreach($id as $row) :
            // echo $i;
            // die();
            $data = [
                'semester' => $semester->smt,
                'harian' => $harian[$i],
                'uts' => $uts[$i],
                'uas' => $uas[$i],
            ];
    
            $this->db->where('id', $id[$i]);
            $this->db->update('nilai', $data);      
            $i++;      
        endforeach;
        Redirect('GuruMapel/nilai/'.$idMapel);
    }
    
}
?>