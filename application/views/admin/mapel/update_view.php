<!-- Main Content -->
<?php 
  $kelas = $this->db->get_where('kelas', ['id_kelas'=>$mapel->kelas])->row();
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
                    <form action="<?= base_url('Mapel/update/'.$mapel->id_mapel) ?>" method="post">
                      <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <input type="text" name="nama_mapel" value="<?= $mapel->nama_mapel?>" class="form-control">
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
                        <label for="guru_mapel">Guru Mapel</label>
                        <select class="form-control" name="guru_mapel" id="guru_mapel">
                          <option value="<?= $mapel->guru_mapel; ?>"><?= $mapel->nama; ?></option>
                          <option disabled>- Pilih -</option>
                          <?php
                            $data = $this->db->order_by('nama', 'ASC')->where('role', 3)->get('auth')->result();
                            foreach ($data as $row) :
                          ?>
                            <option value="<?= $row->id; ?>"><?= $row->nama; ?></option>
                          <?php endforeach; ?>
                          
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="kelompok">Guru Mapel</label>
                        <select class="form-control" name="kelompok" id="kelompok">
                          <option value="<?= $mapel->kelompok; ?>">Kelompok <?= $mapel->kelompok; ?></option>
                          <option disabled>- Pilih -</option>
                          <option value="A">Kelompok A (Umum)</option>
                          <option value="B">Kelompok B (Umum)</option>
                          <option value="C">Kelompok C (Peminatan)</option>
                        </select>
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