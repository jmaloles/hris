@extends('layouts.app')

@section('content')
    <div class="row">
    
        <nav class="sidebar">
            <ul class="nav nav-pills nav-stacked col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-size: 14px;">
                <li class="nav-item {{ Request::is('memoranda*') ? 'active' : '' }} ">
                    <a class="nav-link" @if(Request::route()->getName() == 'memoranda*') style="cursor: default;" @else  href="{{ route('memoranda.index') }}" @endif>
                        <i class="fa fa-file"></i>&nbsp;&nbsp;Memoranda
                    </a>
                </li>
            </ul>
        </nav>

        <div class="col-lg-10 col-md-9 col-lg-offset-1-1">
            <div class="main">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{ route('memoranda.index') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
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
                                        </i>&nbsp;&nbsp;Create Memorandum
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
                                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Memoranda</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content" style="background-color: white;padding: 20px;border: #ddd solid 1px;">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form action="{{ route('memoranda.store') }}" class="form-horizontal" method="POST">
                                                {{ csrf_field() }}
                                                
                                                <div class="form-group">
                                                    <label for="InputMemorandumName" class="control-label col-md-3">Name</label>

                                                    <div class="col-lg-6">
                                                        <input name="description" id="InputMemorandumName" type="text" class="form-control" value="{{ old('description') }}" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="InputMemorandumDaysBeforeRefresh" class="control-label col-md-3">Days Before Refresh</label>

                                                    <div class="col-lg-6">
                                                        <input name="days_before_refresh" id="InputMemorandumDaysBeforeRefresh" type="number" class="form-control" value="{{ old('days_before_refresh') }}" required>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <hr>
                                                </div>

                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="memorandum-template">
                                                            <h1>MEMO</h1>

                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-1">To:</label>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="InputSender" class="control-label col-md-1">From:</label>
                                                                <div class="col-lg-3">
                                                                    <input id="InputSender" name="sender" type="text" class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="InputSender" class="control-label col-md-1">Date:</label>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="InputTopic" class="control-label col-md-1">RE:</label>
                                                                <div class="col-lg-3">
                                                                    <input id="InputTopic" name="topic" type="text" class="form-control">
                                                                </div>
                                                            </div>

                                                            <br><br>

                                                            <div class="form-group">
                                                                <div class="col-lg-offset-1">
                                                                    <div class="col-lg-12">
                                                                        <textarea id="InputContent" name="content" class="form-control"
                                                                        style="margin: 0px -0.84375px 0px 0px; height: 366px; width: 795px;"></textarea>
                                                                    </div>
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
