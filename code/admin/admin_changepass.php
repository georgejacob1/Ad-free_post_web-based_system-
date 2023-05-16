<?php
include 'admin-session.php';
include '../db_con.php';
if (isset($_POST['change-pass'])) {
  $old = $_POST['current'];
  $new = $_POST['new'];
  $user = mysqli_real_escape_string($conn, $_SESSION['email']);
  $passCheck = "SELECT * FROM `tbl_login` WHERE `email`='$user'";
  $runQ = mysqli_query($conn, $passCheck);
  $row = mysqli_fetch_array($runQ);
  if ($row['password'] != $old) {
    echo '<script>alert("Old password doesnot match.");</script>';
    echo '<script>window.location.href="admin_changepass.php";</script>';
  } else {
    $newp = "UPDATE `tbl_login` SET `password`='$new' WHERE `email`='$user'";
    $runnewp = mysqli_query($conn, $newp);
    echo '<script>alert("Password updated.");</script>';
    echo '<script>window.location.href="admin_changepass.php";</script>';
  }
}
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Change Pasword</title>
  <link rel="stylesheet" href="style.css">
  <!-- Boxicons CDN Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />

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
        <a href="#">
          <i class='bx bx-box'></i>
          <span class="links_name">Categories</span>
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
      <li>
        <a href="admin_changepass.php" class="active">
          <i class='bx bx-cog'></i>
          <span class="links_name">Change Password</span>
        </a>
      </li>
      <!-- <li> -->
      <!-- <a href="#">
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
        <span class="dashboard">Change Pasword</span>
      </div>
      <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div> -->
      <div class="profile-details">
        <!-- <img src="images/profile.jpg" alt=""> -->
        <i class="fas fa-user"></i>
        <span class="admin_name">Admin</span>
        <!-- <i class='bx bx-chevron-down'></i> -->
      </div>
    </nav>

    <div class="home-content">



      <div class="card  m-3 p-3" style="width:500px; height:500px">

        <div class="card-header">
          <h4>Change Pasword</h4>
        </div>
        <br><br>
        <form action="" method="POST" onsubmit="return validateForm()">
          <div class="form-group">
            <label for="name">old password</label>
            <input type="password" class="form-control" name="current" id="currentPassword" placeholder="*********" required>
          </div>
          <div class="form-group">
            <br><label for="des">new password</label>
            <input type="password" class="form-control" name="new" id="newPassword" onblur="return validateForm()" onKeyUp="return validateForm()" placeholder="*********" required>
          </div>
          <div class="form-group">
            <br><label for="des">confirm password</label>
            <input type="password" class="form-control" name="renewPassword" id="renewPassword" onblur="return validateForm()" onKeyUp="return validateForm()" placeholder="*********" required>
            <!-- <span class="msg" id="msg1"></span> -->
          </div>
          <span id="msg1" style="color:red;"></span>
          <input type="submit" name="change-pass" class="btn btn-info" value="Change Password">

        </form>




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

    function validateForm() {
      var pw1 = document.getElementById("newPassword").value;
      var pw2 = document.getElementById("renewPassword").value;
      if (pw2 != "" && pw1 != pw2) {
        document.getElementById('msg1').style.display = "block";
        document.getElementById('msg1').innerHTML = "Password doesnot match";
        return false;
      } else {
        document.getElementById('msg1').style.display = "none";
      }
    }
  </script>
  <!-- <script>
    $(document).ready(function() {
      $('#cid').on('change', function() {
        var cid = this.value;
        $.ajax({
          url: "get_subcat.php",
          type: "POST",
          data: {
            cid: cid
          },
          cache: false,
          success: function(dataResult) {
            $("#sid").html(dataResult);
          }
        });


      });
    });
  </script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>