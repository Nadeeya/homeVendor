<?php
include "database.php";
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
          <li><a class="nav-link scrollto active" href="#">Home</a></li>
          <li><a class="nav-link scrollto" href="vendors.php">Vendors</a></li>
          <?php if(isset($_GET['username'])){
            $username = $_GET['username'];
            echo '<li><a class="nav-link scrollto" href="myFav.php?username='.$username.'">My favourite</a> </li>';
            echo '<li><a class="nav-link scrollto" href="myCart.php?username='.$username.'">My Cart</a> </li>';
          } else{
            echo '<li><a onclick="noAccount()" href="userLogin.html">My Favourite</a></li>';
          }
          ?>
          <li><a class="getstarted scrollto" href="userLogin.html">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
        </header>
      <!--Banner-->
      <section id="hero" class="d-flex align-items-center">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
              <h1>From Our Kitchen to Your Heart: Taste the Love in Every Bite!</h1>
              <h2>Indulge in the Irresistible World of Homemade Goodness! Browse and discover homemade cuisines with us or join
                us and let the nation know your delicious dish.
              </h2>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img">
              <img src="assets/img/kitchenLogo.png" class="img-fluid animated" alt="">
            </div>
          </div>
        </div>
      </section>
        </br>
        <main id="main">
          <section id="services" class="services section-bg" style="background-color:white;">
          <div class="container" data-aos="fade-up">
            <div class="section-title">    
        <!-- Search bar -->
            <form class="search-box" method="GET" >
                <label for="search"><h3>Search Food or Vendors:</h3></label>
                <input type="text" id="search" name="search" placeholder="Enter Keywords">
                <button type="submit" type="button" class="btn btn-warning">Search</button>
            </form>
            </div>

            <form method="GET">
                <label for="category"><h3>Category:</h3></label>
                <select id="category" name="category" class="form-control" style="width:40%">
                    <option value="">All Categories</option>
                    <option value="rice">Rice</option>
                    <option value="noodles">Noodles</option>
                    <option value="drinks">Drinks</option>
                    <option value="burger">Burger</option>
                    <option value="others">Others</option>
                </select>
                <br>
                <button type="submit" type="button" class="btn btn-warning">Apply Filters</button>
                </div>
            </form>
            </div>
          </section>
          
  
      <?php
      $selectQuery = "SELECT * FROM product ";
      if(isset($_GET["search"]) && !empty($_GET["search"])){
        $search = mysqli_escape_string($conn, $_GET["search"]);
        $selectQuery .= " WHERE prodName LIKE '%$search%' OR description LIKE '%$search%' OR vendor LIKE '%$search%'";
      }
      if (isset($_GET["category"]) && !empty($_GET["category"])) {
          $category = mysqli_real_escape_string($conn, $_GET["category"]);
          $selectQuery .= " WHERE category = '$category'";
      }
      $result = $conn->query($selectQuery);
      ?>
      <!--Display-->
      <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">
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

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join us and become a vendor today!</h4>
            <p>Click the button below to sign up</p>
            <button type="button" class="btn btn-warning"><a href="vendorSignUp.html" style="color:black;">Sign up</a></button>
            <p>Already have an account? Login <a href="vendorLogin.html">here</a></p>
          </div>
        </div>
      </div>
    </div>
          </footer>
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