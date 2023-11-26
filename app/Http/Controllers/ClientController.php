<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $clients = $user->clients;
        return view('theme::projects.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('theme::projects.clients.create');
    }
}
