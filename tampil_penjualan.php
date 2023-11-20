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
    <title>Tampil Penjualan</title>
</head>
<body>
    <h2>Pemrograman 3 2023</h2>
    <br>
    <a href="/Home.html">Home</a>
    <br>  
    <a href="tambah_penjualan.php">+ Tambah Penjualan</a>
    <br>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Tanggal Penjualan</th>
            <th>Nama Pelanggan</th>
            <th>Total Harga</th>
            <th>Opsi</th>
        </tr>
        <?php
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM penjualan");
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['tanggal_penjualan'];?></td>
            <td><?php echo $d['nama_member'];?></td>
            <td><?php echo $d['total_harga'];?></td>
            <td>
                <?php
                // Tampilkan opsi Edit dan Hapus berdasarkan level user yang sedang login
                if ($_SESSION['level'] == 0) {
                    // Level 0 dapat mengedit dan menghapus
                    echo '<a href="edit_penjualan.php?id=' . $d['id_penjualan'] . '">Edit</a>';
                    echo '<a href="hapus_penjualan.php?id=' . $d['id_penjualan'] . '">Hapus</a>';
                } elseif ($_SESSION['level'] == 1) {
                    // Level 1 dapat mengedit dan menghapus
                    echo '<a href="edit_penjualan.php?id=' . $d['id_penjualan'] . '">Edit</a>';
                    echo '<a href="hapus_penjualan.php?id=' . $d['id_penjualan'] . '">Hapus</a>';
                } elseif ($_SESSION['level'] == 2) {
                    // Level 2 tidak dapat mengedit dan menghapus
                    echo 'Tidak diizinkan';
                }
                ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
