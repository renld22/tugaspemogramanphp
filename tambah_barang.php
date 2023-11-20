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
    <title>Tambah_Barang</title>
</head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: center;
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

<?php
    //Koneksi database
    include 'koneksi.php';
    //Menangkap data yang dikirim dari form 
    if(!empty($_POST['save'])){

        $Nama = $_POST['nama_barang'];
        $Kode = $_POST['kode_barang'];
        $Qty = $_POST['qty'];
        $Kategori = $_POST['id_kategori'];
        //menginput data ke database
        $a = mysqli_query($koneksi,"insert into barang values('','$Nama','$Kode','$Qty','$Kategori')");
        if($a){
            //mengalihkan halaman kembali
            header("location:tambah_barang.php");
        }else{
            echo mysqli_error();
        }
    }
?>
<body>
    <h2>Pemograman 3 2023</h2>
    <br>
    <a href="tampil_barang.php">Kembali</a>
    <br><br>
    <h3>TAMBAH DATA BARANG</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Nama Barang</td>
                <td><Input type="text" name="nama_barang"></td>
            </tr>
            <tr>
                <td>Kode Barang</td>
                <td><input type="text" name="kode_barang"></td>
            </tr>
            <tr>
                <td>Qty</td>
                <td><input type="number" name="qty"></td>
            </tr>
            <tr>
                <td>Id Kategori</td>
                <td><input type="number" name="id_kategori"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save"></td>
            </tr>
        </table>
    </form>
</body>
</html>