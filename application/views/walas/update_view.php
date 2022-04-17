<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Ubah <?= $title ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('Admin') ?>">Home</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url($title) ?>"><?= $title ?></a></div>
                <div class="breadcrumb-item">Ubah <?= $title ?></div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Ubah <?= $title ?></h2>
            <p class="section-lead">Ubah data <?= $title ?></p>

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                    <form action="<?= base_url('GuruMapel/update/'.$nilai->id) ?>" method="post">
                      <div class="form-group">
                          <label for="siswa">Nama Siswa</label>
                          <select class="form-control" name="siswa" id="siswa" required>
                            <option value="<?= $siswa->id_siswa; ?>"><?= $siswa->nama_siswa; ?> (<?= $siswa->kelas; ?>)</option>
                            <option value="" disabled>- Pilih -</option>
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
                          <input type="text" name="mapel" value="<?= $nilai->mapel; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="kelas">Kelas</label>
                          <select class="form-control" name="kelas" id="kelas" required>
                            <option value="<?= $nilai->kelas; ?>"><?= $nilai->kelas; ?></option>
                            <option value="" disabled>- Pilih -</option>
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
                          <input type="text" name="semester" value="<?= $nilai->semester; ?>" value="<?= $semester->smt; ?>" readonly class="form-control">
                        </div>
                        <div class="form-group">
                          <label>UH</label>
                          <input type="number" name="harian" value="<?= $nilai->harian; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>UTS</label>
                          <input type="number" name="uts" value="<?= $nilai->uts; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>UAS</label>
                          <input type="number" name="uas" value="<?= $nilai->uas; ?>" class="form-control">
                        </div>
                      <input type="submit" name="simpan" class="btn btn-primary" value="Simpan Perubahan">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>