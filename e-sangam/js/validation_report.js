	function agenda1(){
	
	 var val_gname= /^[A-Za-z]+$/;
	 $g_name= document.getElementById('1').value;
	
	 if(!val_gname.test($g_name)){
     
      alert("Group Name Must be Alphabets Only");
	   document.getElementById('1').value='';
	   $("#1").focus();
      return false;
    }
	
}