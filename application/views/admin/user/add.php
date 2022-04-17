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
                    <?= form_open_multipart('User/add_action') ?>
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap dan Gelar">
                      </div>
                      <div class="form-group">
                        <label>NIP</label>
                        <input type="text" name="nip" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="role">Role Akses</label>
                        <select class="form-control" name="role" required>
                          <option value="">- Pilih -</option>
                          <?php
                            $data = $this->db->order_by('id', 'ASC')->get('role')->result();
                            foreach ($data as $row) :
                          ?>
                          <?php if($row->id == 6): ?>
                            <!-- <option value="<?= $row->id; ?>"><?= $row->role; ?></option> -->
                          <?php else: ?>
                            <option value="<?= $row->id; ?>"><?= $row->role; ?></option>
                          <?php endif; ?>
                            
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label> Foto</label>
                        <input type="file" name="foto" class="form-control" required>
                      </div>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    <?= form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>