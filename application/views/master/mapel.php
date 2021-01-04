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
                    <h3 class="card-title">Daftar Mapel</h3>
                  </div>
                  <div class="col-md-6 text-right">
                <a href="<?php echo base_url('master/mapel/tambah') ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-plus"></i> Tambah mapel</a>
                  </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                          <th>Nama Mapel</th>
                          <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        if(!empty($mapel)){
                        foreach($mapel as $d){
                      ?>
                        <tr>
                          <td><?=$d->nama_mapel?></td>
                          <td>
                            <a href="" class="btn btn-outline-success btn-sm"><i class="fa fa-pencil-alt"></i></a>
                            <a onclick="deleteConfirm('<?php echo site_url('master/mapel/hapus/'.$d->id_mapel) ?>')" href="#!" class="btn btn-sm text-danger"><i class="fas fa-trash"></i> Hapus</a>
                          </td>
                        </tr>
                      <?php } }else{?>
                        <tr>
                          <td colspan="2">Data tidak ada!</td>
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
    <?php $this->load->view("_bagian/konfirmasihapus.php") ?>
  </div>
  <footer class="main-footer">
    <?php $this->load->view("_bagian/kaki.php") ?>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<?php $this->load->view("_bagian/js.php") ?>
<?php $this->load->view("_bagian/jshapus.php") ?>

</body>
</html>
