<?php
require 'koneksi.php';
$barang = query("SELECT * FROM barang");

if( isset($_POST["cari"]) ) {
	$barang = cari($_POST["keyword"]);
}

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

<div class="container mt-3">
<a class="btn btn-success" href="tambah.php">Input Barang</a>
<br><br>
<form class="d-flex" action="" method="post">

	<input class="me-2 rounded-3" size="40" type="text" id="keyword" name="keyword" placeholder="masukkan keyword pencarian.." autocomplete="off">
	<button class="btn btn-outline-success" type="submit" id="tombol-cari" name="cari">Cari!</button>
	
</form>
<br><br>
<?php
	require_once('phpqrcode/qrlib.php'); 
?>
<div id="tabels" class="tabels">
<table class="table table-dark" border="1" cellpadding="10" cellspacing="0">

	<tr>
		<th>No.</th>
		<th>Gambar</th>
		<th>Nama Barang</th>
		<th>dekskripsi</th>
    <th>Tanggal Masuk</th>
		<th>Aksi</th>
		
	</tr>
    <?php $i = 1; ?>
	<?php foreach( $barang as $row ) :

	// $link = "http://localhost/sultan/detail.php?id=";
	// $no = query("SELECT id FROM barang WHERE id");
	?>
    
	<tr>
		<td><?= $i; ?></td>
		
		<td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
		<td><?= $row["nama_barang"]; ?></td>
		<td><?= $row["deksripsi"]; ?></td>
		<td><?= $row["tgl_masuk"]; ?></td>
    <td>
		<a class="btn btn-primary" href="detail.php?id=<?= $row["id"]; ?>">Detail</a> |
    <a class="btn btn-warning" href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
		<a class="btn btn-danger" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
		</td>
	
		
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
</table>
</div>
</div>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>