<style media="screen">
@font-face {
    font-family: font;
    src: url(../fonts/Noir_medium.otf);
}
h1{
  font-family: font !important;
  text-align: center;
  margin-top: 50px !important;
  margin-bottom: 50px !important;
}
.konten2{
  margin-top: 10%;
}
.img{
  margin-top: 30px;
}
.footer{
  margin-top: 20%;
}
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
</style>
<?php
  require_once "core/init.php";
  if( !isset($_SESSION['user']) ){
    $_SESSION['msg'] = "<p id='error1'>Anda harus login untuk mengakses halaman ini</p>";
    header('Location: login.php');
  }
  require_once "view/header.php";
?>
<h1>Halaman Profile <?php echo $_SESSION['user']; ?></h1>

<?php
// $_SESSION['id_user']           = $r['id'];
// $_SESSION['nama_lengkap_user'] = $r['nama_lengkap'];
// $_SESSION['email_user']        = $r['email'];
// $_SESSION['alamat_user']       = $r['alamat'];
// $_SESSION['gender_user']       = $r['gender'];
// $_SESSION['tgl_lahir_user']    = $r['tgl_lahir'];
// $_SESSION['no_hp_user']        = $r['no_hp'];
// $_SESSION['password_user']     = $r['password'];
$error = '';
 ?>
 <?php
   $id     = $_SESSION['id_user'];
   $query  = "SELECT * FROM user WHERE id = $id";
   $result = mysqli_query($link, $query);
   $hasil  = mysqli_num_rows($result);

   while($hasil = mysqli_fetch_assoc($result))
   {?>
      <div class="konten2 container">
        <div class="row">
          <div class="proses ">
            <form class="col-md-3">
              <a href="#" class="thumbnail img">
                <img class="" src="logo/avatar.png" alt="...">
              </a>
            </form>
            <form class="form-horizontal col-md-9" action="edit_profile.php" method="post">
                <div class="isian">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $hasil['nama_lengkap'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Username :</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="username" value="<?php echo $hasil['username'] ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Gender :</label>
                    <div class="col-sm-10">
                      <select class="Kategori form-control" name="gender">
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
                    <div class="col-sm-10">
                      <input class="form-control" type="date" name="tgl_lahir" value="<?php echo $hasil['tgl_lahir'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">No Hp :</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="tel" name="no_hp" value="<?php echo $hasil['no_hp'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputemail3" class="col-sm-2 control-label">Email :</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" id="inputemail3" value="<?php echo $hasil['email'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Password :</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="password" value="<?php echo $hasil['password'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat :</label>
                    <div class="col-sm-10">
                      <textarea id="dateField" class="form-control" name="alamat" rows="8" cols="80"><?php echo $hasil['alamat'] ?></textarea>
                    </div>
                  </div>
                  <div class="form-group tombol_proses">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input id="tombol" class="tombol"  type="submit" name="submit" value="Simpan Perubahan">
                      <input id="tombo2" class="tombol"  type="reset" name="hapus" value="Cancel">
                    </div>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
<?php } ?>
 <? if($error != ''){ ?>
   <div id="error">
     <?= $error; ?>
   </div>
 <? } ?>
<div class="footer">
  <?php require_once "view/footer.php"; ?>
</div>
