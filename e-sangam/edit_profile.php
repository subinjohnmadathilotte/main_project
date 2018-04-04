<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
   <!-- <script type="text/javascript" src="js/validation.js"></script>-->
    <link rel="stylesheet" href="./css/bootstrap.css">
	<link rel="stylesheet" href="./css/s.css">
	 <script type="text/javascript" src="js/validation.js"></script>
 <script>
$(document).ready(function(){
	$('#hid_hus').hide();
	$('#marital').on("change",function(){
		$x=$('#marital').val();
		if($x==0){
			$('#hid_hus').hide();
		}
		else{
			$('#hid_hus').show();
			$('#hid_hus').val().required;
		}
	})
})
</script>
	
	
<?php
 include 'db_con.php';
  if(!isset($_SESSION["id"]))
	  
	  {
		  
		  header('location:./');
	  }
 
 
 $id=$_SESSION['id'];
 

 
  if(isset($_POST["submit"]))
 {
	 $hus=$_POST["hus_name"];
	 $marital=$_POST["marital"];
	 $Mobile=$_POST["Mobile"];
	 //$photo=$_POST["photo"];
			if($marital=='1')
			{
			   $sql_edit1="update members set hus_name='$hus' where login_id='$id'";
				$result_edit=mysqli_query($con,$sql_edit);
			    echo"<script>alert('successfully updated')</script>";
			}
			
			$sql_edit2="update members set mobile='$Mobile' where login_id='$id'";
			$result_edit2=mysqli_query($con,$sql_edit2);
			 echo"<script>alert('successfully updated')</script>";
			 
			 if (!empty($photo) == false) {
				 
				 
				 
				$picfile= "photo/".time()."".htmlspecialchars($_FILES['photo']['name']);
					move_uploaded_file($_FILES['photo']['tmp_name'], $picfile);
				
					$sql_edit3="update members set photo='$picfile' where login_id='$id'";
					$result_edit3=mysqli_query($con,$sql_edit3);
							 //echo"<script>alert('successfully updated')</script>";
								}
								else{
										echo "dd	"; 
									
							
									
								}
 }
 ?>


    <style>
	

.padd{
	
	padding-top:10px;
}


footer{
  
   background-color: #424558;
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    height: 55px;
    text-align: center;
    color: #CCC;
}

footer p {
    padding: 10.5px;
    margin: 0px;
    line-height: 100%;
}
      body{
    padding: 50px;
}




    </style>
    
</head>


    
    <div class="row" style="size: 100%;">
        <div  style="width:40%; height: 150px; float: left;">
            <img src="images/logo.png"  >
            
        </div>
        <div style="width:60%; height: 150px;float: right;" >
                  
            
        <div class="container">
 
            <ul class="nav nav-tabs" style="margin-top: 35px;">
    
                <li class="current"><a href="user_home.php"><h2>Home</h2></a></li>
                  <li><a href=""><h2>Edit profile</h2></a></li>
                    <li><a href="user_change_pass.php"><h2>Change password</h2></a></li>
                    <li><a href="signout.php"><h2>Log out</h2></a></li>
          </ul>
                    
 
  <br>
  </div>
        </div>
        
        
       
    </div>
		
		<?php
			//selectin from members table
			$res_mem=mysqli_query($con,"select * from members where login_id=$id");
			$row_mem=mysqli_fetch_array($res_mem);
			 $f=$row_mem["f_name"];
			$l=$row_mem["l_name"];
			$n=" ";
		   $name=$f.' '.$l;
		
		?>
    
       <div class="row">
       
        <form class="f" height="auto" width="auto" action="#" method="POST" name="my_form" enctype='multipart/form-data'  enctype='multipart/form-data'>

		
			<div class="col-md-2 offset-1 padd">
			<h2> Name</h2>  
			</div>
			<div class="col-md-3 padd">
			<input  type="text"  name="name" class=" form-control" value="<?php echo $name ?>" readonly />
			</div>
			
			
			<div class="col-md-2 offset-1 padd">
			<h2></h2>  
			</div>
			<div class="col-md-3 padd">
			<img src="<?php echo $row_mem["photo"]?>" width="100px" height="100px"/>
			</div>
			
			<div class="col-md-2 offset-1 padd">
			<h2>Last Name</h2>  
			</div>
			<div class="col-md-3 padd">
			<input  type="text"  name="group_name" id="group_name" class=" form-control" 
			value="<?php echo $row_mem["l_name"]?>" onchange="g()" readonly required />
			</div>
			
			<div class="col-md-2 offset-1 padd">
			<h2>Change photo</h2>  
			</div>
			<div class="col-md-3 padd">
		    <input type="file" name="photo"  class=" form-control" onchange="fileCheck(this)" />
		   </div>
		   
		   <div class="col-md-2 offset-1 padd">
			<h2>Father's Name</h2>  
			</div>
			<div class="col-md-3 padd">
			<input  type="text"  name="group_name" id="group_name" class=" form-control" 
			value="<?php echo $row_mem["father_name"]?>" onchange="g()" readonly required />
			</div>
		
		 
		    <div class="col-md-2 offset-1 padd">
			<h2>Marital Status</h2>  
			</div>
			<div class="col-md-3 padd">
				<select name="marital" id="marital" class="form-control" onchange="mar()">
				<option value="0">Single
				</option>
				<option value="1">Married
				</option>
			</select>
				</div>
				
				
				
			<div class="col-md-2 offset-1 padd">
			<h2>Contact No</h2>  
			</div>
			<div class="col-md-3 padd">
		   <input  type="number"  name="Mobile" id="Mobile" class=" form-control" 
		   value="<?php echo $row_mem["mobile"]?>" onchange="ph()" required>
		   </div>
		
			<div class="col-md-5 offset-1" id="hid_hus">
				<div class="col-md-2  padd hid_hus"  style="padding:0px;padding-top:10px;">
				<h2>Husband name</h2>  
				</div>
				<div class="col-md-7 offset-3 padd" style="padding:0px;padding-top:10px;">
				<input  type="text"  name="hus_name" id="hus_name" class="form-control" onchange="Hsname()" >
				</div>
			</div>
		
			<div class="col-md-2 offset-1 padd">
			<h2>House Name</h2>  
			</div>
			<div class="col-md-3 padd">
			<input  type="text"  name="group_name" id="group_name" class=" form-control" 
			value="<?php echo $row_mem["house_name"]?>" onchange="g()" readonly required />
			</div>
		
		
			<div class="col-md-2 offset-1 padd">
			<h2>Date of birth</h2>  
			</div>
			<div class="col-md-3 padd">
		   <input  type="text"  name="phone" id="phone" class=" form-control"
		  value="<?php echo $row_mem["dob"]?>" onchange="ph()" readonly required />
		   </div>
		   
		  
		<div class="col-md-3  offset-3 padd">
		  <input type ="submit" name="submit" id="submit" value="Update" class="btn btn-lg btn-success btn-block"/>
		  </div>
		  
		  	  </form>
			  
		</div><!-- div inner row close-->
		 
  
    
    
   
   
 <footer>
     <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> 
    </footer>

<script>
function ph(){
	
	  var val_phone= /^[0-9]{10,12}$/;
	 $mobile= document.getElementById('Mobile').value;
	
	 if(!val_phone.test($mobile)){
     
      alert("enter valid phone number");
	   //document.getElementById('Mobile').value='';
	   $("#Mobile").focus();
      return false;
    }
	
}

    function fileCheck(obj) {
            var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
            if ($.inArray($(obj).val().split('.').pop().toLowerCase(), fileExtension) == -1){
                alert("Only '.jpeg','.jpg', '.png', '.gif', '.bmp' formats are allowed.");
			}
    }
</script>


    