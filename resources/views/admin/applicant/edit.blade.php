@extends('layouts.app')

@section('content')
    <div class="row">
        @include('layouts.admin-sidebar')
        <div class="col-lg-10 col-md-9 col-lg-offset-1-1">

            <div class="main">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{ route('admin_user_applicant_show', $applicant->id) }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-1 panel-trans">
                                <div class="panel-heading-1">
                                    <h4><i class="fa fa-edit"></i>&nbsp;&nbsp;EDIT: {{ $applicant->fullName() }}</h4>
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
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="nav nav-tabs" role="tablist" style="background-color: white;">
                                <li role="presentation" class="active">
                                    <a href="#information" aria-controls="information" role="tab" data-toggle="tab">Information</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content" style="background-color: white;padding: 20px;border: #ddd solid 1px;">
                                <div role="tabpanel" class="tab-pane fade in active" id="information">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form action="{{ route('admin_user_applicant_update', $applicant->id) }}" class="form-horizontal" method="POST"  enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}
                                                <input type="hidden" name="applicant_id" value="{{ $applicant->id }}">

                                                <div class="col-lg-12">
                                                    <div class="col-lg-3">
                                                        <div class="form-group{{ $errors->has('fileToUpload') ? ' has-error' : '' }}">
                                                            <div class="col-md-3">
                                                                <div class="thumbnail" style="width: 175px; height: 160px; border-radius: 0px;">
                                                                    <img src="{{ URL::to('/') }}/{{ $applicant->photo_dir }}" alt="..." id="output" style="width: 160px; height: 150px;">
                                                                </div>

                                                                <input type="file" accept="image/.jpg, .png, .jpeg" onchange="loadFile(event)" name="fileToUpload">

                                                                @if ($errors->has('fileToUpload'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('fileToUpload') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">

                                                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                            <label for="firstName" class="col-md-4 control-label">First Name</label>
                                                            <div class="col-md-6">
                                                                <input style="text-transform: uppercase;" id="firstName" type="text" class="form-control" name="first_name" value="{{ $applicant->first_name }}" required autofocus>

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
                                                                <input style="text-transform: uppercase;" id="middleInitial" type="text" class="form-control" name="middle_initial" value="{{ $applicant->middle_initial }}" required autofocus>

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
                                                                <input style="text-transform: uppercase;" id="last_name" type="text" class="form-control" name="last_name" value="{{ $applicant->last_name }}" required>

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
                                                                <textarea style="text-transform: uppercase;" id="address" type="text" class="form-control" name="address" required>{{ $applicant->address }}</textarea>

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
                                                                <input id="email" type="text" class="form-control" name="email" value="{{ $applicant->email }}" required>

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
                                                                    <input style="text-transform: uppercase;" id="date_of_birth" type="text" class="form-control" name="date_of_birth" value="{{ $applicant->date_of_birth }}" required>
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
                                                                <input style="text-transform: uppercase;" id="mobile_number" type="text" class="form-control" name="mobile_number" value="{{ $applicant->mobile_number }}">

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
                                                                <input style="text-transform: uppercase;" id="home_number" type="text" class="form-control" name="home_number" value="{{ $applicant->home_number }}">

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
                                                                        <input type="radio" name="gender" id="gender" value="1" {{ $applicant->gender == "1" ? "checked" : "" }}>
                                                                        Male
                                                                    </label>
                                                                </div>
                                                                <div class="radio-inline">
                                                                    <label>
                                                                        <input type="radio" name="gender" id="gender" value="0" {{ $applicant->gender == "0" ? "checked" : "" }}>
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

                                                        <div class="form-group{{ $errors->has('sss') ? ' has-error' : '' }}">
                                                            <label for="SSS" class="col-md-4 control-label">SSS:</label>

                                                            <div class="col-md-6">
                                                                <input name="sss" id="SSS" class="form-control" value="{{ $applicant->sss }}" placeholder="##-###-##-##-#">
                                                            </div>
                                                        </div>

                                                        <div class="form-group{{ $errors->has('pag_ibig') ? ' has-error' : '' }}">
                                                            <label for="pag_ibig" class="col-md-4 control-label">Pag-ibig:</label>

                                                            <div class="col-md-6">
                                                                <input name="pag_ibig" id="pag_ibig" class="form-control" value="{{ $applicant->pag_ibig }}" placeholder="####-####-####">
                                                            </div>
                                                        </div>

                                                        <div class="form-group{{ $errors->has('philhealth') ? ' has-error' : '' }}">
                                                            <label for="philhealth" class="col-md-4 control-label">Phil Health:</label>

                                                            <div class="col-md-6">
                                                                <input name="philhealth" id="philhealth" class="form-control" value="{{ $applicant->philhealth }}" placeholder="####-#####-##-##">
                                                            </div>
                                                        </div>

                                                        <div class="form-group{{ $errors->has('nbi_clearance') ? ' has-error' : '' }}">
                                                            <label for="nbi_clearance" class="col-md-4 control-label">NBI Clearance:</label>

                                                            <div class="col-md-6">
                                                                <div class="radio-inline">
                                                                    <label>
                                                                        <input type="radio" name="nbi_clearance" id="nbi_clearance" value="YES" {!! $applicant->nbi_clearance == "YES" ? "checked" : "" !!}>
                                                                        YES
                                                                    </label>
                                                                </div>
                                                                <div class="radio-inline">
                                                                    <label>
                                                                        <input type="radio" name="nbi_clearance" id="nbi_clearance" value="NO" {!! $applicant->nbi_clearance == "NO" ? "checked" : "" !!}>
                                                                        NO
                                                                    </label>
                                                                </div>

                                                                @if ($errors->has('nbi_clearance'))
                                                                   <span class="help-block">
                                                                       <strong>{{ $errors->first('nbi_clearance') }}</strong>
                                                                   </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group{{ $errors->has('tin') ? ' has-error' : '' }}">
                                                            <label for="tin" class="col-md-4 control-label">Tax Identificatio Number(TIN):</label>

                                                            <div class="col-md-6">
                                                                <input name="tin" id="tin" class="form-control" value="{{ $applicant->tin }}" placeholder="##-#######">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <hr>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="pull-right">
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="fa fa-check"></i>
                                                                Update
                                                            </button>
                                                        </div>
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

    <script>


        $(document).ready(function() {
           $(function(){
              $("#tin").mask("99-9999999", {placeholder:"##-#######"});
              $("#SSS").mask("99-999-99-99-9", {placeholder:"##-###-##-##-#"});
              $("#philhealth").mask("9999-99999-99-99", {placeholder:"####-#####-##-##"});
              $("#pag_ibig").mask("9999-9999-9999", {placeholder:"####-####-####"});
           });

            $('.input-group.date').datepicker({
                format: "yyyy-mm-dd"
            });
        })

        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endsection
