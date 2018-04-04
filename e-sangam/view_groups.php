<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="./css/bootstrap.css">
    
   
        
        
        <?php
 include 'db_con.php';
 if(isset($_POST["remove"]))
   {
	   
	 $g_id=$_POST["id"];
	 $result=mysqli_query($con,"select login_id  from group_tb where g_id=$g_id");
	 $r=mysqli_fetch_array($result);
	 $lg=$r["login_id"];
	
	 
	 $sql1="update login_tb set status=0 where login_id=$lg";
	 $result1=mysqli_query($con,$sql1);
	 
	  $sql2="update group_tb set status=0 where g_id=$g_id";
	 $result4=mysqli_query($con,$sql2);
	 
	 echo"<script>alert('Removed')</script>";
	 
   }

 ?>

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
    overflow: auto;
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
					<li><a href="admin.php"><h2>Home<h2></a></li>
                    <li><a href="group_reg.php"><h2>Add groups<h2></a></li>
					 <li><a href="signout.php"><h2>Log out<h2></a></li>
                     <li><a href=""><h2><h2></a></li>
                   </ul>
					<br>
				</div>
        </div>  
  </div>
 <!-- container class-->
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
              <li><a href="add_notification.php">Add notification</a></li>
              <li><a href="add_programs.php">Add programs</a></li>
			  <li class="active1"><a href="#">View groups</a></li>
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

<div class="col-md-5 offset-4">
	<div class="row">
		<div class="col-md-3 padd">
			<h2> District</h2>  
		</div>
		<div class="col-md-4 offset-1">
			<select class=" form-control" id="district_select" name="district" required >
			
					
            <?php
            $q = mysqli_query($con, "SELECT d_id,d_name FROM district");
            //var_dump($q);

            while ($row = mysqli_fetch_array($q)) {
                echo '<option value=' . $row['d_id'] . '>' . $row['d_name'] . '</option>';
            }
            ?>
					
				</select>
		</div>
		</div>
		
			<div class="row" style="margin-top:20px;">
		<div class="col-md-3 padd">
			<h2> Panchayath</h2>  
		</div>
		<div class="col-md-4 offset-1">
				<select id="panchayath_select" class=" form-control" name="panchayath" value="panchayath" required>
					
					<option value="-1">select</option>
					
				</select>
		</div>
		</div>
		
			<div class="row" style="margin-top:20px;">
		<div class="col-md-3 padd">
			<h2> Ward</h2>  
		</div>
		<div class="col-md-4 offset-1">
				<select id="ward_select" class=" form-control" name="ward" required>

						   
						<option value="-1">select</option>				   
				</select>
		</div>
		</div>
		
		<div class="row" style="margin-top:20px;">
		<div class="col-md-3 padd">
			
		</div>
		<div class="col-md-4 offset-1">
		<button type="button" name="view" id="view"  class="form-control btn-primary"/>View</button>
		</div>
		</div>
		
	
		<div id='spare_img'>
		</div>
	
</div>
	</div>
    <!-- container class closing-->
    
       <script>
        $('body').on('change', '#district_select', function () {
//            alert("countryslected");
            $index = $('#district_select').val();
           
            $.ajax({
            type:'post',
                    url:'get_panchayath.php',
                    data:{index:$index},
                    success:function(response)
                    {
//                        alert(response);
                    console.log(response);
                    $ar = response.split(",");
                            $str = "<option value='-1' disabled hidden selected> </option>";
                            for (var i = 0; i < $ar.length; i++)
                    {
                        $ss=$ar[i].split(':');
                    $str += '<option value='+$ss[0]+'>' + $ss[1] + "</option>";
                    }
                    $('#panchayath_select').html($str);
                }
                    });
                    
    });
	 
         $('body').on('change', '#panchayath_select', function () {
//            alert("countryslected");
            $index = $('#panchayath_select').val();
           
            $.ajax({
            type:'post',
                    url:'get_ward.php',
                    data:{index:$index},
                    success:function(response)
                    {
//                        alert(response);
                    console.log(response);
                    $ar = response.split(",");
                            $str = "<option value='-1' disabled hidden selected> </option>";
                            for (var i = 0; i < $ar.length; i++)
                    {
                        $ss=$ar[i].split(':');
                    $str += '<option value='+$ss[0]+'>' + $ss[1] + "</option>";
                    }
                    $('#ward_select').html($str);
                }
                    });
                    
    });
	
	  //loads pic on cat_list change
   $('#view').on('click', function(){

		$index1 = $('#district_select').val();
		$index2 = $('#panchayath_select').val();
		$index3 = $('#ward_select').val();
     
      
          $.ajax({
            type: "POST",
            url: "get_details.php",
            data: "index3="+$index3,
            success: function(data){
              //alert(data);
              $("#spare_img").html(data);

        }
        });
       
       
     
   });

    
</script>	
   
 <footer>
       <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> /p>
    </footer>



