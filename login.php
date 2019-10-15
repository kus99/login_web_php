<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<style media="screen">
  @font-face {
      font-family: font;
      src: url(fonts/Noir_medium.otf);
  }
  *{
    font-family: font;
  }
  body{
    background-image: url(login1.jpg);
    background-size: cover;
  }
  #greet{
    height: 100%;
    width: 100%;
    margin-bottom: 5%;
    padding-top: 100px;
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
    top: 60%;
    left: 50%;
    transform: translate(-50%, -60%);
    width: 350px;
    height: 450px;
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
  .login input[type="text"], input[type="password"]{
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
<script src="assets/js/bootstrap.min.js"></script>
<?php
require_once "core/init.php";

$error = '';

//redirect kalau user sudah login
if( isset($_SESSION['user']) ) header('Location: index.php');

//validasi register
if( isset($_POST['submit']) ){
  $nama = $_POST['username'];
  $pass = $_POST['password'];

  if(!empty(trim($nama)) && !empty(trim($pass)) ){

    if(cek_nama($nama) != 0 ){
      if( cek_data($nama, $pass)){
        redirect_login($nama);
      }else{
        $error = "<p id='error1'>Username atau password salah!</p>";
      }
    } else $error = "<p id='error1'>Username atau password belum terdaftar di database!</p>";
  }else $error = "<p id='error1'>Username atau password tidak boleh kosong!</p>";
}


require_once "view/header.php";


//meguji pesan session
if(isset($_SESSION['msg'])){
  flash_delete($_SESSION['msg']);
}

?>

<!-- <div class="container">
  <h2>Halaman Login</h2>
<table class='table table-bordered table-responsive'>
  <form action="" method="POST" class="form-group row">
		<tr>
      <td>
        <label class="control-label">Username :</label>
        <input type="text" name="username" class="form-control" placeholder="Username" required>
      </td>
		</tr>
		<tr>
      <td>
        <label class="control-label">Password :</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
      </td>
		</tr>
      <tr>
        <td>
          <input type="submit" name="submit" value="LOGIN" class="btn btn-success">
          <input type="reset" value="RESET" class="btn btn-warning">
        </td>
      </tr>
  </form>
</table>
</div> -->
<div id="greet">
  <div class="konten container">
    <div class="login">
      <h2>Selamat Datang</h2>
      <form class="form-log" action="" method="post">
        <label>Username</label>
        <input type="text" id="username" name="username">
        <label>Password</label>
        <input type="password" id="password" name="password">
        <input type="submit" name="submit" value="Login">
        <a href="register.php">Daftar Akun</a>
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
