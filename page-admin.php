<?php
    include "connection.php";

    if (empty($_SESSION['username'])) {
        header ("Location: error.php");
        die;
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

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

    <!-- CK Editor -->
    <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>

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
                        </div><!-- end logo -->
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
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
                                <a class="nav-link color-yellow-hover active" href="page-admin.php">Post</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-aqua-hover" href="page-comment.php">Comment</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-green-hover" href="page-suggest.php">Suggestion</a>
                            </li>
                            <li class="nav-item" style="border-left: 2px solid black">
                                <a class="nav-link color-blue-hover" href="Log-out.php"><i class='fa fa-user' style="font-size: 15px;"></i>&nbsp Log out</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
<!-- NAVBAR -->

    <!-- POST ARTICLE -->
        <center>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 align-self-center">
                    <img src="images/boss.png" style="max-width: 100%" width="700px">
                </div>
                <div class="col-sm-6 align-self-center mt-2 text-sm-left">
                    <h1>Welcome Boss</h1><br><br>
                    <div class="container">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <select class="form-control" name="kategori">
                                    <option hidden>Choose Category</option>
        <?php
            $option = "SELECT * FROM kategori";
            $query = mysqli_query($connect, $option);
            while ($row = mysqli_fetch_array($query)) {
        ?>
                                    <option value="<?= $row['id_kategori'] ?>"><?= $row['kategori'] ?></option>
        <?php
            }
        ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="file" name="gambar">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Title" name="judul">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="date" name="tanggal">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Author" name="penulis">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="isi" name="isi"></textarea>
                            </div><br><br>
                            <button class="btn btn-primary" type="submit" name="btnsave">Save</button>
        <?php
            if (isset($_POST['btnsave'])) {
                $jdl = $_POST['judul'];
                $tgl = $_POST['tanggal'];
                $penulis = $_POST['penulis'];
                $isi = $_POST['isi'];
                $kategori = $_POST['kategori'];
                $gambar = $_FILES['gambar']['name'];
                $file_tmp = $_FILES['gambar']['tmp_name'];

                //Jika kolom judul tidak kosong
                if (!empty($jdl)) {
                    //Memasukkan gambar yang diupload ke folder pic
                    move_uploaded_file($file_tmp, 'pic/'.$gambar);
                    //Memasukkan data artikel ke db
                    $insert = "INSERT INTO artikel (gambar, judul, tanggal, author, isi, id_kategori) VALUES ('$gambar', '$jdl', '$tgl', '$penulis', '$isi', '$kategori')";
                    $query = mysqli_query ($connect, $insert);
        ?>          
                    <!-- Menampilkan alert -->
                    <script>
                        alert("Article added!");
                        window.location.href="page-admin.php"
                    </script>
        <?php
                    //Jika tidak dapat mengakses db
                    if (!$query) {
                        echo "Something's Wrong<br>".$insert."<br>".mysqli_error($connect);
                    }
                }
                //Jika kolom judul kosong
                else {
        ?>
                    <!-- menampilkan alert -->
                    <script>
                        alert("You haven't input any data");
                        window.location.href="page-admin.php"
                    </script>
        <?php
                }
            }
        ?>
                        </form>
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
        </center>
    <!-- POST ARTICLE -->

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

    <!-- CK Editor -->
        <script type="text/javascript">
        // Initialize
            CKEDITOR.replace('isi', {
            width: "400px",
            filebrowserUploadUrl: "upload.php"
        });
        </script>

</body>
</html>