<?php
	function draw_time_sheet() {
	$startTime = 9;
	$endTime = 23;
?>
	<table class="time-sheet">
		<thead>
			<tr>
				<th>&nbsp;</th>
				<th class="time-slots-days">Nov 11</th>
				<th class="time-slots-days">Nov 12</th>
				<th class="time-slots-days">Nov 13</th>
				<th class="time-slots-days">Nov 14</th>
				<th class="time-slots-days">Nov 25</th>
				<th class="time-slots-days">Nov 28</th>
				<th class="time-slots-days">Nov 29</th>
				<th class="time-slots-days">Nov 30</th>
				<th class="time-slots-days">Oct 02</th>
			</tr>
		</thead>
		
		<tbody id="time-slots-selectable">
		<?php
			for( $i = $startTime; $i <= $endTime - 0.5; $i = $i + 0.5 ){
				$time = floor($i);
				$suffix = ($time < 12) ? ' AM' : ' PM';
				$time = ($time > 12) ? ($time - 12) : $time;
				if ( $i * 10 % 10 == 5 ){
					$time = ''; $suffix = '';
				}
				
		?>
			<tr>
				<th class="time-slots-time"><?php echo $time . $suffix; ?></th>
				<td class="slot <?php echo (strlen($time) == 0) ? 'time-slot-empty' : 'time-slot'; ?>"></td>
				<td class="slot <?php echo (strlen($time) == 0) ? 'time-slot-empty' : 'time-slot'; ?>"></td>
				<td class="slot <?php echo (strlen($time) == 0) ? 'time-slot-empty' : 'time-slot'; ?>"></td>
				<td class="slot <?php echo (strlen($time) == 0) ? 'time-slot-empty' : 'time-slot'; ?>"></td>
				<td class="slot <?php echo (strlen($time) == 0) ? 'time-slot-empty' : 'time-slot'; ?>"></td>
				<td class="slot <?php echo (strlen($time) == 0) ? 'time-slot-empty' : 'time-slot'; ?>"></td>
				<td class="slot <?php echo (strlen($time) == 0) ? 'time-slot-empty' : 'time-slot'; ?>"></td>
				<td class="slot <?php echo (strlen($time) == 0) ? 'time-slot-empty' : 'time-slot'; ?>"></td>
				<td class="slot <?php echo (strlen($time) == 0) ? 'time-slot-empty' : 'time-slot'; ?>"></td>
			</tr>
		<?php
			}
		?>
		</tbody>
	</table>
<?php
	}