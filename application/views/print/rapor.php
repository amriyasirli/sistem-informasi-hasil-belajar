<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <link rel="stylesheet" href=".css">
        <style>
            body {font-family: sans-serif;
                font-size: 10pt;
            }
            p {	
                margin: 0pt; 
            }
            table.header {
                border: 0px;
            }
            td { 
                vertical-align: top; 
            }
            .header td {
                border: 0px;
            }

            table.items {
                border: 1px solid #000000;
            }
            td { 
                vertical-align: top; 
            }
            .items td {
                border: 1px solid #000000;
            }
            .items th {
                border: 1px solid #000000;
            }

            table thead td { background-color: #EEEEEE;
                text-align: center;
                border: 0.1mm solid #000000;
                font-variant: small-caps;
            }
            .items td.blanktotal {
                background-color: #EEEEEE;
                border: 0.1mm solid #000000;
                background-color: #FFFFFF;
                border: 0mm none #000000;
                border-top: 0.1mm solid #000000;
                border-right: 0.1mm solid #000000;
            }
            .items td.totals {
                text-align: right;
                border: 0.1mm solid #000000;
            }
            .items td.cost {
                text-align: "." center;
            }
            </style>
        <title></title>
    </head>
<body>
    <table class="header" align="center" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
        <tbody>
            <tr>
            <td>Nama Sekolah</td>
            <td width="20">:</td>
            <td class="text-left"><?= $sekolah->nama_sekolah; ?></td>
            <td></td>
            <td>Kelas</td>
            <td width="20">:</td>
            <td><?= $siswa->kelas; ?></td>
            </tr>
            <tr>
            <td>Alamat</td>
            <td width="20">:</td>
            <td><?= $siswa->alamat; ?></td>
            <td></td>
            <td>Semester</td>
            <td width="20">:</td>
            <td><?= $semester->smt; ?>/<?= $semester->smt == "I" ? 'Ganjil' : 'Genap'; ?></td>
            </tr>
            <tr>
            <td>Nama</td>
            <td width="20">:</td>
            <td><b><?= $siswa->nama_siswa; ?></b></td>
            <td></td>
            <td>Tahun Pelajaran</td>
            <td width="20">:</td>
            <td><?= $semester->tahun_ajaran; ?></td>
            </tr>
            <tr>
            <td>NIS/NISN</td>
            <td width="20">:</td>
            <td><?= $siswa->id; ?></td>
            <td></td>
            </tr>
        </tbody>
    </table>

    <hr>
    
    <p>Kriteria Ketuntasan Minimal (KKM) = 75</p>

    <table class="items" align="center" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
            <tr>
                <!-- <th data-width="40">Mata Pelajaran</th> -->
                <th width="30">No</th>
                <th width="200">Mata Pelajaran</th>
                <th width="50">Nilai</th>
                <th width="50">Predikat</th>
                <th>Deskripsi</th>
                <!-- <th class="text-center">Quantity</th> -->
                <!-- <th class="text-right">Totals</th> -->
            </tr>
            <tr colspan="5">
                <td colspan="5"><b>Kelompok A (Umum)</b></td>
            </tr>
            <?php
                $no = 1;
                foreach ($nilai as $row) :
                    $nilaiTotal = round(($row->harian*0.2) + ($row->uts*0.4) + ($row->uas*0.4),0);

                if ($nilaiTotal<40){
                    $predikat = "E"; 
                } else if($nilaiTotal<60){
                    $predikat = "D"; 
                } else if($nilaiTotal<75){
                    $predikat = "C"; 
                } else if($nilaiTotal<90){
                    $predikat = "B"; 
                } else if ($nilaiTotal<=100){
                    $predikat = "A"; 
                }
            ?>  
                <?php if($row->kelompok == "A"): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->nama_mapel; ?></td>
                    <td align="center"><?= $nilaiTotal; ?></td>
                    <td align="center">
                        <?= $predikat; ?>
                    </td>
                    <td>
                        <?= $row->deskripsi; ?>
                    </td>
                </tr>
                <?php endif; ?>
            <?php endforeach; ?>
                <tr colspan="5">
                    <td colspan="5"><b>Kelompok B (Umum)</b></td>
                </tr>
            <?php
                $no = 1;
                foreach ($nilai as $row) :
                    $nilaiTotal = round(($row->harian*0.2) + ($row->uts*0.4) + ($row->uas*0.4),0);

            ?>  
                <?php if($row->kelompok == "B"): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->nama_mapel; ?></td>
                    <td align="center"><?= $nilaiTotal; ?></td>
                    <td align="center">
                    <?= $predikat; ?>
                    </td>
                    <td>
                        <?= $row->deskripsi; ?>
                    </td>
                </tr>
                <?php endif; ?>
            <?php endforeach; ?>
                <tr colspan="5">
                    <td colspan="5"><b>Kelompok C (Peminatan)</b></td>
                </tr>
            <?php
                $no = 1;
                foreach ($nilai as $row) :
                    $nilaiTotal = round(($row->harian*0.2) + ($row->uts*0.4) + ($row->uas*0.4),0);
            ?>  
                <?php if($row->kelompok == "C"): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->nama_mapel; ?></td>
                    <td align="center"><?= $nilaiTotal; ?></td>
                    <td align="center">
                    <?= $predikat; ?>
                    </td>
                    <td>
                        <?= $row->deskripsi; ?>
                    </td>
                </tr>
                <?php endif; ?>
            <?php endforeach; ?>

            </table>

    <?php 
    $walas = $this->db->where('id', $siswa->walas)->get('auth')->row();
    ?>
    <table width="100%" style=" margin-top: 20px">
    <tr>
      <td width="40%" style="text-align: left; padding-top: 20px; padding-left:10px">
        Mengetahui,<br/>
        Kepala Sekolah
        <br/>
        <br/>
        <br/>
        <br/>
        <span style="text-decoration: underline;"><?= $sekolah->kepsek; ?></span>
        <br/>
        <span>Nip. <?= $sekolah->nip_kepsek; ?></span>
      </td>
      <td width="20%" style="text-align: right; margin-top: 20px">
      
      </td>
      <td width="40%" style="text-align: left; padding-top: 20px">
        Panyabungan, <?= date('d M Y');?> <br/>
        Wali Kelas 
        <br/>
        <br/>
        <br/>
        <br/>
        <span style="text-decoration: underline;"><?= $walas->nama; ?></span>
        <br/>
        <span>Nip. <?= $walas->nip; ?></span>
      </td>
    </tr>
  </table>

</body>
</html>
        
            
            