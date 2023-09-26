<!DOCTYPE html>
<html>
<head>
    <title>Tambah_Transaksi</title>
</head>
<?php
    //Koneksi database
    include 'koneksi.php';
    //Menangkap data yang dikirim dari form 
    if(!empty($_POST['save'])){

        $Tanggal = $_POST['tgl_transaksi'];
        $No = $_POST['no_transaksi'];
        $Jenis = $_POST['jenis_transaksi'];
        $Barang = $_POST['barang_id'];
        $Jumlah = $_POST['jumlah_transaksi'];
        $User = $_POST['user_id']; 
        //menginput data ke database
        $a = mysqli_query($koneksi,"insert into barang values('','$Tanggal','$No','$Jenis','$Barang','$Jumlah,'$User')");
        if($a){
            //mengalihkan halaman kembali
            header("location:tambah_transaksi.php");
        }else{
            echo mysqli_error();
        }
    }
?>
<body>
    <h2>Pemograman 1 2023</h2>
    <br>
    <a href="tampil_transaksi.php">Kembali</a>
    <br><br>
    <h3>TAMBAH DATA TRANSAKSI</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Tanggal Transaksi</td>
                <td><Input type="date" name="tgl_transaksi"></td>
            </tr>
            <tr>
                <td>No Transaksi</td>
                <td><input type="number" name="no_transaksi"></td>
            </tr>
            <tr>
                <td>Jenis Transaksi</td>
                <td><input type="text" name="jenis_transaksi"></td>
            </tr>
            <tr>
                <td>Id Barang</td>
                <td><input type="number" name="barang_id"></td>
            </tr>
            <tr>
                <td>Jumlah Transaksi</td>
                <td><input type="number" name="jumlah_transaksi"></td>
            </tr>
            <tr>
                <td>Id User</td> 
                <td><input type="number" name="user_id"></td>
            </tr>
            <tr>
            <td></td>
                <td><input type="submit" name="save"></td>
            </tr>

        </table>
    </form>
</body>
</html>