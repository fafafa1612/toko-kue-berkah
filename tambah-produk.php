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
        <h3>Tambah data</h3>
        <div class="box">   
            <form action="" method="POST" enctype="multipart/form-data">
                <select class="input-control" name ="kategori" required>
                    <option>-Pilih-</option>
                    <?php
                    $kategori = mysqli_query($connect, "SELECT * FROM tb_category ORDER BY id_category DESC");
                    while ($r = mysqli_fetch_array($kategori)){
                    ?>
                    <option value="<?php echo $r ['id_category']?>"> <?php echo $r ['category_name']?></option>
                    <?php }?>
                </select>
                <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                <input type="text" name="harga" class="input-control" placeholder="Harga Produk" required>
                <input type="file" name="gambar" class="input-control"  required>
                <select class="input-control" name="status" >
                <option value="">-Pilih-</option>
                <option value="1">Aktif</option>
                <option value="0">Tidak aktif</option>
                </select><br>
                <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br>
                
            <input  type = "submit" name="submit" value = "tambahkan" class="edit-button" >
            </form>  
            <?php
            if (isset($_POST['submit'])){
              // print_r($_FILES['gambar']);
              //menampung inputan dari form
              $kategori = $_POST['kategori'];
              $nama = $_POST['nama'];
              $harga = $_POST['harga'];
              $status = $_POST['status'];
              $deskripsi = $_POST['deskripsi'];

              //menampung data format file yang ingin diupload
              $filename = $_FILES['gambar']['name'];
              $tmp_name = $_FILES['gambar']['tmp_name'];

              $type1 = explode('.', $filename);
              $type2 = $type1[1];

              $newname = 'produk'.time().'.'.$type2;
              
              //menampung data format file yang diizinkan
              $tipe_diizinkan =  array('jpg', 'png', 'jpeg', 'gif', 'JPG');

              //validasi format file
              if(!in_array($type2, $tipe_diizinkan)){
                
                echo '<script>alert("format file tidak diizinkan"</script>';
              }else{
                move_uploaded_file($tmp_name,'./produk/'.$newname);

              }


              $insert = mysqli_query($connect, "INSERT INTO tb_product VALUES (
                null, '".$kategori."','".$nama."','".$harga."','".$deskripsi."','".$newname."','".$status."', null)");
                if($insert){
                    echo '<script>alert<"Data berhasil disimpan"></script>';
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