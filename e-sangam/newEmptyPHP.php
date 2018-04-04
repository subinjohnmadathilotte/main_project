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
		  <form class="f" height="500px" action="#" method="POST" name="my_form" enctype='multipart/form-data' onsubmit="return validate();" enctype='multipart/form-data'>

		<table>
		
		<tr>
		    <td class="td_pad"></td>
			<td><h3>Add Groups</h3></td>
		</tr>
		
		<tr>
		    <td class="td_pad">Registration No</td><td class="td2_pad">
			<input  type="number"  name="reg_no" class="text_input form-control"  required ></td>
		</tr>
		
		<tr>
		    <td class="td_pad">Group Name  </td><td class="td2_pad">
			<input  type="text"  name="group_name" class="text_input form-control" required ></td>
		</tr>
			
        <tr>
		    <td class="td_pad">District  </td>
			<td class="td2_pad">
			<select class="text_input form-control" id="district_select" name="district" >
			
					
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
		    <td class="td_pad">panchayath  </td>
			<td class="td2_pad">
			
		    
			    <select id="panchayath_select" class="text_input form-control" name="panchayath" value="panchayath" required>
					
					<option value="-1">select</option>
					
				</select>
			</td>
			</tr>
			
			<tr>
		    <td class="td_pad">Ward no  </td>
			<td class="td2_pad">
				<select id="ward_select" class="text_input form-control" name="ward" required>

						   
						<option value="-1">select</option>
					
									   
				</select>
			</td>
			</tr>
			
			<tr>
		    <td class="td_pad">No of members  </td><td class="td2_pad">
			<input  type="text"  name="no_members" class="text_input form-control" required ></td>
			</tr>
			
			 <tr>
	        <td class="td_pad">Upload File</td>
	 	    <td class="td2_pad"><input type="file" name="files" id="files" class="text form-control" required></td>
	      </tr>
		  
		  

			<tr>
		    <td class="td_pad">Email  </td><td class="td2_pad">
			<input  type="email"  name="Email" class="text_input form-control"  ></td>
			</tr>
			
			<tr>
		    <td class="td_pad">Contact No  </td><td class="td2_pad">
			<input  type="tel"  name="phone" class="text_input form-control"  ></td>
			</tr>
			
			
			
		<tr><td></td><td class="td2_pad"><input type ="submit" name="submit" id="submit" class="btn btn-success"></td>
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



