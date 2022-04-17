<!-- Main Content -->
<?php 
  $role = $this->db->where('id', $user->role)->get('role')->row();
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
                    <?= form_open_multipart('User/update/'.$user->id) ?>
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" value="<?= $user->nama; ?>" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>NIP</label>
                        <input type="text" name="nip" value="<?= $user->nip; ?>" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" value="<?= $user->username; ?>" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label for="role">Role Akses</label>
                        <?php if($user->role == 1): ?>
                          <select class="form-control" name="role">
                            <option value="<?= $role->id; ?>"><?= $role->role; ?></option>
                            <option disabled>- Pilih -</option>
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
                        <?php else: ?>
                            <input type="text" class="form-control" value="<?= $role->role; ?>" readonly aria-describedby="helpId">
                        <?php endif; ?>
                      </div>
                      <div class="form-group">
                        <label>Foto</label><br>
                        <img src="<?= base_url('assets/img/'.$user->foto) ?>" width="150" class="p-2" alt="">
                        <input type="hidden" name="fotolama" value="<?= $user->foto?>">
                        <input type="file" name="foto" class="form-control">
                      </div>
                      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <?= form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>