<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="css/project-document-fonts.css" rel="stylesheet">
    <link href="css/project-document.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
    </style>
</head>

<body style="">
    <div class="page page1">
        <div class="head">
            <div class="title" style=" ">
                <h1>{{$project->type}}<br>Document</h1>
                <h2>{{$user->name}}</h2>
            </div>
            <div class="logo">
                <img src="{{public_path($user->avatar())}}" alt="user" />
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="footer">
            <div class="footer-left">
                <b>{{$project->type}} Document</b> @if($user->company_name)Prepared by <b>{{$user->company_name}}</b>@endif<br>
                <b>DATE</b>: {{$documentDate}}
            </div>
            <div class="footer-right"><b>{{$user->website}}</b></div>
            <div class="clearfix"></div>
        </div>
    </div>
    @foreach(array_chunk(array_chunk($tableOfContents,17),2) as $pageContent)
    <div class="page-break"></div>
    <div class="page table-of-contents">
        <div style="padding: 2%;height:97%">
            <div class="inner" style="height:100%">
                <div class="top-page">
                    <div class="head">
                        <h2>Content</h2>
                    </div>
                </div>
                <div class="container">
                    <div class="content summary">

                        @foreach($pageContent as $columnContent)
                        <div class="column">
                            <ul class="leaders" style="overflow-x: hidden;">
                                @foreach($columnContent as $item)
                                <li class="{{$item->class}}">
                                    <span class="title leader-title">{{$item->title}}</span>
                                    <span class="">1</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="footer">
                    <div class="">
                        <b>{{$project->type}} Document</b> @if($user->company_name)Prepared by <b>{{$user->company_name}}</b>@endif
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @foreach($project->sections as $section)
    @if($documentType == 'summary' || $section->strategy_output)
    <div class="page-break"></div>
    <div class="page section-gard-page">
        <div class="">
            <div class="head">
                <h1>{{$section->name}}</h1>
            </div>
        </div>
        <div class="footer">
            <div class="footer-left">
                <b>{{$project->type}} Document</b> @if($user->company_name)Prepared by <b>{{$user->company_name}}</b>@endif<br>
                <b>DATE</b>: {{$documentDate}}
            </div>
            <div class="footer-right"><b>{{$user->website}}</b></div>
            <div class="clearfix"></div>
        </div>
    </div>
    @foreach($section->blocks as $block)
    @if($documentType == 'summary' || $block->strategy_output)
    <div class="page-break"></div>
    <div style="page-break-inside: avoid">
        <div class="page block-page">
            <div style="padding: 2%;height:97%">
                <div class="inner" style="height:100%">
                    <div class="top-page">
                        <div class="head">
                            <div class="head-left">
                                <h3>{{$section->name}}</h3>
                            </div>
                            <div class="head-right">
                                <h5>{{$project->type}}</h5>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="content">
                            <h3 class="title" style="font-size: larger;">{{$block->name}}</h3>
                            <table>
                                @foreach($block->questions as $question)
                                @if($question->answer && ($documentType == 'summary' || $question->strategy_document_output) )

                                @php

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

                                @endphp

                                <tr>
                                    <td class="" style="font-weight: bolder;font-size: large;vertical-align: top;">
                                        <span class="left_text" style="">{{$left_text}}</span>
                                        @if($sub_left_text)
                                        <span>{{$sub_left_text}}</span>
                                        @endif
                                    </td>
                                    <td style="font-size: small;">{!!$right_text!!}</td>
                                </tr>
                                @endif
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="footer">
                        <div class="">
                            <b>{{$project->type}} Document</b> @if($user->company_name)Prepared by <b>{{$user->company_name}}</b>@endif
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    @endif
    @endforeach

</body>

</html>