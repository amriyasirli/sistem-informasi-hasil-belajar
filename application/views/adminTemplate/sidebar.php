<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
          <img src="<?= base_url('assets/') ?>/img/logo-smkn1.png" alt="logo" width="230" class="bg-primary rounded shadow-light p-1 mb-5 mt-2">
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url('Dashboard/') ?>">SMKN1</a>
          </div>
          <ul class="sidebar-menu">

            <?php 
              $role = $this->session->userdata('role');
            ?>
              
              <?php if($role == 1): ?>
                <li class="menu-header">Admin Panel</li>
                <li><a class="nav-link" href="<?= base_url('Dashboard') ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i><span>Master Data</span></a>
                  <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url('Siswa') ?>"><i class="far fa-square"></i> <span>Siswa</span></a></li>
                    <li><a class="nav-link" href="<?= base_url('Kelas') ?>"><i class="far fa-square"></i> <span>Kelas</span></a></li>
                    <li><a class="nav-link" href="<?= base_url('Mapel') ?>"><i class="far fa-square"></i> <span>Mata Pelajaran</span></a></li>
                    <li><a class="nav-link" href="<?= base_url('Semester') ?>"><i class="far fa-square"></i> <span>Semester</span></a></li>
                  </ul>
                </li>
                <li><a class="nav-link" href="<?= base_url('User') ?>"><i class="fas fa-user-tie"></i> <span>Pengguna</span></a></li>
                <li><a class="nav-link" href="<?= base_url('Petunjuk') ?>"><i class="fas fa-question"></i> <span>Petunjuk</span></a></li>
                
              <?php elseif($role == 2): ?>
                <li class="menu-header">Wali Kelas</li>
                <li><a class="nav-link" href="<?= base_url('Dashboard') ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li><a class="nav-link" href="<?= base_url('Walas/') ?>"><i class="fas fa-file"></i> <span>Nilai Siswa</span></a></li>
                <li><a class="nav-link" href="<?= base_url('Walas/siswaList/'.$this->session->userdata('id')) ?>"><i class="fas fa-users"></i> <span>Daftar Siswa</span></a></li>
                

              <?php elseif($role == 3): ?>
                <li class="menu-header">Guru Mapel</li>
                <li><a class="nav-link" href="<?= base_url('Dashboard') ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li><a class="nav-link" href="<?= base_url('GuruMapel') ?>"><i class="fas fa-file"></i> <span>Nilai Siswa</span></a></li>
                <li><a class="nav-link" href="<?= base_url('User/update_view/'.$this->session->userdata('id')) ?>"><i class="fas fa-user-cog"></i> <span>Ubah Profil</span></a></li>

              <?php elseif($role == 4): ?>
                <li class="menu-header">Intra</li>
                <li><a class="nav-link" href="<?= base_url('Dashboard') ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li><a class="nav-link" href="<?= base_url('Intra/nilai') ?>"><i class="fas fa-file"></i> <span>Nilai Siswa</span></a></li>

              <?php elseif($role == 5): ?>
                <li class="menu-header">Kepsek/Waka</li>
                <li><a class="nav-link" href="<?= base_url('Dashboard') ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li><a class="nav-link" href="<?= base_url('Pimpinan') ?>"><i class="fas fa-building"></i> <span>Daftar Kelas</span></a></li>
                <li><a class="nav-link" href="<?= base_url('User/update_view/'.$this->session->userdata('id')) ?>"><i class="fas fa-user-cog"></i> <span>Ubah Profil</span></a></li>

              <?php else: ?>
                <li class="menu-header">Wali Murid (Siswa)</li>
                <li><a class="nav-link" href="<?= base_url('Dashboard') ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li><a class="nav-link" href="<?= base_url('WaliMurid') ?>"><i class="fas fa-file"></i> <span>Hasil Belajar</span></a></li>
                

              <?php endif; ?>
            </ul>
        </aside>
      </div>