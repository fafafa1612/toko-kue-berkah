<?php 
session_start();
if( $_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}
?>
<!DOCTYPE html>
<html 
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
        <h3>Dashboard </h3>
        <div class="box">
            <h4>Selamat datang kembali <?php echo $_SESSION['admin_global']->admin_name ?> di toko</h4>
    </div>
</div>

<footer>
    <div class= "container">
        <small>Copyright &copy; 2022 - Toko Kue Berkah.</small>
</div>
</footer>
</body>
</html>