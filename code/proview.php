<?php
include 'db_con.php';
// if (error_reporting(0)) {
//   header("location:index.php");
// }
$pd = $_GET['pd'];

$v = "SELECT * FROM tbl_product where product_id='$pd'";

$v_check = mysqli_query($conn, $v);
$vrow = mysqli_fetch_array($v_check);
if (mysqli_num_rows($v_check) == 0) {
  // if the id doesn't exist, redirect to the 404 error page
  header("location:404.php");
  include("404.php"); // replace "404.php" with the actual name of your 404 error page
  exit();
}

$s = $vrow['subcat_id'];
$vs = "SELECT * FROM tbl_subcat where sub_id='$s'";
$v_check1 = mysqli_query($conn, $vs);
$vrow1 = mysqli_fetch_array($v_check1);

$c = $vrow1['cat_id'];

$vs1 = "SELECT * FROM tbl_categories where cat_id='$c'";
$v_check11 = mysqli_query($conn, $vs1);
$vrow11 = mysqli_fetch_array($v_check11);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>index</title>

  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

  <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="./styles/style.css" />
  <!-- custom css file link  -->
  <link rel="stylesheet" href="sty.css" />
  <link rel="stylesheet" href="image.css" />
  <script src="https://kit.fontawesome.com/6007aa3653.js" crossorigin="anonymous"></script>

  <style>
    :root {
      --breakpoint-xs: 600px;
      --breakpoint-sm: 768px;
      --red: #e41919;
    }

    img {
      max-width: 100%;
    }

    body {
      background: #f4f4f4;
      font-family: sans-serif;
    }

    .mystyle-products {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      flex-wrap: wrap;
    }

    @media (max-width: var(--breakpoint-xs)) {
      .mystyle-products {
        display: block;
      }
    }

    .mystyle-products.slider-products .product1 {
      width: auto;
      margin-bottom: 0;
    }

    .mystyle-products .product1 {
      width: 100%;
      margin-bottom: 20px;
      position: relative;
      padding: 20px;
      background: #fff;
    }

    @media (max-width: var(--breakpoint-sm)) {
      .mystyle-products .product1 {
        width: 50%;
      }
    }

    @media (max-width: var(--breakpoint-xs)) {
      .mystyle-products .product1 {
        width: auto;
      }
    }

    .mystyle-products .product1:hover {
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      z-index: 7;
    }

    .mystyle-products .product1:hover .btnn-circle {
      transform: translateY(0);
      visibility: visible;
      opacity: 1;
    }

    .mystyle-products .product1 h3 {
      font-size: 12px;
      line-height: 20px;
      margin-top: 10px;
      height: 39px;
      overflow: hidden;
    }

    @media (max-width: var(--breakpoint-xs)) {
      .mystyle-products .product1 h3 {
        height: auto;
      }
    }

    .mystyle-products .product1>a {
      position: relative;
      display: block;
      color: #333;
      text-decoration: none;
    }

    .mystyle-products .product1>a:hover {
      text-decoration: none;
    }

    .mystyle-products .product1 .add_to_cart_button {
      display: none;
    }

    .mystyle-products .product1 .attachment-shop_catalog {
      display: block;
      margin: 0 auto;
    }

    .mystyle-products .product1 .btnn-circle {
      border-radius: 50%;
      width: 30px;
      height: 30px;
      line-height: 30px;
      display: block;
      padding: 0;
      position: absolute;
      top: 20%;
      left: 0;
      right: 0;
      margin-left: auto;
      margin-right: auto;
      z-index: 2;
      color: #fff;
      transform: translateY(-20px);
      opacity: 0;
      visibility: hidden;
      transition: color 0.5s 0.001s ease-out, background 0.3s 0.001s ease-out, visibility 0.5s 0.25s ease-out, opacity 0.5s 0.25s ease-out, transform 0.5s 0.25s ease-out;
    }

    .mystyle-products .product1 .price {
      font-size: 14px;
    }

    .mystyle-products .product1 .price ins {
      text-decoration: none;
      font-weight: 700;
      white-space: nowrap;
    }

    .mystyle-products .product1 .price del {
      color: #666;
      font-size: 11px;
      padding-right: 7px;
      white-space: nowrap;
    }

    .mystyle-products .product1 .price .sale-tag {
      color: red;
      font-size: 12px;
      padding-left: 7px;
      font-weight: 700;
    }

    .mystyle-products .onsale {
      z-index: 6;
      position: absolute;
      top: 15px;
      left: -20px;
      padding: 2px 10px;
      background: var(--red);
      color: #fff;
      box-shadow: -1px 2px 3px rgba(0, 0, 0, 0.3);
      border-radius: 0 5px 5px 0;
      height: 25px;
      line-height: 25px;
      font-size: 0.9rem;
      font-weight: normal;
      padding-top: 0;
      padding-bottom: 0;
      min-height: 0;
    }

    .mystyle-products .onsale:before,
    .mystyle-products .onsale:after {
      content: "";
      position: absolute;
    }

    .mystyle-products .onsale:before {
      width: 7px;
      height: 33px;
      top: 0;
      left: -6.5px;
      padding: 0 0 7px;
      background: inherit;
      border-radius: 5px 0 0 5px;
    }

    .mystyle-products .onsale:after {
      width: 5px;
      height: 5px;
      bottom: -5px;
      left: -4.5px;
      border-radius: 5px 0 0 5px;
      background: #800;
    }
  </style>
</head>

<body>
  <!-- header section starts  -->

  <header class="header">
    <div class="header-1">
      <a href="index.php"><img src="image/logo.png" class="logo" alt="" height="60px" width="60px" /></a>
      <!-- <form action="" class="search-form">
                <input type="search" name="" placeholder="search here..." id="search-box" />
                <label for="search-box" class="fas fa-search"></label>
            </form> -->

      <div class="icons">
        <div id="search-btn" class="fas fa-search"></div>
        <!-- <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-shopping-cart"></a> -->
        <!-- <a style="font-family: poppins;" href="reg.php">Register</a> -->
        <a href="login.php">
          <i class="fas fa-user"></i>
          <span style="font-weight: bold">Login</span></a>
      </div>
    </div>

    <div class="header-2">
      <nav class="navbar">
        <a href="#home">home</a>
        <a href="#featured">Recent ads</a>
        <!-- <a href="#arrivals">arrivals</a> -->
        <a href="#reviews">reviews</a>
        <!-- <a href="#blogs">blogs</a> -->
      </nav>
    </div>
  </header>

  <!-- header section ends -->

  <!-- bottom navbar  -->

  <nav class="bottom-navbar">
    <a href="#home" class="fas fa-home"></a>
    <a href="#featured" class="fas fa-list"></a>
    <a href="#arrivals" class="fas fa-tags"></a>
    <a href="#reviews" class="fas fa-comments"></a>
    <a href="#blogs" class="fas fa-blog"></a>
  </nav>



  <!-- home section starts  -->

  <section class="home" id="home">

    <div class="contente">
      <input type="radio" id="image1" name="image" checked>
      <input type="radio" id="image2" name="image">
      <input type="radio" id="image3" name="image">
      <!-- Lightbox -->
      <div class="container">
        <div class="featured-wrapper">
          <ul class="featured-list">
            <li>
              <figure>
                <img src="user_profile/images/<?php echo $vrow['p_image']; ?>" alt="" style="width:470px;height:370px">
              </figure>
            </li>
            <li>
              <figure>
                <img src="user_profile/images/<?php echo $vrow['p_image2']; ?>" alt="" style="width:470px;height:370px">
              </figure>
            </li>
            <li>
              <figure>
                <img src="user_profile/images/<?php echo $vrow['p_image3']; ?>" alt="" style="width:470px;height:370px">
              </figure>
            </li>
          </ul>
          <!-- <ul class="arrows">
                                <li>
                                    <label for="image1"></label>
                                </li>
                                <li>
                                    <label for="image2"></label>
                                </li>
                                <li>
                                    <label for="image3"></label>
                                </li>
                            </ul> -->
          <ul class="dots">
            <li>
              <label for="image1"></label>
            </li>
            <li>
              <label for="image2"></label>
            </li>
            <li>
              <label for="image3"></label>
            </li>
          </ul>
        </div>
        <ul class="thumb-list">
          <li>
            <label for="image1">
              <img src="user_profile/images/<?php echo $vrow['p_image']; ?>" alt="">
              <span class="outer">
                <span class="inner" style="color: #fff;">Image1</span>
              </span>
            </label>
          </li>
          <li>
            <label for="image2">
              <img src="user_profile/images/<?php echo $vrow['p_image2']; ?>" alt="">
              <span class="outer">
                <span class="inner" style="color: #fff;">Image2</span>
              </span>
            </label>
          </li>
          <li>
            <label for="image3">
              <img src="user_profile/images/<?php echo $vrow['p_image3']; ?>" alt="">
              <span class="outer">
                <span class="inner" style="color: #fff;">Image3</span>
              </span>
            </label>
          </li>
        </ul>
      </div>
      <!-- Product -->
      <section class="product">
        <div class="company-name"><?php echo $vrow11['category'] ?></div>
        <div class="company-name"><?php echo $vrow1['subcat'] ?></div>
        <div class="title"><?php echo $vrow['p_name']; ?></div>
        <div class="description">
          <?php echo $vrow['p_description']; ?>
        </div>
        <div class="price-wrapper">
          <div class="group">
            <div class="price" style="color: #000;">Rs.<?php echo $vrow['price']; ?></div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <div class="discount" style="color: #1d2025;background-color: #f3f3f3"><a href="login.php"><i class="fa-solid fa-heart fa-beat fa-2xl"></i>
              </a></div>
          </div>
          <!-- <div class="old-price">$250.00</div> -->

        </div>

        <div class="count-btn-group">
          <a href="login.php">
            <div class="btn" style="width: 650px;">
              <p>Chat</p>
            </div>
          </a>

          <!-- <div class="btn">
              <p>A</p>
            </div> -->


        </div>
      </section>
    </div>

    <!-- <div class="overlay hidden">
          <div class="btnClose">
            <img
              id="btnOverlayClose"
              src="./images/icon-close.svg"
              alt="lightbox close"
            />
          </div>
        </div> -->
    </div>
  </section>

  <!-- icons section ends -->

  <!-- featured section starts  -->

  <section class="featured" id="featured">
    <h1 class="heading"><span>Recent ads</span></h1>


    <div class="swiper featured-slider">
      <div class="swiper-wrapper">
        <?php
        $v = "SELECT * FROM tbl_product WHERE delete_status='1' ORDER BY product_id DESC LIMIT 8;";
        $v_check = mysqli_query($conn, $v);
        while ($vrow = mysqli_fetch_array($v_check)) {
        ?>
          <div class="swiper-slide box">
            <div class="mystyle-products">
              <li class="product1">
                <a href="proview.php?pd=<?php echo $vrow['product_id'] ?>" name="pd">
                  <?php
                  $subcat_id = $vrow['subcat_id'];
                  $sql = "SELECT tbl_categories.category FROM tbl_categories INNER JOIN tbl_subcat ON tbl_subcat.cat_id=tbl_categories.cat_id INNER JOIN tbl_product ON tbl_product.subcat_id=tbl_subcat.sub_id WHERE tbl_product.subcat_id='$subcat_id'";
                  $res = mysqli_query($conn, $sql);
                  $sales = mysqli_fetch_array($res);
                  $sales_name = $sales['category'];
                  ?>
                  <span class="onsale"><?php echo $sales_name; ?></span>
                  <img src="user_profile/images/<?php echo $vrow['p_image']; ?>" alt="" style="width:290px;height:230px" />
                  <h3><?php echo $vrow['p_name']; ?></h3>
                  <span class="price">
                    <!-- <del> <span class="amount">399.000 ₫</span> </del> -->
                    <ins> <span class="amount">Rs.<?php echo $vrow['price']; ?></span> </ins>
                    <!-- <span class="sale-tag sale-tag-square">-33%</span> -->
                  </span>
                </a>

                <a href="login.php" style="margin-left: 260px"><i class="fa-solid fa-heart fa-beat fa-2xl"></i>
                </a>

                <!-- <a href="tttt" class="btnn btnn-dark btnn-circle btnn-review" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="fa-solid fa-heart fa-beat fa-2xl"></i></a> -->
              </li>
            </div>
          </div>


        <?php
        }
        ?>
        <div class="swiper-slide box">
          <div class="mystyle-products">
            <li class="product1">
              <a href="index.php">


                <img src="image/pluz.png" alt="" style="width:290px;height:320px" />


              </a>



              <!-- <a href="tttt" class="btnn btnn-dark btnn-circle btnn-review" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="fa-solid fa-heart fa-beat fa-2xl"></i></a> -->
            </li>
          </div>
        </div>

      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>

    </div>
  </section>

  <!-- featured section ends -->


  <!-- arrivals section starts  -->


  </section> -->

  <!-- arrivals section ends -->

  <!-- deal section starts  -->

  <section class="deal">
    <div class="content">
      <h3>deal of the day</h3>
      <h1>upto 50% off</h1>
      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde
        perspiciatis in atque dolore tempora quaerat at fuga dolorum natus
        velit.
      </p>
      <a href="#" class="btn">shop now</a>
    </div>

    <div class="image">
      <img src="image/deal-img.jpg" alt="" />
    </div>
  </section>

  <!-- deal section ends -->

  <!-- reviews section starts  -->

  <section class="reviews" id="reviews">
    <h1 class="heading"><span>client's reviews</span></h1>

    <div class="swiper reviews-slider">
      <div class="swiper-wrapper">
        <div class="swiper-slide box">
          <img src="image/pic-1.png" alt="" />
          <h3>john deo</h3>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique
            facere hic.
          </p>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
        </div>

        <div class="swiper-slide box">
          <img src="image/pic-2.png" alt="" />
          <h3>john deo</h3>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique
            facere hic.
          </p>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
        </div>

        <div class="swiper-slide box">
          <img src="image/pic-3.png" alt="" />
          <h3>john deo</h3>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique
            facere hic.
          </p>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
        </div>
        <div class="swiper-slide box">
          <img src="image/pic-4.png" alt="" />
          <h3>john deo</h3>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique
            facere hic.
          </p>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
        </div>

        <div class="swiper-slide box">
          <img src="image/pic-5.png" alt="" />
          <h3>john deo</h3>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique
            facere hic.
          </p>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
        </div>

        <div class="swiper-slide box">
          <img src="image/pic-6.png" alt="" />
          <h3>john deo</h3>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique
            facere hic.
          </p>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- reviews section ends -->

  <!-- blogs section starts  -->


  <!-- blogs section ends -->

  <!-- footer section starts  -->

  <section class="footer">
    <div class="box-container">
      <div class="box">
        <h3>our locations</h3>
        <a href="#"> <i class="fas fa-map-marker-alt"></i> india </a>
        <a href="#"> <i class="fas fa-map-marker-alt"></i> USA </a>
        <a href="#"> <i class="fas fa-map-marker-alt"></i> russia </a>
        <a href="#"> <i class="fas fa-map-marker-alt"></i> france </a>
        <a href="#"> <i class="fas fa-map-marker-alt"></i> japan </a>
        <a href="#"> <i class="fas fa-map-marker-alt"></i> africa </a>
      </div>

      <div class="box">
        <h3>quick links</h3>
        <a href="#"> <i class="fas fa-arrow-right"></i> home </a>
        <a href="#"> <i class="fas fa-arrow-right"></i> featured </a>
        <a href="#"> <i class="fas fa-arrow-right"></i> arrivals </a>
        <a href="#"> <i class="fas fa-arrow-right"></i> reviews </a>
        <a href="#"> <i class="fas fa-arrow-right"></i> blogs </a>
      </div>

      <div class="box">
        <h3>extra links</h3>
        <a href="#"> <i class="fas fa-arrow-right"></i> account info </a>
        <a href="#"> <i class="fas fa-arrow-right"></i> ordered items </a>
        <a href="#"> <i class="fas fa-arrow-right"></i> privacy policy </a>
        <a href="#"> <i class="fas fa-arrow-right"></i> payment method </a>
        <a href="#"> <i class="fas fa-arrow-right"></i> our serivces </a>
      </div>

      <div class="box">
        <h3>contact info</h3>
        <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
        <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
        <a href="#"> <i class="fas fa-envelope"></i> shaikhanas@gmail.com </a>
        <img src="image/worldmap.png" class="map" alt="" />
      </div>
    </div>

    <div class="share">
      <a href="#" class="fab fa-facebook-f"></a>
      <a href="#" class="fab fa-twitter"></a>
      <a href="#" class="fab fa-instagram"></a>
      <a href="#" class="fab fa-linkedin"></a>
      <a href="#" class="fab fa-pinterest"></a>
    </div>

    <div class="credit">
      created by <span>mr. web designer</span> | all rights reserved!
    </div>
  </section>

  <!-- footer section ends -->

  <!-- loader  -->

  <!-- <div class="loader-container">
    <img src="image/loader-img.gif" alt="">
</div> -->
  <script>
    $('#myCarousel').carousel({
      interval: 4000
    });
  </script>
  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

  <!-- custom js file link  -->
  <script src="script.js"></script>
</body>

</html>