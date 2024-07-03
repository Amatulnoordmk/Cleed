<?php
    include "connection.php";

    $id_kat = $_GET['id']
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
<!-- SEARCH BAR -->
        <div class="collapse top-search" id="collapseExample">
            <div class="card card-block">
                <div class="newsletter-widget text-center">
                    <form class="form-inline" method="post" action="">
                        <input type="text" class="form-control" name="keyword" placeholder="What you are looking for?">
                        <button type="submit" class="btn btn-primary" name="cari"><i class="fa fa-search"></i></button>
                    </form>
                </div><!-- end newsletter -->
            </div>
        </div><!-- end top-search -->
        <div class="topbar-section">
            <div class="container-fluid">
                    <div class="topsearch text-right">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-search"></i> Search</a>
                    </div><!-- end search -->
                </div><!-- end col -->
            </div>
        </div>
<!-- SEARCH BAR -->

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
                                <a class="nav-link color-red-hover" href="index.php">Home</a>
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
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
<!-- NAVBAR -->

        <div class="page-title wb">
            <div class="container">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2>
    <?php
        switch ($id_kat) {
            case 1: echo "<i class='fa fa-shopping-bag bg-pink'></i> Fashion</h2>";
                break;
            case 2: echo "<i class='fa fa-spoon bg-red'></i> Food</h2>";
                break;
            case 3: echo "<i class='fa fa-leaf bg-aqua'></i> Lifestyle</h2>";
                break;
            case 4: echo "<i class='fa fa-paint-brush bg-pink'></i> Design</h2>";
                break;
            case 5: echo "<i class='fa fa-car bg-green'></i> Travel</h2>";
                break;
            case 6: echo "<i class='fa fa-building bg-grey'></i> Architecture</h2>";
                break;
            case 7: echo "<i class='fa fa-heartbeat bg-red'></i> Health</h2>";
                break;
        }
    ?>
                </div><!-- end col --> 
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-list clearfix">

<!-- ARTICLE -->
    <?php
        if(isset($_POST['cari'])){
            $key = $_POST['keyword'];
            $query2 = mysqli_query($connect, "SELECT * FROM artikel WHERE judul LIKE  '%".$key."%'"); 
        }
        else {
            $show = "SELECT * FROM artikel a, kategori k WHERE a.id_kategori = $id_kat AND k.id_kategori = $id_kat";
            $query2 = mysqli_query($connect, $show);

            foreach ($query2 as $data) {
    ?>
                                    <div class="blog-box row">
                                        <div class="col-md-4">
                                            <div class="post-media">
                                                <a href="page-blog.php?id_ar=<?=$data['id_artikel']?>">
                                                    <img src="<?php echo "pic/".$data['gambar']?>" alt="" class="img-fluid">
                                                    <div class="hovereffect"></div>
                                                </a>
                                            </div><!-- end media -->
                                        </div><!-- end col -->
                                        <div class="blog-meta big-meta col-md-8">
                                            <h4><a href="page-blog.php?id_ar=<?=$data['id_artikel']?>"><?= $data['judul'] ?></a></h4>
                                            <p><?php echo substr($data['isi'], 0, 120) ?>.....</p>
                                            <small><?=$data['kategori']?></small>
                                            <small><?=$data['tanggal']?></small>
                                            <small>by <?=$data['author']?></small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                <hr class="invis">
    <?php
            }
        }

        while ($h = mysqli_fetch_array($query2)) {
    ?>                   
                                    <div class="blog-box row">
                                        <div class="col-md-4">
                                            <div class="post-media">
                                                <a href="page-blog.php?id_ar=<?=$h['id_artikel']?>">
                                                    <img src="<?php echo "pic/".$h['gambar']?>" alt="" class="img-fluid">
                                                    <div class="hovereffect"></div>
                                                </a>
                                            </div><!-- end media -->
                                        </div><!-- end col -->
                                        <div class="blog-meta big-meta col-md-8">
                                            <h4><a href="page-blog.php?id_ar=<?=$h['id_artikel']?>"><?= $h['judul'] ?></a></h4>
                                            <p><?php echo substr($h['isi'], 0, 120) ?>.....</p>
                                            <small><?=$h['kategori']?></small>
                                            <small><?=$h['tanggal']?></small>
                                            <small>by <?=$h['author']?></small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                <hr class="invis">
    <?php
        }
    ?>     
                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->  
<!-- ARTICLE -->
                        <hr class="invis">
                    <div class="row">
                        </div><!-- end row -->
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
        </footer>
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