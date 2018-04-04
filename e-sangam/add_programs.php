<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
   <!-- <script type="text/javascript" src="js/validation.js"></script>-->
    <link rel="stylesheet" href="./css/bootstrap.css">
	<link rel="stylesheet" href="./css/s.css">
	
	
	 <style>
 /* make sidebar nav vertical */ 
@media (min-width: 768px){
  .affix-content .container {
    width: 700px;
  }   

  html,body{
    background-color: #f8f8f8;
    height: 100%;
  
  }
    .affix-content .container .page-header{
    margin-top: 0;
  }
  .sidebar-nav{
        position:fixed; 
        
  }
  .affix-sidebar{
    padding-right:0; 
    font-size:small;
    padding-left: 0;
  }  
  .affix-row, .affix-container, .affix-content{
    height: 100%;
    margin-left: 0;
    margin-right: 0;    
  } 
  .affix-content{
    background-color:white; 
  } 
  .sidebar-nav .navbar .navbar-collapse {
    padding: 0;
    max-height: none;
  }
  .sidebar-nav .navbar{
    border-radius:0; 
    margin-bottom:0; 
    border:0;
  }
  .sidebar-nav .navbar ul {
    float: none;
    display: block;
  }
  .sidebar-nav .navbar li {
    float: none;
    display: block;
  }
  .sidebar-nav .navbar li a {
    padding-top: 12px;
    padding-bottom: 12px;
  }  
}

@media (min-width: 769px){
  .affix-content .container {
    width: 600px;
  }
    .affix-content .container .page-header{
    margin-top: 0;
  }  
}

@media (min-width: 992px){
  .affix-content .container {
  width: 900px;
  }
    .affix-content .container .page-header{
    margin-top: 0;
  }
}

@media (min-width: 1220px){
  .affix-row{
  
  }

  .affix-content{
   
  }

  .affix-content .container {
    width: 1000px;
  }

  .affix-content .container .page-header{
    margin-top: 0;
  }
  .affix-content{
    padding-right: 30px;
    padding-left: 30px;
  }  
  .affix-title{
    border-bottom: 1px solid #ecf0f1; 
    padding-bottom:10px;
  }
  .navbar-nav {
    margin: 0;
  }
  .navbar-collapse{
    padding: 0;
  }
  .sidebar-nav .navbar li a:hover {
    background-color: #428bca;
    color: white;
  }
  .sidebar-nav .navbar li a > .caret {
    margin-top: 8px;
  }  
}

.form-module .form {
    display: none;
    padding: 40px;
    background-color: #e9e9e9;
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
.active1{background-color:#BBDEFB;}
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
<?php
 include 'db_con.php';
  if(!isset($_SESSION["id"]))
	  
	  {
		  
		  header('location:./');
	  }
 
 
 $id=$_SESSION['id'];
 
$date=date("Y-m-d");
 
  if(isset($_POST["submit"]))
 {  

			$res_id=mysqli_query($con,"select max(p_id)  from programs");
            $row_ld=mysqli_fetch_array($res_id) ;	
			$id=$row_ld["max(p_id)"];
			 $new_id=$id+1;
		$p_name=$_POST["p_name"];
		$Details=$_POST["Details"];
		$date_e=$_POST["date_e"];
		$date_star=$_POST["date_star"];
		
//checking checkbox 
	 foreach($_POST['cb_list'] as $item)
	 {
						
		$sql="insert into programs (`p_id`, `p_name`, `details`, `district`, `start_d`, `end_d`, `date`)
		values('$new_id','$p_name','$Details',$item,'$date_star','$date_e','$date')";
		$s=mysqli_query($con,$sql);
      
					}//foreach close
	 
			echo"<script>alert('successfull')</script>";
			
 }
 ?>

    
</head>

<div class="container-fluid">
    
    
    
    
    <div class="row" style="size: 100%;">
        <div  style="width:40%; height: 150px; float: left;">
            <img src="images/logo.png"  >
            
        </div>
        <div style="width:60%; height: 150px;float: right;" >
                  
            
        <div class="container">
 
            <ul class="nav nav-tabs" style="margin-top: 35px;">
    
                <li class="current"><a href="admin.php"><h2>Home</h2></a></li>
                 <li><a href="group_reg.php"><h2>Add groups<h2></a></li>
                    <li><a href="signout.php"><h2>Log out</h2></a></li>
          </ul>
                    
 
  <br>
  </div>
        </div>
        
        
       
    </div>
 
    
    <div class="row">
				  
     
				<div class="row affix-row">
    <div class="col-sm-3 col-md-2 affix-sidebar">
		<div class="sidebar-nav">
  <div class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <span class="visible-xs navbar-brand">Sidebar menu</span>
    </div>
    <div class="navbar-collapse collapse sidebar-navbar-collapse">
      <ul class="nav navbar-nav" id="sidenav01">
        <li class="active">
          <a href="#" data-toggle="collapse" data-target="#toggleDemo0" data-parent="#sidenav01" class="collapsed">
          <h4>
          Control Panel
          <br>
         <!-- <small>IOSDSV <span class="caret"></span></small>-->
          </h4>
          </a>
         
        </li>
        <li>
		<a href="#" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
			Submenu 1 <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo" style="height: 0px;">
            <ul class="nav nav-list">
              <li ><a href="add_notification.php">Add notification</a></li>
              <li class="active1"><a href="add_programs.php">Add programs</a></li>
			  <li><a href="view_groups.php">View groups</a></li>
              <li><a href="#">Submenu1.3</a></li>
            </ul>
          </div>
        </li>
        <li >
          <a href="#" data-toggle="collapse" data-target="#toggleDemo2" data-parent="#sidenav01" class="collapsed">
         Submenu 2 <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo2" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="#">Submenu2.1</a></li>
              <li><a href="#">Submenu2.2</a></li>
              <li><a href="#">Submenu2.3</a></li>
            </ul>
          </div>
        </li>

      </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
	</div>
	
</div>

	<div class="col-md-7 offset-3" style="height:auto;">
<form action="" method="POST" name="my_form">
		<div class="row" style="margin-bottom:20px;">
			<div class="col-md-3 padd">
			<h2></h2> 
			</div>
			<div class="col-md-4 offset-1">
			<h2> Add Programs</h2> 
			</div>
		</div>
	
		<div class="row">
		<div class="col-md-3 padd">
			<h2> Program name</h2>  
		</div>
		<div class="col-md-4 offset-1">
			<input  type="text"  name="p_name" id="p_name" class=" form-control"   onchange="pname();" required /> 
		</div>
		</div>

		<div class="row">
		<div class="col-md-3 padd">
			<h2> Details</h2>  
		</div>
		<div class="col-md-4 offset-1">
			<textarea  name="Details" id="Details" class=" form-control"   required /></textarea> 
		</div>
		</div>
		
		<div class="row">
		<div class="col-md-3 padd">
			<h2> Starting date </h2>  
		</div>
		<div class="col-md-4 offset-1">
		<?php  $date=date("Y-m-d");	 ?>
			 <input  type="date"  name="date_star" max="2020-01-01" min="<?php echo $date ?>" class="form-control" required/>
		</div>
		</div>
		
		<div class="row">
		<div class="col-md-3 padd">
			<h2> End date </h2>  
		</div>
		<div class="col-md-4 offset-1">
		<?php  $date=date("Y-m-d");	 ?>
			 <input  type="date"  name="date_e" max="2020-01-01" min="<?php echo $date ?>" class="form-control" required/>
		</div>
		</div>
		
		<div class="row" style="margin-top:10px;">
		<div class="col-md-3 padd">
			<h2> Specify district</h2>  
		</div>
			<div class="col-md-4 offset-1" style="height:auto;">
			<table>
						<tr class="new-b">
                            
                            <th class="text-center">District </th>
                            <th class="text-center">Specify</th>
							
                        </tr>
						<tbody >
			<?php
                           $result=mysqli_query($con,"select *  from district");
							
							/* selecting district list */
						
					
                            while($row=mysqli_fetch_array($result))
                                  { ?>
									
									<tr><td>
									<h2> <?php echo $row['d_name']?></h2>
									</td><td>
									<input type="checkbox" name="cb_list[]" value="<?php echo $row["d_id"];?>" checked/>
									
									</td>
									</tr>
									<?php
									}
									?>
							</tbody>
					</table>
			</div>
		</div>
		
		<div class="row">
		<div class="col-md-3 padd">
			<h2> </h2>  
		</div>
		<div class="col-md-4 offset-1">
			 <input type ="submit" name="submit" id="submit" class="form-control btn-primary"/>
		</div>
		</div>
		
		
		
		<div class="row">
		<div class="col-md-3 padd">
			<h2> </h2>  
		</div>
		<div class="col-md-4 offset-1">
			 <input type ="submit" name="submit" id="submit" class="form-control btn-primary"/>
		</div>
		</div>

		
		 </form>
	</div>		
	  
    </div>
  
  <script>
		function pname(){
	
	 var val_pname= /^[A-Za-z]+$/;
	 $p_name= document.getElementById('p_name').value;
	
	 if(!val_pname.test($p_name)){
     
      alert("enter proper Name");
	   document.getElementById('p_name').value='';
	   $("#p_name").focus();
      return false;
    }
	
}
  </script>
    
    
   
   
 <footer>
     <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> 
    </footer>



