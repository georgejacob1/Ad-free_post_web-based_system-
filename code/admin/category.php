
<?php
include 'admin-session.php';
include '../db_con.php';
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>categoirs</title>
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
          <a href="index.php" >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#" class="active">
            <i class='bx bx-box' ></i>
            <span class="links_name">category</span>
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
            <i class='bx bx-cog' ></i>
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
        <span class="dashboard">categoirs</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <!-- <img src="images/profile.jpg" alt=""> -->
        <i class="fas fa-user"></i>
        <span class="admin_name">Admin</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
           <div class="home-content">
      <div class="card w-auto m-5 p-5">
        
          <?php
   if(isset($_POST['submit'])){
    $cat=$_POST['cat'];
 $s=mysqli_query($conn,"SELECT count(*) as count FROM tbl_categories WHERE category='$cat'");
  		$display=mysqli_fetch_array($s);
  		if($display['count']>0)
		{
		echo "<script>alert('This category name is already exist');window.location='category.php'</script>";	
		}


        else
        {
    $sql="INSERT INTO `tbl_categories`(`category`) VALUES ('$cat')";
    $result=$conn->query($sql);
        }
if($sql)
{
 
echo "<script>alert('Category Details Registered Successfully!!');window.location='category.php'</script>";
}
else
{
echo "<script>alert('Error');window.location='index.php'</script>";
}
} 
   ?>
          <h4>Add category:</h4><br> 
           <form action="" method="POST" class="form-inline">
           
           <div class="form-group mx-sm-3 mb-2">
        <input type="text" name="cat" placeholder="enter category name" class="form-control" required onchange="return Validstr()">
           </div><span id="msg1" style="color:red;"></span>
           
        <input class="btn btn-primary m-2" type="submit" name="submit" value="sumbit">
    </form>
    
        </div>
        <div class="card w-auto m-5 p-5">

        <?php
if(isset($_POST['subsubmit'])){
    $sub=$_POST['sub'];
    $cat=$_POST['sub_cat'];
    $sql="INSERT INTO `tbl_subcat`(`cat_id`, `subcat`) VALUES ('$cat','$sub')";
    $result=$conn->query($sql);
}
?>
<h4>Add sub-category:</h4><br>
        <form action="" method="POST" class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
        <input type="text" name="sub" placeholder="enter sub-category" class="form-control" required  onchange="return Validstr()">
        </div>
        <span id="msg1" style="color:red;"></span>
        <select id="sub_cat" name="sub_cat"class="form-select form-select-sm">
            <?php
            $s="SELECT * FROM `tbl_categories`";
            $r=$conn->query($s);
            if($r->num_rows > 0){
                while($row=$r->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['cat_id'];?>"><?php echo $row['category']; ?></option>

                    <?php
                }
            } ?>
            </select>
        <input type="submit" class="btn btn-primary m-2" name="subsubmit" value="sumbit">
    </form>
    </div>
        </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
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
        function Validstr()
                {
                    var f=document.getElementById("cat").value;
                    // var l=document.getElementById("sub_cat").value;
                    var s=/^[a-zA-Z]+$/;
                    if(f!="" && s.test(f)==false){

                        document.getElementById('msg1').style.display = "block";
                        document.getElementById('msg1').innerHTML = "Start with a Capital letter & Only alphabets are allowed";
                        return false;
                    }
                    else{
                        document.getElementById('msg1').style.display = "none";
                    }}
                   
 </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
