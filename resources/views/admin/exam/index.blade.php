@extends('layouts.app')

@section('content')
    <div class="row">
        @include('layouts.admin-sidebar')
        <div class="col-lg-10 col-md-9 col-lg-offset-1-1">

            <div class="main">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-1 panel-trans">
                                <div class="panel-heading-1">
                                    <h4><i class="fa fa-file-word-o"></i>&nbsp;&nbsp;Exams</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="nav nav-tabs" role="tablist" style="background-color: white;">
                                <li role="presentation" class="active">
                                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Exams</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content" style="background-color: white;padding: 20px;border: #ddd solid 1px;">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead style="background-color: #eeeeee; border: #ccc solid 1px;">
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Exam Category</th>
                                                        <th>Exam</th>
                                                        <th>Date Taken</th>
                                                        <th>Score</th>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($exams as $exam)
                                                        <tr>
                                                            <td>{{ $exam->id }}</td>
                                                            <td>{{ $exam->applicant->fullName() }}</td>
                                                            <td>{{ $exam->category }}</td>
                                                            <td>{{ $exam->name }}</td>
                                                            <td>{{ $exam->created_at }}</td>
                                                            <td>{{ $exam->score }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
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
    </div>
@endsection
