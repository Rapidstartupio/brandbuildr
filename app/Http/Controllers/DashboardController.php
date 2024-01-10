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
        $userRoleId = auth()->user()->role_id;
        $projectType = ProjectType::where('active', 1)->whereIn('status', array('free', 'disable'))->orderBy('order', 'ASC')
            ->whereHas('roles', function ($query) use ($userRoleId) {
                $query->where('roles.id', $userRoleId);
            })->get();
        return view('theme::dashboard.explore-strategies', compact('projectType'));
    }

    public function deadlines()
    {
        $user = auth()->user();
        $projects = $user->getProjects();
        return view('theme::dashboard.deadlines', compact('projects'));
    }

    public function getStarted()
    {
        return view('theme::dashboard.get-started');
    }
}
