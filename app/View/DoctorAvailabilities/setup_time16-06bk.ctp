<style>
.holidayData2 tr {
    text-align: center;
    width: 100%;
}
.holidayData1 tr {
    text-align: center;
    width: 100%;
}

.holidayForm ul li{
    padding:5px;	
}
</style>

<div class="doctorAvailabilitiesSetuptime form clearfix js-responses js-response">
 <h2><?php echo __l('Set Aavailble times for this week');?></h2>
    <div class="clearfix">
        <div class="side1">
		  <div class="form-box">
            <div class="form-box-inner">
                <div class="button-place vlearfix">
                    <div class="button">
                        <?php echo $this->Html->link(__l('Update Consultation Fees'), array('controller' => 'doctor_availabilities', 'action' => 'edit',$doctorAvailability['DoctorAvailability']['id']), array('class' => 'add js-thickbox', 'title' => __l('Add'))); ?>
                    </div>
                </div>
                <?php echo $this->Calendar->setup_time($year, $month, $day, $data, $user_id, $clinic_id); ?>
            </div>
             <div class="holidayFields">
             <?php if($HolidayList){
               $checked="checked";
               }else{
				  $checked=''; 
			   }?>
         <H2><input type="checkbox" id="ckbox"  onclick="show_frm()" <?php echo $checked;?>>Do you want to add holidays</H2>
         <div class="holidayForm" style="display:none;background:#fff;padding-bottom: 16px; padding-left: 10px;padding-top: 10px;">
        <ul>
       
        <li>
        <div class="date_err"></div>
        <label>Holiday Date</label>
        <input type="text" id="datepicker" name="holiday_date">
        </li>
        <li>
        <div class="type_err"></div>
        <label>Holiday Type</label>
        <input type="text" id="holiday_type" name="holiday_type">
        </li>
        <li>
       <div class="green-outer" style="margin-left: 53px;margin-top: 10px;padding-bottom: 21px;;">
            <div class="book-l" style="margin-left: 32px;">
        <a href="javascript:void(0)" id="add_values">ADD</a>
        <div class="load"></div>
        </div>
        </div>
        </li>
         </ul>
         <form method="get" action="<?php echo $this->webroot;?>DoctorAvailabilities/add_holidays" id="holiday_frm">
        <table class="holidayData1" style="width:80%;margin-top:10px;">
        <tr id="head" style="display:none"><th>Holiday Date</th>
        <th>Holiday Type</th>
        <th>Action</th>
        </tr>
        
        </table>
       <div class="green-outer" id="save_btn" style="display:none; margin-left: 275px;margin-top: 10px;padding-bottom: 21px;;">
            <div class="book-l" style="margin-left: 32px;">
        <a href="javascript:void(0)" id="save_data">SAVE</a>
        </div>
        </div>
        </form>
        
      
        <?php if($HolidayList){?>
                  <h2>Your Holiday(s): </h2>
        		   <table class="holidayData2" style="width:80%;margin-top:15px">
                    <tr><th>Holiday Date</th>
                    <th>Holiday Type</th>
                    <th>Action</th>
                    </tr>
                    <?php foreach($HolidayList as $hl){ ?>
                    <tr><td><?php echo $hl['DoctorHoliday']['holiday_date']?></td>
                    <td><?php echo $hl['DoctorHoliday']['holiday_type']?></td>
                    <td>

                   
                    <a class="js-delete" title="Delete Holiday" href="/tatkal/DoctorAvailabilities/delete_holiday/<?php  echo $hl['DoctorHoliday']['id']; ?>/<?php  echo $hl['DoctorHoliday']['doctor_uid']; ?>">Delete</a>
                   
                    </td>
                    
                    <?php } ?>
                    </table>
        <?php }?>
        </div>
        </div>
        </div>
        
       
       
        
    </div>
    <div class="side2">
        <?php echo $this->element('sidebar', array('config' => 'sec'));?>
    </div>
    </div>
</div>

<script>
var count='0';
$(function(){
	$("#datepicker").datepicker();
	if($('#ckbox :checkbox:checked')){
		$('.holidayForm').show();
	}
	
});

function show_frm(){
	if($('#ckbox :checkbox:checked')){
		$('.holidayForm').slideToggle();
	}
}

$('#add_values').click(function(){
	$('.load').html('<img src="<?php echo $this->webroot;?>img/loader_light_blue.gif">');
	if($('#datepicker').val()==''){
		$('.date_err').text('Please select date').css('color','red');
                setTimeout(function(){
                  $('.date_err').text('');
                },5000);
				$('.load').html('');
		return false;
	}
	if($('#holiday_type').val()==''){
		$('.type_err').text('Please enter holiday type').css('color','red');
                setTimeout(function(){
                  $('.type_err').text('');
                },5000);
				$('.load').html('');
		return false;
	}
	count++;
	var str='<tr><td>'+$('#datepicker').val()+'<input name=data[DoctorHoliday][holiday_date][] type="hidden" value='+$('#datepicker').val()+'></td><td>'+$('#holiday_type').val()+'<input type="hidden" name=data[DoctorHoliday][holiday_type][] value='+$('#holiday_type').val()+'></td><td><a href="javascript:void(0)" onclick="remove_row(this)">Remove</a></td></tr>';
  $('#save_btn').show();
  $('#head').show();
  $('.holidayData1').append(str);
  $('#datepicker').val('');
  $('#holiday_type').val('');
  $('.load').html('');

});

function remove_row(obj){
  $(obj).parent().parent().remove();
  count--;
  if(count=='0'){
	   $('#save_btn').hide();
  $('#head').hide(); 
  }
}

$('#save_data').click(function(){
	$('#holiday_frm').submit();
});
</script>

