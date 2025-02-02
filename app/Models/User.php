<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Wave\User as Authenticatable;
use App\Models\Project;
use Carbon\Carbon;
use App\Models\ProjectAiUsage;
use Illuminate\Support\Facades\DB;
use Spatie\Onboard\Concerns\GetsOnboarded;

class User extends Authenticatable implements \Spatie\Onboard\Concerns\Onboardable
{
    use Notifiable;
    use GetsOnboarded;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'verification_code',
        'verified',
        'trial_ends_at',
        'theme',
        'theme_dark_logo',
        'theme_light_logo',
        'theme_text_color',
        'theme_line_color',
        'phone_number',
        'position',
        'company_name',
        'owner',
        'address',
        'website',
        'country',
        'city',
        'street',
        'zip_code',
        'paddle_customer_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'trial_ends_at' => 'datetime',
    ];

    public function projectTypes()
    {
        return $this->hasMany('\App\Models\ProjectType')->orderBy('created_at', 'DESC');
    }
    public function clients()
    {
        return $this->hasMany('\App\Models\Client')->orderBy('created_at', 'DESC');
    }

    public function projects()
    {
        return $this->hasMany('\App\Models\Project')->orderBy('created_at', 'DESC');
    }

    function projectsList()
    {
        $projects = $this->hasMany('\App\Models\Project')
            ->join('clients', 'projects.client_id', '=', 'clients.id')
            ->join('project_types', 'projects.type_id', '=', 'project_types.id')
            ->join('project_sections', 'project_sections.project_type_id', '=', 'project_types.id')
            ->join('project_blocks', 'project_blocks.project_section_id', '=', 'project_sections.id')
            ->join('project_questions', 'project_questions.project_block_id', '=', 'project_blocks.id')
            ->orderBy('projects.created_at', 'DESC')
            ->select('projects.*');
        return $projects;
    }

    public function getProjects($clientId = null, $type = null, $status = null, $deadline = null)
    {
        $conditions = [];

        if ($clientId) {
            $conditions['client_id'] = $clientId;
        }

        if ($type) {
            $conditions['type_id'] = $type;
        }

        if ($deadline) {
            $conditions['deadline'] = $deadline;
        }

        if ($conditions) {
            $projects = Project::where('user_id', $this->id)->where($conditions)->get();
        } else {
            $projects = $this->projects->all();
        }

        $p = [];
        if ($projects) {
            foreach ($projects as $project) {
                $tmp = $this->getProject($project->id);

                if ($tmp) {
                    if ($status) {
                        $projectStatus = ($tmp->progress == 100) ? 'Completed' : 'In Progress';
                        if ($status != $projectStatus) continue;
                    }
                    $p[] = $tmp;
                }
            }
        }
        return (object)$p;
    }

    function formatDeadline($start_date, $end_date)
    {
        if (!$start_date) {
            if ($end_date) {
                $end = Carbon::parse($end_date);
                $formattedDeadline = $end->format('d M');
            } else {
                $formattedDeadline = "";
            }
            return $formattedDeadline;
        }
        $start = Carbon::parse($start_date);
        $end = Carbon::parse($end_date);

        if ($start->month == $end->month) {
            // Same month
            $formattedDeadline = $start->format('d') . '-' . $end->format('d M');
        } else {
            // Different months
            $formattedDeadline = $start->format('d M') . ' - ' . $end->format('d M');
        }

        return $formattedDeadline;
    }

    public function getProject($id, $returnQuestions = false)
    {
        $p =  [];
        $project = Project::where(['user_id' => $this->id, 'id' => $id])->first();
        $projectProgress = 0;
        $s_done = 0;
        if ($project) {
            //dd($project->type);
            $p['id'] = $project->id;
            $p['type_id'] = $project->type_id;
            $p['name'] = $project->name;
            $p['client_id'] = $project->client_id;
            $p['description'] = $project->description;
            $p['user_id'] = $project->user_id;
            $p['created_at'] = $project->created_at;
            //$p['start_date'] = $project->start_date ? date('d-m-Y', strtotime($project->start_date)) : "";
            //$p['end_date'] = $project->end_date ? date('d-m-Y', strtotime($project->end_date)) : "";
            $p['start_date'] = $project->start_date;
            $p['end_date'] = $project->end_date;
            $p['deadline'] = $project->deadline;
            $p['formattedDeadline'] = "";
            if ($project->deadline) {
                $end = Carbon::parse($project->deadline);
                $p['formattedDeadline'] = $end->format('d-M-y');
            }





            // $deadline = $project->deadlines()->first();

            // if ($deadline) {
            //     $end = Carbon::parse($deadline->end_date);
            //     $p['deadline'] = $deadline->end_date;
            //     $p['formattedDeadline'] = $end->format('d-M-y');
            // }
            // if ($project->end_date) {
            //     $end = Carbon::parse($project->end_date);
            //     $p['formattedDeadline'] = $end->format('d-M-y');
            // } else {

            // }
            //$p['formattedDeadline'] = $this->formatDeadline($p['start_date'], $p['end_date']);
            //Add Sections
            //$p['sections'] = [];
            $sections = [];
            $_cSection = null;
            $_cBlock = null;
            //$cBlock = null;
            if (isset($project->client)) {
                $p['client'] = $project->client;
            }
            if (isset($project->type)) {
                //Add Type attributes
                $p['type'] = $project->type->name;
                $p['type_icon_svg_path_d'] = $project->type->icon_svg_path_d;
                $p['type_svg'] = $project->type->svg;
                foreach ($project->type->sections as $section) {
                    $b = [];
                    $b_done = 0;
                    $cBlock = null;
                    $strategyOutputSection = false;
                    foreach ($section->blocks as $block) {
                        $q = [];
                        $strategyOutput = false;
                        if ($returnQuestions) {
                            foreach ($block->questions as $question) {
                                $answer = null;
                                $a = $question->answer($this->id, $id);
                                if (isset($a->answer)) {
                                    $answer = $a->answer;
                                }
                                $q[] = (object)[
                                    'id' => $question->id,
                                    'question_ai' => $question->question_ai,
                                    'question' => $question->question,
                                    'order' => $question->order,
                                    'answer' => $answer,
                                    'strategy_document_output' => $question->strategy_document_output,
                                    'strategy_document_settings' => $question->strategy_document_settings
                                ];
                                if ($question->strategy_document_output) {
                                    $strategyOutput = true;
                                }
                            }
                        }


                        if (count($block->questions) > 0) {
                            $done = $block->done($id);
                            if ($done) {
                                $b_done++;
                            } else if (!$cBlock) {
                                $cBlock = $block->id;
                            }
                            $b[] = (object)[
                                'id' => $block->id,
                                'name' => $block->name,
                                'order' => $block->order,
                                'questions' => (object)$q,
                                'done' => $done,
                                'strategy_output' => $strategyOutput
                            ];
                            if ($strategyOutput) {
                                $strategyOutputSection = true;
                            }
                        }
                    }
                    if (!$cBlock && end($b) && end($b)) {
                        $cBlock = end($b)->id;
                    }
                    if (!empty($b)) {
                        $progress = 0;
                        if ($b_done > 0) {
                            $progress = number_format($b_done / count($b) * 100);
                        }
                        $sections[] = (object)[
                            'id' => $section->id,
                            'name' => $section->name,
                            'slug' => $section->slug,
                            'order' => $section->order,
                            'blocks' => (object)$b,
                            'progress' => $progress,
                            'done' => $b_done,
                            'cBlock' => $cBlock,
                            'strategy_output' => $strategyOutputSection
                        ];
                        if (!$_cSection && $progress != 100) {
                            $_cSection = $section->id;
                            $_cBlock = $cBlock;
                        }
                        if ($progress == 100) {
                            $s_done++;
                        }
                    }
                }
                $p['sections'] = (object)$sections;
                $p['cSection'] = $_cSection;
                $p['cBlock'] = $_cBlock;
                if ($s_done > 0) {
                    $projectProgress = number_format($s_done / count($sections) * 100);
                }
                $p['progress'] = $projectProgress;
            }
        }
        return (object)$p;
    }

    public function getProjectDetails($id, $sectionId = null, $blockId = null)
    {
        $p =  [];
        $_section =  null;
        $_block = null;
        $project = Project::where(['user_id' => $this->id, 'id' => $id])->first();
        if ($project) {
            //dd($project->type);
            $p['id'] = $project->id;
            $p['type_id'] = $project->type_id;
            $p['name'] = $project->name;
            $p['client_id'] = $project->client_id;
            $p['description'] = $project->description;
            $p['user_id'] = $project->user_id;
            if (isset($project->client)) {
                $p['client'] = $project->client;
            }
            //Add Sections
            //$p['sections'] = [];
            $sections = [];
            if (isset($project->type)) {
                //Add Type attributes
                $p['type'] = $project->type->name;
                foreach ($project->type->sections as $section) {
                    $b = [];
                    $b_done = 0;
                    $cBlock = null;
                    foreach ($section->blocks as $block) {
                        //$q = [];
                        // foreach ($block->questions as $question) {
                        //     $answer = null;
                        //     $a = $question->answer($this->id);
                        //     if (isset($a->answer)) {
                        //         $answer = $a->answer;
                        //     }
                        //     $q[] = (object)[
                        //         'id' => $question->id,
                        //         'question_ai' => $question->question_ai,
                        //         'question' => $question->question,
                        //         'order' => $question->order,
                        //         '$answer' => $answer,
                        //     ];
                        // }
                        if (count($block->questions) > 0) {
                            $done = $block->done($id);
                            if ($done) {
                                $b_done++;
                            } else if (!$cBlock) {
                                $cBlock = $block->id;
                            }

                            $tmp = (object)[
                                'id' => $block->id,
                                'name' => $block->name,
                                'order' => $block->order,
                                //'questions' => (object)$q,
                                'done' => $done
                            ];
                            $b[] = $tmp;
                            if ($blockId  && $blockId == $block->id) {
                                $_block = $tmp;
                            }
                        }
                    }
                    if (!$cBlock && end($b) && end($b)) {
                        $cBlock = end($b)->id;
                    }
                    if (!empty($b)) {
                        $progress = 0;
                        if ($b_done > 0) {
                            number_format($progress = $b_done / count($b) * 100);
                        }
                        $tmp = (object)[
                            'id' => $section->id,
                            'name' => $section->name,
                            'slug' => $section->slug,
                            'order' => $section->order,
                            'blocks' => (object)$b,
                            'progress' => $progress,
                            'done' => $b_done,
                            'cBlock' => $cBlock
                        ];
                        $sections[] = $tmp;
                        if ($sectionId && $sectionId == $section->id) {
                            $_section = $tmp;
                        }
                    }
                }
                $p['sections'] = (object)$sections;
            }
        }
        $return = [
            'project' => $p,
            'block' => $_block,
            'section' => $_section
        ];
        return (object)$return;
    }

    public function canCreateProject()
    {
        $userRole = $this->role; // Assuming 'role' is the relationship to the Role model

        $maxProjectsAllowed = $userRole->max_projects;
        $userProjectsCount = $this->projects()
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count(); // Assuming 'projects' is the relationship to the Project model

        return $userProjectsCount < $maxProjectsAllowed;
    }

    public function canUseAiSuggest($projectId)
    {
        $userRole = $this->role; // Assuming 'role' is the relationship to the Role model

        $maxAiSuggestUssageAllowed = $userRole->max_ai_suggest_usage;
        $userAiSuggestUssageCount = ProjectAiUsage::where('project_id', $projectId)
            ->where('user_id', $this->id)
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count(); // Assuming 'projects' is the relationship to the Project model
        $res = $userAiSuggestUssageCount < $maxAiSuggestUssageAllowed;
        return (object) [
            'userAiSuggestUssageCount' => $userAiSuggestUssageCount,
            'maxAiSuggestUssageAllowed' => $maxAiSuggestUssageAllowed,
            'result' => $res
        ];
    }

    public function logo()
    {
        $logo = null;
        if ($this->theme_dark_logo && $this->theme == "dark") {
            $logo = asset("/storage/logos/$this->theme_dark_logo");
        } else if ($this->theme_light_logo && $this->theme == "light") {
            $logo = asset("/storage/logos/$this->theme_light_logo");
        }
        return $logo;
    }
}
