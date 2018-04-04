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

			

 
 ?>


    <style>
	
	.top_row{
		background-color:#E3F2FD;
		width:70%;
		margin-bottom:15px;
		height:35px;
	}
	#cont{
		
    background-color: #fffff;
    border:none;
	font-size:1.3em;
	overflow:auto;
	display:block;
	margin-top:5px;
	margin-bottom:5px;
   margin-left:10px;
   box-shadow: 5px 5px 2px #888888;
	}

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


.show-on-hover:hover > ul.dropdown-menu {
    display: block;    
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
                
                   			    <div class="btn-group show-on-hover">
          <button type="button" class="btn btn-default"
		  style="color:#0275d8;" data-toggle="dropdown">
           <h1> menu</h1>
          </button>
          <ul class="dropdown-menu" role="menu">
              <li><a href="edit_profile.php"><h2>Edit profile</h2></a></li>
			  
			<li><a href="user_loan.php"><h2>Apply for Loan</h2></a></li>
			<li><a href="loan_status.php"><h2>Check loan status</h2></a></li>
             <li><a href="user_change_pass.php"><h2>Change password</h2></a></li>
              <li><a href="signout.php"><h2>Log out</h2></a></li>
            
          </ul>
        </div>
          </ul>
                    
 
  <br>
  </div>
        </div>
        
        
       
    </div>
	<!--marquee row starts-->
	
  <div class="row offset-2 top_row">
	<marquee behavior="scroll">
		<font style="font-size: 15px;font-family: Arial;color:red">
		<b>
			<?php
					
					
					$r_gidd=mysqli_query($con,"select g_id  from `members` where login_id=$id");
					$row_gid=mysqli_fetch_array($r_gidd);
					$g_id=$row_gid['g_id'];
					
					$rrr=mysqli_query($con,"select *  from `programs` where district=$g_id");
					$roww=mysqli_fetch_array($rrr);
					if($roww['id']==!null){
						while($roww=mysqli_fetch_array($rrr))
						
							{
								echo $roww['details'];
								echo "--------";
							}
							
						}
						else{
								
								echo "No programs";
							}?>
							</b>
		</font>
	</marquee>
  </div>
  <!--marquee row closes-->
  
  
  
        <div class="row" style="margin-bottom:10px;">
		    <div class="col-md-3" style="height: auto;background-color:#E3F2FD;">
			<?php
			$result=mysqli_query($con,"select * from members where login_id='$id'"); 
			$row=mysqli_fetch_array($result);
			$m_id=$row["m_id"];
			
			?>
			<h3 class="block_div">Wellcome <b><?php echo $row["f_name"];  ?></b></h3> 
			</div>
		</div>
		
    <div class="row"><!--main row starts-->
		<div class="col-md-3" style="height: auto;background-color:#E3F2FD;">
			<div class="row">
			<h2>Notifications</h2>
			</div>
			
			<div class="row" style="height: auto;">
			
			<?php
					
					
					$r_gid=mysqli_query($con,"select g_id  from `members` where login_id=$id");
					$row_gid=mysqli_fetch_array($r_gid);
					$g_id=$row_gid['g_id'];
					
					$rr=mysqli_query($con,"select *  from `notification` where district=$g_id");
					
					$row=mysqli_fetch_array($rr);
					if($row['id']==!null){
						while($row=mysqli_fetch_array($rr))
						
							{
							
							?>
							
							
							<textarea id="cont" rows="3" cols="35" readonly><?php echo $row['content']; ?></textarea>
						
							
							
							<?php
							}
						}
						else{
							?>
							
							<div class="row" style="background-color:red;margin-top:50px;margin-left:10px;">
							<h2>No Notifications</h2>
							</div>
							<?php
						}
						
					
				?>
				
			
			</div>
		</div>
			
			
		
									 <?php  
 function fetch_data()  
 {  
include 'db_con.php';
  if(!isset($_SESSION["id"]))
	  
	  {
		  
		  header('location:./');
	  }
 
  $id=$_SESSION['id'];
 
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "e-sangam");  
	  
	   $r1=mysqli_query($connect,"select * from members where login_id='$id'"); 
			$r1=mysqli_fetch_array($r1);
			$m_id=$r1["m_id"];
			
      $sql = "select * from deposit where mem_id=$m_id";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {   
      $output .= '<tr>  
                          
                          <td>'.$row["amount"].'</td>  
                          <td>'.$row["date"].'</td>  
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["create_pdf"]))  
 {  
      require_once('../tcpdf/tcpdf_include.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Statement");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h3 align="center">Statement</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr>  
                
                <th >amount</th>  
				<th >date</th>  
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
	  ob_end_clean();
      $obj_pdf->Output('sample.pdf', 'I');  
 }  
 ?>  
                                     
        
                     <?php  
                    // echo fetch_data();  
                     ?>  
                   <div class="col-md-8 offset-1" style="height: auto;">
				   <div class="row" style="margin-bottom:10px">
					<h2>Your Total deposit</h2>
				   </div>
				   <div class="row" style="margin-bottom:20px">
				   <h2>
				   <?php 
				  
					$res_sum = mysqli_query($con, "select sum(amount) from deposit where mem_id=$m_id");  
					$row_sum = mysqli_fetch_array($res_sum)	;
					echo $row_sum["sum(amount)"];
					
				   ?>
				   </h2>
				   </div>
				   
                     <form method="post">  
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Get statement" />  
                     </form>  
                </div>  
           </div>  

					
			</div>
			
		
	   
    </div><!--main row ends-->
  
  
   
    
   
   
 <footer>
     <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> 
    </footer>



