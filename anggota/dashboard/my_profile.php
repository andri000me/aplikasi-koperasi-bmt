<?php
$id_anggota = $_SESSION['id_anggota'];
$sql=mysqli_query($con,"select * from anggota where id_anggota = '$id_anggota'") or die (mysqli_error($con));
$data=mysqli_fetch_array($sql);
?>
<h3><i class="fa fa-angle-right"></i> Edit Profile Saya</h3>
<!-- BASIC FORM ELELEMNTS -->
	<div class="row mt">
		<div class="col-lg-12">
        <div class="form-panel">
        	  <h4 class="mb"><i class="fa fa-angle-right"></i> Profile Saya</h4>
            <form class="form-horizontal style-form" method="post" enctype="multipart/form-data">
              <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">No. Anggota</label>
                    <div class="col-sm-10">                     
                        <input type="text" name="id_anggota" class="form-control" value="<?php echo $data['id_anggota'] ?>" readonly>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tgl Daftar</label>
                    <div class="col-sm-10">                     
                        <input type="text" name="id_anggota" class="form-control" value="<?php echo date('d M y',strtotime($data['tgl_daftar'])) ?>" readonly>
                    </div>
                </div>                 
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="text" name="nik" maxlength="16" minlength="16" class="form-control" value="<?php echo $data['nik'] ?>" required>
                    </div>
                </div>  
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $data['nama_lengkap'] ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nama Panggilan</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_panggilan" class="form-control" value="<?php echo $data['nama_panggilan'] ?>" required>
                    </div>
                </div>  
                 <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email_anggota" class="form-control" value="<?php echo $data['email_anggota'] ?>"><small class="text-danger">*mengubah email tidak mengubah username</small>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" value="<?php echo $data['username'] ?>" class="form-control" readonly><small class="text-danger">*Username tak dapat diubah</small>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="pass_anggota" class="form-control"><small class="text-info">*Isi jika ingin mengubah password</small>
                    </div>
                </div>
<div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Telp. Rumah</label>
                    <div class="col-sm-10">
                        <input type="text" name="telp_rumah" class="form-control" value="<?php echo $data['telp_rumah'] ?>">
                    </div>
                </div>             
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">No. Hp</label>
                    <div class="col-sm-10">
                        <input type="text" name="no_hp" class="form-control" value="<?php echo $data['no_hp'] ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea name="alamat" class="form-control"><?php echo $data['alamat'] ?></textarea>
                    </div>
                </div>             
                <div class="form-group" style="margin-left: 5px"> 
                   <button type="submit" class="btn btn-primary" name="simpan">Update</button>
                   <a href="?page=konfigurasi" class="btn btn-warning">Kembali</a>
                </div>
            </form>
        </div>
		</div><!-- col-lg-12-->      	
	</div><!-- /row -->
</div>
<?php
  if (isset($_POST['simpan'])) {
  
  $id_anggota=$_SESSION['id_anggota'];    
  $nik=mysqli_real_escape_string($con,@$_POST['nik']);
  $nama_lengkap=mysqli_real_escape_string($con,@$_POST['nama_lengkap']);
  $email_anggota=mysqli_real_escape_string($con,@$_POST['email_anggota']);
  $nama_panggilan=mysqli_real_escape_string($con,@$_POST['nama_panggilan']);  
  $jenis_kelamin=mysqli_real_escape_string($con,@$_POST['jenis_kelamin']);
  $telp_rumah=mysqli_real_escape_string($con,@$_POST['telp_rumah']);
  $no_hp=mysqli_real_escape_string($con,@$_POST['no_hp']);
  $pass_anggota=mysqli_real_escape_string($con,@$_POST['pass_anggota']);
  $pass=md5($pass_anggota);
  $alamat=mysqli_real_escape_string($con,@$_POST['alamat']);

  if($pass_anggota != ""){
    mysqli_query($con, "UPDATE anggota set nik='$nik', nama_lengkap='$nama_lengkap', email_anggota='$email_anggota', nama_panggilan='$nama_panggilan', jenis_kelamin='$jenis_kelamin', telp_rumah='$telp_rumah', no_hp='$no_hp', pass_anggota='$pass', alamat='$alamat' WHERE id_anggota='$id_anggota' ") or die (mysqli_error($con));    
  } else {
    mysqli_query($con, "UPDATE anggota set nik='$nik', nama_lengkap='$nama_lengkap', email_anggota='$email_anggota', nama_panggilan='$nama_panggilan', jenis_kelamin='$jenis_kelamin', telp_rumah='$telp_rumah', no_hp='$no_hp', alamat='$alamat', pekerjaan='$pekerjaan' WHERE id_anggota='$id_anggota' ") or die (mysqli_error($con));
  }
  echo "<script>window.location.href='?page=my_profile';</script>";
    
}
?>