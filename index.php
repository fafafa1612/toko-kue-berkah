<?php
include 'db.php';
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Kue Berkah</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head><link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<body>
    <header>
        <div class="container">
        <h1><a href="index.php">Toko Kue Berkah</a></h1><br>
        <div class="container">
        <ul>
            <li><a href="produk.php" class="produk"><font size="5"> Produk</font></a></li>
        </ul>  
        </div>
</header>
<div class="search">
    <div class="container">
    <form action="produk.php">
                <input type="text" name="search" placeholder="Cari produk" >
                <input type="submit" name="cari" value="Cari Produk" >
            </form></div>
</div>

<div class="section"> 
    <div class="container"> 
        <h3>Kategori</h3>
        <div class="box">
            <?php

            $kategori = mysqli_query($connect, "SELECT * FROM tb_category ORDER BY id_category DESC");
            if(mysqli_num_rows($kategori) > 0){
                while($k = mysqli_fetch_array($kategori)){
            ?>
            <a href="produk.php?kateg=<?php echo $k['id_category']?>">
            <div class="col-5">
                <img src="img/Bolu.png" width="50px" style="margin-bottom:4px;">
                <p><?php echo $k['category_name']?></p>
            </div>
            </a>
            <?php } }   else{?>
                <p>Kategori tidak ada </p>

            <?php }?>
        </div>
    </div> </div>

    <div clas="section">
       <div class="container">
        <h3>Produk terbaru</h3>
        <div class="box">
            <?php
            $produk = mysqli_query($connect, "SELECT * FROM tb_product ORDER BY id_product DESC 
            LIMIT 5");
            if(mysqli_num_rows($produk) > 0){
                while($p = mysqli_fetch_array($produk)){
            ?> 
            <a href="detail-produk.php?id=<?php echo $p['id_product'] ?>">        
                <div class="col-4">
                <img src="produk/<?php echo $p['product_image'] ?>">
                <p class="nama"><?php echo $p['product_name'] ?></p>
                <p class="harga">Rp.<?php echo $p['product_price']?></p>
                </div>
            </a> 
        <?php }} else{ ?>
            <p>Produk tidak ada</p>
            <?php } ?>
       </div>
    </div>
    </div>
    <div class="footer">
        <div class="container">
            <small>Copyright &copy; 2022 - Toko Kue Berkah</small>

        </div> </div>
</body>
</html>