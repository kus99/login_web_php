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
  .isian{
    margin-left: 5%;
    position: relative;
    margin-top: 10%;
    margin-bottom: 25%;
  }
  #error{
    top: -200px;
    position: relative;
  }
</style>
<?php
  require_once "core/init.php";
  $error = '';
  if( !isset($_SESSION['user']) ){
    $_SESSION['msg'] = "<p id='error1'>Anda harus login untuk mengakses halaman ini</p>";
    header('Location: login.php');
  }
  require_once "view/header.php";
  if( cek_status($_SESSION['user']) ) {
?>
<div class="konten2 container-fluid">
  <h1 style="text-align: center; margin-bottom: 40px;">Edit User</h1>
  <?php
    $id = $_GET['id'];

    $query  = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($link, $query);
    $hasil  = mysqli_num_rows($result);

      while($hasil = mysqli_fetch_array($result))
      {?>
        <div class="isian">
          <form id="UserBaru" class="form-horizontal " action="" method="post">
              <div class="form-group">
                <label class="col-sm-2 control-label">Username :</label>
                <div class="col-sm-3">
                  <input class="form-control" type="text" name="username" value="<?php echo $hasil['username']; ?>" required>
                </div>
                <label class="col-sm-2 control-label">Nama Lengkap :</label>
                <div class="col-sm-3">
                  <input class="form-control" type="text" name="nama_lengkap" value="<?php echo $hasil['nama_lengkap']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Password :</label>
                <div class="col-sm-3">
                  <input class="form-control" type="text" name="password" value="<?php echo $hasil['password']; ?>" required>
                </div>
                <label class="col-sm-2 control-label">Email :</label>
                <div class="col-sm-3">
                  <input class="form-control" type="email" name="email" value="<?php echo $hasil['email']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Level :</label>
                <div class="col-sm-3">
                  <select class="Kategori form-control" name="level" required>
                    <option value="<?php echo $hasil['level']; ?>"><?php if($hasil['level']=='0') echo "User"; else echo "Admin" ?></option>
                  <?php if($hasil['level']=='0'){ ?>
                    <option value="1">Admin</option>
                  <?php }else{ ?>
                    <option value="0">User</option>
                  <?php } ?>
                  </select>
                </div>
                <label class="col-sm-2 control-label">Gender :</label>
                <div class="col-sm-3">
                  <select class="Kategori form-control" name="gender" required>
                    <option value="<?php echo $hasil['gender']; ?>"><?php echo $hasil['gender']; ?></option>
                  <?php if($hasil['gender'] =='perempuan') {?>
                    <option value="laki-laki">Laki-Laki</option>
                  <?php }else if($hasil['gender'] =='laki-laki'){ ?>
                    <option value="perempuan">Perempuan</option>
                  <?php }else{ ?>
                    <option value="laki-laki">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>
                  <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tgl Lahir :</label>
                <div class="col-sm-3">
                  <input class="form-control" type="date" name="tgl_lahir" value="<?php echo $hasil['tgl_lahir']; ?>">
                </div>
                <label class="col-sm-2 control-label">No Hp :</label>
                <div class="col-sm-3">
                  <input class="form-control" type="tel" name="no_hp"  value="<?php echo $hasil['no_hp']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat :</label>
                <div class="col-sm-8">
                  <textarea id="dateField" class="form-control" name="alamat" rows="3" cols="30"><?php echo $hasil['alamat']; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-9 ">
                  <input class="tombol tambah_user"  type="submit" name="nambah_user" value="Update User">
                  <input onclick="berubah3(0)" class="tombol tambah_user"  type="submit" name="cancel_user" value="Cancel">
                </div>
              </div>

          </form>
        </div>


      <?php }
      if(isset($_POST['level']))
      {
        $nama          = $_POST['username'];
        $nama_lengkap  = $_POST['nama_lengkap'];
        $email         = $_POST['email'];
        $alamat        = $_POST['alamat'];
        $gender        = $_POST['gender'];
        $tgl_lahir     = $_POST['tgl_lahir'];
        $no_hp         = $_POST['no_hp'];
        $pass          = $_POST['password'];
        $level         = $_POST['level'];

        $query  = "UPDATE user SET username='$nama',nama_lengkap='$nama_lengkap',email='$email',alamat='$alamat',gender='$gender',tgl_lahir='$tgl_lahir',no_hp='$no_hp',password='$pass',level='$level' WHERE id = '$id'";
        $result = mysqli_query($link, $query);

        if($result)
        {
          $error = "<p id='sukses1'>Data Berhasil di Update!</p>";

        }
        else{
          $error = "<p id='error1'>Data Gagal di Update!</p>";
        }
      }
      ?>
</div>
<? if($error != ''){ ?>
  <div id="error">
    <?= $error; ?>
  </div>
<? } ?>
<?php }else{echo "<h2 class='restricted'>RESTRICTED PAGE: FOR ADMINISTRATOR ONLY</h2>"; }?>
<?php require_once "view/footer.php"; ?>
