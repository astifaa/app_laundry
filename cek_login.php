
<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'config/koneksi.php';

// menangkap data yang dikirim dari form login
$username = htmlspecialchars($_POST['username']);

//enkripsi password menggunakan md5
$password = htmlspecialchars(md5($_POST['password']));


// menyeleksi data user dengan username  yang sesuai
$login = mysqli_query($kon,"SELECT * FROM tb_user WHERE username='$username'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username  di temukan pada database
if ( $cek === 1 ) {
	
	//jalankan seleksi password
	$data = mysqli_fetch_assoc($login);
	$cek_pass = $data['password'];



	//jika password tidak sama , maka password salah
	if($cek_pass <> $password){

		echo "<script>alert('password anda salah')</script>";
		echo "<script>document.location.href='login.php'</script>";

	}else{



		//jika password benar , maka akan diseleksi data hak akses
		if ($data['role']=="owner" ) {
			
			$_SESSION['username']=$username;
			//session untuk, agar bisa memunculkan data lain selain username password di pageAdmin
			$_SESSION['id_user'] = $data['id_user'];
			//session untuk menampilkan sweet alert
			echo "<script>alert('Anda Berhasil Login Page Owner!')</script>";
			echo "<script>document.location.href='pageOwner.php?page=dashboard'</script>";

		}else if ($data['role']=="admin") {

			$_SESSION['username'] = $username;
			$_SESSION['id_user'] = $data['id_user'];
  			// alihkan ke halaman dashboard pegawai
			echo "<script>alert('Anda Berhasil Login Page Admin!')</script>";
			echo "<script>document.location.href='pageAdmin.php?page=dashboard'</script>";

		}else if ($data['role']=="kasir") {

			$_SESSION['username'] = $username;
			$_SESSION['id_user'] = $data['id_user'];
  			// alihkan ke halaman dashboard pegawai
			echo "<script>alert('Anda Berhasil Login Page Kasir!')</script>";
			echo "<script>document.location.href='pageKasir.php?page=dashboard'</script>";
		}
	}




}else{
	//jika tidak ditemukan username , maka salah
	echo "<script>alert('Username Anda Salah')</script>";
	echo "<script>document.location.href='login.php'</script>";
}
?>