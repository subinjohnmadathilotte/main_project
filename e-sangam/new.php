<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="./css/bootstrap.css">
    
    <style>
        
        
        <?php
 include 'db_con.php';
 
  if(isset($_POST["submit"]))
 {
	 
 $fname=$_POST["f_name"];
 $lname=$_POST["l_name"];
 
  $dob=$_POST["dob"];
  
  $gender=$_POST["gender"];
  
 $h_name=$_POST["h_name"];

 
  $pin=$_POST["pin"];
  
 $phone_no=$_POST["ph_no"];

 $email=$_POST["email"];

 $district=$_POST["district"];

 $password=$_POST["password"];
  

                  $picfile= "photo/".time()."".htmlspecialchars($_FILES['photo']['name']);
                  move_uploaded_file($_FILES['photo']['tmp_name'], $picfile);
			
/* status=1 for active user and  status=0 for deleted user
     type=2 group */ 
 
			$sqll="INSERT INTO `login_tb` (`username`, `pass`, `status`,`type`) VALUES ('$email','$password','1','2')";
			$result2=mysqli_query($con,$sqll);
			
				echo"<script>alert('successful')</script>";
				
			 $result1=mysqli_query($con, "SELECT max(login_id) FROM `login_tb`");
			 $row=mysqli_fetch_array($result1);
			 //var_dump($row);
			 $login_id=$row["max(login_id)"];
			 //echo $login_id;
   
		
  $sql="INSERT INTO `auditor`( `aud_f_name`, `aud_l_name`, `dob`, `house_name`,`pin`, `gender`, `district`,`photo`,`email`,`phone_no`,`login_id`) VALUES ('$fname','$lname','$dob','$h_name','$pin','$gender','$district','$picfile','$email','$phone_no','$login_id')";
  $result=mysqli_query($con,$sql);
  
  echo"<script>alert('successful')</script>";
 

		
  
 }
 ?>
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
    
<!--                    <li><a href="group_reg.php"><h2>Group registration<h2></a></li>-->
                    <li><a href="auditor_reg.php"><h2>Auditor registration<h2></a></li>
                     <li><a href="auditor_reg.php"><h2>Gallery<h2></a></li>
                    
  </ul>
  <br>
  </div>
        </div>
        
        
       
    </div>
 
    
    <div class="row">
       
        <div class="col-md-8 offset-4">
		   <form class="f" height="700px" action="#" method="POST" name="my_form" enctype='multipart/form-data'>
		  
		<table>
		
		<tr>
		    <td class="td_pad"></td>
			<td><h3>Auditor registration</h3></td>
		</tr>
		
		<tr>
		    <td class="td_pad">First name</td><td class="td2_pad">
			<input  type="text"  name="f_name" class="text_input form-control" required ></td>
		</tr>
		
				<tr>
		    <td class="td_pad">Last name</td><td class="td2_pad">
			<input  type="text"  name="l_name" class="text_input form-control" required ></td>
		</tr>
		
			

		
		<tr>
		    <td class="td_pad">Date of birth  </td><td class="td2_pad">
			<input type="date" value="1995-01-01"  name="dob" class="text_input form-control" required ></td>
		</tr>

		<tr>
		    <td class="td_pad">House name</td><td class="td2_pad">
			<input  type="text"  name="h_name" class="text_input form-control" required ></td>
		</tr>
		
		<tr>
		    <td class="td_pad">Pin</td><td class="td2_pad">
			<input  type="text"  name="pin" class="text_input form-control" required ></td>
		</tr>
		
		   <tr>
        <td class="td_pad">Gender</td>
        <td class="td2_pad ">
		<select name="gender" class="form-control" >
		<option>male
		</option>
		<option>female
		</option>
		</select>
		
		</td>
		
           </tr>
		   
        <tr>
		    <td class="td_pad">District  </td>
			<td class="td2_pad">
			<select class="text_input form-control" name="district">
			
					  <?php
					$q = mysqli_query($con, "SELECT d_id,d_name FROM district");
					//var_dump($q);

					while ($row = mysqli_fetch_array($q)) {
					echo '<option value=' . $row['d_id'] . '>' . $row['d_name'] . '</option>';
					}
					?>
					
				</select>
			</td></tr>
			
			 <tr>
	    <td class="td_pad">Upload photo</td>
		<td class="td2_pad"><input type="file" name="photo" id="photo" class="text form-control" required></td>
	</tr>
			
			
		<tr>
		    <td class="td_pad">phone no  </td><td class="td2_pad">
			<input  type="text"  name="ph_no" class="text_input form-control" required ></td>
			</tr>

			<tr>
		    <td class="td_pad">Email  </td><td class="td2_pad">
			<input  type="text"  name="email" class="text_input form-control" required ></td>
			</tr>
			
			<tr>
		    <td class="td_pad">Password  </td><td class="td2_pad">
			<input  type="text"  name="password" class="text_input form-control" required ></td></tr>
			
			<tr>
		    <td class="td_pad">confirm password  </td><td class="td2_pad">
			<input  type="text"  name="c_password" class="text_input form-control" required ></td></tr>
			
		<tr><td></td>
		<td class="td2_pad">
					<input type ="submit" name="submit" id="submit" class="btn btn-danger"></td>
        </tr>

		</table>
		  </form>
		
	  
		  
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




