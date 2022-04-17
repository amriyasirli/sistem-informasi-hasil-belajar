<?php 

class WaliMurid extends CI_Controller {

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
        $id = $this->session->userdata('username');
        redirect('Siswa/siswaDetail/'.$id);
    }
    
}
?>