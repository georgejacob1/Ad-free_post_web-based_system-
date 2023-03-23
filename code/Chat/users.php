<?php
session_start();
include_once "../db_con.php";
if (!isset($_SESSION['login_id'])) {
  header("location: login.php");
}
?>
<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php
          $sql = mysqli_query($conn, "SELECT * FROM tbl_users WHERE login_id = {$_SESSION['login_id']}");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
          ?>
          <a href="../user.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>&nbsp;&nbsp;
          <?php
          $sql1 = mysqli_query($conn, "SELECT * FROM tbl_address WHERE login_id = {$_SESSION['login_id']}");
          if (mysqli_num_rows($sql1) > 0) {
            $row1 = mysqli_fetch_assoc($sql1);
          }

          if ($row1['profileimg'] == "NILL") {
          ?>
            <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
          <?php   } else { ?>
            <img src="../user_profile/images/<?php echo $row1['profileimg']; ?>" alt="">
          <?php   }  ?>
          <div class="details">
            <span><?php echo $row['user_fname'] . " " . $row['user_lname'] ?></span>
            <!-- <p><?php echo $row['status']; ?></p> -->
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['login_id']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">

      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>

</html>