<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\ProjectAnswer;
use App\Models\ProjectQuestion;
use App\Models\ProjectPrompt;
use App\Models\ProjectAiUsage;
use PhpParser\Node\Expr\Cast\Object_;

class OpenAiController extends Controller
{
    public function completions(Request $request)
    {
        try {
            $url =  "https://api.openai.com/v1/completions";
            $response = Http::withToken(env('OPENAI_API_KEY'))->post($url, $request->all());
            return response()->json($response->object()->choices,  $response->status());
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'message_type' => 'danger'
            ], 500);
        }
    }

    public function chat(Request $request)
    {
        try {
            $url =  "https://api.openai.com/v1/chat/completions";
            $response = Http::withToken(env('OPENAI_API_KEY'))->post($url, $request->all());
            return response()->json($response->object(),  $response->status());
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'message_type' => 'danger'
            ], 500);
        }
    }

    public function showSuggestion(Request $request)
    {

        try {
            if ($request->messages) {
                $messages = $request->messages;
                $projectId = $request->projectId;
                $user = auth()->user();
                $aiSuggest = $user->canUseAiSuggest($projectId);
                if (!$aiSuggest->result) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'You have reached the maximum number of AI usage allowed for this month in this project.',
                        'message_type' => 'warning',
                        'ai_ussage' => $aiSuggest
                    ], 400);
                }
                foreach ($messages as $key => $message) {
                    if (isset($message['prompt_id'])) {
                        $prompt_id = $message['prompt_id'];
                        $projectPrompt = ProjectPrompt::where('id', $prompt_id)->first();
                        $prompt = $projectPrompt->prompt;
                        $updatedPrompt = preg_replace_callback('/\{\{g-question:([\d.]+)\}\}/', function ($matches) use ($user, $projectId) {
                            $questionRef = $matches[1];
                            $res = ProjectQuestion::where('ref', $questionRef)->first();
                            // Check if  exists 
                            if (isset($res->question)) {
                                $answer = ProjectAnswer::where('user_id', $user->id)->where('project_question_id', $res->id)->where('project_id', $projectId)->first();
                                if (isset($answer->answer)) {
                                    return $res->question;
                                }
                            }
                            return '';
                        }, $prompt);
                        $prompt = $updatedPrompt;
                        $updatedPrompt = preg_replace_callback('/\{\{g-answer:([\d.]+)\}\}/', function ($matches) use ($user, $projectId) {
                            $questionRef = $matches[1];
                            $q = ProjectQuestion::where('ref', $questionRef)->first();
                            if (isset($q->id)) {
                                $res = ProjectAnswer::where('user_id', $user->id)->where('project_question_id', $q->id)->where('project_id', $projectId)->first();
                                // Check if exists
                                if (isset($res->answer)) {
                                    return $res->answer;
                                }
                            }
                            return "";
                        }, $prompt);
                        $prompt = $updatedPrompt;
                        $prompt = str_replace("{{question}}", $request->question, $prompt);
                        $prompt = str_replace("\n\n\n\n", '', $prompt);
                        $prompt = str_replace(":\n\n", '', $prompt);
                        $messages[$key]['content'] = $prompt;
                        if (trim($prompt)) {
                            unset($messages[$key]['prompt_id']);
                        } else {
                            unset($messages[$key]);
                        }
                    }
                }
            }
            $url =  "https://api.openai.com/v1/chat/completions";
            $data = [
                'messages' => $messages,
                'model' => "gpt-4-1106-preview"
            ];
            $response = Http::withToken(env('OPENAI_API_KEY'))->post($url, $data);
            if ($response->ok()) {
                ProjectAiUsage::create([
                    'project_question_id' => $request->question_id,
                    'project_id' => $projectId,
                    'user_id' => $user->id
                ]);
            }
            $return = (object) array_merge((array)$response->object(), array('ai_ussage' => $aiSuggest));
            return response()->json($return,  $response->status());
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'message_type' => 'danger'
            ], 500);
        }
    }
}
