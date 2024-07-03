<?php
	include "connection.php";

	$id_p = $_GET['id_user'];
?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>Cleed - Stylish Magazine</title>
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

    <!-- Custom styles -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive styles -->
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Colors -->
    <link href="css/colors.css" rel="stylesheet">

</head>
<body>

<!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="images/loader.gif" alt="">
    </div>
<!-- LOADER -->

	<div id="wrapper">
<!-- HEADER -->
        <div class="header-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo">
                            <a href="index.php"><img src="images/logo.png" alt=""></a>
                        </div>
                    </div>
                </div><!-- end row -->
            </div><!-- end header-logo -->
        </div>
<!-- HEADER -->

<!-- NAVBAR -->
        <header class="header">
            <div class="container">
                <nav class="navbar navbar-inverse navbar-toggleable-md">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cloapediamenu" aria-controls="cloapediamenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-md-center" id="cloapediamenu">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link color-red-hover" href="page-member.php?id=<?=$id_p?>">Home</a>
                            </li>
        <?php
                            $kategori = "SELECT * FROM kategori";
                            $query = mysqli_query($connect, $kategori);

                            foreach ($query as $d) {
        ?>
                            <li class="nav-item">
                                <a class="nav-link color-pink-hover" href="page-category.php?id=<?=$d['id_kategori']?>" ><?=$d['kategori']?></a>
                            </li>
        <?php
                            }
        ?>
                            <li class="nav-item">
                                <a class="nav-link color-aqua-hover" href="page-contact.php">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-yellow-hover active" href="page-profile.php?id_user=<?=$id_p?>"><i class='fa fa-star' style="font-size: 15px;"></i>&nbsp Profile</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
<!-- NAVBAR -->

	<?php
		$ubah = "SELECT * FROM akun WHERE id_user = $id_p";
		$query = mysqli_query($connect, $ubah);

		foreach ($query as $h) {
	?>

		<div class="container">
			<form method="post">
				<div class="form-group">
					<label>Name</label>
					<input class="form-control" type="text" name="ubahnama" value="<?=$h['nama']?>">
				</div>
				<label>Username</label>
				<div class="form-group">
					<input class="form-control" type="text" name="ubahuname" value="<?=$h['username']?>">
				</div>
				<label>Email</label>
				<div class="form-group">
					<input class="form-control" type="email" name="ubahemail" id="email" value="<?=$h['email']?>">
				</div>
				<button class="btn btn-primary" type="submit" name="btnubah">Change</button>
                <button class="btn" type="submit" name="btnhapus">Delete account</button>
			</form>
		</div>
	<?php
		}

		if (isset($_POST['btnubah'])) {
			$nama = $_POST['ubahnama'];
			$uname = $_POST['ubahuname'];
			$email = $_POST['ubahemail'];

			$ubah = "UPDATE akun SET nama = '$nama', username ='$uname', email = '$email' WHERE id_user = '$id_p'";
			$query = mysqli_query($connect, $ubah);

			if(!$query) {
				echo "OOPS! SOMETHING WRONG :(<br>".$ubah."<br>".mysqli_error($connect);
			}

			header ("location: page-member.php?id=".$id_p);
		}

        if (isset($_POST['btnhapus'])) {

            $del = "DELETE FROM akun WHERE id_user = $id_p";
            $query = mysqli_query($connect, $del);
    ?>
            <script>
                alert("Account Deleted");
                window.location.href="index.php"
            </script>
    <?php
            if (!$query) {
                echo "Something's Wrong<br>".$del."<br>".mysqli_error($connect);
            }
        }
	?>
	</div>

	<script src="js/jquery.min.js"></script>
    <script src="js/jquery.email-autocomplete.min.js"></script>
    <script>
        $("#email").emailautocomplete({
        domains: ["gmail.com", "yahoo.com"]
        });
    </script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>