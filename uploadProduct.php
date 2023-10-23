<?php
$shopName = $_GET['shopName'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/7zn3ri5ddslplijof7zi2g9zvwgit3lpa1cyd6rtf3wf0ygh/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <title>Upload product</title>
    <style>
        .uploadform {
            width: 70%;
            margin:auto;
            margin-top: 30px;
        }
    </style>
    <script>
        tinymce.init({
            selector: 'textarea#editor',
            height: 800,
            plugins: 'charmap codesample image lists link media searchreplace table visualblocks',
            toolbar: 'undo redo | bold italic underline strikethrough | forecolor backcolor | blocks fontsize | bullist numlist indent outdent align lineheight | link',
            contextmenu: false
        });
    </script>
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
          <li><a class="nav-link scrollto active" href="vendorHomePage.php?shopName=<?php echo $shopName?>">Home</a></li>
          <li><a class="nav-link scrollto" href="uploadProduct.php?shopName=<?php echo $shopName?>">Upload Product</a></li>
          <li><a class="getstarted scrollto" href="index.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
        </header>

    <main id='main'>
        <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><?php echo $shopName?></h2>
          <p>Add a new menu below:</p>
        
    <div style="text-align: center;">
        <div class="card" style="width:80%; margin:auto auto; margin-top:20px;">
    </br>

            <h5>Please fill in the details for your new product</h5>
            <form role="form" name="newJobForm" method="POST" class="main-form needs-validation" action="uploadProduct-bg.php?shopName=<?php echo $shopName ?>" enctype="multipart/form-data">
                <div class="uploadform">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Name of product</span>
                        <input type="text" class="form-control" id="prodName" name="prodName"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        <div class="invalid-feedback">Please enter the product name.</div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group">
                                <span class="input-group-text" >Category:</span>
                                <select name="category" id="category" class="form-control">
                                    <option value="rice">Rice</option>
                                    <option value="noodles">Noodles</option>
                                    <option value="dessert">Dessert</option>
                                    <option value="drinks">Drinks</option>
                                    <option value="burger">Burger</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <span class="input-group-text">Price in BND</span>
                                <input class="form-control" type="number" id="price" name="price" required>
                                <div class="invalid-feedback">Please enter the price of the item in bnd only.</div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <span class="input-group-text" >Allergy:</span>
                                <select name="allergy" id="allergy" class="form-control">
                                    <option value="milk-eggs">Milk/Eggs</option>
                                    <option value="peanuts">Peanuts</option>
                                    <option value="soybeans">Soybeans</option>
                                    <option value="wheat">Wheat</option>
                                    <option value="fish-sellfish">Fish & Shellfish</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    </br>
                    <h5>Product image</h5>
                    <h6>Please make sure the chosen file is in the .img, .jpg or .png format</h6>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="file" name="file"
                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
                        <div class="invalid-feedback">Please enter the product image.</div>
                    </div>
                    <h6>Please enter the product details such as ingredients, allergy warnings or instructions</h6>
                    <div style="margin-top:10px;">
                        <label for="description">Product Description:</label></br>
                        <textarea id="editor" class="form-control" name="description"></textarea>
                    </div>
                    </br>
                    <div>
                    <button class="btn btn-primary" type="submit" name="upload_product">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
      </div>
        </section>
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
 <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
    <footer class="footer" style="margin-top:100px;">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
      </div>
    </footer>
</body>
</html>
