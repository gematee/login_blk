<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
  
    session_start();
    $id = $_SESSION['id'];
    if (!isset($_SESSION['id'])) {
        header("location:index.php");
    }
?>
<?php 
  require ("koneksi.php");
    if (isset($_GET['id_edit'])) {
        $id_edit = $_GET['id_edit'];
        $tampiledit = mysqli_query($koneksi, "select* from siswa where id='$id_edit'");
        $data = mysqli_fetch_array($tampiledit);
    } else {
        header ("location:home.php");
    }

?>
    <div class="card">
        <div class="from">
      <form action="#" method="post">
            <h1>Silahkan Edit</h1><br>
            <label for="nama">Username</label>
            <input type="text" name="nama" id="nama" value="<?php echo $data['nama']?>" ><br>
            <label for="pass">Password</label>
            <input type="text" name="password" id="password" value="<?php echo $data['password']?>"><br>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?php echo $data['email']?>"><br>
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" value="<?php echo $data['alamat']?>"><br>
            <label for="telepon">Telepon</label>
            <input type="telepon" name="telepon" id="telepon"  value="<?php echo $data['telepon']?>"><br><br>
            <input type="submit" name="submit" value="Update"><br><br>
      </form>
      </div>
    </div>
    <?php 
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $password = $_POST['password'];
            $alamat = $_POST['alamat'];
            $telepon = $_POST['telepon'];
            $email = $_POST['email'];

            $query_ubah = mysqli_query($koneksi, "update siswa set nama='$nama', password='$password',email='$email', alamat='$alamat', telepon='$telepon' where id='$id'");
            if ($query_ubah == true) {
                echo "<script>alert('Berhasil diubah!')
                window.location.replace('home.php');
                </script>";
            } else {
                echo "<script>alert('Gagal diubah!')</script>";
            }
        }
    ?>
</body>
</html>
