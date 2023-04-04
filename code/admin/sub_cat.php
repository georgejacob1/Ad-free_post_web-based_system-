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
                <a href="category.php">
                    <i class='bx bx-box'></i>
                    <span class="links_name">Categories</span>
                </a>
            </li>
            <li>
                <a href="#" class="active">
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
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Analytics</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-coin-stack'></i>
                    <span class="links_name">Stock</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-book-alt'></i>
                    <span class="links_name">Total order</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Team</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-message'></i>
                    <span class="links_name">Messages</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-heart'></i>
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
                <span class="dashboard">Sub-Categories</span>
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
                <!-- <h4>Sub-category:</h4> -->
                <div class="container-fluid">
                    <div class="alert alert-success" id="add" style="display:none;">
                        Sub-cateory added successfully
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Sub-category:</h4>
                                    <button type="button" class="btn btn-success" style="float: right; margin-top: -3%;" data-bs-toggle="modal" data-bs-target="#addsubcat">
                                        <i class="fa fa-plus"></i>&nbsp; Add sub-category
                                    </button>
                                </div>
                                <div class="card-body">

                                    <table id="myTablesub" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>Category</th>
                                                <th>Sub-category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php


                                            $view = "SELECT * FROM tbl_subcat INNER JOIN tbl_categories on tbl_subcat.cat_id=tbl_categories.cat_id and tbl_categories.del_status='0' and tbl_subcat.del_status='0';";
                                            $query_run = mysqli_query($conn, $view);
                                            $i = 1;
                                            while ($prod = mysqli_fetch_array($query_run)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>

                                                    <td><?php echo $prod['category']; ?></td>
                                                    <td><?php echo $prod['subcat']; ?></td>
                                                    <td>
                                                        <button type="button" value="<?php echo $prod['sub_id']; ?>" class="editBtn fa fa-edit"></button> &nbsp;
                                                        <button type="button" value="<?php echo $prod['sub_id']; ?>" class="deleteBtn fa fa-trash"></button>
                                                        <!-- <a href="#">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        &ensp;
                                                        <a href="#trash-o">
                                                            <i class="fa fa-trash"></i></a> -->
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

        <?php
        if (isset($_POST['subsubmit'])) {
            $sub = $_POST['sub'];
            $cat = $_POST['sub_cat'];
            $sql = "INSERT INTO `tbl_subcat`(`cat_id`, `subcat`) VALUES ('$cat','$sub')";
            $result = $conn->query($sql);
        }
        ?>
        <h4>Add sub-category:</h4><br>
        <form action="" method="POST" class="form-inline">
          <div class="form-group mx-sm-3 mb-2">
            <input type="text" name="sub" placeholder="enter sub-category" class="form-control" required onchange="return Validstr()">
          </div>
          <span id="msg1" style="color:red;"></span>
          <select id="sub_cat" name="sub_cat" class="form-select form-select-sm">
            <?php
            $s = "SELECT * FROM `tbl_categories` WHERE del_status='0'";
            $r = $conn->query($s);
            if ($r->num_rows > 0) {
                while ($row = $r->fetch_assoc()) {
            ?>
                <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['category']; ?></option>

            <?php
                }
            } ?>
          </select>
          <input type="submit" class="btn btn-primary m-2" name="subsubmit" value="submit">
        </form>
      </div>
    </div> -->
            </div>
        </div>





        <div class="modal fade" id="addsubcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add category</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form id="savesubcat">
                            <div class="form-group">
                                <!-- <label for="recipient-name" class="col-form-label">Recipient:</label> -->
                                <input type="text" name="sub" placeholder="enter sub-category" class="form-control" required>
                            </div>

                            <select id="sub_cat" name="sub_cat" class="custom-select">
                                <?php
                                $s = "SELECT * FROM `tbl_categories` WHERE del_status='0'";
                                $r = $conn->query($s);
                                if ($r->num_rows > 0) {
                                    while ($row = $r->fetch_assoc()) {
                                ?>
                                        <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['category']; ?></option>

                                <?php
                                    }
                                } ?>
                            </select>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary m-2" value="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editsubcatmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">edit subcategory</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form id="editsubcat">
                            <div class="form-group">
                                <!-- <label for="recipient-name" class="col-form-label">Recipient:</label> -->
                                <input type="hidden" name="sub_id" id="subcatid">
                                <input type="text" name="sub" id="sub" placeholder="enter sub-category" class="form-control" required>
                            </div>

                            <select id="sub_cat" name="sub_cat" class="custom-select">
                                <?php
                                $s = "SELECT * FROM `tbl_categories` WHERE del_status='0'";
                                $r = $conn->query($s);
                                if ($r->num_rows > 0) {
                                    while ($row = $r->fetch_assoc()) {
                                ?>
                                        <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['category']; ?></option>

                                <?php
                                    }
                                } ?>
                            </select>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary m-2" value="submit">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).on('submit', '#savesubcat', function(e) {
            // console.log("asdsd")
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("subsubmit", true);

            $.ajax({
                url: "get_subcat.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    document.write(response)
                    $('#add').show();
                    $('.close').click();
                    $('#addsubcat').modal('hide');
                    $('#savesubcat')[0].reset();
                    $('#myTablesub').load(location.href + " #myTablesub");
                }
            });

        });

        $(document).on('click', '.editBtn', function() {

            var sub_id = $(this).val();

            $.ajax({
                type: "GET",
                url: "ajax.php?sub_id=" + sub_id,
                success: function(response) {
                    var res = jQuery.parseJSON(response);

                    if (res.status == 200) {
                        $('#subcatid').val(res.data.sub_id);
                        $('#sub').val(res.data.subcat);
                        $('#sub_cat').val(res.data.category);
                        $('#editsubcatmodal').modal('show');
                    }
                }
            });

        });

        // $(document).on('submit', '#editsubcat', function(e) {
        //     e.preventDefault();
        //     var formData = new FormData(this);
        //     formData.append("update_subcat", true);

        //     $.ajax({
        //         type: "POST",
        //         url: "ajax.php",
        //         data: formData,
        //         processData: false,
        //         contentType: false,
        //         success: function(response) {
        //             $('#editsubcatmodal').modal('hide');
        //             $('#editsubcat')[0].reset();

        //             $('#myTablesub').load(location.href + " #myTablesub");

        //         }
        //     });
        // });

        $(document).on('click', '.deleteBtn', function(e) {
            e.preventDefault();

            if (confirm('Are you sure you want to delete this sub-category?')) {
                var sub_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: {
                        'delete_subcat': true,
                        'sub_id': sub_id
                    },
                    success: function(response) {
                        $('#myTablesub').load(location.href + " #myTablesub");
                    }
                });
            }
        });


        $(document).on('submit', '#editsubcat', function(e) {
            // console.log("asdsd")
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_subcat", true);

            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // alert(response);
                    $('#editsubcatmodal').modal('hide');
                    $('#editsubcat')[0].reset();
                    $('#myTable').load(location.href + " #myTable");
                }
            });

        });
    </script>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
</body>

</html>