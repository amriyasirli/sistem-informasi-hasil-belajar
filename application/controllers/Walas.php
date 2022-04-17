<?php 

class Walas extends CI_Controller {

    function __construct(){
        parent::__construct();

            // ------Authentication-------
            if(!$this->session->userdata('username')){
                redirect ('Auth/');
            }
            $iduser = $this->session->userdata('id');
            // ----------------------------
        
        }
      
    public function listMapel()
    {
        $data = [
            'title' => 'Pilih Mapel',
            'mapel' => $this->db->order_by('nama_mapel', 'ASC')
                                ->join('kelas', 'kelas.id_kelas=mapel.kelas')
                                ->get('mapel')
                                ->result(),
            'semester' => $this->db->get('semester')->row(),
            'iduser' => $this->session->userdata('id'),
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('walas/mapel', $data);
        $this->load->view('adminTemplate/footer');
    }

    public function siswaList($idUser)
    {
        $Querykelas = $this->db->where('walas', $idUser)->get('kelas')->row();
        $idKelas = $Querykelas->id_kelas;
        $nama_kelas = $Querykelas->kelas;
        $data = [
            'title' => 'Siswa',
            'siswa' => $this->db->order_by('nama_siswa', 'ASC')
                                ->where('kelas', $idKelas)
                                ->get('siswa')
                                ->result(),
            'semester' => $this->db->get('semester')->row(),
            'iduser' => $this->session->userdata('id'),
            'kelas' => $nama_kelas,
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('walas/siswa', $data);
        $this->load->view('adminTemplate/footer');
    }

    public function nilai ($idUser, $idMapel)
    {
        // var_dump($idMapel);
        // die();
        $kelas = $this->db->where('walas', $idUser)->get('kelas')->row();
        $idKelas = $kelas->id_kelas;
        $Querymapel = $this->db->where('id_mapel', $idMapel)->get('mapel')->row();
        $mapel = $Querymapel->nama_mapel;
        // var_dump($idKelas);
        // die();
        $data = [
            'title' => 'Nilai',
            'nilai' => $this->db->order_by('kelas', 'ASC')
                                ->where('kelas', $idKelas)
                                ->where('mapel', $idMapel)
                                ->get('nilai')
                                ->result(),
            'semester' => $this->db->get('semester')->row(),
            'kelas' => $kelas->kelas,
            'id_kelas' => $kelas->id_kelas,
            'mapel' => $mapel,
            'idmapel' => $idMapel,
            'iduser' => $idUser,
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('walas/index', $data);
        $this->load->view('adminTemplate/footer');
    }

    public function updateNilai($idKelas, $idMapel)
    {
        $semester = $this->db->get('semester')->row();
        $id_siswa = $this->input->post('id_siswa');
        $harian = $this->input->post('harian');
        $uts = $this->input->post('uts');
        $uas = $this->input->post('uas');
        $query = $this->db->where('kelas', $idKelas)
                          ->where('mapel', $idMapel)
                          ->get('nilai')
                          ->result();
        // $count = count($this->input->post('id_siswa'));
        // var_dump($count);
        // die();
            
        foreach($query as $row) :
            $data = [
                'semester' => $semester->smt,
                'harian' => $row->harian,
                'uts' => $row->uts,
                'uas' => $row->uas,
            ];
    
            $this->db->where('id_siswa', $row->id_siswa);
            $this->db->where('kelas', $idKelas);
            $this->db->where('kelas', $idMapel);
            $this->db->update('nilai', $data);            
        endforeach;
        Redirect('Walas/nilai/'.$idKelas.'/'.$idMapel);
    }

    public function approve($id,$idMapel)
    {
        $idUser = $this->session->userdata('id');
        $data = [
            'status' => 1,
        ];
        $this->db->where('id', $id);
        $this->db->update('nilai', $data);
        redirect('Walas/nilai/'.$idUser.'/'.$idMapel);

    }

    public function cancel($id,$idMapel)
    {
        $idUser = $this->session->userdata('id');
        $data = [
            'status' => 0,
        ];
        $this->db->where('id', $id);
        $this->db->update('nilai', $data);
        redirect('Walas/nilai/'.$idUser.'/'.$idMapel);

    }

    public function deskripsi($id, $id_siswa)
    {
        $data = [
            'deskripsi' => $this->input->post('deskripsi'),
        ];
        $this->db->where('id', $id);
        $this->db->update('nilai', $data);
        redirect('Siswa/siswaDetail/'.$id_siswa);
    }
    
}
?>