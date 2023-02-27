<?php
include 'db_con.php';
$pd = $_POST['pd'];
$v = "SELECT * FROM tbl_product where product_id='$pd'";
$v_check = mysqli_query($conn, $v);
$vrow = mysqli_fetch_array($v_check);


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
</head>

<body>
  <!-- header section starts  -->

  <header class="header">
    <div class="header-1">
      <a href="index.php"><img src="image/logo.png" class="logo" alt="" height="60px" width="60px" /></a>
      <form action="" class="search-form">
        <input type="search" name="" placeholder="search here..." id="search-box" />
        <label for="search-box" class="fas fa-search"></label>
      </form>

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

  <!-- login form  -->

  <!-- <div class="login-form-container">

    <div id="close-login-btn" class="fas fa-times"></div>

    <form action="">
        <h3>sign in</h3>
        <a href="#"><center><img src="image/logo.png" class="logo" alt="" height="60px" width="60px"></a>
        </center>  <span>username</span>
        <input type="email" name="" class="box" placeholder="enter your email" id="">
        <span>password</span>
        <input type="password" name="" class="box" placeholder="enter your password" id="">
        <div class="checkbox">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me"> remember me</label>
        </div>
        <input type="submit" value="sign in" class="btn">
        <p>forget password ? <a href="#">click here</a></p>
        <p>don't have an account ? <a href="reg.php">create one</a></p>
    </form>

</div> -->

  <!-- home section starts  -->

  <section class="home" id="home">
    <div class="container">
      <!-- <header>
              <div class="hamburger-logo-group">
                <div class="hamburger">
                  <div class="line"></div>
                  <div class="line"></div>
                  <div class="line"></div>
                </div>
      
                <img src="./images/logo.svg" alt="logo icon" />
      
                <nav class="menu hidden">
                  <div class="slide-menu">
                    <img
                      id="btnMenuClose"
                      src="./images/icon-close.svg"
                      alt="icon close"
                    />
      
                    <ul>
                      <li><a href="#">Collections</a></li>
                      <li><a href="#">Men</a></li>
                      <li><a href="#">Women</a></li>
                      <li><a href="#">About</a></li>
                      <li><a href="#">Contact</a></li>
                    </ul>
                  </div>
                </nav>
              </div>
      
              <div class="cart-avatar-group">
                <div class="btnCart">
                  <img src="./images/icon-cart.svg" alt="cart icon" />
                  <div class="cart-count hidden">3</div>
                </div>
      
                <img
                  class="avatar"
                  src="./images/image-avatar.png"
                  alt="image avatar"
                />
              </div>
      
              <div class="cart hidden">
                <div class="cart-header">Cart</div>
                <div class="products-in-cart"></div>
                <div class="msg-empty">Your cart is empty.</div>
                <div class="checkout hidden">Checkout</div>
              </div>
            </header> -->

      <div class="contente">
        <!-- Lightbox -->
        <section class="lightbox">
          <!-- <img class="product-hero" src="./images/image-product-1.jpg" alt="image product" /> -->
          <!-- <img src="user_profile/images/<?php echo $vrow['p_image']; ?>" alt="" style="width:250px;height:230px"> -->
          <img class="product-hero" src="user_profile/images/<?php echo $vrow['p_image']; ?>" alt="image product" />
          <div class="previous arrow">
            <img src="./images/icon-previous.svg" alt="icon previous" />
          </div>
          <div class="next arrow">
            <img src="./images/icon-next.svg" alt="icon next" />
          </div>
          <!-- <div class="thumb-gallery">
            <div class="pic active">
              <img src="./images/image-product-1-thumbnail.jpg" alt="thumb-1" />
            </div>
            <div class="pic">
              <img src="./images/image-product-2-thumbnail.jpg" alt="thumb-2" />
            </div>
            <div class="pic">
              <img src="./images/image-product-3-thumbnail.jpg" alt="thumb-3" />
            </div>
            <div class="pic">
              <img src="./images/image-product-4-thumbnail.jpg" alt="thumb-4" />
            </div>
          </div> -->
        </section>

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
              <div class="price">Rs.<?php echo $vrow['price']; ?></div>
              <!-- <div class="discount">50%</div> -->
            </div>
            <!-- <div class="old-price">$250.00</div> -->
          </div>

          <div class="count-btn-group">
            <a href="login.php">
              <div class="btn" style="width: 340px;">
                <p>Add to wishlist</p>
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
        $v = "SELECT * FROM tbl_product where delete_status='1'";
        $v_check = mysqli_query($conn, $v);
        while ($vrow = mysqli_fetch_array($v_check)) {
        ?>

          <div class="swiper-slide box">
            <div class="icons">

              <form action="proview.php" method="post">
                <input type="hidden" value="<?php echo $vrow['product_id'] ?>" name="pd">
                <button class="fas fa-eye" style="width: 300px;height:50px;font-size:30px"></button>
              </form>
            </div>

            <div class="image">
              <img src="user_profile/images/<?php echo $vrow['p_image']; ?>" alt="" style="width:250px;height:230px" />
            </div>
            <div class="content">
              <h3><?php echo $vrow['p_name']; ?></h3>
              <div class="price">Rs.<?php echo $vrow['price']; ?></div>
              <a href="login.php" class="btn">add to wishlist</a>
            </div>
          </div>
        <?php
        }
        ?>


      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>

    </div>
  </section>

  <!-- featured section ends -->


  <!-- arrivals section starts  -->

  <!-- <section class="arrivals" id="arrivals">

    <h1 class="heading"> <span>new arrivals</span> </h1>

    <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-1.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-2.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-3.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-4.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-5.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

        </div>

    </div>

    <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-6.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-7.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-8.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-9.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-10.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

        </div>

    </div>

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

  <!-- <section class="blogs" id="blogs">
    <h1 class="heading"><span>our blogs</span></h1>

    <div class="swiper blogs-slider">
      <div class="swiper-wrapper">
        <div class="swiper-slide box">
          <div class="image">
            <img src="image/blog-1.jpg" alt="" />
          </div>
          <div class="content">
            <h3>blog title goes here</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio,
              odio.
            </p>
            <a href="#" class="btn">read more</a>
          </div>
        </div>

        <div class="swiper-slide box">
          <div class="image">
            <img src="image/blog-2.jpg" alt="" />
          </div>
          <div class="content">
            <h3>blog title goes here</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio,
              odio.
            </p>
            <a href="#" class="btn">read more</a>
          </div>
        </div>

        <div class="swiper-slide box">
          <div class="image">
            <img src="image/blog-3.jpg" alt="" />
          </div>
          <div class="content">
            <h3>blog title goes here</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio,
              odio.
            </p>
            <a href="#" class="btn">read more</a>
          </div>
        </div>

        <div class="swiper-slide box">
          <div class="image">
            <img src="image/blog-4.jpg" alt="" />
          </div>
          <div class="content">
            <h3>blog title goes here</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio,
              odio.
            </p>
            <a href="#" class="btn">read more</a>
          </div>
        </div>

        <div class="swiper-slide box">
          <div class="image">
            <img src="image/blog-5.jpg" alt="" />
          </div>
          <div class="content">
            <h3>blog title goes here</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio,
              odio.
            </p>
            <a href="#" class="btn">read more</a>
          </div>
        </div>
      </div>
    </div>
  </section> -->

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

  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

  <!-- custom js file link  -->
  <script src="script.js"></script>
</body>

</html>