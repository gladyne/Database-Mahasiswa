<<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Data Mahasiswa Universitas Diponegoro</title>
	    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	<!-- JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/tooltip.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
    <link href="style.css" rel="stylesheet">
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
	</script>
	
	</head>
<body>
	<!-- Start navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand visible-xs-block visible-sm-block" href="Teknik Elektro" target="_blank">ilmututorial.com</a>
		  <a class="navbar-brand hidden-xs hidden-sm" href="Teknik Elektro" target="_blank">Teknik Elektro</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="nav navbar-nav">
			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<li><a href="data.php" data-toggle="tooltip" data-placement="bottom" title="Lihat Data Mahasiswa"><span class="glyphicon glyphicon-list"></span> Lihat Data</a></li>
			<li><a href="tambah.php" data-toggle="tooltip" data-placement="bottom" title="Tambah Data Mahasiswa" ><span class="glyphicon glyphicon-user"> Tambah Data</a></li>
		  </ul>
			<form name="cari" method="post" action="cari.php" role="search" class="navbar-form navbar-left">
				<div class="form-group">
					<input type="text" name="carinim" placeholder="Cari NIM Mahasiswa" class="form-control">
				</div>
				<button type="submit" name="submit" id="submit" value="search" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Cari Data Mahasiswa">Cari</button>
			</form>
		</div>
	  </div>
	</nav>
	<!-- End navbar -->
	<!-- Start container -->
	<div class="container">
		<div class="content">
			<div class="jumbotron">
				<h1>Data Mahasiswa Universitas Diponegoro</h1>
				<p>Aplikasi input data mahasiswa </p>
				<a href="data.php" data-toggle="tooltip" title="Lihat Data Mahasiswa" class="btn btn-info" role="button"><span class="glyphicon glyphicon-list"></span> Lihat Data Mahasiswa</a>
				<a href="tambah.php" data-toggle="tooltip" title="Tambah Data Mahasiswa" class="btn btn-success" role="button"><span class="glyphicon glyphicon-user"></span> Tambah Data</a>
			</div> <!-- /.jumbotron -->
		</div> <!-- /.content -->
	</div>
	<!-- End container -->
 
	
	<script>
	$('.datepicker').datepicker({
		format: 'dd-mm-yyyy',
	})
	</script>
</body>
</html>