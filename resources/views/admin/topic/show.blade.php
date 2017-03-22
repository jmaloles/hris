@extends('layouts.app')

@section('content')
    <div class="row">
        <nav class="sidebar">
            <ul class="nav nav-pills nav-stacked col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-size: 14px;">

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('training.index') }}">
                        <i class="fa fa-certificate"></i>&nbsp;&nbsp;Training
                    </a>
                </li>

            </ul>
        </nav>

        <div class="col-lg-10 col-md-9 col-lg-offset-1-1">

            <div class="main">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{ route('training.show', $topic->training_id) }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                            <div class="dropdown pull-right">
                                <a class="btn btn-default-action dropdown-toggle" style="text-shadow: none !important;" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> Actions <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu" style="margin-top: 0.55rem; margin-right: -4rem;">
                                    <li><a style="cursor: pointer;" data-toggle="modal" data-target="#EditTrainingModal"><i class="fa fa-edit"></i>&nbsp;Edit Information</a></li>
                                    <li><a style="cursor: pointer;" data-toggle="modal" data-target="#AddLesson"><i class="fa fa-plus"></i>&nbsp;Add Lesson</a></li>
                                    <li><a style="cursor: pointer;" data-toggle="modal" data-target="#UploadLessonModal"><i class="fa fa-upload"></i>&nbsp;Upload Lesson</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-1 panel-trans">
                                <div class="panel-heading-1">
                                    <h4><i class="fa fa-certificate"></i>&nbsp;&nbsp;{{ $topic->name }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h1 class="text-center">{{ count($topic->lessons) }}&nbsp;&nbsp;<small>Lessons</small></h1>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h1 class="text-center">{{ $topic->getFileCountInsideDir() }}&nbsp;&nbsp;<small>Uploaded Files</small></h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="panel panel-trans">
                                <div class="panel-heading">
                                    <i class="fa fa-upload" aria-hidden="true"></i> Uploaded Files
                                </div>
                                <table class="table">
                                    <tbody>
                                    @foreach($topicModules as $module)
                                        <tr>
                                            <td>
                                                <label>{{ pathinfo($module, PATHINFO_BASENAME) }}</label>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="panel panel-trans">
                                <div class="panel-heading">
                                    <i class="fa fa-book" aria-hidden="true"></i> Lessons
                                </div>
                                @if(count($topic->lessons) != 0)
                                    <table class="table">
                                        <tbody>
                                        @foreach($topic->lessons as $lesson)
                                            <tr>
                                                <td><a href="{{ route('lessons.show', $lesson->id) }}">{{ ucwords(strtolower($lesson->name), " ") }}</a></td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm delete-topic"
                                                    data-toggle="modal" data-target="#DeleteTopicModal"
                                                    data-tn="{{ $lesson->name }}" data-href="{{ route('topics.destroy', $lesson->id) }}">DELETE</button>
                                                    <button class="btn btn-info btn-sm upload-lesson"
                                                    data-toggle="modal" data-target="#UploadLessonModal" data-lssId="{{ $lesson->id }}" data-href="{{ route('upload_lesson', $lesson->id) }}">
                                                        Upload Lesson
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="panel-body">
                                        <div class="alert error-msg" role="alert" style="padding: 10px; font-size: 13px; border-radius: 0px;">
                                            No available lessons to display...
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AddLesson Modal -->
    <div class="modal fade" id="AddLesson" tabindex="-1" role="dialog" aria-labelledby="AddLesson">
        <form role="form" action="{{ route('lessons.store') }}" class="form-horizontal" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="tId" value="{{ $topic->id }}">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Lesson</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="InputLessonName" class="control-label col-md-4">Lesson:</label>
                            <div class="col-md-6">
                                <input id="InputLessonName" name="name" type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>

                </div>
            </div>
        </form>
    </div>

    <!-- CreateTrainingModal -->
    <div class="modal fade" id="UploadLessonModal" tabindex="-1" role="dialog" aria-labelledby="UploadLessonModal">
        <form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data" id="UploadLessonForm">
            {{ csrf_field() }}
            <input type="hidden" name="lId" id="lId">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Upload Lesson</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group{{ $errors->has('module') ? ' has-error' : '' }}">
                            <label for="InputLessonModule" class="col-md-4 control-label">Lesson Module:</label>

                            <div class="col-md-6">
                                <input style="font-size: 14px;" id="InputLessonModule" type="file" class="form-control" name="module">

                                @if ($errors->has('module'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('module') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".upload-lesson").click(function() {
                document.getElementById("UploadLessonForm").action = $(this).data("href");
                document.getElementById("lId").value = $(this).data("lssid");
            })
        })
    </script>
@endsection
