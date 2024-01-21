<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Session;

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

    public function edit($id)
    {
        $user = auth()->user();
        $client = Client::where('user_id', $user->id)->where('id', $id)->firstOrFail();
        return view('theme::projects.clients.edit', compact('client'));
    }

    public function update(Request $request)
    {
        try {
            $user = auth()->user();
            $request->validate([
                'company_name' => 'required',
                'client_id' => 'required',
            ]);
            $client_id = $request->get('client_id');
            $imageName = null;
            $data = [
                'company_name' => $request->get('company_name'),
                'key_contact' => $request->get('key_contact'),
                'phone_number' => $request->get('phone_number'),
                'email' => $request->get('email'),
                'tag' => $request->get('tag'),
                'tag_color' => $request->get('tag_color') ?? '#000000',
                'tag_bg_color' => $request->get('tag_bg_color') ?? '#4d5562',
                'user_id' => auth()->user()->id
            ];
            if ($request->file('company_logo')) {
                $request->validate([
                    'company_logo' => 'required|image|mimes:svg,png,gif|max:800',
                ]);
                $image = $request->file('company_logo');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('storage/upload/projects/clients'), $imageName);
                $data['company_logo'] = $imageName;
            }


            $response = Client::where('id', $client_id)->where('user_id', $user->id)->update($data);
            Session::flash('message', 'Client Updated Successfully!');
            Session::flash('message_type', 'success');
            return response()->json([
                'status' => 'success',
                'data' => $response,
                'client_id' => $client_id,
                'message' => 'Client Updated Successfully!',
                'message_type' => 'success'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'message_type' => 'danger'
            ], 500);
        }
    }
}
