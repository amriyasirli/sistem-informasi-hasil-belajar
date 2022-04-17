<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $mapel; ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url('Admin') ?>">Home</a></div>
              <div class="breadcrumb-item"><a href="<?= base_url($title) ?>"><?= $title ?></a></div>
              <div class="breadcrumb-item"><?= $mapel ?></div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Data <?= $title.' '.$mapel ?></h2>
            <!-- <p class="section-lead">List jumlah <?= $title ?></p> -->

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <!-- <a href="<?= base_url('GuruMapel/add')?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a> -->
                    <div class="dropdown">
                      <button class="btn btn-info dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false">
                          Pilih Mapel : <?= $mapel ?>
                          </button>
                      <div class="dropdown-menu" aria-labelledby="triggerId">
                        <?php
                          $data = $this->db->order_by('nama_mapel', 'ASC')->get('mapel')->result();
                          foreach ($data as $row) :
                        ?>
                          
                          <a class="dropdown-item" href="<?= base_url('Walas/nilai/'.$iduser.'/'.$row->id_mapel) ?>"><?= $row->nama_mapel; ?></a>
                          
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                  <form action="<?= base_url('Walas/updateNilai/'.$id_kelas.'/'.$idmapel) ?>" method="post">
                  
                    <div class="card-header">
                      <h4>Kelas: <?= $kelas ?></h4>
                      <div class="card-header-action">
                        <span  class="badge badge-warning">
                          <i class="fas fa-tag"></i> <?= $mapel; ?>
                        </span>
                        <span  class="badge badge-danger">
                          <i class="fas fa-calendar"></i> SMT <?= $semester->smt.' - TP'.$semester->tahun_ajaran; ?>
                        </span>
                      </div>
                      <button type="submit" class="btn btn-primary ml-2"><i class="fas fa-save"></i> Simpan Perubahan</button>

                      <!-- Button trigger modal -->
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-hover table-md" id="myTable">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>UH</th>
                              <th>UTS</th>
                              <th>UAS</th>
                              <th>Nilai Akhir</th>
                              <?= $this->session->userdata('role') == 2 ? '<th>Status</th>' : '' ?>
                              
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
                                <td><input type="hidden" name="id_siswa[]" value="<?= $siswa->id; ?>"><?= $siswa->nama_siswa; ?></td>
                                <td width="90">
                                  <div class="form-group">
                                    <input type="text"
                                      class="form-control" onblur="findTotal()" name="harian[]" value="<?= $row->harian; ?>" pattern="\d*" maxlength="2">
                                  </div>
                                </td>
                                <td width="90">
                                  <div class="form-group">
                                    <input type="text"
                                      class="form-control" onblur="findTotal()" name="uts[]" value="<?= $row->uts; ?>" pattern="\d*" maxlength="2">
                                  </div>
                                </td>
                                <td width="90">
                                  <div class="form-group">
                                    <input type="text"
                                      class="form-control" onblur="findTotal()" name="uas[]" value="<?= $row->uas; ?>" pattern="\d*" maxlength="2">
                                  </div>
                                </td>
                                <td width="90">
                                  <div class="form-group">
                                    <input type="number"
                                      class="form-control" onblur="findTotal()" readonly value="<?= $nilaiTotal ?>">
                                  </div>
                                </td>
                                <?php 
                                if($this->session->userdata('role') == 2):
                                ?>
                                <td width="90">
                                  <?php 
                                    if($row->status == 0):
                                      echo '<a class="btn btn-sm btn-success" href="'.base_url('Walas/approve/'.$row->id.'/'.$idmapel).'" role="button"><i class="fas fa-check"></i> Approve</a>';
                                    else:
                                      echo '<a class="btn btn-sm btn-danger" href="'.base_url('Walas/cancel/'.$row->id.'/'.$idmapel).'" role="button" ><i class="fas fa-ban"></i> Cancel</a>';
                                    endif;
                                  ?>
                                </td>
                                <?php endif; ?>
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