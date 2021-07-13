<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'investori';

$conn = mysqli_connect($host,$username,$password,$db);


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data) {
	global $conn;

	$nama_barang = htmlspecialchars($data["nama_barang"]);
	$deksripsi = htmlspecialchars($data["deksripsi"]);
	// $tgl_masuk = htmlspecialchars($data["tgl_masuk"]);
    $tgl_masuk = htmlspecialchars(date('Y-m-d'));
	// $image = htmlspecialchars($data["image"]);

$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO barang
				VALUES
			  ('', '$nama_barang', '$deksripsi', '$tgl_masuk', '$gambar')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload(){

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;


}

function ubah($data) {
	global $conn;

	$id = $data["id"];
	$nama_barang = htmlspecialchars($data["nama_barang"]);
	$deksripsi = htmlspecialchars($data["deksripsi"]);
	$tgl_masuk = htmlspecialchars($data["tgl_masuk"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);

	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}

	$query = "UPDATE barang SET
				nama_barang = '$nama_barang',
				deksripsi = '$deksripsi',
				tgl_masuk = '$tgl_masuk',
				gambar = '$gambar'
			  WHERE id = $id
			";
	// var_dump($query); die;
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}

function cari($keyword) {

	$query = "SELECT * FROM barang
				WHERE
			  nama_barang LIKE '%$keyword%' OR
			  deksripsi LIKE '%$keyword%'
			";
	return query($query);
	
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM barang WHERE id = $id");
	return mysqli_affected_rows($conn);
}



?>