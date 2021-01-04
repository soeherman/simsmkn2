<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$nik = "";
$nis = "";
$nisn = "";
$nama = "";
$jk = "";
$agama = "";
$tempat = "";
$tgl = "";
$tlp = "";
$email = "";
$asal = "";
$alamat = "";
$idsiswa = "";
if(isset($siswa)){
    $nik = $siswa->nik;
    $nis = $siswa->nis;
    $nisn = $siswa->nisn;
    $nama = $siswa->nama;
    $jk = $siswa->jenis_kelamin;
    $agama = $siswa->agama;
    $tempat = $siswa->tempat_lahir;
    $tgl = $siswa->tanggal_lahir;
    $tlp = $siswa->no_hp;
    $email = $siswa->email;
    $asal = $siswa->asal_sekolah;
    $alamat = $siswa->alamat;
    $idsiswa = $siswa->id_siswa;
}
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
                        <h3 class="card-title">Data Pribadi</h3>
                    </div>
                    <form method="post" action="<?php echo base_url('master/siswa/simpan')?>">
                    <input type="hidden" name="idsiswa" value="<?=$idsiswa?>">
                        <div class="card-body">  
                            <div class="form-group">
                                <label>NIK</label>
                                <input name="nik" value="<?=$nik?>" type="text" class="form-control" placeholder="Masukkan NIK">
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input name="nis" value="<?=$nis?>" type="text" class="form-control" placeholder="Masukkan Nis">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NISN</label>
                                        <input name="nisn" value="<?=$nisn?>" type="text" class="form-control" placeholder="Masukkan NISN">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input name="nama" value="<?=$nama?>" type="text" class="form-control" placeholder="Masukkan nama">
                            </div>

                            <div class="form-row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Kelamin</label>
                                        <select name="jk" id="" class="form-control">
                                            <option value="L" <?php if($jk =='L') echo 'selected="selected"';?>>L</option>
                                            <option value="P" <?php if($jk =='P') echo 'selected="selected"';?>>P</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <select name="agama" id="" class="form-control">
                                            <option>Pilih Agama</option>
                                            <option value="Islam" <?php if($agama =='Islam') echo 'selected="selected"';?>>Islam</option>
                                            <option value="Protestan" <?php if($agama =='Protestan') echo 'selected="selected"';?>>Protestan</option>
                                            <option value="Katolik" <?php if($agama =='Katolik') echo 'selected="selected"';?>>Katolik</option>
                                            <option value="Hindu" <?php if($agama =='Hindu') echo 'selected="selected"';?>>Hindu</option>
                                            <option value="Budha" <?php if($agama =='Budha') echo 'selected="selected"';?>>Budha</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input value="<?=$tempat?>" name="tempat" type="text" class="form-control" placeholder="Contoh : Probolinggo">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input value="<?=$tgl?>" name="tgl" type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>No. Telepon</label>
                                <input value="<?=$tlp?>" name="tlp" type="text" class="form-control" placeholder="Masukkan No Telepon">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input value="<?=$email?>" name="email" type="text" class="form-control" placeholder="Masukkan Email">
                            </div>
                            <div class="form-group">
                                <label>Asal Sekolah</label>
                                <input value="<?=$asal?>" name="asal" type="text" class="form-control" placeholder="Masukkan Asal Sekolah">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" id="" rows="5" class="form-control" placeholder="Masukkan Alamat"><?=$alamat?></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
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
