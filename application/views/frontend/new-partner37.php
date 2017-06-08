<?php
	$this->load->view('frontend/include-partner/header2');
?>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:70%">
        70% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner37">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-9 col-md-offset-2">
                <div id='calendar'></div>
            </div>
        </div>
    </div>    
</section>
<?php
	$this->load->view('frontend/include-partner/footer');
?>
<script src="<?php echo base_url('theme/front/assests/js/jQuery.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('theme/front/assests/js/moment.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('theme/front/assests/js/fullcalendar.js')?>" type="text/javascript"></script>
<script type="text/javascript">
    	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next',
				center: 'title',
				right: ''
			},
			defaultDate: '2017-05-12',
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			selectable: true,
			eventLimit: true, // allow "more" link when too many events
			events: {
				url: 'php/get-events.php',
				error: function() {
					$('#script-warning').show();
				}
			},
			loading: function(bool) {
				$('#loading').toggle(bool);
			},
			eventRender: function(event, el) {
				// render the timezone offset below the event title
				if (event.start.hasZone()) {
					el.find('.fc-title').after(
						$('<div class="tzo"/>').text(event.start.format('Z'))
					);
				}
			},
			dayClick: function(date) {
				console.log('dayClick', date.format());
			},
			select: function(startDate, endDate) {
				console.log('select', startDate.format(), endDate.format());
			}
		});
		// when the timezone selector changes, dynamically change the calendar option
		$('#timezone-selector').on('change', function() {
			$('#calendar').fullCalendar('option', 'timezone', this.value || false);
		});
        $(".fc-right").append("<button class='btn btn-default'>Unblock all dates</button>");
	});
</script>
</body>
</html>