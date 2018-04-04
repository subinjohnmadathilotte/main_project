
		function g(){
	
	 var val_gname= /^[A-Za-z]+$/;
	 $g_name= document.getElementById('group_name').value;
	
	 if(!val_gname.test($g_name)){
     
      alert("Group Name Must be Alphabets Only");
	   document.getElementById('group_name').value='';
	   $("#group_name").focus();
      return false;
    }
	
}


function nomembers(){
	
var val_phone= /^1[0-5]{1}$/;
	 $mobile= document.getElementById('no_members').value;
	
	 if(!val_phone.test($mobile)){
     
      alert("A group should have members between 10 to 15");
	   document.getElementById('no_members').value='';
	   $("#no_members").focus();
      return false;
    }
	
}

function ph(){
	
	  var val_phone= /^[789]\d{9}$/;
	 $mobile= document.getElementById('phone').value;
	
	 if(!val_phone.test($mobile)){
     
      alert("enter valid phone number");
	   document.getElementById('phone').value='';
	   $("#phone").focus();
      return false;
    }
	
}

  function fileCheckk(obj) {
            var fileExtension = ['doc','docx','pdf'];
            if ($.inArray($(obj).val().split('.').pop().toLowerCase(), fileExtension) == -1){
                alert("Only '.doc','.docx','.pdf' formats are allowed.");
				 document.getElementById('file1').value='';
				  $("#file1").focus();
				return false;
			}
    }
	 function fileCheck2(obj) {
            var fileExtension = ['doc','docx','pdf'];
            if ($.inArray($(obj).val().split('.').pop().toLowerCase(), fileExtension) == -1){
                alert("Only '.doc','.docx','.pdf' formats are allowed.");
				 document.getElementById('file2').value='';
				  $("#file2").focus();
				return false;
			}
    }
	 function fileCheck3(obj) {
            var fileExtension = ['doc','docx','pdf'];
            if ($.inArray($(obj).val().split('.').pop().toLowerCase(), fileExtension) == -1){
                alert("Only '.doc','.docx','.pdf' formats are allowed.");
				 document.getElementById('file3').value='';
				  $("#file3").focus();
				return false;
			}
    }
	
	function efn(){
    
     var valemail= /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;;
     $l_email= document.getElementById('email').value;
    
     if(!valemail.test($l_email)){
     
      alert("Enter proper Email address");
       document.getElementById('email').value='';
       $("#email").focus();
      return false;
    }
    
}

