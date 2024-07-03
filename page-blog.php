<?php
    include "connection.php";

    $id_art = $_GET['id_ar'];
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
                            <a href="index.html"><img src="images/logo.png" alt=""></a>
                        </div><!-- end logo -->
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div>
<!-- HEADER -->

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area">
        <?php
                        $select = "SELECT * FROM artikel a, kategori k WHERE id_artikel = $id_art AND a.id_kategori = k.id_kategori";
                        $query = mysqli_query($connect, $select);

                        foreach ($query as $data) {
        ?>
                                <ol class="breadcrumb hidden-xs-down">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item"><?= $data['kategori']?></li>
                                    <li class="breadcrumb-item"><?= $data['judul']?></li>
                                </ol>


                                <span class="color-aqua"><a><?= $data['kategori']?></a></span>

                                <h3><?= $data['judul']?></h3>

                                <div class="blog-meta big-meta">
                                    <small><?= $data['tanggal']?></small>
                                    <small>by <?= $data['author']?></small>
                                </div><!-- end meta -->
                            </div><!-- end title -->

                            <div class="blog-content">  
                                <div class="pp">
                                    <p><?= $data['isi']?></p>
                                </div><!-- end pp -->
                            </div><!-- end content -->
<?php
                        }
?>
                            
                            <hr class="invis1">

<!-- COMMENT -->
                            <div class="custombox clearfix">
                                <h4 class="small-title">Comments</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="comments-list">
        <?php
            $show = "SELECT * FROM izin";
            $query = mysqli_query($connect, $show);

            foreach ($query as $s) {
        ?>
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4 class="media-heading user_name"><?= $s['username']?><small><?= $s['email']?></small></h4>
                                                    <p><?= $s['komentar']?></p>
                                                </div>
                                            </div>
        <?php
            }
        ?>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">Leave a Reply</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-wrapper" method="post">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="uname" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email address">
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" name="comm" placeholder="Your comment"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary" name="btncom">Submit Comment</button>
        <?php
            if (isset($_POST['btncom'])) {
                $uname = $_POST['uname'];
                $mail = $_POST['email'];
                $komen = $_POST['comm'];

                $sort = mysqli_query($connect, "SELECT * FROM akun WHERE username = '$uname' AND email = '$mail'");
                if(mysqli_num_rows($sort) != 0) {
                    $comm = "INSERT INTO komentar (username, email, komentar) VALUES ('$uname', '$mail', '$komen')";
                    $query = mysqli_query($connect, $comm);

                    if (!$query) {
                        echo "Something's wrong<br>".$comm."<br>".mysqli_error($connect);
                    }
                }
                else {
                    header("location: error.php");
                    die;
                }
            }
        ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
<!-- COMMENT -->

<!-- SIDEBAR -->
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                                <h2 class="widget-title">Recent Posts</h2>
                                <div class="blog-list-widget">
        <?php
                                $recent = "SELECT id_artikel, gambar, judul, tanggal, author, isi, kategori FROM artikel a, kategori k WHERE a.id_kategori = 4 AND k.id_kategori = 4 LIMIT 3 OFFSET 2";
                                $query = mysqli_query($connect, $recent);

                                foreach ($query as $data) {
        ?>
                                    <div class="list-group">
                                        <a href="page-blog.php?id_ar=<?=$data['id_artikel']?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="<?php echo "pic/".$data['gambar']?>" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1"><?= $data['judul'] ?></h5>
                                                <small><?=$data['tanggal']?></small>
                                            </div>
                                        </a>
                                    </div>
        <?php
                                }
        ?>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Popular Categories</h2>
                                <div class="link-widget">
                                    <ul>
        <?php
                                        $popular = "SELECT * FROM kategori WHERE id_kategori = 1 OR id_kategori = 2 OR id_kategori = 3 OR id_kategori = 4";
                                        $query = mysqli_query($connect, $popular);

                                        foreach ($query as $hasil) {
        ?>
                                            <li><a href="page-category.php?id=<?=$hasil['id_kategori']?>"> <?= $hasil['kategori']?></a></li>
        <?php
                                        }
        ?>
                                    </ul>
                                </div><!-- end link-widget -->
                            </div><!-- end widget -->
                        </div><!-- end sidebar -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
<!-- SIDEBAR -->

<!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="widget">
                    <div class="footer-text text-center">
                        <h1>Stay updated</h1>
                        <div class="social text-center">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook" style="font-size: 25px"></i></a>&nbsp              
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter" style="font-size: 25px"></i></a>&nbsp
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram" style="font-size: 25px"></i></a>&nbsp
                        </div>
                        <p>Get the latest creative handcrafted, cameramade photography content, fashion styles from independent creatives around the world.</p>
                    </div>
                </div>
            </div>
        </footer><!-- end footer -->
<!-- FOOTER -->

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
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