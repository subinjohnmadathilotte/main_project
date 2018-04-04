<?php
include 'db_con.php';
class regclass
{
 function regclass()
 {
	$this->dbConnection=new dbConnection();
 }	
 function checkcourse()
 {
	$sql="select did,course from tbl_course where did='$this->did' and course='$this->course'";
	 $result=$this->dbConnection->query($sql);
     $res1=mysql_num_rows($result);
	 return $res1;
 }
  function pdf()
 {
	$sql="select * from tbl_student where sname='{$_SESSION['usid']}';";
	 $result=$this->dbConnection->query($sql);
    
	 return $result;
 }
  function checkdept()
 {
	$sql="select dname from tbl_department where dname='$this->dname'";
	 $result=$this->dbConnection->query($sql);
     $res1=mysql_num_rows($result);
	 return $res1;
 }
 	function checkLogin()
	{
		$sql="select sname,password from tbl_student where sname='$this->uname' and password='$this->pawd' ";
		$result=$this->dbConnection->query($sql);
         return $result;
	}
  function checkreg()
 {
	$sql="select sname,email from tbl_student where sname='$this->username' and email='$this->emailid'";
	 $result=$this->dbConnection->query($sql);
     $res1=mysql_num_rows($result);
	 return $res1;
 }
function adddept()
{
	$sql1="insert into tbl_department(dname,hname)
	values ('$this->dname','$this->hname')";
	$cnt1=$this->dbConnection->query($sql1);
	return $cnt1;	
}
function course()
{
	$sql1="insert into tbl_course(did,course)
	values ('$this->did','$this->course')";
	$cnt1=$this->dbConnection->query($sql1);
	return $cnt1;	
}
 function reg()
 {
	$sql="insert into tbl_student(did,sname,password,gender,cid,email,phone,dob,pic) values('$this->did','$this->username' 
	,'$this->password','$this->gender','$this->course','$this->emailid','$this->phone','$this->dob',
	'$this->pic')";
	 $result=$this->dbConnection->query($sql);
    return $result;
 }
function displays()
{   
$sql2="select * from tbl_department";
echo $sql2;
$result=$this->dbConnection->query($sql2);
return $result;	
}
function display()
{ 
	$sql="select * from tbl_course";
     $result=$this->dbConnection->query($sql);
	 return $result;
}
}
?>
