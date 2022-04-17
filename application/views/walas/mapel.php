<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url('Admin') ?>">Home</a></div>
              <div class="breadcrumb-item"><a href="<?= base_url($title) ?>"><?= $title ?></a></div>
              <div class="breadcrumb-item">List Data <?= $title ?></div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">List Data <?= $title ?></h2>
            <!-- <p class="section-lead">List jumlah <?= $title ?></p> -->

            <div class="row">
                <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Pilih Kelas dan Mata Pelajaran</h4>
                </div>
                <div class="card-body">
                  <div class="owl-carousel owl-theme" id="products-carousel">
            <div class="row">

                    <?php
                        
                        foreach ($mapel as $row) :
                    ?>

                    <div class="col-md-3">
                      <div class="product-item pb-3">
                        <div class="product-image">
                          <img alt="image" src="<?= base_url('assets') ?>/assets/img/products/product-4-50.png" class="img-fluid">
                        </div>
                        <div class="product-details">
                          <div class="product-name"><?= $row->kelas; ?></div>
                          <!-- <div class="product-review">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                          </div> -->
                          <div class="text-muted text-small"><?= $row->nama_mapel; ?></div>
                          <div class="product-cta">
                            <a href="<?= base_url('GuruMapel/nilai/'.$row->id_mapel) ?>" class="btn btn-primary">Penilaian</a>
                          </div>
                        </div>
                      </div>
                    </div>
                        
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </section>
      </div>
