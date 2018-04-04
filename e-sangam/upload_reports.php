<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
   <!-- <script type="text/javascript" src="js/validation.js"></script>-->
    <link rel="stylesheet" href="./css/bootstrap.css">
	<link rel="stylesheet" href="./css/s.css">
	<script type="text/javascript" src="js/validation_group.js"></script>
    
	
	
<?php
 include 'db_con.php';
  if(!isset($_SESSION["id"]))
	  
	  {
		  
		  header('location:./');
	  }
 
 
 $id=$_SESSION['id'];
 
  $gid=$_SESSION["GID"];
    if(isset($_POST["submit"]))
 {
	  $date=date("Y-m-d");
	  
	   $file2= "files/".time()."".htmlspecialchars($_FILES['file2']['name']);
        move_uploaded_file($_FILES['file2']['tmp_name'], $file2);
		
		$sq="INSERT INTO `ads_reports`(`g_id`, `date`, `file`) VALUES ('$gid','$date','$file2')";
		$res_repo=mysqli_query($con,$sq);
		 echo"<script>alert('successful')</script>";
	 
 }
 
 ?>


    <style>
	.bt
	{
		
	}

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
    
                <li class="current"><a href="ads.php"><h2>Home</h2></a></li> 
				 <li class="current"><a href="upload_reports.php"><h2>Upload Report</h2></a></li>
                    <li><a href="signout.php"><h2>Log out</h2></a></li>
          </ul>
                    
 
				<br>
			</div>
        </div>
    </div>

 
   <!--first row div starts-->
    <div class="row" style="margin-bottom:20px;">
	
	
			<div class="col-md-8 offset-2 " style="background-color:lightgrey;height:auto;">
			
			 <form method="POST" name="my_form" enctype='multipart/form-data'>
			<div class="row">
				<h2 class="padd" style="padding-left:80px;">UPLOAD REPORT</h2>
			</div>
			
			
			
			<div class="col-md-3  padd">
				<h2 class="padd" style="padding-left:10px;">Group Name:</h2>
				</div>
			
				<div class="col-md-4 padd">
				<h2 class="padd" style="padding-left:5px;">
				<?php 
				$res=mysqli_query($con,"select g_name from group_tb where g_id='$gid'");
					$rw=mysqli_fetch_array($res);
					echo ucfirst($gname=$rw["g_name"]);
				?>
				</h2>
				</div>
				 <div class="col-md-6 padd">
		    <input type="file" name="file2" id="file2" required class="form-control" onchange="fileCheck2(this)" />
		   </div><br>
		
			<div class="col-md-2  padd" style="padding-bottom:20px;">
				<input  type="submit"  name="submit" class="btn-success form-control" required/>
			</div>
			</form>
			</div>
	
	
			</div>  <!--first row div close-->
    
    
  
   
 <footer>
     <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> 
    </footer>




