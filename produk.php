<?php

error_reporting(0);
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
            <li><a href="index.php" class="produk"><font size="5"> Beranda</font></a></li>
        </ul>  
        </div>
</header>
<div class="search">
    <div class="container">
    <form action="produk.php">
                <input type="text" name="search" placeholder="Cari produk" value="<?php echo $_GET['search'] ?>" >
                <input type="hidden" name="kateg" value="<?php echo $_GET['kateg'] ?>">
                <input type="submit" name="cari" value="Cari Produk" >
            </form></div>
</div>

    <div clas="section">
       <div class="container">
        <h3>Produk </h3>
        <div class="box">
            <?php
            if ($_GET['search'] != '' || $_GET['kateg'] != ''){
                $where = "AND product_name LIKE '%".$_GET['search']."%' AND id_category LIKE '%".$_GET['kateg']."%' ";
            }
            $produk = mysqli_query($connect, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY id_product DESC 
             ");
            if(mysqli_num_rows($produk) > 0){
                while($p = mysqli_fetch_array($produk)){
            ?> 
            <a href="detail-produk.php?id=<?php echo $p['id_product'] ?>">        
                <div class="col-4">
                <img src="produk/<?php echo $p['product_image'] ?>">
                <p class="nama"><?php echo substr($p['product_name'], 0,30)  ?></p>
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