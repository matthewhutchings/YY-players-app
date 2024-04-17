<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of all players.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = 10;

        $query = Player::query();

        $nationalities = $this->getNationalities();

        if ($request->has('name') && $request->name != '') {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        if ($request->has('nationality') && !empty($request->nationality)) {
            $query->where('nationality_id', $request->nationality);
        }

        $players = $query->paginate($perPage);

        return view('players.index', compact('players', 'nationalities'));
    }
    /**
     * Display the specified player.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = Player::findOrFail($id);

        return view('players.show', compact('player'));
    }

    /**
     * Display the unique nationalities.
     *
     * @param  int  $id
     * @return Player
     */
    public function getNationalities()
    {
        return Player::select('nationality_name', 'nationality_id')
            ->whereNotNull('nationality_name')
            ->whereNotNull('nationality_id')
            ->where('nationality_name', '!=', '')
            ->where('nationality_id', '!=', '')
            ->distinct()
            ->get();
    }
}
