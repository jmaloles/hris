@extends('layouts.app')

@section('content')
    <div class="row">
    
        <nav class="sidebar">
            <ul class="nav nav-pills nav-stacked col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-size: 14px;">
                <li class="nav-item active">
                    <a class="nav-link">
                        <i class="fa fa-file"></i>&nbsp;&nbsp;Disciplinary Action
                    </a>
                </li>
            </ul>
        </nav>

        <div class="col-lg-10 col-md-9 col-lg-offset-1-1">
            <div class="main">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{ route('disciplinary_action.index') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-1 panel-trans">
                                <div class="panel-heading-1">
                                    <h4>
                                        <i class="fa fa-file"></i>
                                        <i style="margin-left: -19px">
                                            <i class="fa fa-plus" style="color: white; font-size: 13px;"></i>
                                        </i>&nbsp;&nbsp;Create Disciplinary Action
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @if(Session::has('msg'))
                            <div class="col-lg-12">
                                <div class="alert alert-info" role="alert" style="font-size: 14px;">
                                    <i class="fa fa-info-circle"></i> {{ Session::get('msg') }}
                                </div>
                            </div>
                        @endif

                        <div class="col-lg-12">
                            <ul class="nav nav-tabs" role="tablist" style="background-color: white;">
                                <li role="presentation" class="active">
                                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Disciplinary Action</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content" style="background-color: white;padding: 20px;border: #ddd solid 1px;">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form action="{{ route('disciplinary_action.store') }}" class="form-horizontal" method="POST">
                                                {{ csrf_field() }}
                                                
                                                <div class="form-group">
                                                    <label for="InputDisciplinaryActionName" class="control-label col-md-3">Name</label>

                                                    <div class="col-lg-6">
                                                        <input style="text-transform: uppercase;" name="description" id="InputDisciplinaryActionName" type="text" class="form-control" value="{{ old('description') }}" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="InputDisciplinaryActionDaysBeforeRefresh" class="control-label col-md-3">Days Before Refresh</label>

                                                    <div class="col-lg-6">
                                                        <input name="days_before_refresh" id="InputDisciplinaryActionDaysBeforeRefresh" type="number" class="form-control" value="{{ old('days_before_refresh') }}">
                                                        <p class="help-block"><i>(Default: 60 Days Before Refresh)</i></p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <hr>
                                                </div>

                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="memorandum-template">
                                                            <h1>Disciplinary Action</h1>

                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-1">To:</label>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="InputSender" class="control-label col-md-1">From:</label>
                                                                <div class="col-lg-8">
                                                                    <input id="InputSender" name="sender" type="text" class="form-control" value="{{ Auth::user()->name }}">
                                                                    <p class="help-block"><i>(Default: The Name of the Authenticated User will be used as the Sender/From.)</i></p>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="InputSender" class="control-label col-md-1">Date:</label>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="InputTopic" class="control-label col-md-1">Topic:</label>
                                                                <div class="col-lg-8">
                                                                    <input id="InputTopic" name="topic" type="text" class="form-control">
                                                                    <p class="help-block"><i>(Default: The Name of the Disciplinary Action will be used as the topic.)</i></p>
                                                                </div>
                                                            </div>

                                                            <br><br>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-1">Message:</label>
                                                                <div class="col-lg-11"> 
                                                                    <textarea id="InputContent" name="content" class="form-control"
                                                                    style="margin: 0px -0.84375px 0px 0px; height: 366px; width: 795px;"></textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <hr>
                                                </div>

                                                <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save</button>
                                                
                                            </form>
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
@endsection
