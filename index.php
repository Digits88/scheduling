<?php
	require_once('stuff/func.library/draw_calendar.php');
	require_once('stuff/func.library/draw_time_sheet.php');	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">		
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>
	    SCL Scheduling
	</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	
	<link rel="stylesheet" href="./assets/css/style.css">
	<link rel="stylesheet" href="./assets/css/calendar.css">
</head>
<body>
<div class="container content">

	<div class="row">
		<div class="col-md-4">&nbsp;</div>
		<div class="col-md-4">
			<h1>Schedule Something</h1>
		</div>
		<div class="col-md-4">&nbsp;</div>
	</div><!--/.row -->
	
	<div class="row">
		<div class="events-info">
                	<form autocomplete="on" id="form-events-info"> 
                                <p> 
                                    <label for="eventname" class="uname" data-icon="u">Event Name:</label>
                                    <input id="eventname" name="eventname" required="required" type="text" placeholder="Batman Vs Joker Rap Battle">
                                </p>
                                
                                <p>
                                    <label for="email" class="youmail" data-icon="e" > Your Email:</label>
                                    <input id="email" name="email" required="required" type="email" placeholder="batman@gotham.com"> 
                                </p>
                            </form>
                        </div>
                
		</div><!--/.events-info -->
		<div class="calendar">
			<?php
				$date = array(date('n'), date('Y'));
				echo draw_calendar($date[0], $date[1]);
			?>
		</div><!--/.calendar -->
		
		<div class="time-sheet">
			<?php
				draw_time_sheet();	
			?>
		</div><!--/.calendar -->
	
	</div><!--/.row -->
	<div class="row">
		<div class="col-md-4"><div class="prev reflect">&nbsp;</div></div>
		<div class="col-md-4">&nbsp;</div>
		<div class="col-md-4"><div class="next reflect">&nbsp;</div></div>
	</div><!--/.row -->
	
</div><!--/.container -->
	
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
	<script src="./assets/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
	<script src="./assets/js/calendar.js"></script>
</body>
</html>