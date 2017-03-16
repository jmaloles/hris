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
                                    <h4><i class="fa fa-certificate"></i>&nbsp;&nbsp;{{ strtoupper($training->title) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @if(Session::has('msg'))
                            <div class="col-lg-12">
                                <div class="alert alert-info" role="alert">
                                    {{ Session::get('msg') }}
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-right">
                                <a href="{{ route('trainings.create') }}" class="btn btn-success"><i class="fa fa-certificate"></i>&nbsp;&nbsp;Create Trainings Schedule</a>
                            </div>
                        </div>
                    </div>

                    <br> --}}

                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="nav nav-tabs" role="tablist" style="background-color: white;">
                                <li role="presentation" class="active">
                                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Create</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content" style="background-color: white;padding: 20px;border: #ddd solid 1px;">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form action="{{ route('add_lessons', $training->id) }}" class="form-horizontal" method="POST">
                                                {{ csrf_field() }}

                                                <div class="form-group">
                                                    <label for="" class="col-md-4 control-label">Topic:</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" name="topic" value="{{ old('topic') }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <hr>
                                                </div>

                                                <button type="submit" class="btn btn-success">Save</button>
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
