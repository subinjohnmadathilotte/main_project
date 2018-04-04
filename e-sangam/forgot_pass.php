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
 //sending SMS
 function send($sms, $to) {

    $sms = urlencode($sms);
    $token = "1136e58159181f62362eaac6c8ef4e26";
    $sendercode="ESANGM";   
    $url = "http://sms.safechaser.com/httpapi/httpapi?token=".$token."&sender=".$sendercode."&number=".$to.'&route=2&type=1&sms='.$sms;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 50);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 50);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $datares = curl_exec($ch);
    curl_close($ch);
    return $datares;
}
 


		
		
  if(isset($_POST["submit"]))
 {
		
 $un=$_POST["user_name"];
 
	 $Res_otp=mysqli_query($con,"select login_id from login_tb where username='$un'");
	 $ot= mysqli_fetch_array($Res_otp);
	 $lid=$ot["login_id"];
	 $_SESSION["lid"]=$lid;
 
	$Res_adr=mysqli_query($con,"select phone from group_tb where login_id='$lid'");	
	 $row_email= mysqli_fetch_array($Res_adr);
	 $phone=$row_email["phone"];
	 
	 $Res_adr2=mysqli_query($con,"select mobile from members where login_id='$lid'");	
	 $row_mobile= mysqli_fetch_array($Res_adr2);
	$mobile=$row_mobile["mobile"];
	
	 if($phone==!null)
	 {
		 //OTP MESSAGE
echo $ran=(rand());
 $message="Your forgot password varification code is ".$ran." This OTP expires in 5 minuts";
//OTP MESSAGE close
		 
		//setting COOKIE function
	 $cookie_name = "otp";
		 $cookie_value = $ran;
		setcookie($cookie_name, $cookie_value, time() + (420), "/"); 
	
		 //calling sms function
		send($message, $phone);
		
		 
	 }
	 else if ($mobile==!null)
	 {
		 
 //OTP MESSAGE
echo $ran=(rand());
 $message="Your forgot password verification code is ".$ran." This OTP expires in 5 minuts";
//OTP MESSAGE close
		 
		//setting COOKIE function
	 $cookie_name = "otp";
		 $cookie_value = $ran;
		setcookie($cookie_name, $cookie_value, time() + (420), "/"); 
	
		 //calling sms function
		send($message, $mobile);
	 } 
			//echo"<script>alert('successfull')</script>";
			header("location:./new_password.php");
			

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
				  
     
			<div class="col-md-6 offset-2 " style="background-color:grey;height:auto;">
			 <form method="POST" name="my_form">
			<div class="row">
				<h2 class="padd" style="padding-left:80px;">change password</h2>
			</div>
			<div class="col-md-7 offset-1 padd">
				<input  type="text"  name="user_name" class="form-control" placeholder="Your User Name/Reg No" onchange="pass()" required />
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




