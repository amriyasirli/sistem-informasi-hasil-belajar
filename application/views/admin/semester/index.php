<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url('Admin') ?>">Home</a></div>
              <div class="breadcrumb-item"><a href="<?= base_url($title) ?>"><?= $title ?></a></div>
              <div class="breadcrumb-item">Pengaturan Semester</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Pengaturan <?= $title ?></h2>
            <!-- <p class="section-lead">List jumlah <?= $title ?></p> -->

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Semester dan Tahun Ajaran</h4>
                  </div>
                  <div class="card-body">
                    <div class="empty-state" data-height="400">
                      <div class="empty-state-icon">
                        <i class="fas fa-first"><?= $semester->smt; ?></i>
                      </div>
                      <h2>Tahun Ajaran <?= $semester->tahun_ajaran; ?></h2>
                      <p class="lead">
                        Pastikan semester dan tahun ajaran telah sesuai !
                      </p>
                      <a href="<?= base_url('Semester/update_view/'.$semester->id) ?>" class="btn btn-primary mt-4">Update</a>
                      <!-- <a href="#" class="mt-4 bb">Need Help?</a> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>