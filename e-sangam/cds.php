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
 

 
  if(isset($_POST["submit"]))
 {
	 

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
                  
                    <li><a href=""><h2>Add members</h2></a></li>
                    <li><a href="signout.php"><h2>Log out</h2></a></li>
          </ul>
                    
 
  <br>
  </div>
        </div>
        
        
       
    </div>
 
    
   
				  
     
		 <!--content div starts-->
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
								<th>Panchayath</th>
								
								<th>Phone</th>
								<th>President</th>
								<th>Secretary</th>
								
							</tr>
						</thead>
						<tbody>
						<?php
								$sel1="select dis_id from cds where login_id='$id'";
								$result1=mysqli_query($con,$sel1);
								$row1=mysqli_fetch_array($result1);
								$dis_id=$row1['dis_id'];
								
								$sel2="select * from group_tb where district='$dis_id'";
								$result2=mysqli_query($con,$sel2);
								while($row2=mysqli_fetch_array($result2)){
									?>
									
									
									<tr>
								<td><?php echo $row2['reg_no']?></td>
								<td><?php echo $row2['g_name']?></td>
								<td><?php echo $row2['ward']?></td>
								
								
								<?php 
								$panchayath=$row2['panchayath'];
								$sql_panch="select name from panchayath where p_id='$panchayath'";
									$res_panch=mysqli_query($con,$sql_panch);
									while($row_panch=mysqli_fetch_array($res_panch)){
										?>
										<td><?php echo $row_panch['name']?></td>
										<?php
									}?>
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
			</div><!--content div close-->
				
	   
  
  
  
    
    
   
   
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



