<style media="screen">
  table td:first-child{
    max-width: 60px;
  }
  table td:last-child{
    max-width: 500px;
  }
  table{
    margin-top: 50px;
  }
  #error{
    top: -20px;
    position: relative;
  }
  h2{
    text-align: center;
  }
</style>
<?php
require_once "core/init.php";
if( !isset($_SESSION['user']) ){
  $_SESSION['msg'] = "<p id='error1'>Anda harus login untuk mengakses halaman ini</p>";
  header('Location: login.php');
}
require_once "view/header.php";
$error = '';
if( cek_status($_SESSION['user']) ) {
$id = $_GET['id'];

// $sql = mysqli_query("SELECT * FROM artikel WHERE id=$id");

$query  = "SELECT * FROM artikel WHERE id=$id";
$result = mysqli_query($link, $query);
$hasil  = mysqli_num_rows($result);


while($data=mysqli_fetch_array($result))
{?>

  <div class="container container-fluid">
    <h2>Edit Artikel Berjudul : <?php echo $data['judul'] ?> </h2>
    <form action="" method="POST" class="form-group row">
  		<table class='table table-responsive'>
  			<tr>
  				<td>Tanggal :</td>
  				<td>
  					<input type="date" name="tgl" value="<?php echo $data['tgl'] ?>" class="form-control">
  				</td>
  			</tr>
        <tr>
              <td>Kategori :</td>
              <td>
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
  				<td>Judul Artikel :</td>
  				<td><input type="text" name="judul" value="<?php echo $data['judul'] ?>" class="form-control"></td>
  			</tr>
  			<tr>
  				<td>Deskripsi :</td>
  				<td><textarea style="max-width: 100%;" name="isi"  class="form-control" rows="10" cols="100"><?php echo $data['deskripsi']; ?></textarea></td>
  			</tr>
  			 <tr>
  			 <td></td>
              <td>
                <input type="submit" name="simpan" value="SIMPAN" class="btn btn-success">
                <input type="reset" value="RESET" class="btn btn-warning">
              </td>
            </tr>
  		</table>
  	</form>
  </div>

<?php
	}
		if(isset($_POST['tgl']))
		{
			$judul    = $_POST['judul'];
			$tgl      = $_POST['tgl'];
			$isi      = $_POST['isi'];
      $kategori = $_POST['kategori'];

			// $update = mysql_query("UPDATE artikel SET tgl='$tgl', kategori='$kategori', judul='$judul', deskripsi='$isi' WHERE id='$id'");

			$query  = "UPDATE artikel SET tgl='$tgl', kategori='$kategori', judul='$judul', deskripsi='$isi' WHERE id='$id'";
			$result = mysqli_query($link, $query);

    	if($result)
    	{
    		$error = "<p id='sukses1'>Artikel Barhasil di Edit!</p>";
    	}
    	else{
    		$error = "<p id='error1'>Artikel Gagal di Edit!</p>";
    	}

	}
   if($error != ''){ ?>
    <div id="error">
      <?= $error; ?>
    </div>
<?php }
}else{echo "<h2 class='restricted'>RESTRICTED PAGE: FOR ADMINISTRATOR ONLY</h2>"; }?>
<?php require_once "view/footer.php"; ?>
