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
        <h3>Data Produk </h3>
        <div class="box">
            <table border ="1"cellspacing="0"class="table-border">
                <thead>
                    <tr>
                        <th width="30px">N0</th>
                        <th>Kategorii</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Status</th>
                        <th width="130px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $produk = mysqli_query($connect, "SELECT * FROM tb_product LEFT JOIN tb_category USING (id_category) 
                    ORDER BY id_product DESC");
                    if (mysqli_num_rows($produk) > 0 ){
                    while($row = mysqli_fetch_array($produk)){
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row ['category_name'] ?></td>
                        <td><?php echo $row ['product_name'] ?></td>
                        <td>Rp. <?php echo number_format ($row ['product_price']) ?></td>
                        <td><?php echo $row ['product_description'] ?></td>
                        <td><a href="produk/<?php echo $row ['product_image'] ?>" target="_blank"><img src="produk/<?php echo $row ['product_image'] ?>"width="50px"></a></td>
                        <td><?php echo ($row ['product_status'] ==0)? 'tidak aktif' : 'Aktif'; ?></td>
                        <td><a href="edit-produk.php? id=<?php echo $row ['id_product']?> ">Edit</a>//
                        <a href="hapus-kategori.php? idp=<?php echo $row['id_product']?> 
                        "onclick="return confirm('Setuju?')">Hapus</a></td>
                    </tr>
                       <?php }} else {?>
                        <tr>
                            <td colspan="8">tidak ada data</td>
                       </tr>
                        <?php }?>
                </tbody>
            </table>
            <p><a href="tambah-produk.php">Tambah produk</a></p>
    </div>
</div>

<footer>
    <div class= "container">
        <small>Copyright &copy; 2022 - Toko Kue Berkah.</small>
</div>
</footer>
</body>
</html>