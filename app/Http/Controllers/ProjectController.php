<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectType;
use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectAnswer;
use App\Models\ProjectQuestion;
use App\Models\UserProjectProgess;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

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
        $project = $user->getProject($id);
        if (!$project) return abort(404);
        //dd($project);
        return view('theme::projects.project-details', compact('project'));

        // $project = Project::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();
        // if (!$project->type) {
        //     return abort(404);
        // }
        // $sections = [];
        // $cSection = null;
        // $cBlock = null;

        // if (isset($project->type->sections)) {
        //     foreach ($project->type->sections as $key => $section) {
        //         if (isset($section->blocks)) {
        //             $blocks = [];
        //             $nb_done = 0;
        //             $cBlock = null;
        //             $lBlock = null;
        //             foreach ($section->blocks as $block) {
        //                 if (isset($block->questions) && count($block->questions) > 0) {
        //                     $sections[] = $section;
        //                     $blocks[] = $block;
        //                     if ($block->done()) {
        //                         $nb_done++;
        //                     } else {
        //                         if (!$cBlock) {
        //                             $cBlock = $block->id;
        //                         }
        //                         //$cSection = $section;
        //                         //$cBlock = $block;
        //                         //return view('theme::projects.project-details', compact('project', 'cSection', 'cBlock'));
        //                     }
        //                     $lBlock = $block->id;
        //                 }
        //             }
        //             $section->blocks = $blocks;
        //             if ($nb_done > 0) {
        //                 $section->blockProgress =  $nb_done / count($section->blocks) * 100;
        //             } else {
        //                 $section->blockProgress = 0;
        //             }
        //             if ($cBlock) {
        //                 $section->cBlock = $cBlock;
        //             } else {
        //                 $section->cBlock = $lBlock;
        //             }
        //         }
        //     }
        //     $project->type->sections = $sections;
        //     return view('theme::projects.project-details', compact('project', 'cSection', 'cBlock'));
        // }
        // return abort(404);
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
        $userProject = $user->getProjectDetails($id, $sectionId, $blockId);
        $section = $project->type->sections->where('id', $sectionId)->firstOrFail();
        $block = $section->blocks->where('id', $blockId)->firstOrFail();
        // $sections = [];
        // $blocks = [];

        // if (isset($section->blocks)) 
        //     foreach ($section->blocks as $block) {
        //         if (isset($block->questions) && count($block->questions) > 0) {
        //             $sections[] = $section;
        //             $blocks[] = $block;
        //         }
        //     }
        //     $section->blocks = $blocks;
        // }
        //$project->type->sections = $sections;
        $questions = array();
        $questionsLength = count($block->questions);
        foreach ($block->questions as $key => $question) {
            $next = $key + 1;
            $back = $key - 1;
            if ($key > $questionsLength - 2) {
                $next = "review";
            }
            if ($key == 0) {
                $back = null;
            }
            $answer = $question->answer($user->id, $id);
            $prompt = null;
            if (isset($question->prompt->prompt)) {
                $prompt = $question->prompt->prompt;
                $updatedPrompt = preg_replace_callback('/\{\{g-question:(\d+)\}\}/', function ($matches) {
                    $questionId = $matches[1];
                    $res = ProjectQuestion::find($questionId);
                    // Check if  exists 
                    if (isset($res->question)) {
                        return $res->question;
                    } else {
                        return '';
                    }
                }, $prompt);
                $prompt = $updatedPrompt;
                $updatedPrompt = preg_replace_callback('/\{\{g-answer:(\d+)\}\}/', function ($matches) use ($user, $id) {
                    $questionId = $matches[1];
                    $res = ProjectAnswer::where('user_id', $user->id)->where('project_question_id', $questionId)->where('project_id', $id);
                    // Check if exists
                    if (isset($res->answer)) {
                        return $res->answer;
                    } else {
                        return '';
                    }
                }, $prompt);
                $prompt = $updatedPrompt;
            }
            $questions[] = [
                'id' => $question->id,
                'question_ai' => $question->question_ai,
                'question' => $question->question,
                'answerInputType' => "text",
                'answerInputPlaceHolder' => "Type your answer here...",
                'next' => $next,
                'back' => $back,
                'examples' => $question->examples,
                'resources' => $question->resources,
                'prompt' => $prompt,
                'required' => true,
                'suggest_logs' => [],
                'answer' => (isset($answer->answer) ? $answer->answer : null)
            ];
        }
        if (empty($questions)) {
            return false;
        };
        return response()->json([
            'status' => 'success',
            'project' => $userProject->project,
            'section' => $userProject->section,
            'block' => $block,
            'questions' => $questions
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

    public function submitBlock(Request $request)
    {
        try {
            $user = auth()->user();
            $projectId = $request->projectId;
            $updated = false;
            if ($request->data && !empty($request->data)) {
                foreach ($request->data as $key => $question) {
                    if ($question['question'] && isset($question['answer']) &&  $question['answer']) {
                        $projectAnswer = ProjectAnswer::where('user_id', $user->id)->where('project_question_id', $question['id'])->first();
                        if (!$projectAnswer) {
                            $projectAnswer = new ProjectAnswer();
                        }
                        $projectAnswer->project_question_id = $question['id'];
                        $projectAnswer->answer = $question['answer'];
                        $projectAnswer->user_id = $user->id;
                        $projectAnswer->logs = serialize($question['suggest_logs']);
                        $projectAnswer->project_id = $projectId;
                        $projectAnswer->save();
                        $updated = true;
                    }
                }
            }
            if ($updated) {

                $progress = UserProjectProgess::where([
                    'user_id' => $user->id,
                    'category' => 'block',
                    'id_of_category' => $request->blockId,
                    'project_id' => $projectId
                ])->first();

                if (!$progress) {
                    $progress = new UserProjectProgess();
                    $progress->user_id = $user->id;
                    $progress->category = 'block';
                    $progress->id_of_category = $request->blockId;
                    $progress->project_id = $projectId;
                }
                $progress->done = 1;
                $progress->validate_at = now()->toDateTimeString();
                $progress->save();

                Session::flash('message', 'Successfully Submitted!');
                Session::flash('message_type', 'success');
                return response()->json([
                    'status' => 'success',
                    'data' => true,
                    'message' => 'Successfully Submitted!',
                    'message_type' => 'success'
                ], 200);
            } else {
                return response()->json([
                    'status' => 'success',
                    'data' => true,
                    'message' => 'Answers data is empty!',
                    'message_type' => 'warning'
                ], 200);
            }
        } catch (Exception $e) {
            log::info($e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Internal server error!',
                'message_type' => 'danger'
            ], 500);
        }
    }

    public function questionById(Request $request)
    {
        try {
            $question = null;
            if (isset($request->id)) {
                $question = ProjectQuestion::find($request->id);
            }
            return response()->json([
                'status' => 'success',
                'question' => $question
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Internal server error!',
                'message_type' => 'danger'
            ], 500);
        }
    }
}
