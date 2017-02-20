@extends('layouts.app')

@section('content')
    <div class="row">

        @include('layouts.admin-sidebar')
        <div class="col-lg-10 col-md-9 col-lg-offset-1-1">
            {{--<ol class="breadcrumb">
                <li class="active"><i class="fa fa-th-large"></i>&nbsp;&nbsp;Dashboard</li>
            </ol>--}}

            <div class="main">
                <div class="col-lg-12">
                    <div class="panel-1 panel-trans">
                        <div class="panel-heading-1">
                            <h4><i class="fa fa-th-large"></i>&nbsp;&nbsp;DASHBOARD</h4>
                        </div>
                    </div>

                    @if(Session::has('msg'))
                        <div class="alert alert-info" role="alert">
                            <i class="fa fa-check"></i> {{ Session::get('msg') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
