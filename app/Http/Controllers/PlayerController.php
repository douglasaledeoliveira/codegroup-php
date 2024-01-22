<?php

namespace App\Http\Controllers;

use App\Services\PlayerService;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    protected $playerService;

    public function __construct(PlayerService $playerService) {
        $this->playerService = $playerService;
    }

    public function index() {
        $players = $this->playerService->getAllPlayers();
        return view('players.index', compact('players'));
    }

    public function create() {
        return view('players.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'skill_level' => 'required|integer|min:1|max:5',
            'is_goalkeeper' => 'required|boolean'
        ]);

        $this->playerService->createPlayer($validatedData);
        return redirect()->route('players.index');
    }

    public function edit($id) {
        $player = $this->playerService->getPlayerById($id);
        return view('players.edit', compact('player'));
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'skill_level' => 'required|integer|min:1|max:5',
            'is_goalkeeper' => 'required|boolean'
        ]);

        $this->playerService->updatePlayer($id, $validatedData);
        return redirect()->route('players.index');
    }

    public function destroy($id) {
        $this->playerService->deletePlayer($id);
        return redirect()->route('players.index');
    }
}