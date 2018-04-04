<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="./css/bootstrap.css">
    
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/validation.js"></script>
   <script type="text/javascript" src="js/validation_group.js"></script>
        
  <?php
 include 'db_con.php';
 if(!isset($_SESSION["id"]))
	  
	  {
		  
		  header('location:./');
	  }
 
 $id=$_SESSION['id'];
 $result=mysqli_query($con,"select `g_id` from group_tb where login_id='$id'"); 
 $row=mysqli_fetch_array($result);
 $g_id=$row["g_id"];
 //echo $g_id;
 
  if(isset($_POST["submit"]))
 {
	 
  $f_name=$_POST["f_name"];
  $l_name=$_POST["l_name"];
  $h_name=$_POST["h_name"];
  $dob=$_POST["dob"];
  $fathers_name=$_POST["father_name"];
  $Mobile=$_POST["phone"];
  $marital=$_POST["marital"];
  $hus=$_POST["hus_name"];
  $aadhaar=$_POST["aadhaar"];
  
	 $rs_count=mysqli_query($con,"select count(m_id) from members where g_id=$g_id");
	 $r_count=mysqli_fetch_array($rs_count);
	 //echo $r_count['count(m_id)'];
	 
	 $r_no_mem=mysqli_query($con,"select no_members from group_tb where g_id=$g_id");
	 $r_mem=mysqli_fetch_array($r_no_mem);
     if($r_count['count(m_id)']==$r_mem['no_members'])
	 {
		 
		echo"<script>alert('Can not add members more than specified in application')</script>";
	 }
	 else{
  		/* status=1 for active user and  status=0 for deleted user
				type=3 for user */ 
 
 			 //encription
	function encryptIt($q)
	{
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
	}

$encrypted = encryptIt(1234);
 
			$sqll="INSERT INTO `login_tb` ( `pass`,`username`,`status`,`type`) VALUES ('$encrypted','$f_name',1,3)";
			//$result2=mysqli_query($con,$sqll);
			
			//echo"<script>alert('successful')</script>";
			
			 $result1=mysqli_query($con, "SELECT max(login_id) FROM `login_tb`");
			 $row=mysqli_fetch_array($result1);
			 //var_dump($row);
			 $login_id=$row["max(login_id)"];
			// echo $login_id;
			 $single="single";
				echo $single;
			
			// conditionaly inserting
		 	if($marital=='single'){
	  
                  $picfile= "photo/".time()."".htmlspecialchars($_FILES['photo']['name']);
               move_uploaded_file($_FILES['photo']['tmp_name'], $picfile);
				
	
			// 0 for single in marital status ;
			
			 $sql2="INSERT INTO `members`
			(`g_id`, `f_name`, `l_name`, `house_name`, `dob`, `father_name`, `married`,`hus_name`,`photo`,`mobile`,`aadhaar_no`,`login_id`,`status`) 
			values('$g_id','$f_name','$l_name','$h_name','$dob','$fathers_name','$marital','$single','$picfile','$Mobile','$aadhaar',$login_id,'1')";
		 echo $result3=mysqli_query($con,$sql2);
			echo"<script>alert('successfull')</script>";
			
			}
			
			else{
				
				   $picfile= "photo/".time()."".htmlspecialchars($_FILES['photo']['name']);
                move_uploaded_file($_FILES['photo']['tmp_name'], $picfile);
				
	
			// 1 for married in marital status ;

 
			$sql2="INSERT INTO `members`(`g_id`, `f_name`, `l_name`, `house_name`, `dob`, `father_name`, `married`, `hus_name`, `photo`,`mobile`,`aadhaar_no`,`login_id`,`status`) values('$g_id','$f_name','$l_name','$h_name','$dob','$fathers_name','$marital','$hus','$picfile','$Mobile','$aadhaar',$login_id,'1')";
			$result3=mysqli_query($con,$sql2);
			echo"<script>alert('successfull')</script>";
				
				
			}
				
	 }
  
 }
 ?>


 <style>
.form-module .form {
    display: none;
    padding: 40px;
    background-color: #e9e9e9;
}
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



?>

<div class="container-fluid">
    
    
    
    
    <div class="row" style="size: 100%;">
        <div  style="width:40%; height: 150px; float: left;">
            <img src="images/logo.png"  >
            
        </div>
        <div style="width:60%; height: 150px;float: right;" >
                  
            
        <div class="container">
    <ul class="nav nav-tabs" style="margin-top: 35px;">
    
                <li class="current"><a href="group.php"><h1>Home</h1></a></li>
                  <li><a href="daily_report1.php"><h1>Daily report</h1> </a></li>
                   <li><a href="view_members1.php"><h1>View members</h1></a></li>
                    
					<li><a href="fine.php"><h1>Fine</h1></a></li>
                    <li><a href="signout.php"><h1>Logout</h1></a></li>
  <br>
  </div>
        </div>
        
        
       
    </div>
 
     
    <div class="row">'
		<div class="col-md-6 offset-5" style="padding-bottom:20px;"> <h3>Add member</h3></div>
		<div class="col-md-6 offset-4">
		<form class="f" height="auto" action="" method="POST" name="my_form" id="my_form" onSubmit="return" enctype='multipart/form-data'>
			
			
		<table>
		<tr>
			
		    <td class="td_pad"><h2>First name</h2></td><td class="td2_pad">
			<input  type="text"  name="f_name" id="f_name" class="form-control"  onchange="fname()"  />
			<h1 id="inv" style="color:red;">First Name Must be Alphabets Only</h1>
			</td>
			
		</tr>
		<tr>
		    <td class="td_pad"><h2>Last Name</h2>  </td><td class="td2_pad">
			<input  type="text"  name="l_name" id="l_name" class="form-control" onchange="lname()" >
		<h1 id="inv2" style="color:red;">Last Name Must be Alphabets Only</h1>
		</td>
		</tr>
		
		<tr>
		    <td class="td_pad"><h2>House Name </h2> </td><td class="td2_pad">
			<input  type="text"  name="h_name" id="h_name" class="form-control" onchange="house_name()" >
			<h1 id="inv3" style="color:red;">House Name Must be Alphabets Only</h1>
			</td>
		</tr>
			
			<tr>
		    <td class="td_pad"><h2>Date Of birth</h2> </td><td class="td2_pad">
			<input type="date" name="dob" min="1960-01-01" max="1998-01-01" class="form-control"  ></td></tr>

		</tr>
			
		<tr>
		    <td class="td_pad"><h2>Father's Name  </h2></td><td class="td2_pad">
			<input  type="text"  name="father_name" id="father_name" class="form-control" onchange="ftname()" >
			<h1 id="inv4" style="color:red;">Father's Name Must be Alphabets Only</h1>
			
			</td>
		</tr>
			
    
		
			
			<tr>
		    <td class="td_pad"><h2>Mobile </h2> </td><td class="td2_pad">
			<input  type="number"  name="phone" id="phone" class="form-control"  >
			<h1 id="inv5" style="color:red;">Enter valid phone<br> number without country code</h1></td>
			
			</tr>
			
			   <tr>
				<td class="td_pad"><h2>Marital Status</h2></td>
				<td class="td2_pad">
			<select name="marital" id="marital" class="form-control" onchange="mar()">
				<option value="0">Single
				</option>
				<option value="1">Married
				</option>
			</select>
		</td></tr>
		
			<tr name="hid_hus" id="hid_hus" >
		    <td class="td_pad"><h2 name="hus_name_label">Husband Name </h2> </td><td class="td2_pad">
			<input  type="text"  name="hus_name" id="hus_name" class="form-control">
			<h1 id="inv6" style="color:red;">Enter proper name</h1></td>
			
			</td>
			</tr>
			
			<tr>
		    <td class="td_pad"><h2>Aadhaar number </h2> </td><td class="td2_pad">
			<input  type="number"  name="aadhaar" id="aadhaar" class="form-control" www >
			<h1 id="inv7" style="color:red;">Enter proper aadhaar no</h1></td>
			
			</td>
			</tr>
				<tr>
				 <td class="td_pad"><h2>Upload  photo </h2></td>
				<td class="td2_pad" ><input type="file" name="photo" id="photo" class="form-control"  />
				<h1 id="inv8" style="color:red;">
				Only '.jpeg','.jpg', '.png', '.gif',</br> '.bmp' formats are allowed.
				</h1></td>
				</td>
				</tr>
		<tr><td></td><td class="td2_pad" ><input type ="submit" style="margin-top:10px;" name="submit" id="submit" class="btn btn-lg btn-success btn-block"></td>
        </tr>

	</table>
		  </form>
		  </div>
	</div>
   
 
    
   
 <footer>
     <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> 
    </footer>


  



