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
                    <form action="<?= base_url('Semester/update/'.$semester->id) ?>" method="post">
                      <div class="form-group">
                        <label for="smt">Semester</label>
                        <select class="form-control" name="smt" id="smt">
                          <option value="<?= $semester->smt; ?>"><?= $semester->smt; ?></option>
                          <option disabled>- Pilih Semester-</option>
                          <option value="I">I</option>
                          <option value="II">II</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="tahun_ajaran">Tahun Ajaran</label>
                        <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                          <option value="<?= $semester->tahun_ajaran; ?>" disabled style="color:#007bff;"><?= $semester->tahun_ajaran; ?></option>
                          <option disabled>- Pilih Tahun Ajaran-</option>
                          <option value="2021/2022">2021/2022</option>
                          <option value="2022/2023">2022/2023</option>
                          <option value="2023/2024">2023/2024</option>
                          <option value="2024/2025">2024/2025</option>
                          <option value="2025/2026">2025/2026</option>
                        </select>
                      </div>
                      <!-- <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <input type="text" name="tahun_ajaran" value="<?= $semester->tahun_ajaran?>" class="form-control">
                      </div> -->
                      <input type="submit" name="simpan" class="btn btn-primary" value="Simpan Perubahan">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>