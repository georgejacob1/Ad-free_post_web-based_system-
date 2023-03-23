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
  <title>my-profile</title>
  <link rel="stylesheet" href="userstyle.css">
  <!-- Boxicons CDN Link -->

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
  <style>
    .bg-secondary-soft {
      background-color: rgba(208, 212, 217, 0.1) !important;
    }

    .rounded {
      border-radius: 5px !important;
    }

    .py-5 {
      padding-top: 3rem !important;
      padding-bottom: 3rem !important;
    }

    .px-4 {
      padding-right: 1.5rem !important;
      padding-left: 1.5rem !important;
    }

    .file-upload .square {
      height: 250px;
      width: 250px;
      margin: auto;
      vertical-align: middle;
      border: 1px solid #e5dfe4;
      background-color: #fff;
      border-radius: 5px;
    }

    .text-secondary {
      --bs-text-opacity: 1;
      color: rgba(208, 212, 217, 0.5) !important;
    }

    .btn-success-soft {
      color: #28a745;
      background-color: rgba(40, 167, 69, 0.1);
    }

    .btn-danger-soft {
      color: #dc3545;
      background-color: rgba(220, 53, 69, 0.1);
    }

    .form-control {
      display: block;
      width: 100%;
      padding: 0.5rem 1rem;
      font-size: 0.9375rem;
      font-weight: 400;
      line-height: 1.6;
      color: #29292e;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #e5dfe4;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      border-radius: 5px;
      -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
      transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    }
  </style>
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <a href="../user.php"> <img src="images/logo.png" class="logo" alt="" height="60px" width="60px"></a>
    </div>
    <ul class="nav-links start-0 m-0 p-0">
      <li>
        <a href="#" class="active">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Profile</span>
        </a>
      </li>
      <li>
        <a href="ads.php">
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
        <span class="dashboard">My profile</span>
      </div>
      <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div> -->
      <div class="profile-details">
        <!-- <img src="images/profile.jpg" alt=""> -->
        <!-- <img src="images/profile.jpg" alt=""> -->
        <?php $name = "SELECT * FROM tbl_login as a, tbl_users as b, tbl_address as c WHERE a.login_id=b.login_id and b.login_id='$logid'";
        $name_check = mysqli_query($conn, $name);
        $raw = mysqli_fetch_array($name_check);
        $name1 = "SELECT * FROM tbl_address WHERE login_id='$logid'";
        $name_check1 = mysqli_query($conn, $name1);
        $raw1 = mysqli_fetch_array($name_check1);
        ?>
        <i class="fas fa-user"></i>
        <span class="admin_name"><?php echo $raw['user_fname'] . " " . $raw['user_lname']; ?></span>
      </div>
    </nav>

    <div class="home-content">
      <!-- <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Order</div>
            <div class="number">40,876</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart-alt cart'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Sales</div>
            <div class="number">38,876</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bxs-cart-add cart two' ></i>
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
          <i class='bx bx-cart cart three' ></i>
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
          <i class='bx bxs-cart-download cart four' ></i>
        </div>
      </div> -->

      <div class="card w-auto m-5 p-5">
        <div class="modal fade" id="exampleModalp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">MY Name</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> -->
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">


                <form id="" method="post" action="edadd.php" enctype="multipart/form-data">

                  <div class="form-group">
                    <label for="image">Product image</label>
                    <input type="file" class="form-control" accept="image/gif, image/jpeg, image/png, image/jpg" name="profileimg" id="image" required onchange="return dvalidateimage2()">
                    <span id="dim1" style='color:red;'></span>
                  </div>

                  <!-- <div class="form-group">
                  <label for="message-text" class="col-form-label">Message:</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div> -->

              </div>
              <div class="modal-footer">
                <button type="submit" name="btnpro" id="pisubmit" class="btn btn-info">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>



        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">MY Name</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> -->
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">


                <form id="saveStuden" method="post" action="edadd.php">
                  <div class="form-group">
                    <input type="hidden" name="userid" id="userid">
                  </div>
                  <div class="form-group">
                    <label for="name">First Name</label>
                    <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Your First Name" required pattern="[a-zA-Z]+" onkeyup="return ckeck()" />
                    <span class="message text-danger" id="dms"></span>
                  </div>
                  <div class="form-group">
                    <br><label for="des">Last Name</label>
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Your Last Name" required pattern="[a-zA-Z]+" onkeyup="return ckeck()">
                    <span class="message text-danger" id="dmsl"></span>
                  </div>
                  <!-- <div class="form-group">
                  <label for="message-text" class="col-form-label">Message:</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div> -->

              </div>
              <div class="modal-footer">
                <button type="submit" name="btnname" id="nsubmit" class="btn btn-info">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>





        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">My Contact info</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> -->
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">


                <form id="saveStuden" method="post" action="edadd.php">
                  <div class="form-group">
                    <input type="hidden" name="userid" id="userid">
                  </div>
                  <div class="form-group">
                    <br><label for="des">Phone no</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone your no" required pattern="^[6-9]\d{9}$" onkeyup="return ckeck()">
                    <span class="message text-danger" id="dmsg2"></span>
                  </div>
                  <!-- <div class="form-group">
                  <label for="message-text" class="col-form-label">Message:</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div> -->

              </div>
              <div class="modal-footer">
                <button type="submit" name="btnph" class="btn btn-info" id="dsubmit">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>






        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">My Address</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> -->
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">


                <form id="saveStuden" method="post" action="edadd.php">
                  <div class="form-group">
                    <input type="hidden" name="loginid" id="loginid">
                  </div>
                  <div class="form-group">
                    <label for="name">House no/apartment name</label>
                    <input type="text" class="form-control" name="house" id="house" placeholder="Enter your House no/apartment name" required onkeyup="return ckeck()">
                    <span class="message text-danger" id="dmsh"></span>
                  </div>
                  <div class="form-group">
                    <br><label for="des">street</label>
                    <input type="text" class="form-control" name="street" id="street" placeholder="Enter your street" required onkeyup="return ckeck()">
                    <span class="message text-danger" id="dmss"></span>
                  </div>
                  <div class="form-group">
                    <br><label for="des">City/Town</label>
                    <input type="text" class="form-control" name="city" id="city" placeholder="Enter your City/Town" required onkeyup="return ckeck()">
                    <span class="message text-danger" id="dmsc"></span>
                  </div>
                  <div class="form-group">
                    <br><label for="des">state</label>
                    <input type="text" class="form-control" name="state" id="state" placeholder="Enter your state" required pattern="[a-zA-Z]+" onkeyup="return ckeck()">
                    <span class="message text-danger" id="dmsst"></span>
                  </div>
                  <div class="form-group">
                    <br><label for="des">pincode</label>
                    <input type="text" class="form-control" name="pin" id="pin" placeholder="Enter your pincode" required onkeyup="return ckeck()">
                    <span class="message text-danger" id="dmsp"></span>
                  </div>
                  <!-- <div class="form-group">
                  <label for="message-text" class="col-form-label">Message:</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div> -->

              </div>
              <div class="modal-footer">
                <button type="submit" name="btnsubmit" class="btn btn-info" id="asubmit">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <div class="container-fluid">

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>profile photo</h4>
                  <!-- <button type="button" class="btn btn-success editprofile" style="float: right; margin-top: -3%;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa fa-edit"></i>&nbsp; Edit
                  </button> -->
                </div>
                <div class="card-body">

                  <div class="container">
                    <div class="col-xxl-4">

                      <div class="row g-3">

                        <div class="text-center">
                          <!-- Image upload -->
                          <?php
                          if ($raw1['profileimg'] == "NILL") {
                          ?>
                            <div class="square position-relative display-2 mb-3">
                              <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" style="width:250px;height:250px" alt="">
                            </div>
                            <!-- Button -->
                            <input type="file" id="customFile" name="file" hidden="">
                            <button type="button" class="btn btn-success-soft" data-bs-toggle="modal" data-bs-target="#exampleModalp">Upload</button>
                            <!-- <button type="button" class="btn btn-danger-soft">Remove</button> -->
                          <?php
                          } else { ?>
                            <div class="square position-relative display-2 mb-3">
                              <img class="img-account-profile rounded-circle mb-2" src="images/<?php echo $raw1['profileimg']; ?>" style="width:250px;height:250px" alt="">
                            </div>
                            <!-- Button -->
                            <div class="btn-grp">
                              <input type="file" id="customFile" name="file" hidden="">
                              <button type="button" class="btn btn-success-soft" for="customFile" data-bs-toggle="modal" data-bs-target="#exampleModalp">Upload</button>
                              <form action="edadd.php" method="post">
                                <button type="submit" name="removeimg" class="btn btn-danger-soft">Remove</button>
                              </form>
                            </div>

                          <?php
                          } ?>
                          <!-- Content -->
                          <!-- <p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span>Minimum size 300px x 300px</p> -->
                        </div>
                      </div>

                    </div>
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>
        </br>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Name</h4>
                  <button type="button" class="btn btn-success editprofile" style="float: right; margin-top: -3%;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa fa-edit"></i>&nbsp; Edit
                  </button>
                </div>
                <div class="card-body">

                  <div class="container">
                    <div class="row g-2">
                      <div class="col-6">
                        <div class="p-3">First Name: <b><?php echo $raw['user_fname']; ?></b></div>
                      </div>
                      <div class="col-6">
                        <div class="p-3">Last Name: <b><?php echo $raw['user_lname']; ?></b></div>
                      </div>
                    </div>
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>

        </br>


        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Contact info</h4>
                  <button type="button" class="btn btn-success editcontact" style="float: right; margin-top: -3%;" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                    <i class="fa fa-edit"></i>&nbsp; Edit
                  </button>
                </div>
                <div class="card-body">

                  <div class="container">
                    <div class="row g-2">
                      <div class="col-6">
                        <div class="p-3">Email: <b><?php echo $raw['email']; ?></b></div>
                      </div>
                      <div class="col-6">
                        <div class="p-3">Phone no: <b><?php echo $raw['user_phone']; ?></b></div>
                      </div>
                    </div>
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>


        </br>


        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>My Address</h4>
                  <button type="button" value="<?php echo $logid; ?>" class="btn btn-success editaddress" style="float: right; margin-top: -3%;" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                    <i class="fa fa-edit"></i>&nbsp; Edit
                  </button>
                </div>
                <div class="card-body">

                  <div class="container">
                    <div class="row g-2">
                      <div class="col-6">
                        <div class="p-3">House no/apartment name: <b><?php echo $raw1['house']; ?></b></div>
                      </div>
                      <div class="col-6">
                        <div class="p-3">street: <b><?php echo $raw1['street']; ?></b></div>
                      </div>
                      <div class="col-6">
                        <div class="p-3">City/Town: <b><?php echo $raw1['city']; ?></b></div>
                      </div>
                      <div class="col-6">
                        <div class="p-3">state: <b><?php echo $raw1['state']; ?></b></div>
                      </div>
                      <div class="col-6">
                        <div class="p-3">pincode: <b><?php echo $raw1['pincode']; ?></b></div>
                      </div>
                    </div>
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

  </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    function ckeck() {
      var dph = document.getElementById("phone").value;
      var expr = /^[6-9]\d{9}$/;
      if (dph != "" && expr.test(dph) == false) {
        document.getElementById('dmsg2').style.display = "block";
        document.getElementById('dmsg2').innerHTML = "Invalid Phone number";
        document.getElementById('dsubmit').disabled = true;
        return false;
      } else {
        document.getElementById('dmsg2').style.display = "none";
        document.getElementById('dsubmit').disabled = false;
      }

      var f1 = document.getElementById("fname").value;
      var l1 = document.getElementById("lname").value;
      var s1 = /^[a-zA-Z]+$/;
      if (f1 != "" && s1.test(f1) == false) {

        document.getElementById('dms').style.display = "block";
        document.getElementById('dms').innerHTML = "Invalid Name.It must be alphabet";
        document.getElementById('nsubmit').disabled = true;
        return false;
      } else {
        document.getElementById('dms').style.display = "none";
        document.getElementById('nsubmit').disabled = false;
      }

      if (l1 != "" && s1.test(l1) == false) {

        document.getElementById('dmsl').style.display = "block";
        document.getElementById('dmsl').innerHTML = "Invalid Name.It must be alphabet";
        document.getElementById('nsubmit').disabled = true;
        return false;
      } else {
        document.getElementById('dmsl').style.display = "none";
        document.getElementById('nsubmit').disabled = false;
      }
      var h = document.getElementById("house").value;
      if (h != "" == false) {
        document.getElementById('dmsh').style.display = "block";
        document.getElementById('dmsh').innerHTML = "field required";
        document.getElementById('asubmit').disabled = true;
        return false;
      } else {
        document.getElementById('dmsh').style.display = "none";
        document.getElementById('asubmit').disabled = false;
      }
      var se = document.getElementById("street").value;
      if (se != "" == false) {
        document.getElementById('dmss').style.display = "block";
        document.getElementById('dmss').innerHTML = "field required";
        document.getElementById('asubmit').disabled = true;
        return false;
      } else {
        document.getElementById('dmss').style.display = "none";
        document.getElementById('asubmit').disabled = false;
      }
      var ci = document.getElementById("city").value;
      if (ci != "" == false) {
        document.getElementById('dmsc').style.display = "block";
        document.getElementById('dmsc').innerHTML = "field required";
        document.getElementById('asubmit').disabled = true;
        return false;
      } else {
        document.getElementById('dmsc').style.display = "none";
        document.getElementById('asubmit').disabled = false;
      }
      var st = document.getElementById("state").value;
      if (st != "" == false) {
        document.getElementById('dmsst').style.display = "block";
        document.getElementById('dmsst').innerHTML = "field required";
        document.getElementById('asubmit').disabled = true;
        return false;
      } else {
        document.getElementById('dmsst').style.display = "none";
        document.getElementById('asubmit').disabled = false;
      }
      var p1 = document.getElementById("pin").value;
      var p2 = /^\d{6}$/;
      if (p1 != "" && p2.test(p1) == false) {

        document.getElementById('dmsp').style.display = "block";
        document.getElementById('dmsp').innerHTML = "Invalid pincode.It must be 6 numbers";
        document.getElementById('asubmit').disabled = true;
        return false;
      } else {
        document.getElementById('dmsp').style.display = "none";
        document.getElementById('asubmit').disabled = false;
      }

    }









    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
    $(document).on('click', '.editprofile', function() {

      var uid = $(this).val();

      $.ajax({
        type: "GET",
        url: "edadd.php?uid=" + uid,
        success: function(response) {
          var res = jQuery.parseJSON(response);

          if (res.status == 200) {
            $('#userid').val(res.data.user_id);
            $('#fname').val(res.data.user_fname);
            $('#lname').val(res.data.user_lname);
            $('#exampleModal').modal('show');

          }
        }
      });

    });
    $(document).on('click', '.editcontact', function() {

      var uid = $(this).val();

      $.ajax({
        type: "GET",
        url: "edadd.php?uid=" + uid,
        success: function(response) {
          var res = jQuery.parseJSON(response);

          if (res.status == 200) {
            $('#userid').val(res.data.user_id);
            $('#phone').val(res.data.user_phone);
            $('#exampleModal2').modal('show');

          }
        }
      });

    });

    $(document).on('click', '.editaddress', function() {

      var mid = $(this).val();

      $.ajax({
        type: "GET",
        url: "edadd.php?mid=" + mid,
        success: function(response) {
          var res1 = jQuery.parseJSON(response);

          if (res1.status == 200) {
            $('#loginid').val(res1.data.login_id);
            $('#house').val(res1.data.house);
            $('#street').val(res1.data.street);
            $('#city').val(res1.data.city);
            $('#state').val(res1.data.state);
            $('#pin').val(res1.data.pincode);
            $('#exampleModal3').modal('show');

          }
        }
      });

    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>