<?php
require 'koneksi.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$barangs = query("SELECT * FROM barang WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah data barang</title>
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
	<h1 class="text-center">Ubah data barang</h1>


<!-- yang bener -->
<form action="" method="post" enctype="multipart/form-data">
<div class="container">
	<div class="row">
	<input type="hidden" name="id" value="<?= $barangs["id"]; ?>">
	<input type="hidden" name="gambarLama" value="<?= $barangs["gambar"]; ?>">
	<div class="col-md-8">
	<div class="mb-3">
	  <label for="formGroupExampleInput" class="form-label">Nama Barang</label>
	  <input type="text" class="form-control" name="nama_barang" id="formGroupExampleInput" placeholder="Example input placeholder" value="<?= $barangs["nama_barang"]; ?>">
		</div>
		<div class="mb-3">
	  <label for="formGroupExampleInput2" class="form-label">Deksripsi</label>
	  <input type="text" class="form-control" name="deksripsi" id="formGroupExampleInput2" placeholder="Another input placeholder" value="<?= $barangs["deksripsi"]; ?>">
		</div>
		<div class="mb-3">
	  <label for="formGroupExampleInput2" class="form-label">Tanggal Masuk</label>
	  <input type="text" class="form-control" name="tgl_masuk" id="formGroupExampleInput2" placeholder="Another input placeholder" value="<?= $barangs["tgl_masuk"]; ?>">
		</div>
		<div class="mb-3">
	  <label for="formGroupExampleInput2" class="form-label">Edit Foto</label>
	  <input type="file" class="form-control" name="gambar" id="formGroupExampleInput2" placeholder="Another input placeholder">
		</div>
		<div class="mb-3">
		<button type="submit" name="submit" class="btn btn-warning">Ubah Data</button>
		</div>
		</div>
	<div class="col-md-4 text-center mt-3">
		<label> Foto <?= $barangs["nama_barang"];?></label>
		<img class="img-fluid img-thumbnail" src="img/<?= $barangs["gambar"];?>" width="300px" alt="" srcset="">
	</div>
	
	</div>
	</div>
</form>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>