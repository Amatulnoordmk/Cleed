<?php
	include "connection.php";

	if (isset($_POST['btnregis'])) {
		$nama = $_POST['nama'];
		$username = $_POST['pengguna'];
		$email = $_POST['email'];
		$password = md5($_POST['sandi']);
		$level = 2;

		//Jika kolom username tidak kosong
		if (!empty($username)) {
			//Cek db username/password yang sama
			$check = mysqli_query($connect, "SELECT * FROM akun WHERE username = '$username' or password = '$password'");
			$count = mysqli_num_rows($check);

			//Kalau tidak ada username/password yang sama
			if ($count == 0) {
				//Memasukkan data user ke db
				$signup = "INSERT INTO akun (nama, username, email, password, level) VALUES ('$nama', '$username', '$email', '$password', $level)";
				$query = mysqli_query($connect, $signup);
?>
				<script>
                    alert("Registration Succeed!\nTry login into your account");
                    window.location.href="index.php"
                </script>
<?php
				$_SESSION['nama'] = $nama;
				$_SESSION['username'] = $username;
				$_SESSION['email'] = $email;

				//Jika tidak dapat mengakses db
				if (!$query) {
					echo "Something's wrong<br>".$signup."<br>".mysqli_error($connect);
				}
			}
			//Kalau ada username/password yang sama
			else {
?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>Cloapedia - Stylish Magazine Blog Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,400i,500,700" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet"> 

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="css/colors.css" rel="stylesheet">

</head>
<body>

<center>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-8 mt-5">
			<img src="images/exist.png" style="max-width: 100%" width="650px">
		</div>
		<div class="col-sm-4 align-self-center mt-2 text-sm-left">
			<h1>Oops!</h1>
			<h3>Username/password has been taken</h3>
			<p><a href="index.php">Back to homepage &nbsp&nbsp<i class="fa fa-angle-right"></i></a></p>
		</div>
	</div><!-- end row -->
</div><!-- end container -->
</center>

</body>
</html>
<?php
				die;
			}
		}
		//Jika kolom username kosong
		else {
?>
			<script>
				alert("You haven't input any data");
				window.location.href="index.php";
			</script>
<?php

		}
	}
	//Menghentikan koneksi ke db
	mysqli_close($connect);
?>