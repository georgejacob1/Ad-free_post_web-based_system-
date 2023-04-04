<?php
include 'admin-session.php';
include '../db_con.php';
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>category</title>
  <link rel="stylesheet" href="style.css">
  <!-- Boxicons CDN Link -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


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
        <a href="#" class="active">
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
        <span class="dashboard">Categories</span>
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

        <!-- <?php
              if (isset($_POST['submit'])) {
                $cat = $_POST['cat'];
                $s = mysqli_query($conn, "SELECT count(*) as count FROM tbl_categories WHERE category='$cat'");
                $display = mysqli_fetch_array($s);
                if ($display['count'] > 0) {
                  echo "<script>alert('This category name is already exist');window.location='category.php'</script>";
                } else {
                  $sql = "INSERT INTO `tbl_categories`(`category`) VALUES ('$cat')";
                  $result = $conn->query($sql);
                }
                if ($sql) {

                  echo "<script>alert('Category Details Registered Successfully!!');window.location='category.php'</script>";
                } else {
                  echo "<script>alert('Error');window.location='index.php'</script>";
                }
              }
              ?> -->



        <!-- <h4>category:</h4><br> -->
        <div class="container-fluid">


          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>category:</h4>
                  <button type="button" class="btn btn-success" style="float: right; margin-top: -3%;" data-bs-toggle="modal" data-bs-target="#addcat">
                    <i class="fa fa-plus"></i>&nbsp; Add category
                  </button>
                </div>
                <div class="card-body">

                  <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Sl.No.</th>
                        <th>Category</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php


                      $view = "SELECT * FROM `tbl_categories` WHERE del_status='0'";
                      $query_run = mysqli_query($conn, $view);
                      $i = 1;
                      while ($prod = mysqli_fetch_array($query_run)) {
                      ?>
                        <tr>
                          <td><?php echo $i; ?></td>

                          <td><?php echo $prod['category']; ?></td>

                          <td>
                            <!-- <a href="editcate.php">
                              <input type="hidden" value="<?php echo $prod['cat_id']; ?>" name="cat_id">
                              <i class="fa fa-edit"></i>
                            </a>
                            &ensp;
                            <a href="#trash-o">
                              <i class="fa fa-trash"></i></a> -->
                            <button type="button" value="<?php echo $prod['cat_id']; ?>" class="editBtn fa fa-edit"></button> &nbsp;
                            <button type="button" value="<?php echo $prod['cat_id']; ?>" class="deleteBtn fa fa-trash"></button>
                          </td>
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











        <!-- 
        <form action="" method="POST" class="form-inline">

          <div class="form-group mx-sm-3 mb-2">
            <input type="text" name="cat" placeholder="enter category name" class="form-control" required onchange="return Validstr()">
          </div><span id="msg1" style="color:red;"></span>

          <input class="btn btn-primary m-2" type="submit" name="submit" value="submit">
        </form> -->

      </div>




















      <div class="modal fade" id="addcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add category</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form id="savecat" method="POST">
                <div class="form-group">
                  <!-- <label for="recipient-name" class="col-form-label">Recipient:</label> -->
                  <input type="text" name="cat" placeholder="enter category name" class="form-control" required pattern="[a-zA-Z]+" title="Name must be alphabets">
                  <!-- <span id="ok">ok</span> -->
                </div>
                <div class="form-group">
                  <input class="btn btn-primary m-2" type="submit" value="submit">
                </div>
              </form>
            </div>
            <div class="modal-footer">


            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="editcatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit category</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form id="editcat">
                <div class="form-group">
                  <!-- <label for="recipient-name" class="col-form-label">Recipient:</label> -->
                  <input type="hidden" name="cat_id" id="cat_id">
                  <input type="text" name="cat" id="cat" placeholder="enter category name" class="form-control" required>
                  <!-- <span id="ok">ok</span> -->
                </div>
                <div class="form-group">
                  <input class="btn btn-primary m-2" type="submit" value="Update">
                </div>
              </form>
            </div>
            <div class="modal-footer">


            </div>
          </div>
        </div>
      </div>






    </div>






  </section>
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
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






    // function Validstr() 
    // {
    // var val = document.getElementById('cat').value;
    // var val = document.getElementById('sub_cat').value;
    // if (!val.match(/^[a-zA-Z ]*$/)) 
    // {
    //   document.getElementById('msg1').innerHTML="Start with a Capital letter & Only alphabets are allowed";
    //   document.getElementById('cat').value = "";
    //           return false;
    // }
    //   document.getElementById('msg1').innerHTML=" ";
    //  return true;
    // }

    //                     function Validstr(){
    //         var ph = document.getElementById("cat").value;
    //         var ph = document.getElementById("sub_cat").value;
    // var expr = /^[a-zA-Z ]*$/;
    // if(expr.test(ph)==false){
    //     document.getElementById('msg1').style.display = "block";
    //     document.getElementById('msg1').innerHTML = "Start with a Capital letter & Only alphabets are allowed";
    //     return false;
    //             }
    //             else{
    //     document.getElementById('msg1').style.display = "none";
    // }
    //     }
    function Validstr() {
      var f = document.getElementById("cat").value;
      // var l=document.getElementById("sub_cat").value;
      var s = /^[a-zA-Z]+$/;
      if (f != "" && s.test(f) == false) {

        document.getElementById('msg1').style.display = "block";
        document.getElementById('msg1').innerHTML = "Start with a Capital letter & Only alphabets are allowed";
        return false;
      } else {
        document.getElementById('msg1').style.display = "none";
      }
    }
  </script>
  <script>
    $(document).on('submit', '#savecat', function(e) {
      // console.log("asdsd")
      e.preventDefault();
      var formData = new FormData(this);
      formData.append("submit", true);

      $.ajax({
        url: "get_subcat.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          document.write(response)
          // $('#addads').show();
          $('.close').click();
          $('#savecat')[0].reset();
          $('#myTable').load(location.href + " #myTable");
        }
      });

    });

    $(document).on('click', '.editBtn', function() {

      var cat_id = $(this).val();

      $.ajax({
        type: "GET",
        url: "ajax.php?cat_id=" + cat_id,
        success: function(response) {
          var res = jQuery.parseJSON(response);

          if (res.status == 200) {
            $('#cat_id').val(res.data.cat_id);
            $('#cat').val(res.data.category);

            $('#editcatModal').modal('show');
          }
        }
      });

    });

    $(document).on('submit', '#editcat', function(e) {
      e.preventDefault();
      var formData = new FormData(this);
      formData.append("update_cat", true);

      $.ajax({
        type: "POST",
        url: "ajax.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          $('#editcatModal').modal('hide');
          $('#editcat')[0].reset();

          $('#myTable').load(location.href + " #myTable");

        }
      });
    });

    $(document).on('click', '.deleteBtn', function(e) {
      e.preventDefault();

      if (confirm('Are you sure you want to delete this category?')) {
        var cat_id = $(this).val();
        $.ajax({
          type: "POST",
          url: "ajax.php",
          data: {
            'delete_cat': true,
            'cat_id': cat_id
          },
          success: function(response) {
            $('#myTable').load(location.href + " #myTable");
          }
        });
      }
    });
  </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
</body>

</html>