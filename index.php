<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="images/favicon.ico">
<title>Similarity Applications</title>
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of 
         HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom JS -->
<script src="js/custom.js"></script>
</head>
<body>
<!--Awal Konten
	<div class="container">
    Bagian Header -->
<div class="container">
	
	<div class="row">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		</div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<?php
			if(!isset($_SESSION['admin'])){ ?>	

			<li>
				<a href="./"><span class="glyphicon glyphicon-home"></span> Beranda <span class="sr-only">(current)</span></a>
			</li>
			<li>
				<a href="index.php?page=list"><span class="glyphicon glyphicon-book"></span> Jenis Penyakit</a>
			</li>
			<li>
				<a href="index.php?page=sortir"><span class="glyphicon glyphicon-check"></span> Konsultasi</a>
			</li>
			<li>
				<a href="index.php?page=info"><span class="glyphicon glyphicon-question-sign"></span> Bantuan</a>
			</li>

			<?php } else { ?>

			<li>
				<a href="./"><span class="glyphicon glyphicon-home"></span> Beranda <span class="sr-only">(current)</span></a>
			</li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-th-list"></span> Data Master <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li>
						<a href="index.php?page=gejala">Data Gejala</a>
					</li>
					<li>
						<a href="index.php?page=penyakit">Data Penyakit</a>
					</li>
					<li>
						<a href="index.php?page=solusi">Data Solusi</a>
					</li>
				</ul>
			</li>
			
			<li>
				<a href="index.php?page=data"><span class="glyphicon glyphicon-check"></span> Riwayat Konsultasi</a>
			</li>
			
			<?php } ?>

			<?php
			if(isset($_SESSION['admin'])){ ?>
			<li class="navbar-right">
				<a href="index.php?page=logout"><span class="glyphicon glyphicon-off"></span> Log Out</a>	
			</li>
			<li class="navbar-right">
				<a href="#"><span class="glyphicon glyphicon-user"></span> [ Hallo, Selamat Datang : Admin ]
				</a>	
			</li>
			<?php } else { ?>
			<li class="navbar-right">
				<a href="index.php?page=login"><span class="glyphicon glyphicon-off"></span> LogIn Admin</a>	
			</li>
			<li class="navbar-right">
				<a href="#"><span class="glyphicon glyphicon-user"></span> [ Hallo, Selamat Datang : Pengunjung ]
				</a>	
			</li>
			<?php } ?>
			
			
		</ul>
	</div>
	</div>
	<div class="row">
        <div class="col-md-12 header" id="site-header">
		
           <header>
				<h1 class="title-site" align="center">SISTEM PAKAR DIAGNOSA PENYAKIT AYAM KAMPUNG</h1>
				<p align="center">Menggunakan Metode Simple Matching Coefficient Similarity</p>
		   </header>
        </div>
    </div>
	
	<!-- /.navbar-collapse -->
</div>
<!-- End Bagian Header -->
<!-- Banner -->
<?php 
if(!isset($_GET['page'])){ ?>
<div class="container">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Wrapper for carousel items -->
		<div class="carousel-inner">
			<div class="item active">
				<img src="images/ayam.jpg" alt="First Slide">
			</div>
			
		</div>
	</div>
</div>
<?php } ?>
<!-- End Banner -->
<!-- Bagian Wrapper 2 kolom -->
<div class="container">
	<div class="row">

		<!-- Mulai Konten -->
		<?php
		if(isset($_REQUEST['page'])){
			$page = "view/".$_REQUEST['page'].".php";
			include $page;
		}else{
			include "view/home.php";
		}
		?>
		<!-- Selesai Konten -->
		
		<div class="col-md-4 sidebar" id="site-sidebar">
			<aside class="widgets">
			<h3 class="widget-title">Menu Pengunjung</h3>
			<ul>
				<li>
					<a href="./"><span class="glyphicon glyphicon-home"></span> Beranda</a>
				</li>
				<li>
					<a href="index.php?page=list"><span class="glyphicon glyphicon-book"></span> Jenis Penyakit</a>
				</li>
				<li>
					<a href="index.php?page=sortir"><span class="glyphicon glyphicon-check"></span> Konsultasi</a>
				</li>
				<li>
					<a href="index.php?page=info"><span class="glyphicon glyphicon-question-sign"></span> Bantuan</a>
				</li>
			</ul>
			</aside>

			
		</div>
	</div>
</div>
<!-- End Bagian wrapper -->
<!-- Bagian footer -->
<div class="row">
	<div class="col-md-12 footer" id="site-footer">
		<footer class="copyright text-center">
		<p>
			 Copyright&copy;2019 - <b><font size='2'><font color='blue'> </font></font></b>| <b>Universitas Pasir Pengaraian.</b> All Right Reserved.
		</p>
		</footer>
	</div>
</div>
<!-- End Bagian footer --></div>

</body>
</html>