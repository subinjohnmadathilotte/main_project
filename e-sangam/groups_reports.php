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
	.bt
	{
		
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
    
                <li class="current"><a href="ads.php"><h2>Home</h2></a></li> 
				 <li class="current"><a href="upload_reports.php"><h2>Upload Report</h2></a></li>
                    <li><a href="signout.php"><h2>Log out</h2></a></li>
          </ul>
                    
 
				<br>
			</div>
        </div>
    </div>

 
   <!--first row div starts-->
    <div class="row" style="margin-bottom:20px;">
	
	
	<div class="col-md-8 offset-1" id="divToPrint">   
			<div class="widget stacked widget-table action-table">
    				
				<div class="widget-header">
					<i class="icon-th-list"></i>
					<?php $g_id=$_SESSION["GID"];
					$res=mysqli_query($con,"select g_name from group_tb where g_id='$g_id'");
					$rw=mysqli_fetch_array($res);
					$gname=$rw["g_name"];
					?>
					<h3><?php echo ucfirst($gname)?></h3>
					<h3>MINUTS REPORTS (Last 3 months)</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Date</th>
								<th>Discussed Items</th>
								<th>Agenda</th>
								
								
							</tr>
						</thead>
						<tbody>
						
						<?php
						//DETAILS OF DEPOSIT BETWEEN 3 MONTHS 
						//getting value from previous page
						$num=1;
					
						
						$date=date("Y-m-d");
						//$date = "2015-11-17";
						 $d=date('Y-m-d', strtotime($date. ' - 90 days'));
						
						
						$res_depo=mysqli_query($con,"select * from reports where g_id='$g_id' and date between '$d' and '$date'");
						while($row_depo=mysqli_fetch_array($res_depo))
						{
					
								$dd=$row_depo["date"];
								$rid=$row_depo["r_id"];
				
									?>
									
									
									
									<tr>
								<td><?php echo $dd;?></td>
								<!-- AGENDA COLUMN STARTS-->
								 <td><ul><?php 
								 $res_agenda=mysqli_query($con,"select agenda from report_agenda where g_id='$g_id' and report_id='$rid'");
						while($row_agenda=mysqli_fetch_array($res_agenda))
						{
							if($row_agenda["agenda"]!=null)
							{
						?>
							
							<li><?php echo $row_agenda["agenda"]; ?></li>
							<?php
							}
						}
								 ?> 
								 </ul>
								 </td>
									
								<!-- AGENDA COLUMN ENDS-->
								
								<!-- DISCUSSED ITEM COLUMN STARTS-->
								 <td><ul><?php 
								 $res_dis=mysqli_query($con,"select discussed_items from discussed_items where g_id='$g_id' and report_id='$rid'");
						while($row_dis=mysqli_fetch_array($res_dis))
						{
							if($row_dis["discussed_items"]!=null)
							{
						?>
							
							<li><?php echo $row_dis["discussed_items"]; ?></li>
							<?php
							}
						}
								 ?> 
								 </ul>
								 </td>
									
								<!-- DISCUSSED ITEM COLUMN ENDS-->
								
							</tr>
						
									<?php
									 $num+=1;
						//}
					}
								?>
						
							
							
							</tbody>
						</table>
						<!-- PDF BUTTON -->
					<tr> 
						<form method="post">  
                       
						<button name="create_pdf" class="bt" onclick="PrintDiv();">
						<img src="images/download.png" style="height:35px;width:35px;"></img>
						</button>  
						
						</form>  
					</tr>
					<!-- PDF BUTTON -->
											 
               
				</div> <!-- /widget-content -->
			
			</div> <!-- /widget -->
            </div> <!--  content div close-->
			</div>  <!--first row div close-->
    
    
   <script type="text/javascript">
        function PrintDiv() {
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=1200,height=800');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
							}
     </script>
   
 <footer>
     <p><h1> Department of Government of Kerala, Thiruvananthapuram, Kerala, India - 695011, 
         Phone: 91-471-2554714, Fax: 91-471-2554714, Email: info@kudumbashree.org</h1></p> 
    </footer>




