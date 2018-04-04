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
    
                <li class="current"><a href=""><h2>Home</h2></a></li>
                  
                   
                    <li><a href="signout.php"><h2>Log out</h2></a></li>
          </ul>
                    
 
  <br>
  </div>
        </div>
        
        
       
    </div>
 
    <!--first row div starts-->
    <div class="row" style="margin-bottom:20px;">
	<div class="col-md-8 offset-1">   
			<div class="widget stacked widget-table action-table">
    				
				<div class="widget-header">
					<i class="icon-th-list"></i>
					<h3>Group details</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Reg NO:</th>
								<th>Group Name</th>
								<th>Ward</th>
								<th>No Of members</th>
								<th>Phone</th>
								<th>President</th>
								<th>Secretary</th>
								
							</tr>
						</thead>
						<tbody>
						<?php
								$sel1="select p_id from ads where login_id='$id'";
								$result1=mysqli_query($con,$sel1);
								$row1=mysqli_fetch_array($result1);
								$pid=$row1['p_id'];
								
								$sel2="select * from group_tb";
								$result2=mysqli_query($con,$sel2);
								while($row2=mysqli_fetch_array($result2))
								{
									$Group_id=$row2['g_id']
									?>
									
									
									
									<tr>
								<td><?php echo $row2['reg_no']?></td>
								
								 <td>
									
									<?php 
									echo  '<a href="ads_details.php?Group_id=' . $Group_id . '">'.$row2['g_name'].'</a>';
									 ?>
								 </td>
								
								<td><?php echo $row2['ward']?></td>
								<td><?php echo $row2['no_members']?></td>
								<td><?php echo $row2['phone']?></td>
								
								<?php if($row2['president']!=='to_be'){
									$pr_id=$row2['president'];
									$sql_pres="select * from members where m_id='$pr_id'";
									$res_pres=mysqli_query($con,$sql_pres);
									while($row_pres=mysqli_fetch_array($res_pres)){
									$f=$row_pres["f_name"];
									 $l=$row_pres["l_name"];
									 $n=" ";
									 $name=$f.' '.$l;
									?>
									<td><?php echo $name?></td>
									<?php
									}
								}
								?>
								
								
								<?php if($row2['secretary']!=='to_be'){
									$sec_id=$row2['secretary'];
									$sql_sec="select * from members where m_id='$sec_id'";
									$res_sec=mysqli_query($con,$sql_sec);
									while($row_sec=mysqli_fetch_array($res_sec)){
									$f=$row_sec["f_name"];
									 $l=$row_sec["l_name"];
									 $n=" ";
									 $name_sec=$f.' '.$l;
									
									?>
									<td><?php echo $name_sec?></td>
									<?php
									}
								}
								?>
								
								
							</tr>
						
									<?php
								};
								?>
						
							
							
							</tbody>
						</table>
					
				</div> <!-- /widget-content -->
			
			</div> <!-- /widget -->
            </div> <!--  content div close-->
			</div>  <!--first row div close-->
			
			 <!--second row div starts-->
			<!--<div class="row" style="size: 100%;">
			<div class="col-md-8 offset-2" style="background-color:grey;"> 
			
			  <div class="col-md-2 offset-1 padd">
		  <h2> Select ward</h2>
		 </div> 
			
		    <div class="col-md-3 padd">
			    <select id="ward_select" class=" form-control" name="ward" value="ward" required>
					<option value="-1">select</option>
					<?php
					$q = mysqli_query($con, "SELECT w_id,ward_no FROM ward");
      

            while ($row = mysqli_fetch_array($q)) {
                echo '<option value=' . $row['w_id'] . '>' . $row['ward_no'] . '</option>';
            }
            ?>
					
					
					
				</select>
			</div>
			
			</div>	<!--  content div  close-->		
 <!--second row div close-->
		
			<!--</div>-->
  
    
    
   
   
 <footer>
     <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> 
    </footer>


<script src="js/jquery.js"></script>
    <script>
$(document).ready(function(e) {
	$("#ward_select").change(function(){
		
    
});
});
    </script>

