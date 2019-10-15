<?php
require_once "core/init.php";
if(isset($_POST['submit']))
{
  $error = '';
  $nama_lengkap = $_POST['nama_lengkap'];
  $username     = $_POST['username'];
  $alamat       = $_POST['alamat'];
  $gender       = $_POST['gender'];
  $tgl_lahir    = $_POST['tgl_lahir'];
  $no_hp        = $_POST['no_hp'];
  $email        = $_POST['email'];
  $password     = $_POST['password'];

  $id           = $_SESSION['id_user'];

  $query  = "UPDATE user SET username='$username',nama_lengkap='$nama_lengkap',email='$email',alamat='$alamat',gender='$gender',tgl_lahir='$tgl_lahir',no_hp='$no_hp',password='$password' WHERE id = '$id'";
  $result = mysqli_query($link, $query);

  if($result)
  {
    $error = "<p id='sukses1'>Data Berhasil di Update!</p>";
    header('Location:profile.php');
  }
  else{
    $error = "<p id='error1'>Data Gagal di Update!</p>";
  }
}

 ?>
 <? if($error != ''){ ?>
   <div id="error">
     <?= $error; ?>
   </div>
 <? } ?>
