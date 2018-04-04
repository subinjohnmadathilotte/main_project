<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
 
    <link rel="stylesheet" href="./css/bootstrap.css">
	<link rel="stylesheet" href="./css/s.css">
	
	
<?php
 include 'db_con.php';

  if(isset($_POST["submit"]))
 {
	 
 $new_pass=$_POST["new_pass"];
 $confirm_pass=$_POST["confirm_pass"];
$lid=$_SESSION['lid'];
			$sql1="update login_tb set pass='$confirm_pass' where login_id='$lid'";
			$result3=mysqli_query($con,$sql1);
	
			//echo"<script>alert('successfull')</script>";
			header("location:./index.php");
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
<script>
function pass(){
				
				var val_pass=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
				 $new_passw= document.my_form.new_pass.value;
				if (!val_pass.test($new_passw)){
					
					  alert("Required atleast one number, one lowercase and one uppercase letter, atleast six characters");
						document.my_form.new_pass.value="";
					$("#new_passw").focus();
					return false;
					
				}
			}
			
			function confirm(){
				
				 $new_passw= document.my_form.new_pass.value;
				 $c_passw= document.my_form.confirm_pass.value;
				
				 if($c_passw==$new_passw){
					 
					 return true
					 
				 }
				 else
				 {
					 alert("password mismatch");
					 return false
				 }
				
			}
  
</script>
<div class="container-fluid">
    
    
    
    
    <div class="row" style="size: 100%;">
        <div  style="width:40%; height: 150px; float: left;">
            <img src="images/logo.png"  >
            
        </div>
        <div style="width:60%; height: 150px;float: right;" >
                 
        </div>
        
        
       
    </div>
 
    
    <div class="row">
				  
     
			<div class="col-md-6 offset-2 " style="background-color:grey;height:auto;">
			 <form method="POST" name="my_form">
			<div class="row">
				<h2 class="padd" style="padding-left:80px;">change password</h2>
			</div>
			<div class="col-md-7 offset-1 padd">
				<input  type="password"  name="new_pass" class="form-control" placeholder="NEW PASSWORD" onchange="pass()" required />
			</div>
				<div class="col-md-7 offset-1 padd">
				<input  type="password"  name="confirm_pass" class="form-control" placeholder="CONFIRM PASSWORD" onchange="confirm()" required/>
			</div>
			<div class="col-md-7 offset-1 padd" style="padding-bottom:20px;">
				<input  type="submit"  name="submit" class="btn-success form-control" required/>
			</div>
			</form>
			</div>
				
	   
    </div>
  
  
    
    
   
   
 <footer>
     <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> 
    </footer>





