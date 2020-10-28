<?php

namespace App\Http\Controllers;

require(__DIR__ . './../../Services/GameServiceProvider.php');

use App\Http\Controllers\Controller;
use App\Services\GameService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GamesController extends Controller
{
    public function list() {
		$games = GameService::getInstance()->getListOfGames();
        return view('games.list', ['games' => $games]);
    }

    public function view($id) {
		$state = GameService::getInstance()->getGameState($id);
        return view('games.view', ['state' => $state]);
    }

    public function create(Request $request) {
		$game = GameService::getInstance()->createGame($request->size);
        return $game;
    }
}
