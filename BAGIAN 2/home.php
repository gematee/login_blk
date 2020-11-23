<!DOCTYPE html>
<html>
<head>  
	<meta charset="utf-8">
	<meta name= viewport content= width=device-width initial-scale=1>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<title>User</title>
</head>
<body>
<?php 
	require ("koneksi.php");
	session_start();
	$id = $_SESSION['id'];
    $ambil_data = mysqli_query($koneksi,"select * from siswa where id='$id'");
    $data = mysqli_fetch_assoc($ambil_data);
    $nama = $data['nama'];
    if (!isset($_SESSION['id'])) {
        header("location:index.php");
    }
?>
	<div class="main">
		<div class="logo">
			<img src="aset/naker.png"> 
		</div><br>
		<div class="wrapper">
			<h2>Selamat Datang <?php echo $nama ?>, Berikut ini adalah Data Diri Anda :</h2><br>
			<table>
				<th>Nama</th>
				<th>Password</th>
				<th>Email</th>
				<th>Telephone</th>
				<th>Alamat</th>
				<th>Update</th>
				<th>Delete</th>
        <tr>
            <td>
				<?php echo $data['nama']; ?>
            </td>
			<td>
                <?php echo $data['password']; ?>
            </td>
			<td>
               <?php echo $data['email']; ?>
            </td>
			<td>
               <?php echo $data['telepon']; ?>
            </td>
            <td>
                <?php echo $data['alamat']; ?>
            </td>
			<td>
				<a href="edit.php?id_edit=<?=$data['id']?>">Update</a>
			</td>
            <td>
               <a href="hapus.php?id_hapus=<?=$data['id']?>" onclick="return confirm('Apakah Anda yakin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
			</table>			
		</div>
		<a href="logout.php">Logout</a>
		</div>
		<?php 
			include "footer.php";
		?>
</body>
</html>