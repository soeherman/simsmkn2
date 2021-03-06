<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("_bagian/kepala.php") ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <?php $this->load->view("_bagian/navbar.php") ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php $this->load->view("_bagian/menu.php") ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <?php $this->load->view("_bagian/dir.php") ?>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                  <div class="row">
                  <div class="col-md-6">
                    <h3 class="card-title">Daftar Karyawan</h3>
                  </div>
                  <div class="col-md-6 text-right">
                    <a href="<?php echo base_url('master/karyawan/tambah') ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-plus"></i> Tambah karyawan</a>
                    <a href="<?php echo base_url('master/karyawan/form') ?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-arrow-down"></i> Import karyawan</a>
                  </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Nip</th>
                          <th>Nama</th>
                          <th>Tempat Tanggal Lahir</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        if(!empty($karyawan)){
                        foreach($karyawan as $d){
                      ?>
                        <tr>
                          <td><?=$no++?></td>
                          <td><?=$d->nip?></td>
                          <td><?=$d->nama?></td>
                          <td><?=$d->tempat_lahir?>, <?=$d->tanggal_lahir?></td>
                          <td><?=$d->status?></td>
                          <td>
                            <a href="<?php echo site_url('master/karyawan/ubah/'.$d->id_pegawai) ?>" class="btn btn-sm text-success"><i class="fa fa-pencil-alt"></i> Ubah</a>
                            <a onclick="deleteConfirm('<?php echo site_url('master/karyawan/hapus/'.$d->id_pegawai) ?>')" href="#!" class="btn btn-sm text-danger"><i class="fas fa-trash"></i> Hapus</a>
                          </td>
                        </tr>
                      <?php } }else{?>
                        <tr>
                          <td colspan="6">Data tidak ada!</td>
                        </tr>
                      <?php } ?>
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <?php $this->load->view("_bagian/konfirmasihapus.php") ?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <?php $this->load->view("_bagian/kaki.php") ?>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php $this->load->view("_bagian/js.php") ?>
<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>
</body>
</html>
