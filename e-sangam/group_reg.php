<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="./css/bootstrap.css">
	 <script type="text/javascript" src="js/validation_group.js"></script>
    
    <style>
/*          .form-module .form {
    display: none;
    padding: 40px;
    background-color: #e9e9e9;
}*/
.td_pad{
		font-size:15px;
		padding-left:20px;	
	}
	
	.td2_pad{
		padding-left:20px;	
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
//sms function

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

//sms function close
 
  if(isset($_POST["submit"]))
 {
	 
 $reg_no=$_POST["reg_no"];
 $group_name=$_POST["group_name"];
 $district=$_POST["district"];
  $panchayath=$_POST["panchayath"]; 
 $ward=$_POST["ward"];
  $no_members=$_POST["no_members"]; 
 $email=$_POST["email"];
 $phone=$_POST["phone"];
$pass= substr($group_name, 0, 3);
$password=$pass.$reg_no;
//echo $password;
  
		//checking whether reg no already taken
		 $reg_check=mysqli_query($con, "SELECT reg_no FROM `group_tb`");
			 $row_reg=mysqli_fetch_array($reg_check);
				if($row_reg['reg_no']==$reg_no){
					
					 echo"<script>alert('Entered Reg No already registerd ')</script>";
				}
				else{
					
					
				

                 $file1= "files/".time()."".htmlspecialchars($_FILES['file1']['name']);
                  move_uploaded_file($_FILES['file1']['tmp_name'], $file1);
				  
				  
				   $file2= "files/".time()."".htmlspecialchars($_FILES['file2']['name']);
                  move_uploaded_file($_FILES['file2']['tmp_name'], $file2);
				  
				   
				   $file3= "files/".time()."".htmlspecialchars($_FILES['file3']['name']);
                  move_uploaded_file($_FILES['file3']['tmp_name'], $file3);
				  
			
/* status=1 for active user and  status=0 for deleted user
     type=1 group */ 
 
 
 
 //encription
	function encryptIt($q)
	{
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
	}

$encrypted = encryptIt($password);
 
 
			$sqll="INSERT INTO `login_tb` ( `pass`,`username`,`status`,`type`) VALUES ('$encrypted','$reg_no',1,1)";
			$result2=mysqli_query($con,$sqll);
			
				//echo"<script>alert('successful')</script>";
				
			 $result1=mysqli_query($con, "SELECT max(login_id) FROM `login_tb`");
			 $row=mysqli_fetch_array($result1);
			 //var_dump($row);
			 $login_id=$row["max(login_id)"];
			// echo $login_id;
   
		
 $sql="INSERT INTO `group_tb`(  `reg_no`, `g_name`, `email`, `district`, `panchayath`,
 `ward`, `no_members`, `files1`,`files2`,`file3`,`phone`,`login_id`,`pass_change`) 
 VALUES ('$reg_no','$group_name','$email','$district','$panchayath','$ward','$no_members','$file1','$file2','$file3','$phone','$login_id','not')";
  $result=mysqli_query($con,$sql);
 
  echo"<script>alert('successful')</script>";
  
 $message="Your Kudambasree unit has been registerd.
 your unit can login to your account using user name and temporary password
 provided with this message.You should change password once you login in to you account
 User name=$reg_no
 password=$password";
//calling sms function
send($message, $phone);
 
 }
 }
?>

<style>
.padd{
	
	padding-bottom:10px;
}
</style>

<div class="container-fluid">
    
    
    
    
    <div class="row" style="size: 100%;">
        <div  style="width:40%; height: 150px; float: left;">
            <img src="images/logo.png"  >
            
        </div>
        <div style="width:60%; height: 150px;float: right;" >
                  
            
        <div class="container">
 
            <ul class="nav nav-tabs" style="margin-top: 35px;">
    
<!--                    <li><a href="group_reg.php"><h2>Group registration<h2></a></li>-->
                    <li><a href="admin.php"><h2>Home<h2></a></li>
                     <li><a href="#"><h2>Add groups<h2></a></li>
					 <li><a href="signout.php"><h2>Logout<h2></a></li>
                    
  </ul>
  <br>
  </div>
        </div>
         </div>
        
       
    </div>
 
    
    <div class="row">
       
        <form class="f" height="auto" width="auto" action="#" method="POST" name="my_form" enctype='multipart/form-data'  enctype='multipart/form-data'>

		
			<div class="col-md-2 offset-1 padd">
			<h2> Registration No</h2>  
			</div>
			
			<div class="col-md-3 padd">
			<input  type="number"  name="reg_no" class=" form-control" min=10000 max=99999  required />
			</div>
		
		<div class="col-md-2  padd">
		  <h1>Panchayath Verification</h1>
		 </div> 
		  <div class="col-md-3 padd">
	 	    <input type="file" name="file1" id="file1" required class=" form-control" onchange="fileCheckk(this)" />
			</div>
		
			<div class="col-md-2 offset-1 padd">
			<h2> Group Name</h2>
			</div>
			
			<div class="col-md-3 padd">
			<input  type="text"  name="group_name" id="group_name" class=" form-control"  onchange="g()" required />
			</div>
		
		  <div class="col-md-2 padd">
		  <h1>Villege office sanction</h1>
		 </div> 
		   <div class="col-md-3 padd">
		   
		    <input type="file" name="file2" id="file2" required class="form-control" onchange="fileCheck2(this)" />
		   </div>
		  
		    <div class="col-md-2 offset-1 padd">
		  <h2> District</h2>
		  
		 </div> 
			<div class="col-md-3 padd">
			<select class=" form-control" id="district_select" name="district" required >
			
					
            <?php
            $q = mysqli_query($con, "SELECT d_id,d_name FROM district");
            //var_dump($q);

            while ($row = mysqli_fetch_array($q)) {
                echo '<option value=' . $row['d_id'] . '>' . $row['d_name'] . '</option>';
            }
            ?>
					
				</select>
			</div>
		  
		  <div
		   class="col-md-2 padd">
		  <h1>Kudambasree approvel</h1>
		 </div> 
		   <div class="col-md-3 padd">
		   <input type="file" name="file3" id="file3" required class=" form-control" onchange="fileCheck3(this)" />
		  </div>
		  
		      <div class="col-md-2 offset-1 padd">
		  <h2> panchayath</h2>
		 </div> 
			
		    <div class="col-md-3 padd">
			    <select id="panchayath_select" class=" form-control" name="panchayath" value="panchayath" required>
					
					<option value="-1">select</option>
					
				</select>
			</div>
			
			 <div class="col-md-2  padd">
		  <h2> Email</h2>
		 </div> 
		 
		  <div class="col-md-3 padd">
		  <input  type="email"  name="email" id="email" class="form-control" onchange="efn()" required />
		  </div>
			
			  <div class="col-md-2 offset-1 padd">
		  <h2> Ward no:</h2> 
		 </div> 
		 
		 <div class="col-md-3 padd">
				<select id="ward_select" class=" form-control" name="ward" required>

						   
						<option value="-1">select</option>				   
				</select>
			</div>
		  
		  
		 <div class="col-md-2  padd">
		  <h2> Contact No</h2>
		 </div> 
		  
		   <div class="col-md-3 padd">
		   <input  type="number"  name="phone" id="phone" class=" form-control" onchange="ph()" required />
		   </div>
			
			  
			  <div class="col-md-2 offset-1 padd">
		  <h2> No of members</h2>
		 </div> 
		 
		 <div class="col-md-3 padd">
                 <input  type="number"  name="no_members" id="no_members" class=" form-control" onchange="nomembers()" required />
			</div>
			
		 
		  <div class="col-md-3  offset-2 padd">
		  <input type ="submit" name="submit" id="submit" class="btn btn-lg btn-success btn-block"/>
		  </div>
		  
		  	  </form>
			  
		</div><!-- div inner row close-->
		 
       
    
    
   
 <footer>
       <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> /p>
    </footer>

	
	
    <script>
        $('body').on('change', '#district_select', function () {
//            alert("countryslected");
            $index = $('#district_select').val();
           
            $.ajax({
            type:'post',
                    url:'get_panchayath.php',
                    data:{index:$index},
                    success:function(response)
                    {
//                        alert(response);
                    console.log(response);
                    $ar = response.split(",");
                            $str = "<option value='-1' disabled hidden selected> </option>";
                            for (var i = 0; i < $ar.length; i++)
                    {
                        $ss=$ar[i].split(':');
                    $str += '<option value='+$ss[0]+'>' + $ss[1] + "</option>";
                    }
                    $('#panchayath_select').html($str);
                }
                    });
                    
    });
    
         $('body').on('change', '#panchayath_select', function () {
//            alert("countryslected");
            $index = $('#panchayath_select').val();
           
            $.ajax({
            type:'post',
                    url:'get_ward.php',
                    data:{index:$index},
                    success:function(response)
                    {
//                        alert(response);
                    console.log(response);
                    $ar = response.split(",");
                            $str = "<option value='-1' disabled hidden selected> </option>";
                            for (var i = 0; i < $ar.length; i++)
                    {
                        $ss=$ar[i].split(':');
                    $str += '<option value='+$ss[0]+'>' + $ss[1] + "</option>";
                    }
                    $('#ward_select').html($str);
                }
                    });
                    
    });
    
    </script>

