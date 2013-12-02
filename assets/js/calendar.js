var name = '';
var email = '';
var dates = new Array();
var times = new Array();

$(function() {
	$("#selectable").selectable({
		filter:'.calendar-day', 
		selected: function (event, ui) {
			if ($(ui.selected).hasClass('click-selected')) {
				$(ui.selected).removeClass('ui-selected click-selected');
				index = dates.indexOf(ui.selected.id);			
				if (index > -1) {
					dates.splice(index, 1);
				}
			} 
			else {
				$(ui.selected).addClass('click-selected');
				dates.push(ui.selected.id);
			}
		},
		
		unselected: function (event, ui) {
			$(ui.unselected).removeClass('click-selected');
		}
	});
});


//$(function () {
function time_sheet_selectable() {
	$("#time-slots-selectable").selectable({
		// Select which elements to put selectable on. Just select the days that are active- they have the class .slot
		filter:'.slot', 
		selected: function (event, ui) {
			if ($(ui.selected).hasClass('click-selected')) {
				$(ui.selected).removeClass('ui-selected click-selected');
				index = times.indexOf(ui.selected.id);			
				if (index > -1) {
					times.splice(index, 1);
				}
			} 
			else {
				$(ui.selected).addClass('click-selected');
				times.push(ui.selected.id);
			}
		},
		
		unselected: function (event, ui) {
			$(ui.unselected).removeClass('click-selected');
		}
	});
}
//});


var current = 0;
$(function(){
	$('.calendar').hide();
	$('.time-sheet').hide();
	$('.events-info').show();
	if ($('.events-info').is(":visible")){
		current = 0;
	}
	else if ($('.calendar').is(":visible")){
		current = 1;
	}
	else if ($('.time-sheet').is(":visible")){
		current = 2;
	}
	
	$('.next').click(function(){
		name = $('#event-name').val();
		email = $('#email').val();
		if (current < 3) {
			if (current == 0){
				if( ( name.length != 0 ) && ( email.length != 0 ) && (validate_email(email))) {
					current += 1;
					change_screen(current);
				}
				else {
					if( name.length != 0 ){ $('#email').focus(); } else if( ! validate_email(email) ) { $('#email').focus(); } else { $('#event-name').focus(); }
				}
			}
			else if (current == 1){
				if( dates.length != 0 ){
					current += 1;
					change_screen(current);
				}
				else {
					$('.msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Oops!</strong> A date-less event doesn\'t sound quite right, does it?</div>');
				}
			}
		}
	});
	$('.prev').click(function(){
		if (current > 0) {
			current -= 1;
			change_screen(current);
		}
	});
		
});

function change_screen(current){
	if (current == 0){
		$('.calendar').hide();
		$('.time-sheet').hide();
		$('.events-info').show();	
	}
	else if (current == 1){
		$('.time-sheet').hide();
		$('.events-info').hide();	
		$('.calendar').show();
	}
	else if (current == 2){
		$('.events-info').hide();	
		$('.calendar').hide();
		$('.time-sheet').show();
		load_time_sheet();				
	}		
}

function toObject(arr) {
	var rv = {};
	for (var i = 0; i < arr.length; ++i)
		if (arr[i] !== undefined) rv[i] = arr[i];
	return rv;
}

function load_time_sheet(){
	data = 'dates=' + JSON.stringify(toObject(dates));
	$.ajax({
		url: "http://techsth.com/scl/scheduling/stuff/func.library/draw_time_sheet.php",
		type: "POST",
		data: data,
		cache: false,
		success: function(yada) {
			$('.time-sheet').html(yada);
			time_sheet_selectable();
		}
	});
}

function validate_email(email) { 
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA	-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
} 
