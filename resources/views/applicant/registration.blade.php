@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-default hris-navbar navbar-fixed-top" style="border-bottom-color: #2a958c">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand hris-title" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <p class="navbar-text" style="color: white;">Welcome, Applicant</p>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body login-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('applicant_store') }}" autocomplete="off" enctype="multipart/form-data">
                            {{ csrf_field() }}

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

                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group{{ $errors->has('expected_salary') ? ' has-error' : '' }}">
                                <label for="expectedSalary" class="col-md-4 control-label">Expected Salary</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">PHP</div>
                                        <input style="text-transform: uppercase;" id="expectedSalary" type="text" class="form-control" name="expected_salary" value="{{ old('expected_salary') }}" required autofocus>
                                        <div class="input-group-addon">.00</div>
                                        @if ($errors->has('expected_salary'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('expected_salary') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('job_position') ? ' has-error' : '' }}">
                                <label for="jobPosition" class="col-md-4 control-label">Applying for Job Position</label>
                                <div class="col-md-6">
                                    <input style="text-transform: uppercase;" id="jobPosition" type="text" class="form-control" name="job_position" value="{{ old('job_position') }}" required autofocus>

                                    @if ($errors->has('job_position'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('job_position') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('type_of_employment') ? ' has-error' : '' }}">
                                <label for="TypeOfEmployment" class="col-md-4 control-label">Type of Employment</label>
                                <div class="col-md-6">
                                    <select name="type_of_employment" id="TypeOfEmployment" class="form-control" required>
                                        <option value="FULL-TIME">FULL-TIME</option>
                                        <option value="PART-TIME">PART-TIME</option>
                                        <option value="PERMANENT">PERMANENT</option>
                                    </select>

                                    @if ($errors->has('type_of_employment'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('type_of_employment') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <hr>
                            </div>

                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="firstName" class="col-md-4 control-label">First Name</label>
                                <div class="col-md-6">
                                    <input style="text-transform: uppercase;" id="firstName" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('middle_initial') ? ' has-error' : '' }}">
                                <label for="middleInitial" class="col-md-4 control-label">Middle Initial/Name</label>
                                <div class="col-md-6">
                                    <input style="text-transform: uppercase;" id="middleInitial" type="text" class="form-control" name="middle_initial" value="{{ old('middle_initial') }}" required autofocus>

                                    @if ($errors->has('middle_initial'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('middle_initial') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input style="text-transform: uppercase;" id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <textarea style="text-transform: uppercase;" id="address" type="text" class="form-control" name="address" required>{{ old('address') }}</textarea>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                                <label for="date_of_birth" class="col-md-4 control-label">Date of Birth</label>

                                <div class="col-md-6">
                                    <div class="input-group date">
                                        <input style="text-transform: uppercase;" id="date_of_birth" type="text" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                    </div>
                                    @if ($errors->has('date_of_birth'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('date_of_birth') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
                                <label for="mobile_number" class="col-md-4 control-label">Mobile Number</label>

                                <div class="col-md-6">
                                    <input style="text-transform: uppercase;" id="mobile_number" type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}">

                                    @if ($errors->has('mobile_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mobile_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('home_number') ? ' has-error' : '' }}">
                                <label for="home_number" class="col-md-4 control-label">Home Number</label>

                                <div class="col-md-6">
                                    <input style="text-transform: uppercase;" id="home_number" type="text" class="form-control" name="home_number" value="{{ old('home_number') }}">

                                    @if ($errors->has('home_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('home_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label for="gender" class="col-md-4 control-label">Gender</label>

                                <div class="col-md-6">
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" name="gender" id="gender" value="1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" name="gender" id="gender" value="0">
                                            Female
                                        </label>
                                    </div>

                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <hr>
                            </div>

                            <div class="form-group{{ $errors->has('emergency_person') ? ' has-error' : '' }}">
                                <label for="InputEmergencyPersonName" class="col-md-4 control-label">Emergency Contact</label>

                                <div class="col-md-6">
                                    <div class="unified-field">
                                        <input id="InputEmergencyPersonName" style="text-transform: uppercase;" type="text" class="form-control" placeholder="Emergency Person's Name"  name="emergency_person_name">
                                        <input id="InputEmergencyPersonContact" style="text-transform: uppercase;" type="text" class="form-control" placeholder="Emergency Person's Contact" name="emergency_person_contact">
                                        <textarea name="emergency_person_address" id="InputEmergencyPersonAddress" style="text-transform: uppercase;" class="form-control" placeholder="Emergency Person's Address" cols="20" rows="5"></textarea>
                                    </div>
                                    
                                    @if ($errors->has('emergency_person'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('emergency_person') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <hr>
                            </div>

                            <div class="form-group{{ $errors->has('resumePath') ? ' has-error' : '' }}">
                                <label for="InputResumeFile" class="col-md-4 control-label">Upload Resume</label>

                                <div class="col-md-6">
                                    <input id="InputResumeFile" type="file" class="form-control" name="resumePath">

                                    @if ($errors->has('resumePath'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('resumePath') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-check"></i>
                                        Register
                                    </button>

                                    <a class="btn btn-primary" href="{{ route('welcome') }}">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#expectedSalary").on("focusout", function (e) {
                e.preventDefault();
                var expectedSalary = document.getElementById("expectedSalary").value
                string = numeral(expectedSalary).format('0,0.00');

                document.getElementById("expectedSalary").value = string;
            });

            $('.input-group.date').datepicker({
                format: "yyyy-mm-dd"
            });
        });
    </script>
@endsection
