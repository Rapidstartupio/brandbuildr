<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $clients = $user->clients;
        return view('theme::projects.clients.index', compact('clients'));
    }

    public function client($id)
    {
        $user = auth()->user();
        $client = Client::where('user_id', $user->id)->where('id', $id)->firstOrFail();
        $projects = $user->getProjects($id);
        return view('theme::projects.clients.page', compact('client', 'projects'));
    }

    public function create()
    {
        return view('theme::projects.clients.create');
    }
}
