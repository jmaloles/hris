@extends('layouts.app')

@section('content')
    <div class="row">
        @include('layouts.admin-sidebar')
        <div class="col-lg-10 col-md-9 col-lg-offset-1-1">

            <div class="main">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{ route('admin_user_applicant_index') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-1 panel-trans">
                                <div class="panel-heading-1">
                                    <h4><i class="fa fa-user"></i>&nbsp;&nbsp;{{ $applicant->fullName() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--<div class="row">
                        <div class="col-lg-12">
                            <div class="pull-right">
                                <a href="{{ route('admin_user_create') }}" class="btn btn-success"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Add</a>
                                <a href="" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete</a>
                            </div>
                        </div>
                    </div>--}}

                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="nav nav-tabs" role="tablist" style="background-color: white;">
                                <li role="presentation" class="active">
                                    <a href="#information" aria-controls="information" role="tab" data-toggle="tab">Information</a>
                                </li>
                                <li role="presentation">
                                    <a href="#interview_status" aria-controls="interview_status" role="tab" data-toggle="tab">Interview Status</a>
                                </li>
                                <div class="dropdown pull-right" style="margin-top: 0.55rem; margin-right: 0.5rem;">
                                    <button class="btn btn-default dropdown-toggle" style="text-shadow: none !important;" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Actions <span class="caret"></span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu" style="margin-top: 0.55rem; margin-right: -4rem;">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content" style="background-color: white;padding: 20px;border: #ddd solid 1px;">
                                <div role="tabpanel" class="tab-pane fade in active" id="information">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form class="form-horizontal">

                                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                    <label for="first_name" class="col-md-4 control-label">First Name:</label>

                                                    <div class="col-md-6">
                                                        <label id="first_name" class="control-label">{{ $applicant->first_name }}</label>
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                    <label for="last_name" class="col-md-4 control-label">Last Name:</label>

                                                    <div class="col-md-6">
                                                        <label id="last_name" class="control-label">{{ $applicant->last_name }}</label>
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                                                    <label for="date_of_birth" class="col-md-4 control-label">Date of Birth:</label>

                                                    <div class="col-md-6">
                                                        <label id="date_of_birth" class="control-label">{{ date('F d, Y', strtotime($applicant->date_of_birth)) }}</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="age" class="col-md-4 control-label">Age:</label>

                                                    <div class="col-md-6">
                                                        <label id="age" class="control-label" >{{ $applicant->age }}</label>
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email" class="col-md-4 control-label">E-mail:</label>

                                                    <div class="col-md-6">
                                                        <label id="email" class="control-label">{{ $applicant->email }}</label>
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
                                                    <label for="mobile_number" class="col-md-4 control-label">Mobile Number:</label>

                                                    <div class="col-md-6">
                                                        <label id="mobile_number" class="control-label">{{ $applicant->mobile_number }}</label>
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('home_number') ? ' has-error' : '' }}">
                                                    <label for="home_number" class="col-md-4 control-label">Home Number:</label>

                                                    <div class="col-md-6">
                                                        <label id="home_number" class="control-label">{{ $applicant->home_number }}</label>
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                    <label for="address" class="col-md-4 control-label">Address:</label>

                                                    <div class="col-md-6">
                                                        <label id="address" class="control-label">{{ $applicant->address }}</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade in" id="interview_status">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="initial_interview" class="col-md-4 control-label">Initial Interview:</label>

                                                    <div class="col-md-6">
                                                        <label style="font-size: 13px; line-height: 3;" id="initial_interview" class="label label-@if($applicant->initial_interview == 0)danger @elseif($applicant->initial_interview == 1)warning @elseif($applicant->initial_interview == 2)success @endif
                                                        ">{{ $applicant->initialInterviewStatus() }}</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exam_interview" class="col-md-4 control-label">Exam Interview:</label>

                                                    <div class="col-md-6">
                                                        <label style="font-size: 13px; line-height: 3;" id="exam_interview" class="label label-@if($applicant->exam_interview == 0)danger @elseif($applicant->exam_interview == 1)warning @elseif($applicant->exam_interview == 2)success @endif">{{ $applicant->examInterviewStatus() }}</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="final_interview" class="col-md-4 control-label">Final Interview:</label>

                                                    <div class="col-md-6">
                                                        <label style="font-size: 13px; line-height: 3;" id="final_interview" class="label label-@if($applicant->final_interview == 0)danger @elseif($applicant->final_interview == 1)warning @elseif($applicant->final_interview == 2)success @endif">{{ $applicant->finalInterviewStatus() }}</label>
                                                    </div>
                                                </div>
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
