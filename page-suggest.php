<?php
	include "connection.php";
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
    <script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

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
                                <a class="nav-link color-yellow-hover" href="page-admin.php">Post</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-aqua-hover" href="page-comment.php">Comment</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-green-hover active" href="page-suggest.php">Suggestion</a>
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

		<div class="custombox clearfix">
            <h4 class="small-title">Suggestion</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="comments-list">
        <?php
            $show = "SELECT * FROM review";
            $query = mysqli_query($connect, $show);

            foreach ($query as $r) {
        ?>
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading user_name"><?= $r['name']?><small><?= $r['email']?></small></h4>
                                    <small><?=$r['subjek']?></small>
                                    <p><?= $r['review']?></p>
                                </div>
                            </div>
        <?php
            }
        ?>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end custom-box -->

	</div>

	<script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>