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
 
  if(isset($_POST["submit"]))
 {
	 
 $ot=$_POST["otp"];
 echo $ot;
 
if(isset($_COOKIE["otp"]))
	{
 
	 //echo "abc";
	$ck_otp=$_COOKIE["otp"];
	    echo "fgf:".$ot."::".$ck_otp ."ll";
		if($ck_otp==$ot){
			header("location:./change_pass.php");
			
		}
	}
	else{
			echo "rr";
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

<div class="container-fluid">
    
    
    
    
    <div class="row" style="size: 100%;">
        <div  style="width:40%; height: 150px; float: left;">
            <img src="images/logo.png"  >
            
        </div>
        <div style="width:60%; height: 150px;float: right;" >
                  
           
        </div>
        
        
       
    </div>
 
    
    <div class="row">
				  
     				<div class="page-alerts col-md-6 offset-2" style="height:50px;">
    <div class="alert alert-success page-alert" id="alert-1">
        <a href="user_home.php">
			</a>
       <h1>An one time password has been sent to your given address.Enter that below</h1>
    </div>
   
</div>
			<div class="col-md-6 offset-2 " style="background-color:grey;height:auto;">
			 <form method="POST" name="my_form">
			<div class="row">
				<h2 class="padd" style="padding-left:80px;">Enter OTP</h2>
			</div>
			<div class="col-md-7 offset-1 padd">
				<input  type="number"  name="otp" class="form-control" required />
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




