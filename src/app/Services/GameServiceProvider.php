<?php

namespace App\Services;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class GameService {
	private static $instance;
	public static function getInstance() {
		if (!self::$instance) {
			self::$instance = new GameService();
		}

		return self::$instance;
	}

	public function createGame($size) {
		$game_state = [
			'id' => uniqid(),
			'size' => $size,
			'turn' => 'X',
			// cute way of creating multi-dimensional array
			'board' => array_fill(
				0,
				$size,
				array_fill(0, $size, null)
			)
		];

		// save it
		$this->saveGameState($game_state['id'], $game_state);

		return $game_state;
	}

	public function getGameState($id) {
		$raw_state = Storage::disk('local')->get(
			'games/'.$id.'.json'
		);

		return json_decode($raw_state, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
	}

	// all edits should be through named functions, so this is private
	private function saveGameState($id, $state) {
		Log::debug("Saving game state\n".print_r($state, true));

		Storage::disk('local')->put(
			'games/'.$id.'.json',
			json_encode(
				$state,

			)
		);
	}

	public function getListOfGames() {
		return array();
	}
}
