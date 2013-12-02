<?php
	$startTime = 9;
	$endTime = 23;
	$dates = (array) json_decode(stripcslashes($_POST['dates']));
	sort($dates);
?>
	<table class="time-sheet">
		<thead>
			<tr>
				<th>&nbsp;</th>
				<?php
					foreach($dates as $date){
						$gate = explode('.', $date);
				?>
						<th class="time-slots-days"><?php echo date('M j', strtotime($gate[0] . "/" . $gate[1])); ?></th>
				<?php
					}
				?>
			</tr>
		</thead>
		
		<tbody id="time-slots-selectable">
		<?php
			for( $i = $startTime; $i <= $endTime - 0.5; $i = $i + 0.5 ){
				$time = floor($i);
				$suffix = ($time < 12) ? ' AM' : ' PM';
				$time = ($time > 12) ? ($time - 12) : $time;
		?>
			<tr>
				<th class="time-slots-time"><?php echo ( $i * 10 % 10 != 5 ) ? $time . $suffix : ''; ?></th>
				<?php
					foreach($dates as $date){
				?>
						<td class="slot <?php echo (strlen($time) == 0) ? 'time-slot-empty' : 'time-slot'; ?>" id="<?php echo $date . '-' . $i; ?>"></td>
				<?php
					}
				?>
			</tr>
		<?php
			}
		?>
		</tbody>
	</table>