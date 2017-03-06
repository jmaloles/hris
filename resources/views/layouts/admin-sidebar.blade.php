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

        <li class="nav-item {{ Request::is('memoranda*') ? 'active' : '' }} {{--@if(Request::is('memoranda*')) active @endif--}}">
            <a class="nav-link" @if((Request::route()->getName() == 'memoranda.index') || (Request::route()->getName() == 'memoranda.create')) style="cursor: default;" @else  href="{{ route('memoranda.index') }}" @endif>
                <i class="fa fa-file" aria-hidden="true"></i>&nbsp;&nbsp;Memoranda
            </a>
        </li>

    </ul>
</nav>
