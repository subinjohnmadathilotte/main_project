<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="./css/bootstrap.css">
    
    <style>
/*          .form-module .form {
    display: none;
    padding: 40px;
    background-color: #e9e9e9;
}*/

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


if(isset($_POST['submit']))
{
$u_name=$_POST['u_name'];	
$password=$_POST['password'];

$sql="SELECT * FROM login_tb,login_groups WHERE login_tb.type=login_groups.id and username='$u_name' and pass='$password' and status='1'" ;

$result=mysqli_query($con,$sql) or die(mysqli_error($con));

 $ary = mysqli_fetch_array($result);
 
 $_SESSION['id']=$ary["login_id"];
 
 if(mysqli_num_rows($result)==1){
	 $loc=$ary['page'];
	header("location:./$loc");
 }
 else
 ?>	
 <script>
 alert("incorrect password or id");
 </script>
<?php
}
?>

<div class="container-fluid">
    
    
    
    
    <div class="row" style="size: 100%;">
        <div  style="width:40%; height: 150px; float: left;">
            <img src="images/logo.png"  >
            
        </div>
        <div style="width:60%; height: 150px;float: right;" >
                  
            
        <div class="container">
 
            <ul class="nav nav-tabs" style="margin-top: 35px;">
    
<!--                    <li><a href="group_reg.php"><h2>Group registration<h2></a></li>-->
                    <li><a href="auditor_reg.php"><h2>Auditor registration<h2></a></li>
                     <li><a href="auditor_reg.php"><h2>Gallery<h2></a></li>
                    
  </ul>
  <br>
  </div>
        </div>
        
        
       
    </div>
 
    
    <div class="row">
        <div class="col-md-8" >
            <div class="jumbotron" style="background-color: white;">
    <h2>Hello, world!</h2>
	<p>Kudumbashree is the women empowerment and poverty eradication program,
            framed and enforced by the State Poverty Eradication Mission (SPEM) of the Government of Kerala.
            The Mission aims to eradicate absolute poverty within a
            definite time frame of 10 years under the leadership of Local Self Governments
            formed and empowered by the 73rd and 74th Amendments of the Constitution of India.
            The Mission launched by the State Government with the active support of Government of
            India and NABARD has adopted a different methodology in addressing poverty by 
            organizing the poor in to community-based organizations.
            The Mission follows a process approach rather than a project approach. 
            The mission was officially inaugurated by the then Prime Minister 
            Atal Bihari Vajpayee in 1998 as requested by the State Government</p>
	<p><a href="#" class="btn btn-primary btn-lg" role="button">Learn more »</a></p>
</div>
        </div>
        <div class="col-md-4" >
            
	<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Please sign in</h3>
			 	</div>
			  	<div class="panel-body">
                                    <form accept-charset="UTF-8" role="form" method="POST">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="E-mail" name="u_name" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
			    	    	</label>
			    	    </div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="Login">
			    	</fieldset>
			      	</form>
			    </div>
			</div>

<!--
<div class="module form-module">
  <div class="toggle">
    
  </div>
  <div class="form">
    <h2>Login to your account</h2>
    <form name="form1"  method="post">
      <input type="text" style="margin-bottom:10px;" name="u_name" class="form-control" placeholder="Username" />
      <input type="password" name="password" class="form-control" placeholder="Password" />
      <input type="submit" style="margin-top:10px;" class="btn btn-primary" name="submit" value="SUBMIT"/>
	  <br/>
	<a href="forgot_pass.php">Forgot password?</a>
    </form>
  </div>
		
		<div class="sidebar">
          
        </div>close sidebar  		
        <div class="sidebar">
          <div class="sidebar_item">
            <h2>Contact</h2>
            <p>Phone: 8848782249</p>
            <p>Email: <a href="">kudumbashree1@gmail.com</a></p>
          </div>close sidebar_item 
        </div>close sidebar
       </div>close sidebar_container-->
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


