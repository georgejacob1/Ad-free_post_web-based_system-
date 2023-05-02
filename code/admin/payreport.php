<?php
include 'admin-session.php';
include '../db_con.php';



$q = "select count(*) as c from tbl_payment ";


$result = mysqli_query($conn, $q);
//echo $result;
$row = mysqli_fetch_array($result);
$count = $row['c'];


// Retrieve data from MySQL database
$current_year = date('Y');
$previous_year = $current_year - 1;

$current_year_data = array_fill(0, 12, 0);
$previous_year_data = array_fill(0, 12, 0);

$sql = "SELECT MONTH(transcation_date) AS month,YEAR(transcation_date) AS year,COUNT(*) AS total_users FROM tbl_payment WHERE YEAR(transcation_date) IN ($current_year, $previous_year) GROUP BY YEAR(transcation_date), MONTH(transcation_date)";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['year'] == $current_year) {
        $current_year_data[$row['month'] - 1] = $row['total_users'];
    } else {
        $previous_year_data[$row['month'] - 1] = $row['total_users'];
    }
}

if (isset($_POST['submit'])) {
    $current_year = $_POST['year'];
    $previous_year = $current_year - 1;

    $current_year_data = array_fill(0, 12, 0);
    $previous_year_data = array_fill(0, 12, 0);

    $sql = "SELECT MONTH(transcation_date) AS month,YEAR(transcation_date) AS year,COUNT(*) AS total_users FROM tbl_payment WHERE YEAR(transcation_date) IN ($current_year, $previous_year) GROUP BY YEAR(transcation_date), MONTH(transcation_date)";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['year'] == $current_year) {
            $current_year_data[$row['month'] - 1] = $row['total_users'];
        } else {
            $previous_year_data[$row['month'] - 1] = $row['total_users'];
        }
    }
}
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <img src="images/logo.png" class="logo" alt="" height="60px" width="60px"></a>
        </div>
        <ul class="nav-links start-0 m-0 p-0">
            <li>
                <a href="index.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="category.php">
                    <i class='bx bx-box'></i>
                    <span class="links_name">category</span>
                </a>
            </li>
            <li>
                <a href="sub_cat.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Sub-Categories</span>
                </a>
            </li>

            <li>
                <a href="pro.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Products</span>
                </a>
            </li>
            <li>
                <a href="payreport.php" class="active">
                    <i class='bx bx-coin-stack'></i>
                    <span class="links_name">Payment Report</span>
                </a>
            </li>
            <!-- <li>
          <a href="#">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Order list</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Analytics</span>
          </a>
        </li> -->

            <!-- <li>
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Total order</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-user' ></i>
            <span class="links_name">Team</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li> -->
            <li>
                <a href="admin_changepass.php">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Change Password</span>
                </a>
            </li>
            <li class="log_out">
                <a href="../logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Payment Report</span>
            </div>
            <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search'></i>
      </div> -->
            <div class="profile-details">
                <!-- <img src="images/profile.jpg" alt=""> -->
                <i class="fas fa-user"></i>
                <span class="admin_name">Admin</span>
                <!-- <i class='bx bx-chevron-down'></i> -->
            </div>
        </nav>

        <div class="home-content">

            <div class="card w-auto m-5 p-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">

                                <h4>Payment Report Graph:</h4>
                                <form method="post" action="">
                                    <label for="" style="margin: right 20px;">Select Year : </label>
                                    <select id="ddlYears" name="year" selected></select>
                                    <input type="submit" name="submit" class="btn btn-success" style="float: right; margin-top: -3%;">

                                    <script type="text/javascript">
                                        window.onload = function() {
                                            // Reference the DropDownList.
                                            var ddlYears = document.getElementById("ddlYears");

                                            // Determine the Current Year.
                                            var currentYear = (new Date()).getFullYear();

                                            // Loop and add the Year values to DropDownList.
                                            for (var i = 1950; i <= currentYear; i++) {
                                                var option = document.createElement("OPTION");
                                                option.innerHTML = i;
                                                option.value = i;
                                                ddlYears.appendChild(option);
                                            }

                                            // Set the default selected value to the current year.
                                            ddlYears.value = currentYear;

                                            // Add event listener to set the selected value as default.
                                            ddlYears.addEventListener("change", function() {
                                                ddlYears.value = this.value;
                                            });
                                        };
                                    </script>

                                </form>


                            </div>

                            <?php
                            $qry = "SELECT count(*) as d1 from tbl_payment where YEAR(transcation_date)=$current_year";
                            $qry1 = "SELECT count(*) as d2 from tbl_payment where YEAR(transcation_date)=$previous_year";
                            $r = mysqli_query($conn, $qry);
                            $r1 = mysqli_query($conn, $qry1);
                            $rr = $r->fetch_assoc();
                            $rr1 = $r1->fetch_assoc();
                            $a = $rr['d1'];
                            $b = $rr1['d2'];
                            ?>

                            <!-- Begin Page Content -->
                            <!-- <h6 style="padding-left:85%;padding-right:2%;">No of Customers in <?php echo $current_year; ?> : <?php echo $a; ?></h6>
                            <h6 style="padding-left:85%;padding-right:2%;">No of Customers in <?php echo $previous_year; ?> : <?php echo $b; ?></h6> -->

                            <h4 align="center"><b>Payment Report Graph ( <?php echo $previous_year; ?> - <?php echo $current_year; ?> )</b></h4><br>

                            <canvas id="user-registration-chart" height="200%" style="padding-left:2%;padding-right:2%;"></canvas>

                            <script>
                                var ctx = document.getElementById("user-registration-chart").getContext("2d");
                                var chart = new Chart(ctx, {
                                    type: "bar",
                                    data: {
                                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                                        datasets: [{
                                                label: "<?php echo $previous_year; ?>",
                                                backgroundColor: "rgba(255, 99, 132, 0.2)",
                                                borderColor: "rgba(255, 99, 132, 1)",
                                                borderWidth: 1,
                                                data: <?php echo json_encode($previous_year_data); ?>
                                            },
                                            {
                                                label: "<?php echo $current_year; ?>",
                                                backgroundColor: "rgba(54, 162, 235, 0.2)",
                                                borderColor: "rgba(54, 162, 235, 1)",
                                                borderWidth: 1,
                                                data: <?php echo json_encode($current_year_data); ?>
                                            }
                                        ]
                                    },
                                    options: {
                                        scales: {
                                            xAxes: [{
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: 'Months'
                                                }
                                            }],
                                            yAxes: [{
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: 'Number of Customers'
                                                },
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                            <br>

                            <h6 align="center" style="color:red"> payment Each Month in <?php echo $previous_year; ?> and <?php echo $current_year; ?> </h6>

                            <br>



                        </div>
                    </div>
                </div>

                <br>




                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">

                                <h4>Payment Report:</h4>
                                <form action="csv.php" method="POST">
                                    <button type="submit" id="export_csv_data" name='export_csv_data' value="Export to CSV" class="btn btn-success" style="float: right; margin-top: -3%;">
                                        <i class="fa fa-print"></i>&nbsp; Export as csv
                                    </button>
                                </form>
                            </div>

                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl.No.</th>
                                        <!-- <th>Product image</th> -->
                                        <th>Product name</th>
                                        <th>User name</th>
                                        <th>User id</th>
                                        <th>Payed On</th>
                                        <th>Price</th>
                                        <th>posted on</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


                                    $view = "SELECT a.*, b.*,c.* ,d.*from tbl_product a INNER JOIN tbl_login b INNER JOIN tbl_users c INNER JOIN tbl_payment d ON a.login_id=b.login_id and c.login_id=b.login_id and a.login_id=d.login_id Where a.delete_status='1' AND a.paymet_id!='0' And a.paymet_id=d.pay_id;";
                                    $query_run = mysqli_query($conn, $view);
                                    $i = 1;
                                    while ($prod = mysqli_fetch_array($query_run)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <!-- <td><img src="../user_profile/images/<?php echo $prod['p_image'] ?>" height="200px" width="200px" alt=""></td> -->
                                            <td><?php echo $prod['p_name']; ?></td>
                                            <td><?php echo $prod['user_fname'] . " " . $prod['user_lname']; ?></td>
                                            <td><?php echo $prod['email']; ?></td>
                                            <td><?php echo $prod['trans_id']; ?></td>
                                            <td><?php echo $prod['amount']; ?></td>
                                            <td><?php echo $prod['transcation_date']; ?></td>

                                            <!-- <td> -->
                                            <!-- <a href="editcate.php">
                              <input type="hidden" value="<?php echo $prod['cat_id']; ?>" name="cat_id">
                              <i class="fa fa-edit"></i>
                            </a>
                            &ensp;
                            <a href="#trash-o">
                              <i class="fa fa-trash"></i></a> -->
                                            <!-- <button type="button" value="<?php echo $prod['cat_id']; ?>" class="editBtn fa fa-edit"></button> &nbsp;
                                                    <button type="button" value="<?php echo $prod['cat_id']; ?>" class="deleteBtn fa fa-trash"></button> -->
                                            <!-- </td> -->
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>

                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>