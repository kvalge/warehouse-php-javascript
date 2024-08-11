<div class="date"><?php echo date("Y/m/d") ?></div>
<h4>Received this month:</h4>
<h4>Delivered this month:</h4>
<h4>State of Occupancy:</h4>
<h4>Approaching deadlines:</h4>
<h4>Exceeded deadlines:</h4>
<hr>
<h4>Occupancy prediction:</h4>
<div class="date"><?php echo date("Y/m/d", strtotime("+1 day")); ?>: </div>
<div class="date"><?php echo date("Y/m/d", strtotime("+7 days")); ?>: </div>
<div class="date"><?php echo date("Y/m/d", strtotime("+30 days")); ?>: </div>