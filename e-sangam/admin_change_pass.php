<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
   <!-- <script type="text/javascript" src="js/validation.js"></script>-->
    <link rel="stylesheet" href="./css/bootstrap.css">
	<link rel="stylesheet" href="./css/s.css">
	
	
<?php
 include 'db_con.php';
  if(!isset($_SESSION["id"]))
	  
	  {
		  
		  header('location:./');
	  }
 
 
 $id=$_SESSION['id'];
 

 
  if(isset($_POST["submit"]))
 {
	 
 $new_pass=$_POST["new_pass"];
 $confirm_pass=$_POST["confirm_pass"];
 
		 //encription
	function encryptIt($q)
	{
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
	}

$encrypted = encryptIt($confirm_pass);
			
			$sql="update login_tb set pass='$encrypted' where type='4' and login_id='$id'";
			$result2=mysqli_query($con,$sql);
			
			echo"<script>alert('successfull')</script>";
			header("location:./admin.php");
 }
 ?>

<script>
$(document).ready(function(){
	 
	$('#invalid').hide();
	$('#mismatch').hide();
})
function pass(){
				
				var val_pass=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
				 $new_passw= document.my_form.new_pass.value;
				if (!val_pass.test($new_passw)){
					$('#invalid').show();
					  //alert("Required atleast one number, one lowercase and one uppercase letter, atleast six characters");
						document.my_form.new_pass.value="";
					$("#new_passw").focus();
					return false;
					
				}
				else
				{
					
					$('#invalid').hide();
				}
			}
			
			function confirm(){
				
				 $new_passw= document.my_form.new_pass.value;
				 $c_passw= document.my_form.confirm_pass.value;
				
				 if($c_passw==$new_passw){
					 $('#mismatch').hide();
					 return true
					 
				 }
				 else
				 {
					 $('#mismatch').show();
					 document.my_form.confirm_pass.value="";
					 //alert("password mismatch");
					 
					 return false
				 }
				
			}
  
</script>
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

<div class="container-fluid">
    
    
    
    
    <div class="row" style="size: 100%;">
        <div  style="width:40%; height: 150px; float: left;">
            <img src="images/logo.png"  >
            
        </div>
        <div style="width:60%; height: 150px;float: right;" >
                  
            
        <div class="container">
 
            <ul class="nav nav-tabs" style="margin-top: 35px;">
    
                <li><a href=""><h2>Home<h2></a></li>
                    <li><a href="group_reg.php"><h2>Add groups<h2></a></li>
					 <li><a href="admin_change_pass.php"><h2>Change password <h2></a></li>
					 <li><a href="signout.php"><h2>Log out<h2></a></li>
          </ul>
                    
 
  <br>
  </div>
        </div>
        
        
       
    </div>
 
    
    <div class="row">
				  
     
			<div class="col-md-5 offset-2 " style="background-color:grey;height:auto;">
			 <form method="POST" name="my_form">
			<div class="row">
				<h2 class="padd" style="padding-left:80px;">change password</h2>
			</div>
			<div class="col-md-7 offset-1 padd">
				<input  type="password"  name="old_pass" class="form-control" id="verify" placeholder="OLD PASSWORD"  required />
			</div>
			
				<!--displaying error message-->
			     <h1 class="padd" id="error1" style="color:red;">
				 <?php echo "*";?>
				 </h1>
			    <!--displaying error message CLOSE-->
				
			<div class="col-md-7 offset-1 padd">
				<input  type="password"  name="new_pass" class="form-control" placeholder="NEW PASSWORD" onchange="pass()" required />
			</div>
			<!--displaying error message-->
			<div class="col-md-7 offset-1"  id="invalid" >
			    		    <h1 style="color:red;"><?php echo 
							"Required atleast one number, 
							one lowercase and one uppercase letter, 
							atleast six characters";?></h1>
			    		</div><!--displaying error message CLOSE-->
				<div class="col-md-7 offset-1 padd">
				<input  type="password"  name="confirm_pass" id="confirm_pass" class="form-control" placeholder="CONFIRM PASSWORD" onchange="confirm()" required/>
			</div>
			<!--displaying error message-->
			<div class="col-md-7 offset-1"  id="mismatch" >
			    		    <h1 style="color:red;"><?php echo 
							"password mismatch";?></h1>
			    		</div><!--displaying error message CLOSE-->
						
						<!--displaying error message-->
			<div class="col-md-7 offset-1"  id="miss_old_pass">
			    		    <h1 style="color:red;"><?php echo 
							"old password not match";?></h1>
			    		</div><!--displaying error message CLOSE-->
			<div class="col-md-7 offset-1 padd" style="padding-bottom:20px;">
				<input  type="button"  name="submit" value="SUBMIT" id="submit" class="btn-success form-control" required/>
			</div>
			</form>
			</div>
				
	   
    </div>
  
  
    <script>
 
$(document).ready(function(){
 
	 $('#miss_old_pass').hide();
	 $('#error1').hide();
	 
	   

 $('body').on('click', '#submit', function () {
	   
	
            var oldPassword = $('#verify').val();
			 var confirm_pass = $('#confirm_pass').val();
			 if(oldPassword!='' && confirm_pass!=''){
				 
				 	    $.ajax({
                type: "POST",
                url: "old_pass.php",
                data: {old_pass:oldPassword,confirm:confirm_pass},
                
                success: function (data) {
					//alert(data);
                    if (data=="invalid") {
						//alert("old password not match");
                        //console.log("Working");
						$('#miss_old_pass').show();
						document.my_form.miss_old_pass.value="";
						
                    }
					
					if(data=="changed")
					{
						
						alert("changed");
					}
                }
            });
			 }
         
		
		 
		 
			 
		 
        });
		

})
</script>
    
   
   
 <footer>
     <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> 
    </footer>




