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
                            <h1>WEB-DEVELOPER EXAM</h1>
                        </div>

                        <div class="form-group">
                            <div class="questionnaire-form">
                                <div class="questionnaire">
                                    <label for="ApplicantId" class="control-label">1. In PHP, what keyword is used to process an output?</label>

                                    <div class="questionnaire-ans">
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_1" id="answer_1" value="a">
                                                a) cout<<
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_1" id="answer_1" value="b">
                                                b) echo
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_1" id="answer_1" value="c">
                                                c) println
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_1" id="answer_1" value="d">
                                                d) none of the above.
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
                                    <label for="ApplicantId" class="control-label">2. Which of the following is NOT a web programming language?</label>

                                    <div class="questionnaire-ans">
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_2" id="answer_2" value="a">
                                                a) HTML
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_2" id="answer_2" value="b">
                                                b) ASP.net
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_2" id="answer_2" value="c">
                                                c) PHP
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_2" id="answer_2" value="d">
                                                d) Visual Basic
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
                                    <label for="ApplicantId" class="control-label">3. $x = 1; $y=0; if($x<$y) { echo "hello world";  } what would be the output?</label>

                                    <div class="questionnaire-ans">
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_3" id="answer_3" value="a">
                                                a) 1
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_3" id="answer_3" value="b">
                                                b) 0
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_3" id="answer_3" value="c">
                                                c) hello world
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_3" id="answer_3" value="d">
                                                d) None of the above
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
                                    <label for="ApplicantId" class="control-label">4.TRUE OR FALSE: in PHP you need to declare a data type in order to add what kind of data it should hold?</label>

                                    <div class="questionnaire-ans">
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_4" id="answer_4" value="a">
                                                a) True
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_4" id="answer_4" value="b">
                                                b) False
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
                                    <label for="ApplicantId" class="control-label">5. All variables in PHP starts with which Symbol?</label>

                                    <div class="questionnaire-ans">
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_5" id="answer_5" value="a">
                                                a) &
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_5" id="answer_5" value="b">
                                                b) $
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_5" id="answer_5" value="c">
                                                c) !
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_5" id="answer_5" value="d">
                                                d) #
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
                                    <label for="ApplicantId" class="control-label">6. How doy you get information from a form that is submitted using the "get" method?</label>

                                    <div class="questionnaire-ans">
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_6" id="answer_6" value="a">
                                                a) Request.QueryString;
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_6" id="answer_6" value="b">
                                                b) Request.QueryString;
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_6" id="answer_6" value="c">
                                                c) Request.Form
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_6" id="answer_6" value="d">
                                                d) None of the above
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
                                    <label for="ApplicantId" class="control-label">7. TRUE OR FALSE: When using the POST method, variables are displayed in the URL?</label>

                                    <div class="questionnaire-ans">
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_7" id="answer_7" value="a">
                                                a) True
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_7" id="answer_7" value="b">
                                                b) False
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
                                    <label for="ApplicantId" class="control-label">8, What is the correct way to create a function in PHP?</label>

                                    <div class="questionnaire-ans">
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_8" id="answer_8" value="a">
                                                a) new_fundction myFunction
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_8" id="answer_8" value="b">
                                                b) function myFunction()
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_8" id="answer_8" value="c">
                                                c) create myFunction
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_8" id="answer_8" value="d">
                                                d) function.create(MyFunction)
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
                                    <label for="ApplicantId" class="control-label">9. What is the correct way to add 1 to the $count variable?</label>

                                    <div class="questionnaire-ans">
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_9" id="answer_9" value="a">
                                                a) count++
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_9" id="answer_9" value="b">
                                                b) $count =+1
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_9" id="answer_9" value="c">
                                                c) $count++;
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_9" id="answer_9" value="d">
                                                d) ++count
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
                                    <label for="ApplicantId" class="control-label">10. What is the correct way to add a comment in PHP?</label>

                                    <div class="questionnaire-ans">
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_10" id="answer_10" value="a">
                                                a) /*..*/
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_10" id="answer_10" value="b">
                                                b) *\..\*
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_10" id="answer_10" value="c">
                                                c) &lt;!--...--&gt;
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" name="answer_10" id="answer_10" value="d">
                                                d) ++count
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
