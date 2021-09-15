
	</body>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.28/moment-timezone-with-data-10-year-range.min.js" integrity="sha256-HS6OzSyhM0rDG0PhZGwf/FvptBzIJnv4MgL2pe87xgg=" crossorigin="anonymous"></script>
				<script type="text/javascript" src="laout/js/jquery.countdown.min.js"></script>
				<script type="text/javascript">
					const countdownDate = moment.unix(1631462400);
					$('#season-countdown').countdown(countdownDate.toDate()).on('update.countdown', function(event) {
						$(this).html(event.strftime("Ascarus Season 3 will conclude in %-D days, %-H hours, %-M minutes, %-S seconds."));
					}).on('finish.countdown', function(event) {
						$(this).html('Ascarus Season 3 has concluded!');
					});
				</script>
</html>
