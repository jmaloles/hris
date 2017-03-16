@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="" role="form" method="POST" action="{{ route('submit_exam', $exam->id) }}">
                            {{ csrf_field() }}
                            <br>

                            <div class="page-header">
                                <h1>INITIAL INTERVIEW</h1>
                            </div>

                            <div class="form-group">
                                <div class="questionnaire-form">
                                    <div class="questionnaire">
                                        <label for="ApplicantId" class="control-label">1. Which do you prefer? a web app or mobile app</label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="questionnaire-form">
                                    <div class="questionnaire">
                                        <label for="ApplicantId" class="control-label">2. give me your thoughts on the rapid growth of technology.</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="questionnaire-form">
                                    <div class="questionnaire">
                                        <label for="ApplicantId" class="control-label">3. Do you have an idea with regards to data encryption?</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="questionnaire-form">
                                    <div class="questionnaire">
                                        <label for="ApplicantId" class="control-label">4. Do you have other experience in programming languages?</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="questionnaire-form">
                                    <div class="questionnaire">
                                        <label for="ApplicantId" class="control-label">5. How do you deal with runtime error?</label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <hr>
                            </div>

                            <div class="pull-right">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
