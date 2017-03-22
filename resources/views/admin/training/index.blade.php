@extends('layouts.app')

@section('content')
    <div class="row">
        @include('layouts.admin-sidebar')
        <div class="col-lg-10 col-md-9 col-lg-offset-1-1">

            <div class="main">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-1 panel-trans">
                                <div class="panel-heading-1">
                                    <h4><i class="fa fa-certificate"></i>&nbsp;&nbsp;Training Modules</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-right">
                                <a style="cursor: pointer;" class="btn btn-success" data-toggle="modal" data-target="#CreateTrainingModal"><i class="fa fa-certificate"></i>&nbsp;&nbsp;Create Training</a>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="nav nav-tabs" role="tablist" style="background-color: white;">
                                <li role="presentation" class="active">
                                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Training Modules</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content" style="background-color: white;padding: 20px;border: #ddd solid 1px;">
                                <div role="tabpanel" class="tab-pane active" id="home">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                               @foreach($training as $t)
                                                <div class="col-sm-4 col-md-4">
                                                   <div class="panel panel-default">
                                                      <div class="panel-heading remove-background-image clearfix">
                                                         {{ $t->name }}
                                                      </div>
                                                      <div class="panel-body">
                                                         @if(count($t->topics) != 0)
                                                            <div class="page-header" style="margin: 0px;">
                                                               Topics
                                                            </div>
                                                            <br>

                                                            @foreach($t->topics as $trainingTopics)
                                                               <ul>
                                                                  <li>{{ ucwords(strtolower($trainingTopics->name), ' ') }}</li>
                                                               </ul>
                                                            @endforeach
                                                         @else
                                                            <div class="alert error-msg" role="alert" style="padding: 10px; font-size: 13px;">
                                                               No available topics to display...
                                                            </div>
                                                         @endif
                                                      </div>
                                                      <div class="panel-footer">
                                                         <a href="{{ route('training.show', $t->id) }}" class="btn btn-default-action btn-sm">View</a>
                                                         <button class="btn btn-danger btn-sm pull-right" style="border-radius: 0px;">Delete</button>
                                                      </div>
                                                   </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- CreateTrainingModal -->
    <div class="modal fade" id="CreateTrainingModal" tabindex="-1" role="dialog" aria-labelledby="CreateTrainingModal">
        <form role="form" action="{{ route('training.store') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Create Training</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="InputTrainingTitle" class="control-label col-md-4">Title:</label>
                            <div class="col-md-6">
                                <input id="InputTrainingTitle" name="name" type="text" class="form-control" input="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('file_path') ? ' has-error' : '' }}">
                            <label for="InputTrainingModule" class="col-md-4 control-label">Directory Name:</label>

                            <div class="col-md-6">
                                <input style="font-size: 14px;" id="InputTrainingModule" type="text" class="form-control" name="path">

                                @if ($errors->has('path'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('path') }}</strong>
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
@endsection
