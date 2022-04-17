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
            <h2 class="section-title"><?= $siswa->nama_siswa; ?></h2>
            <p class="section-lead">
              Detail informasi data diri siswa SMKN 1 Panyabungan.
            </p>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <img alt="image" src="<?= base_url('assets/') ?>img/<?= $user->foto; ?>" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">NIS/NISN</div>
                        <div class="profile-widget-item-value"><?= $siswa->id; ?></div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Kelas</div>
                        <div class="profile-widget-item-value"><?= $siswa->kelas; ?></div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name"><?= $siswa->nama_siswa; ?> 
                      <!-- <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div> -->
                    </div>
                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <td width="150">Username</td>
                          <td width="50">:</td>
                          <td><?= $siswa->id; ?></td>
                        </tr>
                        <tr>
                          <td width="150">Password</td>
                          <td width="50">:</td>
                          <td>########</td>
                        </tr>
                        <tr>
                          <td width="150">Kelas</td>
                          <td width="50">:</td>
                          <td><?= $siswa->kelas; ?></td>
                        </tr>
                        <tr>
                          <td width="150">Alamat</td>
                          <td width="50">:</td>
                          <td><?= $siswa->alamat; ?></td>
                        </tr>
                        <tr>
                          <td width="150">Tanggal Daftar</td>
                          <td width="50">:</td>
                          <td><?= $siswa->data_created; ?></td>
                        </tr>
                      </thead>
                    </table>
                  </div>
                  <!-- <div class="card-footer text-center">
                    <div class="font-weight-bold mb-2">Follow Ujang On</div>
                    <a href="#" class="btn">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn">
                      <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="btn">
                      <i class="fab fa-instagram"></i>
                    </a>
                  </div> -->
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="section-body">
                    <div class="invoice">
                      <div class="invoice-print">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="invoice-title">
                              <h2 class="text-center">Laporan Hasil Belajar Siswa</h2>
                              <!-- <div class="invoice-number">Order #12345</div> -->
                            </div>
                            <hr>
                            <div class="table-responsive">
                              <table class="table table-borderless table-sm">
                                <tbody>
                                  <tr>
                                    <td>Nama Sekolah</td>
                                    <td width="20">:</td>
                                    <td class="text-left"><?= $sekolah->nama_sekolah; ?></td>
                                    <td></td>
                                    <td>Kelas</td>
                                    <td width="20">:</td>
                                    <td><?= $siswa->kelas; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Alamat</td>
                                    <td width="20">:</td>
                                    <td><?= $siswa->alamat; ?></td>
                                    <td></td>
                                    <td>Semester</td>
                                    <td width="20">:</td>
                                    <td><?= $semester->smt; ?>/<?= $semester->smt == "I" ? 'Ganjil' : 'Genap'; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Nama</td>
                                    <td width="20">:</td>
                                    <td class="text-primary bold"><?= $siswa->nama_siswa; ?></td>
                                    <td></td>
                                    <td>Tahun Pelajaran</td>
                                    <td width="20">:</td>
                                    <td><?= $semester->tahun_ajaran; ?></td>
                                  </tr>
                                  <tr>
                                    <td>NIS/NISN</td>
                                    <td width="20">:</td>
                                    <td><?= $siswa->id; ?></td>
                                    <td></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <hr>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <!-- <div class="section-title">Order Summary</div> -->
                            <p class="section">Kriteria Ketuntasan Minimal (KKM) = 75</p>
                            <div class="table-responsive">
                              <table class="table table-hover table-md table-light">
                                <tr>
                                  <!-- <th data-width="40">Mata Pelajaran</th> -->
                                  <th class="text-center" width="30">No</th>
                                  <th class="text-center">Mata Pelajaran</th>
                                  <th class="text-center">Nilai</th>
                                  <th class="text-center">Predikat</th>
                                  <th class="text-center">Deskripsi</th>
                                  <!-- <th class="text-center">Quantity</th> -->
                                  <!-- <th class="text-right">Totals</th> -->
                                </tr>
                                <tr colspan="5">
                                    <td colspan="5"><strong>Kelompok A (Umum)</strong></td>
                                </tr>
                                <?php
                                  $no = 1;
                                  foreach ($nilai as $row) :
                                      $nilaiTotal = round(($row->harian*0.2) + ($row->uts*0.4) + ($row->uas*0.4),0);
 
                                    if ($nilaiTotal<40){
                                        $predikat = "E"; 
                                    } else if($nilaiTotal<60){
                                        $predikat = "D"; 
                                    } else if($nilaiTotal<75){
                                        $predikat = "C"; 
                                    } else if($nilaiTotal<90){
                                      $predikat = "B"; 
                                    } else if ($nilaiTotal<=100){
                                        $predikat = "A"; 
                                    }
                                ?>  
                                  <?php if($row->kelompok == "A"): ?>
                                    <tr>
                                      <td class="text-center"><?= $no++; ?></td>
                                      <td><?= $row->nama_mapel; ?></td>
                                      <td class="text-center"><?= $nilaiTotal; ?></td>
                                      <td class="text-center">
                                        <?= $predikat; ?>
                                      </td>
                                      <td class="text-center">
                                        <?php if($user->role == 2): ?>
                                          <?= $row->deskripsi == null ? '<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#deskripsi'.$row->id.'"><i class="fas fa-info"></i></button>' : '<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#deskripsi'.$row->id.'"><i class="fas fa-check"></i></button>'; ?>
                                        <?php else: ?>
                                          <?= $row->deskripsi ?>
                                        <?php endif; ?>
                                      </td>
                                    </tr>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                                  <tr colspan="5">
                                      <td colspan="5"><strong>Kelompok B (Umum)</strong></td>
                                  </tr>
                                <?php
                                  $no = 1;
                                  foreach ($nilai as $row) :
                                    $nilaiTotal = round(($row->harian*0.2) + ($row->uts*0.4) + ($row->uas*0.4),0);

                                ?>  
                                  <?php if($row->kelompok == "B"): ?>
                                    <tr>
                                      <td class="text-center"><?= $no++; ?></td>
                                      <td><?= $row->nama_mapel; ?></td>
                                      <td class="text-center"><?= $nilaiTotal; ?></td>
                                      <td class="text-center">
                                        <?= $predikat; ?>
                                      </td>
                                      <td class="text-center">
                                        <?php if($user->role == 2): ?>
                                          <?= $row->deskripsi === NULL ? '<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#deskripsi'.$row->id.'"><i class="fas fa-info"></i></button>' : '<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#deskripsi'.$row->id.'"><i class="fas fa-check"></i></button>' ?>
                                        <?php else: ?>
                                          <?= $row->deskripsi ?>
                                        <?php endif; ?>
                                      </td>
                                    </tr>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                                  <tr colspan="5">
                                      <td colspan="5"><strong>Kelompok C (Peminatan)</strong></td>
                                  </tr>
                                <?php
                                  $no = 1;
                                  foreach ($nilai as $row) :
                                    $nilaiTotal = round(($row->harian*0.2) + ($row->uts*0.4) + ($row->uas*0.4),0);

                                ?>  
                                  <?php if($row->kelompok == "C"): ?>
                                    <tr>
                                      <td class="text-center"><?= $no++; ?></td>
                                      <td><?= $row->nama_mapel; ?></td>
                                      <td class="text-center"><?= $nilaiTotal; ?></td>
                                      <td class="text-center">
                                        <?= $predikat; ?>
                                      </td>
                                      <td class="text-left">
                                        <!-- Button trigger modal center->
                                        <?php if($user->role == 2): ?>
                                          <?= $row->deskripsi == null ? '<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#deskripsi'.$row->id.'"><i class="fas fa-info"></i></button>' : '<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#deskripsi'.$row->id.'"><i class="fas fa-check"></i></button>' ?>
                                        <?php else: ?>
                                          <?= $row->deskripsi ?>
                                        <?php endif; ?>
                                        
                                        
                                      </td>
                                    </tr>
                                  <?php endif; ?>
                                <?php endforeach; ?>

                              </table>
                            </div>
                            <div class="row mt-4">
                              <!-- <div class="col-lg-8">
                                <div class="section-title">Payment Method</div>
                                <p class="section-lead">The payment method that we provide is to make it easier for you to pay invoices.</p>
                                <div class="d-flex">
                                  <div class="mr-2 bg-visa" data-width="61" data-height="38"></div>
                                  <div class="mr-2 bg-jcb" data-width="61" data-height="38"></div>
                                  <div class="mr-2 bg-mastercard" data-width="61" data-height="38"></div>
                                  <div class="bg-paypal" data-width="61" data-height="38"></div>
                                </div>
                              </div> -->
                              
                              <?php 
                                $walas = $this->db->where('id', $siswa->walas)->get('auth')->row();
                              ?>
                              
                              <div class="col-lg-4 mr-5 ml-5 text-left">
                                <div class="invoice-detail-item">
                                  <div class="invoice-detail-name">Mengetahui,</div>
                                  <div class="invoice-detail-name">Kepala Sekolah</div>
                                  <br>
                                  <br>
                                  <!-- <div class="invoice-detail-value">$670.99</div> -->
                                </div>
                                <div class="invoice-detail-item">
                                  <div class="invoice-detail-name"><?= $sekolah->kepsek; ?></div>
                                  <!-- <div class="invoice-detail-value">$15</div> -->
                                </div>
                                <hr class="mt-2 mb-2">
                                <div class="invoice-detail-item">
                                  <div class="invoice-detail-name">Nip. <?= $sekolah->nip_kepsek; ?></div>
                                </div>
                              </div>
                              <div class="col-lg-1 ml-3 text-left">
                              </div>
                              <div class="col-lg-4 ml-5 text-left">
                                <div class="invoice-detail-item">
                                  <div class="invoice-detail-name">Panyabungan, <?= date('d M Y') ?></div>
                                  <div class="invoice-detail-name">Wali Kelas</div>
                                  <br>
                                  <br>
                                  <!-- <div class="invoice-detail-value">$670.99</div> -->
                                </div>
                                <div class="invoice-detail-item">
                                  <div class="invoice-detail-name"><?= $walas->nama; ?></div>
                                  <!-- <div class="invoice-detail-value">$15</div> -->
                                </div>
                                <hr class="mt-2 mb-2">
                                <div class="invoice-detail-item">
                                  <div class="invoice-detail-name">Nip. <?= $walas->nip; ?></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="text-md-right">
                        <div class="float-lg-left mb-lg-0 mb-3">
                          <!-- <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process Payment</button>
                          <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button> -->
                        </div>
                        <a class="btn btn-success btn-icon icon-left" href="<?= base_url('Pdf/rapor/'.$siswa->id) ?>"><i class="fas fa-download"></i> Print</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <?php
        
        foreach ($nilai as $row) :
      ?>
        <!-- Modal -->
        <div class="modal fade" id="deskripsi<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Deskripsi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="<?= base_url('Walas/deskripsi/'.$row->id.'/'.$row->id_siswa) ?>" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <label for="deskripsi">Deskripsi Penilaian</label>
                  <input type="text"
                      class="form-control" name="deskripsi" value="<?= $row->deskripsi; ?>" aria-describedby="helpId" maxlength="45" placeholder="Belum ada deskripsi">
                  <small id="helpId" class="form-text text-primary">Tulis Deskripsi Penilaian</small>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        
      <?php endforeach; ?>