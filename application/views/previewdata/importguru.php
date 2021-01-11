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
                        <h3 class="card-title">Preview data</h3>
                    </div>
                    <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th style="width: 10px">#</th>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Tempat Tanggal Lahir</th>
                            <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $numrow = 1;
                                $kosong = 0;
                                foreach($sheet as $row){ 
                                    $nis = $row['A']; // Ambil data NIS
                                    $nama = $row['B']; // Ambil data nama
                                    $jenis_kelamin = $row['C']; // Ambil data jenis kelamin
                                    $alamat = $row['D'];
                                    if($nis == "" && $nama == "" && $jenis_kelamin == "" && $alamat == "")
                                    continue;
                                    if($numrow > 1){
                            ?>
                            <tr>
                            <td><?=$nis?></td>
                            <td><?=$nama?></td>
                            <td><?=$jenis_kelamin?></td>
                            <td><?=$alamat?></td>
                            <td><?=$nis?></td>
                            </tr>
                            <?php  } $numrow++;} ?>
                        </tbody>
                    </table>
                    <form action="<?php echo base_url('master/guru/import') ?>" method="post">
                        <input type="submit" value="Simpan" class="btn btn-block btn-primary">
                    </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
    
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
</body>
</html>
