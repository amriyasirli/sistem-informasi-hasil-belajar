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
                    <form action="<?= base_url('GuruMapel/add_action/') ?>" method="post">
                      <div class="form-group">
                        <label for="siswa">Nama Siswa</label>
                        <select class="form-control" name="siswa" id="siswa" required>
                          <option value="">- Pilih -</option>
                          <?php
                            $data = $this->db->order_by('kelas', 'ASC')->order_by('nama_siswa', 'ASC')->get('siswa')->result();
                            foreach ($data as $row) :
                          ?>
                            
                            <option value="<?= $row->id; ?>"><?= $row->nama_siswa; ?> (<?= $row->kelas; ?>)</option>
                            
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <input type="text" name="mapel" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" name="kelas" id="kelas" required>
                          <option value="">- Pilih -</option>
                          <?php
                            $data = $this->db->order_by('kelas', 'ASC')->get('kelas')->result();
                            foreach ($data as $row) :
                          ?>
                            
                            <option value="<?= $row->kelas; ?>"><?= $row->kelas; ?></option>
                            
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Semester</label>
                        <input type="text" name="semester" value="<?= $semester->smt; ?>" readonly class="form-control">
                      </div>
                      <div class="form-group">
                        <label>UH</label>
                        <input type="text" name="harian" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>UTS</label>
                        <input type="text" name="uts" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>UAS</label>
                        <input type="text" name="uas" class="form-control">
                      </div>
                      <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>