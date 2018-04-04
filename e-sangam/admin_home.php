<!DOCTYPE html> 
<html>
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

 .div_admin_tasks{
	 margin-top:10;
	float: left;
  margin: 20px 0 0 10px;
  width: 300px;
  border:solid;
   height:370px; 
	 
 } 
 
 .dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>

<head>
  <title>Free HTML5 Templates</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
</head>

<body> 
  <div id="main">		

    <header>
	  <div id="strapline">
	    <div id="welcome_slogan">
	      <img width="940" height="100" src="images\logo.png">
	    </div><!--close welcome_slogan-->
      </div><!--close strapline-->	  
	  <nav>
	    <div id="menubar">
          
           <div class="dropdown"><a href="signout.php"><button  class="dropbtn">Home</button></a></div>
            
            
         
			
				<div class="dropdown">
			    <button class="dropbtn">Group Related</button>
				<div class="dropdown-content">
				<a href="">Daily report</a>
				<a href="view_members.php">View Members</a>
				<a href="group_reg.php">Add Groups</a>
				</div>
				</div>
				 <div class="dropdown"><a href="signout.php"><button  class="dropbtn">Log out</button></a>	</div>
        
        </div><!--close menubar-->	
      </nav>
    </header>
    
     
	
	<div id="site_content">	

	
	   <div class="div_admin_tasks">      
         	  
		<table>
			<tr></tr>
			<tr><td class="td2_pad"><h3>Manage the tasks</td></h3></tr>
			<tr><td class="td2_pad"><a href="report.php">Add notification</a><td></tr>			
			</table>
	
		

	
  </div><!--close main-->
   
	</div><!--close site_content-->  
	  
	 
  
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
   <footer>
	<p> 
        Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
		Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</p>
    </footer>
</body>
</html>
