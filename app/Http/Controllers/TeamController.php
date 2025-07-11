<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $leadershipTeam = TeamMember::where('team_type', 'leadership')->get();
        $educationTeam = TeamMember::where('team_type', 'education')->get();
        $technologyTeam = TeamMember::where('team_type', 'technology')->get();
        $trainingTeam = TeamMember::where('team_type', 'training')->get();
        $researchTeam = TeamMember::where('team_type', 'research')->get();
        $supportTeam = TeamMember::where('team_type', 'support')->get();

        return view('teams', compact(
            'leadershipTeam',
            'educationTeam',
            'technologyTeam',
            'trainingTeam',
            'researchTeam',
            'supportTeam'
        ));
    }
} 