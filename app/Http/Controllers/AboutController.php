<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Setting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $teams = Team::where('is_active', true)
            ->orderBy('order')
            ->get();

        $vision = Setting::getValue('about_vision');
        $mission = Setting::getValue('about_mission');
        $structure = Setting::getValue('about_structure');

        return view('about', compact('teams', 'vision', 'mission', 'structure'));
    }
}
