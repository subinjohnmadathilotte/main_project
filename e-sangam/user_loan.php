<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
   <!-- <script type="text/javascript" src="js/validation.js"></script>-->
    <link rel="stylesheet" href="./css/bootstrap.css"/>
	<link rel="stylesheet" href="./css/s.css"/>
	

<?php
 include 'db_con.php';
  if(!isset($_SESSION["id"]))
	  
	  {
		  
		//  header('location:./');
	  }
 
 
  $id=$_SESSION['id'];
  //selecting values
  	$results=mysqli_query($con,"select *  from `members` where login_id=$id");
		$row=mysqli_fetch_array($results);
		 $gid=$row['g_id'];
		$mem_id=$row['m_id'];
		
        $result2=mysqli_query($con,"select g_name  from `group_tb` where g_id=$gid");
		$row_gid=mysqli_fetch_array($result2);
		 $row_gid['g_name'];                         
		
		$res=mysqli_query($con,"select sum(amount)  from deposit where group_id=$gid");
		$rww=mysqli_fetch_array($res);
                                  
		$res_sum = mysqli_query($con, "select sum(amount) from deposit where mem_id=$mem_id");  
		$row_sum = mysqli_fetch_array($res_sum)	;
		 $row_sum["sum(amount)"];
  
  //submit
    if(isset($_POST["submit"]))
 {
  $lneed=$_POST["loan_need"];
  $amt=$_POST["amount"];
  $date=date("Y-m-d");
  
  $date=date("Y-m-d");
    //$date = "2015-11-17";
    $d=date('Y-m-d', strtotime($date. ' + 50 days'));
  
  $sq_loan="insert into `loan`(`group_id`,`user_id`,`date_of_applied`,`need`,`amount`,`repay_date`,`allowed`,`days`,`status`)
  values('$gid','$mem_id','$date','$lneed','$amt','$d','1','50','pending')";
  $s2=mysqli_query($con,$sq_loan);
  echo"<script>alert('Applied for loan')</script>";
  
  $sql_up_balance="update loan_manage set available_balnce=available_balnce-'$amt' where group_id ='$gid'";
  $r_up_balance=mysqli_query($con,$sql_up_balance);
  
   echo"<script>alert('Updated')</script>";
   
  header('location:./loan_confirmation.php');
	 
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
 <script>
 $(document).ready(function() {
    var elements = document.getElementsByName("amount");
    for (var i = 0; i < elements.length; i++) {
        elements[i].onchange = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("Enter prpoer amount");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
})
</script> 
</head>

<div class="container-fluid">
    
    
    
    
    <div class="row" style="size: 100%;">
        <div  style="width:40%; height: 150px; float: left;">
            <img src="images/logo.png"  >
            
        </div>
        <div style="width:60%; height: 150px;float: right;" >
                  
            
        <div class="container">
 
            <ul class="nav nav-tabs" style="margin-top: 35px;">
    
                <li class="current"><a href="user_home.php"><h2>Home</h2></a></li>
                  <li><a href="edit_profile.php"><h2>Edit profile</h2></a></li>
                    <li><a href=""><h2>Change password</h2></a></li>
                    <li><a href="signout.php"><h2>Log out</h2></a></li>
            </ul>
                    
 
  <br>
  </div>
        </div>
        
        
       
    </div>
 
	
    <div class="row">
				  <?php
								  
							
    
				  $sq_allowed=mysqli_query($con,"select allowed  from `loan` where user_id=$mem_id");
		$row_allowed=mysqli_fetch_array($sq_allowed);
		if($row_allowed['allowed']==0){
			?>	
			
			<div class="col-md-7 offset-2 " style="border-style:double;height:auto;">
			 <form method="POST"  name="my_form">
			<div class="row">
				<h2 class="padd" style="margin-left:250px;">Apply For Loan</h2>
			</div>
		<div class="col-md-5">
		   <div class="row">
			<div class="col-md-3 padd">
				<h1>Group Name</h1>
			</div>
			<div class="col-md-7 offset-1 padd">
				<h2><?php echo  $row_gid['g_name'];?></h2>
				
			</div>
		   </div>
			
			<div class="row">
			<div class="col-md-3 padd">
				<h1>Total deposit</h1>
			</div>
			<div class="col-md-7 offset-1 padd">
				<h2><?php echo  $rww["sum(amount)"];?></h2>
			</div>
		   </div>
		   
		   <div class="row">
			<div class="col-md-3 padd">
				<h1>Your deposit</h1>
			</div>
			<div class="col-md-7 offset-1 padd">
			<h2><?php echo $row_sum["sum(amount)"];	?></h2>
			</div>
		   </div>
		   
		</div><!-- red color div close-->	
			<div class="col-md-3 offset-2 padd">
			<img src="<?php echo $row["photo"]?>" width="100px" height="100px"/>
			</div>
			<div class="col-md-12">
				  <div class="row" style="margin-top=10px">
					<div class="col-md-2 padd">
						<h1>Name</h1>
					</div>
					<div class="col-md-3  padd">
					<?php 
					 $f=$row["f_name"];
									 $l=$row["l_name"];
									 $n=" ";
									 $name=$f.' '.$l;
					?>
						<input  type="text"  name="g_name" value="<?php echo $name;?>" class="form-control" readonly required/>
					</div>
					
					<div class="col-md-2 padd">
						<h1>Date of Birth</h1>
					</div>
					<div class="col-md-3  padd">
						<input  type="text"  name="g_name" value="<?php echo $row['dob'] ?>" class="form-control" readonly required/>
					</div>
					
				  </div><!--  div close-->
				  
				   <div class="row" style="margin-top=10px">
					<div class="col-md-2 padd">
						<h1>House Name</h1>
					</div>
					<div class="col-md-3  padd">
						<input  type="text"  name="g_name" value="<?php echo $row['house_name'] ?>" class="form-control" readonly required/>
					</div>
					
					<div class="col-md-2 padd">
						<h1>Mobile</h1>
					</div>
					<div class="col-md-3  padd">
						<input  type="text"  name="g_name" value="<?php echo $row['mobile'] ?>" class="form-control" readonly required/>
					</div>
					
				  </div><!--  div close-->
				  
				  
				    <div class="row" style="margin-top=10px">
					<div class="col-md-2 padd">
						<h1>Father's Name</h1>
					</div>
					<div class="col-md-3  padd">
						<input  type="text"  name="g_name" value="<?php echo $row['father_name'] ?>" class="form-control" readonly required/>
					</div>
					
					<div class="col-md-2 padd">
						<h1>Aaadhar number</h1>
					</div>
					<div class="col-md-3  padd">
						<input  type="text"  name="g_name" value="<?php echo $row['aadhaar_no'] ?>" class="form-control" readonly required/>
					</div>
				  </div><!--  div close-->
				     <div class="row" style="margin-top=10px">
					<div class="col-md-2 padd">
						<h1>Need of loan</h1>
					</div>
					<div class="col-md-3  padd">
						<textarea name="loan_need" rows="3" cols="83" required></textarea>
					</div>
					
					
				  </div><!--  div close-->
				     <div class="row" style="margin-top=10px">
					<div class="col-md-2 padd">
						<h1>Amount required</h1>
					</div>
					<div class="col-md-3  padd">
						 <?php 
					 //selecting from loan_manage table to calculate allowed amount
		$res_balance = mysqli_query($con, "select * from loan_manage where group_id=$gid");  
		$row_balance = mysqli_fetch_array($res_balance)	;
		 $bal=$row_balance["available_balnce"];	
		  $per=$row_balance["percentage"];	
		  
					 $val=$rww["sum(amount)"];
					 $p=($bal*$per)/100;
					 //echo $p;
					 ?>
						<input  type="number" min="0" name="amount" max="<?php  echo $p; ?>" class="form-control"  required/>
					</div>
					
					<div class="col-md-2 padd">
				
					 
						<h1>Allowed amount <?php   echo $p;;?></h1>
					</div>
					
				  </div><!--  div close-->
				   <div class="row" style="margin-top=10px">
					
					<div class="col-md-5 offset-2 padd">
					<input type ="submit" name="submit" id="submit" value="Apply" class="btn btn-lg btn-success btn-block"/>
					</div>
					
					
				  </div><!--  div close-->
				   </div><!--  div close-->
				    
				  
			</div><!-- application div close-->	
			<?php 
		}
				  else{?>
									 <div class="col-md-6 offset-3">
			<h3>You can apply for loan only after repaying current loan</h3>
			
			</div>
			<?php
								  }
			?>
			</form>
			</div><!-- grey color div close-->	
				
	   
    </div>
  <!-- INSERTION -->	
  <?php 
  
  ?>
    
    
   
   
 <footer>
     <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> 
    </footer>



