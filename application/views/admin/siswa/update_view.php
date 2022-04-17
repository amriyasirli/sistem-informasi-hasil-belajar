<!-- Main Content -->
<?php 
  $kelas = $this->db->get_where('kelas', ['id_kelas'=>$siswa->kelas])->row();
?>
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
                    <form action="<?= base_url('Siswa/update/'.$siswa->id) ?>" method="post">
                      <div class="form-group">
                        <label>Nis</label>
                        <input type="text" name="id" value="<?= $siswa->id?>" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="nama_siswa" value="<?= $siswa->nama_siswa?>" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" name="kelas" id="kelas">
                          <option value="<?= $kelas->id_kelas?>"><?= $kelas->kelas?></option>
                          <option disabled>- Pilih -</option>
                          <?php
                            $kelas = $this->db->order_by('kelas', 'ASC')->get('kelas')->result();
                            foreach ($kelas as $row) :
                          ?>
                            
                            <option value="<?= $row->id_kelas?>"><?= $row->kelas?></option>
                            
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3"><?= $siswa->alamat?></textarea>
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