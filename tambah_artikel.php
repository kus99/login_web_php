<?php
  require_once "core/init.php";
  $error1 = '';
  if( !isset($_SESSION['user']) ){
    $_SESSION['msg'] = "<p id='error1'>Anda harus login untuk mengakses halaman ini</p>";
    header('Location: login.php');
  }
  require_once "view/header.php";
 if( cek_status($_SESSION['user']) ) {?>
<style media="screen">
  .input_artikel{
    margin-top: 100px;
    margin-bottom: 25%;
  }
  h2{
    text-align: center;
    margin-bottom: 100px;
  }
  #error{
    /* margin-top: -500px; */

  }
</style>

<?php
if(isset($_POST['submit']))
{
  global $link;
	$judul    = $_POST['judul'];
	$tgl      = $_POST['tgl'];
  $kategori = $_POST['kategori'];
	$isi      = $_POST['isi'];

  $query  = "INSERT INTO artikel(judul,tgl,kategori,deskripsi) VALUES ('$judul','$tgl','$kategori','$isi')";
	if(mysqli_query($link, $query))
	{

    $error1 =  "<p id='sukses1' >Artikel Baru Berhasil ditambah!</p>";
    // echo "<script>alert('sukses menyimpan!');</script>";
	}
	else{
		$error1 =  "<p id='error1' >Gagal Menambahkan Artikel Baru!</p>";
    // echo "<script>alert('Gagal menyimpan!');</script>";
	}


}
?>

<div class="input_artikel container">
  <h2>Input Artikel Baru</h2>
  <?php if($error1 != ''){ ?>
   <div id="error">
     <?= $error1; ?>
   </div>
  <?php }?>
<table class='table table-bordered table-responsive'>
  <form action="" method="POST" class="form-group row">
		<tr>
          <td>
            <label>Judul Artikel</label>
            <input type="text" name="judul" class="form-control" placeholder="Judul Artikel" required>
          </td>
		</tr>
		<tr>
          <td>
            <label>Tanggal Artikel</label>
            <input name="tgl" type="date"  class="form-control" required>
          </td>
		</tr>
    <tr>
          <td>
            <label>Kategori Artikel</label>
            <select class="form-control" name="kategori" required>
              <option value="">KATEGORI</option>
              <option value="NEWS">NEWS</option>
              <option value="POLITIK">POLITIK</option>
              <option value="BISNIS">BISNIS</option>
              <option value="OLAHRAGA">OLAHRAGA</option>
              <option value="OTOMOTIF">OTOMOTIF</option>
              <option value="TEKNOLOGI">TEKNOLOGI</option>
              <option value="HIBURAN">HIBURAN</option>
              <option value="CUACA">CUACA</option>
            </select>
          </td>
		</tr>
		<tr>
          <td>
            <label>Deskripsi</label>
            <textarea name="isi" class="form-control" rows="8" cols="80" placeholder="Deskripsi..." required></textarea>
          </td>
		</tr>
          <tr>
            <td>
              <input type="submit" name="submit" value="SIMPAN" class="btn btn-success">
              <input type="reset" value="RESET" class="btn btn-warning">
            </td>
          </tr>
  </form>
</table>
</div>

<?php }else{echo "<h2 class='restricted'>RESTRICTED PAGE: FOR ADMINISTRATOR ONLY</h2>"; }?>
<?php require_once "view/footer.php"; ?>
