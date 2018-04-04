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
	  <link href="css/bootstrap.min.css" rel="stylesheet">

   
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
	   $total=$_POST['total'];	
	
	 $date=date("Y-m-d");	
	
		 $num=1;
		 
		  $result1=mysqli_query($con,"select *  from members where g_id=$g_id and status='1'");
		  while($row=mysqli_fetch_array($result1))
		  {
		
				$mid= $row["m_id"];
			 
			   	$memb_amt=$_POST["$num"];
				 

				$num+=1;
			    $sql="insert into `deposit`(`group_id`, `mem_id`, `amount`,`date`)values('$g_id','$mid','$memb_amt','$date')";
				$s=mysqli_query($con,$sql);
				  
	
			  
		  }//while loop ends
		  echo"<script>alert('successful')</script>";
	
	
	
	//checking whether total deposit of group already saved
		 $total_check=mysqli_query($con, "SELECT group_id FROM `loan_manage`");
			 $row_total_check=mysqli_fetch_array($total_check);
				if($row_total_check['group_id']==$g_id)
				{
					
				$sql_up_total="update loan_manage set available_balnce=available_balnce+'$total' where group_id ='$g_id'";
				$r_up_total=mysqli_query($con,$sql_up_total);
				}
				else
				{
					
					$sql_insert_total="insert into loan_manage(group_id,available_balnce)
					value('$g_id','$total')";
					$s_total=mysqli_query($con,$sql_insert_total);
				}
			
		 
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
.show-on-hover:hover > ul.dropdown-menu {
    display: block;    
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
                  
            
 
            <ul class="nav nav-tabs" style="margin-top: 35px;">
    
                <li class="current"><a href="#"><h1>Home</h1></a></li>
					    <div class="btn-group show-on-hover">
          <button type="button" class="btn btn-default"
		  style="color:#0275d8;" data-toggle="dropdown">
           <h1> menu</h1>
          </button>
          <ul class="dropdown-menu" role="menu">
            
            <li id="dr"><a href="daily_report1.php"><h1>Daily report</h1> </a></li>
			<li id="ls"><a href="approve_loan.php"><h1>View Loan seekers</h1> </a></li>
            <li id="vm"><a href="view_members1.php"><h1>View members</h1></a></li>
           <li><a href="add_member1.php"><h1>Add members</h1></a></li>
		   <li id="fn"><a href="fine.php"><h1>Fine</h1></a></li>
		    <li id="lr"><a href="loan_repay.php"><h1>Loan Repay</h1></a></li>
		    <li><a href="signout.php"><h1>Logout</h1></a></li>
            
          </ul>
        </div>
							
	
                
          </ul>
                    
 
  <br>

  
  
  
        </div>
        
        
       
    </div>
 <?php
 $res_check=mysqli_query($con,"select *  from members where g_id=$g_id");
 $row_check=mysqli_fetch_array($res_check);
 if($row_check['m_id']==!null){
 ?>
 
   <!--main DIV starts--> 
    <div class="row">
       
        <div class="col-md-3" style="height: auto;">
			
					<?php
				
				      $result=mysqli_query($con,"select g_name  from group_tb where g_id=$g_id");
                            $row=mysqli_fetch_array($result);
                                 
								  
								  ?>
									<div class="row" style="margin-bottom:10px;background-color:#E8EAF6">
									<h3 class="block_div">Wellcome <b><?php echo $row["g_name"];  ?></b></h3> 
									<p>
		
									</div>
							<?php		
								
							//checking whether any deposit made	  
				$res=mysqli_query($con,"select sum(amount)  from deposit where group_id=$g_id");
				$rww=mysqli_fetch_array($res);
                         if($rww["sum(amount)"]==!null)
						 {         
				  
								 ?>
								  <!--deposit block-->

						<div class="row" style="margin-top:10px;background-color:#E8EAF6"> 
						<h2 class="block_div">Total Deposit</h2>
						</div>
						  
						  <div class="row" style="margin-bottom:10px;background-color:#E8EAF6">
						  <h3 class="block_div">
						  <?php
						  	
                                  
									  echo $rww["sum(amount)"];
									  
								  
						  ?>
						  
						  </h3>
						  </div><!--deposit block ends-->
						  
						  
						  <!--update block-->
						  <div class="row" style="margin-top:10px;background-color:#E0F7FA"> 
						<h2 class="block_div">Last Updated On</h2>
						</div>
						  
						  <div class="row" style="margin-bottom:10px;background-color:#E0F7FA">
						  <h3 class="block_div">
						  <?php
						  	$res=mysqli_query($con,"select max(date)  from deposit where group_id=$g_id");
								while($rww=mysqli_fetch_array($res))
                                  {
									  echo $rww["max(date)"];
									  
								  }
						  ?>
						  
						  </h3>
						  </div><!--update block ends-->
							<?php
						 }//checking whether any deposit made	CLOSE
						 else{
							 ?>
							 
						<div class="row" style="margin-top:10px;background-color:#E8EAF6"> 
						<h2 class="block_div">No deposit made</h2>
						</div>
							 
							 <?php
						 }
							?>
		 </div>
        <!--	 side menu div close-->
		<!--	 table div-->
		
		 <div class="col-md-8" style="height: auto;background-color:lightgray;margin-left:20px;">
		 <!--	 table starts-->
		 
		 
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
								<th>Members</th>
								<th>balance</th>
								<th>Amount </th>
								<th> </th>
							</tr>
						</thead>
						  <form action="" method="POST" name="my_form">
						<?php
						 $result=mysqli_query($con,"select *  from members where g_id=$g_id and status='1'");
							
							/* selecting members list */
					$num=1;
					
                            while($row=mysqli_fetch_array($result))
                                  { 
							  /* printing members list */
							  
								
								$id=$row["m_id"];
								  
									 $f=$row["f_name"];
									 $l=$row["l_name"];
									 $n=" ";
									 $name=$f.' '.$l;
							  ?>
							  
							
							  <tr>
								<td><?php echo $num;?></td>
								<td><?php echo ucfirst($name);?></td>
								<?php
								/* selecting balance amount of each member from deposit table*/
								$result1=mysqli_query($con,"select sum(amount)  from deposit where mem_id=$id");
								while($rw=mysqli_fetch_array($result1))
                                  {
									  /* printing each members balance */
									  
								?>
								
									<td><input type="text" name="balance"  id="balance" value="<?php echo $rw["sum(amount)"];?>" class="form-control" readonly/></td>
									<?php
								  }
								  /* balance printing while loop closing */
								  
								  ?>
								<td class="td-actions">
									<input  type="number"  name="<?php echo $num;?>"  id="memb_amt" min="0" max="100" required class="form-control"  >
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
								  
								  ?>
							
							<tr>
								<td></td>
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
		
		</div><!--main DIV starts--> 
    <?php
 }
 else{
	 echo "<script>
	 $(document).ready(function(){
	$('#ls').hide();
	$('#dr').hide();
	$('#vm').hide();
	$('#fn').hide();
	$('#lr').hide();
	
	
})
	 </script>";
	 
		?>	<div class="page-alerts col-md-8 offset-2" style="height:100px;">
    <div class="alert alert-success page-alert" id="alert-1">
        <a href="user_home.php">
		</a>
       <h1> <strong></strong>Members should be added first</h1>
    </div>
   
</div> 
 <?php
 }
 ?>
 
    
   
 <footer>
     <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> 
    </footer>

<script>
    
    $(document).ready(function(){
    $('.modal-footer button').click(function(){
		var button = $(this);

		if ( button.attr("data-dismiss") != "modal" ){
			var inputs = $('form input');
			var title = $('.modal-title');
			var progress = $('.progress');
			var progressBar = $('.progress-bar');

			inputs.attr("disabled", "disabled");

			button.hide();

			progress.show();

			progressBar.animate({width : "100%"}, 100);

			progress.delay(1000)
					.fadeOut(600);

			button.text("Close")
					.removeClass("btn-primary")
					.addClass("btn-success")
    				.blur()
					.delay(1600)
					.fadeIn(function(){
						title.text("Log in is successful");
						button.attr("data-dismiss", "modal");
					});
		}
	});

	$('#myModal').on('hidden.bs.modal', function (e) {
		var inputs = $('form input');
		var title = $('.modal-title');
		var progressBar = $('.progress-bar');
		var button = $('.modal-footer button');

		inputs.removeAttr("disabled");

		title.text("Log in");

		progressBar.css({ "width" : "0%" });

		button.removeClass("btn-success")
				.addClass("btn-primary")
				.text("Ok")
				.removeAttr("data-dismiss");
                
	});
});
   
    </script>

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

