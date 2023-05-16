<?php
include 'db_con.php';
include 'session.php';
if ($_SESSION['email']) {
    $email = $_SESSION['email'];

    $name = "SELECT * FROM tbl_login as a, tbl_users as b WHERE a.login_id=b.login_id and a.email='$email'";
    $name_check = mysqli_query($conn, $name);
    $row = mysqli_fetch_array($name_check);
}
// $pro_id = $_POST['pro_id'];
$pro_id = $_SESSION['pro_id'];
$loginid1 = $row['login_id'];
$user = "SELECT * FROM tbl_users where login_id='$pro_id'";
$user_con = mysqli_query($conn, $user);
$user_fech = mysqli_fetch_array($user_con);




$pro_img = "SELECT * FROM tbl_address where login_id='$loginid1'";
$pro_img_con = mysqli_query($conn, $pro_img);
$pro_img_fech = mysqli_fetch_array($pro_img_con);
// session_start();




$v = "SELECT * FROM tbl_product where delete_status='1' and login_id='$pro_id'";

$v_check = mysqli_query($conn, $v);
// $total_pages = $mysqli->query("SELECT * FROM tbl_product where delete_status='1'")->num_rows;
$total_pages = mysqli_num_rows($v_check);

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Number of results to show on each page.
$num_results_on_page = 9;

if ($stmt = $conn->prepare("SELECT a.*,b.* FROM tbl_product a inner join tbl_users b on a.login_id=b.login_id and  a.delete_status='1' where  a.login_id='$pro_id' ORDER BY a.p_name LIMIT ?,?")) {
    // Calculate the page to get the results we need from our table.
    $calc_page = ($page - 1) * $num_results_on_page;
    $stmt->bind_param('ii', $calc_page, $num_results_on_page);
    $stmt->execute();
    // Get the results...
    $result = $stmt->get_result();

    // if (isset($_POST['submit'])) {
    //     $pname = $_POST['pname'];
    //     $price = $_POST['price'];
    //     $desc = $_POST['desc'];
    //     $img = $_POST['img'];
    //     $user = $_POST['user'];
    //     $phone = $_POST['phone'];
    //     $pid = $_POST['pid'];


    //     $sqll = "select * from tbl_cart where pid='$pid' and username='$email'";
    //     $run = mysqli_query($conn, $sqll);
    //     $s = mysqli_num_rows($run);
    //     if ($s != 0) {
    //         echo "<script>alert('Product Already Exist')</script>";
    //         header("location:cart.php");
    //     } else {
    //         $ab = "INSERT INTO `tbl_cart`(`pid`,`pname`, `price`,`image`, `description`, `contact`,`username`) VALUES ('$pid','$pname','$price','$img','$desc','$phone','$email')";
    //         $exe = mysqli_query($conn, $ab);

    //         if ($exe) {
    //             echo "<script>alert('Product Added')</script>";
    //             header("location:user.php");
    //         }
    //     }

    //     // echo "<script>alert('$pname')</script>";
    // }


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
                padding-top: 15px;
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
                width: 30%;
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

            .btn-group {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                gap: 1.5rem;
                margin-top: 1.5rem;
            }

            .block-left {
                width: 25%;
                height: 100%;
                background-color: #f4f4f4;
                float: left;
            }

            .block-right {
                width: 75%;
                height: 100%;
                background-color: #f4f4f4;
                float: left;
            }

            /* MEDIA QUERIES FOR 545px <= Resolutions */

            @media (max-width:545px) {
                .block-left {
                    display: block;
                    width: 100%;
                }

                .block-right {
                    display: block;
                    width: 100%;
                }
            }

            @import url("https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap");

            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }


            .container {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .card {
                width: 300px;
                max-width: 300px;
                min-height: 400px;
                position: relative;
                text-align: center;
                margin: 32px;
                background: #fff;
                border-radius: 10px;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
            }

            .pic-container {
                width: 110px;
                height: 110px;
                border-radius: 100%;
                margin: 40px auto 20px;
            }

            .pic {
                width: 100px;
                height: 100px;
                border-radius: 100%;
                margin: auto;
                position: relative;
                top: 5px;
                box-shadow: 0 13px 26px rgba(0, 0, 0, 0.2), 0 3px 6px rgba(0, 0, 0, 0.2);
            }

            .name {
                color: #394f63;
                font-size: 18px;

            }

            .title {
                color: #394f63;
                font-size: 14px;
                padding: 8px;
            }

            .description {
                font-size: 14px;
                font-weight: 300;
                padding: 10px 22px;
            }

            .message {
                font-size: 22px;
                background: #09746c;
                background: -webkit-linear-gradient(to right, #09746c, #09746c);
                background: linear-gradient(to right, #09746c, #09746c);
                box-shadow: 0 0 20px 4px #ffffff, 0 0 20px 0px #09746c;
                border-radius: 50px;
                padding: 10px;
                margin: 16px 28px;
            }

            .message:hover {
                box-shadow: 0 0 20px 0px #ffffff, 0 4px 20px 0px #09746c;
                transition: 0.3s;
            }

            .links {
                margin: 42px 0;
            }

            a {
                text-decoration: none;
                color: #fff;
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


            .lsearchf {
                width: 100%;
                position: relative;
                display: flex;
            }

            .lsearchTermf {
                width: 100%;
                border: 3px solid #09746c;
                padding: 5px;
                border-radius: 5px 5px 5px 5px;
                outline: none;
                color: #9DBFAF;
            }

            .lsearchTermf:focus {
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
            .wrapf {
                width: 40%;
                position: absolute;
                top: 5%;
                left: 50%;
                transform: translate(-50%, -50%);

            }



            /* Styling for the search results lists */
            ul.results {
                list-style-type: none;
                margin: 0;
                margin-top: -40px;
                margin-left: 240px;
                padding: 0;
                width: 360px;
                position: absolute;
                background-color: #fff;
                border: 0px solid #ddd;
                max-height: 100px;
                overflow-y: auto;
                z-index: 1;
                color: #000;
            }

            ul.lresults {
                list-style: none;
                margin: 0;
                padding: 0px;
                position: absolute;
                z-index: 999;
                width: 230px;
                max-height: 100px;
                overflow-y: auto;
                background-color: #f9f9f9;
                border: 0px solid #ccc;
                color: #000;
            }

            ul.lresults li {
                padding: 10px;
                border-bottom: 1px solid #ccc;
                font-size: 14px;
            }

            ul.results li {
                padding: 10px;
                border-bottom: 1px solid #ccc;
                font-size: 14px;
            }

            ul.lresults li:hover,
            ul.results li:hover {
                background-color: #ddd;
                cursor: pointer;
            }

            /* Positioning the search results lists */
            ul.lresults {
                top: 40px;
            }

            ul.results {
                top: 80px;
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

                <form action="searchfilter.php" method="POST" class="search-fo">
                    <div class="wrapf">
                        <div class="searchf">
                            <input type="text" id="lsearch" name="lsearchpro" class="lsearchTermf" placeholder="Enter the location">
                            &nbsp;&nbsp;
                            <input type="text" id="search" name="searchpro" class="searchTermf" placeholder="Search your product">
                            <button type="submit" name="submit" class="searchButtonf">
                                <i class="fa fa-search"></i>
                            </button>

                        </div>
                        <ul id="lresults" class="lresults"></ul>
                        <ul id="results" class="results"></ul>
                    </div>

                </form>
                <div class=".btn-group">
                    <div class="icons ph">
                        <div id="search-btn" class="fas fa-search"></div>
                        <form action="chat/users.php" method="post">
                            <input type="hidden" value="<?php echo $row['login_id']; ?>" name="prouser">

                            <button class='bx bx-comment bx-tada ' style="font-size: 25px; margin-top:15px;background-color: #fff" type="submit" name="chat"></button>
                        </form>




                        <a href="cart.php" class="fas fa-heart mt-2" style=" margin-top:15px"></i></a>


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
                        <?php
                        if ($pro_img_fech['profileimg'] == "NILL") { ?>
                            <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="Profile Picture" />
                        <?php  } else { ?>
                            <img src="user_profile/images/<?php echo $pro_img_fech['profileimg'] ?>" alt="" style=" margin-right:15px" />
                        <?php } ?>



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
        <?php $profile_sql = "SELECT * FROM tbl_address where  login_id='$pro_id'";
        $v_profile = mysqli_query($conn, $profile_sql);
        $profile = mysqli_fetch_array($v_profile); ?>
        <div>
            <div class="block-left">
                <div class="card">
                    <div class="pic-container">
                        <?php
                        if ($profile['profileimg'] == "NILL") { ?>
                            <img class="pic" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="Profile Picture" />
                        <?php  } else { ?>
                            <img class="pic" src="user_profile/images/<?php echo $profile['profileimg'] ?>" alt="Profile Picture" />
                        <?php } ?>

                    </div>
                    <div class="name">
                        <span><?php echo $user_fech['user_fname'] . " " . $user_fech['user_lname'] ?></span>
                    </div>
                    <div class="title">
                        <b> <span>Address:-</span></b>
                    </div>
                    <div class="description">
                        <p><?php echo $profile['house'] ?>,<br><?php echo $profile['street'] ?>,<?php echo $profile['city'] ?>,<br><?php echo $profile['state'] ?>,<?php echo $profile['pincode'] ?></p>
                    </div>
                    <div class="title">
                        <b> <span>Contact Info:-<?php echo $user_fech['user_phone'] ?></span></b>
                    </div>
                    <form action="chat/chat.php" method="get">
                        <input type="hidden" value="<?php echo $profile['login_id']; ?>" name="user_id">
                        <button class="btn chat" type="submit" name="chat" style="width: 150px;margin-right:10px">chat</button>

                </div>
            </div>
            <div class="block-right">

                <section class="featured" id="featured">


                    <div>
                        <ul class="mystyle-products" id="searched">
                            <?php while ($vrow = $result->fetch_assoc()) : ?>
                                <li class="product">
                                    <a href="userview.php?pd=<?php echo $vrow['product_id'] ?>" name="pd">
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
                                            <ins> <span class="amount">Rs.<?php echo $vrow['price']; ?></span> </ins><br>
                                            <ins> <span class="amount"> Contact info:- <?php echo $vrow['user_phone']; ?></span> </ins>
                                            <!-- <span class="sale-tag sale-tag-square">-33%</span> -->
                                        </span>
                                    </a>

                                    <!-- <a href="login.php" style="margin-left: 260px"><i class="fa-solid fa-heart fa-beat fa-2xl"></i>
                            </a> -->
                                    <form method="post" action="">

                                        <input type="hidden" value="<?php echo $vrow['product_id'] ?>" name="pd">
                                        <?php
                                        $pid = $vrow['product_id'];
                                        $sql11 = "select * from tbl_cart where pid='$pid' and username='$email'";
                                        $run11 = mysqli_query($conn, $sql11);
                                        $w = mysqli_num_rows($run11);
                                        if ($w == 0) { ?>
                                            <button style="width: 40px;height:1px;color:#fff;margin-left: 220px;background-color: #fff" class=" aaa addto" type="submit" value="<?php echo $vrow['product_id']; ?>"> <i class="far fa-heart fa-lg" style="color: #2a2828;"></i></button>
                                        <?php } else { ?>
                                            <button style="width: 40px;height:1px;color:#fff;margin-left: 220px;background-color: #fff" class=" aaa viewwish" type="submit" value="<?php echo $vrow['product_id']; ?>"> <i class="fas fa-heart fa-lg" style="color: #e64141;"></i></button>
                                        <?php  } ?>
                                    </form>

                                    <!-- <a href="tttt" class="btnn btnn-dark btnn-circle btnn-review" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="fa-solid fa-heart fa-beat fa-2xl"></i></a> -->
                                </li>
                            <?php endwhile; ?>
                        </ul>
                        <?php if (ceil($total_pages / $num_results_on_page) > 0) : ?>
                            <center>
                                <ul class="pagination">
                                    <?php if ($page > 1) : ?>
                                        <li class="prev"><a href="profileads.php?page=<?php echo $page - 1 ?>">Prev</a></li>
                                    <?php endif; ?>

                                    <?php if ($page > 3) : ?>
                                        <li class="start"><a href="profileads.php?page=1">1</a></li>
                                        <li class="dots">...</li>
                                    <?php endif; ?>

                                    <?php if ($page - 2 > 0) : ?><li class="page"><a href="profileads.php?page=<?php echo $page - 2 ?>"><?php echo $page - 2 ?></a></li><?php endif; ?>
                                    <?php if ($page - 1 > 0) : ?><li class="page"><a href="profileads.php?page=<?php echo $page - 1 ?>"><?php echo $page - 1 ?></a></li><?php endif; ?>

                                    <li class="currentpage"><a href="profileads.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

                                    <?php if ($page + 1 < ceil($total_pages / $num_results_on_page) + 1) : ?><li class="page"><a href="profileads.php?page=<?php echo $page + 1 ?>"><?php echo $page + 1 ?></a></li><?php endif; ?>
                                    <?php if ($page + 2 < ceil($total_pages / $num_results_on_page) + 1) : ?><li class="page"><a href="profileads.php?page=<?php echo $page + 2 ?>"><?php echo $page + 2 ?></a></li><?php endif; ?>

                                    <?php if ($page < ceil($total_pages / $num_results_on_page) - 2) : ?>
                                        <li class="dots">...</li>
                                        <li class="end"><a href="profileads.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
                                    <?php endif; ?>

                                    <?php if ($page < ceil($total_pages / $num_results_on_page)) : ?>
                                        <li class="next"><a href="profileads.php?page=<?php echo $page + 1 ?>">Next</a></li>
                                    <?php endif; ?>
                                </ul>
                            </center>
                        <?php endif; ?>
                    </div>

                    <!-- <div class="swiper featured-slider">
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

             </div> -->


                </section>
            </div>
        </div>

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
                        $('.description').load('.description');
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
        <script>
            $(document).ready(function() {
                $("#searchhh").keyup(function() {
                    var search = $("#searchhh").val();
                    console.log(search);
                    // alert(search);
                    $.ajax({
                        type: "POST",
                        url: "search _main.php",

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

        <script>
            $(document).ready(function() {
                // Attach an event listener to the search field
                $("#search").keyup(function() {
                    // Get the search term from the user input
                    var searchTerm = $(this).val();

                    // Send an AJAX request to the PHP script to retrieve autocomplete suggestions
                    $.getJSON("autocomplete.php", {
                        term: searchTerm

                    }, function(data) {
                        console.log(data);
                        // Update the search results with the suggestions returned by the PHP script
                        $("#results").empty();
                        $.each(data, function(key, value) {
                            $("#results").append("<li>" + value + "</li>");
                        });

                        // Attach an event listener to each result in the list
                        $("#results li").click(function() {
                            // Update the search field with the selected result
                            $("#search").val($(this).text());

                            // Clear the results list
                            $("#results").empty();
                        });
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // Attach an event listener to the search field
                $("#lsearch").keyup(function() {
                    // Get the search term from the user input
                    var lsearchTerm = $(this).val();

                    // Send an AJAX request to the PHP script to retrieve autocomplete suggestions
                    $.getJSON("autocomplete.php", {
                        lterm: lsearchTerm
                    }, function(data) {
                        console.log(data);
                        // Update the search results with the suggestions returned by the PHP script
                        $("#lresults").empty();
                        $.each(data, function(key, value) {
                            $("#lresults").append("<li>" + value + "</li>");
                        });

                        // Attach an event listener to each result in the list
                        $("#lresults li").click(function() {
                            // Update the search field with the selected result
                            $("#lsearch").val($(this).text());

                            // Clear the results list
                            $("#lresults").empty();
                        });
                    });
                });
            });
        </script>

        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

        <!-- custom js file link  -->
        <script src="script.js"></script>

    </body>

    </html>
<?php
    $stmt->close();
}
?>