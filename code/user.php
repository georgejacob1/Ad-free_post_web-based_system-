<?php
include 'db_con.php';
include 'session.php';
// session_start();
if ($_SESSION['email']) {
    $email = $_SESSION['email'];

    $name = "SELECT * FROM tbl_login as a, tbl_users as b WHERE a.login_id=b.login_id and a.email='$email'";
    $name_check = mysqli_query($conn, $name);
    $row = mysqli_fetch_array($name_check);
}
$loginid1 = $row['login_id'];
if (isset($_POST['submit'])) {
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $img = $_POST['img'];
    $user = $_POST['user'];
    $phone = $_POST['phone'];
    $pid = $_POST['pid'];


    $sqll = "select * from tbl_cart where pid='$pid' and username='$email'";
    $run = mysqli_query($conn, $sqll);
    $s = mysqli_num_rows($run);
    if ($s != 0) {
        echo "<script>alert('Product Already Exist')</script>";
        header("location:cart.php");
    } else {
        $ab = "INSERT INTO `tbl_cart`(`pid`,`pname`, `price`,`image`, `description`, `contact`,`username`) VALUES ('$pid','$pname','$price','$img','$desc','$phone','$email')";
        $exe = mysqli_query($conn, $ab);

        if ($exe) {
            echo "<script>alert('Product Added')</script>";
            header("location:user.php");
        }
    }

    // echo "<script>alert('$pname')</script>";
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .dropbtn {
            background-color: #fff;
            color: black;
            padding-left: 15px;
            padding-right: 15px;
            font-size: 1.7rem;
            border: none;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
            font-size: 5px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 195px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            font-size: 5px;
        }

        .dropdown-content a {
            color: black;
            padding: 2px;
            text-decoration: none;
            font-weight: 300;
            display: block;
            font-size: 5px;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #fff;
        }
    </style>




    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="sty.css">
</head>

<body>

    <!-- header section starts  -->

    <header class="header">

        <div class="header-1">
            <a href="user.php"><img src="image/logo.png" class="logo" alt="" height="60px" width="60px" /></a>
            <form action="" class="search-form">
                <input type="search" name="" placeholder="search here..." id="search-box" />
                <label for="search-box" class="fas fa-search"></label>
            </form>

            <div class="icons ph">
                <div id="search-btn" class="fas fa-search"></div>
                <form action="chat/users.php" method="post">
                    <input type="hidden" value="<?php echo $row['login_id']; ?>" name="prouser">

                    <button class='bx bx-comment bx-tada ' style="font-size: 25px; margin-top:15px" type="submit" name="chat"></button>
                </form>
                <div class="p-3">


                    <a href="cart.php" class="fas fa-heart mt-2" style=" margin-top:15px"></i></a>

                </div>
                <!-- <a href="#" class="fas fa-shopping-cart"></a> -->
                <div class="dropdown ">
                    <button class="dropbtn"> <?php echo $row['user_fname'] . " " . $row['user_lname']; ?> <i class='bx bx-chevron-down'></i></button>
                    <div class="dropdown-content" style=" margin-left: 0px;">
                        <a href="user_profile/userprofile.php"> <i class="fas fa-user"></i> My profile</a>
                        <a href="logout.php"><i class='bx bx-log-out'></i> <span class="links_name">Log out</span></a>
                        <!-- <a href="#">Link 2</a>
                     <a href="#">Link 3</a> -->
                    </div>
                </div>
                <div class="pl-3">
                    <img src="image/pic-2.png" alt="" style=" margin-top:15px" />

                </div>
            </div>
        </div>



        <div class="header-2">
            <nav class="navbar">
                <!-- <a href="#home">home</a> -->
                <a href="#featured">Recent ads</a>
                <!-- <a href="#arrivals">arrivals</a> -->
                <a href="#reviews">reviews</a>
                <a href="#blogs">blogs</a>
            </nav>
        </div>

    </header>

    <!-- header section ends -->

    <!-- bottom navbar  -->

    <nav class="bottom-navbar">
        <!-- <a href="#home" class="fas fa-home"></a> -->
        <a href="#featured" class="fas fa-list"></a>
        <!-- <a href="#arrivals" class="fas fa-tags"></a> -->
        <a href="#reviews" class="fas fa-comments"></a>
        <a href="#blogs" class="fas fa-blog"></a>
    </nav>

    <!-- icons section ends -->

    <!-- featured section starts  -->

    <!-- <section class="featured" id="featured">

        <h1 class="heading"> <span>Recent ads</span> </h1>

        <div class="swiper featured-slider">

            <div class="swiper-wrapper">
                <?php
                $v = "SELECT a.*,b.* FROM tbl_product a inner join tbl_users b on a.login_id=b.login_id and  a.delete_status='1'";
                $v_check = mysqli_query($conn, $v);
                while ($vrow = mysqli_fetch_array($v_check)) {
                ?>

                    <div class="swiper-slide box">

                        <div class="icons">

                            <form action="userview.php" method="post">
                                <input type="hidden" value="<?php echo $vrow['product_id'] ?>" name="pd">
                                <button class="fas fa-eye" style="width: 300px;height:50px;font-size:25px"></button>
                            </form>
                        </div>
                        <div class="image">
                            <img src="user_profile/images/<?php echo $vrow['p_image']; ?>" alt="" style="width:250px;height:230px">
                        </div>
                        <div class="content">
                            <h3><?php echo $vrow['p_name']; ?></h3>
                            <div class="price" style="font-size: 15px;">Contact info:- <?php echo $vrow['user_phone']; ?> </div>
                            <div class="price">Rs.<?php echo $vrow['price']; ?> </div>
                            <form method="post" action="">

                                <input type="hidden" name="pname" value="<?php echo $vrow['p_name']; ?>">
                                <input type="hidden" name="desc" value="<?php echo $vrow['p_description']; ?>">
                                <input type="hidden" name="img" value="<?php echo $vrow['p_image']; ?>">
                                <input type="hidden" name="price" value="<?php echo $vrow['price']; ?>">
                                <input type="hidden" name="user" value="<?php echo $vrow['user_fname']; ?>">
                                <input type="hidden" name="phone" value="<?php echo $vrow['user_phone']; ?>">
                                <input type="hidden" name="pid" value="<?php echo $vrow['product_id']; ?>">

                                <button class="btn" name="submit">add to wishlist</button>
                            </form>
                        </div>
                    </div>
                <?php
                }
                ?>



            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section> -->
    <section class="featured" id="featured">
        <h1 class="heading"><span>Recent ads</span></h1>

        <div class="swiper featured-slider">
            <div class="swiper-wrapper">
                <?php
                $v = "SELECT a.*,b.* FROM tbl_product a inner join tbl_users b on a.login_id=b.login_id and  a.delete_status='1' where  a.login_id!='$loginid1'";
                $v_check = mysqli_query($conn, $v);
                while ($vrow = mysqli_fetch_array($v_check)) {
                ?>

                    <div class="swiper-slide box">

                        <div class="icons">


                            <form method="post" action="">

                                <input type="hidden" name="pname" value="<?php echo $vrow['p_name']; ?>">
                                <input type="hidden" name="desc" value="<?php echo $vrow['p_description']; ?>">
                                <input type="hidden" name="img" value="<?php echo $vrow['p_image']; ?>">
                                <input type="hidden" name="price" value="<?php echo $vrow['price']; ?>">
                                <input type="hidden" name="user" value="<?php echo $mrow['user_fname']; ?>">
                                <input type="hidden" name="phone" value="<?php echo $mrow['user_phone']; ?>">
                                <input type="hidden" name="pid" value="<?php echo $vrow['product_id']; ?>">
                                <input type="hidden" value="<?php echo $vrow['product_id'] ?>" name="pd">
                                <?php
                                $pid = $vrow['product_id'];
                                $sql11 = "select * from tbl_cart where pid='$pid' and username='$email'";
                                $run11 = mysqli_query($conn, $sql11);
                                $w = mysqli_num_rows($run11);
                                if ($w == 0) { ?>
                                    <button style="width: 30px;height:10px;color:#fff" class="aaa addto" type="submit" value="<?php echo $vrow['product_id']; ?>"> <img src="image\wishlist.png" alt="" style="width: 50px;height:50px;"></button>
                                <?php } else { ?>
                                    <button style="width: 30px;height:10px;color:#fff" class="aaa viewwish" type="submit" value="<?php echo $vrow['product_id']; ?>"> <img src="image\favourite.png" alt="" style="width: 70px;height:50px;"></button>
                                <?php  } ?>
                            </form>
                        </div>
                        <div class="image">
                            <img src="user_profile/images/<?php echo $vrow['p_image']; ?>" alt="" style="width:250px;height:230px">
                        </div>
                        <div class="content">
                            <h3><?php echo $vrow['p_name']; ?></h3>
                            <div class="price" style="font-size: 15px;">Contact info:- <?php echo $vrow['user_phone']; ?> </div>
                            <div class="price">Rs.<?php echo $vrow['price']; ?> </div>
                            <form action="userview.php" method="post">
                                <input type="hidden" value="<?php echo $vrow['product_id'] ?>" name="pd">
                                <button class="btn">View </button>
                            </form>
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


    <!-- deal section starts  -->

    <section class="deal">

        <div class="content">
            <h3>deal of the day</h3>
            <h1>upto 50% off</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde perspiciatis in atque dolore tempora quaerat at fuga dolorum natus velit.</p>
            <a href="#" class="btn">shop now</a>
        </div>

        <div class="image">
            <img src="image/deal-img.jpg" alt="">
        </div>

    </section>

    <!-- deal section ends -->

    <!-- reviews section starts  -->

    <section class="reviews" id="reviews">

        <h1 class="heading"> <span>client's reviews</span> </h1>

        <div class="swiper reviews-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <img src="image/pic-1.png" alt="">
                    <h3>john deo</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique facere hic.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="image/pic-2.png" alt="">
                    <h3>john deo</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique facere hic.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="image/pic-3.png" alt="">
                    <h3>john deo</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique facere hic.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
                <div class="swiper-slide box">
                    <img src="image/pic-4.png" alt="">
                    <h3>john deo</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique facere hic.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="image/pic-5.png" alt="">
                    <h3>john deo</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique facere hic.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="image/pic-6.png" alt="">
                    <h3>john deo</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nihil ipsa placeat. Aperiam at sint, eos ex similique facere hic.</p>
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

    <section class="blogs" id="blogs">

        <h1 class="heading"> <span>our blogs</span> </h1>

        <div class="swiper blogs-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="image/blog-1.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>blog title goes here</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                        <a href="#" class="btn">read more</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="image/blog-2.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>blog title goes here</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                        <a href="#" class="btn">read more</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="image/blog-3.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>blog title goes here</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                        <a href="#" class="btn">read more</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="image/blog-4.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>blog title goes here</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                        <a href="#" class="btn">read more</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="image/blog-5.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>blog title goes here</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                        <a href="#" class="btn">read more</a>
                    </div>
                </div>

            </div>

        </div>

    </section>

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
                <img src="image/worldmap.png" class="map" alt="">
            </div>

        </div>

        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
            <a href="#" class="fab fa-pinterest"></a>
        </div>

        <div class="credit"> created by <span>mr. web designer</span> | all rights reserved! </div>

    </section>

    <!-- footer section ends -->

    <!-- loader  -->

    <!-- <div class="loader-container">
    <img src="image/loader-img.gif" alt="">
</div> -->












    <script>
        $(document).on('click', '.addto', function(e) {
            e.preventDefault();

            var prod_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "viewsql.php",
                data: {
                    'addtosubmit': true,
                    'prod_id': prod_id
                },
                success: function(response) {
                    // $('.description').load(' .description');
                    window.location.reload();
                    // alert(response);

                }
            });

        });
        $(document).on('click', '.viewwish', function(e) {
            e.preventDefault();

            var prod_id = $(this).val();
            // alert(prod_id);
            $.ajax({
                type: "POST",
                url: "viewsql.php",
                data: {

                    'deleproduct': true,
                    'prod_id': prod_id
                },
                success: function(response) {
                    $('.description').load(' .description');
                    window.location.reload();
                    // alert(response);

                }
            });

        });
    </script>



    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="script.js"></script>

</body>

</html>