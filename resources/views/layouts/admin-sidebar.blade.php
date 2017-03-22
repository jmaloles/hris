<nav class="sidebar">
    <ul class="nav nav-pills nav-stacked col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-size: 14px;">

        <li class="nav-item {{ Request::route()->getName() == 'dashboard' ? 'active' : '' }}">
            <a class="nav-link" @if(Request::route()->getName() != 'dashboard') href="{{ route('dashboard') }}" @endif>
                <i class="fa fa-th-large"></i>&nbsp;&nbsp;Dashboard
            </a>
        </li>

        <li class="nav-item {{ Request::is('user/*') ? 'active' : '' }} {{--@if(Request::is('user/*')) active @endif--}}">
            <a class="nav-link" @if((Request::route()->getName() == 'admin_user_index') || (Request::route()->getName() == 'admin_user_create')) style="cursor: default;" @else  href="{{ route('admin_user_index') }}" @endif>
                <i class="fa fa-users"></i>&nbsp;&nbsp;Manage Users
            </a>
        </li>

        <li class="nav-item {{ Request::is('training*') ? 'active' : '' }} {{--@if(Request::is('training*')) active @endif--}}">
            <a class="nav-link" @if((Request::route()->getName() == 'training.index') || (Request::route()->getName() == 'training.create')) style="cursor: default;" @else  href="{{ route('training.index') }}" @endif>
                <i class="fa fa-certificate" aria-hidden="true"></i>&nbsp;&nbsp;Training
            </a>
        </li>

        <li class="nav-item {{ Request::is('exams*') ? 'active' : '' }} {{--@if(Request::is('exams*')) active @endif--}}">
            <a class="nav-link" @if((Request::route()->getName() == 'exams.index') || (Request::route()->getName() == 'exams.create')) style="cursor: default;" @else  href="{{ route('exams.index') }}" @endif>
                <i class="fa fa-file-word-o" aria-hidden="true"></i>&nbsp;&nbsp;Exams
            </a>
        </li>

        <li class="nav-item {{ Request::is('announcements*') ? 'active' : '' }} {{--@if(Request::is('announcements*')) active @endif--}}">
            <a class="nav-link" @if((Request::route()->getName() == 'announcements.index') || (Request::route()->getName() == 'announcements.create')) style="cursor: default;" @else  href="{{ route('announcements.index') }}" @endif>
                <i class="fa fa-bullhorn" aria-hidden="true"></i>&nbsp;&nbsp;Announcement
            </a>
        </li>


        <li class="nav-item {{ Request::is('disciplinary_action*') ? 'active' : '' }} {{--@if(Request::is('disciplinary_action*')) active @endif--}}">
            <a class="nav-link" @if((Request::route()->getName() == 'disciplinary_action.index') || (Request::route()->getName() == 'disciplinary_action.create')) style="cursor: default;" @else  href="{{ route('disciplinary_action.index') }}" @endif>
                <i class="fa fa-file" aria-hidden="true"></i>&nbsp;&nbsp;Disciplinary Actions
            </a>
        </li>

    </ul>
</nav>
