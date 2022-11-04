<?php
include '../db_con.php';



$sql=mysqli_query($conn,"select * from tbl_categories"); 
?>
<html>
    <body> <form role="form" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Product Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required onchange="Validstr();"/>
                                    </div>
                                    <span id="msg1" style="color:red;"></span>
                    <script>
                        function Validstr() 
                        {
                        var val = document.getElementById('name').value;
                        if (!val.match(/^[a-zA-Z ]*$/)) 
                        {
                          document.getElementById('msg1').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                                document.getElementById('name').value = "";
                                  return false;
                        }
                          document.getElementById('msg1').innerHTML=" ";
                         return true;
                        }


                        function chek()
                        {
                            jQuery.ajax({
                                url:"get_subcat.php",
                                type:"post",
                                data:"cid="+$("#cid").val(),
                                success: function(dataResult){
					$("#sid").html(dataResult);
                                }
                            });
                        }
                   </script>
<div class="form-group">

<label>Category Name</label><br>

     
<select   name="cid" id="cid" onInput="chek()"  required >
<option value="">--select--</option>
<?php
while($row=mysqli_fetch_array($sql))
{

?>
<option value="<?php echo $row[0] ?>" ><?php echo $row[1] ?></option>

<?php
    
}
?>

</select></div>
<div class="form-group">
<?php



$sql1=mysqli_query($conn,"select * from tbl_subcat"); 
?>
<label>Subcategory Name</label><br>

     
<select   name="sid" id="sid" onchange="showResult(this.value)"  required >



</select></div>
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
                                    <label for="qua">Product Quantity</label>
                                    <input type="number"  class="form-control" name="quantity" min="1" oninput="validity.valid||(value='');" required/>
                                
                            </div>
                            
                            <div class="col-md-4 form-group">
                                    <label for="price">Price</label>
                                    <input type="number"  class="form-control" name="price" min="1" oninput="validity.valid||(value='');" required/>
                                
                            </div>
                            
</div>
</div>
                                <button type="submit" name="btnsubmit"class="btn btn-info">Submit</button>
                            </form>

                            <script>
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
				success: function(dataResult){
					$("#sid").html(dataResult);
				}
			});
		
		
	});
});
</script>
<?php

if(isset($_POST["btnsubmit"]))
{

    $name=$_POST['name'];
   
   $sid=$_POST['sid'];
    $des=$_POST['des'];
    $photo=$_FILES["photo"]["name"];
    $Q=$_POST['quantity'];
    $price=$_POST['price'];
  
    move_uploaded_file($_FILES["photo"]["tmp_name"],"images/".$_FILES["photo"]["name"]);
    
    $sql=mysqli_query($conn,"INSERT INTO `tbl_product`(`user_id`, `subcat_id`, `p_name`, `p_discribtion`, `p_image`, `price`) VALUES('$user_id','$sid','$name','$des','$photo','$price')");

    
    
    
    if($sql)
      {
       
    echo "<script>alert('Product Details Registered Successfully!!');window.location='product.php'</script>";
      }
    else
      {
    echo "<script>alert('Error');window.location='product.php'</script>";
      }
    }
    ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </body>
                            </html>