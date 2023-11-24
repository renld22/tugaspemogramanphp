<?php 
session_start();
if(!isset($_SESSION['session_username'])){
    header("location:index.php");
    exit();
}

?>




<!DOCTYPE html>
<html>
<head>
    <title>Tampil Barang</title>
</head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2, h3 {
            color: #333;
        }

        a {
            text-decoration: none;
            color: #0066cc;
        }

        a:hover {
            color: #004080;
        }

        table {
            width: 50%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>

<body>
    <h2>Pemograman 3 2023</h2>
    <br>
    <a href="tambah_barang.php">+ Tambah Barang</a>
    <br>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nama Barang</th>
            <th>Kode Barang</th>
            <th>Qty</th>
            <th>Id Kategori</th>
                   <th>Opsi</th>
        </tr>
        <?php
include 'koneksi.php';
$no = 1;
$data = mysqli_query($koneksi, "SELECT * FROM barang");

while ($d = mysqli_fetch_array($data)) {
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['nama_barang']; ?></td>
        <td><?php echo $d['kode_barang']; ?></td>
        <td><?php echo $d['qty']; ?></td>
        <td><?php echo $d['kategori_id']; ?></td>
        <td>
            <?php
            // Tampilkan opsi Edit dan Hapus berdasarkan level pengguna
            if ($_SESSION['level'] == 0) {
                // Level 0 dapat mengedit dan menghapus
                echo '<a href="edit_barang.php?id=' . $d['id_barang'] . '">Edit</a>';
                echo '<a href="hapus_barang.php?id=' . $d['id_barang'] . '">Hapus</a>';
            } elseif ($_SESSION['level'] == 1) {
                // Level 1 dapat mengedit dan menghapus
                echo '<a href="edit_barang.php?id=' . $d['id_barang'] . '">Edit</a>';
                echo '<a href="hapus_barang.php?id=' . $d['id_barang'] . '">Hapus</a>';
              } elseif ($_SESSION['level'] == 2) {
                // Level 2 tidak dapat mengedit dan menghapus
                echo 'Tidak diizinkan';
            } elseif ($_SESSION['level'] == 3) {
                // Level 1 dapat mengedit dan menghapus
                echo '<a href="edit_barang.php?id=' . $d['id_barang'] . '">Edit</a>';
                echo '<a href="hapus_barang.php?id=' . $d['id_barang'] . '">Hapus</a>';
            }elseif ($_SESSION['level'] == 4) {
                // Level 1 dapat mengedit dan menghapus
                echo '<a href="edit_barang.php?id=' . $d['id_barang'] . '">Edit</a>';
                echo '<a href="hapus_barang.php?id=' . $d['id_barang'] . '">Hapus</a>';
            }
            ?>
        </td>
    </tr>
<?php
}
?>

        </table>
        <br>  
        <a href="index.php">Kembali</a>
        <br>
</body>
</html>