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
                                        <label for="ApplicantId" class="control-label">1. What do you know about the company?</label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="questionnaire-form">
                                    <div class="questionnaire">
                                        <label for="ApplicantId" class="control-label">2. Why do you want this job?.</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="questionnaire-form">
                                    <div class="questionnaire">
                                        <label for="ApplicantId" class="control-label">3. What are your greatest professional strengths?</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="questionnaire-form">
                                    <div class="questionnaire">
                                        <label for="ApplicantId" class="control-label">4.Tell me about a challenge or conflict you've faced at work, and how you dealt with it..</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="questionnaire-form">
                                    <div class="questionnaire">
                                        <label for="ApplicantId" class="control-label">5. How do you deal with pressure or stressful situations?</label>

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
