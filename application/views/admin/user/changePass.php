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
                  <?= $this->session->flashdata('pass'); ?>
                  </div>
                  <div class="card-body">
                    <?= form_open_multipart('User/changePass_act/'.$user->id) ?>
                      <div class="form-group">
                        <label for="oldPass">Password Lama</label>
                        <input type="password" name="oldPass" value="<?= set_value('oldPass'); ?>" class="form-control" placeholder="Masukan Password Lama">
                        <small id="helpId" class="form-text text-danger"><?= form_error('oldPass'); ?></small>
                      </div>
                      <div class="form-group">
                        <label for="password1">Password Baru</label>
                        <input type="password" name="password1" value="<?= set_value('password1'); ?>" class="form-control" placeholder="Masukan Password Baru">
                        <small id="helpId" class="form-text text-danger"><?= form_error('password1'); ?></small>
                      </div>
                      <div class="form-group">
                        <label for="password2">Ulangi Password</label>
                        <input type="password" name="password2" class="form-control" placeholder="Ulangi Password Baru">
                        <small id="helpId" class="form-text text-danger"><?= form_error('password2'); ?></small>
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