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

// if(isset)
// $pd = $_POST['pd'];
// $v = "SELECT * FROM tbl_cart";
// $v_check = mysqli_query($conn, $v);
// $vrow = mysqli_fetch_array($v_check);
?>

<html lang="en">

<head>
    <style>
        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }
    </style>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" /> -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://kit.fontawesome.com/6007aa3653.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body><!-- Navbar -->
    <a href="user.php"><img src="image/logo.png" class="logo" alt="" height="60px" width="60px"></a>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #09746c;">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <!-- <a class="navbar-brand mt-2 mt-lg-0" href="user.php">

                    <img src="image/logo.png" alt="" height="60px" width="60px" />
                </a> -->
                <!-- Left links -->
                <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Projects</a>
                    </li>
                </ul> -->
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <!-- Icon -->
                <a class="link-secondary me-3" href="#">
                    <i class="fas fa-shopping-cart"></i>
                </a>

                <!-- Notifications -->

                <!-- Avatar -->
                <div class="dropdown">
                    <a style="text-decoration:none;color: #ffffff;" class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <span><?php echo $row['user_fname'] . " " . $row['user_lname']; ?> </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

    <!-- <a href="user.php"><img src="image/logo.png" class="logo" alt="" height="60px" width="60px"></a>
    <a href="logout.php" class="btn btn-primary" style="font-weight: 500;margin-left:85%;">logout</a> -->
    <section class="h-50 h-custom">
        <div class="container h-50 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">


                    <div class="table-responsive">


                        <table class="table">
                            <thead>
                                <tr>

                                    <!-- <th scope="col">product</th> -->
                                    <th scope="col" class="h5">Shopping Bag</th>
                                    <th scope="col">price</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">remove</th>
                                    <th scope="col">view</th>

                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $sql = "select * from tbl_cart where username='$email'";
                                $run = mysqli_query($conn, $sql);
                                while ($ru = mysqli_fetch_assoc($run)) {
                                    $productname = $ru['pname'];
                                    $pid = $ru['id'];
                                    $price = $ru['price'];
                                    $description = $ru['description'];
                                    // $description=$ru['description'];
                                    $image = $ru['image'];
                                    $contact = $ru['contact'];

                                    //$discount=$ru['discount'];
                                    // $a=($discount/100)*$price;
                                    // $actualprice=$price-$a;

                                ?>

                                    <tr>

                                        <th scope="row">

                                            <div class="d-flex align-items-center">
                                                <img src="user_profile/images/<?php echo $image; ?>" class="img-fluid rounded-3" style="width: 120px;" alt="Book">
                                                <div class="flex-column ms-4">
                                                    <p class="mb-2"><?php echo $productname; ?></p>
                                                    <p class="mb-0"><?php echo $description; ?></p>
                                                </div>
                                            </div>

                                        </th>

                                        <td class="align-middle">
                                            <div class="d-flex flex-row">


                                                <p class="mb-0" style="font-weight: 500;"><?php echo $price; ?></p>

                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <p class="mb-0" style="font-weight: 500;"><?php echo $contact; ?></p>
                                        </td>
                                        <td class="align-middle">
                                            <a href="deletefrom.php?product=<?php echo $pid; ?>" type="button" class="btn btn-dark">Remove</a>


                                        </td>
                                        <td class="align-middle">
                                            </br>
                                            <form action="userview.php" method="post">
                                                <input type="hidden" value="<?php echo $ru['pid']; ?>" name="pd">
                                                <button class="btn btn-dark">View</button>
                                            </form>
                                        </td>

                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>




                </div>
            </div>
        </div>
    </section>


    <!-- MDB -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script> -->
</body>

</html>