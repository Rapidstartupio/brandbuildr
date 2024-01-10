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
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ProjectDocument;
use Carbon\Carbon;
use App\Traits\Upload;
use App\Models\ProjectImporterLog;
use App\Imports\ProjectImporter;
use App\Models\ProjectBlock;
use App\Models\ProjectPrompt;
use App\Models\ProjectSection;
use App\Models\ProjectDeadline;
use Excel;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    use Upload;
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['initOnboarding']]);
    }

    public function index()
    {
        $user = auth()->user();
        $projects = $user->getProjects();
        return view('theme::projects.index', compact('projects'));
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
                // 'key_contact' => 'required',
                // 'phone_number' => 'required',
                // 'email' => 'required|email',
                // 'company_logo' => 'required|image|mimes:svg,png,gif|max:800',
            ]);
            $imageName = null;
            if ($request->file('company_logo')) {
                $request->validate([
                    'company_logo' => 'required|image|mimes:svg,png,gif|max:800',
                ]);
                $image = $request->file('company_logo');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('storage/upload/projects/clients'), $imageName);
            }
            $data = [
                'company_name' => $request->get('company_name'),
                'key_contact' => $request->get('key_contact'),
                'phone_number' => $request->get('phone_number'),
                'email' => $request->get('email'),
                'tag' => $request->get('tag'),
                'tag_color' => $request->get('tag_color') ?? '#000000',
                'tag_bg_color' => $request->get('tag_bg_color') ?? '#9BDAB4',
                'company_logo' => $imageName,
                'user_id' => auth()->user()->id
            ];

            $response = Client::create($data);
            Session::flash('message', 'Client Created Successfully!');
            Session::flash('message_type', 'success');
            return response()->json([
                'status' => 'success',
                'data' => $response,
                'client_id' => $response->id,
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

    public function projectTypes()
    {
        $projectTypes = ProjectType::where('active', 1)->whereIn('status', array('free', 'disable'))->get();
        return view('theme::projects.project-types', compact('projectTypes'));
    }

    public function getProjectTypes()
    {
        $userRoleId = auth()->user()->role_id;
        $projectTypes = ProjectType::where('active', 1)->whereIn('status', array('free', 'disable'))
            ->whereHas('roles', function ($query) use ($userRoleId) {
                $query->where('roles.id', $userRoleId);
            })
            ->get();
        return response()->json([
            'status' => 'success',
            'projectTypes' => $projectTypes
        ], 200);
    }
    public function saveProject(Request $request)
    {
        try {
            $user = auth()->user();
            if (!$user->canCreateProject()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'You have reached the maximum number of projects allowed for this month.',
                    'message_type' => 'danger'
                ], 500);
            }
            $validatedDate = $request->validate([
                'type_id' => 'required',
                'name' => 'required|max:40',
                'client_id' => 'required',
                'description' => 'required',
                //'deadline' => 'required',
                //'start_date' => 'required',
                //'end_date' => 'required',
            ]);
            $projectType = ProjectType::find($request->get('type_id'));
            if ($projectType) {
                $userRoleId = $user->role_id;
                if (!$projectType->roles->contains('id', $userRoleId)) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'The Project Type ID is not available.',
                        'message_type' => 'danger'
                    ], 500);
                }
            }
            $data = [
                'type_id' => $request->get('type_id'),
                'name' => $request->get('name'),
                'client_id' => $request->get('client_id'),
                'description' => $request->get('description'),
                //'deadline' => $request->get('deadline'),
                // 'start_date' => $request->get('start_date'),
                // 'end_date' => $request->get('end_date'),
                'user_id' => auth()->user()->id
            ];

            $response = Project::create($data);
            if ($deadlines = $request->get('deadlines')) {
                foreach ($deadlines as $deadline) {
                    ProjectDeadline::create([
                        "project_id" => $response->id,
                        "end_date" => $deadline['end_date'],
                        "milestone" => $deadline['milestone'],
                    ]);
                }
            }
            Session::flash('message', 'Project Created Successfully!');
            Session::flash('message_type', 'success');
            return response()->json([
                'status' => 'success',
                'data' => $response,
                'message' => 'Project Created Successfully!',
                'message_type' => 'success',
                'project_id' => $response->id
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

    public function projectAiAssist($id, $sectionId, $blockId, $review = null)
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
            if ($review == 'review') {
                $review = true;
            } else {
                $review = false;
            }
            return view('theme::projects.ai-assist', compact('id', 'sectionId', 'blockId', 'review'));
        } catch (\Illuminate\Support\ItemNotFoundException $e) {
            return abort(404);
        }
    }
    public function projectAiAssistData($id, $sectionId, $blockId)
    {
        $user = auth()->user();
        $project = Project::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();
        $userProject = $user->getProjectDetails($id, $sectionId, $blockId);
        $section = $project->type->sections->where('id', $sectionId)->firstOrFail();
        $block = $section->blocks->where('id', $blockId)->firstOrFail();
        $questions = array();
        $questionsLength = count($block->questions);


        $chatbot_system_message = setting('openai.chatbot_system_message', 'You are a helpful Brand Builder assistant from who helps companies and entreprenuers build their businesse.');
        $chatbot_initial_user_message = "";
        if ($project->type->ref_project_type_output && $project->client_id) {
            $refProject = Project::where([
                'user_id' => $user->id,
                'client_id' => $project->client_id,
                'type_id' => $project->type->ref_project_type_output
            ])->first();
            $refProjectType = ProjectType::where([
                'id' => $project->type->ref_project_type_output
            ])->first();
            if ($refProject && $refProjectType) {
                $projectDocument = ProjectDocument::where(['user_id' => $user->id, 'project_id' => $refProject->id, ['outputs', '!=', null]])->orderByRaw('FIELD(type,"summary") DESC')->first();
                if ($projectDocument && !empty($projectDocument->outputs)) {
                    $chatbot_initial_user_message = "Here is the output from the $refProjectType->name for your reference: \n";
                    foreach ($projectDocument->outputs as $output) {
                        if ($output['answer']) {
                            $chatbot_initial_user_message .=  $output['question'] . " : " . $output['answer'] . "\n";
                        }
                    }
                }
            }
        }


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
                $updatedPrompt = preg_replace_callback('/\{\{g-question:([\d.]+)\}\}/', function ($matches) use ($user, $id) {
                    $questionRef = $matches[1];
                    $res = ProjectQuestion::where('ref', $questionRef)->first();
                    // Check if  exists 
                    if (isset($res->question)) {
                        $answer = ProjectAnswer::where('user_id', $user->id)->where('project_question_id', $res->id)->where('project_id', $id)->first();
                        if (isset($answer->answer)) {
                            return $res->question;
                        } else {
                            return "{{question:$questionRef}}";
                        }
                    } else {
                        return '';
                    }
                }, $prompt);
                $prompt = $updatedPrompt;
                $updatedPrompt = preg_replace_callback('/\{\{g-answer:([\d.]+)\}\}/', function ($matches) use ($user, $id) {
                    $questionRef = $matches[1];
                    $q = ProjectQuestion::where('ref', $questionRef)->first();
                    if (isset($q->id)) {
                        $res = ProjectAnswer::where('user_id', $user->id)->where('project_question_id', $q->id)->where('project_id', $id)->first();
                        // Check if exists
                        if (isset($res->answer)) {
                            return $res->answer;
                        }
                    }
                    return "{{answer:$questionRef}}";
                }, $prompt);
                $prompt = $updatedPrompt;
            }
            $chatbot_previousMessages = [];
            if ($chatbot_system_message) {
                $chatbot_previousMessages[] = ['role' => 'system', 'content' => $chatbot_system_message];
            }
            if ($chatbot_initial_user_message) {
                $chatbot_previousMessages[] = ['role' => 'user', 'content' => $chatbot_initial_user_message];
            }


            $questions[] = [
                'id' => $question->id,
                'ref' => $question->ref,
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
                'answer' => (isset($answer->answer) ? $answer->answer : null),
                'chatbot_previousMessages' => $chatbot_previousMessages,
                'chatbot_messages' => [],
                'on_review' => false
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
            'questions' => $questions,
            'chatbot_system_message' => $chatbot_system_message,
            'chatbot_initial_user_message' => $chatbot_initial_user_message
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
                        $projectAnswer = ProjectAnswer::where([
                            'user_id' => $user->id,
                            'project_question_id' => $question['id'],
                            'project_id' => $projectId
                        ])->first();
                        if (!$projectAnswer) {
                            $projectAnswer = new ProjectAnswer();
                            $projectAnswer->project_question_id = $question['id'];
                            $projectAnswer->user_id = $user->id;
                            $projectAnswer->project_id = $projectId;
                        }

                        $projectAnswer->answer = $question['answer'];
                        $projectAnswer->logs = serialize($question['suggest_logs']);
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

    public function downloadProjectDocument(Request $request)
    {
        try {
            $user = auth()->user();
            $outputs = [];
            $projectId = $request->projectId;
            $documentType = $request->documentType;
            //$projectId = 15;
            $currentDate = Carbon::now();
            $documentDate = $currentDate->format('m/Y');
            //$project = Project::where(['user_id' => $user->id, 'id' => $projectId])->firstOrFail();
            $project = $user->getProject($projectId, true);
            $tableOfContents = [];
            if (!count((array)$project)) {
                abort(404);
            }
            foreach ($project->sections as $section) {
                if ($documentType == 'summary' || $section->strategy_output) {
                    $tableOfContents[] = (object)[
                        'title' => $section->name,
                        'class' => 'section-title'
                    ];
                    foreach ($section->blocks as $block) {
                        if ($documentType == 'summary' || $block->strategy_output) {
                            $tableOfContents[] = (object)[
                                'title' => $block->name,
                                'class' => ''
                            ];
                            foreach ($block->questions as $question) {
                                if ($documentType == 'summary' || $question->strategy_document_output) {
                                    if ($question->answer) {
                                        $question->answer = str_replace('-', '&bull;', $question->answer);

                                        $left_text = $question->question_ai;
                                        $right_text = $question->answer;
                                        $sub_left_text = "";
                                        $settings = $question->strategy_document_settings;
                                        $settings = json_decode($settings);
                                        if ($settings) {
                                            if (isset($settings->skip) && $settings->skip) {
                                                continue;
                                            }
                                            if (isset($settings->override_left_section) && $settings->override_left_section) {
                                                $left_text = $question->{$settings->override_left_section};
                                            }
                                            if (isset($settings->override_right_section) && $settings->override_right_section) {
                                                $right_text = "";
                                                $refQuestion = \App\Models\ProjectQuestion::where('ref', $settings->override_right_section)->first();
                                                if ($refQuestion) {
                                                    $refAnswer = $refQuestion->answer($user->id, $project->id);
                                                    if ($refAnswer && isset($refAnswer->answer)) {
                                                        $right_text = $refAnswer->answer;
                                                    }
                                                }
                                            }
                                            if (isset($settings->sub_left_section) && $settings->sub_left_section) {
                                                $refQuestion = \App\Models\ProjectQuestion::where('ref', $settings->sub_left_section)->first();
                                                if ($refQuestion) {
                                                    $refAnswer = $refQuestion->answer($user->id, $project->id);
                                                    if ($refAnswer && isset($refAnswer->answer)) {
                                                        $sub_left_text = $refAnswer->answer;
                                                    }
                                                }
                                            }
                                        }

                                        $outputs[] = [
                                            'question_ai' => $question->question_ai,
                                            'question' => $question->question,
                                            'answer' => $question->answer,
                                            'block' => $block->name,
                                            'section' => $section->name,
                                            'strategy_document_settings' => $question->strategy_document_settings,
                                            'left_text' => $left_text,
                                            'right_text' => $right_text,
                                        ];
                                    }
                                }
                            }
                        }
                    }
                }
            }
            //$tableOfContents = array_chunk($tableOfContents, 15);
            //dd($tableOfContents);

            $data = [
                'user' => $user,
                'project' => $project,
                'documentDate' => $documentDate,
                'tableOfContents' => $tableOfContents,
                'documentType' => $documentType
            ];
            //dd($project);
            // dd(array_chunk(array_chunk($tableOfContents, 15), 2));
            // if (isset($request->view)) {
            //     return view('templates.project-document', compact('project', 'user', 'documentDate', 'tableOfContents', 'documentType'));
            // }
            $pdf = Pdf::loadView('templates.project-document', $data);

            //return $pdf->stream();
            $name = uniqid() . "_" . $projectId . "_" . $documentType;
            $path =  public_path("storage/project-documents/") . "$name.pdf";
            $pdf->save($path);
            $projectDocument = ProjectDocument::create([
                'user_id' => $user->id,
                'project_id' => $projectId,
                'name' => $name,
                'path' => $path,
                'outputs' => $outputs,
                'type' => $documentType
            ]);
            //return redirect("/storage/project-documents/$name.pdf");
            if ($projectDocument) {
                return response()->json([
                    'status' => 'success',
                    'file' => "/project-documents/$name.pdf"
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'error'
                ], 500);
            }
        } catch (\Exception $e) {
            log::info($e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'message_type' => 'danger'
            ], 500);
        }
    }

    public function importer()
    {
        $projectImporterLog = ProjectImporterLog::orderBy('created_at', 'DESC')->get();
        return view('vendor.voyager.importer.index', compact('projectImporterLog'));
    }

    public function uploadImporter(Request $request)
    {
        ini_set('memory_limit', '1024M');
        $validatedDate = $request->validate([
            'project_file' => 'required'
        ]);

        if ($request->hasFile('project_file')) {
            $path = $this->UploadFile($request->file('project_file'), 'projects-files', 'local');
            $log = ProjectImporterLog::create([
                'path' => $path,
                'name' => $request->file('project_file')->getClientOriginalName(),
            ]);
            $array = Excel::toArray(new ProjectImporter, storage_path('app/' . $path));
            // ProjectImporterLog::where('id', $log->id)->update([
            //     'data' => $array
            // ]);
            foreach ($array[0] as $row) {
                if (!$row["item"]) {
                    break;
                }

                //Project Type
                $projectType = ProjectType::where('name', $row['admin_name'])->first();
                if (!$projectType) {
                    $projectType = ProjectType::create([
                        'name' => $row['admin_name'],
                        'slug' => $row['project_slug'],
                        'description' => $row['project_description'],
                        'status' => 'Disable',
                        'user_id' => 0
                    ]);
                }
                $projectSection = ProjectSection::where([
                    'name' => $row['block_name'],
                    'project_type_id' => $projectType->id
                ])->first();

                if (!$projectSection) {
                    $projectSection = ProjectSection::create([
                        'name' => $row['block_name'],
                        'project_type_id' => $projectType->id,
                        'slug' => $row['block_slug'],
                        'order' => $row['block_order'],
                    ]);
                }

                $projectBlock = ProjectBlock::where([
                    'name' => $row['section_name'],
                    'project_section_id' => $projectSection->id
                ])->first();

                if (!$projectBlock) {
                    $projectBlock = ProjectBlock::create([
                        'name' => $row['section_name'],
                        'admin_name' => $row['admin_name'],
                        'project_section_id' => $projectSection->id,
                        'slug' => $row['section_slug'],
                        'order' => $row['section_order'],
                    ]);
                }
                if ($row['prompt']) {
                    $projectPrompt = ProjectPrompt::where([
                        'name' => $row['prompt_name']
                    ])->first();

                    if (!$projectPrompt) {
                        $projectPrompt = ProjectPrompt::create([
                            'name' => $row['prompt_name'],
                            'prompt' => $row['prompt'],
                        ]);
                    }
                }



                $projectQuestion = ProjectQuestion::where([
                    'question' => $row['question_user_facing'],
                    'project_block_id' => $projectBlock->id
                ])->first();

                if (!$projectQuestion) {
                    $projectQuestion = ProjectQuestion::create([
                        'question_ai' => $row['question_ai'],
                        'question' => $row['question_user_facing'],
                        'project_block_id'  => $projectBlock->id,
                        'order' => $row['question_order'],
                        'project_prompt_id' => isset($projectPrompt->id) ? $projectPrompt->id : null,
                        'ref' => $row['item'],
                        'strategy_document_output' => ($row['strategy_document_output'] == 'Yes' ? 1 : 0),
                    ]);
                }
            }
            ProjectImporterLog::where('id', $log->id)->update([
                'done' => 1
            ]);
        }
        return redirect()->route('admin.project-importer')->with(['message' => "'File Uploaded Successfully'", 'alert-type' => 'success']);
    }

    public function projectDocuments($projectId)
    {
        $user = auth()->user();
        $project = Project::where(['user_id' => $user->id, 'id' => $projectId])->firstorFail();
        return view('theme::projects.project-documents', compact('projectId'));
    }
    public function initOnboarding()
    {
        $projectType = ProjectType::where(['slug' => 'brand-strategy'])->firstOrFail();
        $section = $projectType->sections->where('order', 1)->firstOrFail();
        $block = $section->blocks->where('order', 1)->firstOrFail();

        $questions = array();
        $questionsLength = count($block->questions);


        $chatbot_system_message = setting('openai.chatbot_system_message', 'You are a helpful Brand Builder assistant from who helps companies and entreprenuers build their businesse.');

        foreach ($block->questions as $key => $question) {
            $next = $key + 1;
            $back = $key - 1;
            if ($key > $questionsLength - 2) {
                $next = "review";
            }
            if ($key == 0) {
                $back = null;
            }
            //$answer = $question->answer($user->id, $id);
            $prompt = null;
            if (isset($question->prompt->prompt)) {
                $prompt = $question->prompt->prompt;
                $updatedPrompt = preg_replace_callback('/\{\{g-question:([\d.]+)\}\}/', function ($matches) {
                    $questionRef = $matches[1];
                    return "{{question:$questionRef}}";
                }, $prompt);
                $prompt = $updatedPrompt;
                $updatedPrompt = preg_replace_callback('/\{\{g-answer:([\d.]+)\}\}/', function ($matches) {
                    $questionRef = $matches[1];
                    return "{{answer:$questionRef}}";
                }, $prompt);
                $prompt = $updatedPrompt;
            }
            $chatbot_previousMessages = [];
            if ($chatbot_system_message) {
                $chatbot_previousMessages[] = ['role' => 'system', 'content' => $chatbot_system_message];
            }


            $questions[] = [
                'id' => $question->id,
                'ref' => $question->ref,
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
                'answer' => null,
                'chatbot_previousMessages' => $chatbot_previousMessages,
                'chatbot_messages' => [],
            ];
        }
        if (empty($questions)) {
            return false;
        };


        return response()->json([
            'status' => 'success',
            'section' => $section,
            'block' => $block,
            'questions' => $questions,
            'chatbot_system_message' => $chatbot_system_message
        ], 200);
    }
}
