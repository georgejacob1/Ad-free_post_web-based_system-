<?php
include 'admin-session.php';
include '../db_con.php';
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
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <img src="images/logo.png" class="logo" alt="" height="60px" width="60px"></a>
    </div>
    <ul class="nav-links start-0 m-0 p-0">
      <li>
        <a href="#" class="active">
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
          <a href="payreport.php">
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
        </li>
        <li>
          <a href="#">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Stock</span>
          </a>
        </li>
        <li>
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
        <span class="dashboard">Dashboard</span>
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
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">No. of users</div>
            <?php
            $query = "select count(*) as count_users from tbl_login where type_id='2'";
            $query_run = mysqli_query($conn, $query);
            $fetch = mysqli_fetch_array($query_run);
            ?>
            <div class="number"><?php echo $fetch['count_users']; ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Currently</span>
            </div>
          </div>
          <!-- <i class='bx bx-cart-alt cart'></i> -->
        </div>
        <div class="box">
          <div class="right-side">
            <?php
            $query1 = "select count(*) as count_prdcts from tbl_product where delete_status='1'";
            $query_run = mysqli_query($conn, $query1);
            $fetch1 = mysqli_fetch_array($query_run);
            ?>
            <div class="box-topic">No. of products</div>
            <div class="number"><?php echo $fetch1['count_prdcts']; ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Currently</span>
            </div>
          </div>
          <i class='bx bxs-cart-add cart two'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Profit</div>
            <div class="number">$12,876</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart cart three'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Return</div>
            <div class="number">11,086</div>
            <div class="indicator">
              <i class='bx bx-down-arrow-alt down'></i>
              <span class="text">Down From Today</span>
            </div>
          </div>
          <i class='bx bxs-cart-download cart four'></i>
        </div>
      </div>

      <div class="card w-auto m-5 p-5">
        <div>
          <div class="btn btn-primary m-2">Users</div>
          <?php
          $user_check = "SELECT `type_id` FROM `tbl_usertype` WHERE `type_name` = 'user'";
          $user_check_rslt = mysqli_query($conn, $user_check);
          while ($row = mysqli_fetch_array($user_check_rslt)) {
            $type = $row['type_id'];
            $users = "SELECT * FROM `tbl_users` as a, `tbl_login` as b WHERE a.login_id=b.login_id and b.type_id='$type'";
            $users_run = mysqli_query($conn, $users);
            $i = 1;
          ?>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Sl.No.</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone number</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                  <th></th>
                </tr>
              </thead>
              <?php while ($data = mysqli_fetch_array($users_run)) { ?>
                <tbody>
                  <tr class="item m-5">
                    <td scope="row" data-label="Sl.No."><?php echo $i; ?></td>
                    <td data-label="Name"><?php echo $data['user_fname'] . " " . $data['user_lname']; ?></td>
                    <td data-label="Email"><?php echo $data['email']; ?></td>
                    <td data-label="Phone number"><?php echo $data['user_phone']; ?></td>
                    <td data-label="Status"><?php echo $data['user_status']; ?></td>
                    <td data-label="Action">
                      <?php
                      if ($data['user_status'] == "active") {
                      ?><a class="btn btn-outline-danger" href="deactivate.php?deactid=<?php echo $data["user_id"]; ?>">Deactivate</a>
                      <?php
                      } else { ?>
                        <a class="btn btn-outline-success" href="activate.php?actid=<?php echo $data["user_id"]; ?>">Activate</a>
                      <?php
                      }
                      ?>
                      <!-- <a class="btn btn-outline-success" href="activate.php?actid=<?php echo $data["user_id"]; ?>">Activate</a>
                    </td>
                    <td>
                      <a class="btn btn-outline-danger" href="deactivate.php?deactid=<?php echo $data["user_id"]; ?>">Deactivate</a> -->
                    </td>
                  </tr> <?php
                        $i++;
                      }
                    }
                        ?>
                </tbody>
            </table>

        </div>

  </section>

  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>