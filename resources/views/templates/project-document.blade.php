<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>
    <style>
        .page-break {
            page-break-after: always;
        }

        body,
        html {
            padding: 0;
            margin: 0;
        }

        .p1 {
            background-color: #000000;
            color: #ffffff;
            width: 100%;
            height: 100%;
            position: absolute;
        }

        .p {
            background-color: #f1f2f2;
        }

        .p1 .title {
            /* top: 100px;
            position: absolute;
            left: 100px;
            max-width: 400px; */
            padding-top: 100px;
        }

        .p1 .logo {
            max-width: 200px;
            right: 100px;
            position: absolute;
            top: 100px;
        }

        .p1 .logo img {
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }

        .p1 .footer-text {
            border-top: 1px solid #ffffff;
            /* position: absolute;
            bottom: 20px;
            left: 100px;
            right: 100px; */

        }

        .p1 .footer-text table {
            /* width: 100%;
            font-size: 10px;
            line-height: 20px; */
        }

        .hidden {
            display: none;
        }

        .p2 {
            /* width: 100%;
            height: 100%;
            position: absolute; */


        }

        /* .p2 .container {
            margin: 20px;
            //padding: 30px 50px;
        background-color: #f1f2f2;
        //height: 95%;
        } */

        */ .p2 .head {
            background-color: #000000;
            color: #ffffff;
            padding: 50px 80px;
        }

        .p2 table {
            // width: 100%;
            font-size: large;
        }

        .p2 table td {
            //width: 50%;
        }

        ul {
            list-style-type: none;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            overflow: hidden;
        }

        .column {
            width: 48%;
            /* Adjust the width as needed */
            float: left;
            margin: 1%;
            box-sizing: border-box;
        }

        /* Clearfix to prevent container from collapsing */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        .head {
            position: absolute;
            background: black;
            color: white;
            width: 80%;
            padding: 2% 10%;
        }

        .content {
            margin-top: 200px;
        }


        .summary li {
            font-size: 14px;
        }

        li.section-title {
            color: #3145A2;
            font-size: 16px;
        }

        .footer-text {
            width: 90%;
            position: absolute;
            padding: 2% 5%;
            //background-color: #f1f2f2;
            bottom: 0;
            font-size: 10px;
        }

        .footer-text table {
            width: 100%;
        }

        .summary a {
            text-decoration: none;
            color: inherit;
            display: grid;
            grid-template-columns: auto max-content;
            align-items: end;
        }

        .summary>a>.page {
            text-align: right;
        }

        .visually-hidden {
            clip: rect(0 0 0 0);
            clip-path: inset(100%);
            height: 1px;
            overflow: hidden;
            position: absolute;
            width: 1px;
            white-space: nowrap;
        }

        .summary li>a>.title {
            position: relative;
            //overflow: hidden;
        }


        .summary li>a .leaders::after {
            position: absolute;
            padding-left: .25ch;
            /* content: " . . . . . . . . . . . . . . . . . . . "
                ". . . . . . . . . . . . . . . . . . . . . . . "
                ". . . . . . . . . . . . . . . . . . . . . . . "
                ". . . . . . . . . . . . . . . . . . . . . . . "
                ". . . . . . . . . . . . . . . . . . . . . . . "
                ". . . . . . . . . . . . . . . . . . . . . . . "
                ". . . . . . . . . . . . . . . . . . . . . . . "; */
            text-align: right;
        }
    </style>
    </style>
</head>

<body style="background-color: #f1f2f2;">
    <div>
        <div class="p1">
            <div class="container">
                <div class="title">
                    <h1>{{$project->type}}<br>Document</h1>
                    <h2>{{$user->name}}</h2>
                </div>
                <div class="logo">
                    <img src="{{public_path($user->avatar())}}" alt="user" />
                </div>
            </div>
            <div class="footer-text">
                <table>
                    <tr>
                        <td>
                            <div> <b>{{$project->type}} Document</b> Prepared by <b>&lt;YOUR COMPANY&gt;</b></div>
                            <div><b>DATE</b>: {{$documentDate}}</div>
                        </td>
                        <td>
                            <div><b>&lt;Website&gt;</b></div>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
        @foreach(array_chunk(array_chunk($tableOfContents,15),2) as $pageContent)
        <div class="page-break"></div>
        <div class="p">
            <div class="head">
                <h1>Content</h1>
            </div>
            <div class="container clearfix">
                <div class="content summary">
                    @foreach($pageContent as $columnContent)
                    <div class="column">
                        <ul>
                            @foreach($columnContent as $item)
                            <li class="{{$item->class}}">
                                <a href="#">
                                    <span class="title">{{$item->title}}<span class="leaders" aria-hidden="true"></span></span>
                                    <span class="page"><span></span><span class="visually-hidden">Page</span></span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                    <!-- <div class="column">
                        <ul>
                            <li class="section-title">Audience Persona #1..</li>
                            <li>Circumstances & Behaviours</li>
                            <li>Emotions & Buying Decisions.</li>
                            <li class="section-title">Competitors.</li>
                            <li>Competitor #1</li>
                            <li>Competitor #2</li>
                            <li>Competitor #3</li>
                            <li class="section-title">Brand Position</li>
                            <li>Brand Positioning Statement</li>
                            <li class="section-title">Brand Persona</li>
                            <li>Brand Personality & Archetypes</li>
                            <li>Brand Voice & Language</li>
                            <li>Brand Persona Interview</li>
                            <li class="section-title">Brand DNA</li>
                            <li>Brand Purpose Statement</li>
                        </ul>
                    </div>
                    <div class="column">
                        <ul>
                            <li>Brand Vision Statement</li>
                            <li>Brand Mission Statement</li>
                            <li>Brand Values</li>
                            <li class="section-title">Brand Messaging</li>
                            <li>Primary Core Message</li>
                            <li>Secondary Core Message</li>
                            <li>Discussion Topics</li>
                            <li class="section-title">Brand Storytelling</li>
                            <li>Storytelling Framework</li>
                            <li class="section-title">Brand Name & Tagline</li>
                            <li>Brand Name</li>
                            <li>Brand Tagline</li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <div class="footer-text">
                <table>
                    <tr>
                        <td>
                            <div> <b>{{$project->type}} Document</b> Prepared by <b>&lt;YOUR COMPANY&gt;</b></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        @endforeach
    </div>

</body>

</html>