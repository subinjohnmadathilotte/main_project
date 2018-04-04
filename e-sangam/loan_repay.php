
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
 $result=mysqli_query($con,"select `g_id` from group_tb where login_id='$id'"); 
 $row=mysqli_fetch_array($result);
 $g_id=$row["g_id"];
 //echo $g_id;

$loan_id='';
 
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
    
                <li class="current"><a href="group.php"><h2>Home</h2></a></li>
                  <li><a href="daily_report1.php"><h2>Daily report</h2> </a></li>
                   <li><a href="view_members1.php"><h2>View members</h2></a></li>
                    <li><a href="add_member1.php"><h2>Add members</h2></a></li>
                    <li><a href="signout.php"><h2>Log out</h2></a></li>
          </ul>
                    
 
  <br>
  </div>
        </div>
        
        
       
    </div>
 
    
  <div class="row">
	<!---checking if any member there-->
			<?php
			 $result_if=mysqli_query($con,"select l_id  from loan where group_id=$g_id and status='approved'");
             $row_if=mysqli_fetch_array($result_if);
			 	if($row_if['l_id']==!null)
				
				{
					?>   
	
		
		 <div class="col-md-8 offset-1" style="height: auto;margin-bottom:20px;">
		 <form action="" method="POST" name="my_form">
		 <?php
		 	$res_d=mysqli_query($con,"select sum(amount)  from deposit where group_id=$g_id ");
		$rd=mysqli_fetch_array($res_d);
		 ?>
		 
		 <div class="span7">   
			<div class="widget stacked widget-table action-table">
    				
				<div class="widget-header">
					<i class="icon-th-list"></i>
					<h3>Loan Details</h3>
					<h3>Total deposit:<?php echo $rd['sum(amount)'];?></h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<table class="table table-striped table-bordered">
					
						<thead>
							<tr>
								<th>NO:</th>
								<th>Name</th>
								<th>Date of applied</th>
								<th>Amount</th>
								<th>Repay date</th>
								<th>Amount to pay </th>
								<th></th>
							</tr>
						</thead>
						
						<?php
						 $result=mysqli_query($con,"select *  from loan where group_id=$g_id and status='approved' and allowed=1");
							
							/* selecting members list */
					$num=0;
					
                            while($row=mysqli_fetch_array($result))
                                  {
								 $uid=$row["user_id"];
								$loan_id=$row["l_id"];
						$result2=mysqli_query($con,"select f_name,l_name  from members where m_id=$uid and status=1");
									$row2=mysqli_fetch_array($result2);  
									  
									 $f=$row2["f_name"];
									 $l=$row2["l_name"];
									 $n=" ";
									 $name=$f.' '.$l;
									$num+=1;
									  
							   ?>
							   
							   <form action="" method="POST" name="my_form">
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
									
									
									
									
								</td><!-- Members details column ends-->
								<!-- date of applied column -->
								<td style="width:30px;">
								<div class="test1">
									 <?php echo $row["date_of_applied"];?>
								</div>
								

								</td><!-- date of applied column ends-->
								
							
								
								<!-- amount  column -->
								<td style="width:30px;">
								<div class="test1">
									 <?php echo $row["amount"];?>
								</div>
								</td><!-- amount column ends-->
								
								<!-- repay_date  column -->
								<td style="width:30px;">
								<div class="test1">
									 <?php echo $row["repay_date"];?>
								</div>
								</td><!-- repay_date column ends-->
								
								<!-- amount to pay  column -->
								<td style="width:30px;">
								<div class="test1">
									 <?php 
									 
									  $c_date=date("Y-m-d");
									 $rp_date=$row["repay_date"];
									 $tbl_days=$row["days"];
									
									 
									 $dif= strtotime($rp_date)-strtotime($c_date);
									
									$days = floor($dif / (60*60*24) );
									
									//echo abs($days);
									if($days>$tbl_days){
										
										 $p=$row["amount"];
										$r=3;
										 $t=abs($days)/360;
										$si=$p*$r*$t/100;
										$amt=floor($si+$p);
										echo $amt;
										
									}
									else{
										$amt=$row["amount"];
										echo $amt;
									}
									global $amt;
									 //echo $row["repay_date"];?>
								</div>
								</td><!-- amount to pay column ends-->
								
								<td class="td-actions">
								<?php $min=(40*$amt)/100 ?>
								<!-- calculating how much minimum 
								amount to pay when repaying loan amount-->
								
									
										<input  type="number"  name="<?php echo $num;?>"
									id="amt"
									min=<?php echo $min?>
									max=<?php echo $amt ?> id="memb_amt"  class="form-control" required /></td>
								</td>
							

								
							  </tr>
							 
							  <?php
								  }  
								  
								  ?>
						
							
								<!-- submit button-->
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td class="td-actions">
								
									<input type="submit" name="approve"   value="Repay" class="btn-success form-control" />
									</form>
									</td>
						</table>
					
				</div> <!-- /widget-content -->
			
			</div> <!-- /widget -->
            </div>
		 <?php
								  } //if checking close 
								 
								  else{?>
									 <div class="col-md-6 offset-3">
			<h3>No member Applied for loan</h3>
			
			</div>
			<?php
								  }
								  
	
   
   			if(isset($_POST["approve"]))
   {
	   $date=date("Y-m-d");	
	   $num=1;
	   $result_sub=mysqli_query($con,"select *  from loan where group_id=$g_id and status='approved'");
		while($row_sub=mysqli_fetch_array($result_sub))
		{
			 $loan_id=$row_sub["l_id"];
			$amt=$_POST["$num"];
			//inserting
			$sql_upd="insert into loan_repay(`loan_id`, `amount`, `date`)values('$loan_id','$amt','$date')";
	  $res=mysqli_query($con,$sql_upd);
			$num+=1;
			
			
				$repaydate=$row_sub["repay_date"];
	$date=date("Y-m-d");
    $d=date('Y-m-d', strtotime($repaydate. ' + 40 days'));
	
				//updating loan table
				$sql_updt_amt="update loan set amount=amount-'$amt',repay_date='$d',days='40' where l_id='$loan_id'";
				$res_updt=mysqli_query($con,$sql_updt_amt);
				//updating loan table CLOSE
				
				//updating loan_manage table
				$sql_updt_loan="update loan_manage set available_balnce=available_balnce+'$amt' where group_id='$g_id'";
				$res_updt_loan=mysqli_query($con,$sql_updt_loan);
				//updating loan_manage table
				
				//checking is there amount reaming
				$result_if=mysqli_query($con,"select amount  from loan where group_id=$g_id and l_id='$loan_id'");
				$row_check_amt=mysqli_fetch_array($result_if);
				
					if($row_check_amt["amount"]==0)
					{
						$sql_update="update loan set allowed='0' where l_id='$loan_id'";
						$res_update=mysqli_query($con,$sql_update);
						
					}
					
				
		}
                                 
	
	   
   }
								 ?>	
		 
		 
		</div>
		<!--div col-md-8 offset-2 close-->
							  
	</div><!--div row close-->
    
    
  
    
    
   
   
 <footer>
     <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> 
    </footer>





