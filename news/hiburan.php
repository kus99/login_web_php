<?php
require_once "../core/init2.php";
if( !isset($_SESSION['user']) ){
  $_SESSION['msg'] = "<p id='error1'>Anda harus login untuk mengakses halaman ini</p>";
  header('Location: ../login.php');
}
require_once "view/header.php";
$error1 = '';
?>
<style media="screen">
  @font-face {
      font-family: font;
      src: url(../fonts/Noir_medium.otf);
  }
  *{
    font-family: font;
  }
  table{
    margin-top: 50px;
    text-align: justify;
    background-color: rgb(255, 255, 255);
    color: rgb(0, 0, 0);
  }
  body{
    height: 100%;
    background: url(../background/4.png);
    background-position: center;
    background-size: cover;
    background-size: 100%;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-color: rgb(48, 224, 182);
  }
  h1{
    text-align: center;
    margin-top: -20px !important;
    font-family: font !important;
    background-color: rgb(226, 47, 36);
    color: rgb(255, 255, 255) !important;
    padding: 59px 59px;
  }
  .header{
    text-align: center;
    font-weight: bold;
  }
  .isi{
    letter-spacing: 1px;
    text-indent: 50px;
    padding-bottom: 20px;
  }
  .menu{
    margin-top: 225px;
    margin-bottom: 50px !important;
    width: 100% !important;


  }
  .kategori{
    margin-left: -8px;
    margin-right: 0px !important;
    width: 120px;
    background-color: rgb(226, 47, 36);
    color: rgb(255, 255, 255);
    padding: 10px 50px;
    text-decoration: none;
    transition: background 0.7s, color 0.7s;
  }
  .kategori:hover{
    background-color: rgb(39, 196, 182);
    color: rgb(18, 18, 18);
    text-decoration: none;
  }
  .sss{
    padding-right: 54px;
  }
  .klik{
    margin-left: -60px;
  }
  .footer{
    margin-top: 30%;
    margin-bottom: -10%;
    margin-left: 0;
    margin-right: 0;
  }
  .header{
    font-weight: bold;
    background-color:rgb(203, 38, 38);
    color: rgb(255, 255, 255);
  }
  #error{
    margin-bottom: 20%;
  }
</style>
<h1>Selamat Datang <?php echo $_SESSION['user']; ?> </h1>

<div class="pilihan ">
  <form class="form-horizontal" action="" method="post">

    <div class="menu">

      <a class="kategori" href="all.php">ALL</a>
      <a class="kategori" href="news.php">NEWS</a>
      <a class="kategori" href="politik.php">POLITIK</a>
      <a class="kategori" href="bisnis.php">BISNIS</a>
      <a class="kategori" href="olahraga.php">OLAHRAGA</a>
      <a class="kategori" href="otomotif.php">OTOMOTIF</a>
      <a class="kategori" href="teknologi.php">TEKNOLOGI</a>
      <a class="kategori" href="hiburan.php">HIBURAN</a>
      <a class="kategori sss" href="cuaca.php">CUACA</a>

    </div>

  </form>
</div>
<?php
$query  = "SELECT * FROM artikel WHERE kategori='HIBURAN'";
$result = mysqli_query($link, $query);
$hasil  = mysqli_num_rows($result);
echo "<table class='table table-bordered table-responsive'>";
if($hasil > 0)
{
   while($data=mysqli_fetch_assoc($result))
   {
   echo "<tr class='header'><td>".$data['tgl']."</td><td>".$data['kategori']."</td><td>".$data['judul']."</td></tr>";
   echo "<tr class='isi'><td colspan='3'>".$data['deskripsi']."</td></tr>";
   }
  echo "</table>";
}else{
  $error1 =  "<p id='error1' >Artikel Tidak Tersedia!</p>";
  echo "<br>";
}
?>
<?php
if($error1 != ''){ ?>
  <div id="error">
    <?= $error1; ?>
  </div>
<?php } ?>
<div class="footer">
<?php require_once "view/footer.php"; ?>
</div>
