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
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <a href="../user.php"> <img src="images/logo.png" class="logo" alt="" height="60px" width="60px"></a>
    </div>
    <ul class="nav-links start-0 m-0 p-0">
      <li>
        <a href="userprofile.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">My profile</span>
        </a>
      </li>
      <li>
        <a href="ads.php" class="active">
          <i class='bx bx-box'></i>
          <span class="links_name">My ads</span>
        </a>
      </li>
      <!-- <li>
        <a href="add_ads.php">
          <i class='bx bx-list-ul'></i>
          <span class="links_name">Add ads</span>
        </a>
      </li> -->
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
        <div class="container-fluid">
          <div class="alert alert-success" id="addads" style="display:none;">
            Ads added successfully
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="alert alert-danger" id="delShow" role="alert" style="display:none;">
            ads deleted successfully
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>My ads</h4>
                  <button type="button" class="btn btn-success" style="float: right; margin-top: -3%;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa fa-plus"></i>&nbsp; Add ads
                  </button>
                </div>
                <div class="card-body">

                  <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Sl.No.</th>
                        <th>Ads image</th>
                        <th>Product</th>
                        <th>Discription</th>
                        <th>Category</th>
                        <th>Sub-category</th>
                        <th>Year of purchase</th>
                        <th>Price</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php


                      $view = "SELECT * FROM tbl_product where login_id=$logid";
                      $query_run = mysqli_query($conn, $view);
                      $i = 1;
                      while ($prod = mysqli_fetch_array($query_run)) {
                        if ($prod['delete_status'] == "1") {
                          $sid = $prod['subcat_id'];
                          $sub = "SELECT * FROM tbl_subcat where sub_id=$sid";
                          $sub_run = mysqli_query($conn, $sub);
                          $s = mysqli_fetch_array($sub_run);
                          $c = $s['cat_id'];
                          $cat = "SELECT * FROM tbl_categories where cat_id=$c";
                          $cat_run = mysqli_query($conn, $cat);
                          $cc = mysqli_fetch_array($cat_run);

                      ?>
                          <tr>
                            <td><?php echo $i; ?><input type="hidden" name="pid" id="pid" value="<?php echo $prod['product_id']; ?>"></td>

                            <td><img src="images/<?php echo $prod['p_image']; ?>" style="width: 200px; height: 200px;" alt="poster"></td>
                            <td><?= $prod['p_name'] ?></td>
                            <td><?= $prod['p_description'] ?></td>

                            <td><?= $cc['category'] ?></td>
                            <td><?= $s['subcat'] ?></td>
                            <td><?= $prod['year'] ?></td>
                            <td><?= $prod['price'] ?></td>
                            <td>
                              <button type="button" value="<?php echo $prod['product_id']; ?>" class="editShowBtn fa fa-edit" data-bs-toggle="modal" style="color: #0056b3;" data-bs-target="#update"></button> &nbsp;
                              <button type="button" value="<?php echo $prod['product_id']; ?>" class="deleteShowBtn fa fa-trash" style="color: #0056b3;"></button>
                            </td>
                          </tr>
                      <?php
                          $i++;
                        }
                      }
                      ?>

                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add ads</h5>
              <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> -->
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">


              <form id="saveStuden">
                <div class="form-group">
                  <label for="name">Product Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required />
                </div>
                <div class="form-group">
                  <br><label for="des">Product Description</label>
                  <input type="text" class="form-control" name="des" id="des" required>
                </div>
                <div class="form-group">
                  <label for="image">Product image</label>
                  <input type="file" class="form-control" accept="image/gif, image/jpeg, image/png, image/jpg" name="photo" id="image" required>
                </div>
                <div class="form-group">
                  <?php

                  $sql = mysqli_query($conn, "select * from tbl_categories where del_status='0'");
                  ?>
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





                <div class="row">

                  <div class="col-md-4 form-group">
                    <label for="qua">Year of Purchase</label>
                    <input type="number" class="form-control" name="year" />

                  </div>

                  <div class="col-md-4 form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" min="1" oninput="" required />

                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="message-text" class="col-form-label">Message:</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div> -->

            </div>
            <div class="modal-footer">
              <button type="submit" name="btnsubmit" class="btn btn-info">Submit</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit ads</h5>
              <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> -->
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">


              <form id="editads">

                <div class="form-group">
                  <input type="hidden" name="pid" id="pid">
                </div>
                <div class="form-group">
                  <label for="name">Product Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required />
                </div>
                <div class="form-group">
                  <br><label for="des">Product Description</label>
                  <input type="text" class="form-control" name="des" id="des" required>
                </div>
                <!-- <div class="form-group">
                  <label for="image">Product image</label>
                  <input type="file" class="form-control" disabled accept="image/gif, image/jpeg, image/png, image/jpg" name="photo" id="image">
                </div> -->
                <div class="form-group">
                  <label>Category Name</label><br>
                  <input type="text" id="catname" disabled>
                </div>
                <div class="form-group">
                  <label>Subcategory Name</label><br>

                  <input type="text" id="subcatname" disabled>
                </div>





                <div class="row">

                  <div class="col-md-4 form-group">
                    <label for="qua">Year of Purchase</label>
                    <input type="number" id="year" class="form-control" disabled name="year" />

                  </div>

                  <div class="col-md-4 form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" id="price" min="1" oninput="" required />

                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="message-text" class="col-form-label">Message:</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div> -->

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-info">Submit</button>
            </div>
            </form>
          </div>
        </div>
      </div>


  </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
    // function Validstr() {
    //   var val = document.getElementById('name').value;
    //   if (!val.match(/^[a-zA-Z ]*$/)) {
    //     document.getElementById('msg1').innerHTML = "Start with a Capital letter & Only alphabets are allowed";
    //     document.getElementById('name').value = "";
    //     return false;
    //   }
    //   document.getElementById('msg1').innerHTML = " ";
    //   return true;
    // }



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



    $(document).on('submit', '#saveStuden', function(e) {
      // console.log("asdsd")
      e.preventDefault();

      var formData = new FormData(this);
      formData.append("btnsubmit", true);

      $.ajax({
        url: "sql.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          $('#addads').show();
          $('#exampleModal').modal('hide');
          $('#saveStuden')[0].reset();
          $('#myTable').load(location.href + " #myTable");
        }
      });

    });

    $(document).on('click', '.editShowBtn', function() {

      var pid = $(this).val();

      $.ajax({
        type: "GET",
        url: "sql.php?pid=" + pid,
        success: function(response) {
          var res = jQuery.parseJSON(response);

          if (res.status == 200) {
            $('#pid').val(res.data.product_id);
            $('#name').val(res.data.p_name);
            $('#des').val(res.data.p_description);
            $('#catname').val(res.data.category);
            $('#subcatname').val(res.data.subcat);
            $('#price').val(res.data.price);
            $('#year').val(res.data.year);

            $('#pid').val(res.data.product_id);

            $('#update').modal('show');
          }
        }
      });

    });

    $(document).on('click', '.deleteShowBtn', function(e) {
      e.preventDefault();

      if (confirm('Are you sure you want to delete this data?')) {
        var pid = $(this).val();
        $.ajax({
          type: "GET",
          url: "sql.php?pid=" + pid,
          success: function(response) {
            // alert(response);
            $('#delShow').show();
            $('#myTable').load(location.href + " #myTable");
          }
        });
      }
    });

    $(document).on('submit', '#editads', function(e) {
      e.preventDefault();
      var pid = $(this).val();

      $.ajax({
        type: "GET",
        url: "sql.php?pid=" + pid,
        success: function(response) {
          // alert(response);
          $('#update').modal('hide');
          $('#editads')[0].reset();

          $('#myTable').load(location.href + " #myTable");

        }
      });
    });
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


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>