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

                        <form class="" role="form" method="POST">
                            {{ csrf_field() }}
                            <br>

                            <div class="page-header">
                                <h1>INITIAL INTERVIEW</h1>
                            </div>

                            <div class="form-group">
                                <div class="questionnaire-form">
                                    <div class="questionnaire">
                                        <label for="ApplicantId" class="control-label">1. How do you handle irate clients?</label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="questionnaire-form">
                                    <div class="questionnaire">
                                        <label for="ApplicantId" class="control-label">2. Can you work under pressure?</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="questionnaire-form">
                                    <div class="questionnaire">
                                        <label for="ApplicantId" class="control-label">3. How do you please people?</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="questionnaire-form">
                                    <div class="questionnaire">
                                        <label for="ApplicantId" class="control-label">4. Can you work in night shift?</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="questionnaire-form">
                                    <div class="questionnaire">
                                        <label for="ApplicantId" class="control-label">5. Do you have a call center experience?</label>

                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
