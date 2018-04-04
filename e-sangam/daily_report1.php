<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
    <link rel="stylesheet" href="./css/bootstrap.css">
	 <link rel="stylesheet" href="./css/s.css">
	<script type="text/javascript" src="js/validation_report.js"></script>
<?php
 include 'db_con.php';
  if(!isset($_SESSION["id"]))
	  
	  {
		  
		  header('location:./');
	  }
 
 
 echo $id=$_SESSION['id'];
 
 
 $id=$_SESSION['id'];
 $result=mysqli_query($con,"select `g_id` from group_tb where login_id='$id'"); 
 $row=mysqli_fetch_array($result);
 $g_id=$row["g_id"];
 //echo $g_id;
 
  if(isset($_POST["submit"]))
 {
	 $date=date("Y-m-d");
	  
	   
	    $res=mysqli_query($con,"select *  from members where g_id=$g_id and status='1'");
		  while($row=mysqli_fetch_array($res))
		  {
			  $mid=$row['m_id'];
			  //status=0 abscent 
		$sq="insert into `attendance`(`gr_id`, `member_id`,`date`,`status`)values('$g_id','$mid','$date','0')";
		$s1=mysqli_query($con,$sq);
		
		  }
		
	   
	   
	  //checking checkbox and updating the status
	 foreach($_POST['cb_list'] as $item)
	 {
		//updating status=1 for present 
		$sql="update attendance set status=1 where member_id=$item";
		$s=mysqli_query($con,$sql);
      
	}//foreach close
		
	 
	 
	 //inserting into report
			
			$next_loc=$_POST["next_loc"];
			$Next_date=$_POST["Next_date"];
			
			$res_loc=mysqli_query($con,"select max(next_location)  from reports where g_id=$g_id");
                      $row_loc=mysqli_fetch_array($res_loc) ;		
					  if($row_loc['max(next_location)']==!null){
						  
						  $Location1=$_POST["loc1"];
						  
						  $sql_report="INSERT INTO `reports` (`g_id`,`date`,`location`,`next_location`,`next_date`,`status`) 
			VALUES ('$g_id','$date','$Location1','$next_loc','$Next_date','pending')";
			
			$res_report=mysqli_query($con,$sql_report);
			echo"<script>alert('successfull')</script>";
					  }
					  else{
						  $Location=$_POST["loc"];
						  
						   $sql_report="INSERT INTO `reports` (`g_id`,`date`,`location`,`next_location`,`next_date`,`status`) 
			VALUES ('$g_id','$date','$Location','$next_loc','$Next_date','pending')";
			
			$res_report=mysqli_query($con,$sql_report);
			echo"<script>alert('successfull')</script>";
						  
					  }
					

			
			//header("location:./fine.php");
			//inserting into report ends
			
			//inserting to agenda table
			
			  $report_id=mysqli_query($con,"select max(r_id)  from reports where g_id=$g_id");
				$row_r_id=mysqli_fetch_array($report_id);
				$rid=$row_r_id["max(r_id)"];
				
				$num=1;
		 while ($num <=4){
			  
			  $ag=$_POST["$num"];
		  
			 
			$sql_agenda="INSERT INTO `report_agenda` (`report_id`,`g_id`,`agenda`,`date`) 
			VALUES ('$rid','$g_id','$ag','$Next_date')";
			$res_agenda=mysqli_query($con,$sql_agenda);
			$num+=1;
		  }//end of agenda table inserting
		  
		  //inserting to discuss table
			
			  
				
				$nm=10;
		 while ($nm <=13){
			  
			  $di=$_POST["$nm"];
		  
			 
			$sql_dis="INSERT INTO `discussed_items` (`report_id`,`g_id`,`discussed_items`,`date`) 
			VALUES ('$rid','$g_id','$di','$date')";
			$res_dis=mysqli_query($con,$sql_dis);
			$nm+=1;
		  }//inserting to discuss table end
		  echo"<script>alert('successful')</script>";
		  //header("location:./fine.php");
 }
 ?>


    <style>
		.asterisk_input:after {
content:" *"; 
color: red;
position: absolute; 
margin: 0px 0px 0px -20px; 
font-size: xx-large; 
padding: 0 5px 0 0;
 }

	.input_control{
	
	width:300px;}
	
.div_cont{
	
	margin-bottom:10px;

	height:auto;
	background-color:#ECEFF1;
	
}
/*          .form-module .form {
    display: none;
    padding: 40px;
    background-color: #e9e9e9;
}*/

.row_padding{
	
	margin-top:10px;
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

<div class="container-fluid">
    
    
    
    
    <div class="row" style="size: 100%;">
        <div  style="width:40%; height: 150px; float: left;">
            <img src="images/logo.png"  >
            
        </div>
        <div style="width:60%; height: 150px;float: right;" >
                  
            
        <div class="container">
 
           <ul class="nav nav-tabs" style="margin-top: 35px;">
    
                <li class="current"><a href="group.php"><h1>Home</h1></a></li>
                 
                   <li><a href="view_members1.php"><h1>View members</h1></a></li>
                    <li><a href="add_member1.php"><h1>Add members</h1></a></li>
					 <li><a href="fine.php"><h1>Fine</h1></a></li>
                    <li><a href="signout.php"><h1>Logout</h1></a></li>
          </ul>
                    
 
  <br>
  </div>
        </div>
        
        
       
    </div>
 <!---checking if any member there-->
			<?php
			 $result_if=mysqli_query($con,"select *  from members where g_id=$g_id and status=1");
              $row_if=mysqli_fetch_array($result_if);
			 	if($row_if['m_id']==!null){
					
					$date=date("Y-m-d");
					$date_check=mysqli_query($con,"select max(next_date)  from reports where g_id=$g_id");
                      $date_row=mysqli_fetch_array($date_check) ;
						$dd=$date_row['max(next_date)'];
							if($date_row['max(next_date)']<=$date ||$date_row['max(next_date)']==null)
								
							{
					
				
					
					?>  
    
    <div class="row">
	<form action="" method="POST" name="my_form">
		<!-- first div starts-->
      <div class="col-md-8 offset-2 div_cont">
	  	<div class="row offset-4 row_controls" >
		<div class="col-md-5 offset-3" >
		<h3 >MINUTES REPORT</h3>
		</div>
		</div>
		<div class="row offset-2 row_controls">
				<h3>
					<?php
				      $result=mysqli_query($con,"select g_name  from group_tb where g_id=$g_id");
                      $row=mysqli_fetch_array($result) ;		
					  echo $row["g_name"];  ?> 
				</h3>
		
							
								  
		</div>
			<div class="row offset-2 row_controls">
			 <h2>Reg no:</h2><h2><?php
				      $result=mysqli_query($con,"select reg_no  from group_tb where g_id=$g_id");
                      $row=mysqli_fetch_array($result) ;		
					  echo $row["reg_no"];  ?></h2>
			 </div>
	  </div><!-- first div close-->
	  
	  <!-- second div starts-->
	   <div class="col-md-8 offset-2 div_cont">
	   <div class="row">
		<div class="col-md-1  row_controls">
			<h1>Date:</h1>	
		</div>
		<div class="col-md-2 row_controls">
		
			<!-- taking next meeting date from report table-->
		<?php
				$res_date=mysqli_query($con,"select max(next_date)  from reports where g_id=$g_id");
                      $row_date=mysqli_fetch_array($res_date) ;	
							if($row_date['max(next_date)']==!null)
							{
					  
		?>
			<h1><?php echo $row_date['max(next_date)'];?></h1>	
		
		
							<?php }
							else{
								 $date=date("Y-m-d");	
								
								?>
								<h1><?php echo $date;?></h1>	
								
								<?php
							}
							?>
							</div> <!-- div CLOSE taking next meeting date from report table-->
							
		<div class="col-md-2  row_controls">
			<h1>Location:<h1>
			
		</div>
		<div class="col-md-2 row_controls">
		
		
		
		<!-- taking next meeting location-->
		<?php
		
					$res_d=mysqli_query($con,"select max(next_date)  from reports where g_id=$g_id");
                      $row_d=mysqli_fetch_array($res_d) ;
					  $nx_date=$row_d['max(next_date)'];
					  
					  
				$res_loc=mysqli_query($con,"select max(next_location)  from reports where g_id=$g_id and next_date='$nx_date'");
                      $row_loc=mysqli_fetch_array($res_loc) ;		
					  if($row_loc['max(next_location)']==!null){
						  
					  
		?>
		
			 <input type="text" class="form-control" name="loc1" id="loc1" value="<?php echo $row_loc["max(next_location)"]; ?>"   readonly />
			     
			 <?php 
					  }
					  
					  else{
						  ?>
						  <span class="asterisk_input">  </span> 
						 <input type="text" class="form-control" name="loc" id="loc"  onchange="locc()" />
						 <?php
					  }
			 ?>
			
		</div>
		</div>
		
		<div class="row">
	
			<div class="col-md-9 offset-1">
	

				<table class="table table-condensed table-bordered table-hover table-striped">
					<thead>
                        <tr class="thead-tr">
                            <th colspan="3" class="text-center" >Members Present</th>
                        </tr>
                        <tr class="new-b">
                            
                            <th class="text-center"> NO:</th>
                            <th class="text-center">Members</th>
							<th class="text-center" style="width:50px;">PRESENT </th>
                        </tr>

                    </thead>
					
                    <tbody style="text-align: center;" class="ui1">
					
                        <tr  class="danger">
						<?php
                           $result=mysqli_query($con,"select *  from members where g_id=$g_id and status='1'");
							
							/* selecting members list */
							$num=1;
					
                            while($row=mysqli_fetch_array($result))
                                  { 
							  /* printing members list */
									$f=$row["f_name"];
									 $l=$row["l_name"];
									 $n=" ";
									 $name=$f.' '.$l;
							
							  ?>
                            <td><?php echo $num; ?></td>
                            <td><?php echo ucfirst($name); ?></td>
							
							 <td>
							
									
							<input type="checkbox" name="cb_list[]" value="<?php echo $row["m_id"];?>" checked/>
							 </td>
                        </tr>
								  <?php
								   $num+=1;
								  }
								  
								  ?>
                        
                    </tbody>

                     
                </table>
				
				</div>
	   
			</div>
		
		
	  </div><!-- second div close-->
	  
	  <!-- third div starts-->
	  
      <div class="col-md-8 offset-2 div_cont">
		<div class="row offset-2 row_controls">
			<h3>Today's Agenda :<h3>	
		</div>
		<div class="row offset-2 row_controls">
					
					<ul>
					<?php
				
				      $rr=mysqli_query($con,"select *  from `report_agenda` where g_id=$g_id");
					  $row=mysqli_fetch_array($rr);
					if($row['agenda']==!null){
						
					while($row=mysqli_fetch_array($rr))
						{
						 
						  
							 ?>
							  <li><h2><?php echo $row['agenda']; ?></h2></li>
							  <?php
						}
					}
						 
						 else{
							
							 ?>
							 
							 <h2>No Agenda</h2>
							 <?php
						 }
                            
							?>
							</ul>
			 </div>
			 
	  </div><!-- third div close-->
	  
	   <!-- forth div starts-->
      <div class="col-md-8 offset-2 div_cont">
		<div class="row offset-2 row_controls">
			<h3>Discussed items :<h3>	
		</div>
		<div class="row offset-2 row_controls">
			<table>
				<tr>
				<span class="asterisk_input">  </span>
				<td>1</td>
				<td>
				
				<input type="text" class="form-control input_control input_control_mar" name="10"  required /></td>
				<td>2</td>
				
				<td>
				<span class="asterisk_input">  </span>
				<input type="text" class="form-control input_control input_control_mar" name="11" required /></td>
				</tr>
				
				<tr>
				<td>3</td><td><input type="text" class="form-control input_control input_control_mar" name="12"/></td>
				<td>4</td><td><input type="text" class="form-control input_control input_control_mar" name="13"/></td>
				</tr>
			</table>
			 </div>
	  </div><!-- forth' div close-->
	  
	  <!-- fifth div close-->
	   <div class="col-md-8 offset-2 div_cont">
		<div class="row offset-2 row_controls">
			<h3> Agenda for Next meeting:<h3>	
		</div>
		<div class="row offset-2 row_controls">
			<table>
				<tr>
				
				<td>1</td>
				<span class="asterisk_input">  </span>
				<td>
				
				<input type="text" class="form-control input_control input_control_mar" name="1" id="1" required/></td>
				<td>2</td>
				
				<td>
				<span class="asterisk_input">  </span>
				<input type="text" class="form-control input_control input_control_mar" name="2" required/></td>
				</tr>
				
				<tr>
				<td>3</td><td><input type="text" class="form-control input_control input_control_mar" name="3"/></td>
				<td>4</td><td><input type="text" class="form-control input_control input_control_mar" name="4"/></td>
				</tr>
			</table>
			 </div>
	  </div><!-- fifth div close-->
	  
	  
	  <!-- sixth div starts-->
      <div class="col-md-8 offset-2 div_cont">
		<div class="col-md-4  row_controls">
		
			<h2> Next Location </h2>
		</div>
		<div class="col-md-4 row_controls">
		<span class="asterisk_input">  </span>
			<input type="text" class="form-control" name="next_loc" required/>
		</div>
		
		<div class="col-md-4 row_controls">
			<h2> Next Meeting Date </h2>
		</div>
		<div class="col-md-4 row_controls">
		<span class="asterisk_input">  </span>
			<?php  $date=date("Y-m-d");	 ?>
			  <input  type="date"  name="Next_date" max="2025-01-01" min="<?php echo $date ?>" class="form-control" required/>
		</div>
		
	  </div><!-- sixth div close-->
	  
	  <div class="col-md-8 offset-2 div_cont" style="padding:0px;">
	    <input type ="submit" name="submit" id="submit" class="form-control btn-primary"/>
	  </div>
	   </form>
    </div><!-- row of full contents close-->
				<?php 
							}
							else
							{
								?>
												<div class="page-alerts col-md-8 offset-2" style="height:100px;">
    <div class="alert alert-success page-alert" id="alert-1">
        <a href="user_home.php">
		</a>
       <h1> <strong></strong>Minuts report only available after &nbsp<?php  echo $dd;?></h1>
    </div>
   
</div> 
						<?php		
							}
				
				}
				else{
					?>
					<div class="page-alerts col-md-8 offset-2" style="height:100px;">
    <div class="alert alert-success page-alert" id="alert-1">
        <a href="user_home.php">
		</a>
       <h1> <strong></strong>Members should be added first</h1>
    </div>
   
</div> <?php
				}?>
  
    
    
   
   
 <footer>
     <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> 
    </footer>

 <script>
 
	function locc(){
	
	 var val_loc= /^[A-Za-z]+$/;
	 $loc= document.getElementById('loc').value;
	
	 if(!val_loc.test($loc)){
     
      alert("enter proper location");
	   document.getElementById('loc').value='';
	   $("#loc").focus();
      return false;
    }
	
}


	function agenda(){
	
	 var val_Agenda= /^[A-Za-z]+$/;
	 $Agenda= document.getElementById('Agenda').value;
	
	 if(!val_Agenda.test($Agenda)){
     
      alert("enter proper location");
	   document.getElementById('Agenda').value='';
	   $("#Agenda").focus();
      return false;
    }
	
}
 </script>


