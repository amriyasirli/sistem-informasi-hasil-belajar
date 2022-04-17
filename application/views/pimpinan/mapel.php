<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Kelas <?= $kelas; ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url('Admin') ?>">Home</a></div>
              <div class="breadcrumb-item"><a href="<?= base_url($title) ?>"><?= $title ?></a></div>
              <div class="breadcrumb-item"><?= $mapel ?></div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Data <?= $title ?></h2>
            <!-- <p class="section-lead">List jumlah <?= $title ?></p> -->

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <!-- <a href="<?= base_url('GuruMapel/add')?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a> -->
                    <div class="dropdown">
                      <button class="btn btn-info dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false">
                          PILIH MAPEL
                          </button>
                      <div class="dropdown-menu" aria-labelledby="triggerId">
                        <a class="dropdown-item disabled" href="#">Mata Pelajaran</a>
                        <?php
                          $data = $this->db->order_by('nama_mapel', 'ASC')
                                            ->where('mapel.kelas', $idkelas)
                                            ->join('auth', 'auth.id=mapel.guru_mapel')
                                            ->join('kelas', 'kelas.id_kelas=mapel.kelas')
                                            ->get('mapel')
                                            ->result();
                          foreach ($data as $row) :
                        ?>
                          
                          <a class="dropdown-item" href="<?= base_url('Pimpinan/mapel/'.$idkelas.'/'.$row->id_mapel) ?>"><?= $row->nama_mapel; ?></a>
                          
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                  <form action="<?= base_url('GuruMapel/updateNilai/'.$idkelas.'/'.$idmapel) ?>" method="post">
                  
                    <div class="card-header">
                      <h4>Kelas: <?= $kelas ?></h4>
                      <div class="card-header-action">
                        <span  class="badge badge-warning">
                          <i class="fas fa-tag"></i> <?= $kelas.' ('.$mapel.')' ?>
                        </span>
                        <span  class="badge badge-danger">
                          <i class="fas fa-calendar"></i> SMT <?= $semester->smt.' - TP'.$semester->tahun_ajaran; ?>
                        </span>
                      </div>
                      <!-- <button type="submit" class="btn btn-primary ml-2"><i class="fas fa-save"></i> Simpan Perubahan</button> -->

                      <!-- Button trigger modal -->
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-hover table-md" id="myTable">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nis</th>
                              <th>Nama</th>
                              <th class="text-center">Nilai Akhir</th>
                              <th class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                $no = 1;
                                foreach ($nilai as $row) :
                                  $siswa = $this->db->join('siswa', 'siswa.id=nilai.id_siswa')->where('id_siswa', $row->id_siswa)->get('nilai')->row();
                                  // $kelas = $this->db->join('kelas', 'kelas.id=nilai.kelas')->where('id_siswa', $row->id_siswa)->get('nilai')->row();
                                  $nilai = $this->db->where('id_siswa', $row->id_siswa)->get('nilai')->row();
                                  $nilaiTotal = round(($nilai->harian*0.2) + ($nilai->uts*0.4) + ($nilai->uas*0.4),0);
                            ?> 
                              <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    <?= $row->id_siswa; ?>
                                </td>
                                <td>
                                    <?= $siswa->nama_siswa; ?>
                                </td>
                                <td class="text-center">
                                  <?= $nilaiTotal; ?>
                                  </div>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-info" href="<?= base_url('Siswa/siswaDetail/'.$row->id_siswa) ?>" role="button"><i class="fas fa-book"></i> Lihat Rapor</a>
                                    <a class="btn btn-sm btn-success" href="<?= base_url('Pdf/rapor/'.$row->id_siswa) ?>" role="button"><i class="fas fa-download"></i> Print</a>
                                </td>
                              </tr>

                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <script>
        function findTotal(){
          var arr = document.getElementsByClassName('amount');
          var tot = 0;
          for(var i=0; i<arr.length; i++){
            if(parseFloat(arr[i].value))
              tot += parseFloat(arr[i].value);
          }
          document.getElementById('totalordercost').value = Math.round(tot/3);
        }
        
      </script>