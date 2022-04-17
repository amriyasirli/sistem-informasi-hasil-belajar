<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tambah <?= $title ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url('Admin') ?>">Home</a></div>
              <div class="breadcrumb-item"><a href="<?= base_url($title) ?>"><?= $title ?></a></div>
              <div class="breadcrumb-item">Tambah <?= $title ?></div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Tambah <?= $title ?></h2>
            <p class="section-lead">Tambah data <?= $title ?></p>

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                    <form action="<?= base_url('Mapel/add_action/') ?>" method="post">
                      <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <input type="text" name="nama_mapel" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" name="kelas" id="kelas">
                          <option>- Pilih - </option>
                          <?php
                            $kelas = $this->db->order_by('kelas', 'ASC')->get('kelas')->result();
                            foreach ($kelas as $row) :
                          ?>
                            
                            <option value="<?= $row->id_kelas?>"><?= $row->kelas?></option>
                            
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="guru_mapel">Guru Mapel</label>
                        <select class="form-control" name="guru_mapel" id="guru_mapel">
                          <option>- Pilih - </option>
                          <?php
                            $kelas = $this->db->order_by('nama', 'ASC')->where('role', 3)->get('auth')->result();
                            foreach ($kelas as $row) :
                          ?>
                            
                            <option value="<?= $row->id?>"><?= $row->nama?></option>
                            
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="kelompok">Kelompok Mata Pelajaran</label>
                        <select class="form-control" name="kelompok" id="kelompok" required>
                          <option value="">- Pilih -</option>
                          <option value="A">Kelompok A (Umum)</option>
                          <option value="B">Kelompok B (Umum)</option>
                          <option value="C">Kelompok C (Peminatan)</option>
                        </select>
                      </div>
                      <!-- <div class="form-group">
                        <label>Nama Guru</label>
                        <input type="text" name="guru_mapel" class="form-control">
                      </div> -->
                      <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>