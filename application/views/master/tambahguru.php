<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    $idpeg = "";
    $nik = "";
    $nama = "";
    $nip = "";
    $jk = "";
    $agama = "";
    $tempat = "";
    $tgl = "";
    $tlp = "";
    $email = "";
    $alamat = "";
    $nuptk = "";
    $npwp = "";
    $sts = "";
    $kepegawaian = "";
    $tmt = "";
if(isset($guru)){
    $idpeg = $guru->id_pegawai;
    $nik = $guru->nik;
    $nama = $guru->nama;
    $nip = $guru->nip;
    $jk = $guru->jenis_kelamin;
    $agama = $guru->agama;
    $tempat = $guru->tempat_lahir;
    $tgl = $guru->tanggal_lahir;
    $tlp = $guru->no_hp;
    $email = $guru->email;
    $alamat = $guru->alamat;
    $nuptk = $guru->nuptk;
    $npwp = $guru->npwp;
    $sts = $guru->status;
    $kepegawaian = $guru->id_status_pegawai;
    $tmt = $guru->tmt;
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
        <form method="post" action="<?php echo base_url('master/guru/simpan')?>">
            <input type="hidden" name="idpegawai" value="<?=$idpeg?>">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Pribadi</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        
                            <div class="card-body">  
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nik</label>
                                            <input value="<?=$nik?>" type="text" name="nik" class="form-control" placeholder="Masukkan NIK">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nip</label>
                                            <input value="<?=$nip?>" type="text" name="nip" class="form-control" placeholder="Masukkan NIP">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input value="<?=$nama?>" type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
                                </div>

                                <div class="form-row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Kelamin</label>
                                            <select name="kelamin" id="" class="form-control">
                                                <option value="L" <?php if($jk =='L') echo 'selected="selected"';?> >L</option>
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
                                            <input value="<?=$tgl?>" name="tanggal" type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>No. Telepon</label>
                                    <input value="<?=$tlp?>" name="tlp" type="text" class="form-control" placeholder="Masukkan No Telepon">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input value="<?=$email?>" name="email" type="mail" class="form-control" placeholder="Masukkan Email">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" id="" rows="5" class="form-control" placeholder="Masukkan Alamat"><?=$alamat?></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kepegawaian</h3>
                        </div>
                            <div class="card-body">  
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>NUPTK</label>
                                            <input value="<?=$nuptk?>" name="nuptk" type="text" class="form-control" placeholder="NUPTK">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>NPWP</label>
                                            <input value="<?=$npwp?>" name="npwp" type="text" class="form-control" placeholder="NPWP">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="statusaktif" id="" class="form-control">
                                                <option value="Aktif" <?php if($sts =='Aktif') echo 'selected="selected"';?>>Aktif</option>
                                                <option value="Nonaktif" <?php if($sts =='Nonaktif') echo 'selected="selected"';?>>Non Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Kepegawaian</label>
                                            <select name="statuspegawai" id="" class="form-control">
                                                <?php
                                                    foreach($status as $s){
                                                ?>
                                                <option value="<?=$s->id_status_pegawai?>" <?php if($kepegawaian == $s->id_status_pegawai) echo 'selected="selected"';?>><?=$s->nama_status?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>TMT</label>
                                            <input value="<?=$tmt?>" name="tmt" type="text" class="form-control" placeholder="Probolinggo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                    </div>
                </div>
            </div>
        </form>
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
