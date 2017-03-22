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
                                    <h4><i class="fa fa-certificate"></i>&nbsp;&nbsp;Trainings</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-right">
                                <a href="{{ route('training.create') }}" class="btn btn-success"><i class="fa fa-certificate"></i>&nbsp;&nbsp;Create Trainings Schedule</a>
                            </div>
                        </div>
                    </div>

                    <br> --}}

                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="nav nav-tabs" role="tablist" style="background-color: white;">
                                <li role="presentation" class="active">
                                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Trainings</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content" style="background-color: white;padding: 20px;border: #ddd solid 1px;">
                                <div role="tabpanel" class="tab-pane active" id="home">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form action="{{ route('training.store') }}" class="form-horizontal" name="StoreTrainingForm" id="StoreTrainingForm">
                                                
                                                <div class="form-group">
                                                    <label for="InputJobName" class="control-label col-md-4">Job Name:</label>
                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control" id="InputJobName" name="name" 
                                                        placeholder="Enter Job Name" required value="{{ old('name') }}">
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
@endsection
