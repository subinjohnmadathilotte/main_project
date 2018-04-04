$(document).ready(function(){
	$('#hid_hus').hide();
	
	$('#marital').on("change",function(){
		$x=$('#marital').val();
		if($x==0){
			$('#hid_hus').hide();
		}
		else{
			$('#hid_hus').show();
			$('#hid_hus').val().required;
		}
	})
	$('#inv').hide();
		$('#f_name').on("change",function(){
			$('#inv').hide();
			$val_fname=/^[A-Za-z]+$/;
		$fn=$('#f_name').val();
		if(!$val_fname.test($fn)){
			$('#inv').show();
			$('#f_name').val("");
		}
		
	})
	$('#inv2').hide();
		$('#l_name').on("change",function(){
			$('#inv2').hide();
			$val_fname=/^[A-Za-z]+$/;
		$fn=$('#l_name').val();
		if(!$val_fname.test($fn)){
			$('#inv2').show();
			$('#l_name').val("");
		}
		
	})
	$('#inv3').hide();
		$('#h_name').on("change",function(){
			$('#inv3').hide();
			$val_fname=/^[A-Za-z]+$/;
		$fn=$('#h_name').val();
		if(!$val_fname.test($fn)){
			$(inv3).show();
			$('#h_name').val("");
		}
		
	})
	//for fathers name
	$('#inv4').hide();
		$('#father_name').on("change",function(){
			$('#inv4').hide();
			$val_fname=/^[A-Za-z]+$/;
		$fn=$('#father_name').val();
		if(!$val_fname.test($fn)){
			$(inv4).show();
			$('#father_name').val("");
		}
		
	})
	
		//phone 
	$('#inv5').hide();
		$('#phone').on("change",function(){
			$('#inv5').hide();
			$val_fname=/^[0-9]{10,12}$/;
		$fn=$('#phone').val();
		if(!$val_fname.test($fn)){
			$(inv5).show();
			$('#phone').val("");
		}
		
	})
		//hus name 
	$('#inv6').hide();
		$('#hus_name').on("change",function(){
			$('#inv6').hide();
			$val_fname=/^[A-Za-z]+$/;
		$fn=$('#hus_name').val();
		if(!$val_fname.test($fn)){
			$(inv6).show();
			$('#hus_name').val("");
		}
		
	})
	
			//aadhaar
	$('#inv7').hide();
	
		$('#aadhaar').on("change",function(){
			$('#inv7').hide();
			$val_fname=/^[0-9]{12}$/;
		$fn=$('#aadhaar').val();
		if(!$val_fname.test($fn)){
			$(inv7).show();
			$('#aadhaar').val("");
		}
		
	})
	
		//upload photo
	$('#inv8').hide();
		$('#photo').on("change",function(){
			$('#inv8').hide();
			$fileExtension=['jpeg', 'jpg', 'png', 'gif', 'bmp'];
		$fn=$('#photo').val();
		
		if($.inArray($(photo).val().split('.').pop().toLowerCase(), $fileExtension) == -1){
			$(inv8).show();
			$('#photo').val("");
		}
		
	})
})//document CLOSE