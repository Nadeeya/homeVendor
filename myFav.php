<?php
include 'database.php';
$username = $_GET['username'];
$selectQuery = "SELECT * FROM product INNER JOIN myfav ON myfav.prod_id = product.id WHERE username='". $username."'" ;
$result = $conn->query($selectQuery);
$num_rows = mysqli_num_rows($result);
$qty =0;

?>
<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>My Favourite</title>
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

    <style>
      @media (min-width: 1025px) {
        .h-custom {
        height: 100vh !important;
        }
        }
    </style>
    </head>

  <body>
    <!--Navigation bar--->
        <!-- ======= Header ======= -->
      <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
          <div class="logo">
            <h1 class="text-light"><a href="index.html"><span>Homemade Food co.</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
          </div>

          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto" href="index.php">Home</a></li>
              <li><a class="nav-link scrollto" href="vendors.php">Vendors</a></li>
              <li><a class="nav-link scrollto active" href="#">My Favourite</a></li>
              <li><a class="getstarted scrollto" href="userLogin.html">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
            </header>

        <section class="h-100 h-custom">
          <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col d-flex justify-content-center">
                <div class="card">
                  <div class="card-body">

                    <div class="row">

                      <div class="col-md-auto">
                        <h4 class="mb-3"><a href="index.php?username=<?php echo $username?>" class="text-body"><i
                              class="fas fa-long-arrow-alt-left me-2"></i>Favourites</a>
                            </h4>
                        <hr>

                        <div class="d-flex justify-content-center align-items-center mb-4">
                          <div>
                            <p class="mb-0">You have <span style="font-weight: bold;"><?php echo $num_rows?> </span> products in your favourites</p>
                          </div>
                          
                          
                        </div>
                        <?php 
                        if ($num_rows > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <table class="table table-bordered">
                                <tr>
                                    <td> 
                                <div class="container">
                                    <div class="row">
                                        <div class="text-center mb-4"><h3> <?php echo $row["prodName"];?></h3></div>
                                        <div class="col-4 mb-4"><img src="uploads/<?php echo $row["image"]?>" alt="sold product" class="img-thumbnail" class="rounded float-left" ></div>
                                        <div class="col-4 align-middle">
                                            <span style="font-weight: bold;">Vendor : </span><?php echo $row['vendor'];?><br>
                                            <span style="font-weight: bold;">Category : </span><?php echo $row['category'];?> <br>
                                            <span style="font-weight: bold;">Description: </span><?php echo $row['description'];?> <br>
                                        </div>
                                        <div class="col-4 text-center align-bottom">
                                            <span style="font-weight: bold;">Price:</span> <?php echo $row['price'];?> BND<br>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            </tr>
                            
                            <?php
                            }
                            ?>
                        </table>
                          <?php
                          }?>
                      </div>

                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <script src="nav.js"></script>
  </body>
</html>