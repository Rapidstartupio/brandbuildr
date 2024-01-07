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
                <b>{{$project->type}} Document</b> Prepared by <b>&lt;YOUR COMPANY&gt;</b><br>
                <b>DATE</b>: {{$documentDate}}
            </div>
            <div class="footer-right"><b>&lt;Website&gt;</b></div>
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
                        <b>{{$project->type}} Document</b> Prepared by <b>&lt;YOUR COMPANY&gt;</b>
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
                <b>{{$project->type}} Document</b> Prepared by <b>&lt;YOUR COMPANY&gt;</b><br>
                <b>DATE</b>: {{$documentDate}}
            </div>
            <div class="footer-right"><b>&lt;Website&gt;</b></div>
            <div class="clearfix"></div>
        </div>
    </div>
    @foreach($section->blocks as $block)
    @if($documentType == 'summary' || $block->strategy_output)
    <div class="page-break"></div>
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
                            <tr>
                                <td style="font-weight: bolder;font-size: large;">{{$question->question_ai}}</td>
                                <td style="font-size: small;">{!!$question->answer!!}</td>
                            </tr>
                            @endif
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="footer">
                    <div class="">
                        <b>{{$project->type}} Document</b> Prepared by <b>&lt;YOUR COMPANY&gt;</b>
                    </div>
                    <div class="clearfix"></div>
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