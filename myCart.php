<?php
include 'database.php';
$username = $_GET['username'];
$selectQuery = "SELECT * FROM product INNER JOIN myCart ON myCart.product_id = product.id WHERE username='" . $username . "'";
$result = $conn->query($selectQuery);
$num_rows = mysqli_num_rows($result);
$qty = 0;

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
              <li><a class="nav-link scrollto active" href="myFav.php?username=<?php echo $username ?>'">My Favourite</a></li>
              <li><a class="nav-link scrollto active" href="#">My Cart</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
            </header>

       <section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="index.php?username=<?php echo $username?>" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Shopping cart</p>
                    <p class="mb-0">You have <?php echo $num_rows?> items in your cart</p>
                  </div>
                  
                </div>
                <?php 
                if ($num_rows > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $prod_id = $row['id'];
                    $sql_prod = mysqli_query($conn, "SELECT * FROM myCart WHERE product_id = '$prod_id'");
                    $res = mysqli_fetch_assoc($sql_prod);
                    $quantity = $res['quantity'];
                    $new_price = $row['price'] * $quantity;
                    $del_method = $res['del_method'];


                    echo'
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <div class="d-flex flex-row align-items-center">
                            <div>
                              <img
                                src="uploads/' . $row['image'] . '"
                                class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                            </div>
                            <div class="ms-3">
                              <h5>'.$row['prodName'].' ('.$del_method.')</h5>
                              <p class="small mb-0">'.$row['category'].'</p>
                            </div>
                          </div>
                          <div class="d-flex flex-row align-items-center">
                            <div style="width: 50px;">
                               <h5 class="fw-normal mb-0">'.$quantity.'</h5>
                            </div>
                            <div style="width: 80px;">
                              <h5 class="mb-0">'.$new_price.' BND</h5>
                            </div>
                            <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>';
                    $qty += $new_price;

                  }
                }
                ?>


              </div>
              <div class="col-lg-5">

                <div class="card bg-primary text-white rounded-3" style="background-color:pink!important">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Shopping details</h5>
                      <img src="userIcon.jpg"
                        class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                    </div>                    

                    <hr class="my-4">

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Subtotal</p>
                      <p class="mb-2"><?php echo $qty?>BND</p>
                    </div>

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Shipping</p>
                      <p class="mb-2">5.00 BND</p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total(Incl. taxes)</p>
                      <?php if ($qty==0){
                        echo '<p class="mb-2">0₩</p>';
                      } else{
                        $qty +=5;
                        echo'<p class="mb-2">'.$qty.' BND</p>';
                      }?>
                      
                    </div>

                    <button type="button" class="btn btn-info btn-block btn-lg" onclick="location.href='sold.php?buyer=<?php echo $username?>';">
                      <div class="d-flex justify-content-between">
                        <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                      </div>
                    </button>

                  </div>
                </div>

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