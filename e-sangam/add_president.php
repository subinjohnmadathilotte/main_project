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
 $result=mysqli_query($con,"select `g_id` from group_tb where login_id='$id'"); 
 $row=mysqli_fetch_array($result);
	$g_id=$row["g_id"];

 
  if(isset($_POST["submit"]))
 {
	  $pres=$_POST['pres'];
		$secr=$_POST['secr'];
	 
	 $sql="update group_tb set president='$pres',secretary='$secr' where g_id=$g_id";
	 $s=mysqli_query($con,$sql);
	 echo"<script>alert('successful')</script>";
	 
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
    
                <li class="current"><a href="group.php"><h1>Home</h1></a></li>
                  <li><a href="daily_report1.php"><h1>Daily report</h1> </a></li>
                   <li><a href="view_members1.php"><h1>View members</h1></a></li>
                    <li><a href="add_member1.php"><h1>Add members</h1></a></li>
					<li><a href="fine.php"><h1>Fine</h1></a></li>
                    <li><a href="signout.php"><h1>Logout</h1></a></li>
          </ul>
                    
 
  <br>
  </div>
        </div>
        
        
       
    </div>
 
    
    <div class="row">
		

			<div class="col-md-8 offset-2" style="background-color:grey;">
			
			<form height="auto" width="auto" action="#" method="POST" name="my_form">
			<div class="row offset-2" style="margin-top:10px;margin-bottom:20px;">
			<h3> Elect President And secretary</h3>
			</div>
		<!--block president -->
				
				<div class="col-md-2  padd">
				<h2> Select President</h2>
				</div>
					
						 <div class="col-md-3 padd">
						 <select class=" form-control" id="preferenceSelect" name="pres" class="preferenceSelect"  required >
						<?php  
					$res_pres=mysqli_query($con,"select *  from members where g_id=$g_id and status=1");
                              while ($row_pres = mysqli_fetch_array($res_pres)) {
                echo '<option value=' .$row_pres['m_id'] . '>' . ucfirst($row_pres['f_name']) . '</option>';
						}
						?>			   
						</select>
					</div>
					<!--block secretary -->
					<div class="col-md-2  padd">
				<h2> Select Secretary</h2>
				</div>
					
						 <div class="col-md-3 padd">
						 <select class=" form-control" id="preferenceSelect_s" name="secr" class="preferenceSelect"  required >
						<?php  
					$res_pres=mysqli_query($con,"select *  from members where g_id=$g_id and status=1");
                              while ($row_pres = mysqli_fetch_array($res_pres)) {
                echo '<option value=' .$row_pres['m_id'] . '>' . ucfirst($row_pres['f_name']) . '</option>';
						}
						?>			   
						</select>
					</div>
					<!--block secretary close -->
					
					<div class="col-md-6 offset-2" style="margin-top:20px;margin-bottom:20px;">
					<input type ="submit" name="submit" id="submit" class="btn btn-lg btn-success btn-block"/>
					</div>
					</form>
			</div>
			
			
		
	   
    </div>
  
  
   
    
   
   
 <footer>
     <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> 
    </footer>

<script>

$(document).ready(function() {
    $("#preferenceSelect").change(function() {
        // Get the selected value
        var selected = $("option:selected", $(this)).val();
		//alert(selected);
		var thisID = $(this).attr("id");
		//alert(thisID);
		
		 $("#preferenceSelect_s option").each(function() {
            $(this).show();
        });
		
		  $("#preferenceSelect_s").each(function() {
            if ($(this).attr("id") != thisID) {
                $("option[value='" + selected + "']", $(this)).hide();
            }
        });
 
    });
});

$(document).ready(function() {
    $("#preferenceSelect_s").change(function() {
        // Get the selected value
        var selected = $("option:selected", $(this)).val();
		//alert(selected);
		var thisID = $(this).attr("id");
		//alert(thisID);
		
		 $("#preferenceSelect option").each(function() {
            $(this).show();
        });
		
		  $("#preferenceSelect").each(function() {
            if ($(this).attr("id") != thisID) {
                $("option[value='" + selected + "']", $(this)).hide();
            }
        });
 
    });
});

</script>


