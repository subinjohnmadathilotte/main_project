<?php

include_once 'db_con.php';

if (isset($_POST['index3']))
	{
    $index = $_POST['index3'];
	 	if($index<0)
	  {
		  
	  }
	  
	  else{
		  
		  
	  
   	
	?>
	

						<?php
						
						
						 $q = mysqli_query($con, "SELECT * FROM group_tb where status=1 and ward='" . $index . "'");
			$roww = mysqli_fetch_array($q);
			if($roww['reg_no']==!null)
		  {
			  ?>
			  	<div class="col-md-12 " style="height: auto;margin-top:20px;">
<div class="span7">   
<div class="widget stacked widget-table action-table">
    				
				<div class="widget-header" >
					<i class="icon-th-list"></i>
					<h3>Group details</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Reg No</th>
								<th>Group Name</th>
								<th>No of members</th>
								<th>phone</th>
								<th>president</th>
								<th>secretary</th>
								<th></th>
							</tr>
						</thead>
			  <?php
			  //echo "ssssssss";
				$q = mysqli_query($con, "SELECT * FROM group_tb where status=1 and ward='" . $index . "'");
			   while ($row = mysqli_fetch_array($q)) 
			{
		
       // $str .= $row['ward_no'] . ",";
		$reg_no= $row['reg_no'];
		$g_name= $row['g_name'];
		$no_members= $row['no_members'];
		$phone= $row['phone'];
		$president= $row['president'];
		$secretary= $row['secretary'];
		 $gid=$row['g_id'];
		
    ?>		
						
						
						
						
						
						<tbody>
							<tr>
								<td><?php echo $reg_no; ?></td>
								<td><?php echo $g_name; ?></td>
								<td><?php echo $no_members; ?></td>
								<td><?php echo $phone; ?></td>
								
								
									<?php if($row['president']!=='will decide later')
									{
									$pr_id=$row['president'];
									$sql_pres="select * from members where g_id='$gid' and m_id='$president'";
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
								
								else
								{?>
									
									<td><?php echo $president ?></td>
									
								<?php
								}
								?>
								
								
								<?php if($row['secretary']!=='will decide later')
								{
									//echo $gid;
									//echo $secretary;
									$sec_id=$row['secretary'];
									$sql_sec="select * from members where g_id='$gid' and m_id='$secretary'";
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
								else
								{?>
									
									<td><?php echo $president ?> </td>
									
								<?php
								}
								?>
								
								
								
								<td class="td-actions">
								<form action="" method="post" name="my_form">
									<input type="hidden" name="id" value="<?php echo $row["g_id"]; ?>"/>
									<input type="submit" name="remove"  value="Remove" class="btn-success form-control" />
								</form>
								</td>
								
							</tr>
				
							<?php
				}
		  }
		  else
		  {
			  
			  echo "dd";
		  }
	  ?>
							</tbody>
						</table>
					
				</div> <!-- /widget-content -->
			
			</div> <!-- /widget -->
            </div>

</div>
	<?php

}
}
 
?>

