<?php
include 'database.php';
$id = $_GET['id'];
$selectQuery = "SELECT * FROM product WHERE id = $id";
$result = $conn->query($selectQuery);
if (mysqli_num_rows($result) > 0) {
    $fetch = mysqli_fetch_assoc($result);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Product Details for <?php echo $fetch['id']?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo">
        <h1 class="text-light"><a href="index.html"><span>Homemade Food co,</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <?php if(isset($_GET['username'])){
            $username = $_GET['username'];
            echo '<li><a class="nav-link scrollto active" href="index.php?username='.$username.'">Home</a></li>';
          }
          else{
            echo '<li><a class="nav-link scrollto active" href="index.php">Home</a></li>';
          }?>
          <li><a class="nav-link scrollto" href="vendors.php">Vendors</a></li>
          <?php if(isset($_GET['username'])){
            $username = $_GET['username'];
            echo '<li><a class="nav-link scrollto" href="myFav.php?username='.$username.'">My favourite</a> </li>';
            echo '<li><a class="nav-link scrollto" href="myCart.php?username=' . $username . '">My Cart</a> </li>';

          } else{
            echo '<li><a onclick="noAccount()" href="userLogin.html">My Favourite</a></li>';
          }
          ?>
          <li><a class="getstarted scrollto" href="userLogin.html">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
        </header>
  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Product Details</h2>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="uploads/<?php echo $fetch['image']?>" alt="">
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3 style="text-align:center;">Product information</h3>
              <ul>
                <li style="text-align:center;"><strong><?php echo $fetch['prodName']?></strong></li>
                <li><strong>Category</strong>: <?php echo $fetch['category']?></li>
                <li><strong>Vendor</strong>: <?php echo $fetch['vendor']?></li>
                <li><strong>Price</strong>: $ <?php echo $fetch['price']?> BND</li>
                <?php if (isset($_GET['username'])){?>
                  <li><button type="button" class="btn btn-warning"><a href="vendorProfile.php?shopName=<?php echo $fetch['vendor']?>&username=<?php echo $username?>">Visit vendor</a></button></li>
                  <li><button type="button" class="btn btn-warning"><a href="addToFav.php?username=<?php echo $username?>&id=<?php echo $id?>">Add to favourites</a></button></li><br>
                  <hr>
                  

                  <form method='POST' action="addToCart.php?username=<?php echo $username?>&id=<?php echo $id?>" name="addToCart">
                    <li style="text-align:center;"><strong>Add to cart</strong></li><br>
                    <div class="row g-3 align-items-center">
                      <div class="col-auto">
                        <label for="inputPassword6" class="col-form-label"><strong>Quantity</strong></label>
                      </div>
                      <div class="col-auto">
                        <input type="number" name="quantity" class="form-control" aria-describedby="passwordHelpInline">
                      </div>
                      <div class="col-auto">
                        <label for="inputPassword6" class="col-form-label"><strong>Pick-up / Delivery</strong></label>
                      </div>
                      <div class="col-auto">
                       <select class="form-select" aria-label="Default select example" name="del_method">
                        <option selected>Open this select menu</option>
                        <option value="pickup">Pick-up</option>
                        <option value="delivery">Delivery</option>
                      </select>
                      <br>
                      <p>The delivery option will have an additional $5 charge</p>
                      </div>
                    </div>
                    <br>
                    <li><button type="submit" class="btn btn-warning" >Add to Cart</button></li>
                </form>

                <?php }
                else { ?>
                <li><button type="button" class="btn btn-warning"><a href="vendorProfile.php?shopName=<?php echo $fetch['vendor']?>">Visit vendor</a></button></li>
                <li><button type="button" class="btn btn-warning" onclick="noAccount()">Add to favourites</button></li>
                <li><button type="button" class="btn btn-warning" onclick="addToCart()">Add to Cart</button></li>
                <?php
                }?>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2 style="text-align:center;"><?php echo $fetch['prodName']?>'s detail</h2>
              <p>
                <?php echo $fetch['description']?>
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
  <script>
      function noAccount(){
        var r = confirm("You are not logged in. Please click on 'ok' to log in");
            if (r == true) {
                location.href = 'userSignUp.html';
            }}
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