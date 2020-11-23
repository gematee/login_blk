<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<meta charset="utf-8">
	<meta name= viewport content= width=device-width initial-scale=1>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php 
        require ("koneksi.php");
        session_start();
    ?>
        <div class="container">
            <div class="logo">
                <img src="aset/naker.png">
            </div><br>	
            <div class="form">
                <br><br><br>	
                <h2>Selamat datang silahkan Login</h2>
                <form action="" method="post">
                <label for="nama">Username</label>
                <input type="text" name="nama" placeholder="Masukan username"><br>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Masukan password"><br>
                <input type="submit" name="login" value="Login"><br><br>
                <p style="padding-top: 10px; color: white; text-decoration: none;">
                Belum Punya Akun? Silahkan<a href="daftar.php">Register!</a>
            </p>
                </form>
            </div>
        </div>
    <?php 
        if(isset($_POST['login'])) {
            $nama = $_POST['nama'];
            $password = $_POST['password'];

            $cekuser = mysqli_query($koneksi,"select * from siswa where nama='$nama'");
            if (mysqli_num_rows($cekuser) == 1) {
                $data = mysqli_fetch_array($cekuser);
                if ($password = $data['password']) {
                    session_start();
                    $_SESSION['id'] = $data['id'];
                    header ("location:home.php");
                } else {
                    echo "<script>alert('Password Anda Salah!')</script>";
                    }
                } else {
                    echo "<script>alert('Username tidak terdaftar')</script>";
                }
            }
    ?>
</body>
</html>