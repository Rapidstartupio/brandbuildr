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
        $projectType = ProjectType::where('user_id', auth()->user()->id)->where('id', $id)->firstOrFail();
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
        $current_section = $project->type->sections->firstOrFail();
        $current_block = $current_section->blocks->first();
        if (!$project or !$current_block or !$current_section) {
            return abort(404);
        }
        return view('theme::projects.project-details', compact('project', 'current_section', 'current_block'));
    }

    public function projectAiAssist($id, $sectionId, $blockId)
    {
        try {
            $user = auth()->user();
            $project = Project::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();
            $section = $project->type->sections->where('id', $sectionId)->firstOrFail();
            $section = $project->type->sections->where('id', $sectionId)->firstOrFail();
            $block = $section->blocks->where('id', $blockId)->firstOrFail();
            if (count($block->questions) == 0) {
                return abort(404);
            }
            return view('theme::projects.ai-assist', compact('id', 'sectionId', 'blockId'));
        } catch (\Illuminate\Support\ItemNotFoundException $e) {
            return abort(404);
        }
    }
    public function projectAiAssistData($id, $sectionId, $blockId)
    {
        //question:
        //             "What specific industry does your business operate in?",
        //         subQuestion:
        //             "Briefly describe what type of business you're building a brand for",
        //         answerInputType: "text",
        //         answerInputPlaceHolder:
        //             "We Operate in the food and beverage industry",
        //         next: 2,
        //         back: null,
        $user = auth()->user();
        $project = Project::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();
        $section = $project->type->sections->where('id', $sectionId)->firstOrFail();
        $block = $section->blocks->where('id', $blockId)->firstOrFail();
        $questions = array();
        $questionsLength = count($block->questions);
        foreach ($block->questions as $key => $question) {
            $next = $key + 1;
            $back = $key - 1;
            if ($key > $questionsLength - 2) {
                $next = null;
            }
            if ($key == 0) {
                $back = null;
            }
            $questions[] = [
                'question_ai' => $question->question_ai,
                'question' => $question->question,
                'answerInputType' => "text",
                'answerInputPlaceHolder' => "Type your answer here...",
                'next' => $next,
                'back' => $back
            ];
        }
        if (empty($questions)) {
            return false;
        };
        return response()->json([
            'status' => 'success',
            'project' => $project,
            'section' => $section,
            'block' => $block,
            'questions' => $questions,
            //'sections' => $project->type->sections
        ], 200);
    }
    public function getUserProject($id)
    {
        $user = auth()->user();
        $project = Project::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();

        return response()->json([
            'status' => 'success',
            'project' => $project,
            'type' => $project->type,
            'sections' => $project->type->sections
        ], 200);
    }
}
