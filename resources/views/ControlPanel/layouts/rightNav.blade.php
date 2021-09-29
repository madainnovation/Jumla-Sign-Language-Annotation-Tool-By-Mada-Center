<ul class="navbar-nav navbar-right">
{{--    <label class="e-accessibility-score">E-accessibility Score : 86</label>--}}


    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{url("ControlPanel/assets/img/avatar/avatar-2.png")}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{Auth::user()->name}}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
</ul>
