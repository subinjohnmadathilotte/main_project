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
  if(!isset($_SESSION["id"]))
	  
	  {
		  
		  header('location:./');
	  }
 
 
 
  $id=$_SESSION['id'];
 $result=mysqli_query($con,"select `g_id` from group_tb where login_id='$id'"); 
 $row=mysqli_fetch_array($result);
 $g_id=$row["g_id"];
 //echo $g_id;
 
 
  if(isset($_POST["remove"]))
   {
	   
	 $mem_id=$_POST["id"];
	 $result=mysqli_query($con,"select login_id  from members where g_id=$g_id and m_id=$mem_id");
	 $r=mysqli_fetch_array($result);
	 $lg=$r["login_id"];
	
	 
	 $sql1="update login_tb set status=0 where login_id=$lg";
	 $result1=mysqli_query($con,$sql1);
	 
	 $sql2="update members set status=0 where g_id=$g_id and m_id=$mem_id";
	 $result2=mysqli_query($con,$sql2);
		
	$sql3="update group_tb set no_members=no_members-1 where g_id=$g_id";
	 $result3=mysqli_query($con,$sql3);
	 
	 echo"<script>alert('Removed')</script>";
	 
	}


?>

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


.test2{
	background-color:#ECEFF1;
	width:400px;
	height:100px;
}

.test1{
	background-color:green;
	width:100px;
	height:100px;
}
.test{
	text-align: center;
	background-color:#ECEFF1;
	width:20px;
	height:100px;
}
.td_display{
	
	width:120px;
}
.btt{
	
	margin:5px;
	
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
    
                <li class="current"><a href="group.php"><h1>Home</h1></a></li>
                  <li><a href="daily_report1.php"><h1>Daily report</h1> </a></li>
                    <li><a href="fine.php"><h1>Fine</h1></a></li>
                    <li><a href="add_member1.php"><h1>Add members</h1></a></li>
                    <li><a href="signout.php"><h1>Log out</h1></a></li>
          </ul>
                    
 
  <br>
  </div>
        </div>
        
        
       
    </div>
 
    
    <div class="row">
	<!---checking if any member there-->
			<?php
			 $result_if=mysqli_query($con,"select *  from members where g_id=$g_id and status=1");
              $row_if=mysqli_fetch_array($result_if);
			 	if($row_if['m_id']==!null){
					?>   
	
	<div class="col-md-2" style="height:100px;">
	 <a href="add_president.php"><h1>Add president</h1></a>
	 
	</div>
	
	
			   
	
		 <div class="col-md-6 offset-1" style="height: auto;margin-bottom:20px;">
		 
		 
		 
		 
		 
		 <div class="span7">   
			<div class="widget stacked widget-table action-table">
    				
				<div class="widget-header">
					<i class="icon-th-list"></i>
					<h3>Members Daily Deposit </h3><h3><?php echo date("d-m-Y");?></h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<table class="table table-striped table-bordered">
					
						<thead>
							<tr>
								<th>NO:</th>
								<th>Detail  of Members</th>
								<th>photo</th>
								<th></th>
							</tr>
						</thead>
						
						<?php
						 $result=mysqli_query($con,"select *  from members where g_id=$g_id and status=1");
							
							/* selecting members list */
					$num=0;
					
                            while($row=mysqli_fetch_array($result))
                                  {
									  
									  
									  
									 $f=$row["f_name"];
									 $l=$row["l_name"];
									 $n=" ";
									 $name=$f.' '.$l;
									$num+=1;
									  
							   ?>
							   
							   <form action="#" method="POST" name="my_form">
							  <tr>
								<td style="width:50px;"><!-- Number column -->
									<div class="col-md-1" style="height: auto;margin-bottom:20px;">
									<?php
									echo $num;		
									?>
									</div>
								</td>
							 <!-- Number column ends-->
							  
							  
							  <!-- Members details column -->
								<td style="width:200px;">
							
									
									<!--	<td><div class="col-md-2">House Name</div></td>-->
										<div class="col-md-8"><b>
											<?php
											echo ucfirst($name);
											?></b>
											</div><br>
									
									<!--
										<td><div class="col-md-2">Phone</div></td>-->
										<div class="col-md-8">
											<?php
											echo $row["mobile"];
											?>
											</div><br>
									
										<!--<td><div class="col-md-2">Name</div></td>-->
										<div class="col-md-8">
											<?php
											echo $row["house_name"];
											?>
											</div>
									
									
								</td><!-- Members details column ends-->
								<!-- photo column -->
								<td style="width:30px;">
								<div class="test1">
									<img src="<?php echo $row["photo"]?>" width="100px" height="100px"/>
								</div>
								

								</td><!-- photo column ends-->
								
								<td class="td-actions">
							
								 <input type="hidden" name="id" value="<?php echo $row["m_id"]; ?>"/>
									<input type="submit" name="remove"  id="remove"  value="Remove" class="btn-success form-control" />
								</td>
							  </tr>
							  </form>
							  
							  <?php
								  }  
								  ?>
							
						
							
						</table>
					
				</div> <!-- /widget-content -->
			
			</div> <!-- /widget -->
            </div>
		 <?php
								  } //if checking close 
								 
								  else{?>
									<div class="page-alerts col-md-8 offset-2" style="height:100px;">
    <div class="alert alert-success page-alert" id="alert-1">
        <a href="user_home.php">
		</a>
       <h1> <strong></strong>Members should be added first</h1>
    </div>
   
</div> 
			<?php
								  }
								 ?>	
		 
		 
		</div>
		<!--div col-md-8 offset-2 close-->
							  
	</div><!--div row close-->
    
    
   
 <footer>
     <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> 
    </footer>

  
  

