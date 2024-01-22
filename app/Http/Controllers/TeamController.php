<?php 

namespace App\Http\Controllers;

use App\Services\TeamSorterService;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TeamController extends Controller
{
    protected $teamSorter;

    public function __construct(TeamSorterService $teamSorter)
    {
        $this->teamSorter = $teamSorter;
    }

    public function showSortTeamsForm(Request $request) {
        $sort = $request->query('sort', 'name');
        $order = $request->query('order', 'asc');

        $players = Player::orderBy($sort, $order)->get();
        return view('players', compact('players', 'sort', 'order'));
    }

    public function sortTeams(Request $request)
    {
        $confirmedPlayerIds = $request->input('player_ids', []);
        $playersPerTeam = $request->input('players_per_team', 5);

        try {
            $sortedTeams = $this->teamSorter->sortPlayersIntoTeams($confirmedPlayerIds, $playersPerTeam);
            return view('teams', compact('sortedTeams'));
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}