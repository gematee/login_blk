<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name= viewport content= width=device-width initial-scale=1>
	<title>Daftar</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php 
        require ("koneksi.php");
    ?>
<div class="container">
	<div class="logo">
		<img src="aset/naker.png"> 
	</div><br>	
	<div class="form">
		<br><br>	
		<h2>Selamat datang silahkan daftar</h2>
        <form action="" method="post">
        <label for="nama">Username</label>
		<input type="text" name="nama" placeholder="Masukan username"><br>
        <label for="password">Password</label>
		<input type="password" name="password" placeholder="Masukan password"><br>
        <label for="alamat">Alamat</label>
		<input type="text" name="alamat" placeholder="Masukan alamat"><br>
        <label for="telepon">Telepon</label>
		<input type="text" name="telepon" placeholder="Masukan No telepon"><br>
        <label for="email">Email</label>
		<input type="text" name="email" placeholder="Masukan Email"><br>
		<input type="submit" name="daftar" value="Register"><br><br>
        Sudah Punya Akun? Silahkan <a href="index.php">Login!</a>
        </form>
	</div>
</div>
    <?php 
        if (isset($_POST['daftar'])) {
            $nama = $_POST['nama'];
            $password = $_POST['password'];
            $alamat = $_POST['alamat'];
            $telepon = $_POST['telepon'];
            $email = $_POST['email'];

            $cekuser = mysqli_query($koneksi,"select * from siswa where nama='$nama'");
            if (mysqli_num_rows($cekuser) == 1) {
                echo "<script>alert('Username Sudah Ada! Silahkan Isi Username Lain!')</script>";
            } else {
                $add = mysqli_query($koneksi,"insert into siswa (nama,password,alamat,telepon,email) values ('$nama','$password','$alamat','$telepon','$email')");
                if ($add == true) {
                    echo "<script>alert('Data Berhasil Disimpan!')</script>";
                } else {
                    die ("Data Gagal Disimpan!");
                }
            }
        }
    ?>
</body>
</html>