<?php
include('connect.php');

$perpage = 15;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

$start = ($page - 1) * $perpage;

$sql = "SELECT COUNT(*) as total FROM does2020.news_dtl INNER JOIN does2020.news_pic ON does2020.news_pic.n_dtl_id = does2020.news_dtl.id";

$query = mysqli_query($con, $sql);

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$total_rows = $row['total'];

$total_pages = ceil($total_rows / $perpage);

?>

<?php 

$sql = "SELECT * FROM news_mas";
$result = mysqli_query($con, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>กองบริการการศึกษา มหาวิทยาลัยพะเยา</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets\img\news\logoup.png" rel="icon">

  <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=K2D:wght@200&display=swap" rel="stylesheet">

  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/news.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="index.php"><span><img src="assets\img\news\logo.png" alt=""></span></a></h1>
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
          <div class="col-md-4"></div>
          <div class="col-md-40 wow fadeIn" data-wow-delay="0.3s">
            <h1 class="text-upper">News</h1>
            <h5 class="text-upper">
              News and Events Education Services Division University of Phayao</h5>
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </div>
  </section>

  <div class="title-section text-center">
    <h1>News</h1>
    <p>Categories</p>
    <span></span>
  </div>


  <div class="wrapper">
    <!-- filter Items -->
    <nav>
      <div class="items">
        <span class="item active" data-name="all">All</span>
        <span class="item" data-name="กิจกรรมการเรียนการสอนรายวิชาในหมวดวิชาศึกษาทั่วไป">กิจกรรมการเรียนการสอนรายวิชาในหมวดวิชาศึกษาทั่วไป</span>
        <span class="item" data-name="ข่าวกิจกรรมกองบริการการศึกษา">ข่าวกิจกรรมกองบริการการศึกษา</span>
        <span class="item" data-name="ข่าวประกาศ">ข่าวประกาศ</span>
        <span class="item" data-name="จดหมายข่าวกองบริการการศึกษา">จดหมายข่าวกองบริการการศึกษา</span>
        <span class="item" data-name="ประชาสัมพันธ์งานรับเข้า">ประชาสัมพันธ์งานรับเข้า</span>
        <span class="item" data-name="ข่าวประชาสัมพันธ์">ข่าวประชาสัมพันธ์</span>

      </div>
    </nav>
    <!-- filter Images -->

    <div class="gallery">


      <div class="gallery">


        <ul class="cards">
          <?php
          $query = mysqli_query($con, "SELECT * , does2020.news_dtl.id as key_  FROM does2020.news_dtl
            INNER JOIN does2020.news_pic
            ON does2020.news_pic.n_dtl_id = does2020.news_dtl.id
            order by does2020.news_dtl.id DESC LIMIT " . ($start) . ", $perpage ");
          $loop1 = 1;
          while ($result = mysqli_fetch_array($query)) {
            $pic = json_decode($result['n_pic'], true);
          ?>
            <li class="cards_item"data-name="">
              <div class="card">
                <div class="card_image"><img src="https://does.up.ac.th/public/storage/<?= $pic[0] ?>"></div>
                <div class="card_content">
                  <h2 class="card_title"><?= $result['n_title_th'] ?></h2>
                  <p class="card_text"><?= $result['n_text_th'] ?></p>
                  <div class="newpage">
                    <a class="btn card_btn" href="news-2.php?id=<?= $result['key_'] ?>" target="_blank">Read More</a>
                  </div>
                </div>
              </div>
            </li>
          <?php
            // if ($loop1 == 12) {
            //     break;
            // }
            $loop1++;
          }
          ?>
        </ul>
      </div>
    </div>

    <?php
    $sql2 = "SELECT COUNT(*) as total FROM does2020.news_dtl INNER JOIN does2020.news_pic ON does2020.news_pic.n_dtl_id = does2020.news_dtl.id";
    $query2 = mysqli_query($con, $sql2);
    $total_record = mysqli_num_rows($query2);
    $total_page = ceil($total_record / $perpage);
    ?>


  <!------------------------------------------------------------------------------------>  


  

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item <?php if($page == 1){echo 'disabled';} ?>">
      <a class="page-link" href="?page=<?php echo $page-1; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    
  <!------------------------------------------------------------------------------------>   
   
   
  <?php 
  // Calculate the starting and ending page numbers
  $start_page = max(1, $page - 5);
  $end_page = min($total_pages, $page + 4);
  
  // Make sure we display at least 10 pages
  if ($end_page - $start_page < 9) {
    if ($start_page == 1) {
      $end_page = min($total_pages, 10);
    } else {
      $start_page = max(1, $total_pages - 9);
    }
  }
  
  // Generate the page numbers
  for($i = $start_page; $i <= $end_page; $i++){ 
?>
  <li class="page-item <?php if($page == $i){echo 'active';} ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
<?php } ?>


    
    
  <!------------------------------------------------------------------------------------>  
    
    
    <li class="page-item <?php if($page == $total_pages){echo 'disabled';} ?>">
      <a class="page-link" href="?page=<?php echo $page+1; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>

  </div>



  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>About Us</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.facebook.com/updoes">Educational service
                  divisio <br>university of phayao</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://goo.gl/maps/h8n8afunR3YR83qh7%22%3E19">Moo 2, Mae
                  Ka Subdistrict, Mueang District, Phayao Province 56000
                  0 5446 6666 Ext.1029</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Online Service</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Email for personnel - students (UP Mail)</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Online Leave</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Licensed software services for personnel <br> and
                  students</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Change the password for using the network system and
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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>


  <script src="assets\js\script.js"></script>

</body>

</html>