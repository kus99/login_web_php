  <!DOCTYPE HTML>
    <html lang="en-us">
    <head>
    <title>Backend Artikel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style media="screen">
      @font-face {
          font-family: font;
          src: url(../fonts/Noir_medium.otf);
      }
      *{
        font-family: font;
      }
      .logo{
        float: left;
        height: 50px;
        width: 50px;
        margin-right: 10px;
        position: relative;
        transform: translate(0, -14px);
      }
      .konten{
        min-height: 100vh;
        height: 100%;
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
      .restricted{
        text-align: center;
        font-family: font;
        margin-top: 50px;
        margin-bottom: 40%;
      }
    </style>
    <script src="../assets/js/bootstrap.min.js">
    </script>
    </head>
    <body>
      <header>
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="index.php">
                <img alt="Brand" class="logo" src="../logo/logo.png">
              </a>
          <?php if( !isset($_SESSION['user'])){ ?>
                <div class="navbar-right">
                  <a class="navbar-brand" href="../login.php">Login</a>
                  <a class="navbar-brand" href="../register.php">Register</a>
                </div>
          <?php }else{ ?>
                <a class="navbar-brand active" href="../index.php">Home</a>
            <?php if( cek_status($_SESSION['user']) ) {?>
                <a class="navbar-brand" href="../tambah_artikel.php">Tambah Artikel</a>
                <a class="navbar-brand" href="../artikel.php">Material</a>
                <a class="navbar-brand" href="../data_user.php">User</a>
            <?php } ?>
            </div>
            <div class="bar navbar-right">
              <a style="color:rgb(255, 255, 255);" class="navbar-brand" href="../profile.php"><?php echo $_SESSION['user']; ?> </a>
              <a class="navbar-brand" href="../logout.php">Logout</a>
            </div>
        <?php } ?>
          </div>
        </nav>
      </header>
