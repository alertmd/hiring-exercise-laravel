@extends('layouts.app')

@section('title', 'Game')

@section('content')
    <div class="game-wrapper">
		<div class="game-board">
		@foreach ($state['board'] as $row)
			<div class="row">
			@foreach ($row as $cell)
				<div class="cell">
					{{ ["X", "O", ""][rand(0, 2)] }}
				</div>
			@endforeach
			</div>
		@endforeach
		</div>
	</div>
@endsection
