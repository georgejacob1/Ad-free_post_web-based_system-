<?php
include 'db_con.php';

// Get the total number of records from our table "students".
$v = "SELECT * FROM tbl_product where delete_status='1'";

$v_check = mysqli_query($conn, $v);
// $total_pages = $mysqli->query("SELECT * FROM tbl_product where delete_status='1'")->num_rows;
$total_pages = mysqli_num_rows($v_check);

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Number of results to show on each page.
$num_results_on_page = 12;

if ($stmt = $conn->prepare("SELECT * FROM tbl_product where delete_status='1' ORDER BY p_name LIMIT ?,?")) {
    // Calculate the page to get the results we need from our table.
    $calc_page = ($page - 1) * $num_results_on_page;
    $stmt->bind_param('ii', $calc_page, $num_results_on_page);
    $stmt->execute();
    // Get the results...
    $result = $stmt->get_result();
?>




    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Easy Buy</title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css"   />


        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <script src="https://kit.fontawesome.com/6007aa3653.js" crossorigin="anonymous"></script>
        <!-- custom css file link  -->
        <link rel="stylesheet" href="sty.css">




        <!-- css -->


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

            .mystyle-products.slider-products .product {
                width: auto;
                margin-bottom: 0;
            }

            .mystyle-products .product {
                width: 25%;
                margin-bottom: 20px;
                position: relative;
                padding: 20px;
                background: #fff;
            }

            @media (max-width: var(--breakpoint-sm)) {
                .mystyle-products .product {
                    width: 50%;
                }
            }

            @media (max-width: var(--breakpoint-xs)) {
                .mystyle-products .product {
                    width: auto;
                }
            }

            .mystyle-products .product:hover {
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                z-index: 7;
            }

            .mystyle-products .product:hover .btnn-circle {
                transform: translateY(0);
                visibility: visible;
                opacity: 1;
            }

            .mystyle-products .product h3 {
                font-size: 12px;
                line-height: 20px;
                margin-top: 10px;
                height: 39px;
                overflow: hidden;
            }

            @media (max-width: var(--breakpoint-xs)) {
                .mystyle-products .product h3 {
                    height: auto;
                }
            }

            .mystyle-products .product>a {
                position: relative;
                display: block;
                color: #333;
                text-decoration: none;
            }

            .mystyle-products .product>a:hover {
                text-decoration: none;
            }

            .mystyle-products .product .add_to_cart_button {
                display: none;
            }

            .mystyle-products .product .attachment-shop_catalog {
                display: block;
                margin: 0 auto;
            }

            .mystyle-products .product .btnn-circle {
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

            .mystyle-products .product .price {
                font-size: 14px;
            }

            .mystyle-products .product .price ins {
                text-decoration: none;
                font-weight: 700;
                white-space: nowrap;
            }

            .mystyle-products .product .price del {
                color: #666;
                font-size: 11px;
                padding-right: 7px;
                white-space: nowrap;
            }

            .mystyle-products .product .price .sale-tag {
                color: red;
                font-size: 12px;
                padding-left: 7px;
                font-weight: 700;
            }

            .mystyle-products .product .fa-solid {
                margin-left: 260px;
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

            .pagination {
                list-style-type: none;
                padding: 10px 0;
                display: inline-flex;
                justify-content: space-between;
                box-sizing: border-box;
            }

            .pagination li {
                box-sizing: border-box;
                padding-right: 10px;
            }

            .pagination li a {
                box-sizing: border-box;
                background-color: #e2e6e6;
                padding: 8px;
                text-decoration: none;
                font-size: 12px;
                font-weight: bold;
                color: #616872;
                border-radius: 4px;
            }

            .pagination li a:hover {
                background-color: #d4dada;
            }

            .pagination .next a,
            .pagination .prev a {
                text-transform: uppercase;
                font-size: 12px;
            }

            .pagination .currentpage a {
                background-color: #09746c;
                color: #fff;
            }

            .pagination .currentpage a:hover {
                background-color: #033e3a;
            }

            .searchf {
                width: 600px;
                position: relative;
                display: flex;
            }

            .searchTermf {
                width: 900px;
                border: 3px solid #09746c;
                border-right: none;
                padding: 5px;
                border-radius: 5px 0 0 5px;
                outline: none;
                color: #9DBFAF;

            }

            .searchTermf:focus {
                color: #09746c;
            }

            .searchButtonf {
                width: 40px;
                height: 36px;
                border: 1px solid #09746c;
                background: #09746c;
                text-align: center;
                color: #fff;
                border-radius: 0 5px 5px 0;
                cursor: pointer;
                font-size: 20px;

            }

            /*Resize the wrap to see the search bar change!*/
            .header-1 .wrapf {
                margin: 0;
                padding: 0;
                display: flex;
                flex-wrap: wrap;
                overflow: hidden;

            }

            .wrapf {
                width: 40%;
                position: absolute;
                top: 5%;
                left: 50%;
                transform: translate(-50%, -50%);

            }
        </style>

    <body>


        <!-- header section starts  -->

        <header class="header">

            <div class="header-1">


                <a href="#"><img src="image/logo.png" class="logo" alt="" height="60px" width="60px"></a>


                <div class="wrapf">
                    <div class="searchf">
                        <input type="text" id="search" name="searchpro" class="searchTermf" placeholder="Search your product">
                        <button type="submit" name="submit" class="searchButtonf">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>

                </div>



                <div class="icons">
                    <!-- <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-shopping-cart"></a> -->
                    <!-- <a style="font-family: poppins;" href="reg.php">Register</a> -->
                    <a href="login.php">
                        <i class="fas fa-user"></i>
                        <span style="font-weight: bold;">Login</span></a>
                </div>

            </div>


            <div class="header-2">
                <nav class="navbar">
                    <!-- <a href="#home">home</a> -->
                    <a href="#featured">Recent ads</a>
                    <a href="#arrivals">arrivals</a>
                    <a href="#reviews">reviews</a>
                    <a href="#blogs">blogs</a>
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

        <!-- featured section start -->

        <section class="featured" id="featured">

            <!-- product display start-->

            <ul class="mystyle-products" id="searched">
                <?php while ($vrow = $result->fetch_assoc()) : ?>
                    <li class="product">
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
                                <ins> <span class="amount">Rs.<?php echo $vrow['price']; ?></span> </ins>
                            </span>
                        </a>

                        <a href="login.php"><i class="fa-solid fa-heart fa-beat fa-2xl"></i>
                        </a>

                    </li>
                <?php endwhile; ?>
            </ul>
            <!-- product display end -->

            <!-- pages start  -->

            <?php if (ceil($total_pages / $num_results_on_page) > 0) : ?>
                <center>
                    <ul class="pagination">
                        <?php if ($page > 1) : ?>
                            <li class="prev"><a href="index.php?page=<?php echo $page - 1 ?>">Prev</a></li>
                        <?php endif; ?>

                        <?php if ($page > 3) : ?>
                            <li class="start"><a href="index.php?page=1">1</a></li>
                            <li class="dots">...</li>
                        <?php endif; ?>

                        <?php if ($page - 2 > 0) : ?><li class="page"><a href="index.php?page=<?php echo $page - 2 ?>"><?php echo $page - 2 ?></a></li><?php endif; ?>
                        <?php if ($page - 1 > 0) : ?><li class="page"><a href="index.php?page=<?php echo $page - 1 ?>"><?php echo $page - 1 ?></a></li><?php endif; ?>

                        <li class="currentpage"><a href="index.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

                        <?php if ($page + 1 < ceil($total_pages / $num_results_on_page) + 1) : ?><li class="page"><a href="index.php?page=<?php echo $page + 1 ?>"><?php echo $page + 1 ?></a></li><?php endif; ?>
                        <?php if ($page + 2 < ceil($total_pages / $num_results_on_page) + 1) : ?><li class="page"><a href="index.php?page=<?php echo $page + 2 ?>"><?php echo $page + 2 ?></a></li><?php endif; ?>

                        <?php if ($page < ceil($total_pages / $num_results_on_page) - 2) : ?>
                            <li class="dots">...</li>
                            <li class="end"><a href="index.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
                        <?php endif; ?>

                        <?php if ($page < ceil($total_pages / $num_results_on_page)) : ?>
                            <li class="next"><a href="index.php?page=<?php echo $page + 1 ?>">Next</a></li>
                        <?php endif; ?>
                    </ul>
                </center>
            <?php endif; ?>

            <!-- pages end  -->





        </section>


        <!-- featured section ends -->

        <!-- newsletter section starts -->



        <!-- arrivals section ends -->

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
















        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- custom js file link  -->

        <script>
            $(document).ready(function() {
                $("#search").keyup(function() {
                    var search = $("#search").val();
                    console.log(search);
                    // alert(search);
                    $.ajax({
                        type: "POST",
                        url: "search.php",

                        data: {
                            search: search,

                        },



                        success: function(response) {
                            // $(input).val(quantity);
                            console.log(response);
                            //alert(response);
                            $("#searched").html(response);
                        }
                    });

                });
            });
        </script>
        <script src="script.js"></script>





    </body>

    </html>
<?php
    $stmt->close();
}
?>