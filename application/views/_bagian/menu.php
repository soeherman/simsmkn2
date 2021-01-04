<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
    <img src="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">SIMKu</span>
    
</a>

<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
    </div>
    </div>

    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
        <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
            Master
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="<?php echo base_url('master/guru') ?>" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Guru</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="<?php echo base_url('master/karyawan') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Karyawan</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="<?php echo base_url('master/siswa') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Siswa</p>
            </a>
            </li>
        </ul>
        </li>
        <li class="nav-item">
        <a href="<?php echo base_url('master/link') ?>" class="nav-link">
            <i class="nav-icon fas fa-link"></i>
            <p>
            Link
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="<?php echo base_url('master/tahun') ?>" class="nav-link">
            <i class="nav-icon fas fa-clock"></i>
            <p>
            Tahun ajaran
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="<?php echo base_url('master/unit') ?>" class="nav-link">
            <i class="nav-icon fas fa-university"></i>
            <p>
            Unit
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="<?php echo base_url('master/mapel') ?>" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
            Mapel
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="<?php echo base_url('master/statuspegawai') ?>" class="nav-link">
            <i class="nav-icon fas fa-id-badge"></i>
            <p>
            Status Pegawai
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="pages/widgets.html" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
            Keluar
            </p>
        </a>
        </li>
    </ul>
    </nav>
</div>