@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Enter Applicant ID For Exam</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('verify_applicant') }}">
                        {{ csrf_field() }}
                        <br>
                        <br>
                        <br>

                        <div class="form-group">
                            <label for="ApplicantId" class="col-md-4 control-label">Applicant ID#</label>

                            <div class="col-md-6">
                                <input id="ApplicantId" class="form-control" name="applicant_id" value="{{ old('applicant_id') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Verify my Applicant ID
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
