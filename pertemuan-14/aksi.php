<?php

include 'koneksi.php';


$kode = $_POST['kode']; 
$jumlah = $_POST['jumlah'];

if (mysqli_query($conn, "CALL update_datatable('$kode','$jumlah')")) {
    
    session_start();
    $_SESSION['message'] = "Data berhasil diperbarui!";
    $_SESSION['message_type'] = "success"; 
} else {
    
    session_start();
    $_SESSION['message'] = "Terjadi kesalahan saat memperbarui data.";
    $_SESSION['message_type'] = "danger";
}

header("Location: file1.php");
exit();
?>
