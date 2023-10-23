<?php
include "database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seller Home Page</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
  <!-- <link href="sellerHomePage.css" rel="stylesheet"> -->
  <!-- <link href="vendorHomePage.css" rel="stylesheet"> -->
  <!-- <link href="nav.css" rel="stylesheet"> -->
  <link href="style.css" rel="stylesheet">
  <!-- <link href="footer.css" rel="stylesheet"> -->
  <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <!-- <script src="nav.js"></script> -->
  <!-- <link href="heroes.css" rel="stylesheet"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <!-- <link href="assets/vendor/aos/aos.css" rel="stylesheet"> -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <!--Navigation bar--->
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="index.php"><span>Homemade Food co,</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="vendors.php">Vendors</a></li>
          <?php if (isset($_GET['username'])) {
            $username = $_GET['username'];
            echo '<li><a class="nav-link scrollto" href="myFav.php?username=' . $username . '">My favourite</a></li>';
          } else {
            echo '<li><a onclick="noAccount()" href="userLogin.html">My Favourite</a></li>';
          }
          ?>
          <li><a class="getstarted scrollto" href="userLogin.html">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
  </header>
  </br><br><br>

  </div>


  <!-- ======= Vendor Section ======= -->
  <section id="team" class="team">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Vendors!</h2>
        <p>Search for you favourite vendors here!</p>
      </div>

      <div class="container" style="padding:30px;">
        <div class="row">
          <div class="col-8 search-and-filter">
            <!-- Search bar -->
            <form class="search-box" method="GET">
              <label for="search">Search Vendors:</label>
              <input type="text" id="search" name="search" placeholder="Enter Keywords">
              <button type="submit" class="btn btn-warning">Search</button>
            </form>
            
          </div>
          <div class="col-4">
            <a href="vendorSignUp.html"><button type="button" class="btn btn-warning btn-lg px-4 gap-3">Become a Vendor!</button></a>
          </div>
        </div>
      </div>
      <?php
      $selectQuery = "SELECT * FROM vendors";
      if (isset($_GET["search"]) && !empty($_GET["search"])) {
        $search = mysqli_escape_string($conn, $_GET["search"]);
        $selectQuery .= " WHERE shopName LIKE '%$search%'";
      }
      if (isset($_GET["shopName"]) && !empty($_GET["shopName"])) {
        $shopName = mysqli_real_escape_string($conn, $_GET["shopName"]);
        $selectQuery .= " WHERE shopName = '$shopName'";
      }
      $result = $conn->query($selectQuery);
      ?>

      <div class="row">

        <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo '                  
                  <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="member">
                      <img src="https://img.freepik.com/premium-vector/kitchen-chef-cook-logo-design-vector-cooking-typography-design-element-your-business-food_285145-218.jpg?w=740" class="img-fluid" alt=""> 
                      <div class="member-info">
                        <div class="member-info-content">
                          <h4> ' . $row['shopName'] . '</h4>
                          <span>' . $row['description'] . '</span>
                        </div>
                        <div class="social">
                          <a href="vendorProfile.php?shopName='.$row['shopName'] . '"><i class="bi bi-shop"></i></a>
                          <a href="https://facebook.com/'.$row['shopName'] . '"><i class="bi bi-facebook"></i></a>
                          <a href="https://instagram.com/'.$row['shopName'] . '"><i class="bi bi-instagram"></i></a>
                          <a href="https://wa.me/message/'.$row['phone'].'"><i class="bi bi-whatsapp"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>';
          }
        } else {
          echo '<p style="text-align:center;">There is no available product with that keyword.</p>';
        } ?>

      </div>

    </div>
  </section><!-- End Team Section -->

  <script src="nav.js"></script>
  <script>
    function noAccount() {
      var r = confirm("You are not logged in. Please click on 'ok' to log in");
      if (r == true) {
        location.href = 'userSignUp.html';
      }
    }
  </script>


</body>

</html>