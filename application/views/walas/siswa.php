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
            <h2 class="section-title">Daftar Siswa <?= $kelas ?></h2>
            <!-- <p class="section-lead">List jumlah <?= $title ?></p> -->

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <h4>Walas: <?= $this->session->userdata('nama'); ?></h4>
                      <!-- Button trigger modal -->
                      <div class="card-header-action">
                        <!-- <a name="" id="" class="btn btn-info" href="#" role="button"><i class="fas fa-download"></i> Download</a> -->
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-md" id="myTable">
                            <thead>
                          <tr>
                            <th>No</th>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>Terdaftar</th>
                            <th>Action</th>
                            
                          </tr>
                          </thead>
                          <tbody>
                          <?php
                              $no = 1;
                              foreach ($siswa as $row) :
                          ?> 
                            <tr>
                              <td><?= $no++; ?></td>
                            <td><?= $row->id; ?></td>
                            <td><?= $row->nama_siswa; ?></td>
                            <td><?= $row->data_created; ?></td>
                            <td>
                                <a class="btn btn-sm btn-info" href="<?= base_url('Siswa/siswaDetail/'.$row->id) ?>" role="button"><i class="fas fa-book"></i> Lihat Rapor</a>
                                <a class="btn btn-sm btn-success" href="<?= base_url('Pdf/rapor/'.$row->id) ?>" role="button"><i class="fas fa-download"></i> Print</a>
                            </td>
                            </tr>

                          <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <script>
        function findTotal(){
          var arr = document.getElementsByClassName('amount');
          var tot = 0;
          for(var i=0; i<arr.length; i++){
            if(parseFloat(arr[i].value))
              tot += parseFloat(arr[i].value);
          }
          document.getElementById('totalordercost').value = Math.round(tot/3);
        }
        
      </script>