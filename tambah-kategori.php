<?php 
session_start();
include 'db.php';
if( $_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}

?>
<!DOCTYPE html>
<html> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Kue Berkah</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href=<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head><link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<body>
    <header>
        <div class="container">
        <h1><a href="dashboard.php">Toko Kue Berkah</a></h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="data-kategori.php">Data kategori</a></li>
            <li><a href="data-produk.php">Data Produk</a></li>
            <li><a href="keluar.php">Keluar</a></li>
        </ul>
        </div>
</header>
<div class="section"> 
    <div class="container">
    <link rel="stylesheet" type="text/css" href="css/style.css">
        <h3>Edite kategori</h3>
        <div class="box">   
            <form action="" method="POST">
            <input type="text" name="nama" placeholder = "Nama Kategori" class="input-control" value =  required>
            <input  type = "submit" name="submit" value = "tambahkan" class="edit-button" >
            </form>  
            <?php
            if (isset($_POST['submit'])){
                $nama = ucwords($_POST['nama']);

                $insert = mysqli_query($connect, "INSERT INTO tb_Category VALUES (null, '".$nama."')");
                if($insert){
                    echo '<script> alert("tambah data berhasil")</script>';
                    echo '<script> window.location="data-kategori.php"</script>';

                }else {
                    echo 'gagal' .mysqli_error($connect);
                
                }
            }
            ?>
    </div>       
    </div>
</div>
<footer>
    <div class= "container">
        <small>Copyright &copy; 2022 - Toko Kue Berkah</small>
</div>
</footer>
</body>
</html>