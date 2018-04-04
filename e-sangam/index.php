<head>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
    <!-- script for recaptcha/api -->
   <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="stylesheet" href="./css/bootstrap.css">
    
    <style>
/*          .form-module .form {
    display: none;
    padding: 40px;
    background-color: #e9e9e9;
}*/

a.active{
	
	background-color:red;
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
 .form-module {
  position: relative;
  background: lightgray;
  max-width: 320px;
  width: 100%;
  border-top: 5px solid #33b5e5;
  box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
  margin: 0 auto;
 border-color:#e9e9e9;
}
        body{
    padding: 50px;
}
.modal-dialog {
    width: 300px;
}
.modal-footer {
    height: 70px;
    margin: 0;
}
.modal-footer .btn {
    font-weight: bold;
}
.modal-footer .progress {
    display: none;
    height: 32px;
    margin: 0;
}
.input-group-addon {
    color: #fff;
    background: #3276B1;
}

    </style>
    
</head>

<?php
include 'db_con.php';
$error="";

if(isset($_POST['submit']))
{
	/* $captcha = $_POST['g-recaptcha-response'];
$secret = "6LcaKkQUAAAAAOenj_9jphJB90oB0WvyHW33fUVV";
$ip = $_SERVER['REMOTE_ADDR'];
$action = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
$result = json_decode($action,TRUE);
 */
	/* if($result['success']) 
	{
	 */
	

	
$u_name=$_POST['u_name'];	
$password=$_POST['password'];

 //encription
	function encryptIt($q)
	{
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
	}

$encrypted = encryptIt($password);
	

$sql="SELECT * FROM login_tb,login_groups WHERE login_tb.type=login_groups.id and username='$u_name' and pass='$encrypted' and status='1'" ;

$result=mysqli_query($con,$sql) or die(mysqli_error($con));

 $ary = mysqli_fetch_array($result);
 
 $_SESSION['id']=$ary["login_id"];
 $l=$ary["login_id"];
echo $ary["type"];
echo $l;

	

if($ary['type']==1)
	{
	 $ss="select pass_change from group_tb where login_id='$l'";
	 $result2=mysqli_query($con,$ss) ;
	 $q = mysqli_fetch_array($result2);
	 echo $q['pass_change'];
	 
	  if($q['pass_change']=='not')
		{
		 
		echo "gotcha";
		 header("location:./group_change_pass.php");
		 
		}
		else{
			
			 header("location:./group.php");
			}
		
	} 
	else
	{
		
			if(mysqli_num_rows($result)==1)
			{
			$loc=$ary['page'];
			header("location:./$loc");
	
	
			}
			else
			{
				$error="Invalid username or password";
			}
		
	}
		
/* 	}
	else{
	header("location:./index.php");;
} */

	

	
}


		



	

?>

<div class="container-fluid">
    
    
    
    
    <div class="row" style="size:100%;">
        <div  style="width:40%; height: 150px; float: left;">
            <img src="images/logo.png"  >
            
        </div>
        <div style="width:60%; height: 150px;float: right;" >
                  
            
        <div class="container">
 
            <ul class="nav nav-tabs" style="margin-top: 35px;">
    
                   
                  
                     <li><a href="contact.php"><h2>Contact<h2></a></li>
					 <li><a href="about.php"><h2>About<h2></a></li>
                    
  </ul>
  <br>
  </div>
        </div>
        
        
       
    </div>
 
    
    <div class="row">
        <div class="col-md-8" >
            <div class="jumbotron" style="background-color: white;">
    <h3>Wellcome to E-Sangam!</h3>
	<p><b>Kudumbashree</b> is the women empowerment and poverty eradication program,
            framed and enforced by the State Poverty Eradication Mission (SPEM) of the Government of Kerala.
            The Mission aims to eradicate absolute poverty within a
            definite time frame of 10 years under the leadership of Local Self Governments
            formed and empowered by the 73rd and 74th Amendments of the Constitution of India.<br>
           <b>E-Sangam</b> is an web application for kudumbasree to digitalize their routine and to empower
		   the womens to step into digital world being in digital kerala. </p>
	<p><a href="http://www.kudumbashree.org/" class="btn btn-primary btn-lg" role="button">Learn more »</a></p>
</div>
        </div>
        <div class="col-md-4" >
            
	<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Please sign in</h3>
			 	</div>
			  	<div class="panel-body">
                                    <form accept-charset="UTF-8" role="form" method="POST">
                    <fieldset>
					
					<!--to show message of invalid password-->
					<div class="form-group"  id="invalid" >
			    		    <h2 style="color:red;"><?php echo $error;?></h2>
			    		</div>
					<!--to show message of invalid password CLOSE-->
					
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="User Name" name="u_name" type="text" required>
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" required >
			    		</div>
						
					<!--	<div class="g-recaptcha" data-sitekey="6LcaKkQUAAAAAIU8FPEe6Xm1aMzU6XiKvF3Qlq0W"></div>
			    		-->
						<!--<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
			    	    	</label>
			    	    </div>-->
			    		
						<input class="btn btn-lg btn-success btn-block" style="margin-bottom:10px;" type="submit" name="submit" value="Login">
			    	</fieldset>
					
				<a href="forgot_pass.php"><h1>Forgot Password?<h1></a>
			    </div>
			</div>


</div>
			
			</div>
		 
        </div>
    
    
   
 <footer>
     <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> 
    </footer>




