<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectType;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeType(Request $request)
    {
        $validatedDate = $request->validate([
            'name' => 'required'
        ]);

        $data = [
            'name' => $request->get('name'),
            'user_id' => auth()->user()->id
        ];

        ProjectType::create($data);

        return redirect('/settings/project-types')->with(['message' => 'Project Type Created Successfully!', 'message_type' => 'success']);
    }

    public function projectType($id)
    {
        $section = "project-type";
        $card_header = false;
        $projectType = ProjectType::where('user_id', auth()->user()->id)->findOrFail($id);
        //dd($projectType);
        return view('theme::settings.index', compact('section', 'card_header', 'projectType'));
    }

    public function create()
    {
        return view('theme::projects.create');
    }

    public function saveClient(Request $request)
    {
        try {
            $validatedDate = $request->validate([
                'company_name' => 'required',
                'key_contact' => 'required',
                'phone_number' => 'required',
                'email' => 'required|email',
            ]);

            $data = [
                'company_name' => $request->get('company_name'),
                'key_contact' => $request->get('key_contact'),
                'phone_number' => $request->get('phone_number'),
                'email' => $request->get('email'),
                'user_id' => auth()->user()->id
            ];

            $response = Client::create($data);
            return response()->json([
                'status' => 'success',
                'data' => $response,
                'message' => 'Client Created Successfully!',
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

    public function getUserClients()
    {
        $clients = auth()->user()->clients;
        return response()->json([
            'status' => 'success',
            'clients' => $clients
        ], 200);
    }
    public function getProjectTypes()
    {
        $projectTypes = ProjectType::where('active', 1)->whereIn('status', array('free', 'disable'))->get();
        return response()->json([
            'status' => 'success',
            'projectTypes' => $projectTypes
        ], 200);
    }
    public function saveProject(Request $request)
    {
        try {
            $validatedDate = $request->validate([
                'type_id' => 'required',
                'name' => 'required',
                'client_id' => 'required',
                'description' => 'required',
                'deadline' => 'required',
            ]);

            $data = [
                'type_id' => $request->get('type_id'),
                'name' => $request->get('name'),
                'client_id' => $request->get('client_id'),
                'description' => $request->get('description'),
                'deadline' => $request->get('deadline'),
                'user_id' => auth()->user()->id
            ];

            $response = Project::create($data);
            Session::flash('message', 'Project Created Successfully!');
            Session::flash('message_type', 'success');
            return response()->json([
                'status' => 'success',
                'data' => $response,
                'message' => 'Project Created Successfully!',
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

    public function project($id)
    {
        $user = auth()->user();
        $project = Project::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();
        return view('theme::projects.project-details', compact('project'));
    }

    public function projectAiAssist($id)
    {
        $user = auth()->user();
        $project = Project::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();
        return view('theme::projects.ai-assist', compact('project'));
    }
}
