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

                    <form class="" role="form" method="POST" action="{{ route('submit_exam', $exam->id) }}">
                        {{ csrf_field() }}
                        <br>
                        
                        <div class="page-header">
                            <h1>RECEPTIONIST</h1>
                        </div>

                        <div class="form-group">
                            <div class="questionnaire-form">
                                <div class="questionnaire">
                                    <label for="ApplicantId" class="control-label">1. My friend _____ a puppy at the pet store</label>

                                    <div class="questionnaire-ans">
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_1" id="answer_1" value="a">
                                                a) buy
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_1" id="answer_1" value="b">
                                                b) buyed
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_1" id="answer_1" value="c">
                                                c) bought
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_1" id="answer_1" value="d">
                                                d) brought
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <hr>
                        </div>

                        <div class="form-group">
                            <div class="questionnaire-form">
                                <div class="questionnaire">
                                    <label for="ApplicantId" class="control-label">2. I will leave ______ food inside the refrigerator.</label>

                                    <div class="questionnaire-ans">
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_2" id="answer_2" value="a">
                                                a) These
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_2" id="answer_2" value="b">
                                                b) This
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_2" id="answer_2" value="c">
                                                c) That
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_2" id="answer_2" value="d">
                                                d) Those
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <hr>
                        </div>

                        <div class="form-group">
                            <div class="questionnaire-form">
                                <div class="questionnaire">
                                    <label for="ApplicantId" class="control-label">3. I will be leaving _______ chocolates inside the freezer</label>

                                    <div class="questionnaire-ans">
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_3" id="answer_3" value="a">
                                                a) These
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_3" id="answer_3" value="b">
                                                b) This
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_3" id="answer_3" value="c">
                                                c) That
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_3" id="answer_3" value="d">
                                                d) Those
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <hr>
                        </div>

                        <div class="form-group">
                            <div class="questionnaire-form">
                                <div class="questionnaire">
                                    <label for="ApplicantId" class="control-label">4.Remember when we used to play hide and seek? ______ were the days.</label>

                                    <div class="questionnaire-ans">
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_4" id="answer_4" value="a">
                                                a) These
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_4" id="answer_4" value="b">
                                                b) This
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_4" id="answer_4" value="c">
                                                b) That
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_4" id="answer_4" value="d">
                                                b) Those
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <hr>
                        </div>

                        <div class="form-group">
                            <div class="questionnaire-form">
                                <div class="questionnaire">
                                    <label for="ApplicantId" class="control-label">5. As soon as I found an inspiration, I _________ writing an article.</label>

                                    <div class="questionnaire-ans">
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_5" id="answer_5" value="a">
                                                a) Begin
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_5" id="answer_5" value="b">
                                                b) Began
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_5" id="answer_5" value="c">
                                                c) Start
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_5" id="answer_5" value="d">
                                                d) Started
                                            </label>
                                        </div>
                                    </div>
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
