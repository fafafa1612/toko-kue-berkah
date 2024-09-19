<?php 
session_start();
include 'db.php';
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
</head>
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
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
        <h3>Data kategori Produk </h3>
        <div class="box">
            <table border ="1"cellspacing="0"class="table-border">
                <thead>
                    <tr>
                        <th width="30px">N0</th>
                        <th>Kategorii</th>
                        <th width="130px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                     $kategori = mysqli_query($connect, "SELECT * FROM tb_category ORDER BY id_category DESC");
                     if(mysqli_num_rows($kategori) > 0){
                     while($row = mysqli_fetch_array($kategori)){
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row ['category_name'] ?></td>
                        <td><a href="edit-kategori.php? id=<?php echo $row ['id_category']?> ">Edite</a>//
                        <a href="hapus-kategori.php? idk=<?php echo $row['id_category']?> 
                        "onclick="return confirm('Setuju?')">Hapus</a></td>
                    </tr>
                       <?php }} else{?>
                        <tr>
                            <td colspan="3">Tidak ada data</td>
                        </tr>
                        <?php }?>
                </tbody>
            </table>
            <p><a href="tambah-kategori.php">Tambah data</a></p>
    </div>
</div>

<footer>
    <div class= "container">
        <small>Copyright &copy; 2022 - Toko Kue Berkah.</small>
</div>
</footer>
</body>
</html>