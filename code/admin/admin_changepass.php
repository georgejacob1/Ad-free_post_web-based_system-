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
  <style>
    :root {
      --black: #444;
      --light-color: #666;
      --border: 0.1rem solid rgba(0, 0, 0, 0.1);
      --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }

    .login-form-container form h3 {
      font-size: 2.5rem;
      text-transform: uppercase;
      color: var(--black);
      text-align: center;
    }

    .login-form-container form span {
      display: block;
      font-size: 1.5rem;
      padding-top: 1rem;
    }

    .login-form-container form .box {
      width: 100%;
      margin: 0.7rem 0;
      font-size: 1.6rem;
      border: var(--border);
      border-radius: 0.5rem;
      padding: 1rem 1.2rem;
      color: var(--black);
      text-transform: none;
    }

    .login-form-container form .checkbox {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      padding: 1rem 0;
    }

    .login-form-container form .checkbox label {
      font-size: 1.5rem;
      color: var(--light-color);
      cursor: pointer;
    }

    .login-form-container form .btn {
      text-align: center;
      width: 100%;
      margin: 1.5rem 0;
    }
  </style>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
  <!-- Boxicons CDN Link -->

  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <img src="images/logo.png" class="logo" alt="" height="60px" width="60px"></a>
    </div>
    <ul class="nav-links">
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
        <a href="admin_changepass.php" class="active">
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
        <span class="dashboard">Change Password</span>
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
      <!-- <div class="form-floating mb-3">

<form action="" method="POST" onsubmit="return validateForm()">
<div class="form-floating">
  <input type="password" name="current" class="form-control" id="currentPassword" placeholder="Password"required>
  <label for="floatingPassword">currentPassword</label>
</div>
<br>
<div class="form-floating">
  <input type="password" name="current" class="form-control"name="new" id="newPassword"  placeholder="Password" onblur="return validateForm()" onKeyUp="return validateForm()" placeholder="*********" required>
  <label for="floatingPassword">New Password</label>
</div>
<br>
<div class="form-floating">
  <input type="password" name="current" class="form-control" name="renewPassword" id="renewPassword" placeholder="Password" onblur="return validateForm()" onKeyUp="return validateForm()" placeholder="*********" required>
  <label for="floatingPassword">Re-enter New Password</label>
</div>
  <span class="msg" id="msg1"></span>
  <input type="submit" name="change-pass" class="btn" value="Change Password">
  </form>
</div> -->
      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="login-form-container">
            <form action="" method="POST" onsubmit="return validateForm()">

              <div class="row mb-3">
                <span>Current Password</span>
                <div class="col-md-8 col-lg-9">
                  <input type="password" class="box" name="current" id="currentPassword" placeholder="*********" required>
                </div>
              </div>

              <div class="row mb-3">
                <span>New Password</span>
                <div class="col-md-8 col-lg-9">
                  <input type="password" class="box" name="new" id="newPassword" onblur="return validateForm()" onKeyUp="return validateForm()" placeholder="*********" required>
                </div>
              </div>

              <div class="row mb-3">
                <span>Re-enter New Password</span>
                <div class="col-md-8 col-lg-9">
                  <input type="password" class="box" name="renewPassword" id="renewPassword" onblur="return validateForm()" onKeyUp="return validateForm()" placeholder="*********" required>
                  <span class="msg" id="msg1"></span>
                  <br><input type="submit" name="change-pass" class="btn" value="Change Password">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
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

</body>

</html>