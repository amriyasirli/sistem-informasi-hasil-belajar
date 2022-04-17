<?php 

class Petunjuk extends CI_Controller {

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
            'title' => 'Alur Petunjuk Penggunaan',
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/petunjuk/index', $data);
        $this->load->view('adminTemplate/footer');
    }

    public function add ()
    {
        $data = [
            'title' => 'Agenda',
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/agenda/add', $data);
        $this->load->view('adminTemplate/footer');
    }

    public function add_action ()
    {
        $data = [
            'nama_agenda' => $this->input->post('nama_agenda'),
            'tanggal' => $this->input->post('tanggal'),
            'jam_start' => $this->input->post('jam_start'),
            'jam_end' => $this->input->post('jam_end'),
            'tempat' => $this->input->post('tempat'),
        ];

        $this->db->insert('agenda', $data);
        redirect('Agenda');
    }

    public function update_view ($id)
    {
        $data = [
            'title' => 'Agenda',
            'agenda' => $this->db->where('id', $id)->get('agenda')->row(),
        ];
        $this->load->view('adminTemplate/header');
        $this->load->view('adminTemplate/topbar');
        $this->load->view('adminTemplate/sidebar');
        $this->load->view('admin/agenda/update_view', $data);
        $this->load->view('adminTemplate/footer');
    }
    
    public function update ($id)
    {
        $data = [
            'nama_agenda' => $this->input->post('nama_agenda'),
            'tanggal' => $this->input->post('tanggal'),
            'jam_start' => $this->input->post('jam_start'),
            'jam_end' => $this->input->post('jam_end'),
            'tempat' => $this->input->post('tempat'),
        ];

        $this->db->where('id', $id);
        $this->db->update('agenda', $data);
        redirect('Agenda');
    }
    
    
    public function delete ($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('agenda');
        redirect('Agenda');
    }
    
}
?>