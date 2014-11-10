<?php
  error_reporting(E_ALL);
  ini_set('display_error',1);
  //memulai session
  session_start();
  //cek adanya session
  if(ISSET($_SESSION['username'])){
    //jika tidak ada session 
  } else
  header("location:login.php");
?>
  <link href="asset/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="asset/css/navbar-fixed-top.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="asset/js/bootstrap.js"> </script> 
<body>

  <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">E-Learning</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar-static-top/">Anda login sebagai <?php echo $_SESSION['username'];?></a></li>
            <li class="active"><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h3>Selamat Datang di ELISA Universitas Gadjah Mada</h3>
        <p>Mari berbagi pengetahuan, berkolaborasi dan menjadi produktif dalam kerangka pembelajaran.</p>
        <p>
          <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">Selengkapnya &raquo;</a>
        </p>
      </div>

    </div> <!-- /container -->
</body>