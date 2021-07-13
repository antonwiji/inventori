<?php
require '../koneksi.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM barang WHERE
            nama_barang LIKE '%$keyword%' OR
            deksripsi LIKE '%$keyword%'";
$barang = query($query);




?>
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