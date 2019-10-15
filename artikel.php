<style media="screen">
.tabel_artikel{
  margin-bottom: 200px;
}
table th, td{
  text-align: justify;
}
.kepala{
  text-align:center;
  font-weight: bold;
  background-color:rgb(84, 84, 84);
  color: rgb(255, 255, 255);
}
.des{
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
if( cek_status($_SESSION['user']) ) {?>


<div class="container-fluid tabel_artikel">
<table class='table table-bordered table-responsive'>
  <?php
	   // $sql = mysqli_query("SELECT id,tgl,kategori,judul,deskripsi FROM artikel");
	   // $result = mysqli_num_rows($sql);

     $query  = "SELECT * FROM artikel";
     $result = mysqli_query($link, $query);
     $hasil  = mysqli_num_rows($result);

	   if($hasil > 0)
	   {
		  echo "<tr class='kepala' rowspan=2><th>Tanggal</th><th>Kategori</th><th class='des' >Judul Artikel</th><th class='des' >Deskripsi</th><th colspan=2>Options</th></tr>";
		  while($r=mysqli_fetch_assoc($result))
		  {?>
      <?php
      echo "<tr><td>".$r['tgl']."</td><td>".$r['kategori']."</td><td>".$r['judul']."</td><td>".$r['deskripsi']."</td>
      <td><a href='edit_artikel.php?id= ".$r['id']."'>Edit</a>|
      <a href='hapus.php?id=".$r['id']."'>Hapus</a></td></tr>";
       ?>

		<?php }
		echo "</table>";
	   }else{
		echo "0 results";
		echo "<br>";
	   }
	 ?>
</div>
<?php }else{echo "<h2 class='restricted'>RESTRICTED PAGE: FOR ADMINISTRATOR ONLY</h2>"; }?>
<?php require_once "view/footer.php"; ?>
