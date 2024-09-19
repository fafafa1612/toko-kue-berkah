<?php

error_reporting(0);
include 'db.php';

    

    $produk = mysqli_query($connect,"SELECT * FROM tb_product WHERE id_product = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);

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

    <div class = "section">
        <div class="container">
            <h3>Detail Produk</h3>
            <div class="box-detail">
                <div class="col-2">
                    <img src="produk/<?php echo $p->product_image ?>"width="100%">
                <div class="col-2">
                    <h3><?php echo $p->product_name ?> </h3>
                    <h4>Rp. <?php echo number_format($p->product_price) ?> </h4>
                    <p> Deskripsi: <?php echo $p->product_description ?> <br>
                    
                </div>
            </div> 
            
        </div>
        
    </div>

    <div class="footer">
        <div class="container">
            <small>Copyright &copy; 2022 - Toko Kue Berkah</small>

        </div> </div>
</body>
</html>