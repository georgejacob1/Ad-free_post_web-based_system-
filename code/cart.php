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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <a href="user.php"><img src="image/logo.png" class="logo" alt="" height="60px" width="60px"></a>
    <a href="logout.php" class="btn btn-primary" style="font-weight: 500;margin-left:85%;">logout</a>
    <section class="h-50 h-custom">
        <div class="container h-50 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">


                    <div class="table-responsive">
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

                            <table class="table">
                                <thead>
                                    <tr>

                                        <!-- <th scope="col">product</th> -->
                                        <th scope="col" class="h5">Shopping Bag</th>

                                        <th scope="col">price</th>

                                        <th scope="col">Contact</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>

                                <tbody>
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
                                            <a href="deletefrom.php?product=<?php echo $pid; ?>" class="btn btn-primary" style="font-weight: 500;">delete</a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                    </div>
                <?php
                        }
                ?>



                </div>
            </div>
        </div>
    </section>
</body>

</html>