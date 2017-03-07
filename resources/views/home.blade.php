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
                            <h4><i class="fa fa-th-large"></i>&nbsp;&nbsp;DASHBOARD - <a href="" title="Make an announcement"
                            data-toggle="modal" data-target="#AnnouncementModal"><i class="fa fa-bullhorn" aria-hidden="true"></i> </a></h4>
                        </div>
                    </div>

                    @if(Session::has('msg'))
                        <div class="alert alert-info" role="alert">
                            <i class="fa fa-check"></i> {{ Session::get('msg') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    @endif

                    <div class="panel panel-primary" style="border-radius: 0px;">
                        <div class="panel-heading" style="padding: 2px; border-radius: 0px; padding-left: 15px;">
                            <h4><i class="fa fa-bullhorn" aria-hidden="true"></i> Announcement</h4>
                        </div>
                        <div class="panel-body">
                            @if(count($userAnnouncement) == 0)
                                There is currently no announcement.
                            @else
                                <blockquote>
                                    <p>{{ $userAnnouncement->announcermessage }}</p>
                                    <footer>{{ $userAnnouncement->announcername }} <cite title="Source Title">
                                    {{ date('F d, Y h:i A', strtotime($userAnnouncement->dateAnnounced)) }}</cite></footer>
                                </blockquote>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="AnnouncementModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Make Announcement</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('announcements.store') }}" id="formAnnouncementStore">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="InputMessage" class="col-md-3 control-label">Announcement: </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="message" id="InputMessage" placeholder="Enter your Message">
                        </div>
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('formAnnouncementStore').submit();">Announce</button>
              </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
