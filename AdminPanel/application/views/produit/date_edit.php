<script src="../jq/jquery-1.5.1.js"></script>
	<script src="<?php echo base_url(); ?>js/jq/ui/jquery.ui.core.js"></script>
	<script src="<?php echo base_url(); ?>js/jq/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url(); ?>js/jq/ui/i18n/jquery.ui.datepicker-fr.js"></script>
	<script src="<?php echo base_url(); ?>js/jq/ui/jquery.ui.datepicker.js"></script>
	<script>
	$(function() {
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		$( "#datepicker" ).datepicker( $.datepicker.regional[ "fr" ] );

		
	});
	</script>

