<style media="screen">
.tombol{
  clear: both;
  text-decoration: none;
  color: rgb(70, 70, 70);
  padding: 10px 30px 10px 30px;
  background-color: rgb(255, 255, 255);
  border: 1px solid rgba(0, 71, 255, 0.5);
  border-radius: 5px;
  transition: background 0.3s, color 0.3s, box-shadow 0.3s;
}
.tombol:hover{
  text-decoration: none;
  color: rgb(255, 255, 255);
  background-color: rgb(33, 106, 203);
  box-shadow: 0 4px 4px 1px grey;
}
table{
  text-align: center !important;
}
table a{
  clear: both;
  text-decoration: none;
  color: rgb(70, 70, 70);
  padding: 5px 10px 5px 10px;
  background-color: rgb(255, 255, 255);
  border: 1px solid rgba(0, 71, 255, 0.5);
  border-radius: 5px;
  transition: background 0.3s, color 0.3s, box-shadow 0.3s;
}
table a:hover{
  text-decoration: none;
  color: rgb(255, 255, 255);
  background-color: rgb(33, 106, 203);
  box-shadow: 0 4px 4px 1px grey;
}
#tambah{
  margin-bottom: 20px;
}
#UserBaru{
  display: none;
  opacity: 0;
  transition: background 0.9s, visibility 0s, opacity 0.9s linear;
}
.daftar_user{
  margin-bottom: 20px;
}
.isian{
  margin-bottom: 20%;
}
#error1{
  background-color: rgb(212, 19, 65);
  color:white;
  padding: 5px;
  text-align: center;
}
#sukses1{
  background-color: rgb(19, 212, 50);
  color:white;
  padding: 5px;
  text-align: center;
}
h2{
  text-align: center;
  margin-top: 0 !important;
  margin-bottom: 20px !important;
}
</style>
<?php
  require_once "core/init.php";
  $error = '';
  $error1 = '';
  if( !isset($_SESSION['user']) ){
    $_SESSION['msg'] = "<p id='error1'>Anda harus login untuk mengakses halaman ini</p>";
    header('Location: login.php');
  }
  require_once "view/header.php";
if( cek_status($_SESSION['user']) ) {?>
  <?php
  if( isset($_POST['nambah_user']) ){
    $nama          = $_POST['username_input'];
    $nama_lengkap  = $_POST['nama_lengkap_input'];
    $email         = $_POST['email_input'];
    $alamat        = $_POST['alamat'];
    $gender        = $_POST['gender'];
    $tgl_lahir     = $_POST['tgl_lahir'];
    $no_hp         = $_POST['no_hp'];
    $pass          = $_POST['password_input'];
    $level         = $_POST['level'];




    if(!empty(trim($nama)) && !empty(trim($pass)) ){

      if( cek_nama($nama) == 0 ){
        if(register_user($nama, $nama_lengkap, $email, $alamat, $gender, $tgl_lahir, $no_hp, $pass, $level)) {
          $error =  "<p id='sukses1'>Username dan password berhasil ditambah!</p>";
        }else {
          $error =  "<p id='error1'>Gagal daftar</p>";
        }
      }else $error =  "<p id='error1'>Username sudah ada, tidak bisa daftar</p>";

    }else $error =   "<p id='error1'>Username atau password tidak boleh kosong</p>";
  }
  if(isset($_GET['id'])){

    $id = $_GET['id'];
    $query  = "DELETE FROM user WHERE id='$id'";
    $result = mysqli_query($link, $query);
    if($result)
    {
      $error1 =  "<p id='sukses1' >Username dan password berhasil dihapus!</p>";
    }else {
      $error1 =  "<p id='error1' >Username dan password gagal dihapus!</p>";
    }
  }
  ?>
<div class="daftar_user col-md-12">
  <h3 style="text-align: center; font-weight: bold; margin-top: 50px; margin-bottom: 80px;">Daftar User</h3>
  <input onclick="berubah3(1)" id="tambah" class="tombol"  type="submit" value="Tambah User">
  <div id="konten" class="menambahkan_user">
    <form id="UserBaru" class="form-horizontal " action="" method="post">
        <h2>Mendaftar User Baru</h2>
        <div class="form-group">
          <label class="col-sm-2 control-label">Username :</label>
          <div class="col-sm-3">
            <input class="form-control" type="text" name="username_input" placeholder="Username" required>
          </div>
          <label class="col-sm-2 control-label">Nama Lengkap :</label>
          <div class="col-sm-3">
            <input class="form-control" type="text" name="nama_lengkap_input" placeholder="Nama Lengkap" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Password :</label>
          <div class="col-sm-3">
            <input class="form-control" type="password" name="password_input" placeholder="Password" required>
          </div>
          <label class="col-sm-2 control-label">Email :</label>
          <div class="col-sm-3">
            <input class="form-control" type="email" name="email_input" placeholder="Email" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Level :</label>
          <div class="col-sm-3">
            <select class="Kategori form-control" name="level" required>
              <option value="">Level</option>
              <option value="1">Admin</option>
              <option value="0">User</option>
            </select>
          </div>
          <label class="col-sm-2 control-label">Gender :</label>
          <div class="col-sm-3">
            <select class="Kategori form-control" name="gender" required>
              <option value="">Jenis Kelamin</option>
              <option value="laki-laki">Laki-Laki</option>
              <option value="perempuan">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Tgl Lahir :</label>
          <div class="col-sm-3">
            <input class="form-control" type="date" name="tgl_lahir">
          </div>
          <label class="col-sm-2 control-label">No Hp :</label>
          <div class="col-sm-3">
            <input class="form-control" type="tel" name="no_hp"  placeholder="No Handphone">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Alamat :</label>
          <div class="col-sm-8">
            <textarea id="dateField" class="form-control" name="alamat" rows="3" cols="30" placeholder="Alamat"></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10 ">
            <input class="tombol tambah_user"  type="submit" name="nambah_user" value="Tambah User">
            <input onclick="berubah3(0)" class="tombol tambah_user"  type="submit" name="cancel_user" value="Cancel">
          </div>
        </div>

    </form>
  </div>
  <? if($error != ''){ ?>
    <div id="error">
      <?= $error; ?>
    </div>
  <? } ?>
</div>
<div class="isian">
    <form class="" action="" method="post">
    <table class='table table-bordered table-hover table-responsive'>
      <caption style="margin-left: 20px; font-size: 12px; text-decoration: underline;">Info : Level " 1 " berarti Admin sedangkan " 0 " berarti User biasa</caption>
    <?php
        $query  = "SELECT * FROM user";
   			$result = mysqli_query($link, $query);
   			$hasil  = mysqli_num_rows($result);
       if($hasil > 0){
    		echo "<tr style='font-weight: bold; font-size: 18px; background-color:rgb(84, 84, 84); color: rgb(255, 255, 255);' rowspan=2><td>Username</td><td>Nama Lengkap</td><td>Email</td><td>Alamat</td><td>Jenis Kelamin</td><td>Tanggal Lahir</td><td>Password</td><td>Level</td><td colspan=2>Options</td></tr>";
    		while($r = mysqli_fetch_assoc($result))
    		{
    		  echo "<tr><td>".$r['username']."</td><td>".$r['nama_lengkap']."</td><td>".$r['email']."</td><td>".$r['alamat']."</td><td>".$r['gender']."</td><td>".$r['tgl_lahir']."</td><td>".$r['password']."</td><td>".$r['level']."</td><td><a href='edit_user.php?id=" . $r['id']. "'>Edit</a> <a  href='data_user.php?id=" . $r['id']. "'>Hapus</a></td></tr>";
    		}
    		  echo "</table>";
    	  }else{
      		echo "0 results";
      		echo "<br>";
    	  }?>
    </form>
    <?php
    if($error1 != ''){ ?>
      <div id="error">
        <?= $error1; ?>
      </div>
    <?php } ?>
</div>

<script type="text/javascript">
  function berubah3(param){
    var user   = document.getElementById('tambah');
    var konten = document.getElementById('konten');
    if(param==1){
      document.getElementById("UserBaru").style.display = 'inline';
      document.getElementById("UserBaru").style.opacity = 1;
      konten.style.backgroundColor = 'rgb(47, 184, 221)';
      konten.style.padding = '25px 20px 5px 0';
    }else{
      document.getElementById("UserBaru").style.display = 'none';
      document.getElementById("UserBaru").style.opacity = 0;
      konten.style.padding = '0';
    }
  }
</script>
<?php }else{echo "<h2 class='restricted'>RESTRICTED PAGE: FOR ADMINISTRATOR ONLY  </h2>"; }?>
<?php require_once "view/footer.php"; ?>
