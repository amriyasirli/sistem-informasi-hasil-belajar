
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
              <div class="breadcrumb-item"><?= $title?></div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Selamat Datang di Sistem Informasi Hasil Belajar Siswa SMKN 1 Panyabungan</h2>
            <!-- <p class="section-lead">Halaman ini merupakan halaman admin.</p> -->
            <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Siswa</h4>
                  </div>
                  <div class="card-body">
                    <?= $siswa; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-building"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Kelas</h4>
                  </div>
                  <div class="card-body">
                    <?= $kelas; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-user-tie"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Walas</h4>
                  </div>
                  <div class="card-body">
                    <?= $walas; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Guru</h4>
                  </div>
                  <div class="card-body">
                    <?= $guru; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="card">
                <div class="card-header">
                  <h4>Profil Sekolah</h4>
                  <div class="card-header-action">
                    <!-- <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#modelId">
                      <i class="fas fa-clock"></i> Atur timer 
                    </button> -->
                  </div>
                  <!-- Button trigger modal -->
                </div>
                <div class="row p-3">
                  <div class="table-responsive">
                    <table class="table table-borderless table-md" width="100%">
                      <tbody>
                        <tr>
                          <th width="150">Nama Sekolah</th>
                          <td width="20">:</td>
                          <td class="text-left text-primary bold"><?= $sekolah->nama_sekolah; ?></td>
                        </tr>
                        <tr>
                          <th width="150">NPSN</th>
                          <td width="20">:</td>
                          <td><?= $sekolah->npsn == null ? '-': $sekolah->npsn; ?></td>
                        </tr>
                        <tr>
                          <th width="150">Kepala Sekolah</th>
                          <td width="20">:</td>
                          <td><?= $sekolah->kepsek; ?></td>
                        </tr>
                        <tr>
                          <th width="150">NIP</th>
                          <td width="20">:</td>
                          <td><?= $sekolah->nip_kepsek; ?></td>
                        </tr>
                        <tr>
                          <th width="150">Alamat</th>
                          <td width="20">:</td>
                          <td><?= $sekolah->alamat; ?></td>
                        </tr>
                        <tr>
                          <th width="150">Semester</th>
                          <td width="20">:</td>
                          <td><?= $semester->smt; ?>/<?= $semester->smt == "I" ? 'Ganjil' : 'Genap'; ?></td>
                        </tr>
                        <tr>
                          <th width="150">Tahun Pelajaran</th>
                          <td width="20">:</td>
                          <td><?= $semester->tahun_ajaran; ?> M</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>
        </section>
      </div>
      
      <!-- Modal -->
      <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Atur timer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
              <form class="form-inline" action="<?= base_url('Admin/timer') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                      <input type="number" name="timer" value="" class="form-control" placeholder="Masukan angka timer" aria-describedby="helpId">
                      <small id="helpId" class="text-danger">Angka akan berhitung mundur untuk mengganti halaman display informasi secara otomatis. 1 Menit (60)</small>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
              </form>
          </div>
        </div>
      </div>
