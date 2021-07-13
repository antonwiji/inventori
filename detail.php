<?php
require 'koneksi.php';
$id = $_GET["id"];
$barangs = query("SELECT * FROM barang WHERE id = $id")[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="http://localhost/sultan/">Navbar scroll</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Link
          </a>
         
        </li>
       
      </ul>
      <form class="d-flex">
        <input class="form-control me-2 rounded-5" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    <?php 
    $url = "http://localhost.com/sultan/detail.php?id=".$barangs['id'];
    $qr = "https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=$url&choe=UTF-8"?>


<div class="container">
<table class="table table-dark mt-4" border="1" cellpadding="10" cellspacing="0">

	<tr>
		<th>Foto Barang</th>
		<th>Nama Barang</th>
		<th>dekskripsi</th>
        <th>Tanggal Masuk</th>
        <th>QR</th>
		
	</tr>
    
	<tr>
		<td><img src="img/<?= $barangs["gambar"]; ?>" width="250"></td>
		<td><?= $barangs["nama_barang"]; ?></td>
		<td><?= $barangs["deksripsi"]; ?></td>
		<td><?= $barangs["tgl_masuk"]; ?></td>
        <td><img src="<?= $qr;?>" alt=""></td>
		
	</tr>
  <tr>
    <td colspan="8" class="text-center">
    <a class="btn btn-danger" href="hapus.php?id=<?= $barangs['id'];?>" onclick="return confirm('yakin?');"> hapus</a>
    <a class="btn btn-warning" href="ubah.php?id=<?= $barangs['id'];?>"> ubah </a>
    </td>
  </tr>
</table>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>