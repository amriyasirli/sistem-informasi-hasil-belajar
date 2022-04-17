<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url('Dashboard') ?>">Home</a></div>
              <div class="breadcrumb-item"><?= $title ?></div>
            </div>
          </div>

          <div class="row">
              <div class="col-12">
                <div class="activities">
                  <div class="activity">
                    <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job text-primary">Tambahkan Data Akun</span>
                        <!-- <span class="bullet"></span> -->
                        <!-- <a class="text-job" href="#">View</a> -->
                        <div class="float-right dropdown">
                          <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                          <div class="dropdown-menu">
                            <div class="dropdown-title">Action</div>
                            <a href="<?= base_url('User/add') ?>" class="dropdown-item has-icon"><i class="fas fa-plus"></i> Tambah</a>
                          </div>
                        </div>
                      </div>
                      <p>Tersedia 5 level user: Admin, Walas, Guru Mata Pelajara, Pimpinan, Wali Murid/Siswa.</p>
                    </div>
                  </div>
                  <div class="activity">
                    <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="fas fa-building"></i>
                    </div>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job text-primary">Tambahkan Kelas </span>
                        <!-- <span class="bullet"></span> -->
                        <!-- <a class="text-job" href="#">View</a> -->
                        <div class="float-right dropdown">
                          <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                          <div class="dropdown-menu">
                            <div class="dropdown-title">Action</div>
                            <a href="<?= base_url('Kelas/add') ?>" class="dropdown-item has-icon"><i class="fas fa-plus"></i> Tambah</a>
                          </div>
                        </div>
                      </div>
                      <p>Inputkan semua kelas beserta nama wali kelas masing-masing kelas.</p>
                    </div>
                  </div>

                  <div class="activity">
                    <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job text-primary">Tambahkan Mata Pelajaran </span>
                        <!-- <span class="bullet"></span> -->
                        <!-- <a class="text-job" href="#">View</a> -->
                        <div class="float-right dropdown">
                          <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                          <div class="dropdown-menu">
                            <div class="dropdown-title">Action</div>
                            <a href="<?= base_url('Mapel/add') ?>" class="dropdown-item has-icon"><i class="fas fa-plus"></i> Tambah</a>
                          </div>
                        </div>
                      </div>
                      <p>Inputkan semua Mata Pelajara beserta kelas dan guru pengampu.</p>
                    </div>
                  </div>

                  <div class="activity">
                    <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="fas fa-users"></i>
                    </div>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job text-primary">Tambahkan Data Siswa </span>
                        <!-- <span class="bullet"></span> -->
                        <!-- <a class="text-job" href="#">View</a> -->
                        <div class="float-right dropdown">
                          <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                          <div class="dropdown-menu">
                            <div class="dropdown-title">Action</div>
                            <a href="<?= base_url('Siswa/add') ?>" class="dropdown-item has-icon"><i class="fas fa-plus"></i> Tambah</a>
                          </div>
                        </div>
                      </div>
                      <p>Inputkan data siswa per masing-masing kelas dan secara otomatis akun untuk siswa akan di buat.</p>
                    </div>
                  </div>

                  <div class="activity">
                    <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="fas fa-file"></i>
                    </div>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job text-primary">Kelola Nilai Siswa </span>
                        <!-- <span class="bullet"></span> -->
                        <!-- <a class="text-job" href="#">View</a> -->
                        <!-- <div class="float-right dropdown">
                          <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                          <div class="dropdown-menu">
                            <div class="dropdown-title">Action</div>
                            <a href="<?= base_url('Mapel/add') ?>" class="dropdown-item has-icon"><i class="fas fa-plus"></i> Tambah</a>
                          </div>
                        </div> -->
                      </div>
                      <p>Hanya wali kelas dan guru mata pelajaran yang dapat mengelola nilai.</p>
                    </div>
                  </div>

                  <div class="activity">
                    <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="fas fa-download"></i>
                    </div>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job text-primary">Cetak Rapor </span>
                        <!-- <span class="bullet"></span> -->
                        <!-- <a class="text-job" href="#">View</a> -->
                        <!-- <div class="float-right dropdown">
                          <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                          <div class="dropdown-menu">
                            <div class="dropdown-title">Action</div>
                            <a href="<?= base_url('Mapel/add') ?>" class="dropdown-item has-icon"><i class="fas fa-plus"></i> Tambah</a>
                          </div>
                        </div> -->
                      </div>
                      <p>Cetak rapor hasil belajar masing-masing siswa dalam bentuk file PDF.</p>
                    </div>
                  </div>

                </div>
              </div>
            </div>
        </section>
      </div>