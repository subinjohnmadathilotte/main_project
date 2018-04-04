<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="./css/bootstrap.css">
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
    
                <li class="current"><a href="#"><h2>Home</h2></a></li>
                  <li><a href="report.php"><h2>Daily report</h2> </a></li>
                   <li><a href="view_members.php"><h2>View members</h2></a></li>
                    <li><a href="add_member.php"><h3>Add members</h2></a></li>
                    <li><a href="signout.php"><h2>Log out</h2></a></li>
          </ul>
                    
 
  <br>
  </div>
        </div>
        
        
       
    </div>
 
    
    <div class="row">
       
        <div class="col-md-7 offset-1" style="height: auto;">
		 
		
	  		<?php
				
				      $result=mysqli_query($con,"select *  from group_tb where g_id=$g_id");
			   
		
					$num=0;
					
                            while($row=mysqli_fetch_array($result))
                                  { 
								  
								  ?>
            <div class="row" style="background-color: grey;">
		  <h1>Wellcome <b><?php echo $row["g_name"];  ?></b></h1> 
          <p>
		
			</div>
								<?php
								  }
								  ?>
								  
            <div  class="row" style="margin-top: 20px;">
			  <h3>Today's Agenda</h3>
			
			  	
			</div>
			
            <?php
				
				      $r=mysqli_query($con,"select *  from reports where g_id=$g_id");
					
                            while($ro=mysqli_fetch_array($r))
                                  { 
								  
								  ?>
                          <div class="row" style="margin-top: 20px;"> <h3> <?php echo $ro["agenda"];?> </h3></div>
								  <?php
								  }
								  ?>
            
			<div class="row" style="margin-top: 20px;">
			 <h3>Financial status</h3>
			 			<div class="row" style="margin-top: 20px;">

				<table border="1"> 
					<tr>
						<td class="td2_pad">Last Updated On</td>
						<td class="td2_pad"></td>
					</tr>
					<tr>
						<td class="td2_pad">Balance</td>
						<td class="td2_pad"></td>
					</tr>
				</table>
                                                </div>
		  
		</div>
		 
        </div>
    
    
   
 <footer>
        <p>© 2017<a style="color:#0a93a6; text-decoration:none;" href="#"> BootSnipp And TomGeek76</a>, All rights reserved 2016-2017.</p>
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



