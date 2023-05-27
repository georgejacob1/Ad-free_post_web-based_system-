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
$pd = $_GET['pd'];
if (!isset($pd)) {
    header('location: user.php');
}
$v = "SELECT * FROM tbl_product where product_id='$pd'";
$v_check = mysqli_query($conn, $v);
$vrow = mysqli_fetch_array($v_check);


$fm = $vrow['login_id'];
$m = "SELECT * FROM tbl_users  where login_id='$fm'";
$m_check = mysqli_query($conn, $m);
$mrow = mysqli_fetch_array($m_check);
$u = "SELECT * FROM tbl_address  where login_id='$fm'";
$u_check = mysqli_query($conn, $u);
$urow = mysqli_fetch_array($u_check);



$pro_img = "SELECT * FROM tbl_address where login_id='$loginid1'";
$pro_img_con = mysqli_query($conn, $pro_img);
$pro_img_fech = mysqli_fetch_array($pro_img_con);

$s = $vrow['subcat_id'];
$vs = "SELECT * FROM tbl_subcat where sub_id='$s'";
$v_check1 = mysqli_query($conn, $vs);
$vrow1 = mysqli_fetch_array($v_check1);
if (mysqli_num_rows($v_check1) == 0) {
    // if the id doesn't exist, redirect to the 404 error page
    header("location:404.php");
    include("404.php"); // replace "404.php" with the actual name of your 404 error page
    exit();
}

$c = $vrow1['cat_id'];

$vs1 = "SELECT * FROM tbl_categories where cat_id='$c'";
$v_check11 = mysqli_query($conn, $vs1);
$vrow11 = mysqli_fetch_array($v_check11);


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
            header("location:userview.php");
        }
    }

    // echo "<script>alert('$pname')</script>";
}


if (isset($_POST['ressubmit'])) {
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
            header("location:userview.php");
        }
    }

    // echo "<script>alert('$pname')</script>";
}

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./styles/style.css" />
    <!-- custom css file link  -->
    <link rel="stylesheet" href="sty.css" />
    <link rel="stylesheet" href="image.css" />
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


        .cart_item {
            color: #fff;
            background: red;
            border-radius: 50%;
            padding: 5px;
            text-align: center;
            position: absolute;
            right: -15px;
            width: 10px;
            height: 10px;
            top: -15px;
            font-size: 11px;
        }





        img {
            height: auto;
            max-width: 100%;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #231A3B;
        }

        .site {
            padding-top: 15px;
        }

        /* The parent has the "display: grid;" property and it defines the template areas */
        .profile-card {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: 240px 1fr;
            grid-template-areas:

                "pc-user pc-user pc-user pc-user-buttons";
            min-width: 480px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 50px rgba(63, 57, 71, .15);
        }


        /* We define "grid-area" names for the direct child of the grid parent */



        /* Direct child of the grid parent. Again we define the name of the "grid-area" porperty */
        .pc-user {
            display: grid;
            grid-template-columns: 1fr 2fr;
            grid-area: pc-user;
        }

        .pc-user-image {
            padding: 18px 26px 18px 18px;
            position: relative;
        }



        .pc-user-image img {
            width: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .pc-user-info {
            padding: 20px 20px 20px 0;
        }

        .pc-user-info>h3 {
            font-size: 24px;
            line-height: 1.3em;
            margin-bottom: 6px;
        }

        .pc-user-info>h3 a {
            color: #1d2025;
            text-decoration: none;
            transition: color .3s ease-in-out;
        }

        .pc-user-info>h3 a:hover {
            color: #432F7A;
        }

        .pc-user-title {
            margin-bottom: 3px;
            color: #1d2025;
            font-size: medium;
        }

        .pc-user-location {
            margin-bottom: 20px;
            color: #1d2025;
            font-size: medium;
        }

        .pc-user-location svg {
            width: 9px;
            margin-right: 5px;
            opacity: 0.4;
        }

        .pc-social {
            list-style-type: none;
            display: flex;
        }

        .pc-social li+li {
            margin-left: 15px;
        }

        .pc-social li svg {
            max-width: 22px;
            position: relative;
            opacity: 0.5;
            transition: opacity .2s ease-in-out;
        }

        .pc-social li a:hover svg {
            opacity: 1;
        }

        /* Again >> direct child of the grid parent. We define the "grid-area" name */
        .pc-user-buttons {
            grid-area: pc-user-buttons;
            padding: 18px;
        }

        .pc-user-buttons .pc-btn {
            display: block;
            padding: 6px 40px;
            padding-top: 10px;
            font-size: 13px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            border-radius: 50px;
            border: 1px solid #E5DFEF;
            color: #231A3B;
            transition: background .2s ease-in-out;
        }

        .pc-user-buttons .pc-btn:hover {
            background: #E5DFEF;
        }

        .pc-user-buttons .pc-btn.accent {
            margin-bottom: 10px;
            border-color: #4F3FF1;
            background: #4F3FF1;
            color: #fff;
            box-shadow: 0 4px 10px rgba(80, 60, 240, 0.2);
        }

        .pc-user-buttons .pc-btn.accent:hover {
            background: #483AD7;
        }

        .pc-user-buttons .pc-btn+.pc-btn {
            margin-top: 12px;
        }

        /* Responsive styling */
        @media only screen and (max-width: 1024px) {
            .site {
                padding: 60px;
            }
        }

        @media only screen and (max-width: 767px) {
            .site {
                padding: 25px;
            }

            /* Here we define new columns and rows template. Then we rearrange the "grid-area" to match our needs. */
            .profile-card {
                display: grid;
                grid-template-columns: 1fr 1fr;
                grid-template-rows: repeat(auto, 4);
                grid-template-areas:

                    "pc-user pc-user"
                    "pc-user-buttons pc-user-buttons"
            }


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
        <!-- <div class="container"> -->
        <div class="contente">
            <!-- Lightbox -->

            <input type="radio" id="image1" name="image" checked>
            <input type="radio" id="image2" name="image">
            <input type="radio" id="image3" name="image">

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
                        <div class="price" style="color: #1d2025;">Rs.<?php echo $vrow['price']; ?></div>
                    </div>

                    <!-- <div class="discount">50%</div> -->


                    <!-- <div class="old-price">$250.00</div> -->
                </div>

                <div class="count-btn-group">

                    <form action="chat/chat.php" method="get">
                        <input type="hidden" value="<?php echo $vrow['login_id']; ?>" name="user_id">

                        <button class="btn chat" type="submit" name="chat" style="width: 520px;margin-right:10px">chat</button>
                    </form>
                    <div class="gr">
                        <?php
                        $pid = $vrow['product_id'];
                        $sql11 = "select * from tbl_cart where pid='$pid' and username='$email'";
                        $run11 = mysqli_query($conn, $sql11);
                        $w = mysqli_num_rows($run11);
                        if ($w == 0) { ?>
                            <button style="width: 50px;height:30px;color:#fff;background-color:#f4f4f4" class="aaa addto" type="submit" value="<?php echo $vrow['product_id']; ?>"> <i class="far fa-heart fa-lg" style="color: #2a2828;font-size: 35px;"></i></button>
                        <?php } else { ?>
                            <button style="width: 50px;height:30px;color:#fff;background-color: #f4f4f4" class="aaa viewwish" type="submit" value="<?php echo $vrow['product_id']; ?>"> <i class="fas fa-heart fa-lg" style="color: #e64141;font-size: 35px;"></i></button>
                        <?php  } ?>
                    </div>



                </div>

                <div class="site">
                    <div class="profile-card">
                        <div class="pc-user">
                            <div class="pc-user-image">
                                <?php
                                if ($urow['profileimg'] == "NILL") { ?>
                                    <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
                                <?php  } else { ?>
                                    <img src="user_profile/images/<?php echo $urow['profileimg'] ?>" alt="" />
                                <?php } ?>
                            </div>
                            <?php
                            $pro_id = $urow['login_id'];
                            $users = "SELECT * FROM tbl_users  WHERE login_id='$pro_id'";
                            $users_run = mysqli_query($conn, $users);
                            $data = mysqli_fetch_array($users_run)
                            ?>
                            <div class="pc-user-info">
                                <h3><?php echo $mrow['user_fname']; ?> <?php echo $mrow['user_lname']; ?></h3> <?php
                                                                                                                if ($data['user_status'] == "verified") {
                                                                                                                ?><img style="height: 40px;width: 70px;" src="https://www.nicepng.com/png/detail/435-4351856_many-green-verified-icon-png.png" alt="Many - Green Verified Icon Png@nicepng.com">
                                <?php
                                                                                                                }
                                ?>
                                <div class="pc-user-title">
                                    <p><b>Address</b></p>
                                </div>
                                <div class="pc-user-location">
                                    <p>

                                        <?php echo $urow['house']; ?>,</br> <?php echo $urow['street']; ?>,<?php echo $urow['city']; ?>,<br>
                                        <?php echo $urow['state']; ?>,<?php echo $urow['pincode']; ?><br>
                                        <b>Contact info:-<?php echo $mrow['user_phone']; ?></b><br>
                                    </p>
                                </div>

                            </div>
                        </div>
                        <div class="pc-user-buttons">
                            <!-- <form action="chat/chat.php" method="get">
                                <input type="hidden" value="<?php echo $vrow['login_id']; ?>" name="user_id">
                                <button class="pc-btn accent">chat</button>
                            </form> -->
                            <form action="profileads.php" method="POST">
                                <?php
                                $_SESSION['pro_id'] = $urow['login_id'];
                                ?>
                                <input type="hidden" value="<?php echo $urow['login_id']; ?>" name="pro_id">
                                <button class="pc-btn " type="submit">View</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="description">

                    <b> Posted from:-</b><br><iframe src='https://www.google.com/maps?q=<?php echo $vrow["latitude"]; ?>, <?php echo $vrow["longitude"]; ?>&h1=es,z=14&output=embed' width="250px" height=""  ></iframe><br>
                </div>
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
    <!-- </div> -->
    </section>

    <!-- icons section ends -->

    <!-- featured section starts  -->
    <section class="featured" id="featured">
        <h1 class="heading"><span>Recent ads</span></h1>


        <div class="swiper featured-slider">
            <div class="swiper-wrapper">
                <?php
                $v1 = "SELECT a.*,b.* FROM tbl_product a inner join tbl_users b on a.login_id=b.login_id and  a.delete_status='1' where a.product_id!='$pd' and a.login_id!='$loginid1' ORDER BY product_id DESC LIMIT 8;";
                $v_check1 = mysqli_query($conn, $v1);
                while ($vrow1 = mysqli_fetch_array($v_check1)) {
                ?>
                    <div class="swiper-slide box">
                        <div class="mystyle-products">
                            <li class="product1">
                                <a href="userview.php?pd=<?php echo $vrow1['product_id'] ?>" name="pd">
                                    <?php
                                    $subcat_id = $vrow1['subcat_id'];
                                    $sql1 = "SELECT tbl_categories.category FROM tbl_categories INNER JOIN tbl_subcat ON tbl_subcat.cat_id=tbl_categories.cat_id INNER JOIN tbl_product ON tbl_product.subcat_id=tbl_subcat.sub_id WHERE tbl_product.subcat_id='$subcat_id'";
                                    $res1 = mysqli_query($conn, $sql1);
                                    $sales1 = mysqli_fetch_array($res1);
                                    $sales_name1 = $sales1['category'];
                                    ?>
                                    <span class="onsale"><?php echo $sales_name1; ?></span>
                                    <img src="user_profile/images/<?php echo $vrow1['p_image']; ?>" alt="" style="width:290px;height:230px" />
                                    <h3><?php echo $vrow1['p_name']; ?></h3>
                                    <span class="price">
                                        <!-- <del> <span class="amount">399.000 ₫</span> </del> -->
                                        <ins> <span class="amount">Rs.<?php echo $vrow1['price']; ?></span> </ins><br>
                                        <ins> <span class="amount"> Contact info:- <?php echo $vrow1['user_phone']; ?></span> </ins>
                                        <!-- <span class="sale-tag sale-tag-square">-33%</span> -->
                                    </span>
                                </a>
                                <div class="grp">
                                    <form method="post" action="">


                                        <input type="hidden" value="<?php echo $vrow['product_id'] ?>" name="pd">
                                        <?php
                                        $pid = $vrow1['product_id'];
                                        $sql11 = "select * from tbl_cart where pid='$pid' and username='$email'";
                                        $run11 = mysqli_query($conn, $sql11);
                                        $w = mysqli_num_rows($run11);
                                        if ($w == 0) { ?>
                                            <button style="width: 40px;height:1px;color:#fff;margin-left: 240px;background-color: #fff" class=" aaa addto" type="submit" value="<?php echo $vrow1['product_id']; ?>"> <i class="far fa-heart fa-lg" style="color: #2a2828;"></i></button>
                                        <?php } else { ?>
                                            <button style="width: 40px;height:1px;color:#fff;margin-left: 240px;background-color: #fff" class=" aaa viewwish" type="submit" value="<?php echo $vrow1['product_id']; ?>"> <i class="fas fa-heart fa-lg" style="color: #e64141;"></i></button>
                                        <?php  } ?>
                                    </form>
                                </div>
                            </li>

                        </div>
                    </div>


                <?php
                }
                ?>
                <div class="swiper-slide box">
                    <div class="mystyle-products">
                        <li class="product1">
                            <a href="user.php">


                                <img src="image/pluz.png" alt="" style="width:290px;height:340px" />


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
                    $('.gr').load(' .gr');

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
                    $('.gr').load(' .gr');

                    window.location.reload();
                    // alert(response);

                }
            });

        });



        // $(document).on('click', '.addtoo', function(e) {
        //     e.preventDefault();

        //     var prod_id = $(this).val();
        //     $.ajax({
        //         type: "POST",
        //         url: "viewsql.php",
        //         data: {
        //             'addtosubmit': true,
        //             'prod_id': prod_id
        //         },
        //         success: function(response) {
        //             $('.grp').load(' .grp');
        //             // window.location.reload();
        //             // alert(response);

        //         }
        //     });

        // });
        // $(document).on('click', '.viewwishh', function(e) {
        //     e.preventDefault();

        //     var prod_id = $(this).val();
        //     // alert(prod_id);
        //     $.ajax({
        //         type: "POST",
        //         url: "viewsql.php",
        //         data: {

        //             'deleproduct': true,
        //             'prod_id': prod_id
        //         },
        //         success: function(response) {
        //             $('.grp').load(' .grp');
        //             // window.location.reload();
        //             // alert(response);

        //         }
        //     });

        // });
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