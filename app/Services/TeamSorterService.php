<?php

namespace App\Services;

use App\Models\Player;
use Illuminate\Support\Collection;

class TeamSorterService
{
    public function sortPlayersIntoTeams(array $confirmedPlayerIds, int $playersPerTeam)
    {
        if (count($confirmedPlayerIds) < $playersPerTeam * 2) {
            throw new \Exception("Número insuficiente de jogadores confirmados para o sorteio.");
        }

        $confirmedPlayers = Player::findMany($confirmedPlayerIds);

        $goalkeepers = $confirmedPlayers->filter(function ($player) {
            return $player->is_goalkeeper;
        });
        $fieldPlayers = $confirmedPlayers->reject(function ($player) {
            return $player->is_goalkeeper;
        });

        $teams = $this->initializeTeams($confirmedPlayers->count(), $playersPerTeam);

        $this->distributeGoalkeepers($teams, $goalkeepers);
        $this->distributeFieldPlayers($teams, $fieldPlayers);

        return $teams;
    }

    private function distributeGoalkeepers(&$teams, $goalkeepers)
    {
        foreach ($goalkeepers as $goalkeeper) {
            // Encontrar o primeiro time sem goleiro
            $foundTeam = false;
            foreach ($teams as &$team) {
                if (!$team['goalkeeper']) {
                    $team['goalkeeper'] = $goalkeeper;
                    $foundTeam = true;
                    break;
                }
            }

            if (!$foundTeam) {
                break;
            }
        }
    }

    private function initializeTeams(int $totalPlayers, int $playersPerTeam)
    {
        $numberOfTeams = ceil($totalPlayers / $playersPerTeam);
        $teams = [];

        for ($i = 0; $i < $numberOfTeams; $i++) {
            $teams[] = [
                'goalkeeper' => null,
                'fieldPlayers' => []
            ];
        }

        return $teams;
    }

    private function distributeFieldPlayers(&$teams, $fieldPlayers)
    {
        $sortedPlayers = $fieldPlayers->sortByDesc('skill_level');

        foreach ($sortedPlayers as $player) {
            $teamIndex = $this->findTeamWithLowestSkillSum($teams);
            $teams[$teamIndex]['fieldPlayers'][] = $player;
        }
    }

    private function findTeamWithLowestSkillSum($teams)
    {
        $lowestSkillSum = null;
        $teamIndex = 0;

        foreach ($teams as $index => $team) {
            $fieldPlayers = collect($team['fieldPlayers']);

            $currentSkillSum = $fieldPlayers->sum('skill_level');

            if (is_null($lowestSkillSum) || $currentSkillSum < $lowestSkillSum) {
                $lowestSkillSum = $currentSkillSum;
                $teamIndex = $index;
            }
        }

        return $teamIndex;
    }

}