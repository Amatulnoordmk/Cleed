<?php
    include "connection.php";

    $id_user = $_GET['id'];

    if (empty($_SESSION['username'])) {
        header ("Location: error.php");
        die;
    }
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
                                <a class="nav-link color-red-hover active" href="page-member.php?id=<?=$id?>">Home</a>
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
                                <a class="nav-link color-yellow-hover" href="page-profile.php?id_user=<?=$id_user?>"><i class='fa fa-star' style="font-size: 15px;"></i>&nbsp Profile</a>
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

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="section-title">
                            <h3 class="color-aqua"><a href="#">Lifestyle</a></h3>
                        </div><!-- end title -->

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php
                                $show = "SELECT id_artikel, gambar, judul, tanggal, author, isi, kategori FROM artikel a, kategori k WHERE a.id_kategori = 3 AND k.id_kategori = 3 LIMIT 2";
                                $query = mysqli_query($connect, $show);

                                foreach ($query as $data) {
        ?>
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="page-blog.php?id_ar=<?=$data['id_artikel']?>">
                                            <img src="<?php echo "pic/".$data['gambar']?>" class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta big-meta">
                                        <h4><a href="page-blog.php?id_ar=<?=$data['id_artikel']?>" title=""><?= $data['judul'] ?></a></h4>
                                        <p><?php echo substr($data['isi'], 0, 150)?>. . .</p>
                                        <small><?= $data['kategori']?></small>
                                        <small><?= $data['tanggal']?></small>
                                        <small>by <?=$data['author']?></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                <hr class="invis">
        <?php
                                }
        ?>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="section-title">
                            <h3 class="color-pink"><a href="#">Fashion</a></h3>
                        </div><!-- end title -->
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <?php
                                $show2 = "SELECT id_artikel, gambar, judul, tanggal, kategori FROM artikel a, kategori k WHERE a.id_kategori = 1 AND k.id_kategori = 1 LIMIT 3";
                                $query2 = mysqli_query($connect, $show2);

                                foreach ($query2 as $data) {
        ?>
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="page-blog.php?id_ar=<?=$data['id_artikel']?>">
                                            <img src="<?php echo "pic/".$data['gambar']?>"class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <h4><a href="page-blog.php?id_ar=<?=$data['id_artikel']?>"><?= $data['judul'] ?></a></h4>
                                        <small><?= $data['kategori']?></small>
                                        <small><?= $data['tanggal']?></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                <hr class="invis">
        <?php
                                }
        ?>
                            </div><!-- end col -->

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <?php
                                $show3 = "SELECT id_artikel, gambar, judul, tanggal, kategori FROM artikel a, kategori k WHERE a.id_kategori = 1 AND k.id_kategori = 1 LIMIT 3 OFFSET 3";
                                $query3 = mysqli_query($connect, $show3);

                                foreach ($query3 as $data) {
        ?>
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="page-blog.php?id_ar=<?=$data['id_artikel']?>">
                                            <img src="<?php echo "pic/".$data['gambar']?>" class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <h4><a href="page-blog.php?id_ar=<?=$data['id_artikel']?>"><?= $data['judul'] ?></a></h4>
                                        <small><?= $data['kategori']?></small>
                                        <small><?= $data['tanggal']?></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->

                                <hr class="invis">
        <?php
                                }
        ?>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->

               <hr class="invis1">

                <div class="row">
                    <div class="col-lg-9">
                        <div class="blog-list clearfix">
                            <div class="section-title">
                                <h3 class="color-green"><a href="#">Travel</a></h3>
                            </div><!-- end title -->
        <?php
                                $show4 = "SELECT id_artikel, gambar, judul, tanggal, author, isi, kategori FROM artikel a, kategori k WHERE a.id_kategori = 5 AND k.id_kategori = 5 LIMIT 3";
                                $query4 = mysqli_query($connect, $show4);

                                foreach ($query4 as $data) {
        ?>
                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="page-blog.php?id_ar=<?=$data['id_artikel']?>">
                                                <img src="<?php echo "pic/".$data['gambar']?>" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <h4><a href="page-blog.php?id_ar=<?=$data['id_artikel']?>"><?= $data['judul'] ?></a></h4>
                                        <p><?php echo substr($data['isi'], 0, 120)?>. . .</p>
                                        <small><?= $data['kategori']?></small>
                                        <small><?= $data['tanggal']?></small>
                                        <small>by <?=$data['author']?></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                            <hr class="invis">
        <?php
                                }
        ?>
                        </div><!-- end blog-list -->
                    </div><!-- end col -->

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
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>