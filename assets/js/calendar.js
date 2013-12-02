$(function(){
	$('#selectable').selectable({ 
		// Select which elements to put selectable on. Just select the days that are active- they have the class .calendar-day 
		filter:'.calendar-day', 
		selected: function(event, ui){ 
			//console.log(event); 
			//console.log(ui); 
			//var s = $(this).find('.ui-selected'); 
			//console.log(s); 
		} 
	});
});

$( "#selectable" ).bind( "mousedown", function ( e ) {
    e.metaKey = true;
} ).selectable();



$(function(){
	$('#time-slots-selectable').selectable({ 
		// Select which elements to put selectable on. Just select the days that are active- they have the class .slot
		filter:'.slot', 
		selected: function(event, ui){ 
			console.log(event); 
			//console.log(ui); 
			//var s = $(this).find('.ui-selected'); 
			//console.log(s); 
		} 
	});
});


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
		if (current < 3) {
			current += 1;
			change_screen(current);
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
	}		
}