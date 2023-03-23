<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="header-1">
        <a href="user.php"><img src="image/logo.png" class="logo" alt="" height="60px" width="60px" /></a>
        <form action="" class="search-form">
            <input type="search" name="" placeholder="search here..." id="search-box" />
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <div class="icons ph">
            <div id="search-btn" class="fas fa-search"></div>
            <div class="p-3">
                <a href="cart.php" class="fas fa-heart mt-2"></i></a>

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
                <img src="image/pic-2.png" alt="" style="" />

            </div>
        </div>
    </div>


</body>

</html>