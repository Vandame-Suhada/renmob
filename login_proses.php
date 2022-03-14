<?php session_start();
include("koneksi.php");
if(!$_POST['username'] || !$_POST['password']){
	echo "<script>alert('Data tidak boleh ada yang kosong !')</script>";	
	echo "<meta http-equiv='refresh' content='0;login.php'>";		
}else {
	$sql = "Select * from user where username='$_POST[username]' And password='".md5($_POST['password'])."'";
	$proses = mysqli_query($kon,$sql);
	$data = mysqli_fetch_array($proses);
	$login = mysqli_num_rows($proses);
	if ($login==0){
		echo "<script>alert('Password Anda salah !')</script>";
		echo "<meta http-equiv='refresh' content='0;login.php'>";
	}else{
		$_SESSION['username'] =$data['username'];
		echo "<script>alert('Selamat Login Berhasil')</script>";
		echo "<meta http-equiv='refresh' content='0;index.php'>";
	}
}
?>