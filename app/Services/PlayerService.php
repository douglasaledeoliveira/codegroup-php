<?php

namespace App\Services;

use App\Repositories\PlayerRepository;

class PlayerService
{
    protected $repository;

    public function __construct(PlayerRepository $repository) {
        $this->repository = $repository;
    }

    public function getAllPlayers() {
        return $this->repository->getAll();
    }

    public function getPlayerById($id) {
        return $this->repository->findById($id);
    }

    public function createPlayer($data) {
        return $this->repository->create($data);
    }

    public function updatePlayer($id, $data) {
        $player = $this->repository->findById($id);
        return $this->repository->update($player, $data);
    }

    public function deletePlayer($id) {
        $player = $this->repository->findById($id);
        return $this->repository->delete($player);
    }
}