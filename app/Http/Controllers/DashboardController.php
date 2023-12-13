<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectType;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function exploreStrategies()
    {
        $projectType = ProjectType::where('active', 1)->whereIn('status', array('free', 'disable'))->orderBy('order', 'ASC')->get();
        return view('theme::dashboard.explore-strategies', compact('projectType'));
    }
}
