<?php 
session_start();
include 'db.php';
if( $_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}
$query = mysqli_query($connect, "SELECT * FROM tb_admin WHERE id_admin = '".$_SESSION['id']."'");
$d = mysqli_fetch_object($query);
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
        <h3>Ubah Profil</h3>
        <div class="box">   
            <form action="" method="POST">
            <input type="text" name="nama" placeholder = "Nama admin" class="input-control"  value ="<?php echo $d->admin_name?>"
            required>
            <input type="text" name="user" placeholder = "username" class="input-control"  value ="<?php echo  $d->username ?>"
            required>
            <input  type = "submit" name="submit" value = "edit profile" class="edit-button" >
            </form>
            <?php
            if(isset($_POST['submit'])){
                $nama = $_POST ['nama'];
                $username = $_POST ['user'];

                
                $update = mysqli_query($connect, "UPDATE tb_admin SET 
                admin_name = '".$nama."', 
                username = '".$username."'  
                WHERE id_admin = '".$d->id_admin."' ");
            if($update){
                echo '<script>alert("Ubah data berhasil"</script>';
                echo '<script>window.location="profil.php"</script>';

            }else{
                echo 'gagal' .mysqli_error($connect);
            }
        }
            ?>
            
    </div>
    <h3>Ubah password</h3>
        <div class="box">   
            <form action="" method="POST">
            <input type="password" name="pass1" placeholder = "Password yang ingin diubah" class="input-control"  
            required>
            <input type="password" name="pass2" placeholder = "Konfirmasi Password yang ingin diubah" class="input-control"  
            required>
            <input  type = "submit" name="ubah_pass" value = "edit password" class="edit-button1">
            </form>
            <?php
            if(isset($_POST['ubah_pass'])){
                $pass1  = $_POST ['pass1'];
                $pass2 = $_POST ['pass2'];
                if($pass2 != $pass1){
                    echo '<script>alert("Pengubahan gagal")</script>';
                }    
                else{
                    $update_pass = mysqli_query($connect, "UPDATE tb_admin SET 
                password = '".MD5 ($pass1)."'  
                WHERE id_admin = '".$d->id_admin."' ");
                if($update_pass){
                    echo '<script>alert("Ubah data berhasil"</script>';
                    echo '<script>window.location="profil.php"</script>';}
                else{
                    echo 'gagal' .mysqli_error($connect);
                }
                }
                }
                ?>
            
    </div>
</div>
<div class= "footer">
    <div class= "container">
        <small>Copyright &copy; 2022 - Toko Kue Berkah</small>
</div>
            </div>

</body>
</html>