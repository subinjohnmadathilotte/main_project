<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/s.css">
	
    <link rel="stylesheet" href="./css/bootstrap.css">
	
	
	
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
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
 
 //selecting date
		$r1=mysqli_query($con,"select max(date)  from reports where g_id=$g_id");
        $r_date11=mysqli_fetch_array($r1);
		$d3=$r_date11["max(date)"];
 
 if(isset($_POST["submit"]))
   {
	
		 $num=1;
		
		 
		  $r_date2=mysqli_query($con,"select max(date)  from attendance where gr_id='$g_id'");
		$row_date2=mysqli_fetch_array($r_date2);
		$at_date2=$row_date2['max(date)'];
	   
		$rs2=mysqli_query($con,"select member_id  from attendance where gr_id=$g_id and date='$at_date2' and status='0'");
		while($rrw2=mysqli_fetch_array($rs2))
		{
		
		$at_mid2=$rrw2['member_id'];
								
		$rs3=mysqli_query($con,"select *  from members where g_id=$g_id and m_id='$at_mid2'");
		while($rrw3=mysqli_fetch_array($rs3))
								
								{
						
			   	 $memb_amt=$_POST["$num"];
			    $sql="insert into `fine_tb`(`g_id`, `m_id`, `amount`,`fine_date`)values('$g_id','$at_mid2','$memb_amt','$d3')";
				$s=mysqli_query($con,$sql);
				  
				  $sql_up="update attendance set fined='yes' where member_id='$at_mid2'";
					$s_up=mysqli_query($con,$sql_up);
	
			  $num+=1;
								}
		}
		  //while loop ends
		 // header("location:./attendance.php");
		 
		 echo"<script>alert('fine added')</script>";
   }

?>

    <style>
	
	.block_div{
	padding-left:10px;
	
}
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
                    <li><a href="add_member1.php"><h1>Add members</h1></a></li>
					
                    <li><a href="signout.php"><h1>Logout</h1></a></li>
          </ul>
                    
 
  <br>
  </div>
  
  
  
        </div>
        
        
       
    </div>
 
    
    <div class="row">
       
	   <!--	 check whether any absentee is there-->
		 
	   <?php
	   $r_date=mysqli_query($con,"select max(date)  from attendance where gr_id='$g_id'");
	   $row_date=mysqli_fetch_array($r_date);
	   $at_date=$row_date['max(date)'];
	   
	    $rs=mysqli_query($con,"select member_id  from attendance where gr_id=$g_id and date='$at_date' and status='0' and fined='no'");
		
	   $rrw=mysqli_fetch_array($rs);
	   	if($rrw['member_id']==!null){
			
			
		
	   ?>
		
		
		 <div class="col-md-6 offset-3" style="height: auto;background-color:lightgray;">
		 <!--	 table starts-->
		 
		 
		 <div class="span7">   
			<div class="widget stacked widget-table action-table">
    				
				<div class="widget-header">
					<i class="icon-th-list"></i>
					<!-- Taking last da meeting date -->
					<?php
						 $res=mysqli_query($con,"select max(date)  from attendance where gr_id=$g_id");
                            $r_date=mysqli_fetch_array($res);
							$d=$r_date["max(date)"];
                            ?>
					<h3>Absentees List</h3><h3><?php echo $d;?></h3>
					<!-- Taking last da meeting date close -->
					
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<table class="table table-striped table-bordered">
					
						<thead>
							<tr>
								<th>NO:</th>
								<th>Members</th>
								
								<th>Fine Amount</th>
								
							</tr>
						</thead>
						  <form action="" method="POST" name="my_form">
						<?php
						
							
							/* selecting absentees list */
							$num=1;
							
							$r_date1=mysqli_query($con,"select max(date)  from attendance where gr_id='$g_id'");
							$row_date1=mysqli_fetch_array($r_date1);
							$at_date=$row_date1['max(date)'];
	   
								$rs1=mysqli_query($con,"select member_id  from attendance where gr_id=$g_id and date='$at_date' and status='0'");
								while($rrw1=mysqli_fetch_array($rs1))
								{
								$at_mid=$rrw1['member_id'];
								
								$rs2=mysqli_query($con,"select *  from members where g_id=$g_id and m_id='$at_mid'");
								while($rrw2=mysqli_fetch_array($rs2))
								
                                  { 
							  /* printing members list */
									 $f=$rrw2["f_name"];
									 $l=$rrw2["l_name"];
									 $n=" ";
									 $name=$f.' '.$l;
						
							  ?>
							  
							
							  <tr>
								<td><?php echo $num;?></td>
								<td><?php echo ucfirst($name);?></td>
								
								<td class="td-actions">
									<input  type="number"  name="<?php echo $num;?>" min="10" max="10" id="memb_amt" required class="form-control"  >
								</td>
								
								
								
								<!--<td class="td-actions">
									<!--hidden field represent members id
									<input type="hidden" name="hidden_id" value="<?php echo $row["m_id"];?>"/>
									<input type="submit" name="submit"  id="submit"  value="Add" class="btn-success form-control" />
								</td>-->
							
								
							</tr><!--heading row close here -->
							
														
							
							<?php
							  $num+=1;
								  }
								  
								  /* while loop printing members list closing */
								}
								  ?>
							
							<tr>
								<td></td>
								
								<td><h2> Total</h3></td>
								<td class="td-actions">
									<input  type="number"  name="total"  id="total"  class="form-control" readonly />
								</td>
								
								<td class="td-actions">
									<!--hidden field represent members id-->
									<!--<input type="hidden" name="hidden_id" value="<?php echo $row["m_id"];?>"/>-->
									<input type="submit" name="submit"  id="submit"  value="Add" class="btn-success form-control" />
								</td>
							</tr>
						<tbody><!-- table contents -->
							
							</tbody>
							
						</table>
					</form>
				</div> <!-- /widget-content -->
			
			</div> <!-- /widget -->
            </div>
		 
		 </div><!--	 table div ends-->
		
		<?php
		
		
		}
		//if close
		else
			
		{
			
			 $r8=mysqli_query($con,"select max(date)  from reports where g_id=$g_id");
                            $r_date1=mysqli_fetch_array($r8);
							$d2=$r_date1["max(date)"];?>
			<div class="page-alerts col-md-8 offset-2" style="height:100px;">
    <div class="alert alert-success page-alert" id="alert-1">
        <a href="user_home.php">
		</a>
       <h1> <strong></strong>No one to fine</h1>
    </div>
   
</div> 
			<?php
		}
		?>
		
		</div>
    
    
   
 <footer>
     <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> 
    </footer>


<script src="js/jquery.js"></script>
    <script>
$(document).ready(function(e) {
	$("input").change(function(){
		var sum =0;
    
    $("input[id=memb_amt]").each(function(){
		
        sum += parseInt($(this).val()) || 0;
    });
	
    $("input[name=total]").val(sum);
	});
});
    </script>

