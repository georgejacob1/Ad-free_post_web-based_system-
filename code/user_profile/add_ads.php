<?php
include '../db_con.php';
include 'userprofile-session.php';
$logid = $_SESSION['login_id'];
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>My-ads</title>
  <link rel="stylesheet" href="userstyle.css">
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
        <a href="userprofile.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">My profile</span>
        </a>
      </li>
      <li>
        <a href="ads.php">
          <i class='bx bx-box'></i>
          <span class="links_name">My ads</span>
        </a>
      </li>
      <li>
        <a href="add_ads.php" class="active">
          <i class='bx bx-list-ul'></i>
          <span class="links_name">Add ads</span>
        </a>
      </li>
      <!-- <li>
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
        </li>
        <li>
          <a href="admin_changepass.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Change Password</span>
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
        <span class="dashboard">My ads</span>
      </div>
      <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div> -->
      <div class="profile-details">
        <!-- <img src="images/profile.jpg" alt=""> -->
        <!-- <img src="images/profile.jpg" alt=""> -->
        <?php $name = "SELECT * FROM tbl_login as a, tbl_users as b WHERE a.login_id=b.login_id and b.login_id='$logid'";
        $name_check = mysqli_query($conn, $name);
        $raw = mysqli_fetch_array($name_check);
        ?>
        <i class="fas fa-user"></i>
        <span class="admin_name"><?php echo $raw['user_fname'] . " " . $raw['user_lname']; ?></span>
      </div>
    </nav>

    <div class="home-content">



      <div class="card w-auto m-5 p-5">

        <div class="card-header">
          <h4>Add ads</h4>
        </div>
        <br><br>
        <?php

        $sql = mysqli_query($conn, "select * from tbl_categories");
        ?>
        <form role="form" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required onchange="Validstr();" />
          </div>
          <span id="msg1" style="color:red;"></span>

          <div class="form-group">

            <label>Category Name</label><br>


            <select name="cid" id="cid" onInput="chek()" required>
              <option value="">--select--</option>
              <?php
              while ($row = mysqli_fetch_array($sql)) {

              ?>
                <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>

              <?php

              }
              ?>

            </select>
          </div>
          <div class="form-group">
            <?php



            $sql1 = mysqli_query($conn, "select * from tbl_subcat");
            ?>
            <label>Subcategory Name</label><br>


            <select name="sid" id="sid" onchange="showResult(this.value)" required>



            </select>
          </div>
          <div class="form-group">
            <br><label for="des">Product Description</label>
            <input type="text" class="form-control" name="des" id="des" required>
          </div>
          <div class="form-group">
            <label for="image">Product image</label>
            <input type="file" class="form-control" accept="image/gif, image/jpeg, image/png, image/jpg" name="photo" id="image" required>
          </div>

          <div class="panel-body">

            <div class="row">

              <div class="col-md-4 form-group">
                <label for="qua">Year of Purchase</label>
                <input type="number" class="form-control" name="year" />

              </div>

              <div class="col-md-4 form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" min="1" oninput="validity.valid||(value='');" required />

              </div>

            </div>
          </div>
          <button type="submit" name="btnsubmit" class="btn btn-info">Submit</button>
        </form>


        <?php

        if (isset($_POST["btnsubmit"])) {
          $name = $_POST['name'];
          $sid = $_POST['sid'];
          $des = $_POST['des'];
          $photo = $_FILES["photo"]["name"];
          $price = $_POST['price'];
          $year = $_POST['year'];
          move_uploaded_file($_FILES["photo"]["tmp_name"], "images/" . $_FILES["photo"]["name"]);

          $sql34 = mysqli_query($conn, "INSERT INTO `tbl_product`(`login_id`, `subcat_id`, `p_name`, `p_description`, `p_image`, `price`, `year`) VALUES('$logid','$sid','$name','$des','$photo','$price','$year')");




          if ($sql34) {

            echo "<script>alert('Product Details Registered Successfully!!');window.location='ads.php'</script>";
          } else {
            echo "<script>alert('Error');window.location='ads.php'</script>";
          }
        }
        ?>




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
  <script>
    function Validstr() {
      var val = document.getElementById('name').value;
      if (!val.match(/^[a-zA-Z ]*$/)) {
        document.getElementById('msg1').innerHTML = "Start with a Capital letter & Only alphabets are allowed";
        document.getElementById('name').value = "";
        return false;
      }
      document.getElementById('msg1').innerHTML = " ";
      return true;
    }


    function chek() {
      jQuery.ajax({
        url: "get_subcat.php",
        type: "post",
        data: "cid=" + $("#cid").val(),
        success: function(dataResult) {
          $("#sid").html(dataResult);
        }
      });
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