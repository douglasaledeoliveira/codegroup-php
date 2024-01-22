<?php

namespace App\Repositories;

use App\Models\Player;

class PlayerRepository
{
    public function getAll() {
        return Player::paginate(10);
    }

    public function findById($id) {
        return Player::findOrFail($id);
    }

    public function create($data) {
        return Player::create($data);
    }

    public function update(Player $player, $data) {
        return $player->update($data);
    }

    public function delete(Player $player) {
        return $player->delete();
    }
}