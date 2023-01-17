<?php
include('connect.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>กองบริการการศึกษา มหาวิทยาลัยพะเยา</title>


    <link href="assets\img\news-2\logoup.png" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=K2D:wght@200&display=swap" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/news-2.css" rel="stylesheet">
    <link href="assets/css/lightbox.min.css" rel="stylesheet">
    <link href="assets/css/lightbox.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1 class="text-light"><a href="index.php"><span><img src="assets\img\news-2\logo.png" alt=""></span></a></h1>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="index.php">Home</a></li>
                    <li class="dropdown"><a href="#"><span>Departments</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="Management-structure.php">Management structure</a></li>
                            <li><a href="office.php">Personnel</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="Academic.php">Academic service information</a></li>
                    <li><a class="nav-link scrollto" href="Education.php">Education Services Division</a></li>
                    <li><a class="nav-link scrollto" href="https://docs.google.com/forms/d/e/1FAIpQLSfE_X-gBOcnIvbq24RfTCJOeBRVXWz-e4Zw6iz5E7k-QqMTBw/viewform"target="_blank">Complaint</a></li>
                    <li><a class="nav-link scrollto" href="contact.php">Contact</a></li>
                </ul>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->
    <section id="home">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10 wow fadeIn" data-wow-delay="0.3s">
                        <h1 class="text-upper">News Details</h1>
                        <h5 class="text-upper">
                            News Details Educational Service Division</h5>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section wb">
        <div class="container">
            <?php
            $query = mysqli_query($con, "SELECT * FROM does2020.news_dtl
            INNER JOIN does2020.news_pic
            ON does2020.news_pic.n_dtl_id = does2020.news_dtl.id
            where does2020.news_dtl.id = '" . $_GET['id'] . "'");
            $loop1 = 1;
            while ($result = mysqli_fetch_array($query)) {
                $pic = json_decode($result['n_pic'], true);
            ?>
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area">
                                <h3><?= $result['n_title_th'] ?></h3>
                                <div class="title-section text-center">
                                    <span></span>
                                </div>
                            </div><!-- end title -->

                            <div class="blog-meta big-meta">
                                <small><a href="#" title=""><i class="fa fa-bars"><samp>⠀</samp></i>หมวดหมู่ : หัวข้อข่าว 1 </a></small>
                                <small><a href="#" title=""><i class="fa fa-clock-o"><samp>⠀</samp></i>29 July, 2022</a></small>
                                <small_2><a href="#" title=""><i class="fa fa-eye"><samp>⠀</samp></i> 1234</a></small_2>
                            </div><!-- end meta -->

                            <div class="single-post-media">
                                <img src="https://does.up.ac.th/public/storage/<?= $pic[0] ?>">
                            </div><!-- end media -->


                            <div class="blog-content">
                                <div class="pp">
                                    <p><?= $result['n_text_th'] ?></p>

                                </div><!-- end pp -->
                            </div><!-- end content -->


                            <div class="image-gallery">
                                <?php for ($i = 0; $i <= count($pic); $i++) {
                                ?>
                                    <a href="https://does.up.ac.th/public/storage/<?= $pic[$i] ?>" data-lightbox="roadtrip" data-title="">
                                        <img src="https://does.up.ac.th/public/storage/<?= $pic[$i] ?>" alt="" />
                                    </a>


                                <?php
                                }
                                ?>
                            </div>

                            <div class="blog-title-area">
                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><img src="assets\img\news-2\imgFB\facebook.png">
                                                <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><img src="assets\img\news-2\imgFB\twitter.png">
                                                <span class="down-mobile">Tweet on Twitter</span></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="banner-spot clearfix">
                                        <div class="banner-img">
                                            <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                                        </div><!-- end banner-img -->
                                    </div><!-- end banner -->
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                                <h2 class="widget-title">About Us</h2>
                                <div class="title-section text-center">
                                    <span></span>
                                    <p>Educational Service Division <br> University of Phayao</p>

                                    <!--AGENCY-->
                                </div>
                                <div class="widget">
                                    <h2 class="widget-title">Popular Categories</h2>
                                    <div class="title-section text-center">
                                        <span></span>
                                        <!--AGENCY-->
                                    </div>
                                    <div class="link-widget">
                                        <ul>
                                            <li><a href="#">หัวข้อข่าว 1 </a></li>
                                            <li><a href="#">หัวข้อข่าว 2 </a></li>
                                            <li><a href="#">หัวข้อข่าว 3 </a></li>
                                            <li><a href="#">หัวข้อข่าว 4 </a></li>
                                            <li><a href="#">หัวข้อข่าว 5 </a></li>
                                            <li><a href="#">หัวข้อข่าว 6 </a></li>
                                            <li><a href="#">หัวข้อข่าว 7 </a></li>
                                        </ul>
                                    </div><!-- end link-widget -->
                                </div><!-- end widget -->

                            </div><!-- end sidebar -->
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div>
            <?php
                if ($loop1 == 1) {
                    break;
                }
                $loop1++;
            }
            ?>
        </div><!-- end container -->
    </section>

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>About Us</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="https://www.facebook.com/updoes">Educational
                                    service divisio <br>university of phayao</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="https://goo.gl/maps/h8n8afunR3YR83qh7%22%3E19">Moo 2, Mae Ka Subdistrict, Mueang
                                    District, Phayao Province 56000
                                    0 5446 6666 Ext.1029</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Online Service</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Email for personnel - students (UP Mail)</a>
                            </li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Online Leave</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Licensed software services for personnel
                                    <br> and
                                    students</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Change the password for using the network
                                    system and
                                    e-mail</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">System E-Learning</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Other agencies</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Division of genrral affaairs</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Staff Division</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Treasury Division</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Premises Division</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Student Affairs Division</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Planning Division</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Research Administration Division</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <div class="social-links mt-3">
                            <a href="https://www.facebook.com/updoes" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="https://www.youtube.com/channel/UCZ_WGJ7rsIrGzvz3e-vqGNA" class="youtube"><i class="bx bxl-youtube"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!--Footer-->
        <div class="container py-4">
            <div class="copyright">
                <strong><span>Copyright 2020 © division of educational services University of phayao.</span></strong>
            </div>
            <div class="credits">
            </div>
        </div>
    </footer><!-- End Footer -->



    <script src="assets\js\lightbox-plus-jquery.min.js"></script>
</body>

</html>