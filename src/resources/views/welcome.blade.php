<html>

<head>
	<title>TTTaaS - Welcome</title>

	@include('shared.assets')
</head>

<body>
	<div class="welcome-wrapper">
		<div class="welcome-header">
			<div>Tic-Tac-Toe</div>
			<div class="aas">as a service<span> </span></div>
		</div>

		<div class="welcome-buttons-wrapper">
			<div class="welcome-button start">
				<div class="shake-target">
					Start Game
				</div>
			</div>

			<div class="start-game-buttons-wrapper">
				<div class="start-game-button" data-size="3">
					<div class="shake-target">3x3</div>
				</div>
				<div class="start-game-button" data-size="4">
					<div class="shake-target">4x4</div>
				</div>
				<div class="start-game-button" data-size="5">
					<div class="shake-target">5x5</div>
				</div>
				<div class="start-game-button" data-size="10">
					<div class="shake-target">10x10</div>
				</div>
			</div>

			<div class="welcome-button find">
				Find Game
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.welcome-button.start').on('click', function() {
				$(this).find('div').text('Pick A Size');
				$('.start-game-buttons-wrapper').addClass('show');
			});

			$('.start-game-button').on('click', function() {
				// size is here
				const data = $(this).data();

				// tell ui its happening
				$(this).addClass('loading');
				$('.welcome-button.start').addClass('loading');
				$('.welcome-button.start div').text('Creating Game...');

				const started_at = Date.now();

				// not using $.post shorthand because we need to set a header for csrf
				$.ajax({
					url: '/game',
					type: 'post',
					data: data,
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					dataType: 'json',
					success: function(data) {
						const elapsed = Date.now() - started_at;

						// make sure its at least been a second, ux wise
						setTimeout(function() {
							window.location = `/game/${data.id}`;
						}, Math.max(0, 1000 - elapsed));
					}
				});
			});

			$('.welcome-button.find').on('click', function() {
				// go to page
				window.location = '/games';
			});
		});
	</script>
</body>

</html>
