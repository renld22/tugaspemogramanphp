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
    <title>pemograman3.com</title>
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
//koneksi database
include 'koneksi.php';
//menangkap data yang di kirim dari form
if (!empty($_POST['save'])){

    $Nama = $_POST['Nama'];
    $Password = $_POST['Password'];
    $level = $_POST['level'];
    $status = $_POST['status'];
    //menginput data ke database
    $a=mysqli_query($koneksi,"insert into user values('','$Nama','$Password','$level','$status')");
    if($a){
        //mengalihkan halaman kembali
        header("location:tambah_user.php");
    }else{
        echo mysqli_error();
    }
}  

?>  
<body>
    <h2>pemograman3 2023</h2>
    <br/>
    <a href="http://localhost/keuangan/tampil_user.php">KEMBALI</a>
    <br/>
    <br/>
    <h3>TAMBAH DATA USER</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="Nama"></td>
            </tr>
            <tr>
             <td>Password</td>
             <td><input type="text" name="Password"></td>
        </tr>
        <tr>
            <td>level</td>
            <td><select name="level">
                <option value="">-----pilih</option>
                <option value="1">Admin</option>
                <option value="2">Staff</option>
                <option value="3">Spv</option>
                <option value="4">Mgr</option>
</select>
</td>
</tr>
<tr>
    <td>status</td>
    <td><select name="status">
        <option value="">-----pilih</option>
        <option value="aktif">Aktif</option>
        <option value="tidak aktif">tdk aktif</option>
</select>
</td>
</tr>
<tr>
    <td><td>
        <td><input type="submit" name="save"></td>
</tr>
</table>
</form>
</body>
</html>

