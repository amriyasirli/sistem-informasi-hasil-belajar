<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {

	protected function load_view($id)
    {
        /*---------------------------------------
        AMBIL DATA KE DATABASE BERDASARKAN ID SISWA
        ---------------------------------------*/
            $data['pendaftaran'] = $this->db->where('pendaftaran_id_siswa', $id)->get('pendaftaran')->row();
            $data['siswa'] = $this->db->where('id_siswa', $id)->get('siswa')->row();
            $data['OrangTua'] = $this->db->where('id_orangtua_siswa', $id)->get('orang_tua')->row();
            $data['sekolah'] = $this->db->where('id_sekolah_asal', $id)->get('sekolah_asal')->row();
            $data['akun'] = $this->db->where('id_akun', $id)->get('akun')->row();
            $data['file'] = $this->db->where('id_file_upload', $id)->get('file_upload')->row();

            $this->load->view('templates/header');
            $this->load->view('templates/topbar');
            $this->load->view('siswa/detail', $data);
            $this->load->view('templates/footer');
        
    }
	public function print($id)
	{
        // echo $id;
        // die();
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 20,
            'margin_right' => 15,
            'margin_top' => 35,
            'margin_bottom' => 25,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);
        $data_pendaftaran = $this->db->where('pendaftaran_id_siswa', $id)->get('pendaftaran')->row();
		$data_siswa = $this->db->where('id_siswa', $id)->get('siswa')->row();
		$data_OrangTua = $this->db->where('id_orangtua_siswa', $id)->get('orang_tua')->row();
		$data_sekolah = $this->db->where('id_sekolah_asal', $id)->get('sekolah_asal')->row();
		$data_akun = $this->db->where('id_akun', $id)->get('akun')->row();
		$data_file = $this->db->where('id_file_upload', $id)->get('file_upload')->row();
        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("MTsN 4 LIMA PULUH KOTA - Bukti Pendaftaran PPDB");
        $mpdf->SetAuthor("Acme Trading Co.");
        $mpdf->SetWatermarkText("PPDB 2021");
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');
		$data = $this->load->view('pdf_v', [
            'pendaftaran' =>$data_pendaftaran,
            'siswa' =>$data_siswa,
            'OrangTua' =>$data_OrangTua,
            'sekolah' =>$data_sekolah,
            'akun' =>$data_akun,
            'file' =>$data_file,
        ], TRUE);
        // The library defines a function strcode2utf() to convert htmlentities to UTF-8 encoded text
		$mpdf->WriteHTML($data);
		$mpdf->Output('BUKTI PENDAFTARAN PPDB 2021.pdf','D');

	}

    public function rapor($id)
	{
        // echo $id;
        // die();
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 20,
            'margin_right' => 15,
            'margin_top' => 15,
            'margin_bottom' => 25,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);
		$data_siswa = $this->db->where('siswa.id', $id)
                          ->join('kelas', 'kelas.id_kelas=siswa.kelas')
                          ->get('siswa')
                          ->row();
        $data_nilai = $this->db->join('kelas', 'kelas.id_kelas=nilai.kelas')
                            ->join('mapel', 'mapel.id_mapel=nilai.mapel')
                            ->where('nilai.id_siswa', $id)
                            ->order_by('mapel.kelompok', 'ASC')
                            ->get('nilai')
                            ->result();
        $data_sekolah = $this->db->get('sekolah')->row();
        $data_semester = $this->db->get('semester')->row();

        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("MTsN 4 LIMA PULUH KOTA - Bukti Pendaftaran PPDB");
        $mpdf->SetAuthor("Acme Trading Co.");
        $mpdf->SetWatermarkText("SMKN 1 Panyabungan");
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');
		$data = $this->load->view('print/rapor', [
            'siswa' =>$data_siswa,
            'nilai' =>$data_nilai,
            'sekolah' =>$data_sekolah,
            'semester' =>$data_semester,
        ], TRUE);
        // The library defines a function strcode2utf() to convert htmlentities to UTF-8 encoded text
		$mpdf->WriteHTML($data);
		$mpdf->Output($data_siswa->nama_siswa.'-'.$data_siswa->id.'.pdf','D');

	}

    public function lulus()
	{
        // echo $id;
        // die();
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 20,
            'margin_right' => 15,
            'margin_top' => 35,
            'margin_bottom' => 25,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);
		$siswa = $this->db->join('pendaftaran', 'pendaftaran.pendaftaran_id_siswa=siswa.id_siswa')
		                    ->join('sekolah_asal', 'sekolah_asal.id_sekolah_asal=siswa.id_siswa')
                            ->where('pendaftaran.status_pendaftaran', 1)
                            ->order_by('sekolah_asal.nama_sekolah', 'ASC')
                            ->order_by('sekolah_asal.nama_sekolah', 'ASC')
                            ->get('siswa')->result();
        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("MTsN 4 LIMA PULUH KOTA - Bukti Pendaftaran PPDB");
        $mpdf->SetAuthor("Acme Trading Co.");
        $mpdf->SetWatermarkText("PPDB 2021");
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');
		$data = $this->load->view('pdf_lulus', [
            'data_lulus' =>$siswa,
        ], TRUE);
        // The library defines a function strcode2utf() to convert htmlentities to UTF-8 encoded text
		$mpdf->WriteHTML($data);
		$mpdf->Output('PESERTA PPDB 2021.pdf','D');

	}

    public function tidakLulus()
	{
        // echo $id;
        // die();
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 20,
            'margin_right' => 15,
            'margin_top' => 35,
            'margin_bottom' => 25,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);
		$siswa = $this->db->join('pendaftaran', 'pendaftaran.pendaftaran_id_siswa=siswa.id_siswa')
		                    ->join('sekolah_asal', 'sekolah_asal.id_sekolah_asal=siswa.id_siswa')
                            ->where('pendaftaran.status_pendaftaran', 2)
                            ->order_by('siswa.nama_siswa', 'ASC')
                            ->order_by('sekolah_asal.nama_sekolah', 'ASC')
                            ->get('siswa')->result();
        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("MTsN 4 LIMA PULUH KOTA - Bukti Pendaftaran PPDB");
        $mpdf->SetAuthor("Acme Trading Co.");
        $mpdf->SetWatermarkText("PPDB 2021");
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');
		$data = $this->load->view('pdf_tidakLulus', [
            'data_tidakLulus' =>$siswa,
        ], TRUE);
        // The library defines a function strcode2utf() to convert htmlentities to UTF-8 encoded text
		$mpdf->WriteHTML($data);
		$mpdf->Output('PESERTA PPDB 2021.pdf','D');

	}

    public function buktiLulus($id)
    {
        // echo $id;
        // die();
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 20,
            'margin_right' => 15,
            'margin_top' => 35,
            'margin_bottom' => 25,
            'margin_header' => 10,
            'margin_footer' => 10,
            'mode' => 'utf-8', 
            'format' => 'A6-L']);
        $data_pendaftaran = $this->db->where('pendaftaran_id_siswa', $id)->get('pendaftaran')->row();
		$data_siswa = $this->db->where('id_siswa', $id)->get('siswa')->row();
		$data_OrangTua = $this->db->where('id_orangtua_siswa', $id)->get('orang_tua')->row();
		$data_sekolah = $this->db->where('id_sekolah_asal', $id)->get('sekolah_asal')->row();
		$data_akun = $this->db->where('id_akun', $id)->get('akun')->row();
		$data_file = $this->db->where('id_file_upload', $id)->get('file_upload')->row();
        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("MTsN 4 LIMA PULUH KOTA - Bukti Pendaftaran PPDB");
        $mpdf->SetAuthor("Acme Trading Co.");
        $mpdf->SetWatermarkText("LULUS");
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');
		$data = $this->load->view('pdf_buktiLulus', [
            'pendaftaran' =>$data_pendaftaran,
            'siswa' =>$data_siswa,
            'OrangTua' =>$data_OrangTua,
            'sekolah' =>$data_sekolah,
            'akun' =>$data_akun,
            'file' =>$data_file,
        ], TRUE);
        // The library defines a function strcode2utf() to convert htmlentities to UTF-8 encoded text
		$mpdf->WriteHTML($data);
		$mpdf->Output('Surat Bukti Kelulusan.pdf','D');
    }

    public function buktiGagal($id)
    {
        // echo $id;
        // die();
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 20,
            'margin_right' => 15,
            'margin_top' => 35,
            'margin_bottom' => 25,
            'margin_header' => 10,
            'margin_footer' => 10,
            'mode' => 'utf-8', 
            'format' => 'A6-L']);
        $data_pendaftaran = $this->db->where('pendaftaran_id_siswa', $id)->get('pendaftaran')->row();
		$data_siswa = $this->db->where('id_siswa', $id)->get('siswa')->row();
		$data_OrangTua = $this->db->where('id_orangtua_siswa', $id)->get('orang_tua')->row();
		$data_sekolah = $this->db->where('id_sekolah_asal', $id)->get('sekolah_asal')->row();
		$data_akun = $this->db->where('id_akun', $id)->get('akun')->row();
		$data_file = $this->db->where('id_file_upload', $id)->get('file_upload')->row();
        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("MTsN 4 LIMA PULUH KOTA - Bukti Pendaftaran PPDB");
        $mpdf->SetAuthor("Acme Trading Co.");
        $mpdf->SetWatermarkText("BELUM LULUS");
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');
		$data = $this->load->view('pdf_buktiGagal', [
            'pendaftaran' =>$data_pendaftaran,
            'siswa' =>$data_siswa,
            'OrangTua' =>$data_OrangTua,
            'sekolah' =>$data_sekolah,
            'akun' =>$data_akun,
            'file' =>$data_file,
        ], TRUE);
        // The library defines a function strcode2utf() to convert htmlentities to UTF-8 encoded text
		$mpdf->WriteHTML($data);
		$mpdf->Output('Surat Keterangan Kelulusan.pdf','D');
    }
}
