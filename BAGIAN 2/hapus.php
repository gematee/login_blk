<?php 
    require ("koneksi.php");
    session_start();
    $id = $_SESSION['id'];
  
    if (!isset($_SESSION['id'])) {
        header("location:index.php");
    }
    if (isset($_GET['id_hapus'])){
        $id_hapus = $_GET['id_hapus'];
        if ($id_hapus== $id){
            $hapus = mysqli_query($koneksi,"delete from siswa where id='$id_hapus'");
        if ($hapus) {
           echo "<script>
                alert('Data Telah Dihapus!');
                window.location.replace('hapuslogout.php');
                </script>";
        }else {
            die ("gagal menghapus...");
        }
        }else {
            $hapus = mysqli_query($koneksi,"delete from siswa where id='$id_hapus'");
        if ($hapus) {
           echo "<script>
                alert('Data Telah Dihapus!');
                window.location.replace('hapuslogout.php');
                </script>";
        }else {
            die ("gagal menghapus...");
        }
        }
        
    } else {
        header ("location:link1.php");
    }
?>