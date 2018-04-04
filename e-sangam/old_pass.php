<?php

include_once 'db_con.php';
if (isset($_POST['confirm'])) {
	$id=$_SESSION['id'];
    $index = $_POST['old_pass'];
	$new=$_POST['confirm'];
	
	 //encription
	function encryptIt($q)
	{
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
	}
	//encription CLOSE
	
	$encrypted = encryptIt($index);
	//echo $encrypted;
	
    $q = mysqli_query($con, "SELECT pass FROM login_tb where login_id='" . $id . "'");
    $row = mysqli_fetch_array($q);

		if($row['pass']==$encrypted)
		{
			$encrypted2 = encryptIt($new);
			$sql="update login_tb set pass='$encrypted2' where type='4' and login_id='$id'";
			$result2=mysqli_query($con,$sql);
			echo "changed";
		}
		else{
			echo "invalid";
		}
		
}