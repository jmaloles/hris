@extends('layouts.app')

@section('content')
    <div class="row">
        @include('layouts.admin-sidebar')
        <div class="col-lg-10 col-md-9 col-lg-offset-1-1">
            <div class="main">
                <div class="col-lg-12">

                    <div class="row">
                        <div class="panel-1 panel-trans">
                            <div class="panel-heading-1">
                                <h4><i class="fa fa-users"></i>&nbsp;&nbsp;Manage Users - Add User</h4>
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

                        @if (count($errors) > 0)
                            <div class="col-lg-12">
                                <div class="alert error-msg" role="alert"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> <b>Error:</b>
                                    <label style="font-weight: 400;">Please review the data that you have provided.</label>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-8 col-lg-offset-2">
                        <ul class="nav nav-tabs" role="tablist" style="background-color: white;">
                            <li role="presentation" class="active">
                                <a style="border-top: #5bc0de solid 3px;" href="#home" aria-controls="home" role="tab" data-toggle="tab">Information</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content" style="background-color: white;padding: 20px;border: #ddd solid 1px;">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="{{ route('admin_pending_user_store') }}" method="POST" class="form-horizontal" autocomplete="off">
                                            {{ csrf_field() }}

                                            <div class="form-group{{ $errors->has('employee_id') ? ' has-error' : '' }}">
                                                <label for="employee_id" class="control-label col-md-4">Employee ID</label>
                                                <div class="col-md-6">
                                                    <div class="icon eId" aria-hidden="true">
                                                        <input type="text" class="form-control required" id="employee_id" name="employee_id" value="{{ old('employee_id') }}"
                                                        style="text-transform: uppercase;">
                                                    </div>

                                                    @if ($errors->has('employee_id'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('employee_id') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                <label for="first_name" class="control-label col-md-4">First Name</label>
                                                <div class="col-md-6">
                                                    <div class="icon fNiCn">
                                                        <input type="text" class="form-control required" id="first_name" name="first_name" value="{{ old('first_name') }}"
                                                        style="text-transform: uppercase;">
                                                    </div>

                                                    @if ($errors->has('first_name'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('first_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                <label for="last_name" class="control-label col-md-4">Last Name</label>
                                                <div class="col-md-6">
                                                    <div class="icon fNiCn">
                                                        <input type="text" class="form-control required" id="last_name" name="last_name" value="{{ old('last_name') }}"
                                                        style="text-transform: uppercase;">
                                                    </div>

                                                    @if ($errors->has('last_name'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('last_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" class="control-label col-md-4">E-mail</label>
                                                <div class="col-md-6">
                                                    <div class="icon fEiCn">
                                                        <input type="email" class="form-control required" id="email" name="email" value="{{ old('email') }}">
                                                    </div>
                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row">
                                                <hr>
                                            </div>

                                            <div class="pull-right">
                                                <button class="btn btn-success"><i class="fa fa-check"></i>&nbsp;Save</button>
                                                <a class="btn btn-danger" href="{{ route('admin_user_index') }}"><i class="fa fa-ban"></i>&nbsp;Cancel</a>
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

    <script>
        $(document).ready(function () {
            $(":input[type='text']").on('focusout', function() {
                if(this.value != '') {
                    this.setAttribute('style', 'border-right: #5cb85c solid 5px; text-decoration: uppercase;');
                } else {
                    this.setAttribute('style', 'border-right: #f0ad4e solid 5px');
                }
            });

            $(":input[type='email']").on('focusout', function() {
                if(this.value != '') {
                    this.setAttribute('style', 'border-right: #5cb85c solid 5px');
                } else {
                    this.setAttribute('style', 'border-right: #f0ad4e solid 5px');
                }
            });
        });
    </script>
@endsection
