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
  }
  body{
    height: 100%;
    background: url(background/4.png);
    background-position: 0% 34.2%;
    /* background-size: cover; */
    background-size: 100%;

    background-repeat: no-repeat;
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
    margin-top: 0%;
    margin-bottom: 0;
    margin-left: 0;
    margin-right: 0;
  }
  .header{
    font-weight: bold;
    background-color:rgb(84, 84, 84);
    color: rgb(255, 255, 255);
  }
  .informasi{
    background-color: rgb(226, 47, 36);
    margin-top: -4px;
    padding-bottom: 200px;
  }
  .informasi p{
    text-align: center;
    font-size: 70px;
    padding-top: 50px;
    font-weight: bold;
    color: rgb(255, 255, 255);
  }
  .sport{
    height: 320px !important;
    width: 300px;
    opacity: 0.8;
    transition: opacity 0.5s;
  }
  .sport:hover{
    opacity: 1;
  }
  .thum{
    margin-left: 50px;
  }
  .tag{
    margin-top: -250px !important;
    opacity: 0.8;
    transition: opacity 0.5s;
  }
  .tag:hover{
    opacity: 1;
    color: white;
  }
  .a{
    text-decoration: none;
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
<h1>Selamat Datang <?php echo $_SESSION['user']; ?> </h1>


<div class="pilihan ">
  <form class="form-horizontal" action="" method="post">

    <div class="menu">

      <a class="kategori" href="news/all.php">ALL</a>
      <a class="kategori" href="news/news.php">NEWS</a>
      <a class="kategori" href="news/politik.php">POLITIK</a>
      <a class="kategori" href="news/bisnis.php">BISNIS</a>
      <a class="kategori" href="news/olahraga.php">OLAHRAGA</a>
      <a class="kategori" href="news/otomotif.php">OTOMOTIF</a>
      <a class="kategori" href="news/teknologi.php">TEKNOLOGI</a>
      <a class="kategori" href="news/hiburan.php">HIBURAN</a>
      <a class="kategori sss" href="news/cuaca.php">CUACA</a>

    </div>
  </form>
</div>
<div class="informasi">
  <p>Website Penyedia Berita Terupdate</p>
  <div class="row container-fluid">
  <div class="col-xs-6 col-md-3">
    <a href="news/politik.php" class="a">
      <img class="sport img-rounded" src="gambar/politik.jpg" alt="politik">
      <p class="tag">POLITIK</p>
    </a>
  </div>
  <div class="col-xs-6 col-md-3">
    <a href="news/olahraga.php" class="a">
      <img class="sport spo img-rounded" src="gambar/sport.jpg" alt="olahraga">
      <p class="tag">SPORT</p>
    </a>
  </div>
  <div class="col-xs-6 col-md-3">
    <a href="news/hiburan.php" class="a">
      <img class="sport hib img-rounded" src="gambar/hiburan.jpg" alt="hiburan">
      <p class="tag">HIBURAN</p>
    </a>
  </div>
  <div class="col-xs-6 col-md-3">
    <a href="news/teknologi.php" class="a">
      <img class="sport img-rounded" src="gambar/teknologi.jpg" alt="teknologi">
      <p class="tag">TECH</p>
    </a>
  </div>
</div>
</div>
<div class="footer">
  <?php require_once "view/footer.php"; ?>
</div>
