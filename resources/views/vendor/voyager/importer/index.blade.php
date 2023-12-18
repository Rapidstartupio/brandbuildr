@extends('voyager::master')

@section('page_title', 'Project Importer')

@section('page_header')
<div class="container-fluid">
    <h1 class="page-title">
        <i class="voyager-upload"></i> Project Importer
    </h1>
</div>
@stop

@section('content')
<div class="page-content browse container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="panel-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="project_file">
                                <h3>Select XLSX File</h3>
                            </label>
                            <input type="file" name="project_file" id="project_file" require="require">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Upload
                        </button>
                    </form>
                    <hr>
                    <h3>Import Logs</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>File Name</th>
                                <th>Created At</th>
                                <th>Done</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projectImporterLog as $log)
                            <tr>
                                <td>{{$log->id}}</td>
                                <td>{{$log->name}}</td>
                                <td>{{$log->created_at}}</td>
                                <td style="background-color:{{($log->done? 'green':'red')}} ;color:white">{{($log->done? 'Yes':'No')}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')

@stop

@section('javascript')

<script>
    $(document).ready(function() {

    });
</script>
@stop