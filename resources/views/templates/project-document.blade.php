<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/project-document.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
    </style>
</head>

<body style="">
    <div class="page page1">
        <div class="head">
            <div class="title">
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
    @foreach(array_chunk(array_chunk($tableOfContents,15),2) as $pageContent)
    <div class="page-break"></div>
    <div class="page table-of-contents">
        <div class="top-page">
            <div class="head">
                <h1>Content</h1>
            </div>
        </div>
        <div class="container">
            <div class="content summary">
                @foreach($pageContent as $columnContent)
                <div class="column">
                    <ul>
                        @foreach($columnContent as $item)
                        <li class="{{$item->class}}">
                            <a href="#">
                                <span class="title">{{$item->title}}<span class="leaders" aria-hidden="true"></span></span>
                                <span class="page"><span class="visually-hidden">Page</span></span>
                            </a>
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
    @endforeach

    @foreach($project->sections as $section)
    @if($section->strategy_output)
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
    @if($block->strategy_output)
    <div class="page-break"></div>
    <div class="page block-page">
        <div class="top-page">
            <div class="head">
                <div class="head-left">
                    <h1>{{$section->name}}</h1>
                </div>
                <div class="head-right">
                    <h4>{{$project->type}}</h4>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="container">
            <div class="content">
                <h1 class="title">{{$block->name}}</h1>
                <table>
                    @foreach($block->questions as $question)
                    @if($question->strategy_document_output)
                    <tr>
                        <td><b>{{$question->question_ai}}</b></td>
                        <td>{{$question->answer}}</td>
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
    @endif
    @endforeach
    @endif
    @endforeach

</body>

</html>