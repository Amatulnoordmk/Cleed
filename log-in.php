<?php
	include "connection.php";

	if(isset($_POST['btnlogin'])) {
		$user_lgn = $_POST['pengguna'];
		$pass_lgn = md5($_POST['sandi']);

		//Cek db username yang sama
		$enter = "SELECT * FROM akun WHERE username = '$user_lgn'";
		$query = mysqli_query($connect, $enter);
		$count = mysqli_num_rows($query);

		//Jika tidak dapat mengakses db
		if(!$query) {
			echo "OOPS! SOMETHING WRONG :(<br>".$enter."<br>".mysqli_error($connect);
		}
		
		//Jika tidak ditemukan username yang sama
		if ($count != 0) {
			while ($row = mysqli_fetch_array($query)) {
				$n = $row['nama'];
				$u = $row['username'];
				$e = $row['email'];
				$p = $row['password'];
				$l = $row['level'];
				$id = $row['id_user'];

				//Jika password sama
				if ($pass_lgn == $p) {
					if ($l == 1) {
						header("location: page-admin.php?id=".$id);
						$_SESSION['nama'] = $n;
						$_SESSION['username'] = $u;
						$_SESSION['email'] = $e;
						$_SESSION['level'] = $l;
						$_SESSION['id_user'] = $id;
						die;
					}
					elseif ($l == 2) {
						header ("location: page-member.php?id=".$id);			
						$_SESSION['nama'] = $n;
						$_SESSION['username'] = $u;
						$_SESSION['email'] = $e;
						$_SESSION['level'] = $l;
						$_SESSION['id_user'] = $id;
						die;
					}
				}
				else {
					header ("location: wrong_pass.php");
					die;
				}
			}			
		}
		else {
			header ("location: wrong_user.php");
			die;
		}
	}
	//Menghentian koneksi ke db
	mysqli_close($connect);
?>