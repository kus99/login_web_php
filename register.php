<?php
require_once "core/init.php";

$error = '';

//redirect kalau user sudah login
if( isset($_SESSION['user']) ) header('Location: index.php');

//validasi register
if( isset($_POST['submit']) ){
  $nama          = $_POST['username'];
  $nama_lengkap  = $_POST['nama_lengkap'];
  $email         = $_POST['email'];
  $pass          = $_POST['password'];


  if(!empty(trim($nama)) && !empty(trim($pass)) ){

    if( cek_nama($nama) == 0 ){
      //memasukkan ke database
      if(register_users($nama, $nama_lengkap, $email, $pass)) $error = "<p id='sukses1'>Daftar Berhasil, Silahkan Login!</p>";
      else $error = "<p id='error1'>Gagal Daftar!</p>";

    }else $error =  "<p id='error1'>Username atau password Sudah terdaftar di database!</p>";

  }else $error =  "<p id='error1'>Username atau password tidak boleh kosong!</p>";
}


require_once "view/header.php";
?>
<style media="screen">
#greet{
  height: 100%;
  width: 100%;
  margin-bottom: 5%;
  padding-top: 100px;
}
body{
  background-image: url(login1.jpg);
  background-size: cover;
}
h2{
  text-align: center;
  margin: 0;
  padding: 0 0 20px;
  color: rgb(75, 164, 255) !important;
}
.login{
  font-family: font;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -30%);
  width: 400px;
  height: 580px;
  padding: 50px 30px;
  box-sizing: border-box;
  background: rgba(0, 0, 0, 0.5)
  /* padding: 100px 100px 100px 100px; */
}
.login label{
  margin: 0;
  padding: 0;
  color: rgb(255, 255, 255);
}
.login input{
  width: 100%;
  margin-bottom: 20px;
}
.login input[type="text"], input[type="password"], input[type="email"]{
  border: none;
  border-bottom: 1px solid rgb(255, 255, 255);
  background: transparent;
  outline: none;
  height: 40px;
  color: rgb(255, 255, 255);
  cursor: pointer;
}
.login input[type="submit"]{
  border: none;
  outline: none;
  height: 40px;
  color: rgb(255, 255, 255);
  font-size: 16px;
  background: rgb(33, 106, 203);
  /* cursor: pointer; */
  border-radius: 20px;
  margin-bottom: 20px;
}
.login input[type="submit"]:hover{
  color: rgb(0, 0, 0);
  background: rgb(255, 255, 255);
  transition: background 0.7s, color 0.7s;
}
.login a{
  text-decoration: none;
  color: rgb(255, 255, 255);
}
.login a:hover{
  color: rgb(33, 106, 203);
}
</style>

<div id="greet">
  <div class="konten container">
    <div class="login">
      <h2>Daftar Baru</h2>
      <form class="form-log" action="" method="post">
        <label>Username</label>
        <input type="text" name="username">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap">
        <label>Email</label>
        <input type="email" name="email">
        <label>Password</label>
        <input type="password" name="password">
        <input type="submit" name="submit" value="Daftar">
        <? if($error != ''){ ?>
          <div id="error">
            <?= $error; ?>
          </div>
        <? } ?>
      </form>
    </div>
  </div>
</div>
<?php require_once "view/footer.php"; ?>
