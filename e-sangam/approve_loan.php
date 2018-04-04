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

 //echo $g_id;

$loan_id='';
 
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
<?php
								  
								  
								  
			if(isset($_POST["Reject"]))
   {
	  $l_id=$_POST["id"];
	   $sql_up="update loan set status='rejected' where l_id='$l_id'";
	   $re=mysqli_query($con,$sql_up);
	   echo "rejected";
	  
   }
   
   			if(isset($_POST["approve"]))
   {
	  $l_id=$_POST["id"];
	   $sql_upd="update loan set status='approved' where l_id='$l_id'";
	   $res=mysqli_query($con,$sql_upd);
	   echo "approved";
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
    
                <li class="current"><a href="group.php"><h2>Home</h2></a></li>
                  <li><a href="daily_report1.php"><h2>Daily report</h2> </a></li>
                   <li><a href="view_members1.php"><h2>View members</h2></a></li>
                    <li><a href="add_member1.php"><h2>Add members</h2></a></li>
                    <li><a href="signout.php"><h2>Log out</h2></a></li>
          </ul>
                    
 
  <br>
  </div>
        </div>
        
        
       
    </div>
 
    
  <div class="row">
			<div class="col-md-2" style=""> 
				<h1 style="margin-top:10px;">
				<form method="post">  
                <input type="submit" name="create_pdf" class="btn btn-danger"
				value="Get report on loan applications"/>  
                     </form></h1>
<?php  
 function fetch_data()  
 {  
 global $g_id;
  if(!isset($_SESSION["id"]))
	  
	  {
		  
		  header('location:./');
	  }
 
  $id=$_SESSION['id'];
 
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "e-sangam");  
	  
	   
			
      $sql = "select * from loan where group_id='$g_id'";  
      $result = mysqli_query($connect, $sql);  
	 
      while($row = mysqli_fetch_array($result))  
      {   
  $uid=$row["user_id"];
  $r1=mysqli_query($connect,"select * from members where m_id='$uid'"); 
			$r1=mysqli_fetch_array($r1);
			
			 $f=$r1["f_name"];
			$l=$r1["l_name"];
			$n=" ";
			$name=$f.' '.$l;

      $output .= '<tr>  
                         <td>'.$name.'</td>  
                          <td>'.$row["need"].'</td>  
                          <td>'.$row["status"].'</td> 
													  
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
      $obj_pdf->SetTitle("Loan applications");  
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
      <h3 align="center">Loan applications</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr> 
				<th><b>Name</b></th>  		   
              <th><b>Need</b></th>  
			<th><b>Status</b></th>  
				
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
	  ob_end_clean();
      $obj_pdf->Output('sample.pdf', 'I');  
 }  
 ?>  
			</div>
						
	<!---checking if any member there-->
			<?php
			 $result_if=mysqli_query($con,"select l_id  from loan where group_id=$g_id and status='pending'");
             $row_if=mysqli_fetch_array($result_if);
			 	if($row_if['l_id']==!null)
				
				{
					?>   
	
		
	
	
			   
	
		 <div class="col-md-8 offset" style="height: auto;margin-bottom:20px;">
		 
		 <?php
		 	$res_d=mysqli_query($con,"select sum(amount)  from deposit where group_id=$g_id ");
		$rd=mysqli_fetch_array($res_d);
		 ?>
		 
		 <div class="span7">   
			<div class="widget stacked widget-table action-table">
    				
				<div class="widget-header">
					<i class="icon-th-list"></i>
					<h3>Loan Details</h3>
					<h3>Total deposit:<?php echo $rd['sum(amount)'];?></h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<table class="table table-striped table-bordered">
					
						<thead>
							<tr>
								<th>NO:</th>
								<th>Name</th>
								<th>Date of applied</th>
								<th>purpose of loan</th>
								<th>Amount</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						
						<?php
						 $result=mysqli_query($con,"select *  from loan where group_id=$g_id and status='pending'");
							
							/* selecting members list */
					$num=0;
					
                            while($row=mysqli_fetch_array($result))
                                  {
								 $uid=$row["user_id"];
								 $loan_id=$row["l_id"];
						$result2=mysqli_query($con,"select f_name,l_name  from members where m_id=$uid and status=1");
									$row2=mysqli_fetch_array($result2);  
									  
									 $f=$row2["f_name"];
									 $l=$row2["l_name"];
									 $n=" ";
									 $name=$f.' '.$l;
									$num+=1;
									  
							   ?>
							   
							   <form action="" method="POST" name="my_form">
							  <tr>
								<td style="width:50px;"><!-- Number column -->
									<div class="col-md-1" style="height: auto;margin-bottom:20px;">
									<?php
									echo $num;		
									?>
									</div>
								</td>
							 <!-- Number column ends-->
							  
							  
							  <!-- Members details column -->
								<td style="width:200px;">
							
									
									<!--	<td><div class="col-md-2">House Name</div></td>-->
										<div class="col-md-8"><b>
											<?php
											echo ucfirst($name);
											?></b>
											</div><br>
									
									
									
									
								</td><!-- Members details column ends-->
								<!-- date of applied column -->
								<td style="width:30px;">
								<div class="test1">
									 <?php echo $row["date_of_applied"];?>
								</div>
								

								</td><!-- date of applied column ends-->
								
								<!-- need  column -->
								<td style="width:30px;">
								<div class="test1">
									 <?php echo $row["need"];?>
								</div>
								

								</td><!-- need column ends-->
								
								<!-- amount  column -->
								<td style="width:30px;">
								<div class="test1">
									 <?php echo $row["amount"];?>
								</div>
								

								</td><!-- amount column ends-->

								<td class="td-actions">
							
								 <input type="hidden" name="id" value="<?php echo $row["l_id"]; ?>" />
									<input type="submit" name="approve"   value="approve" class="btn-success form-control" />
									</td>
									<td class="td-actions">
									 <input type="hidden" name="id" value="<?php echo $row["l_id"]; ?>" />
								<input type="submit" name="Reject"  style="background-color:red;" value="Reject" class="btn form-control" />
								
								</td>
							  </tr>
							  </form>
							  
							  <?php
								  }  
								  
								  
								  ?>
							
						
							
						</table>
					
				</div> <!-- /widget-content -->
			
			</div> <!-- /widget -->
            </div>
		 <?php
								  } //if checking close 
								 
								  else{?>
									 <div class="col-md-6 offset-3">
			<h3>No member Applied for loan</h3>
			
			</div>
			
		 	 <?php
								  } //if checking close 
								 
								?>
		 
		</div>
		<!--div col-md-8 offset-2 close-->
							  
	</div><!--div row close-->
    
    
  
  
    
    
   
   
 <footer>
     <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> 
    </footer>





