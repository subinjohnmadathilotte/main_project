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
                  
            
        <div class="container">
 
            <ul class="nav nav-tabs" style="margin-top: 35px;">
    
                <li class="current"><a href="user_home.php"><h2>Home</h2></a></li>
                  <li><a href=""><h2>Daily report</h2> </a></li>
                   <li><a href=""><h2>View members</h2></a></li>
                    <li><a href=""><h2>Add members</h2></a></li>
                    <li><a href="signout.php"><h2>Log out</h2></a></li>
          </ul>
                    
 
  <br>
  </div>
        </div>
       
    </div>
 
    <?php 
	//selecting member id 
	$r_mid=mysqli_query($con,"select m_id  from `members` where login_id=$id");
	$row_mid=mysqli_fetch_array($r_mid);
	$m_id=$row_mid['m_id'];
	//selecting loan details 
	
	
	?>
    <div class="col-md-6 offset-2" style="height: auto;margin-bottom:20px;">
		
		 
		 <div class="span7">   
			<div class="widget stacked widget-table action-table">
    				
				<div class="widget-header">
					<i class="icon-th-list"></i>
					<h3>Loan Status</h3>
				
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<table class="table table-striped table-bordered">
					
						<thead>
							<tr>
								<th>Date of applied</th>
								<th>Amount</th>
								<th>status</th>
								
							</tr>
						</thead>
						
						<?php
						//selecting member id 
	$r_loan=mysqli_query($con,"select *  from `loan` where user_id=$m_id and status='pending'");
	while($row_loan=mysqli_fetch_array($r_loan))
	{
							
			?>
			<tr>
	
			<td style="width:30px;">
								<div class="test1">
			
			<p style="font-size:20px;"><?php echo $row_loan["date_of_applied"];?></p>
			</div></td>
			
			<td style="width:30px;">
								<div class="test1">
			<p style="font-size:20px;">
			<?php echo $row_loan["amount"];?></p>
			</div></td>
			
			<td style="width:30px;">
								<div class="test1">
			<p style="font-size:20px;">
			<?php echo $row_loan["status"];?></p>
			</div></td>
		
		</tr>
			<?php 
	}
	
?>				
						</table>
					
				</div> <!-- /widget-content -->
			
			</div> <!-- /widget -->
            </div>
				 
								  
								  
		</div>
		<!--div col-md-8 offset-2 close-->
  
    
    
   
   
 <footer>
     <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> 
    </footer>




