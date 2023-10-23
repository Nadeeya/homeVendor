<?php
include "database.php";
$shopName = $_GET['shopName'];
$selectQuery = "SELECT * FROM product WHERE vendor='" . $shopName . "' ORDER BY uploadDate DESC";
$result = $conn->query($selectQuery);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Homemade food co.</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet" >
  </head>
<body>
    <!--Navigation bar--->
    <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo">
        <h1 class="text-light"><a href="index.html"><span>Homemade Food co,</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#">Home</a></li>
          <li><a class="nav-link scrollto" href="uploadProduct.php?shopName=<?php echo $shopName?>">Upload Product</a></li>
          <li><a class="getstarted scrollto" href="index.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
        </header>

   <main id="main">
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Welcome to your very own page!</h2>
          <p><?php echo $shopName ?></p>
          <h5>Below are your current menu! Add more dishes by clicking upload product from the navigation bar</h5>
        </div>
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        <?php
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {?>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="uploads/<?php echo $row['image'] ?>" class="img-fluid" alt="">
              <div class="portfolio-links">
                <?php if(isset($_GET['username'])){
                  $username = $_GET['username'];
                  echo '
                  <a href="addToFav.php?username='.$username.'&id='.$row['id'].'" title="add to favourite"><i class="bi bi-plus"></i></a>
                  <a href="productDetails.php?username='.$username.'&id='.$row['id'].'" title="More Details"><i class="bi bi-link"></i></a>';
                }
                else{
                  echo '<a onClick="noAccount()" title="add to favourite"><i class="bi bi-plus"></i></a>
                  <a href="productDetails.php?id='.$row['id'].'" title="More Details"><i class="bi bi-link"></i></a>';
                }
                ?>
              </div>
              <div class="portfolio-info">
                <h4><?php echo $row['prodName']?></h4>
                <p><?php echo $row['vendor']?></p>
              </div>
            </div>
          </div>
      
      <?php
        }}?>
        </div>
      </div></section>
   </main>
   <footer id="footer">
   <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Homemade Food co.</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
        Designed by <a href="https://bootstrapmade.com/">Group 6</a>
      </div>
    </div>
  </footer><!-- End Footer -->



        <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
 <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>
</html>