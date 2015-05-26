//custom code
$(document).ready(function(){
	$('.cityvalues').click(function(){
	$('.js-city-toggle-show').text($(this).text());
	$('.js-cities').slideToggle('slow');
	
	$('#search_city').val($(this).attr('cityid'));
	$('.js-specialty-toggle-show').text('Specialty');
	$('.js-insurances-toggle-show').text('Hospital');
	$.get('users/get_specialities/'+$(this).attr('cityid'), function(data) {
		var htmldata_spec = htmldata_hosp = "";
		data = JSON.parse(data);
		
			
			var spec = data['specialty'];
			var hosp = data['hospital'];
			
			if(spec.length > 0) {
				for(var i = 0; i < spec.length; i++) {
					//console.log(data[i]);
					htmldata_spec += '<p><a href="javascript://" class="spcvalues" spcid="'+spec[i].Specialty.id+'">'+spec[i].Specialty.name+'</a></p>'; 
				}
			}else {
			
				htmldata_spec = '<p><a href="">No specialties found</a></p>';
			}
			
			if(hosp.length > 0) {
				for(var i = 0; i < hosp.length; i++) {
					htmldata_hosp += '<p><a href="javascript://" class="hvalues" hid="'+hosp[i].Clinic.id+'">' + hosp[i].Clinic.name + '</a></p>'; 
				}
			}else{
				htmldata_hosp = '<p><a href="">No hospitals found</a></p>';
			}
			
			
		
		$('.js-specialties').html(htmldata_spec);
		$('.js-insurances').html(htmldata_hosp);
	});
});

$('.spcvalues').live('click', function() {
	var searchcity = $('#search_city').val();
	
		var txt = $(this).text();
	txt = $.trim(txt).substring(0, 20).trim(this);
	$('.js-specialty-toggle-show').text(txt);
	$('.js-specialties').slideToggle('slow');
	$('#search_speciality').val($(this).attr('spcid'));
	$('.js-insurances-toggle-show').text('Hospital');
	$.get('users/get_hospitals/'+searchcity+'/'+$(this).attr('spcid'), function(data) {
		var htmldata = "";
		data = JSON.parse(data);
		if(data.length > 0) {		
			
			for(var i = 0; i < data.length; i++) {
				//console.log(data[i]);
				htmldata += '<p><a href="javascript://" class="hvalues" hid="'+data[i].id+'">' + data[i].name + '</a></p>'; 
			}
			
		} else {
			htmldata = '<p><a href="">No hospitals found</a></p>';
		}
		$('.js-insurances').html(htmldata);
	});
	
    
});

$('.hvalues').live("click",function(){
	var txt = $(this).text();
	txt = $.trim(txt).substring(0, 20).trim(this);
	$('.js-insurances-toggle-show').text(txt);
	$('.js-insurances').slideToggle('slow');
	
	//$('.js-cities').slideToggle('slow');
	$('#search_hospital').val($(this).attr('hid'));
	
});
});


function check_search() {
	var searchcity = $('#search_city').val();
	if (searchcity == ""){
		$('.find-tm').text('Please select city').css('color','red');
                setTimeout(function(){
                  $('.find-tm').text('');
                },5000);
		return false;
	} else {
		document.getElementById('mainSearchForm').submit()
	}
	
}



function remove_notif(id, type) {
	$.post('users/clear_notification',{ id: id, type:type}, function(data){
		$('.a_'+id).hide();
		//$('.a_'+id).parent().siblings('td').removeAttr('style');
		 window.location.reload(true);	
	});
}

function check_reminder() {
	if($('#reminder_sms').is(':checked')) {
		$('#reminder_time').show();	
	}else{
		$('#reminder_time').hide();	
	}
}// JavaScript Document