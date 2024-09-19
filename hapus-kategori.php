<?php
include 'db.php';

if(isset($_GET['idk'])){
    $delete = mysqli_query($connect,"DELETE FROM tb_category WHERE id_category = 
    '".$_GET['idk']."' ");
    echo '<script>window.location ="data-kategori.php"</script>';
}
if(isset($_GET['idp'])){
    $produk = mysqli_query($connect, "SELECT product_image From tb_product WHERE id_product
    = '".$_GET['idp']."' ");
    $p = mysqli_fetch_object($produk);

    unlink('./produk/'.$p->product_image);

    $delete = mysqli_query($connect,"DELETE FROM tb_product WHERE id_product =
    '".$_GET['idp']."' ");
    echo '<script>window.location ="data-produk.php"</script>';
}
?>  