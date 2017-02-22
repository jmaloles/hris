@extends('layouts.app')

@section('content')
    <div class="row">
        @include('layouts.admin-sidebar')
        <div class="col-lg-10 col-md-9 col-lg-offset-1-1">

            <div class="main">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{ route('admin_user_employee_show', $employee->id) }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-1 panel-trans">
                                <div class="panel-heading-1">
                                    <h4><i class="fa fa-edit"></i>&nbsp;&nbsp;EDIT: {{ $employee->applicant->fullName() }}</h4>
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
                                            <form action="{{ route('admin_user_employee_update', $employee->id) }}" class="form-horizontal" method="POST"  enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}
                                                <input type="hidden" name="employee_id" value="{{ $employee->id }}">

                                                <div class="col-lg-12">
                                                    <div class="col-lg-3">
                                                        <div class="form-group{{ $errors->has('fileToUpload') ? ' has-error' : '' }}">
                                                            <div class="col-md-3">
                                                                <div class="thumbnail" style="width: 175px; height: 160px; border-radius: 0px;">
                                                                    <img src="{{ URL::to('/') }}/{{ $employee->applicant->photo_dir }}" alt="..." id="output" style="width: 160px; height: 150px;">
                                                                </div>

                                                                <input type="file" accept="image/*" onchange="loadFile(event)" name="fileToUpload">

                                                                @if ($errors->has('fileToUpload'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('fileToUpload') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                            <label for="email" class="col-md-4 control-label">Company E-mail:</label>

                                                            <div class="col-md-6">
                                                                <input name="email" id="email" class="form-control" value="{{ $employee->email }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group{{ $errors->has('sss') ? ' has-error' : '' }}">
                                                            <label for="SSS" class="col-md-4 control-label">SSS:</label>

                                                            <div class="col-md-6">
                                                                <input name="sss" id="SSS" class="form-control" value="{{ $employee->applicant->sss }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                                                            <label for="salary" class="col-md-4 control-label">Salary:</label>

                                                            <div class="col-md-6">
                                                                <input id="salary" class="form-control" name="salary" value="{{ $employee->salary }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group{{ $errors->has('pag_ibig') ? ' has-error' : '' }}">
                                                            <label for="pag_ibig" class="col-md-4 control-label">Pag-ibig:</label>

                                                            <div class="col-md-6">
                                                                <input name="pag_ibig" id="pag_ibig" class="form-control" value="{{ $employee->pag_ibig }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group{{ $errors->has('philhealth') ? ' has-error' : '' }}">
                                                            <label for="philhealth" class="col-md-4 control-label">Phil Health:</label>

                                                            <div class="col-md-6">
                                                                <input name="philhealth" id="philhealth" class="form-control" value="{{ $employee->philhealth }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group{{ $errors->has('nbi_clearance') ? ' has-error' : '' }}">
                                                            <label for="nbi_clearance" class="col-md-4 control-label">NBI Clearance:</label>

                                                            <div class="col-md-6">
                                                                <input name="nbi_clearance" id="nbi_clearance" class="form-control" value="{{ $employee->nbi_clearance }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group{{ $errors->has('tin') ? ' has-error' : '' }}">
                                                            <label for="tin" class="col-md-4 control-label">Tax Identificatio Number(TIN):</label>

                                                            <div class="col-md-6">
                                                                <input name="tin" id="tin" class="form-control" value="{{ $employee->tin }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                                                            <label for="department" class="col-md-4 control-label">Department:</label>

                                                            <div class="col-md-6">
                                                                <input id="department" class="form-control" name="department" value="{{ $employee->department }}" style="text-transform: capitalize;">
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
            $('.input-group.date').datepicker({
                format: "yyyy-mm-dd"
            });

            $("#salary").on("focusout", function (e) {
                e.preventDefault();
                var salary = document.getElementById("salary").value
                string = numeral(salary).format('0,0.00');

                document.getElementById("salary").value = string;
            });
        })

        /*var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };*/
    </script>
@endsection
