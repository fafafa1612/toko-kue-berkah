<?php 
session_start();
include 'db.php';
if( $_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}

    $produk = mysqli_query($connect, "SELECT * FROM tb_product WHERE id_product = '".$_GET['id']."'   ");
    if(mysqli_num_rows($produk) == 0){
        echo '<script>window.location="edit-produk.php"</script>';

    }
    $p = mysqli_fetch_object($produk);

?>
<!DOCTYPE html>
<html> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Kue Berkah</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
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
        <h3>edit data produk</h3>
        <div class="box">   
            <form action="" method="POST" enctype="multipart/form-data">
                <select class="input-control" name ="kategori" required>
                    <option>-Pilih-</option>
                    <?php
                    $kategori = mysqli_query($connect, "SELECT * FROM tb_category ORDER BY id_category DESC");
                    while ($r = mysqli_fetch_array($kategori)){
                    ?>
                    <option value="<?php echo $r ['id_category']?>" <?php echo ($r ['id_category'] == $p->id_category)? 'selected': ''?> ><?php echo $r ['category_name']?></option>
                    <?php }?>
                </select>
                <input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php echo $p->product_name ?>" required>
                <input type="text" name="harga" class="input-control" placeholder="Harga Produk" value="<?php echo $p->product_price ?>" required>
                <img src="produk/php<<?php echo $p->product_image ?>" width="100px">
                <input type="hidden" name="foto" value="<<?php echo $p->product_image ?>">
                <input type="file" name="gambar" class="input-control">
                <select class="input-control" name="status" >
                <option value="">-Pilih-</option>
                <option value="1" <?php echo ($p->product_status == 1)? 'selected' :'';  ?>>Aktif</option>
                <option value="0" <?php echo ($p->product_status == 0)? 'selected' :''; ?>>Tidak aktif</option>
                </select><br>
                <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->product_description ?> </textarea><br>
                
            <input  type = "submit" name="submit" value = "Edit" class="edit-button" >
            </form>  
            <?php
            if (isset($_POST['submit'])){
               
                // data inputan dari form
                    $kategori = $_POST['kategori'];
                    $nama = $_POST['nama'];
                    $harga = $_POST['harga'];
                    $status = $_POST['status'];
                    $deskripsi = $_POST['deskripsi'];
                    $foto =  $_POST['foto'];


                // data gambar yang baru
                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];

                    $type1 = explode('.', $filename);
                    $type2 = $type1[1];

                    $newname = 'produk'.time().'.'.$type2;

                //menampung data format file yang diizinkan
                    $tipe_diizinkan =  array('jpg', 'png', 'jpeg', 'gif', 'JPG');

                // jika admin ganti gambar
                    if($filename != ''){

                    // validasi format file
                        if(!in_array($type2, $tipe_diizinkan)){
                        // jika format file tidak ada di dalam tipe di izinkan
                        echo '<script>alert("format file tidak diizinkan"</script>';

                        }else{
                        unlink('./produk/'.$foto);
                          move_uploaded_file($tmp_name,'./produk/'.$newname);
                          $namagambar = $newname;

                        }

                    }else{
                        // jika admin tidak ganti gambar
                        $namagambar = $foto;

                    }

                    // query update data produk
                    $update = mysqli_query($connect, "UPDATE tb_product SET
                                            id_category = '".$kategori."', 
                                            product_name = '".$nama."', 
                                            product_price = '".$harga."', 
                                            product_description = '".$deskripsi."', 
                                            product_image = '".$namagambar."', 
                                            product_status = '".$status."' 
                                            WHERE id_product = '".$p->id_product."' ");

                    if($update){
                            echo '<script>alert<"Ubah Data berhasil disimpan"></script>';
                            echo '<script>window.location="data-produk.php"</script>';
                        }else{
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
<script>
     CKEDITOR.replace( 'deskripsi' );
</script>
</body>
</html>